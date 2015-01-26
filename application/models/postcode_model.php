<?php

/**
 * PostCodeModel
 * Deal with post codes to match jobs and people
 */
class PostCodeModel
{
    /**
     * Constructor, expects a Database connection
     * @param Database $db The Database object
     */
    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    /**
     * Getter for post codes that are similar to the search query
     * @return array an array with several objects (the results)
     */
    public function getMatchingPostCodes($q)
    {
        $sql = "SELECT post_code, city FROM post_code WHERE (post_code LIKE :quacy OR city LIKE :quacy) LIMIT 50";
        $query = $this->db->prepare($sql);
        $query->execute(array(':quacy' => $q . '%'));

        // fetchAll() is the PDO method that gets all result rows
        return $query->fetchAll();
    }

    /**
     * Find post code id based on the input of the form 
     * @return id of the post code or 0
     */
    public function findPostCodeIdFromInput($post_code_input)
    {
        $post_code_and_city = explode(' ', $post_code_input, 2);
        if(count($post_code_and_city) < 2) {
            return NULL;
        }
        $sql = "SELECT post_code_id FROM post_code WHERE (post_code = :post_code AND city = :city) LIMIT 1";
        $query = $this->db->prepare($sql);
        $query->execute(array(':post_code' => $post_code_and_city[0], ':city' => $post_code_and_city[1]));

        if($query->rowCount() < 1) {
            return NULL;
        }
        return $query->fetch()->post_code_id;
    }
}
