
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
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="testFile.css">
      <link rel = "stylesheet" href ="navBarAndFooterStyles.css" rel="stylesheet"/>
      <style>
         #anchor{
            color: #FFFFFF;
    text-decoration: none;
         }
     
         </style>
</head>
   <body>
      <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light" >
         <div class="navbar-left">
            <a class="navbar-brand" href="homePage.php">
            <img class="logo-dark" src="nav2.png" width="50" height="50" class="d-inline-block align-top" alt="" alt="logo"> 
            </a>
            <div class="navbar-brand mb-1 h4 mr-lg-5">
               </span>
               <h2><a href="homePage.php"> BaaZaar </a></h2>
            </div>
         </div>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
               <li class="nav-item">
                  <a class="nav-link mr-lg-2" href="#">Products <span class="sr-only ">(current)</span></a>
               </li>
               <li class="nav-item">
                  <a class="nav-link mr-lg-2" href="#">Brands <span class="sr-only">(current)</span></a>
               </li>
               <li class="nav-item">
                  <a class="nav-link mr-lg-2" href="#" tabindex="-1" >Deals <span class="sr-only">(current)</span></a>
            
            </ul>
            <form class="form-inline my-2 my-lg-0" action="../backend/search.php" method="get">
               <input class="form-control mr-sm-2" type="search" placeholder="Search1" name="search">
               <button class="btn btn-outline-success my-2 my-sm-0 mr-lg-5 mr-5" type="submit" name="searchbtn">Search</button>
            </form>
            <div class = "button">
            <button type="button" class="btn btn-danger" id="anchor"><?php 
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
                  if($_SESSION['type']== "Seller"){
                     echo '<button  class="btn btn-danger"><a href="profilePage.php">View Profile</a></button>';
                     echo "   ";
                     echo '<button  class="btn btn-danger"><a href="viewInventory.php">View Inventory</a></button>';
                     echo "   ";
                     echo '<button class="btn btn-danger"><a href="addInventory.php">Add Inventory</a></button>';
                     echo "   ";
                     echo '<button  class="btn btn-danger"><a href="cart-view.php">View Cart</a></button>';
                     echo '<button  class="btn btn-danger"><a href="../backend/logout.php">Logout</a></button>';
                  }else if($_SESSION['type']="Buyer"){
                     echo '<button  class="btn btn-danger"><a href="profilePage.php">View Profile</a></button>';
                     echo "   ";
                     echo '<button  class="btn btn-danger"><a href="cart-view.php">View Cart</a></button>';
                     echo "  ";
                     echo '<button  class="btn btn-danger"><a href="../backend/logout.php">Logout</a></button>';
                  }else{
                     echo "";
                  }
               }
               
               ?>
              
            </div>
            
         </div>
      </nav>

    <body>

<?php
require_once "dblogin.php";
$connect=createConn();

if(isset($_GET['searchbtn'])){
   $search=$_GET['search'];
   $query="SELECT * from inventory where productName like '%{$search}%' or productDescription like '%{$search}%' ";
   echo $search;
   

    /* fetch associative array */
   
$result1=$connect->query($query);
while($row1=$result1->fetch_assoc()){

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
    /* free result set */
   
}
}
?>









      <div class="footer">
         <div id="button"></div>
         <div class="pt-1"></div>
         <div class="container page-footer font-small blue bg-danger text-white">
            <div class="container-fluid text-center text-md-left">
               <div class="row">
                  <div class="col-md-2 mt-md-0 mt-3">
                     <h5 class="text-monospace text-warning"> 
                        <img src="nav3.png" width="60" height="60" alt=""> BaZaar
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
      <script type="text/javascript" src="script.js"></script>
   </body>
</html>















































