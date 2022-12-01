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

if(isset($_SESSION["username"])){

    $title = "Update category";
	$pageHeading = "update category";

    $category = new Category();

    if(isset($_GET["id"])){
        $catID = $_GET["id"];
    }elseif(isset($_POST["category-id"])){
        $catID = $_POST["category-id"];
    }else{
        $catID = 0;
    }

    // For Form value
    $category->getCategory($catID);

    $message = "";
	if(isset($_POST)){
        // var_dump($_POST["username"]);
        // var_dump($_POST["user-id"]);
        if(!empty($_POST["categoryName"]) && !empty($_POST["category-id"])){

            $message = $category->updateCategory($_POST["categoryName"], $_POST["category-id"]);
            if($message == "Category Updated"){
                header("Location: categories.php");
            }
        }
    }
	
    // For View 
    ob_start();
    include "templates/admin/updateCategoryForm.html.php";
    $output = ob_get_clean();


    include "templates/admin/layout.html.php";
}else{
    header("Location: login.php");
}
?>