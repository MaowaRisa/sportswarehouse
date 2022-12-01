<?php
require_once "classes/Authentication.php";
require_once "classes/User.php";
if(!isset($_SESSION))
{
    session_start();
}
$linkClassFor = "users";
if(isset($_SESSION["username"])){
	$title = "delete user";

    $user = new User();

    if(!empty($_GET["id"])){
        $user_id = $user->deleteUser($_GET["id"]);
        
        $message = "The user was deleted";
        
    }

	
	//start buffer
	ob_start();
	
	//display create user form
	include "templates/admin/viewUsers.html.php";
	
	$output = ob_get_clean();
	
	include "templates/admin/layout.html.php";
}else{
    header("Location: login.php");
}


?>