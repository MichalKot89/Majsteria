<?php

/**
 * Class Project
 * The project controller. Here we create, read, update and delete (CRUD) example data.
 */
class Project extends Controller
{
    /**
     * Construct this object by extending the basic Controller class
     */
    public function __construct()
    {
        parent::__construct();

        if(isset($_SESSION['user_id'])) {
            $admin_model = $this->loadModel('Admin');
            $this->view->isAdmin = $admin_model->isAdmin($_SESSION['user_id']);
        }
        else {
            $this->view->isAdmin = false;
        }
    }

    /**
     * This method controls what happens when you move to /project/index in your app.
     * Gets all projects (of the user).
     */
    public function index()
    {
        Auth::handleLogin();
        $this->view->headline = "Moje zlecenia";
        $this->view->no_projects_message = "Nie masz jeszcze zleceń. Najwyższy czas coś dodać!";

        $project_model = $this->loadModel('Project');
        $this->view->projects = $project_model->getProjectsByUser($_SESSION['user_id']);
        $admin_model = $this->loadModel('Admin');
        $this->view->isAdmin = $admin_model->isAdmin($_SESSION['user_id']);
        $this->view->render('project/index');
    }


    /**
     * This method controls what happens when you move to /project/add in your app.
     * Gets all projects (of the user).
     */
    public function add()
    {
        $login_model = $this->loadModel('Login');
        $this->view->isCaptchaNeeded = $login_model->isCaptchaNeeded();

        if(isset($_POST['post_code'])) {
            $_SESSION['post_code'] = $_POST['post_code'];
        }
        if(isset($_POST['subcategory_id'])) {
            $_SESSION['subcategory_id'] = $_POST['subcategory_id'];
        }

        if(isset($_SESSION['user_id'])) {
            $user_info_model = $this->loadModel('UserInfo');
            $this->view->userInfo = $user_info_model->getUserInfo($_SESSION['user_id']);

            if (!isset($_SESSION['post_code']) AND $this->view->userInfo AND $this->view->userInfo->post_code) {
                $_SESSION['post_code'] = $this->view->userInfo->post_code . ' ' . $this->view->userInfo->city;
            }

            if (!isset($_SESSION['user_phone']) AND $this->view->userInfo AND $this->view->userInfo->phone) {
                $this->view->skip_phone = true;
            }

            if (!isset($_SESSION['first_name']) AND $this->view->userInfo AND $this->view->userInfo->first_name) {
                $this->view->skip_name = true;
            }
        }

        $this->view->render('project/add');
    }

    /**
     * This method controls what happens when you move to /project/all in your app.
     * Gets all projects.
     */
    public function all()
    {
        Auth::handleLogin();

        if(!$this->view->isAdmin) {
            $this->index();
        }
        else {
            $project_model = $this->loadModel('Project');
            $this->view->projects = $project_model->getAllProjects();
            $this->view->headline = "Wszystkie zlecenia";
            $this->view->no_projects_message = "Nie ma zleceń.";        
            $this->view->render('project/index');
        }
    }

    /**
     * This method controls what happens when you move to /project/matching in your app.
     * Gets projects matching to the business subcategories.
     */
    public function matching()
    {
        Auth::handleLogin();

        $business_model = $this->loadModel('Business');
        if(!$business_model->isBusiness($_SESSION['user_id'])) {
            header('location: ' . URL . 'business');
            exit(1);
        }

        $subcategories_result = $business_model->getBusinessSubcategories($_SESSION['user_id']);
        $subcategories = array();
        foreach($subcategories_result AS $subcategory_result) {
            $subcategories[] = $subcategory_result->subcategory_id;
        }

        $user_info_model = $this->loadModel('UserInfo');
        $post_code = $user_info_model->getUserInfo($_SESSION['user_id'])->post_code;

        $project_model = $this->loadModel('Project');
        $this->view->projects = $project_model->getMatchingProjects($_SESSION['user_id'], $post_code);

        $this->view->headline = "Sugerowane zlecenia";
        $this->view->no_projects_message = "Niestety nie znaleźliśmy dla Ciebie żadnych zleceń. Rozważ dodanie większej ilości kategorii.";
        $this->view->render('project/index');
    }

