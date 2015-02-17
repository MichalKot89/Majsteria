<?php

/**
 * Class Get_Quotes
 * The get_quotes controller
 */
class Get_Quotes extends Controller
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

        $this->view->render('get_quotes/index');
    }
}
