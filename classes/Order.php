<?php
//this class is part of the business layer it uses the DBAccess class
require_once("classes/DBAccess.php");

class Order
{
    //private properties
    private $_orderId;
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
    public function getOrderID()
    {
        return $this->_orderId;
    }

    //get a count of all rows
    public function getNumberOfOrders()
    {
        try {
            //connect to db
            $pdo = $this->_db->connect();

            //set up SQL and bind parameters
            $sql = "select count(*) from shoppingorder";
            $stmt = $pdo->prepare($sql);

            //execute SQL
            $value = $this->_db->executeSQLReturnOneValue($stmt);

            return $value;
        } catch (PDOException $e) {
            throw $e;
        }
    }
}
