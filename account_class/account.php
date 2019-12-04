<?php
	//$con=mysqli_connect("localhost","my_user","my_password","my_db");
	$connection = mysqli_connect("localhost", "fjc56", "Labrador!123", "fjc56"); // Establishing Connection with Server
	if (mysqli_connect_errno())
		echo "Failed to connect to MySQL: " . mysqli_connect_error();

	// Fetching variables of the form which travels in URL
	if( isset($_POST['submit']) ) 
	{ 											//1
		if (    !(isset($_POST['accountType'])) || !(isset($_POST['fname'])) || !(isset($_POST['lname'])) || !(isset($_POST['email'])) || !(isset($_POST['username'])) || !(isset($_POST['password'])) || !(isset($_POST['confirm-password']))|| ( $_POST['password'] != $_POST['confirm-password'] )    ) {
			echo "<script> alert('Sign Up Failed, please try again'); window.location.href='../frontend/userAccess.php'; </script>";
		}
		else {
			$buyerOrSeller = $_POST['accountType'];
			$firstName = $_POST['fname'];
			$lastName = $_POST['lname'];
			$eMail = $_POST['email'];
			$userName = $_POST['username'];
			$hashed_password = hashString($_POST['password']);

			//Insert Query of SQL
			$query = mysqli_query($connection, "INSERT INTO `user`(`firstName`, `lastName`, `email`, `accountType`, `username`, `password`) VALUES ('$firstName','$lastName','$eMail','$buyerOrSeller','$userName','$hashed_password')");
			if (!$query)
				echo "<p>Insertion Failed <br/></p>";
			else {
				session_start();
				$_SESSION['username']=$_POST['username'];
				$_SESSION['type']=$_POST['accountType'];
				echo "<script> alert('Sign Up Successful, you are now logged in'); window.location.href='../frontend/homePage.php'; </script>";;
			}
		}
	}


	function hashString($hashing) { // salt and hash a string
	  $salt1 = "qm&h*";
	  $salt2 = "pg!@";
	  $hashing = hash('ripemd128', "$salt1$hashing$salt2");
	  return $hashing;
	}
	mysqli_close($connection); // Closing Connection with Server*/
?>







<!-- $validation = FALSE;
	if( $_POST['password'] == $_POST['confirm-password'] ) {
	if( is_string($_POST['fname']) ) { //$validation = TRUE;
			if( is_string($_POST['lname']) ) { 
				if( (is_string($_POST['email']) ) { 
					if( filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ) {
						$eMail = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
						$firstName = filter_var($_POST['fname'], FILTER_SANITIZE_STRING);
						$lastName = filter_var($_POST['lname'], FILTER_SANITIZE_STRING);
						$passWord = password_hash($_POST['password'],PASSWORD_DEFAULT);
						$validation = TRUE;
					}
				}
			}
		}
	}

	if ( $validation == TRUE ) {
		$buyerOrSeller = $_POST['accountType'];
			//Insert Query of SQL
		$query = mysqli_query($connection, "INSERT INTO `user`(`firstName`, `lastName`, `email`, `accountType`, `username`, `password`) VALUES ('$firstName','$lastName','$eMail','$buyerOrSeller','$userName','$passWord')");
		if (!$query)
			echo "<p>Insertion Failed <br/></p>";
		else								
			echo "<script> alert('Logged in Boom'); window.location.href='../frontend/homePage.php'; </script>";
	}
	mysqli_close($connection); // Closing Connection with Server


	}

		        $password1 = "123456";
		        echo $password1;
        echo password_hash($password1,PASSWORD_DEFAULT); 

 -->