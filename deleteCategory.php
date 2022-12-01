<?php
include_once "classes/DBAccess.php";
include_once "classes/Category.php";

if(!isset($_SESSION))
{
    session_start();
}
$linkClassFor = "category";

if(isset($_SESSION["username"])){

    $title = "Update category";
	$pageHeading = "update category";

    $category = new Category();

    if(!empty($_GET["id"])){
        $value = $category->deleteCategory($_GET["id"]);
        if($value === -1){
            $message = "This category cannot be deleted!";
        }else{
            $message = "The category was deleted";
        }
        
    }
	
    // For View 
    ob_start();
    include "templates/admin/viewCategories.html.php";
    $output = ob_get_clean();


    include "templates/admin/layout.html.php";
}else{
    header("Location: login.php");
}
?>