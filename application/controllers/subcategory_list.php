<?php

/**
 * Class Subcategory_List
 * The subcategory_list controller.
 */
class Subcategory_List extends Controller
{
    /**
     * Construct this object by extending the basic Controller class
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Returns all subcategories as array
     */
    public function getAllSubcategories()
    {
        $subcategory_model = $this->loadModel('Subcategory');
        return $subcategory_model->getAllSubcategories();
    }  
}