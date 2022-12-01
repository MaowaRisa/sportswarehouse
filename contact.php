<?php
include_once "classes/DBAccess.php";
include_once "classes/Product.php";
include_once "classes/Category.php";
include_once "classes/CartItem.php";
include_once "classes/ShoppingCart.php";

$title = "Contact | Sports Warehouse";
$pageHeading = "Contact Us";

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

// Contact Form
// for display error/sucess message
$first_name = "";
$last_name = "";
$email = "";
$successMsg = "";

// Validate form fields
if(isset($_POST["submitMsgBtn"])){
    // check required fields
    $requiredFields = ["firstName" => "* Firstname is required", "lastName" => "* Lastname is required", "email" => "* Email is required"];

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
            }elseif($key == "lastName"){
                $last_name = $value;
            }elseif($key == "email"){
                $email = $value;
            }
        }
        // include "templates/contactForm.html.php";
    }else{
        unset($_POST);
        $successMsg = "Successfully sent your question. Thank you.";
        // include "templates/contactForm.html.php";
    }

}

function setValue($fieldName){
    if(isset($_POST[$fieldName])){
        return htmlspecialchars($_POST[$fieldName]);
    }
}
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

// for contact form 
ob_start();
include "templates/contactForm.html.php";
$output = ob_get_clean();

// For footer categoryNav
ob_start();
include('templates/displayFooterCategories.html.php');
$categoriesFooterNav = ob_get_clean();

include "templates/layout.html.php";






