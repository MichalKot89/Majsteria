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
        $sql = "SELECT project_id, submit_date, user_id, when, descr, post_code, subcategory, subsubcategory FROM project";
        $query = $this->db->prepare($sql);
        $query->execute();

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
        $sql = "SELECT project_id, submit_date, user_id, when, descr, post_code, subcategory, subsubcategory FROM project WHERE project_id = :project_id";
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
        $sql = "SELECT project_id, submit_date, user_id, when, descr, post_code, subcategory, subsubcategory FROM project WHERE user_id = :user_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':user_id' => $user_id));

        // fetchAll() is the PDO method that gets all result rows
        return $query->fetchAll();
    }

    /**
     * Setter for a project (create)
     * @return bool feedback (was the project created properly ?)
     */
    public function create($user_id, $when, $descr, $post_code, $subcategory, $subsubcategory = NULL)
    {
        $sql = "INSERT INTO project (project_id, submit_date, user_id, when, descr, post_code, subcategory, subsubcategory, active) 
	  VALUES (NULL, NOW(), :user_id, :descr, :post_code, :subcategory, :subsubcategory, 0)";
        $query = $this->db->prepare($sql);
        $query->execute(array(':user_id' => $user_id, ':when' => $when, ':descr' => $descr, ':post_code' => $post_code, 
	  ':subcategory' => $subcategory, ':subsubcategory' => $subsubcategory));

        $count =  $query->rowCount();
        if ($count == 1) {
            return true;
        }
        // default return
        return false;
    }

    /**
     * Setter for a project (update)
     * @param int $project_id id of the specific project
     * @return bool feedback (was the update successful ?)
     */
    public function editSave($when, $descr, $post_code, $subcategory, $subsubcategory = NULL)
    {

        $sql = "UPDATE project SET when = :when, descr = :descr, post_code = :post_code, subcategory = :subcategory, subsubcategory = :subsubcategory WHERE project_id = :project_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':project_id' => $project_id, ':when' => $when, ':descr' => $descr, ':post_code' => $post_code, ':subcategory' => $subcategory, 
            ':subsubcategory' => $subsubcategory));

        $count =  $query->rowCount();
        if ($count == 1) {
            return true;
        }
        // default return
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
            return true;
        }
        // default return
        return false;
    }
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
            return true;
        }
        // default return
        return false;
    }
}
