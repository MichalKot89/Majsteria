<?php

/**
 * BusinessModel
 */
class BusinessModel
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
     * Check if user is a business
     * @return bool
     */
    public function isBusiness($user_id)
    {
        $sql = "SELECT business_id
            FROM business
            WHERE user_id = :user_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':user_id' => $user_id));

        if($query->rowCount() > 0) {
            return true;
        }
        return false;
    }

    /**
     * Getter for all businesss
     * @return array an array with several objects (the results)
     */
    public function getAllBusinesses()
    {
        $sql = "SELECT business_id, submit_date, user_id, descr,
                is_company, company_name, active
            FROM business";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetchAll() is the PDO method that gets all result rows
        return $query->fetchAll();
    }

    /**
     * Getter for a single business
     * @param int $user_id id of the specific user
     * @return object a single object (the result)
     */
    public function getBusiness($user_id)
    {
        $sql = "SELECT business_id, submit_date, user_id, descr,
                is_company, company_name, active
            FROM business p
            WHERE user_id = :user_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':user_id' => $user_id));

        // fetch() is the PDO method that gets a single result
        return $query->fetch();
    }

    /**
     * Getter for subcategories of the business
     * @param int $user id of the specific business
     * @return object array of subcategories
     */
    public function getBusinessSubcategories($user_id)
    {
        $sql = "SELECT bs.subcategory_id, s.name
            FROM business b
            JOIN business_subcategory bs ON bs.business_id = b.business_id
            JOIN subcategory s ON bs.subcategory_id = s.subcategory_id
            WHERE b.user_id = :user_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':user_id' => $user_id));

        return $query->fetchAll();
    }

    /**
     * Get all business with specific subcategory and list of post codes
     * @param int $subcategory_id
     * @param array post_code_ids
     * @return object array of businesses
     */
    public function getBusinessesWithPostCodeIds($subcategory_id, $post_code_ids)
    {
        $sql = "SELECT b.business_id, b.submit_date, b.user_id, b.descr, b.is_company, b.company_name,
                ui.first_name, ui.last_name, ui.phone, pc.city
            FROM business b
            JOIN business_subcategory bs ON bs.business_id = b.business_id
            JOIN user_info ui ON ui.user_id = b.user_id
            JOIN post_code pc ON pc.post_code_id = ui.post_code_id
            WHERE bs.subcategory_id = :subcategory_id AND ui.post_code_id IN (" . implode(',', $post_code_ids) . ")";
        $query = $this->db->prepare($sql);
        $query->execute(array(':subcategory_id' => $subcategory_id));

        return $query->fetchAll();
    }

    /**
     * Setter for a business (create)
     * @return bool feedback (was the business created properly ?)
     */
    public function create($user_id, $descr, $is_company, $company_name, $subcategories)
    {
        $sql = "INSERT INTO business (business_id, submit_date, user_id, descr, is_company, company_name, active) 
	  VALUES (NULL, NOW(), :user_id, :descr, :is_company, :company_name, 0)";
        $query = $this->db->prepare($sql);
        $query->execute(array(':user_id' => $user_id, ':descr' => $descr, ':is_company' => $is_company, ':company_name' => $company_name));

        $count =  $query->rowCount();
        if ($count == 1) {
            if($this->add_subcategories($this->db->lastInsertId('business_id'), $subcategories)) {
                $_SESSION["feedback_positive"][] = BUSINESS_CREATED;
                return true;
            }
        }
        $_SESSION["feedback_negative"][] = BUSINESS_NOT_CREATED;
        // default return
        return false;
    }

    /**
     * Adds subcategories to the business
     * @return bool feedback (was it added properly?)
     */
    public function add_subcategories($business_id, $subcategories)
    {
        foreach($subcategories AS $subcategory_id) {
            $sql = "INSERT INTO business_subcategory (business_subcategory_id, business_id, subcategory_id) 
      VALUES (NULL, :business_id, :subcategory_id)";
            $query = $this->db->prepare($sql);
            $query->execute(array(':business_id' => $business_id, ':subcategory_id' => $subcategory_id));
        }
        $count =  $query->rowCount();
        if ($count == 1) {
            return true;
        }
        // default return
        return false;
    }

    /**
     * Updates subcategories for the business
     * @return bool feedback (was it added properly?)
     */
    public function update_subcategories($business_id, $subcategories)
    {
        $sql = "DELETE FROM business_subcategory WHERE business_id = :business_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':business_id' => $business_id));

        return $this->add_subcategories($business_id, $subcategories);
    }

    /**
     * Setter for a business (update)
     * @param int $business_id id of the specific business
     * @return bool feedback (was the update successful ?)
     */
    public function editSave($business_id, $descr, $is_company, $company_name, $subcategories)
    {

        $sql = "UPDATE business SET descr = :descr, is_company = :is_company, company_name = :company_name WHERE business_id = :business_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':business_id' => $business_id, ':descr' => $descr, ':is_company' => $is_company, ':company_name' => $company_name));

        $update_successful = $this->update_subcategories($business_id, $subcategories);

        $count =  $query->rowCount();
        if ($count == 1 OR $update_successful) {
            $_SESSION["feedback_positive"][] = FEEDBACK_EDIT_SUCCESSFUL;
            return true;
        }
        // default return
        $_SESSION["feedbac_negative"][] = FEEDBACK_EDIT_UNSUCCESSFUL;
        return false;
    }

    /**
     * Make selected business active
     * @param int $business_id id of the specific business
     * @return bool feedback (was the update successful ?)
     */
    public function activate($business_id)
    {

        $sql = "UPDATE business SET active = 1 WHERE business_id = :business_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':business_id' => $business_id));

        $count =  $query->rowCount();
        if ($count == 1) {
            return true;
        }
        // default return
        return false;
    }
}
