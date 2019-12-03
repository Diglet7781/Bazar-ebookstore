<?php
	//$con=mysqli_connect("localhost","my_user","my_password","my_db");
	$connection = mysqli_connect("localhost", "fjc56", "Labrador!123", "fjc56"); // Establishing Connection with Server
	if (mysqli_connect_errno())
		echo "Failed to connect to MySQL: " . mysqli_connect_error();

	// Fetching variables of the form which travels in URL
	if( isset($_POST['submit']) ) { 											//1
		if ( !(isset($_POST['accountType'])) ) {								//2
			if( !(isset($_POST['fname'])) ) {									//3
				if ( !(isset($_POST['lname'])) ) {								//4
					if ( !(isset($_POST['email'])) ) {							//5
						if ( !(isset($_POST['username'])) ) {					//6
							if ( !(isset($_POST['password'])) ) {				//7
								if ( !(isset($_POST['confirm-password'])) ) { 	//8
									echo "<script> alert('Sign Up Failed, please try again'); window.location.href='userAccess.php'; </script>";
								}
							}
						}
					}
				}
			}
		}
	}

	if ( $_POST['password'] == $_POST['password']) {
		$buyerOrSeller = $_POST['accountType'];
		$firstName = $_POST['fname'];
		$lastName = $_POST['lname'];
		$eMail = $_POST['email'];
		$userName = $_POST['username'];
		$passWord = $_POST['password'];
		if($userName !=''||$email !='') {
			//Insert Query of SQL
			$query = mysqli_query($connection, "INSERT INTO `user`(`firstName`, `lastName`, `email`, `accountType`, `username`, `password`) VALUES ('$firstName','$lastName','$eMail','$buyerOrSeller','$userName','$passWord')");
			if (!$query)
				echo "<p>Insertion Failed <br/></p>";
			else								
				echo "<script> alert('Logged in Boom'); window.location.href='userAccess.php'; </script>";
		}
	}
	mysqli_close($connection); // Closing Connection with Server
?>
