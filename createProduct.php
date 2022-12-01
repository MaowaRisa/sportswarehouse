<?php

include_once "classes/Product.php";
include_once "classes/Category.php";


if(!isset($_SESSION))
{
    session_start();
}
$linkClassFor = "product";

if(isset($_SESSION["username"])){

    $title = "Create Product";
	$pageHeading = "Create new product";

    $product = new Product();
    $category = new Category();

    $message = "";
    $error = false;

    if(isset($_POST["productName"]) && isset($_POST["category"]) && isset($_POST["price"]) && isset($_POST["description"]))
    {
        if(isset($_POST["featured"]))
        {
            $isFeatured = 1;
        }else
        {
            $isFeatured = 0;
        }

        $targetDirectory  =  "./assets/products/";
        $photoPath = basename($_FILES["photoPath"]["name"]);

        $targetFile = $targetDirectory . $photoPath;

        $imageFileType = pathinfo($targetFile, PATHINFO_EXTENSION);

        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif"){
            $message = "Sorry only images";
            $error = true;
        }

        if($_FILES["photoPath"]["error"] == 1){
            $message = "Sorry File is too large";
            $error = true;
        }
        if ($error == false){
            if(move_uploaded_file($_FILES["photoPath"]["tmp_name"], $targetFile)){
                $message = "The File $photoPath has been uploaded";
            }
            else{
                $message = "Sorry There was an error ". $_FILES["photoPath"]["error"];
                $photoPath = "";
            }
        }else{
            $photoPath = "";
        }

        $message = $product->insertProduct($_POST["productName"],$photoPath,$_POST["price"],$_POST["salePrice"],$_POST["description"],$_POST["category"],$isFeatured);
    }
	
    // For View 
    ob_start();
    include "templates/admin/createProductForm.html.php";
    $output = ob_get_clean();


    include "templates/admin/layout.html.php";
}else{
    header("Location: login.php");
}
?>