<?php
  require_once "dblogin.php";
  $connect = createConn();
  $conn = createConn();
  $query = "CREATE TABLE user (
  userId INT NOT NULL AUTO_INCREMENT,
  firstName VARCHAR(128),
  lastName VARCHAR(128),
  email VARCHAR(128),
  accountType VARCHAR(15),
  username VARCHAR(128),
  password VARCHAR(128),
  PRIMARY KEY (userId))";

  $result = $connect->query($query);
  if (!$result){
      die($conn->error);
  }
  else
      echo "Table build successful.";

?>
