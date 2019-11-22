<?php
session_start();
if(isset($_SESSION['userId'])){
    echo $_SESSION["userId"];
}
else
    echo "session variable not set";