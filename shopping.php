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

$title = "Sports Warehouse | Products";
$pageHeading = "All products";

// Categories
$categoryRows = $category->getCategories();

// category Name variable for active class 
$categoryName = "";
// To get the search value
$searchValue = "";

// View all products
$productRows = $product->getProducts();

// Add item to the cart 
if(isset($_POST["addCartBtn"])){
    // get the item id
    $productId = $_POST["productId"];
    $qty = $_POST["qty"];

    $product->getProduct($productId);

    // create a cart item
    $item = new CartItem($product->getItemName(),$product->getPhoto(), $qty, $product->getPrice(), $productId);
    // check if the shpping cart is exist 
    if(!isset($_SESSION["cart"])){
        $cart = new ShoppingCart();
    }else{
        $cart = $_SESSION["cart"];
    }
    // add/update the cart item to the shopping cart 
    $cart->addItem($item);
    // save the shopping cart in the session 
    $_SESSION["cart"] = $cart;
}
// remove item from the cart 
if(isset($_POST["remove"])){
    if(!empty($_POST["productId"]) && isset($_SESSION["cart"])){
        $productId = $_POST["productId"];
        $item = new CartItem("","", 0, 0, $productId);

        //read shopping cart from session
        $cart = $_SESSION["cart"];
        //remove item from shopping cart
        $cart->removeItem($item);
        //save shopping cart back into session
        $_SESSION["cart"] = $cart; 
        header('Location: cart.php');
    }
}


//For Category Nav
ob_start();
include('templates/displayCategories.html.php');
$categoriesNav = ob_get_clean();

// For View product details
ob_start();
include "templates/viewAllProducts.html.php";
$output = ob_get_clean();

// For footer categoryNav
ob_start();
include('templates/displayFooterCategories.html.php');
$categoriesFooterNav = ob_get_clean();

include "templates/layout.html.php";
?>