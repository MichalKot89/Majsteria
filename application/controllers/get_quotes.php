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
        if(isset($_SESSION['user_id'])) {
            $user_info_model = $this->loadModel('UserInfo');
            $this->view->userInfo = $user_info_model->getUserInfo($_SESSION['user_id']);

            if(isset($_SESSION['post_code'])) {
                $this->view->post_code = $_SESSION['post_code'];
            }
            else if ($this->view->userInfo AND $this->view->userInfo->post_code) {
                $this->view->post_code = $this->view->userInfo->post_code . ' ' . $this->view->userInfo->city;
            }
            else {
                $this->view->post_code = '';
            }

            if(isset($_SESSION['user_phone'])) {
                $this->view->user_phone = $_SESSION['user_phone'];
            }
            else if ($this->view->userInfo AND $this->view->userInfo->phone) {
                $this->view->skip_phone = true;
            }
            else {
                $this->view->user_phone = '';
            }

            if(isset($_SESSION['first_name'])) {
                $this->view->first_name = $_SESSION['first_name'];
                $this->view->last_name = $_SESSION['last_name'];
            }
            else if ($this->view->userInfo AND $this->view->userInfo->first_name) {
                $this->view->skip_name = true;
            }
            else {
                $this->view->first_name = '';
                $this->view->last_name = '';
            }

        }
        else {
            $this->view->userInfo = NULL;
            $this->view->user_phone = '';
            $this->view->post_code = '';
            $this->view->first_name = '';
            $this->view->last_name = '';
        }

        $this->view->render('get_quotes/index');
    }
}
