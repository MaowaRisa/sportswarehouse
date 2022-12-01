<?php
//this class is part of the business layer it uses the DBAccess class
require_once("DBAccess.php");
require_once("User.php");

class Authentication
{
	//constants hold values that do not change
	const LoginPageURL = "login.php";
	const SuccessPageURL = "dashboard.php";

	private static $_db;

	//create a new user 
	public static function createUser($uname, $pword)
	{
	
        $user = new User();
        $user->getUserByName($uname);
        $userExist = $user->getUserName();

        if($userExist !== NULL){
            return "User exist! Please choose another username.";
        }else{
            //hash the password
            $hash = password_hash($pword, PASSWORD_DEFAULT);

            //get database settings
            include "settings/db.php";

            try
            {	
                //create database object, as the class is static we need to use
                //the keyword self instead of this
                self::$_db = new DBAccess($dsn, $username, $password);
                //$this->_db = new DBAccess($dsn, $username, $password);
            }
            catch (PDOException $e)
            {
                die("Unable to connect to database, ". $e->getMessage());
            }

            //add user to database
            try
            {
                //connect to db as the class is static we need to use
                //the keyword self instead of this
                $pdo = self::$_db->connect();

                //set up SQL and bind parameters
                $sql = "insert into user(username, password) values(:username, :password)";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(":username", $uname, PDO::PARAM_STR);
                $stmt->bindParam(":password", $hash, PDO::PARAM_STR);

                //execute SQL as the class is static we need to use
                //the keyword self instead of this
                $result = self::$_db->executeNonQuery($stmt);
            }
            catch (PDOException $e)
            {
                throw $e;
            }

            return "New user added";
        }
		
	}

	//Update user 
	public static function updateUser($uname, $userId)
	{
	
        $user = new User();
        $user->getUserByName($uname);
        $userExist = $user->getUserName();

        if($userExist !== NULL){
            return "User exist! Please choose another username.";
        }else{
			
            //get database settings
            include "settings/db.php";

            try
            {	
                //create database object, as the class is static we need to use
                //the keyword self instead of this
                self::$_db = new DBAccess($dsn, $username, $password);
                //$this->_db = new DBAccess($dsn, $username, $password);
            }
            catch (PDOException $e)
            {
                die("Unable to connect to database, ". $e->getMessage());
            }

            //add user to database
            try
            {
                //connect to db as the class is static we need to use
                //the keyword self instead of this
                $pdo = self::$_db->connect();
				
				//set up SQL and bind parameters
				$sql = "update user set userName=:userName where userId = :userId";
				$stmt = $pdo->prepare($sql);
				$stmt->bindValue(":userName" , $uname, PDO::PARAM_STR);
				$stmt->bindValue(":userId" , $userId, PDO::PARAM_INT);
		
				$result = self::$_db->executeNonQuery($stmt, false);		
				
            }
            catch (PDOException $e)
            {
                throw $e;
            }

            return "done";
        }
		
	}

	//Reset user password 
	public static function replaceUserPass($uname, $pword, $userId)
	{
        $user = new User();
        $user->getUserByName($uname);
        $userExist = $user->getUserName();
  
		if($pword !== ""){
			//hash the password
			$hash = password_hash($pword, PASSWORD_DEFAULT);
		}else{
			return "password cannot be empty!";
		}
		
		//get database settings
		include "settings/db.php";

		try
		{	
			//create database object, as the class is static we need to use
			//the keyword self instead of this
			self::$_db = new DBAccess($dsn, $username, $password);
			//$this->_db = new DBAccess($dsn, $username, $password);
		}
		catch (PDOException $e)
		{
			die("Unable to connect to database, ". $e->getMessage());
		}

		//add user to database
		try
		{
			//connect to db as the class is static we need to use
			//the keyword self instead of this
			$pdo = self::$_db->connect();
			
			$sql = "update user set userName=:userName, password=:password where userId = :userId";
			$stmt = $pdo->prepare($sql);
			$stmt->bindValue(":userName" , $uname, PDO::PARAM_STR);
			$stmt->bindValue(":password" , $hash, PDO::PARAM_STR);
			$stmt->bindValue(":userId" , $userId, PDO::PARAM_INT);
	
			$result = self::$_db->executeNonQuery($stmt, false);
			
		}
		catch (PDOException $e)
		{
			throw $e;
		}

		return "done";
        
		
	}


	public static function login($uname, $pword)
	{
		$hash = "";

		//get database settings
		include "settings/db.php";
		
		try
		{	
			//create database object, as the class is static we need to use
			//the keyword self instead of this
			self::$_db = new DBAccess($dsn, $username, $password);
		}
		catch (PDOException $e)
		{
			die("Unable to connect to database, ". $e->getMessage());
		}

		//check if user exists in database
		try
		{
			//connect to db as the class is static we need to use
			//the keyword self instead of this
			$pdo = self::$_db->connect();

			//set up SQL and bind parameters
			$sql = "select password from user where username=:username";
			$stmt = $pdo->prepare($sql);
			$stmt->bindParam(":username", $uname, PDO::PARAM_STR);

			//execute SQL as the class is static we need to use
			//the keyword self instead of this
			$hash = self::$_db->executeSQLReturnOneValue($stmt);
		}
		catch (PDOException $e)
		{
			throw $e;
		}

		if(password_verify($pword, $hash))
		{
			//success password and username match
			$_SESSION["username"] = $uname;

			//redirect the user to the success page
			header("Location: " . self::SuccessPageURL);
			
			exit;
		}
		else
		{
			return false;
		}
	}

	// Change Password
	public static function changePassword($userId, $uname ,$currentPword, $newPword)
	{
		$hash = "";

		//get database settings
		include "settings/db.php";
		
		try
		{	
			//create database object, as the class is static we need to use
			//the keyword self instead of this
			self::$_db = new DBAccess($dsn, $username, $password);
		}
		catch (PDOException $e)
		{
			die("Unable to connect to database, ". $e->getMessage());
		}

		//check if user exists in database
		try
		{
			//connect to db as the class is static we need to use
			//the keyword self instead of this
			$pdo = self::$_db->connect();

			//set up SQL and bind parameters
			$sql = "select password from user where username=:username";
			$stmt = $pdo->prepare($sql);
			$stmt->bindParam(":username", $uname, PDO::PARAM_STR);

			//execute SQL as the class is static we need to use
			//the keyword self instead of this
			$hash = self::$_db->executeSQLReturnOneValue($stmt);
		}
		catch (PDOException $e)
		{
			throw $e;
		}
		
		if(password_verify($currentPword, $hash))
		{
			
			//hash the password
            $hash = password_hash($newPword, PASSWORD_DEFAULT);
			$pdo = self::$_db->connect();
			
			$sql = "update user set password=:password where userId = :userId";
			$stmt = $pdo->prepare($sql);
			$stmt->bindValue(":password" , $hash, PDO::PARAM_STR);
			$stmt->bindValue(":userId" , $userId, PDO::PARAM_INT);

			$result = self::$_db->executeNonQuery($stmt, false);
			//redirect the user to the success page
			header("Location: dashboard.php");
			
			exit;
		}
		else
		{
			return false;
		}
	}
	//log user out 
	public static function logout()
	{
		//remove username from the session
		unset($_SESSION["username"]);

		//redirect the user to the login page
		header("Location: " . self::LoginPageURL);
		exit;
	}

	//check if user is logged in
	public static function protect()
	{
		if(!isset($_SESSION["username"]))
		{
			//redirect the user to the login page
			header("Location: " . self::LoginPageURL);
			exit;
		}
	}

	
}
