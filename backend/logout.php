<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Logged Out</title>
    </head>
    <?php
        session_start();
        session_destroy();
        
        header("Location:../frontend/homePage.php");
    ?> 
   
           
     
  