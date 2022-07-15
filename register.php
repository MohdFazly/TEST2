<!DOCTYPE html>
<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="main.css">

	
</form>

	<title>Registration system PHP and MySQL</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>

<style>

.header {
	width: 40%;
	margin: 30px auto 0px;
	color: white;
	background: #da4646;
	text-align: center;
	border: 1px solid #e35300;
	border-bottom: none;
	border-radius: 10px 10px 0px 0px;
	padding: 5px;
}

.btn {
	padding: 10px;
	font-size: 15px;
	color: rgb(246, 7, 17);
	background: #e83408;
	border: none;
	border-radius: 5px;
}
</style>

<div class="header">
	<h2>Register</h2>
</div>
<form method="post" action="db_register.php">
	<div class="input-group">
		<label>First name:</label>
		<input type="first_name" name="first_name" value=""required>
	</div>
	<div class="input-group">
		<label>Last Name:</label>
		<input type="last_name" name="last_name" value=""required>
	</div>
	<div class="input-group">
		<label>Email:</label>
		<input type="email" name="email" value=""required>
	</div>
	<div class="input-group">
		<label>Address:</label>
		<input type="address" name="address" value=""required>
	</div>
	<div class="input-group">
		<label>HP Number:</label>
		<input type="hpno" name="hpno" value=""required>
	</div>
	<div class="input-group">
		<label>Password:</label>
		<input type="password" name="password"required>
	</div>
	<input type="submit" class="" name="register_btn" value="Register" >
	</div>
	<p>
		Already a sign up? <a href="login.php">Sign in</a>
	</p>
</form>
</body>
</html>