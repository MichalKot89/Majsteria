<?php

/**
 * AdminModel
 * Check if someone is an admin
 */
class AdminModel
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
     * Check if someone is an admin
     * @param int $user_id
     * @return bool true if admin
     */
    public function isAdmin($user_id)
    {
        if(isset($_SESSION['is_admin'])) {
            if($_SESSION['is_admin'] == 1) {
                return true;
            }
            else {
                return false;
            }
        }
        $sql = "SELECT admin_id, user_id FROM admin WHERE user_id = :user_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':user_id' => $user_id));

        // fetch() is the PDO method that gets a single result
        $count =  $query->rowCount();
        if ($count == 1) {
            $_SESSION['is_admin'] = 1;
            return true;
        }
        // default return
        $_SESSION['is_admin'] = 0;
        return false;
    }
}
