<?php

/**
 * Class Subcategory
 * The subcategory controller. Here we create, read, update and delete (CRUD) example data.
 */
class Subcategory extends Controller
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
        Auth::handleLogin();
        $admin_model = $this->loadModel('Admin');
        if(!$admin_model->isAdmin($_SESSION['user_id'])) {
            echo "No access";
            exit();
        }
    }

    /**
     * This method controls what happens when you move to /subcategory/index in your app.
     * Gets all subcategorys (of the user).
     */
    public function index()
    {
        $subcategory_model = $this->loadModel('Subcategory');
        $this->view->subcategories = $subcategory_model->getAllSubcategories();
        $this->view->categories = $subcategory_model->getAllCategories();
        $this->view->render('subcategory/index');
    }

    /**
     * This method controls what happens when you move to /dashboard/create in your app.
     * Creates a new subcategory. This is usually the target of form submit actions.
     */
    public function create()
    {
        // optimal MVC structure handles POST data in the controller, not in the model.
        // personally, I like POST-handling in the model much better (skinny controllers, fat models), so the login
        // stuff handles POST in the model. in this subcategory-controller/model, the POST data is intentionally handled
        // in the controller, to show people how to do it "correctly". But I still think this is ugly.
        if (isset($_POST['category_id']) AND !empty($_POST['category_id'])) {
            $subcategory_model = $this->loadModel('Subcategory');
            $subcategory_model->create($_POST['category_id'], $_POST['name'], $_POST['specialist_name'], 
	      $_POST['seo_url'], $_POST['meta_title'], $_POST['meta_descr'], $_POST['content']);           
            
        }
        header('location: ' . URL . 'subcategory');
    }

    /**
     * This method controls what happens when you move to /subcategory/edit(/XX) in your app.
     * Shows the current content of the subcategory and an editing form.
     * @param $subcategory_id int id of the subcategory
     */
    public function edit($subcategory_id)
    {
        if (isset($subcategory_id)) {
            // get the subcategory that you want to edit (to show the current content)
            $subcategory_model = $this->loadModel('Subcategory');
            $this->view->subcategory = $subcategory_model->getSubcategory($subcategory_id);
            $this->view->categories = $subcategory_model->getAllCategories();
            $this->view->render('subcategory/edit');
        } else {
            header('location: ' . URL . 'subcategory');
        }
    }

    /**
     * This method controls what happens when you move to /subcategory/editsave(/XX) in your app.
     * Edits a subcategory (performs the editing after form submit).
     * @param int $subcategory_id id of the subcategory
     */
    public function editSave($subcategory_id)
    {
        if (isset($_POST['category_id']) && isset($subcategory_id)) {
            // perform the update: pass subcategory_id from URL and subcategory_text from POST
            $subcategory_model = $this->loadModel('Subcategory');
            $subcategory_model->editSave($subcategory_id, $_POST['category_id'], $_POST['name'], $_POST['specialist_name'], 
	      $_POST['seo_url'], $_POST['meta_title'], $_POST['meta_descr'], $_POST['content']);
        }
        header('location: ' . URL . 'subcategory');
    }

    /**
     * This method controls what happens when you move to /subcategory/delete(/XX) in your app.
     * Deletes a subcategory. In a real application a deletion via GET/URL is not recommended, but for demo purposes it's
     * totally okay.
     * @param int $subcategory_id id of the subcategory
     */
    public function delete($subcategory_id)
    {
        if (isset($subcategory_id)) {
            $subcategory_model = $this->loadModel('Subcategory');
            $subcategory_model->delete($subcategory_id);
        }
        header('location: ' . URL . 'subcategory');
    }
}
