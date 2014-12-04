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
        $subcategory_view = $this->loadModel('Subcategory');
        $this->view->seo_url = $seo_url;
        $this->view->data = $subcategory_view->getSubcategoryByName($seo_url);
        $this->view->render('subcategory_view/index');

        // TEMP
        $membership = $this->loadModel('Membership');
    }
}