    /**
     * This method controls what happens when you move to /dashboard/create in your app.
     * Creates a new project. This is usually the target of form submit actions.
     */
    public function create()
    {
        $this->storePostFieldsInSession();
        // if not logged in try to register
        if (!isset($_SESSION['user_id'])) {
            require CONTROLLER_PATH . 'login.php';
            $controller = new Login();
            $controller->register_action(true);
        }
        else {
            $business_model = $this->loadModel('Business');
            // if not business then update User Info
            if(!$business_model->isBusiness($_SESSION['user_id'])) {
                $post_code_model = $this->loadModel('PostCode');
                if(isset($_POST['post_code']) AND !empty($_POST['post_code'])) {
                    $post_code = $post_code_model->findPostCodeIdFromInput($_POST['post_code']);
                }
                else {
                    $post_code = NULL;
                }
                $user_info_model = $this->loadModel('UserInfo');
                $user_info_model->createUserInfo($_SESSION['user_id'], $post_code);
            }
        }

        // if still not logged in, come back to add project page
        if (!isset($_SESSION['user_id'])) {
            header('location: ' . URL . 'zlecenia/dodaj');
            return;
        }

        $user_id = $_SESSION['user_id'];
        // optimal MVC structure handles POST data in the controller, not in the model.
        // personally, I like POST-handling in the model much better (skinny controllers, fat models), so the login
        // stuff handles POST in the model. in this project-controller/model, the POST data is intentionally handled
        // in the controller, to show people how to do it "correctly". But I still think this is ugly.
        if (isset($_POST['subcategory_id']) AND !empty($_POST['subcategory_id']) AND 
            isset($_POST['timeline']) AND !empty($_POST['timeline']) AND 
            isset($_POST['descr']) AND !empty($_POST['descr']) AND 
            isset($_POST['post_code']) AND !empty($_POST['post_code'])) {

                $post_code_model = $this->loadModel('PostCode');
                $post_code_id = $post_code_model->findPostCodeIdFromInput($_POST['post_code']);

                $project_model = $this->loadModel('Project');
                $project_model->create($user_id, $_POST['timeline'], $_POST['descr'], $post_code_id, $_POST['subcategory_id'], NULL);            
        }
        $this->destroyPostFieldsInSession();
        header('location: ' . URL . 'project');
    }


    /**
     * This method controls what happens when you move to /project/view(/XX) in your app.
     * Displays info about one project
     * @param $project_id int id of the project
     */
    public function view($project_id)
    {
        if (isset($project_id)) {
            
            $project_model = $this->loadModel('Project');
            $this->view->project = $project_model->getProject($project_id);
            $this->view->loggedIn = isset($_SESSION['user_id']);
            $this->view->isOwner = $this->view->loggedIn && $this->view->project->user_id == $_SESSION['user_id'];

            // Load project offers
            $project_offer_model = $this->loadModel('ProjectOffer');
            $this->view->offers = $project_offer_model->getProjectOffersForProject($project_id);

            if(!$this->view->isOwner && $this->view->loggedIn) {
                // Check this user has placed an offer
                $this->view->hasPlacedOffer = $project_offer_model->hasPlacedOffer($project_id, $_SESSION['user_id']);
                // Check if is business
                $business_model = $this->loadModel('Business');
                $this->view->isBusiness = $business_model->isBusiness($_SESSION['user_id']);
            }
            else {
                $this->view->hasPlacedOffer = false;
                $this->view->isBusiness = false;
            }

            $this->view->render('project/view');
        } else {
            header('location: ' . URL . 'project');
        }
    }


    /**
     * This method controls what happens when you move to /project/offer(/XX) in your app.
     * Creates an offer for the project
     * @param $project_id int id of the project
     */
    public function offer($project_id)
    {
        Auth::handleLogin();
        if (isset($project_id)) {

            if (isset($_POST['offer_value']) AND !empty($_POST['offer_value']) AND 
                isset($_POST['descr']) AND !empty($_POST['descr']) AND 
                isset($_POST['offer_type']) AND !empty($_POST['offer_type'])) {

                    $project_offer_model = $this->loadModel('ProjectOffer');
                    if(!$project_offer_model->hasPlacedOffer($project_id, $_SESSION['user_id'])) {
                        $project_offer_model->create($project_id, $_SESSION['user_id'], $_POST['descr'], $_POST['offer_value'], $_POST['offer_type']);
                    }
                }
        } else {
            header('location: ' . URL . 'project');
        }
        header('location: ' . URL . 'project/view/'.$project_id);
    }

