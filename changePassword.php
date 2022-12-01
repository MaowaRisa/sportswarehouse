<?php
require_once "classes/Authentication.php";
require_once "classes/User.php";
if(!isset($_SESSION))
{
    session_start();
}
$linkClassFor = "users";
if(isset($_SESSION["username"])){
	$title = "Change Password";
	$pageHeading = "Change your password";
	
	//the authentication class is static so there is no need to create an instance of the class
	
	$user = new User();
    $user->getUserByName($_SESSION["username"]);

	$message = "";
	
	if(!empty($_POST["username"]) && !empty($_POST["passwordCurrent"]) && !empty($_POST["password"]))
	{
        
		//add user
		$message = Authentication::changePassword($_POST["user-id"],$_POST["username"],$_POST["passwordCurrent"], $_POST["password"]);
	}
	
	//start buffer
	ob_start();
	
	//display create user form
	include "templates/admin/changePassForm.html.php";
	
	$output = ob_get_clean();
	
	include "templates/admin/layout.html.php";
}else{
    header("Location: login.php");
}


?>