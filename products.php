<?php
include_once "classes/Product.php";

if(!isset($_SESSION))
{
    session_start();
}
$linkClassFor = "product";
$message = "";
if(isset($_SESSION["username"])){
    $product = new Product();
    
    $title = "Products";

    // For View 
    ob_start();
    include "templates/admin/viewProducts.html.php";
    $output = ob_get_clean();


    include "templates/admin/layout.html.php";
}else{
    header("Location: login.php");
}
?>