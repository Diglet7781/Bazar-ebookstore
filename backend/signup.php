<!--
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Signup</title>
</head>
<body>
    
    <form id="registrationForm" action="signup.php" method="post">
        firstName:<input type="text" name="fname" placeholder="fname" id="firstName" oninput="validatefirstname()">
        <span id="firstNameErr"></span>
        <br>
        lastName:<input type="text" name="lname" placeholder="lname" oninput="validatelastname();">
        <span id="lastNameErr"></span>
        <br>
        email:<input type="email" name="email" placeholder="email" >
        <span id="email"></span>
        <br>
        AccountType:
        <br>
        Buyer
        <input type="radio" name="accountType" value="buyer">
        seller
        <input type="radio" name="accountType" value="seller">
       
        <br>
        username:<input type="text" name="username" placeholder="username" >
        <span id="username"><span>
        <br>
        password:<input type="password" name="password" placeholder="password" id="password" onkeyup="check();">
        <span id="password"><span>
        <br>
        confirm-password:<input type="password" name="confirm-password" placeholder="confirm-password" id="confirmpassword" onkeyup="check();">
        <span id="confirmpasswordErr"></span>
        <br><br>
        <button name="submit" type="submit" value="createAccount">createAccount</button> 
       
       
    </form>  
    <script type="text/javascript" src="functions/registrationValidation.js"></script> 
</body>
</html>
-->


<?php
require_once "functions/validate.php";
require_once "class/User.php";
require_once "dblogin.php";
//processing the form
if (isset($_POST["submit"])){
    if(!isset($_POST['fname']) || !isset($_POST['lname']) || !isset($_POST['email']) || !isset($_POST['accountType']) || !isset($_POST['username']) || !isset($_POST['password']) || !isset($_POST['confirm-password']) ){
        header("Location: ../frontend/error.php");
    }else{
    
    //get data from the user for Registration
    $firstName = test_input($_POST["fname"]);
    $lastName = test_input($_POST["lname"]);
    $email = test_input($_POST["email"]);
    $accountType = test_input($_POST["accountType"]);
    $username = test_input($_POST["username"]);
    $password = test_input($_POST["password"]);
    $confirmPassword = test_input($_POST["confirm-password"]);
    //validate input fields and verify
    validate($firstName,$lastName,$email,$accountType,$username,$password,$confirmPassword); 
    
    $user= new User($firstName,$lastName,$email,$accountType,$username,$password,$confirmPassword);
    //validate user input fields with certain restrictions
   
    
    //after validation , create object if validation sucess , create object and pass values to the constructor 
    // after creating object push the data to the database abd registration sucessful
    //creaating user object once all the data are validated
    //$connect=query($query);
    
    //create the connection to the database
    $connect = createConn();
    
    //query to get the username and email from the database 
    $rowsusername=$connect->query($user->validateusername());
    $rowsemail=$connect->query($user->validateemail());
    //validating if the username and email already exists in the database
    //if the username and email is not found inside the database
    //the user registration data will be pushed to the database
    if($rowsusername->num_rows>0){
        echo "the username already exists";
    }else if($rowsemail->num_rows>0){
        echo "the email already exists";
    } 
    else{
        $result=$connect->query($user->createAccount()); 
        if (!$result){
            die($connect->error);
        }
        else
            echo "Account Created Successfully";
            session_start();
            $_SESSION['username']=$_POST['username'];
            $_SESSION['type']=$_POST['accountType'];
            header("Location: ../frontend/homePage.php");
    }
}
}
?>