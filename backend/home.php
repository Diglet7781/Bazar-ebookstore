
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>home</title>
    <link rel="stylesheet" href="homedisplay.css">
</head>
<body>
<?php
require_once "dblogin.php";
$connect=createConn();

$query="SELECT * FROM  inventory";

$result=$connect->query($query);

    
//this function will display five product in one line
for ($i=0; $i<=5; $i++){
echo "<div class ='display'>";
    $row = $result->fetch_assoc();
    $productID=$row['productid'];
    echo "<br>";
    echo $row['productName'];
    echo "<br>";
    $image=$row['picture'];
    echo "<img style='height:50px;' src='".$image."'".">";
    echo "<br>";
    echo $row['price'];
    echo "<br>";
    echo '<a href="viewdetails.php?productId=' .$productID. '">details</a>';
    
echo "</div>";
header('Location:viewCart.php');
}

?>

</body>
</html>



   