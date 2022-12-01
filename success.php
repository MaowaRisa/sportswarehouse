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

$title = "Purchase Completed";
$pageHeading = "Purchase Status";

// Categories
$categoryRows = $category->getCategories();

// category Name variable for active class 
$categoryName = "";
// To get the search value
$searchValue = "";


$orderId = 0;
// for display error message
$first_name = '';
$customer_address = '';
$customer_phone = '';
$customer_email = '';
$card_number = '';
$card_owner = '';
$card_expiry = '';
$card_csv = '';

if(isset($_POST) && isset($_SESSION["cart"])){
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $address = $_POST["address"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $creditcard = $_POST["creditcard"];
    $nameOnCard = $_POST["nameOnCard"];
    $expiry = $_POST["expiry"];
    $csv = $_POST["csv"];

    // check required fields
    $requiredFields = ["firstName" => "* Firstname is required", "address" => "* address is required", "phone" => "* phone is required","email" => "* email is required", "creditcard" => "* card number is required","nameOnCard" => "* card owner name is required", "expiry" => "* expire date is required", "csv" => "* csv is required"];

    $missingFields = [];
    
    foreach($requiredFields as $field => $description){

        if(!isset($_POST[$field]) || !$_POST[$field]){

            // if the field is missing add into missingfields array
            $missingFields[$field] = $description;
        }
    }
    if($missingFields){
        // show the missing fields in contact form
        foreach($missingFields as $key => $value){
            if($key == "firstName"){
                $first_name = $value;
            }elseif($key == "address"){
                $customer_address = $value;
            }elseif($key == "email"){
                $customer_email = $value;
            }elseif($key == "phone"){
                $customer_phone = $value;
            }elseif($key == "creditcard"){
                $card_number = $value;
            }elseif($key == "nameOnCard"){
                $card_owner = $value;
            }elseif($key == "expiry"){
                $card_expiry = $value;
            }elseif($key == "csv"){
                $card_csv = $value;
            }
        }
        // include "templates/contactForm.html.php";
    }else{
        $cart = $_SESSION["cart"];

        $orderId = $cart->saveCart($address, $phone, $creditcard, $csv, $email, $expiry, $firstName, $lastName, $nameOnCard);

        session_destroy();
        unset($_POST);
        // $successMsg = "Successfully purchase completed!";
        // // include "templates/contactForm.html.php";
    }
    
}

//For Category Nav
ob_start();
include('templates/displayCategories.html.php');
$categoriesNav = ob_get_clean();

// For View product details
ob_start();
include "templates/confirmation.html.php";
$output = ob_get_clean();

// For footer categoryNav
ob_start();
include('templates/displayFooterCategories.html.php');
$categoriesFooterNav = ob_get_clean();

include "templates/layout.html.php";
?>