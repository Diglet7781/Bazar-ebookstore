<?php

$productId=$_GET['productId'];

//this page will show the details of the product
require_once "dblogin.php";

$connect= createConn();

$query="SELECT * FROM inventory where productid='$productId'";
$result=$connect->query($query);

$row=$result->fetch_assoc();
   
    $productName=$row['productName'];
    $price=$row['price'];
    $availableQuantity=$row['quantity'];
    $description=$row['productDescription'];
    $image=$row['picture'];

    //product image
echo "<img style='height:50px;'src='".$image."'>";  
echo "<br>";  
//product name
echo $productName;
echo "<br>";
//product price
echo $price;
echo "<br>";
//prodouct availibility
echo "available quantity :". $availableQuantity;
echo "<br>";
//product description
echo $description;
echo "<br>";
//add to cart option
echo "<a href='addToCart.php?productId=".$productId."'>"."Add to cart". "</a>";
