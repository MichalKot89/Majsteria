<?php

/**
 * Class Dashboard
 * This is a demo controller that simply shows an area that is only visible for the logged in user
 * because of Auth::handleLogin(); in line 19.
 */
class Dashboard extends Controller
{
    /**
     * Construct this object by extending the basic Controller class
     */
    function __construct()
    {
        parent::__construct();

        // this controller should only be visible/usable by logged in users, so we put login-check here
        Auth::handleLogin();
    }

    /**
     * This method controls what happens when you move to /dashboard/index in your app.
     */
    function index()
    {
        
        $project_model = $this->loadModel('Project');
        $this->view->my_projects = $project_model->getProjectsByUser($_SESSION['user_id']);

        $business_model = $this->loadModel('Business');
        $this->view->isBusiness = $business_model->isBusiness($_SESSION['user_id']);

        $user_info_model = $this->loadModel('UserInfo');
        $this->view->user_info = $user_info_model->getUserInfo($_SESSION['user_id']);

        $admin_model = $this->loadModel('Admin');
        $this->view->isAdmin = $admin_model->isAdmin($_SESSION['user_id']);

        if($this->view->isBusiness) {
            //$this->view->business = $business_model->getBusiness($_SESSION['user_id']);
            $this->view->matching_projects = $project_model->getMatchingProjects($_SESSION['user_id'], $user_info->post_code);
        }

        $this->view->render('dashboard/index');
    }
}
