<?php
require_once "classes/Authentication.php";
if(!isset($_SESSION))
{
    session_start();
}
$linkClassFor = "users";
if(isset($_SESSION["username"])){
	$title = "Create user";
	$pageHeading = "Create new user";
	
	//the authentication class is static so there is no need to create an instance of the class
	
	
	$message = "";
	
	if(!empty($_POST["username"]) && !empty($_POST["password"]))
	{
		//add user
		$message = Authentication::createUser($_POST["username"], $_POST["password"]);
	}
	
	//start buffer
	ob_start();
	
	//display create user form
	include "templates/admin/createUserForm.html.php";
	
	$output = ob_get_clean();
	
	include "templates/admin/layout.html.php";
}else{
    header("Location: login.php");
}


?>