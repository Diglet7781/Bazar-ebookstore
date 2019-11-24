<?php
require_once "../backend/dblogin.php";
session_start();
if(isset($_GET['addToCart'])){
$id=$_GET['id'];
echo $id;
$userId=$_SESSION['userId'];
$connect = createConn();
$sql="INSERT INTO cart(productid,userid,quantity)VALUES('$id','$userId','1')";
// console.log("hello");
 if($connect->query($sql) === TRUE){
     echo"item added sucessfully";

 }else{
     echo"Errorr updating record: ". $connect->error;
 }

}
?>
