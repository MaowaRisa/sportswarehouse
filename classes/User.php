<?php
//this class is part of the business layer it uses the DBAccess class
require_once("classes/DBAccess.php");

class User
{
    //private properties
    private $_userId;
    private $_userName;
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

    //get user ID, there is no set as the primary key should not be changed
    public function getUserID()
    {
        return $this->_userId;
    }

    //get user name
    public function getUserName()
    {
        return $this->_userName;
    }

    //set the user name
    public function setUserName($userName)
    {
        $this->_userName = trim($userName);
    }


    //get a user from the database for the id supplied
    public function getUser($id)
    {
        try {
            $pdo = $this->_db->connect();

            $sql = "select userId, userName from user where userId = :userId";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":userId", $id, PDO::PARAM_INT);

            $rows = $this->_db->executeSQL($stmt);

            $row = $rows[0];

            $this->_userId = $row["userId"];
            $this->_userName = $row["userName"];
            // $this->_description = $row["Description"];
        } catch (PDOException $e) {
            throw $e;
        }
    }

    //get a user from the database for the username supplied
    public function getUserByName($name)
    {
        try {
            $pdo = $this->_db->connect();

            $sql = "select userId, userName from user where userName = :userName";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":userName", $name, PDO::PARAM_STR);

            $rows = $this->_db->executeSQL($stmt);
            if(!empty($rows)){
                $row = $rows[0];
                $this->_userId = $row["userId"];
                $this->_userName = $row["userName"];
            }
            // $this->_description = $row["Description"];
        } catch (PDOException $e) {
            throw $e;
        }
    }

    //get all categories
    public function getUsers()
    {
        try {
            //connect to db
            $pdo = $this->_db->connect();

            //set up SQL
            $sql = "select userId, userName from user";
            $stmt = $pdo->prepare($sql);

            //execute SQL
            $rows = $this->_db->executeSQL($stmt);

            return $rows;
        } catch (PDOException $e) {
            throw $e;
        }
    }

    //get a count of all rows
    public function getNumberOfusers()
    {
        try {
            //connect to db
            $pdo = $this->_db->connect();

            //set up SQL and bind parameters
            $sql = "select count(*) from user";
            $stmt = $pdo->prepare($sql);

            //execute SQL
            $value = $this->_db->executeSQLReturnOneValue($stmt);

            return $value;
        } catch (PDOException $e) {
            throw $e;
        }
    }



    //delete a user
    public function deleteUser($id)
    {
        try {
            //connect to db
            $pdo = $this->_db->connect();

            //set up SQL and bind parameters
            $sql = "delete from user where userId=:userId";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":userId", $id, PDO::PARAM_INT);

            //execute SQL
            $value = $this->_db->executeNonQuery($stmt, false);

            return $value;
        } catch (PDOException $e) {
            throw $e;
        }
    }
}
