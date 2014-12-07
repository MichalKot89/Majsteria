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

        // VERY IMPORTANT: All controllers/areas that should only be usable by logged-in users
        // need this line! Otherwise not-logged in users could do actions. If all of your pages should only
        // be usable by logged-in users: Put this line into libs/Controller->__construct
        //Auth::handleLogin();
    }

    /**
     * This method controls what happens when you move to /project/index in your app.
     * Gets all projects (of the user).
     */
    public function index()
    {
        $project_model = $this->loadModel('Project');
        $this->view->subcategories = $project_model->getAllSubcategories();
        $this->view->categories = $project_model->getAllCategories();
        $this->view->render('project/index');
    }

    /**
     * This method controls what happens when you move to /dashboard/create in your app.
     * Creates a new project. This is usually the target of form submit actions.
     */
    public function create()
    {
        if (!isset($_SESSION['user_id'])) {
            echo "Zaloguj sie wpierw, tu nastapi rejestracja";
            exit(1);
        }
        else {
            $user_id = $_SESSION['user_logged_in'];
        }
        // optimal MVC structure handles POST data in the controller, not in the model.
        // personally, I like POST-handling in the model much better (skinny controllers, fat models), so the login
        // stuff handles POST in the model. in this project-controller/model, the POST data is intentionally handled
        // in the controller, to show people how to do it "correctly". But I still think this is ugly.
        if (isset($_POST['subcategory_id']) AND !empty($_POST['subcategory_id'])) {
            $project_model = $this->loadModel('Project');
            $project_model->create($user_id, $_POST['when'], $_POST['descr'], $_POST['post_code'], $_POST['subcategory'], $_POST['subsubcategory']);            
        }
        header('location: ' . URL . 'project');
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
            $admin_model = $this->loadModel('Admin');
            $project_model = $this->loadModel('Project');
            $this->view->project = $project_model->getProject($project_id);
            if($admin_model->isAdmin($_SESSION['user_id']) OR $this->view->project->user_id == $_SESSION['user_id']) {
                $this->view->render('project/edit');
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
        if (isset($_POST['subcategory_id']) && isset($project_id)) {
            $admin_model = $this->loadModel('Admin');
            $project_model = $this->loadModel('Project');
            if($admin_model->isAdmin($_SESSION['user_id']) OR $project_model->getProject($project_id)->user_id == $_SESSION['user_id']) {
                $project_model->editSave($_POST['when'], $_POST['descr'], $_POST['post_code'], $_POST['subcategory'], $_POST['subsubcategory']);
            }
        }
        header('location: ' . URL . 'project');
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
                $project_model->delete($project_id);
            }
        }
        header('location: ' . URL . 'project');
    }
}
