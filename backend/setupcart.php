<?php
  require_once "dblogin.php";
  $connect = createConn();
  $query = "CREATE TABLE cart (
  productid INT (10),
  userid INT(10),
  PRIMARY KEY (productid))";
  
  $result = $connect->query($query);
  if (!$result){
      die($connect->error);
  }
  else
      echo "Table build successful.";
?>