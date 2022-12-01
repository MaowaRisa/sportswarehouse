<?php
require_once "classes/Authentication.php";
require_once "classes/User.php";
if(!isset($_SESSION))
{
    session_start();
}
$linkClassFor = "users";
if(isset($_SESSION["username"])){
	$title = "update user";

    if(isset($_GET["id"])){
        $userID = $_GET["id"];
    }elseif(isset($_POST["user-id"])){
        $userID = $_POST["user-id"];
    }else{
        $userID = 0;
    }

    $user = new User();

    // For Form value
    $user->getUser($userID);

	//the authentication class is static so there is no need to create an instance of the class
    // var_dump($_POST);
	$message = "";
	if(isset($_POST)){
        // var_dump($_POST["username"]);
        // var_dump($_POST["user-id"]);
        if(!empty($_POST["username"]) && !empty($_POST["user-id"])){

            $message = Authentication::updateUser($_POST["username"], $_POST["user-id"]);
            if($message == "done"){
                header("Location: users.php");
            }
        }
    }

	if(!empty($_POST["username"]) && !empty($_POST["password"]))
	{
		//add user
		$message = Authentication::createUser($_POST["username"], $_POST["password"]);
	}
	
	//start buffer
	ob_start();
	
	//display create user form
	include "templates/admin/updateUserForm.html.php";
	
	$output = ob_get_clean();
	
	include "templates/admin/layout.html.php";
}else{
    header("Location: login.php");
}


?>