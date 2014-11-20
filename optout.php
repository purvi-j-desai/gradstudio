<?php
function optout($email_address) {
	$username = "gs-admin";
	$password = "Thu,Nov16";
	$hostname = "localhost";
	$db = "gradstudio";

	//connection to the database
	$dbhandle = mysqli_connect($hostname, $username, $password, $db);
	if (mysqli_connect_errno()) {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	// check if they are in the database
	$sql = "SELECT user_id FROM survey WHERE email_address = '$email_address'";
	$result = mysqli_query($dbhandle, $sql);
	if (!$result) {
		return false;
	} else {
		// set opt out to true
		$sql = "UPDATE survey SET opt_out='true' where email_address = '$email_address'";
		$result = mysqli_query($dbhandle, $sql);
		if (!$result) {
			echo mysqli_error($dbhandle);
			echo "<br/>";
			return false;
		} else {
			return true;
		}
	}
}


?>