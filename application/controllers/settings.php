<?php

/**
 * Class Settings
 * The settings controller
 */
class Settings extends Controller
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
        $business_model = $this->loadModel('Business');
        $this->view->isBusiness = $business_model->isBusiness($_SESSION['user_id']);
        $this->view->render('settings/index');
    }
}
