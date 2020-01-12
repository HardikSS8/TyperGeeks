<?php 
require "config/config.php"; 
require 'include/form_handlers/register_handler.php'; 
require 'include/form_handlers/login_handler.php'; 
?>

<?php session_destroy(); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>JS Typing Speed Test</title>
	<link href="//db.onlinewebfonts.com/c/6cb4254d224fa60f15c496c4720b5c9a?family=Ninja+Naruto" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" type="text/css" href="vendor/css/ionicons.min.css">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="resources/css/register_style.css">
	<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
	<style>
		footer {
			position: sticky;
		    padding: 15px;
		    margin-top: 35px;
		}
		.signin a {
		    margin: 10px;
		}

	</style>

</head>
<body>

	<?php  
	// TO SHOW ERROR ON SAME PAGE WITHOUT ANIMATION OF UP AND DOWN
	if(isset($_POST['register_button'])) {
		echo '
		<script>
		$(document).ready(function() {
			$("#first").hide();
			$("#second").show();
		});
		</script>
		';
	}
	?>

	<center>
		<header class="masthead">
			<h1 id="web_heading">Test your typing speed</h1>
		</header>
	</center>

	<center>
		<div class="login_form" id="first" style="display: block;">
			<div class="login_heading">
				<h1 id="logo">TyperGeeks</h1>
			</div><hr>
			<div class="login_div">
				<form method="POST" action="register.php">
					<label>Email :</label>
					<input type="email" name="log_email" value="<?php 
						if(isset($_SESSION['log_email'])) {
							echo $_SESSION['log_email'];
						} 
						?>" ><br>

					<label>Password :</label>
					<input type="password" name="log_password"><br>
					
					<?php if(in_array("Email or password was incorrect<br>", $error_array)) echo  "Email or password was incorrect<br>"; ?>
					<br>

					<input type="submit" name="login_button" value="Login"><br>
				</form>	
				<a href="#" id="signup" class="signup">Need and account? Register here!</a>
			</div>
		</div>
	</center>

	<center>
		<div class="register_from" id="second" style="display: none;"> 
			<div class="register_heading">
				<h1 id="logo">TyperGeeks</h1>
			</div><hr>
			<div class="reg_div">
				<form method="POST" action="register.php">
					<label>First Name :</label>
					<input type="text" name="first_name" value="<?php  // IF VALUE IS TRUE THEN IT IS ALREDAY WRITE THAT IN FORM
						if(isset($_SESSION['first_name'])) {
							echo $_SESSION['first_name'];
						}  
						?>" ><br>

					<?php if(in_array("Your first name must be between 2 and 25 characters<br>", $error_array)) echo "Your first name must be between 2 and 25 characters<br>"; ?>		

					<label>Last Name :</label>
					<input type="text" name="last_name" value="<?php 
						if(isset($_SESSION['last_name'])) {
							echo $_SESSION['last_name'];
						} 
						?>" ><br>

					<?php if(in_array("Your last name must be between 2 and 25 characters<br>", $error_array)) echo "Your last name must be between 2 and 25 characters<br>"; ?>

					<label>Email :</label>
					<input type="email" name="email" value="<?php 
						if(isset($_SESSION['email'])) {
							echo $_SESSION['email'];
						} 
						?>" ><br>

					<?php if(in_array("Email already in use<br>", $error_array)) echo "Email already in use<br>"; 
					else if(in_array("Invalid email format<br>", $error_array)) echo "Invalid email format<br>"; ?>

					<label>Password :</label>
					<input type="password" name="password"><br>

					<?php if(in_array("Your password can only contain english characters or numbers<br>", $error_array)) echo "Your password can only contain english characters or numbers<br>";
					else if(in_array("Your password must be betwen 5 and 30 characters<br>", $error_array)) echo "Your password must be betwen 5 and 30 characters<br>"; ?>

					<input type="submit" name="register_button" value="Register"><br>
					
					<?php if(in_array("<span style='font-size:18px; color: #01794d;'>You're all set! Go ahead and login!</span><br>", $error_array)) echo "<span style='font-size:18px; color: #01794d;'>You're all set! Go ahead and login!</span><br>"; ?>


					<a href="#" id="signin" class="signin">Already have an account? Sign in here!</a>
				</form>
			</div>
		</div>
	</center>

	<!-- <?php include("include/footer.php"); ?> -->
	
	<script type="text/javascript" src="resources/js/register.js"></script>	
