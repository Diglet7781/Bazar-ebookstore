<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>user access draft</title>
</head>

<body>
	<form action="account.php" method="post">
		<select class="form-control text-warning" id="exampleFormControlSelect1" name="accountType">
			<option value="Buyer">Buyer</option>
			<option value="Seller">Seller</option>
		</select><br>
		<input type="text" placeholder="First Name" name="fname" required><br>
		<input type="text" placeholder="Last Name" name="lname" required><br>
		<input type="email" placeholder="Email" name="email" required><br>
		<input type="text" placeholder="username" name="username" required><br>
		<input type="password" placeholder="password" name="password" required><br>
		<input type="password" placeholder=" confirm password" name="confirm-password" required><br>
		<input type="submit">
	</form>
</body>

</html>