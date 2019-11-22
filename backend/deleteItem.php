<?php
    require_once "dblogin.php";
    $id=$_GET['id'];
    echo"your id is $id";
    $connect = createConn();
    if ($connect->connect_error) {
        die("Connection failed: " . $connect->connect_error);
    }
    echo "Connected successfully";
    $sql= "Delete FROM inventory WHERE productid='$id'";
    if($connect->query($sql) === TRUE){
        echo "hello";
        header("Location: ../frontend/viewInventory.php?deleteInventory=success");
        
    }else{
        echo"Errorr deleting record: ". $connect->error;
    }
    ?>