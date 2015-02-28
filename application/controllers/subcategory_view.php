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


        $subcategory_model = $this->loadModel('Subcategory');
        $this->view->seo_url = $seo_url;
        $this->view->subcategory = $subcategory_model->getSubcategoryByName($seo_url);
        if(!$this->view->subcategory) {
            header('location: ' . URL .subcategory_SEO . '/all');
        }
        $this->view->meta_title = $this->view->subcategory->meta_title;
        $this->view->meta_descr = $this->view->subcategory->meta_descr;
        $this->view->meta_keywords = $this->view->subcategory->meta_keywords;
        $this->view->render('subcategory_view/index');
    }


    /**
     * This method controls what happens when you move to /find/seo_url in your app.
     * Render subcategory view page
     */
    public function directory($seo_url, $city_url)
    {
        $this->view->city_url = $city_url;

        $subcategory_model = $this->loadModel('Subcategory');
        $this->view->seo_url = $seo_url;
        $this->view->subcategory = $subcategory_model->getSubcategoryByName($seo_url);

        $post_code_model = $this->loadModel('PostCode');
        $post_codes = $post_code_model->findPostCodesByCityUrl($city_url);
        if(count($post_codes) < 1) {
            header('location: ' . URL .subcategory_SEO . '/' . $seo_url);
        }
        $post_code_ids = array();
        foreach($post_codes as $post_code) {
            $post_code_ids[] = $post_code->post_code_id;
        }

        $business_model = $this->loadModel('Business');
        $this->view->businesses = $business_model->getBusinessesWithPostCodeIds($this->view->subcategory->subcategory_id, $post_code_ids);

        $this->view->render('subcategory_view/directory');
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