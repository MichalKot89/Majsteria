<?php

/**
 * Class Post_Code
 * The post_code controller
 */
class Post_Code extends Controller
{
    /**
     * Construct this object by extending the basic Controller class
     */
    function __construct()
    {
            parent::__construct();
    }

    /**
     * Loads PostCode model and runs the query to retrieve similar post codes
     */
    function loadSimilarPostCodes($q)
    {
        $post_code_model = $this->loadModel('PostCode');
        return $post_code_model->getMatchingPostCodes($q);
    }

    /*function oneOff()
    {
        $post_code_model = $this->loadModel('PostCode');
        return $post_code_model->oneOff();
    }*/
}
