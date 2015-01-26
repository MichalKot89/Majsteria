<?php

/**
 * Class Project_Offer_Offer
 * The project controller. Here we create, read, update and delete (CRUD) example data.
 */
class Project_Offer extends Controller
{
    /**
     * Construct this object by extending the basic Controller class
     */
    public function __construct()
    {
        parent::__construct();

        Auth::handleLogin();

        $admin_model = $this->loadModel('Admin');
        if(!$admin_model->isAdmin($_SESSION['user_id'])) {
            echo "No access";
            exit();
        }
    }

    /**
     * This method deletes the project offer if user is admin or is offer owner
     * @param int $project_offer_id id of the project
     */
    public function delete($project_offer_id)
    {
        if (isset($project_offer_id)) {
            $admin_model = $this->loadModel('Admin');
            $project_offer_model = $this->loadModel('ProjectOffer');
            if($admin_model->isAdmin($_SESSION['user_id']) OR $project_offer_model->getProjectOffer($project_offer_id)->user_id == $_SESSION['user_id']) {
                $project_offer_model->delete($project_offer_id);
            }
        }
        header('location: ' . URL . 'project/all');
    }

    /**
     * This method activates the project offer if user is admin
     * @param int $project_offer_id id of the project offer
     */
    public function activate($project_offer_id)
    {
        if (isset($project_offer_id)) {
            $admin_model = $this->loadModel('Admin');
            if($admin_model->isAdmin($_SESSION['user_id'])) {
                $project_offer_model = $this->loadModel('ProjectOffer');
                $project_offer_model->activate($project_offer_id);
            }
        }
        header('location: ' . URL . 'project/all');
    }
}
