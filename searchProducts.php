<?php
include_once "classes/DBAccess.php";
include_once "classes/Product.php";
include_once "classes/Category.php";
include_once "classes/CartItem.php";
include_once "classes/ShoppingCart.php";
$title = "Search | Sports Warehouse";
$pageHeading = "Search Result";

include "settings/db.php";

if(!isset($_SESSION))
{
    session_start();
}
// total item in cart 
$totalCartItem = 0;
if (isset($_SESSION["cart"])){
    $cart = $_SESSION["cart"];
    $cartItems = $cart->getItems();
    $totalCartItem = count($cartItems);
}

$db = new DBAccess($dsn, $username, $password);
$pdo = $db->connect();

// Categories
$categorySql = "select categoryId, categoryName from category";
$categoryStmt = $pdo->prepare($categorySql);

$categoryRows = $db->executeSQL($categoryStmt);
// category Name variable for active class 
$categoryName = "";
// To get the search value
$searchValue = "";

//For Category Nav
ob_start();
include('templates/displayCategories.html.php');
$categoriesNav = ob_get_clean();

ob_start();
//Search Products
if (isset($_POST["submit-searchBtn"])) {
    if($_POST["searchValue"]){

        $searchValue = $_POST["searchValue"];

        $sql = "select itemId, itemName, photo, price, salePrice from item where itemName like '%".$_POST["searchValue"]."%'";
        $stmt = $pdo->prepare($sql);
        $productRows = $db->executeSQL($stmt);

        if($productRows){
            include "templates/displayProducts.html.php";
        }else{
            include "templates/noResult.html.php";
        }
    }else{
        include "templates/noResult.html.php";
    }
    
}

$output = ob_get_clean();

// For footer categoryNav
ob_start();
include('templates/displayFooterCategories.html.php');
$categoriesFooterNav = ob_get_clean();

include "templates/layout.html.php";
