<?php
include_once "classes/DBAccess.php";
include_once "classes/Product.php";
include_once "classes/Category.php";
include_once "classes/CartItem.php";
include_once "classes/ShoppingCart.php";
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

// To get the search value
$searchValue = "";

// Get products by category›
if(isset($_GET["id"])){
    // Category for pageHeading
    $categorySql = "select categoryName from category where categoryId=". $_GET["id"];
    $catStmt = $pdo->prepare($categorySql);

    $categoryName = $db->executeSQLReturnOneValue($catStmt);

    $title = "Products | ". $categoryName;
    $pageHeading = $categoryName;

    $sql = "select itemId, itemName, photo, price, salePrice from item where categoryId = ". $_GET["id"];
    $stmt = $pdo->prepare($sql);
    $productRows = $db->executeSQL($stmt);
}

//For Category Nav
ob_start();
include('templates/displayCategories.html.php');
$categoriesNav = ob_get_clean();
// Display products by category
ob_start();
include "templates/displayProducts.html.php";
$output = ob_get_clean();
// For footer categoryNav
ob_start();
include('templates/displayFooterCategories.html.php');
$categoriesFooterNav = ob_get_clean();

include "templates/layout.html.php";
