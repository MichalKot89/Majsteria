<?php

/**
 * Class Subcategory_View
 * The subcategory_View controller.
 */
class Subcategory_View extends Controller
{
    /**
     * Construct this object by extending the basic Controller class
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * This method controls what happens when you move to /find/seo_url in your app.
     * Render subcategory view page
     */
    public function index($seo_url)
    {

        $login_model = $this->loadModel('Login');
        $this->view->isCaptchaNeeded = $login_model->isCaptchaNeeded();
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


        $subcategory_view = $this->loadModel('Subcategory');
        $this->view->seo_url = $seo_url;
        $this->view->data = $subcategory_view->getSubcategoryByName($seo_url);
        $this->view->render('subcategory_view/index');

        // TEMP
        //$membership = $this->loadModel('Membership');
    }

    /**
     * Shows all subcategories
     */
    public function all()
    {
        $subcategory_model = $this->loadModel('Subcategory');
        $this->view->subcategories = $subcategory_model->getAllSubcategories();
        $this->view->categories = $subcategory_model->getAllCategories();
        $this->view->render('subcategory_view/all');
    }
}