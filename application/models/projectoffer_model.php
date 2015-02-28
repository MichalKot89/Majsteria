<?php

/**
 * ProjectOfferModel
 */
class ProjectOfferModel
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
     * Getter for all project offers assosiated with a project
     * @return array an array with several objects (the results)
     */
    public function hasPlacedOffer($project_id, $user_id)
    {
        $sql = "SELECT po.project_offer_id
            FROM project_offer po
            WHERE project_id = :project_id AND user_id = :user_id
            LIMIT 20";
        $query = $this->db->prepare($sql);

        $query->execute(array(':project_id' => $project_id, ':user_id' => $user_id));

        if($query->rowCount() > 0) {
            return true;
        }
        return false;
    }

    /**
     * Getter for all project offers assosiated with a project
     * @return array an array with several objects (the results)
     */
    public function getProjectOffersForProject($project_id)
    {
        $sql = "SELECT po.project_offer_id, po.project_id, po.submit_date, po.user_id, po.descr,
                po.offer_value, po.offer_type, po.active, po.deleted, ui.first_name, ui.last_name, 
                ui.phone, b.is_company, b.company_name, pc.city
            FROM project_offer po
            JOIN user_info ui ON ui.user_id = po.user_id
            JOIN business b ON b.user_id = po.user_id
            JOIN post_code pc ON pc.post_code_id = ui.post_code_id
            WHERE project_id = :project_id
            ";
        $query = $this->db->prepare($sql);

        $query->execute(array(':project_id' => $project_id));

        // fetchAll() is the PDO method that gets all result rows
        return $query->fetchAll();
    }

    /**
     * Getter for a single project_offer
     * @param int $project_offer_id id of the specific note
     * @return object a single object (the result)
     */
    public function getProjectOffer($project_offer_id)
    {
        $sql = "SELECT po.project_offer_id, po.project_id, po.submit_date, po.user_id, po.descr,
                po.offer_value, po.offer_type, po.active, po.deleted
            FROM project_offer po
            WHERE p.project_offer_id = :project_offer_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':project_offer_id' => $project_offer_id));

        // fetch() is the PDO method that gets a single result
        return $query->fetch();
    }

    /**
     * Get all project_offers from a single user
     * @param user_id
     * @return array an array with several objects (the results)
     */
    public function getProjectOffersByUser($user_id)
    {
        $sql = "SELECT po.project_offer_id, po.project_id, po.submit_date, po.user_id, po.descr,
                po.offer_value, po.offer_type, po.active, po.deleted
            FROM project_offer po
            WHERE user_id = :user_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':user_id' => $user_id));

        // fetchAll() is the PDO method that gets all result rows
        return $query->fetchAll();
    }

    /**
     * Setter for a project_offer (create)
     * @return bool feedback (was the project_offer created properly ?)
     */
    public function create($project_id, $user_id, $descr, $offer_value, $offer_type)
    {
        $sql = "INSERT INTO project_offer (project_offer_id, project_id, submit_date, user_id, descr, offer_value, offer_type, active, deleted) 
	  VALUES (NULL, :project_id, NOW(), :user_id, :descr, :offer_value, :offer_type, 0, 0)";
        $query = $this->db->prepare($sql);
        $query->execute(array(':project_id' => $project_id, ':user_id' => $user_id, ':descr' => $descr, ':offer_value' => $offer_value, ':offer_type' => $offer_type));

        $count =  $query->rowCount();
        if ($count == 1) {
            $_SESSION["feedback_positive"][] = PROJECT_OFFER_CREATED;
            return true;
        }
        // default return
        $_SESSION["feedback_negative"][] = PROJECT_OFFER_NOT_CREATED;
        return false;
    }

    /**
     * Setter for a project_offer (update)
     * @param int $project_offer_id id of the specific project_offer
     * @return bool feedback (was the update successful ?)
     */
    public function editSave($project_offer_id, $descr, $offer_value, $offer_type)
    {

        $sql = "UPDATE project_offer SET descr = :descr, offer_value = :offer_value, offer_type = :offer_type 
            WHERE project_offer_id = :project_offer_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':project_offer_id' => $project_offer_id, ':descr' => $descr, ':offer_value' => $offer_value, ':offer_type' => $offer_type));

        $count =  $query->rowCount();
        if ($count == 1) {
            $_SESSION["feedback_positive"][] = FEEDBACK_EDIT_SUCCESSFUL;
            return true;
        }
        // default return
        $_SESSION["feedback_negative"][] = FEEDBACK_EDIT_UNSUCCESSFUL;
        return false;
    }

    /**
     * Marks specific project_offer as deleted
     * @param int $project_offer_id
     * @return bool feedback
     */
    public function delete($project_offer_id)
    {
        $sql = "UPDATE project_offer SET deleted = 1 WHERE project_offer_id = :project_offer_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':project_offer_id' => $project_offer_id));

        $count =  $query->rowCount();
        if ($count == 1) {
            return true;
        }
        // default return
        return false;
    }

    /**
     * Make selected project_offer active
     * @param int $project_offer_id id of the specific project_offer
     * @return bool feedback (was the update successful ?)
     */
    public function activate($project_offer_id)
    {

        $sql = "UPDATE project_offer SET active = 1 WHERE project_offer_id = :project_offer_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':project_offer_id' => $project_offer_id));

        $count =  $query->rowCount();
        if ($count == 1) {
            return true;
        }
        // default return
        return false;
    }
}
