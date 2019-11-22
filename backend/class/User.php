<?php
require_once "../backend/dblogin.php";
createConn();
class User {
  //properties
  protected $firstName;
  protected $lastName;
  protected $email;
  protected $accountType;
  protected $userName;
  protected $password;
  protected $confirmpassword;

  //methods
   public function __construct($firstName,$lastName,$email,$accountType, $userName,$password,$confirmpassword) {
    $this->firstName = $firstName;
    $this->lastName = $lastName;
    $this->email = $email;
    $this->accountType = $accountType;
    $this->userName = $userName;
    $this->password = $password;
    $this->confirmpassword=$confirmpassword;
  }


  //get firstname
  public function getfirstName(){
    $fname= $this->firstName;
   
    return $fname;
  }

  //get lastname
  
  public function getlastName(){
    $lname= $this->lastName;
    return $lname;
  }

  //get email
  public function getemail(){
    return $this->email;
  }

  //get username
  public function getusername(){
    return $this->userName;
  }

  //get password
  public function getpassword(){
    return $this->password;
  }

  //get accountType
  public function getaccountType(){
    return $this->accountType;
  }

  //check the username and email from the database

  public function validateusername(){
    $userName=$this->getusername();
    $query="SELECT username From user where username='$userName'";
    return $query;
  }

  public function validateemail(){
    $email=$this->getemail();
    $query="SELECT email From user where email='$email'";
    return $query;
  }


  //createAccount
  public function createAccount(){
    $firstName= $this->getfirstName();
    $lastName=$this->getlastName();
    $email=$this->getemail();
    $userName=$this->getusername();
    $accountType=$this->getaccountType();
    $password=password_hash($this->getpassword(),PASSWORD_DEFAULT);


    $query="INSERT INTO user(firstName, lastName, email,accountType, username, password) 
    VALUES ('$firstName','$lastName','$email','$accountType','$userName','$password')";
   
    return $query;
  }


  

}



?>
