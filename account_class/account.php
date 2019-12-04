<?php
	//$con=mysqli_connect("localhost","my_user","my_password","my_db");
	$connection = createConn(); // Establishing Connection with Server
	if (mysqli_connect_errno())
		echo "Failed to connect to MySQL: " . mysqli_connect_error();

	// Fetching variables of the form which travels in URL
	if( isset($_POST['submit']) ) 
	{ 										
		$buyerOrSeller = $_POST['accountType'];
		$firstName = $_POST['fname'];
		$lastName = $_POST['lname'];
		$eMail = $_POST['email'];
		$userName = $_POST['username'];
		$hashed_password = hashString($_POST['password']);


		//check the username and email from the database
		$usernameQuery = "SELECT * From user where username='$userName'";
		$emailQuery = "SELECT * From user where email='$eMail'";;

		if( !($connection->$usernameQuery) && !($connection->$emailQuery) )
		{	//Insert Query of SQL
			$query = mysqli_query($connection, "INSERT INTO `user`(`firstName`, `lastName`, `email`, `accountType`, `username`, `password`) VALUES ('$firstName','$lastName','$eMail','$buyerOrSeller','$userName','$hashed_password')");
			if (!$query)
				echo "<p>Insertion Failed <br/></p>";
			else {
				session_start();
				$_SESSION['username']=$_POST['username'];
				$_SESSION['type']=$_POST['accountType'];
				echo "<script> alert('Sign Up Successful, you are now logged in'); window.location.href='../frontend/homePage.php'; </script>";
			}
		}
		else
			echo "<script> alert('Input different credentials, please'); window.location.href='../frontend/userAccess.php'; </script>";
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