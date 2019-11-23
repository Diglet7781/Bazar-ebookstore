
<?php
require_once "../backend/dblogin.php";
$connect=createConn();

for($i=0;$i<5;$i++){
$product=rand(1,14);
   $query="SELECT * from inventory where productid='$product'; ";



    /* fetch associative array */

$result1=$connect->query($query);

$row1=$result1->fetch_assoc();
?>


         <div >
            <div class="card-deck container-fluid text-dark pt-3">
               <div class="card">
               <h5 class="card-title"><?php echo $row1['productName'];?></h5>

                  <div class="card-body">
                  <img style="height:50px; " src="<?php echo $row1['picture'];?>" class="card-img d-flex align-self-center" alt="...">
                  <p><?php echo $row1['price']; ?></p>
                  </div>
                  <div class="card-footer">
                     <small class="text-muted"><button>Add to Cart<i class="fa fa-cart-plus"></i></button></small>
                  </div>
               </div>
<?php


}


?>
