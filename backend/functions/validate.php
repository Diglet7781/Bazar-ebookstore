<?php

//validate the input
function validate($firstName,$lastName,$email,$accountType,$username,$password,$confirmPassword){
    if($firstName=="" || $lastName=="" || $email=="" || $accountType=="" || $password=="" || $confirmPassword==""){
        echo "All Fields must be entered";
    }
    

}
function itemValidate($productName,$productId,$productDescription,$productQuantity,$productPrice,$productImage){
    if($productName==""||$productId==""||$productDescription==""||$productQuantity==""||$productPrice==""||$productImage==""){
        echo"All Fields must be entered";
    }
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
 }
