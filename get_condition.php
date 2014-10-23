<?php
function get_condition($email_address) {
	$username = "gs-admin";
	$password = "Thu,Nov16";
	$hostname = "localhost";
	$db = "gradstudio";

	//connection to the database
	$dbhandle = mysqli_connect($hostname, $username, $password, $db);
	if (mysqli_connect_errno()) {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$sql = "SELECT feedback_condition FROM survey WHERE email_address = '$email_address'";
	$result = mysqli_query($dbhandle, $sql);
	if (!$result) {
		return false;
	} else {
		$row = $result->fetch_row();
		$feedback_condition = $row['0'];
		return $feedback_condition;
	}
}


?>