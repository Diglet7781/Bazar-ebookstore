<?php
require_once "validate.php";
require_once "../User.php";
require_once "../setUps/dblogin.php";
//processing the form
if (isset($_POST["submit"])){
    if(!isset($_POST['fname']) || !isset($_POST['lname']) || !isset($_POST['email']) || !isset($_POST['accountType']) || !isset($_POST['username']) || !isset($_POST['password']) || !isset($_POST['confirm-password']) ){
        header("Location: ../../frontend/sites/error.php");
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
            header("Location: ../../frontend/sites/homePage.php");
    }
}
}
?>