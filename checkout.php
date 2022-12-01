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
$product = new Product();
$category = new Category();

$title = "Checkout";
$pageHeading = "Checkout Information";

// Categories
$categoryRows = $category->getCategories();

// category Name variable for active class 
$categoryName = "";
// To get the search value
$searchValue = "";


//For Category Nav
ob_start();
include('templates/displayCategories.html.php');
$categoriesNav = ob_get_clean();

// For View product details
ob_start();
include "templates/checkoutForm.html.php";
$output = ob_get_clean();

// For footer categoryNav
ob_start();
include('templates/displayFooterCategories.html.php');
$categoriesFooterNav = ob_get_clean();

include "templates/layout.html.php";
?>