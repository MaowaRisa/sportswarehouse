<?php
include_once "classes/DBAccess.php";
include_once "classes/Product.php";
include_once "classes/Category.php";
include_once "classes/CartItem.php";
include_once "classes/ShoppingCart.php";
include_once "classes/User.php";
include_once "classes/Order.php";

if(!isset($_SESSION))
{
    session_start();
}
$linkClassFor = "dashboard";
if(isset($_SESSION["username"])){
    $product = new Product();
    $category = new Category();
    $user = new User();
    $order = new Order();
    
    $title = "Dashboard";

    // For View 
    ob_start();
    include "templates/admin/dashboard.html.php";
    $output = ob_get_clean();


    include "templates/admin/layout.html.php";
}else{
    header("Location: login.php");
}
?>