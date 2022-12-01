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

// Categories
$categoryRows = $category->getCategories();

// category Name variable for active class 
$categoryName = "";
// To get the search value
$searchValue = "";

// Get product details
if(isset($_GET["id"])){
   
    $product->getProduct($_GET["id"]);

    $itemId = $product->getItemID();
    $itemName = $product->getItemName();
    $price = $product->getPrice();
    $salePrice = $product->getSalePrice();
    $photo = $product->getPhoto();
    $description = $product->getDescription();
    $categoryId = $product->getCategoryId();

    // Set the title and heading
    $category->getCategory($categoryId);
    $categoryName = $category->getCategoryName();

    $title = $itemName;
    $pageHeading = "Product Details";

}

//For Category Nav
ob_start();
include('templates/displayCategories.html.php');
$categoriesNav = ob_get_clean();

// For View product details
ob_start();
include "templates/viewProduct.html.php";
$output = ob_get_clean();

// For footer categoryNav
ob_start();
include('templates/displayFooterCategories.html.php');
$categoriesFooterNav = ob_get_clean();

include "templates/layout.html.php";
