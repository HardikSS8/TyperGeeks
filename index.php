<?php require "config/config.php";  ?>

<?php 
if(isset($_SESSION['username'])) {
	// TO SHOW NAME OF USER IN NAVIGATION BAR
	$userLoggedIn = $_SESSION['username'];
	$user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username = '$userLoggedIn'");
	$user = mysqli_fetch_array($user_details_query);
	$first = $user['first_name'];
	$last = $user['last_name'];
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>JS Typing Speed Test</title>
	<link href="//db.onlinewebfonts.com/c/6cb4254d224fa60f15c496c4720b5c9a?family=Ninja+Naruto" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" type="text/css" href="vendor/css/ionicons.min.css">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="resources/css/style.css">

	<style>
		.nav_menu a {
			font-size: 17px;
		}
		
		#logo {
			font-size: 30px;
			margin-top: 5px;	
		}

		.masthead h1 {
			margin: 0px;
			padding: 33px;
		}

		.details {
			width: 750px;
			height: 440px;
		 	margin: 20px 0px 20px 0px;
		}	

		footer {
		    padding: 20px;
		    margin-top: 30px;
		}

		footer p {
			margin: 0px 375px 27px 0px;
		}
		
		.social-links {
			margin-top: 23px;
		}
		
		.footer-nav {
			margin: 30px 0px 0px 0px;
		}
	</style>
</head>

<body>
	
	<?php include("include/nav_menu.php"); ?>

	<center>
		<main class="main">
			<section id="enter-details" style="display: block;">
				<center>
					<div class="details">
						<header>
							<p id="title">Register test details</p>
						</header>

						<div class="form-details">
							<p id="heading">Fill out the required details for your typing test.</p><hr style="margin-top: 15px; margin-bottom: 25PX; width: 98%;">
							<form method="POST" action="typing.php">

								<?php 
									if(isset($user['first_name'])) {
										echo "
											<label>First name :-</label>
											<input type='text' name='first_name' id='first_name' value='$first' required disabled><br><br>
											<label>Last name :-</label>
											<input type='text' name='last_name' id='last_name' value='$last' required disabled><br><br>";
									} else {
										echo "
											<label>First name :-</label>
											<input type='text' name='first_name' id='first_name' required><br><br>
											<label>Last name :-</label>
											<input type='text' name='last_name' id='last_name' required><br><br>";
									}
								?>
								<label>Test level :-</label>
								<select id="select-level" name="select-level">
									<option value="" disabled selected>select level</option>
									<option value="Basic">Basic</option>
									<option value="Medium">Medium</option>
									<option value="Hard">Hard</option>
								</select><br>
								<div class="typing-details">

								</div>
							</form>
						</div>
					</div>
				</center>
			</section>

			<center>
				<p style="margin: 0px;"><b>Note:</b> If you want to keep track of your record then <a href="register.php">Login here.</a></p>
			</center>

			<?php include("include/footer.php"); ?>
		</main>
	</center>

	<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="resources/js/script.js"></script>
</body>
</html>