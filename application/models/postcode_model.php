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

    /**
     * Find post codes for particular city_url strings
     * @return id of the post code or 0
     */
    public function findPostCodesByCityUrl($city_url)
    {
        $sql = "SELECT post_code_id, post_code, city FROM post_code WHERE city_url = :city_url";
        $query = $this->db->prepare($sql);
        $query->execute(array(':city_url' => $city_url));

        if($query->rowCount() < 1) {
            return NULL;
        }
        return $query->fetchAll();
    }

/*
    public function oneOff()
    {
        $sql = "SELECT post_code_id, city FROM post_code";
        $query = $this->db->prepare($sql);
        $query->execute();
        $post_codes = $query->fetchAll();
        $polish = array("ę", "ó", "ą", "ś", "ł", "ż", "ź", "ć", "ń", "Ę", "Ó", "Ą", "Ś", "Ł", "Ż", "Ź", "Ć", "Ń");
        $normal = array("e", "o", "a", "s", "l", "z", "z", "c", "n", "E", "O", "A", "S", "L", "Z", "Z", "C", "N");
   
        foreach($post_codes AS $post_code) {
            $no_polish_letters = str_replace($polish, $normal, $post_code->city);
            $no_bracket_array = explode(' (', $no_polish_letters);
            $no_bracket = $no_bracket_array[0];
            $city_url = strtolower(str_replace(' ', '_', $no_bracket));

            $sql = "UPDATE post_code SET city_url = :city_url WHERE post_code_id = :post_code_id";
            $query = $this->db->prepare($sql);
            $query->execute(array(':city_url' => $city_url, ':post_code_id' => $post_code->post_code_id));
            echo $query->rowCount() . '<br />';

        }
    }*/
}
