<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
      <link rel="stylesheet" type="text/css" href="slidingOverlayStyles.css">
      <link rel="stylesheet" type="text/css" href="navbarStyles.css">
      <title>Login/Sign In Page</title>
      <style>
      #home{
         padding-top:0px;
      }
      </style>
   </head>
   <body>


      <div id="navBarPlaceholder"></div>
      <div class="container" id="container">
         <div class="form-container sign-up-container">
         <form method="post" action="../backend/signup.php">

               <h1>Create Account</h1>
                <div class="form-group">

    <label for="control1">Account Type</label>
    <select class="form-control text-warning" id="exampleFormControlSelect1" name="accountType">
      <option  value="Buyer">Buyer</option>
      <option  value="Seller">Seller</option>

    </select>
  </div>

               <input type="text" placeholder="First Name" name="fname" oninput="validatefirstname()">
               <input type="text" placeholder="Last Name" name="lname"oninput="validatelastname()">
               <input type="email" placeholder="Email" name="email">




                <input type="text" placeholder="username" name="username">
                <input type="password" placeholder="password" name="password" onKeyup="check();">
                <input type="password" placeholder=" confirm password" name="confirm-password" onkeyup="check();">



               <button name="submit" type="submit" value="Signup">Sign Up</button>
            </form>
            <script type="text/javascript" src="..backend/functions/registrationValidation.js"></script>
         </div>
         <div class="form-container sign-in-container">
            <form action="../backend/login.php" method="post">
            <button type="button" id="home"><a href="homePage.php">Home</a></button>
               <h1>Sign In</h1>
               <input type="text" placeholder="Username" name="username">
               <input type="password" placeholder="Password" name="password">
               <span id="error"></span>
               <button type="submit" name="submitSignIn">Sign In</button>

            </form>
         </div>
         <div class="overlay-container">
            <div class="overlay">
               <div class="overlay-panel overlay-left">
                  <h1>Welcome Back</h1>
                  <button class="ghost" id="signIn">Sign In</button>
               </div>
               <div class="overlay-panel overlay-right">
                  <h1>Hey there, Stranger</h1>
                  <p>Enter your personal details and start journey with us</p>
                  <button class="ghost" id="signUp">Sign Up</button>
               </div>
            </div>
         </div>

      </div>
      <div id="footerPlaceholder"></div>
      <script src="slidingOverlayJayEs.js"></script>
      <script src="loadNavAndFooter.js"></script>

   </body>
</html>
