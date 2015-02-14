<?php

/**
 * UserInfoModel
 */
class UserInfoModel
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
     * Get info about that user
     * @param user_id
     * @return array of user information
     */
    public function getUserInfo($user_id)
    {
        $sql = "SELECT ui.first_name, ui.last_name, ui.phone, ui.post_code_id, pc.post_code, pc.city
            FROM user_info ui 
            JOIN post_code pc ON pc.post_code_id = ui.post_code_id
            WHERE ui.user_id = :user_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':user_id' => $user_id));

        // fetch() is the PDO method that gets a single result
        return $query->fetch();
    }

    /**
     * Set user info
     * @param int user_id
     * @param string first_name
     * @param string last_name
     * @param string phone
     * @param string post_code
     * @return bool whether successful
     */
    private function setUserInfo($user_id, $first_name, $last_name, $phone, $post_code_id)
    {
        if(!$this->getUserInfo($user_id)) {
            $sql = "INSERT INTO user_info (user_info_id, user_id, first_name, last_name, phone, post_code_id) VALUES (NULL, :user_id, :first_name, :last_name, :phone, :post_code_id)";
        }
        else {
            $sql = "UPDATE user_info SET first_name = :first_name, last_name = :last_name, phone = :phone, post_code_id = :post_code_id WHERE user_id = :user_id";
        }
 
        $query = $this->db->prepare($sql);
        $query->execute(array(':user_id' => $user_id, ':first_name' => $first_name, ':last_name' => $last_name, ':phone' => $phone, ':post_code_id' => $post_code_id));

        $count =  $query->rowCount();
        if ($count == 1) {
            return true;
        }
        // default return
        return false;
    }

    /**
     * This method is used to initiate user session which is equivalent to successfully logging in
     * @param int user_id
     * @param string first_name
     * @param string last_name
     * @param string phone
     * @param string post_code
     * @return bool whether successful
     */
    public function createUserInfo($user_id, $post_code_id = NULL)
    {
        $first_name = (isset($_POST['first_name']) AND !empty($_POST['first_name'])) ? $_POST['first_name'] : NULL;
        $last_name = (isset($_POST['last_name']) AND !empty($_POST['last_name'])) ? $_POST['last_name'] : NULL;
        $phone = (isset($_POST['user_phone']) AND !empty($_POST['user_phone'])) ? $_POST['user_phone'] : NULL;
        
        return $this->setUserInfo($user_id, $first_name, $last_name, $phone, $post_code_id);
    }
}
