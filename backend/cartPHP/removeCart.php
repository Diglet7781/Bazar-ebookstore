<?php
session_start();
?>
<?php
require_once "../setUps/dblogin.php";

$productid=$_GET['id'];
$userId=$_SESSION['userId'];
$connect = createConn();
$sql="DELETE FROM cart WHERE productid='$productid'";
if($connect->query($sql) === TRUE){
    echo"item updated sucessfully";
    header('Location:../../frontend/sites/cart-view.php');
}else{
    echo"Errorr updating record: ". $connect->error;
}

?>
