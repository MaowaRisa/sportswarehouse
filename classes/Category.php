<?php
//this class is part of the business layer it uses the DBAccess class
require_once("classes/DBAccess.php");

class Category
{
    //private properties
    private $_categoryName;
    private $_categoryID;
    private $_description;
    private $_db;

    //constructor sets up the database settings and creates a DBAccess object
    public function __construct()
    {

        //get database settings
        include "settings/db.php";

        try {
            //create database object
            $this->_db = new DBAccess($dsn, $username, $password);
        } catch (PDOException $e) {
            die("Unable to connect to database, " . $e->getMessage());
        }
    }

    //set and get methods

    //get category ID, there is no set as the primary key should not be changed
    public function getCategoryID()
    {
        return $this->_categoryID;
    }

    //get category name
    public function getCategoryName()
    {
        return $this->_categoryName;
    }

    //set the category name
    public function setCategoryName($categoryName)
    {
        $this->_categoryName = trim($categoryName);
    }

    //get the category description
    public function getDescription()
    {
        return $this->_description;
    }

    //set the category description
    public function setDescription($description)
    {
        $this->_description = trim($description);
    }

    //get a category from the database for the id supplied
    public function getCategory($id)
    {
        try {
            $pdo = $this->_db->connect();

            $sql = "select * from category where categoryId = :categoryId";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":categoryId", $id, PDO::PARAM_INT);

            $rows = $this->_db->executeSQL($stmt);

            $row = $rows[0];

            $this->_categoryID = $row["categoryId"];
            $this->_categoryName = $row["categoryName"];
            // $this->_description = $row["Description"];
        } catch (PDOException $e) {
            throw $e;
        }
    }

    //get all categories
    public function getCategories()
    {
        try {
            //connect to db
            $pdo = $this->_db->connect();

            //set up SQL
            $sql = "select * from category";
            $stmt = $pdo->prepare($sql);

            //execute SQL
            $rows = $this->_db->executeSQL($stmt);

            return $rows;
        } catch (PDOException $e) {
            throw $e;
        }
    }

    //get a count of all rows
    public function getNumberOfCategories()
    {
        try {
            //connect to db
            $pdo = $this->_db->connect();

            //set up SQL and bind parameters
            $sql = "select count(*) from category";
            $stmt = $pdo->prepare($sql);

            //execute SQL
            $value = $this->_db->executeSQLReturnOneValue($stmt);

            return $value;
        } catch (PDOException $e) {
            throw $e;
        }
    }

    //insert a new category
    public function insertCategory($catName)
    {
        try {
            //connect to db
            $pdo = $this->_db->connect();

            //set up SQL and bind parameters
            $sql = "Insert into category(categoryName) values(:categoryName)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":categoryName", $catName, PDO::PARAM_STR);

            //execute SQL setting the second parameter to true means the primary key will be returned
            $value = $this->_db->executeNonQuery($stmt, true);

            return "Category added id ".$value;
        } catch (PDOException $e) {
            throw $e;
        }
    }

    //update a category
    public function updateCategory($catName, $id)
    {
        try {
            //connect to db
            $pdo = $this->_db->connect();

            //set up SQL and bind parameters
            $sql = "update category set categoryName=:categoryName where categoryId=:categoryId";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":categoryName", $catName, PDO::PARAM_STR);
            $stmt->bindParam(":categoryId", $id, PDO::PARAM_INT);

            //execute SQL
            $value = $this->_db->executeNonQuery($stmt, false);

            return "Category Updated";
        } catch (PDOException $e) {
            throw $e;
        }
    }

    //delete a category
    public function deleteCategory($id)
    {
        try {
            //connect to db
            $pdo = $this->_db->connect();

            //set up SQL and bind parameters
            $sql = "delete from category where categoryId=:categoryId";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":categoryId", $id, PDO::PARAM_INT);

            //execute SQL
            $value = $this->_db->executeNonQuery($stmt, false);

            return $value;
        } catch (PDOException $e) {
            throw $e;
        }
    }
}
