<?php

include_once "classes/Category.php";


if(!isset($_SESSION))
{
    session_start();
}
$linkClassFor = "category";

if(isset($_SESSION["username"])){

    $title = "Create Category";
	$pageHeading = "Create new category";

    $category = new Category();

    $message = "";
	if(!empty($_POST["CategoryName"]))
	{
		//add user
		$message = $category->insertCategory($_POST["CategoryName"]);
	}
	
    // For View 
    ob_start();
    include "templates/admin/createCategoryForm.html.php";
    $output = ob_get_clean();


    include "templates/admin/layout.html.php";
}else{
    header("Location: login.php");
}
?>