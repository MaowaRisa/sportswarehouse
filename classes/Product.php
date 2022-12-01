<?php
//this class is part of the business layer it uses the DBAccess class
require_once("DBAccess.php");

class Product
{
	//private properties
	private $_itemName;
	private $_itemId;
	private $_price;
	private $_photo;
	private $_salePrice;
	private $_description;
	private $_categoryId;
	private $_featured;
	private $_db;

	//constructor sets up the database settings and creates a DBAccess object
	public function __construct()
	{
		//get database settings
		include "settings/db.php";

		try
		{	
			//create database object
			$this->_db = new DBAccess($dsn, $username, $password);
		}
		catch (PDOException $e)
		{
			die("Unable to connect to database, ". $e->getMessage());
		}
	}

	//set and get methods

	//get product ID, there is no set as the primary key should not be changed
	public function getItemID()
	{
		return $this->_itemId;
	}

	//get product name
	public function getItemName()
	{
		return $this->_itemName;
	}

	//get the price
	public function getPrice()
	{
		return $this->_price;
	}
	//get the sale price
	public function getSalePrice()
	{
		return $this->_salePrice;
	}
	//get the photo
	public function getPhoto()
	{
		return $this->_photo;
	}
	//get the category ID
	public function getCategoryId()
	{
		return $this->_categoryId;
	}
	//get the item Description
	public function getDescription()
	{
		return $this->_description;
	}
	//get the item isFeatured
	public function getFeatured()
	{
		return $this->_featured;
	}
	
	//get a product from the database for the id supplied
	public function getProduct($id)
	{
		try
		{
			//connect to db
			$pdo = $this->_db->connect();

			//set up SQL and bind parameters
			$sql = "select itemId, itemName, photo, price, salePrice, description, featured, categoryId from item where itemId =  :itemId";
			$stmt = $pdo->prepare($sql);
			$stmt->bindParam(':itemId', $id, PDO::PARAM_INT);

			//execute SQL
			$rows = $this->_db->executeSQL($stmt);
			// var_dump($rows);
			//get the first row as it is a primary key there will only be one row
			$row = $rows[0];

			//populate the private properties with the retreived values
			$this->_itemId = $row["itemId"];
			$this->_itemName = $row["itemName"];
			$this->_price = $row["price"];
			$this->_salePrice = $row["salePrice"];
			$this->_photo = $row["photo"];
			$this->_description = $row["description"];
			$this->_categoryId = $row["categoryId"];
			$this->_featured = $row["featured"];
		}
		catch (PDOException $e)
		{
			throw $e;
		}
	}
	
	//get all products limiting to 9just for exercise purposes
	public function getProducts()
	{
		try
		{
			//connect to db
			$pdo = $this->_db->connect();

			//set up SQL
			$sql = "select * from item ORDER BY RAND() limit 10";
			$stmt = $pdo->prepare($sql);

			//execute SQL
			$rows = $this->_db->executeSQL($stmt);

			return $rows;
		}
		catch (PDOException $e)
		{
			throw $e;
		}
	}
	// Get all items
	public function getAllProducts()
	{
		try
		{
			//connect to db
			$pdo = $this->_db->connect();

			//set up SQL
			$sql = "select * from item";
			$stmt = $pdo->prepare($sql);

			//execute SQL
			$rows = $this->_db->executeSQL($stmt);

			return $rows;
		}
		catch (PDOException $e)
		{
			throw $e;
		}
	}
	public function getFeaturedProducts(){
		try
		{
			//connect to db
			$pdo = $this->_db->connect();

			$sql = "select itemId, itemName, photo, price, salePrice from item where featured = 1 ORDER BY RAND() limit 5";
			$stmt = $pdo->prepare($sql);
			$rows = $this->_db->executeSQL($stmt);

			return $rows;

		}
		catch(PDOException $e)
		{
			throw $e;
		}
	}
	//get a count of all rows
    public function getNumberOfProducts()
    {
        try {
            //connect to db
            $pdo = $this->_db->connect();

            //set up SQL and bind parameters
            $sql = "select count(*) from item";
            $stmt = $pdo->prepare($sql);

            //execute SQL
            $value = $this->_db->executeSQLReturnOneValue($stmt);

            return $value;
        } catch (PDOException $e) {
            throw $e;
        }
    }
	public function insertProduct($pdName, $photo, $price, $salePrice, $des, $catId, $isFeature)
    {
        try {
            //connect to db
            $pdo = $this->_db->connect();

            //set up SQL and bind parameters
            $sql = "Insert into item(itemName, photo, price, salePrice, description, featured, categoryId) values(:itemName, :photo, :price, :salePrice, :description, :featured, :categoryId)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":itemName", $pdName, PDO::PARAM_STR);
            $stmt->bindParam(":photo", $photo, PDO::PARAM_STR);
            $stmt->bindParam(":price", $price, PDO::PARAM_STR);
            $stmt->bindParam(":salePrice", $salePrice, PDO::PARAM_STR);
            $stmt->bindParam(":description", $des, PDO::PARAM_STR);
            $stmt->bindParam(":featured", $isFeature, PDO::PARAM_BOOL);
            $stmt->bindParam(":categoryId", $catId, PDO::PARAM_INT);

            //execute SQL setting the second parameter to true means the primary key will be returned
            $value = $this->_db->executeNonQuery($stmt, true);

            return "Product added id ".$value;
        } catch (PDOException $e) {
            throw $e;
        }
    }
	public function updateProduct($pdID, $pdName, $photo, $price, $salePrice, $des, $catId, $isFeature){
		try {
            //connect to db
            $pdo = $this->_db->connect();

            //set up SQL and bind parameters
			$sql = "update item set itemName=:itemName, photo=:photo, price=:price, salePrice=:salePrice, description=:description, featured=:featured, categoryId=:categoryId where itemId=:itemId";
            $stmt = $pdo->prepare($sql);
			$stmt->bindParam(":itemName", $pdName, PDO::PARAM_STR);
            $stmt->bindParam(":photo", $photo, PDO::PARAM_STR);
            $stmt->bindParam(":price", $price, PDO::PARAM_STR);
            $stmt->bindParam(":salePrice", $salePrice, PDO::PARAM_STR);
            $stmt->bindParam(":description", $des, PDO::PARAM_STR);
            $stmt->bindParam(":featured", $isFeature, PDO::PARAM_BOOL);
            $stmt->bindParam(":categoryId", $catId, PDO::PARAM_INT);
            $stmt->bindParam(":itemId", $pdID, PDO::PARAM_INT);

            //execute SQL
            $value = $this->_db->executeNonQuery($stmt, false);

            return "Product Updated";
        } catch (PDOException $e) {
            throw $e;
        }
	}
	//delete a Product
    public function deleteProduct($id)
    {
        try {
            //connect to db
            $pdo = $this->_db->connect();

            //set up SQL and bind parameters
            $sql = "delete from item where itemId=:itemId";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":itemId", $id, PDO::PARAM_INT);

            //execute SQL
            $value = $this->_db->executeNonQuery($stmt, false);

            return $value;
        } catch (PDOException $e) {
            throw $e;
        }
    }
}

?>