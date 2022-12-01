<?php
include_once "classes/Product.php";

if(!isset($_SESSION))
{
    session_start();
}
$linkClassFor = "product";

if(isset($_SESSION["username"])){

    $title = "Delete";
	$pageHeading = "Delete Product";

    $product = new Product();

    if(!empty($_GET["id"])){
        $value = $product->deleteProduct($_GET["id"]);
        if($value === -1){
            $message = "This product cannot be deleted!";
        }else{
            $message = "The product was deleted";
        }
        
    }
	
    // For View 
    ob_start();
    include "templates/admin/viewProducts.html.php";
    $output = ob_get_clean();


    include "templates/admin/layout.html.php";
}else{
    header("Location: login.php");
}
?>