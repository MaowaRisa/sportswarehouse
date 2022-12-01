<?php
include_once "classes/DBAccess.php";
include_once "classes/Product.php";
include_once "classes/Category.php";
include_once "classes/CartItem.php";
include_once "classes/ShoppingCart.php";
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

$title = "Sports Warehouse";
$pageHeading = "Featured products";

$product = new Product();
$category = new Category();

// Categories
$categoryRows = $category->getCategories();

// category Name variable for active class 
$categoryName = '';
// To get the search value
$searchValue = "";

// Get Featured Item 
$productRows = $product->getFeaturedProducts();

function setSearchValue($fieldName)
{
    if($_POST){
        echo $_POST[$fieldName];
    }
}

//For Category Nav
ob_start();
include('templates/displayCategories.html.php');
$categoriesNav = ob_get_clean();
// For Featured Items
ob_start();
include "templates/displayProducts.html.php";
$output = ob_get_clean();
// For footer categoryNav
ob_start();
include('templates/displayFooterCategories.html.php');
$categoriesFooterNav = ob_get_clean();
include "templates/layout.html.php";
