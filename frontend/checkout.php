<?php
 session_start();
 ?>
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
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.15.0/esm/popper.min.js">
      <link rel = "stylesheet" href ="navBarAndFooterStyles.css" rel="stylesheet"/>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <style>
         #anchor{
            color: #FFFFFF;
    text-decoration: none;
         }
         img{
           height:50px;
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

            <!--here goes the code for search functionality -->
            <form class="form-inline my-2 my-lg-0" action="search.php" method="post">
               <input class="form-control mr-sm-2" type="search" placeholder="Search" name="search">
               <button class="btn btn-outline-success my-2 my-sm-0 mr-lg-5 mr-5" type="submit" name="searchbtn">Search</button>
            </form>
            <!--end of search functionality code -->

<!---dropdwon menus
<div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Dropdown button
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="#">Action</a>
    <a class="dropdown-item" href="#">Another action</a>
    <a class="dropdown-item" href="#">Something else here</a>
  </div>
</div>

-->

               <?php
               if(isset($_SESSION['username'])){
                  if($_SESSION['type']== "Seller"){
                    echo'<div class="dropdown">';
                    echo'<button class="btn btn-danger" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      menu
                    </button>';
                    echo'<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">';
                     echo '<a class="dropdown-item" href="profilePage.php">View Profile</a>';
                     echo "   ";
                     echo '<a class="dropdown-item" href="viewInventory.php">View Inventory</a>';
                     echo "   ";
                     echo '<a class="dropdown-item" href="addInventory.php">Add Inventory</a>';
                     echo "   ";
                     echo '<a class="dropdown-item" href="cart-view.php">View Cart</a>';

                     if(isset($_SESSION['username'])){
                       if($_SESSION['username']==="admin"){
                         echo '<a class="dropdown-item" href="viewUsers.php">viewUsers</a>';
                       }
                     }
                     echo '<a class="dropdown-item" href="../backend/logout.php">Logout</a>';
                     echo '</div>';
                     echo '</div>';
                  }else if($_SESSION['type']="Buyer"){
                     echo '<button  class="btn btn-danger"><a href="profilePage.php">View Profile</a></button>';
                     echo "   ";
                     echo '<button  class="btn btn-danger"><a href="cart-view.php">View Cart</a></button>';
                     echo "  ";
                     echo '<button  class="btn btn-danger"><a href="../backend/logout.php">Logout</a></button>';
                  }
                    else {
                      // code...
                       echo "";
                    }
               }


               ?>
               <div class = "button">
               <button type="button" class="btn btn-danger" id="anchor"><?php

                       if(isset($_SESSION['username'])){
                           echo $_SESSION['username'];
                           }
                       else{
                           echo '<a href="userAccess.php">GetStarted</a>';
                           }
                           ?>
                  </button>
                </div>

      </nav>

      <div class="container">
         <hr class="mb-4">
         <div class="row pagination-centered">
            <div class="col-md-12 order-md-1">
               <form class="needs-validation" novalidate>
                  <div class="container">
                     <div class="row">
                        <!-- Shipping Address -->
                        <div class="col-sm-6">
                           <!-- First of two -->
                           <h4 class="mb-3">Shipping address</h4>
                           <div class="row">
                              <div class="col-md-6 mb-3">
                                 <label for="firstName">First name</label>
                                 <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                                 <div class="invalid-feedback">
                                    Valid first name is required.
                                 </div>
                              </div>
                              <div class="col-md-6 mb-3">
                                 <label for="lastName">Last name</label>
                                 <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                                 <div class="invalid-feedback">
                                    Valid last name is required.
                                 </div>
                              </div>
                           </div>
                           <div class="mb-3">
                              <label for="email">Email <span class="text-muted">(Optional)</span> </label>
                              <input type="email" class="form-control" id="email" placeholder="">
                              <div class="invalid-feedback">
                                 Please enter a valid email address for shipping updates.
                              </div>
                           </div>
                           <div class="mb-3">
                              <label for="address">Address</label>
                              <input type="text" class="form-control" id="ShippingAddress" placeholder="1234 Main St" required>
                              <div class="invalid-feedback">
                                 Please enter your shipping address.
                              </div>
                           </div>
                           <div class="row">
                            <div class="col-md-4 mb-3">
                                 <label for="city">City</label>
                                 <input type="text" class="form-control" id="ShippingCity" placeholder="" value="" required>
                                 <div class="invalid-feedback">
                                    Please provide a valid City.
                                 </div>
                              </div>
                              <div class="col-md-5 mb-3">
                                 <label for="state">State</label>
                                 <select class="custom-select d-block w-100" id="ShippingState" required>
                                    <option value="">Choose...</option><option value="AL">Alabama</option>
                                    <option value="AK">Alaska</option>
                                    <option value="AZ">Arizona</option>
                                    <option value="AR">Arkansas</option>
                                    <option value="CA">California</option>
                                    <option value="CO">Colorado</option>
                                    <option value="CT">Connecticut</option>
                                    <option value="DE">Delaware</option>
                                    <option value="DC">District Of Columbia</option>
                                    <option value="FL">Florida</option>
                                    <option value="GA">Georgia</option>
                                    <option value="HI">Hawaii</option>
                                    <option value="ID">Idaho</option>
                                    <option value="IL">Illinois</option>
                                    <option value="IN">Indiana</option>
                                    <option value="IA">Iowa</option>
                                    <option value="KS">Kansas</option>
                                    <option value="KY">Kentucky</option>
                                    <option value="LA">Louisiana</option>
                                    <option value="ME">Maine</option>
                                    <option value="MD">Maryland</option>
                                    <option value="MA">Massachusetts</option>
                                    <option value="MI">Michigan</option>
                                    <option value="MN">Minnesota</option>
                                    <option value="MS">Mississippi</option>
                                    <option value="MO">Missouri</option>
                                    <option value="MT">Montana</option>
                                    <option value="NE">Nebraska</option>
                                    <option value="NV">Nevada</option>
                                    <option value="NH">New Hampshire</option>
                                    <option value="NJ">New Jersey</option>
                                    <option value="NM">New Mexico</option>
                                    <option value="NY">New York</option>
                                    <option value="NC">North Carolina</option>
                                    <option value="ND">North Dakota</option>
                                    <option value="OH">Ohio</option>
                                    <option value="OK">Oklahoma</option>
                                    <option value="OR">Oregon</option>
                                    <option value="PA">Pennsylvania</option>
                                    <option value="RI">Rhode Island</option>
                                    <option value="SC">South Carolina</option>
                                    <option value="SD">South Dakota</option>
                                    <option value="TN">Tennessee</option>
                                    <option value="TX">Texas</option>
                                    <option value="UT">Utah</option>
                                    <option value="VT">Vermont</option>
                                    <option value="VA">Virginia</option>
                                    <option value="WA">Washington</option>
                                    <option value="WV">West Virginia</option>
                                    <option value="WI">Wisconsin</option>
                                    <option value="WY">Wyoming</option>
                                 </select>
                                 <div class="invalid-feedback">
                                    Please provide a valid state.
                                 </div>
                              </div>
                              <div class="col-md-3 mb-3">
                                 <label for="zip">Zip</label>
                                 <input type="text" class="form-control" id="ShippingZip" placeholder="" required>
                                 <div class="invalid-feedback">
                                    Zip code required.
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- Billing Address -->
                        <div class="col-sm-6">
                           <h4 class="mb-3">Billing address</h4>
                           <div class="row">
                              <div class="col-md-6 mb-3">
                                 <label for="firstName">First name</label>
                                 <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                                 <div class="invalid-feedback">
                                    Valid first name is required.
                                 </div>
                              </div>
                              <div class="col-md-6 mb-3">
                                 <label for="lastName">Last name</label>
                                 <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                                 <div class="invalid-feedback">
                                    Valid last name is required.
                                 </div>
                              </div>
                           </div>
                           <div class="mb-3">
                              <label for="email">Email <span class="text-muted">(Optional)</span> </label>
                              <input type="email" class="form-control" id="email" placeholder="">
                              <div class="invalid-feedback">
                                 Please enter a valid email address for shipping updates.
                              </div>
                           </div>
                           <div class="mb-3">
                              <label for="address">Address</label>
                              <input type="text" class="form-control" id="BillingAddress" placeholder="1234 Main St" required>
                              <div class="invalid-feedback">
                                 Please enter your shipping address.
                              </div>
                           </div>
                           <div class="row">
                            <div class="col-md-4 mb-3">
                                 <label for="city">City</label>
                                 <input type="text" class="form-control" id="BillingCity" placeholder="" value="" required>
                                 <div class="invalid-feedback">
                                    Please provide a valid City.
                                 </div>
                              </div>
                              <div class="col-md-5 mb-3">
                                 <label for="state">State</label>
                                 <select class="custom-select d-block w-100" id="BillingState" required>
                                    <option value="">Choose...</option>
                                    <option value="AL">Alabama</option>
                                    <option value="AK">Alaska</option>
                                    <option value="AZ">Arizona</option>
                                    <option value="AR">Arkansas</option>
                                    <option value="CA">California</option>
                                    <option value="CO">Colorado</option>
                                    <option value="CT">Connecticut</option>
                                    <option value="DE">Delaware</option>
                                    <option value="DC">District Of Columbia</option>
                                    <option value="FL">Florida</option>
                                    <option value="GA">Georgia</option>
                                    <option value="HI">Hawaii</option>
                                    <option value="ID">Idaho</option>
                                    <option value="IL">Illinois</option>
                                    <option value="IN">Indiana</option>
                                    <option value="IA">Iowa</option>
                                    <option value="KS">Kansas</option>
                                    <option value="KY">Kentucky</option>
                                    <option value="LA">Louisiana</option>
                                    <option value="ME">Maine</option>
                                    <option value="MD">Maryland</option>
                                    <option value="MA">Massachusetts</option>
                                    <option value="MI">Michigan</option>
                                    <option value="MN">Minnesota</option>
                                    <option value="MS">Mississippi</option>
                                    <option value="MO">Missouri</option>
                                    <option value="MT">Montana</option>
                                    <option value="NE">Nebraska</option>
                                    <option value="NV">Nevada</option>
                                    <option value="NH">New Hampshire</option>
                                    <option value="NJ">New Jersey</option>
                                    <option value="NM">New Mexico</option>
                                    <option value="NY">New York</option>
                                    <option value="NC">North Carolina</option>
                                    <option value="ND">North Dakota</option>
                                    <option value="OH">Ohio</option>
                                    <option value="OK">Oklahoma</option>
                                    <option value="OR">Oregon</option>
                                    <option value="PA">Pennsylvania</option>
                                    <option value="RI">Rhode Island</option>
                                    <option value="SC">South Carolina</option>
                                    <option value="SD">South Dakota</option>
                                    <option value="TN">Tennessee</option>
                                    <option value="TX">Texas</option>
                                    <option value="UT">Utah</option>
                                    <option value="VT">Vermont</option>
                                    <option value="VA">Virginia</option>
                                    <option value="WA">Washington</option>
                                    <option value="WV">West Virginia</option>
                                    <option value="WI">Wisconsin</option>
                                    <option value="WY">Wyoming</option>
                                 </select>
                                 <div class="invalid-feedback">
                                    Please provide a valid state.
                                 </div>
                              </div>
                              <div class="col-md-3 mb-3">
                                 <label for="zip">Zip</label>
                                 <input type="text" class="form-control" id="BillingZip" placeholder="" required>
                                 <div class="invalid-feedback">
                                    Zip code required.
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>

                  <hr class="mb-4">

        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="same-address" onclick="SetBilling(this.checked);">
          <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
        </div>


<!--                   <div class="col-sm-2 my-auto">
                           <p class="text-center">Check if billing <br> is same as shipping</p>
                           <input  type="checkbox" onclick="SetBilling(this.checked);"/>
                  </div> -->

                  <hr class="mb-4">
                  <h4 class="mb-3">Payment</h4>
                  <div class="row">
                     <div class="container">
                        <div class="row">
                           <div class="col-sm-2">
                           </div>
                           <div class="col-sm-8">
                              <div class="container">
                                 <div class="row">
                                    <div class="col">
                                       <div class="col-md-12 mb-3">
                                          <label for="cc-name">Name on card</label>
                                          <input type="text" class="form-control" id="cc-name" placeholder="" required>
                                          <small class="text-muted">Full name as displayed on card</small>
                                          <div class="invalid-feedback">
                                             Name on card is required
                                          </div>
                                       </div>
                                       <div class="col-md-12 mb-3">
                                          <label for="cc-number">Credit card number</label>
                                          <input type="text" class="form-control" id="cc-number" placeholder="" required>
                                          <div class="invalid-feedback">
                                             Credit card number is required
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col">
                                       <div class="row">
                                          <div class="col-md-4 mb-3">
                                             <label for="cc-expiration">Expiration</label>
                                             <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
                                             <div class="invalid-feedback">
                                                Expiration date required
                                             </div>
                                          </div>
                                          <div class="col-sm-4">
                                          </div>
                                          <div class="col-md-4 mb-3">
                                             <label for="cc-expiration">CVV</label>
                                             <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
                                             <div class="invalid-feedback">
                                                Security code required
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-sm-2">
                           </div>
                        </div>
                     </div>
                  </div>
                  <hr class="mb-4">
                  <button class="btn btn-primary btn-lg btn-block" type="submit">Place Order</button>
               </form>
            </div>
         </div>
      </div>
      <div class="my-5 pt-5 text-muted text-center text-small"></div>
      <div class="footer">
         <div id="button"></div>
         <div class="pt-1"></div>
         <div class="container page-footer font-small blue bg-danger text-white">
            <div class="container-fluid text-center text-md-left">
               <div class="row">
                  <div class="col-md-2 mt-md-0 mt-3">
                     <h5 class="text-monospace text-warning">
                        <img src="../contextimages/nav3.png" width="60" height="60" alt=""> BaZaar
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
                           <li class="list-group-item bg-danger">
                              <a href="#">
                              <i class="fa fa-facebook-square fa-2x" style="color:#4863A0;"></i>
                              </a>
                           </li>
                           <li class="list-group-item bg-danger">
                              <a href="#">
                              <i class="fa fa-twitter-square fa-2x" style="color:#00FFFF;"></i>
                              </a>
                           </li>
                           <li class="list-group-item bg-danger">
                              <a href="#">
                              <i class="fa fa-instagram fa-2x" style="color:#F660AB;"></i>
                              </a>
                           </li>
                           <li class="list-group-item bg-danger">
                              <a href="#">
                              <i class="fa fa-github-square fa-2x" style="color:#3CB371;"></i>
                              </a>
                           </li>
                           <li class="list-group-item bg-danger">
                              <a href="#">
                              <i class="fa fa-envelope-square fa-2x" style="color:#FA8072;"></i>
                              </a>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<!-- error404   <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script> -->
      <script src="../js/sameAddresses.js"></script>
      <script src="../js/form-validation.js"></script>
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

      <!-- footer ends here -->
   </body>
</html>
   </body>
</html>
