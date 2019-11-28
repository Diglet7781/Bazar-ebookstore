
<?php
require_once "../setUps/dblogin.php";
session_start();
$id=$_GET['id'];
$userId=$_SESSION['userId'];
$connect = createConn();
$sql="INSERT INTO cart(productid,userid,quantity)VALUES('$id','$userId','1')";
// console.log("hello");
 if($connect->query($sql) === TRUE){
     echo"item added sucessfully";
     header('Location:../../frontend/sites/homePage.php');
 }else{
     echo"Errorr updating record: ". $connect->error;
 }

?>
