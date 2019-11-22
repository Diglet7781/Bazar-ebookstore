<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="keywords" content="">

    <title> Bazaar - Shop healthy and smart </title>

   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
   <link rel = "stylesheet" href ="testFile.css" rel="stylesheet"/>
   <link rel = "stylesheet" href ="navBarAndFooterStyles.css" rel="stylesheet"/>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
   <script src="js/bootstrap.min.js"></script>

  <style>
 *{
  box-sizing: border-box;
}

body{
  font-family: Arial, Helvetica, sans-serif;
  background-color:silver;
}

      img{
         height:50px;
      }
      .card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 40%;

      }
      .card-text{
         color:red;
      }
      .card-title{
         color:red;
      }
      </style>
  
</head>


<body>



      <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light" >
         <div class="navbar-left">
            <a class="navbar-brand" href="">
            <img class="logo-dark" src="../img/nav2.png" width="60" height="60" class="d-inline-block align-top" alt="" alt="logo"> 
            </a>
            <div class="navbar-brand mb-1 h4">
               </span>
               <h2><a href="testFile.php"> BaaZaar </a></h2>
            </div>
         </div>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
               <li class="nav-item">
                  <a class="nav-link" href="#">Products <span class="sr-only">(current)</span></a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="#">Brands <span class="sr-only">(current)</span></a>
               </li>
               <li class="nav-item">
                  <a class="nav-link " href="#" tabindex="-1" >Deals <span class="sr-only">(current)</span></a>
               <li class="nav-item">
                  <a class="nav-link " href="#" tabindex="-1" >Services <span class="sr-only">(current)</span></a>
               </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
               <input class="form-control mr-sm-2" type="search" placeholder="Search">
               <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
            <button><a href="../frontend/cart-view.php">ViewCart</a></button>
            <button><a href="../frontend/addInventory.php">addInventory</a></button>
            <div class = "button">
               <button type="button" class="btn btn-danger"><?php 
               session_start();
                    if(isset($_SESSION['username'])){
                        echo $_SESSION['username'];
                        }
                    else{
                        echo '<a href="userAccess.php">GetStarted</a>';
                        }
                        ?>
               </button>
               
               <?php
               if(isset($_SESSION['username'])){

               echo '<button><a href="../backend/logout.php">Logout</a></button>';
               }
               
               ?>
            </div>
               
         </div>
      </nav>



      <strong style="color:red;"><center>Books</center></strong>


<?php
require_once "../backend/dblogin.php";
$connect=createConn();



$query="SELECT * FROM inventory where productType='book';";
$result=$connect->query($query);
while($row=$result->fetch_assoc()){
   


?>

   
<div class="card" style="width: 18rem;">
      <img class="card-img-top" src="<?php echo $row['picture'];?>" alt="Card image cap" id="images"/>
      <div class="card-body">
      <h5 class="card-title"><?php echo $row['productName'];?></h5>
			
		
         <p class="card-text" ><?php echo "$" .$row['price'];?></p>
         <?php
   $productid=$row['productid'];
         echo '<a href="productPage.php?productid='.$productid.'" class="btn btn-primary">productDetails</a>';
         ?>
      </div>
  

     
<?php
}
echo "hello";
?>

<br>
<br>
<strong style="color:red;"><center>Apparel</center></strong>
<?php 

$query2="SELECT * FROM inventory where productType='apparel';";
$result2=$connect->query($query2);
while($row2=$result2->fetch_assoc()){

?>
     
     <div class="card" style="width: 18rem;">
      <img class="card-img-top" src="<?php echo $row2['picture'];?>" alt="Card image cap" id="images"/>
      <div class="card-body">
      <h5 class="card-title"><?php echo $row2['productName'];?></h5>
			
		
			<p class="card-text" ><?php echo "$" .$row2['price'];?></p>
			<a href="#" class="btn btn-primary">Go somewhere</a>
      </div>

     

</div>
<?php
}
echo "hello";
?>
  <!--

<main class="main-content">
<div class="slideshow-container">
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
     <div class="card" id="card">
			<h4>Levis Jeans</h4>
			<img src="images/levis.jpg" alt="levis Jeans" id="images"/>
			<p class="list-price text-danger">List Price: <s>$24.99</s></p>
			<p class="price">Our Price: $19.99</p>
			<button type="button" class="btn btn-success" data-toggle="model" data-target="#details-1">Details</button>
		</div>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="../img/carousel1.jpg" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
       
        
       this is for carousel overlay text 
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8 col-xl-6 mx-auto">
              <div class="section-dialog bg-dark">
                
                <p class="mb-0 mt-5"> Shop with us. Healthy and Smart!</p>
              </div>
            </div>
          </div>
        </div>
      
    
  </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="../img/carousel2.jpg" alt="Second slide">
      <div class="carousel-caption d-none d-md-block">
        <h5>Second Slide</h5>
        <p>Second Slide description</p>
    </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="../img/carousel3.jpg" alt="Third slide">
      <div class="carousel-caption d-none d-md-block">
        <h5>Third Slide </h5>
        <p>Third slide description</p>
  </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
<div class = "card-container">
<div class="flex-container">
 
</div>
</main>
-->



      <div class="footer">
         <div id="button"></div>
        <div class="pt-1"></div>
         <div class="container page-footer font-small blue bg-danger text-white">
            <div class="container-fluid text-center text-md-left">
               <div class="row">
                  <div class="col-md-2 mt-md-0 mt-3">
                     <h5 class="text-monospace text-warning"> 
                        <img src="../img/nav3.png" width="60" height="60" alt=""> BaZaar
                     </h5>
                     <div class="footer-copyright py-0 te text-monospace">&copy; BaZaar 2019</div>
                  </div>
                  <hr class="clearfix w-100 d-md-none pb-3">
                  <div class="col-md-6 mb-md-0 mb-3">
                     <h4 class="text-center text-warning text-monospace">Quick Links</h4>
                     <div class="container">
                        <div class="row text-center">
                           <div class="col">Link 1</div>
                           <div class="col">Link 2</div>
                           <div class="col">Link 3</div>
                           <div class="w-100"></div>
                           <div class="col">Link 4</div>
                           <div class="col">Link 5</div>
                           <div class="col">Link 6</div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-4 mb-md-0 mb-3 ">
                     <h5 class="text-uppercase text-center text-warning text-monospace">Connect With Us</h5>
                     <div class="col-xs-8">
                        <ul class="list-group list-group-horizontal list-group-flush justify-content-center">
                           <li class="list-group-item bg-danger" > <a href="#"><i class="fa fa-facebook-square fa-2x" style="color:#4863A0;"></i></a> </li>
                           <li class="list-group-item bg-danger"> <a href="#"><i class="fa fa-twitter-square fa-2x" style="color:#00FFFF;"></i></a> </li>
                           <li class="list-group-item bg-danger"> <a href="#"><i class="fa fa-instagram fa-2x" style="color:#F660AB;"></i></a> </li>
                           <li class="list-group-item bg-danger"> <a href="#"><i class="fa fa-github-square fa-2x" style="color:#3CB371;"></i></a> </li>
                           <li class="list-group-item bg-danger"> <a href="#"><i class="fa fa-envelope-square fa-2x" style="color:#FA8072;"></i></a> </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>





<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src = "../js/script.js"></script>

</body>
</html>