    /**
     * This method controls what happens when you move to /project/edit(/XX) in your app.
     * Shows the current content of the project and an editing form.
     * @param $project_id int id of the project
     */
    public function edit($project_id)
    {
        if (isset($project_id)) {
            // get the project that you want to edit (to show the current content)
            $this->view->isCaptchaNeeded = false;
            $this->view->skip_phone = true;
            $this->view->skip_name = true;
            $admin_model = $this->loadModel('Admin');
            $project_model = $this->loadModel('Project');
            $this->view->project = $project_model->getProject($project_id);
            if($admin_model->isAdmin($_SESSION['user_id']) OR $this->view->project->user_id == $_SESSION['user_id']) {
                $user_info_model = $this->loadModel('UserInfo');
                $this->view->user_info = $user_info_model->getUserInfo($_SESSION['user_id']);

                $_SESSION['first_name'] = $this->view->user_info->first_name;
                $_SESSION['last_name'] = $this->view->user_info->last_name;
                $_SESSION['user_phone'] = $this->view->user_info->phone;
                $_SESSION['post_code'] = $this->view->project->post_code . ' ' . $this->view->project->city;
                $_SESSION['subcategory_id'] = $this->view->project->subcategory_id;
                $_SESSION['timeline'] = $this->view->project->timeline;
                $_SESSION['descr'] = $this->view->project->descr;
                $this->view->render('project/add');
            }
        } else {
            header('location: ' . URL . 'project');
        }
    }

    /**
     * This method controls what happens when you move to /project/editsave(/XX) in your app.
     * @param int $project_id id of the project
     */
    public function editSave($project_id)
    {
        if (isset($_POST['post_code']) && isset($_POST['subcategory_id']) && isset($project_id)) {
            $admin_model = $this->loadModel('Admin');
            $project_model = $this->loadModel('Project');
            if($admin_model->isAdmin($_SESSION['user_id']) OR $project_model->getProject($project_id)->user_id == $_SESSION['user_id']) {
                $post_code_model = $this->loadModel('PostCode');
                $post_code_id = $post_code_model->findPostCodeIdFromInput($_POST['post_code']);
                $project_edit_successful = $project_model->editSave($project_id, $_POST['timeline'], $_POST['descr'], $post_code_id, $_POST['subcategory_id']);
                if($project_edit_successful) {
                    $_SESSION["feedback_positive"][] = FEEDBACK_EDIT_SUCCESSFUL;
                }
            }
        }
        header('location: ' . URL . 'project/edit/' . $project_id);
    }

    /**
     * This method deletes the project if user is admin or is project owner
     * @param int $project_id id of the project
     */
    public function delete($project_id)
    {
        if (isset($project_id)) {
            $admin_model = $this->loadModel('Admin');
            $project_model = $this->loadModel('Project');
            if($admin_model->isAdmin($_SESSION['user_id']) OR $project_model->getProject($project_id)->user_id == $_SESSION['user_id']) {
                $project_model->delete($project_id);
            }
        }
        header('location: ' . URL . 'project');
    }

    /**
     * This method activates the project if user is admin
     * @param int $project_id id of the project
     */
    public function activate($project_id)
    {
        if (isset($project_id)) {
            $admin_model = $this->loadModel('Admin');
            if($admin_model->isAdmin($_SESSION['user_id'])) {
                $project_model = $this->loadModel('Project');
                $project_model->activate($project_id);
            }
        }
        header('location: ' . URL . 'project');
    }

    /**
     * This method makes sures post form values are stored in session
     */
    public function storePostFieldsInSession()
    {
        $_SESSION['first_name'] = (isset($_POST['first_name']) AND !empty($_POST['first_name'])) ? $_POST['first_name'] : NULL;
        $_SESSION['last_name'] = (isset($_POST['last_name']) AND !empty($_POST['last_name'])) ? $_POST['last_name'] : NULL;
        $_SESSION['user_phone'] = (isset($_POST['user_phone']) AND !empty($_POST['user_phone'])) ? $_POST['user_phone'] : NULL;
        $_SESSION['user_email'] = (isset($_POST['user_email']) AND !empty($_POST['user_email'])) ? $_POST['user_email'] : NULL;
        $_SESSION['post_code'] = (isset($_POST['post_code']) AND !empty($_POST['post_code'])) ? $_POST['post_code'] : NULL;
        $_SESSION['descr'] = (isset($_POST['descr']) AND !empty($_POST['descr'])) ? $_POST['descr'] : NULL;
        $_SESSION['subcategory_id'] = (isset($_POST['subcategory_id']) AND !empty($_POST['subcategory_id'])) ? $_POST['subcategory_id'] : NULL;
        $_SESSION['timeline'] = (isset($_POST['timeline']) AND !empty($_POST['timeline'])) ? $_POST['timeline'] : NULL;
    }

    /**
     * This method destroys get free quotes form values
     */
    public function destroyPostFieldsInSession()
    {
        $_SESSION['first_name'] = NULL;
        $_SESSION['last_name'] = NULL;
        $_SESSION['user_phone'] = NULL;
        $_SESSION['user_email'] = NULL;
        $_SESSION['post_code'] = NULL;
        $_SESSION['descr'] = NULL;
        $_SESSION['subcategory_id'] = NULL;
        $_SESSION['timeline'] = NULL;
    }
}
