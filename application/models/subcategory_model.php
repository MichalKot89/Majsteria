<?php

/**
 * SubcategoryModel
 * This is basically a simple CRUD (Create/Read/Update/Delete) demonstration.
 */
class SubcategoryModel
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
     * Getter for all subcategories
     * @return array an array with several objects (the results)
     */
    public function getAllSubcategories()
    {
        $sql = "SELECT subcategory_id, category_id, name, specialist_name, seo_url, meta_title, meta_descr, meta_keywords, content FROM subcategory ORDER BY name ASC";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetchAll() is the PDO method that gets all result rows
        return $query->fetchAll();
    }
    
    
    /**
     * Getter for all categories
     * @return array an array with several objects (the results)
     */
    public function getAllCategories()
    {
        $sql = "SELECT category_id, name FROM category ORDER BY category_id ASC";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetchAll() is the PDO method that gets all result rows
        return $query->fetchAll();
    }

    /**
     * Getter for a single subcategory
     * @param int $subcategory_id id of the specific note
     * @return object a single object (the result)
     */
    public function getSubcategory($subcategory_id)
    {
        $sql = "SELECT subcategory_id, category_id, name, specialist_name, seo_url, meta_title, meta_descr, meta_keywords, content FROM subcategory WHERE subcategory_id = :subcategory_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':subcategory_id' => $subcategory_id));

        // fetch() is the PDO method that gets a single result
        return $query->fetch();
    }

    /**
     * Getter for a single subcategory
     * @param seo_url
     * @return object a single object (the result)
     */
    public function getSubcategoryByName($seo_url)
    {
        $sql = "SELECT subcategory_id, category_id, name, specialist_name, seo_url, meta_title, meta_descr, meta_keywords, content FROM subcategory WHERE seo_url = :seo_url";
        $query = $this->db->prepare($sql);
        $query->execute(array(':seo_url' => $seo_url));

        // fetch() is the PDO method that gets a single result
        return $query->fetch();
    }

    /**
     * Setter for a subcategory (create)
     * @return bool feedback (was the note created properly ?)
     */
    public function create($category_id, $name, $specialist_name, $seo_url, $meta_title, $meta_descr, $meta_keywords, $content)
    {
        $sql = "INSERT INTO subcategory (category_id, name, specialist_name, seo_url, meta_title, meta_descr, meta_keywords, content) 
	  VALUES (:category_id, :name, :specialist_name, :seo_url, :meta_title, :meta_descr, :meta_descr, :content)";
        $query = $this->db->prepare($sql);
        $query->execute(array(':category_id' => $category_id, ':name' => $name, ':specialist_name' => $specialist_name, 
	  ':seo_url' => $seo_url, ':meta_title' => $meta_title, ':meta_descr' => $meta_descr, ':meta_keywords' => $meta_keywords, ':content' => $content));

        $count =  $query->rowCount();
        if ($count == 1) {
            return true;
        } else {
            $_SESSION["feedback_negative"][] = FEEDBACK_NOTE_CREATION_FAILED;
        }
        // default return
        return false;
    }

    /**
     * Setter for a subcategory (update)
     * @param int $subcategory_id id of the specific subcategory
     * @return bool feedback (was the update successful ?)
     */
    public function editSave($subcategory_id, $category_id, $name, $specialist_name, $seo_url, $meta_title, $meta_descr, $meta_keywords, $content)
    {

        $sql = "UPDATE subcategory SET category_id = :category_id, name = :name, specialist_name = :specialist_name, seo_url = :seo_url, meta_title = :meta_title, 
	  meta_descr = :meta_descr, meta_keywords = :meta_keywords, content = :content WHERE subcategory_id = :subcategory_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':subcategory_id' => $subcategory_id, ':category_id' => $category_id, ':name' => $name, ':specialist_name' => $specialist_name, 
	  ':seo_url' => $seo_url, ':meta_title' => $meta_title, ':meta_descr' => $meta_descr, ':meta_keywords' => $meta_keywords, ':content' => $content));

        $count =  $query->rowCount();
        if ($count == 1) {
            return true;
        } else {
            $_SESSION["feedback_negative"][] = FEEDBACK_NOTE_EDITING_FAILED;
        }
        // default return
        return false;
    }

    /**
     * Deletes a specific subcategory
     * @param int $subcategory_id id of the note
     * @return bool feedback (was the note deleted properly ?)
     */
    public function delete($subcategory_id)
    {
        $sql = "DELETE FROM subcategory WHERE subcategory_id = :subcategory_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':subcategory_id' => $subcategory_id));

        $count =  $query->rowCount();

        if ($count == 1) {
            return true;
        } else {
            $_SESSION["feedback_negative"][] = FEEDBACK_NOTE_DELETION_FAILED;
        }
        // default return
        return false;
    }
}
