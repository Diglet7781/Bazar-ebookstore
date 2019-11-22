<!DOCTYPE html>


<html lang = "en">
<head>

	<title>inventory</title>
	<style>
		td{
		border: 1px solid;
		text-align: center;
		padding: 0.5em;
		}
	</style>
</head>

<body>
	<h1>Inventory</h1>
<?php 
	
    require_once "dblogin.php";
    

    $connect = createConn();
    $sqlBooks= "SELECT * FROM inventory WHERE productType='book'";
   $sqlApparels="SELECT * FROM inventory WHERE productType='apparel'";
   $reasult1=$connect->query($sqlApparels);
   $reasult = $connect->query($sqlBooks);
    echo"<table>";
    echo "<tr>";
    echo    "<th>pictures</th>";
    echo"</tr>";
    while($row = $reasult->fetch_assoc()){
        $productid=$row["productid"];
        
        echo   "<tr>";
        echo    "<td>";
        echo "<img style='height:50px;'src='" . $row['picture'] . "'>";
        echo "</td>";
        echo '<td><a href="addToCart.php?id='.$productid.'">Add TO Cart</a></td>';
        echo "</tr>";
    }
    echo"</table";
    echo"<table>";
    echo "<tr>";
    echo    "<th>pictures</th>";
    echo"</tr>";
    while($row = $reasult1->fetch_assoc()){
        $productid=$row["productid"];
        
        echo   "<tr>";
        echo    "<td>";
        echo "<img src='" . $row['picture'] . "'>";
        echo "</td>";
        echo '<td><a href="addToCart.php?id='.$productid.'">Add To Cart</a></td>';
        echo "</tr>";
    }
    echo'<td><a href="viewCart.php">view cart</a></td>';
    echo"</table";

    $connect->close();
    ?>
 </table>
 </body>
 </html>