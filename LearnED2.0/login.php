<?php
session_start();
include("functions.php");
$con = connectToDatabase();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
	// Check if Register or Login button was clicked
	if (isset($_POST['register'])) {
		// Registration form submitted
		$user_name = $_POST['user_name'];
		$email = $_POST['email'];
		$password = $_POST['psame'];
		$query = "insert into users (user_name,email,password) values ('$user_name','$email','$password')";
		mysqli_query($con, $query);
		header("Location: login.php");
		die;
	}
} 		
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="shortcut icon" type="png" href="images/icon/favicon.png">
	<title>Login SignUp</title>
	<link rel="stylesheet" type="text/css" href="loginStyle.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</head>

<body>
	<div class="form-box">
		<div class="button-box">
			<div id="btn"></div>
			<button type="button" class="toggle-btn" id="log" onclick="login()" style="color: #fff;">Log In</button>
			<button type="button" class="toggle-btn" id="reg" onclick="register()">Register</button>
		</div>
		<div class="social-icons">
			<img src="images/icon/fb2.png">
			<img src="images/icon/insta2.png">
			<img src="images/icon/tt2.png">
		</div>

		<!-- Login Form -->
		<form id="login" class="input-group" method="post" name="login" action="checklogin.php">
			<div class="inp">
				<img src="images/icon/user.png"><input type="text" id="user_name" name="user_name1" class="input-field" placeholder="Username or Phone Number" style="width: 88%; border:none;" required="required">
			</div>
			<div class="inp">
				<img src="images/icon/password.png"><input type="password" id="password" name="password1" class="input-field" placeholder="Password" style="width: 88%; border: none;" required="required">
			</div>
			<input type="checkbox" class="check-box">Remember Password
			<button type="submit" name="login" class="submit-btn" >Log In</button>
		</form>


		<div class="other" id="other">
			<div class="instead">
				<h3>or</h3>
			</div>
			<button class="connect" onclick="google()">
				<img src="images/icon/google.png"><span>Sign in with Google</span>
			</button>
		</div>

		<!-- Registration Form -->
		<form id="register" class="input-group" method="post" action="login.php">
			<input type="text" class="input-field" placeholder="Full Name" name="user_name" required="required">
			<input type="email" class="input-field" placeholder="Email Address" name="email" required="required">
			<input type="password" class="input-field" placeholder="Create Password" name="psame" required="required">
			<input type="password" class="input-field" placeholder="Confirm Password" name="psame" required="required">
			<input type="checkbox" class="check-box" id="chkAgree" onclick="goFurther()">I agree to the Terms & Conditions
			<button type="submit" id="btnSubmit" name="register" class="submit-btn reg-btn">Register</button>
		</form>
	</div>
	<script type="text/javascript" src="script.js"></script>
</body>

</html>