<?php

/**
 * Class Add_Business
 * The add_business controller
 */
class Business extends Controller
{
    /**
     * Construct this object by extending the basic Controller class
     */
    function __construct()
    {
            parent::__construct();
    }

    /**
     * Handles what happens when user moves to URL/index/index, which is the same like URL/index or in this
     * case even URL (without any controller/action) as this is the default controller-action when user gives no input.
     */
    function index()
    {
        $login_model = $this->loadModel('Login');
        $this->view->isCaptchaNeeded = $login_model->isCaptchaNeeded();

        $business_model = $this->loadModel('Business');
        if(isset($_SESSION['user_id'])) {
            $this->view->isBusiness = $business_model->isBusiness($_SESSION['user_id']);
        }
        else {
            $this->view->isBusiness = false;
        }
        if($this->view->isBusiness) {
            header('location: ' . URL . 'project/matching');
        }
        $this->view->render('business/index');
    }

    /**
     * Handles what happens when user moves to URL/business/edit/(XX)
     * allows editing of the business
     */
    function edit($user_id)
    {
        Auth::handleLogin();
        if($_SESSION['user_id'] != $user_id) {
            header('location: ' . URL . 'fachowcy');
        }
        $this->view->isCaptchaNeeded = false;

        $business_model = $this->loadModel('Business');
        $this->view->isBusiness = $business_model->isBusiness($_SESSION['user_id']);
        if(!$this->view->isBusiness) {
            header('location: ' . URL . 'fachowcy');
        }

        $user_info_model = $this->loadModel('UserInfo');
        $this->view->user_info = $user_info_model->getUserInfo($_SESSION['user_id']);
        $this->view->business_info = $business_model->getBusiness($_SESSION['user_id']);
        $this->view->business_subs = $business_model->getBusinessSubcategories($_SESSION['user_id']);
        $this->view->business_subcategories = array();
        foreach($this->view->business_subs AS $subcategory) {
            $this->view->business_subcategories[] = $subcategory->subcategory_id;
        }

        $_SESSION['first_name'] = $this->view->user_info->first_name;
        $_SESSION['last_name'] = $this->view->user_info->last_name;
        $_SESSION['user_phone'] = $this->view->user_info->phone;
        $_SESSION['post_code'] = $this->view->user_info->post_code . ' ' . $this->view->user_info->city;
        $_SESSION['company_name'] = $this->view->business_info->company_name;
        $_SESSION['is_company'] = $this->view->business_info->is_company;
        $_SESSION['descr'] = $this->view->business_info->descr;
        

        $this->view->render('business/index');
    }


    /**
     * Handles what happens when user moves to URL/business/profile/(XX)
     * allows editing of the business
     */
    function profile($user_id)
    {
        $business_model = $this->loadModel('Business');
        $this->view->isBusiness = $business_model->isBusiness($user_id);
        if(!$this->view->isBusiness) {
            header('location: ' . URL . 'zlecenia/dodaj');
        }

        $overview_model = $this->loadModel('Overview');
        $this->view->user = $overview_model->getUserProfile($user_id);

        $user_info_model = $this->loadModel('UserInfo');
        $this->view->user_info = $user_info_model->getUserInfo($user_id);
        
        $this->view->business_info = $business_model->getBusiness($user_id);
        $this->view->business_subcategories = $business_model->getBusinessSubcategories($user_id);

        if($this->view->business_info->is_company) {
            $this->view->name = $this->view->business_info->company_name;
        }
        else {
            $this->view->name = $this->view->user_info->first_name . ' ' . $this->view->user_info->last_name;
        }

        $this->view->render('business/profile');
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
            // find post code and create User Info
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

        // if still not logged in, come back to get quotes page
        if (!isset($_SESSION['user_id'])) {
            header('location: ' . URL . 'business/index');
            return;
        }

        $user_id = $_SESSION['user_id'];
        // optimal MVC structure handles POST data in the controller, not in the model.
        // personally, I like POST-handling in the model much better (skinny controllers, fat models), so the login
        // stuff handles POST in the model. in this project-controller/model, the POST data is intentionally handled
        // in the controller, to show people how to do it "correctly". But I still think this is ugly.
        if (isset($_POST['descr']) AND !empty($_POST['descr']) AND
            isset($_POST['subcategories']) AND !empty($_POST['subcategories'])) {

                $business_model = $this->loadModel('Business');
                if(isset($_POST['company_name'])){
                    $company_name = $_POST['company_name'];
                }
                else {
                    $company_name = NULL;
                }
                $business_model->create($user_id, $_POST['descr'], $_POST['is_company'], $_POST['company_name'], $_POST['subcategories']);          
        }
        $this->destroyPostFieldsInSession();
        header('location: ' . URL . 'project/matching');
    }

    /**
     * This method controls what happens when you move to /business/editSave(/XX) in your app.
     * @param $user_id of the business
     */
    public function editSave($user_id)
    {
        if (isset($user_id) AND $user_id == $_SESSION['user_id']) {
            $business_model = $this->loadModel('Business');
            $edit_business_success = $business_model->editSave($business_model->getBusiness($user_id)->business_id, $_POST['descr'], $_POST['is_company'], $_POST['company_name'], $_POST['subcategories']);

            if(isset($_POST['post_code']) AND !empty($_POST['post_code'])) {
                    $post_code_model = $this->loadModel('PostCode');
                    $post_code_id = $post_code_model->findPostCodeIdFromInput($_POST['post_code']);
            }
            else {
                $post_code_id = NULL;
            }
            $user_info_model = $this->loadModel('UserInfo');
            $edit_userinfo_success = $user_info_model->setUserInfo($user_id, $_POST['first_name'], $_POST['last_name'], $_POST['user_phone'], $post_code_id);
            if($edit_business_success OR $edit_userinfo_success) {
                $_SESSION["feedback_positive"][] = FEEDBACK_EDIT_SUCCESSFUL;
            }
            header('location: ' . URL . 'business/edit/' . $user_id);
        
        } else {
            header('location: ' . URL . 'fachowcy');
        }
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
        $_SESSION['is_company'] = (isset($_POST['is_company']) AND !empty($_POST['is_company'])) ? $_POST['is_company'] : NULL;
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
        $_SESSION['is_company'] = NULL;
    }
}
