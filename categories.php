<?php
include_once "classes/DBAccess.php";
include_once "classes/Product.php";
include_once "classes/Category.php";
include_once "classes/CartItem.php";
include_once "classes/ShoppingCart.php";
include_once "classes/User.php";

if(!isset($_SESSION))
{
    session_start();
}
$linkClassFor = "category";
$message = "";
if(isset($_SESSION["username"])){
    $category = new Category();
    
    $title = "Categories";

    // For View 
    ob_start();
    include "templates/admin/viewCategories.html.php";
    $output = ob_get_clean();


    include "templates/admin/layout.html.php";
}else{
    header("Location: login.php");
}
?>