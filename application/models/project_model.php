<?php

/**
 * ProjectModel
 */
class ProjectModel
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
     * Getter for all projects
     * @return array an array with several objects (the results)
     */
    public function getAllProjects()
    {
        $sql = "SELECT p.project_id, p.submit_date, p.user_id, p.timeline, p.descr, p.post_code_id, 
                p.subcategory_id, p.subsubcategory_id, p.active, p.deleted, pc.post_code, s.name AS subcategory_name
            FROM project p
            JOIN subcategory s ON s.subcategory_id = p.subcategory_id
            JOIN post_code pc ON pc.post_code_id = p.post_code_id
            WHERE deleted = 0";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetchAll() is the PDO method that gets all result rows
        return $query->fetchAll();
    }

    /**
     * Getter for matching projects
     * @return array an array with several objects (the results)
     */
    public function getMatchingProjects($user_id, $post_code)
    {
        $sql = "SELECT p.project_id, p.submit_date, p.user_id, p.timeline, p.descr, p.post_code_id,
                p.subcategory_id, p.subsubcategory_id, p.active, p.deleted, pc.post_code, s.name AS subcategory_name
            FROM project p
            JOIN subcategory s ON s.subcategory_id = p.subcategory_id
            JOIN business_subcategory bs ON bs.subcategory_id = p.subcategory_id
            JOIN business b ON b.business_id = bs.business_id
            JOIN post_code pc ON pc.post_code_id = p.post_code_id
            WHERE b.user_id = :user_id AND p.user_id <> :user_id AND pc.post_code LIKE :post_code
                AND deleted = 0
            LIMIT 20";
        $query = $this->db->prepare($sql);

        $query->execute(array(':user_id' => $user_id, 
            ':post_code' => substr($post_code, 0, 3) . '%'));

        // fetchAll() is the PDO method that gets all result rows
        return $query->fetchAll();
    }

    /**
     * Getter for a single project
     * @param int $project_id id of the specific note
     * @return object a single object (the result)
     */
    public function getProject($project_id)
    {
        $sql = "SELECT p.project_id, p.submit_date, p.user_id, p.timeline, p.descr, p.post_code_id, 
                p.subcategory_id, p.subsubcategory_id, p.active, p.deleted, pc.post_code, pc.city, s.name AS subcategory_name
            FROM project p
            JOIN subcategory s ON s.subcategory_id = p.subcategory_id
            JOIN post_code pc ON pc.post_code_id = p.post_code_id 
            WHERE p.project_id = :project_id AND deleted = 0";
        $query = $this->db->prepare($sql);
        $query->execute(array(':project_id' => $project_id));

        // fetch() is the PDO method that gets a single result
        return $query->fetch();
    }

    /**
     * Get all projects from a single user
     * @param user_id
     * @return array an array with several objects (the results)
     */
    public function getProjectsByUser($user_id)
    {
        $sql = "SELECT p.project_id, p.submit_date, p.user_id, p.timeline, p.descr, p.post_code_id, 
                p.subcategory_id, p.subsubcategory_id, p.active, p.deleted, pc.post_code, s.name AS subcategory_name
            FROM project p
            JOIN subcategory s ON s.subcategory_id = p.subcategory_id 
            JOIN post_code pc ON pc.post_code_id = p.post_code_id
            WHERE user_id = :user_id AND deleted = 0";
        $query = $this->db->prepare($sql);
        $query->execute(array(':user_id' => $user_id));

        // fetchAll() is the PDO method that gets all result rows
        return $query->fetchAll();
    }

    /**
     * Setter for a project (create)
     * @return bool feedback (was the project created properly ?)
     */
    public function create($user_id, $timeline, $descr, $post_code_id, $subcategory_id, $subsubcategory_id = NULL)
    {
        $sql = "INSERT INTO project (project_id, submit_date, user_id, timeline, descr, post_code_id, subcategory_id, subsubcategory_id, active, deleted) 
	  VALUES (NULL, NOW(), :user_id, :timeline, :descr, :post_code_id, :subcategory_id, :subsubcategory_id, 0, 0)";
        $query = $this->db->prepare($sql);
        $query->execute(array(':user_id' => $user_id, ':timeline' => $timeline, ':descr' => $descr, ':post_code_id' => $post_code_id, ':subcategory_id' => $subcategory_id, ':subsubcategory_id' => $subsubcategory_id));

        $count =  $query->rowCount();
        if ($count == 1) {
            $_SESSION["feedback_positive"][] = PROJECT_CREATED;
            return true;
        }
        // default return
        $_SESSION["feedback_negative"][] = PROJECT_NOT_CREATED;
        return false;
    }

    /**
     * Setter for a project (update)
     * @param int $project_id id of the specific project
     * @return bool feedback (was the update successful ?)
     */
    public function editSave($project_id, $timeline, $descr, $post_code_id, $subcategory_id, $subsubcategory_id = NULL)
    {

        $sql = "UPDATE project SET timeline = :timeline, descr = :descr, post_code_id = :post_code_id, subcategory_id = :subcategory_id, subsubcategory_id = :subsubcategory_id WHERE project_id = :project_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':project_id' => $project_id, ':timeline' => $timeline, ':descr' => $descr, ':post_code_id' => $post_code_id, ':subcategory_id' => $subcategory_id, 
            ':subsubcategory_id' => $subsubcategory_id));

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
     * Marks specific project as deleted
     * @param int $project_id
     * @return bool feedback
     */
    public function delete($project_id)
    {
        $sql = "UPDATE project SET deleted = 1 WHERE project_id = :project_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':project_id' => $project_id));

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
     * Make selected project active
     * @param int $project_id id of the specific project
     * @return bool feedback (was the update successful ?)
     */
    public function activate($project_id)
    {

        $sql = "UPDATE project SET active = 1 WHERE project_id = :project_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':project_id' => $project_id));

        $count =  $query->rowCount();
        if ($count == 1) {
            $_SESSION["feedback_positive"][] = FEEDBACK_EDIT_SUCCESSFUL;
            return true;
        }
        // default return
        $_SESSION["feedback_negative"][] = FEEDBACK_EDIT_UNSUCCESSFUL;
        return false;
    }
}
