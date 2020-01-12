<?php 

require "config/config.php";

	$con = mysqli_connect("localhost", "root", "", "typing_test");

	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];


	$username = strtolower($first_name . "_" . $last_name);
	$check_username_query = mysqli_query($con, "SELECT username FROM users WHERE username='$username'");

	if(mysqli_num_rows($check_username_query) == 1) {
		$username = $username;
	} else {
		$i = 0; 
		//if username exists add number to username
		while(mysqli_num_rows($check_username_query) != 0) {
			$i++; //Add 1 to i
			$username = $username . "_" . $i;
			$check_username_query = mysqli_query($con, "SELECT username FROM users WHERE 	username='$username'");
		}
	}

	$userLevel = $_POST['userLevel'];
	$userTiming = $_POST['timing'];

	$query = mysqli_query($con, "INSERT INTO data VALUES('', '$first_name', '$last_name', '$username', '$userLevel', '$userTiming')");

?>