<?php
require_once "dblogin.php";
$connect=createConn();
$id=$_GET['id'];
echo"your id is $id";
$connect = createConn();
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}
echo "Connected successfully";
$sql= "Delete FROM user WHERE userId='$id'";
if($connect->query($sql) === TRUE){
    echo "hello";
    header("Location: ../frontend/viewUsers.php?deleteUser=success");

}else{
    echo"Errorr deleting record: ". $connect->error;
}

 ?>
