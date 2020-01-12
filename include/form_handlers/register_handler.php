<?php
//Declaring variables to prevent errors
$fname = ""; //First name
$lname = ""; //Last name
$em = ""; //email
$password = ""; //password
$date = ""; //Sign up date 
$error_array = array(); //Holds error messages

if(isset($_POST['register_button'])){

	//Registration form values

	//First name
	$fname = strip_tags($_POST['first_name']); //Remove html tags
	$fname = str_replace(' ', '', $fname); //remove spaces
	$fname = ucfirst(strtolower($fname)); //Uppercase first letter
	$_SESSION['first_name'] = $fname; //Stores first name into session variable

	//Last name
	$lname = strip_tags($_POST['last_name']); //Remove html tags
	$lname = str_replace(' ', '', $lname); //remove spaces
	$lname = ucfirst(strtolower($lname)); //Uppercase first letter
	$_SESSION['last_name'] = $lname; //Stores last name into session variable

	//email
	$em = strip_tags($_POST['email']); //Remove html tags
	$em = str_replace(' ', '', $em); //remove spaces
	$em = ucfirst(strtolower($em)); //Uppercase first letter
	$_SESSION['email'] = $em; //Stores email into session variable

	//Password
	$password = strip_tags($_POST['password']); //Remove html tags

	$date = date("Y-m-d H:i:s"); //Current date

	//Check if email is in valid format 
	if(filter_var($em, FILTER_VALIDATE_EMAIL)) {

		$em = filter_var($em, FILTER_VALIDATE_EMAIL);
		//Check if email already exists 
		$e_check = mysqli_query($con, "SELECT email FROM users WHERE email='$em'");
		//Count the number of rows returned
		$num_rows = mysqli_num_rows($e_check);
		if($num_rows > 0) {
			array_push($error_array, "Email already in use<br>");
		}
	}
	else {
		array_push($error_array, "Invalid email format<br>");
	}

	if(strlen($fname) > 25 || strlen($fname) < 2) {
		array_push($error_array, "Your first name must be between 2 and 25 characters<br>");
	}

	if(strlen($lname) > 25 || strlen($lname) < 2) {
		array_push($error_array,  "Your last name must be between 2 and 25 characters<br>");
	}

	if(preg_match('/[^A-Za-z0-9]/', $password)) {
		array_push($error_array, "Your password can only contain english characters or numbers<br>");
	}

	if(strlen($password > 30 || strlen($password) < 5)) {
		array_push($error_array, "Your password must be betwen 5 and 30 characters<br>");
	}


	if(empty($error_array)) {
		$password = md5($password); //Encrypt password before sending to database

		//Generate username by concatenating first name and last name
		$username = strtolower($fname . "_" . $lname);
		$check_username_query = mysqli_query($con, "SELECT username FROM users WHERE username='$username'");


		$i = 0; 
		//if username exists add number to username
		while(mysqli_num_rows($check_username_query) != 0) {
			$i++; //Add 1 to i
			$username = $username . "_" . $i;
			$check_username_query = mysqli_query($con, "SELECT username FROM users WHERE username='$username'");
		}

		// INSERT ALL VALUES OF FORM AFTER VALIDATION.
		$query = mysqli_query($con, "INSERT INTO users VALUES ('', '$fname', '$lname', '$username', '$em', '$password', '$date', 'no', 'yes')");

		array_push($error_array, "<span style='color: #14C800;'>You're all set! Go ahead and login!</span><br>");

		//Clear session variables 
		$_SESSION['first_name'] = "";
		$_SESSION['last_name'] = "";
		$_SESSION['email'] = "";
	}

}
?>