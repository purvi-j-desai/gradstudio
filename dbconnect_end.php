<?php

$username = "gs-admin";
$password = "Thu,Nov16";
$hostname = "localhost";
$db = "gradstudio";


//connection to the database
$dbhandle = mysqli_connect($hostname, $username, $password, $db);
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// Collect data from form
$email_address = $_POST['email_address'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$ethnicity = $_POST['ethnicity'];
if ("other" == $ethnicity) $ethnicity = $_POST["ethnicity_other"];
$end_survey1 = $_POST['end_survey1'];
$end_survey2 = $_POST['end_survey2'];
$end_survey3 = $_POST['end_survey3'];
$end_survey4 = $_POST['end_survey4'];
$end_survey5 = $_POST['end_survey5'];
$end_survey6 = $_POST['end_survey6'];
$end_survey7 = $_POST['end_survey7'];
$additional_comments = $_POST['additional_comments'];



session_start();
$_SESSION = array();

// Validate form data
$error = false;
if (empty($email_address)) {
	$error = true;
	$_SESSION['email_address_error'] = "*";
} else if (!filter_var($email_address, FILTER_VALIDATE_EMAIL)) {
	$error = true;	
	$_SESSION['email_address_error'] = "Must be a valid email address.";
}

if (empty($age)) {
	$error = true;
	$_SESSION['age_error'] = "*";
} else if (!is_numeric($age)) {
	$error = true;	
	$_SESSION['age_error'] = "Must be a number.";
}

if (empty($gender)) {
	$error = true;
	$_SESSION['gender_error'] = "*";
}

if (empty($end_survey1)) {
	$error = true;
	$_SESSION['end_survey1_error'] = "*";
}

if (empty($end_survey2)) {
	$error = true;
	$_SESSION['end_survey2_error'] = "*";
}

if (empty($end_survey3)) {
	$error = true;
	$_SESSION['end_survey3_error'] = "*";
}

if (empty($end_survey4)) {
	$error = true;
	$_SESSION['end_survey4_error'] = "*";
}

if (empty($end_survey5)) {
	$error = true;
	$_SESSION['end_survey5_error'] = "*";
}

if (empty($end_survey6)) {
	$error = true;
	$_SESSION['end_survey6_error'] = "*";
}

if (empty($end_survey7)) {
	$error = true;
	$_SESSION['end_survey7_error'] = "*";
}

$_SESSION['error'] = $error;

// Save email address
$_SESSION['email_address'] = $email_address;


// check if the user already exists in the database
$sql = "SELECT email_address FROM survey WHERE email_address = '$email_address'";
$result = mysqli_query($dbhandle, $sql);
if (!$result) {
	die('Error: ' . mysqli_error($dbhandle));
}
if (!(mysqli_num_rows($result) > 0)) {
	// user is not in the database
	$error = true;
	$_SESSION['email_address_error'] = "This email address is not in our database. Please enter the same email you used for the initial survey.";
}

if ($error) {
	// Save data so the form will still be filled out
	
	$_SESSION['age'] = $age;
	$_SESSION['gender'] = $gender;
	$_SESSION['ethnicity'] = $ethnicity;
	$_SESSION['end_survey1'] = $end_survey1;
	$_SESSION['end_survey2'] = $end_survey2;
	$_SESSION['end_survey3'] = $end_survey3;
	$_SESSION['end_survey4'] = $end_survey4;
	$_SESSION['end_survey5'] = $end_survey5;
	$_SESSION['end_survey6'] = $end_survey6;
	$_SESSION['end_survey7'] = $end_survey7;
	$_SESSION['additional_comments'] = $additional_comments;
	
	// Go back to end survey
	header('Location: /gradstudio/end_survey.php');
	exit(1);
}


// If we make it to here, there are no errors and the user is in the database

// Save all new data in the survey table
// prepared statement to avoid sql injection in additional comments. no hackers allowed here

if ($stmt = mysqli_prepare($dbhandle, "UPDATE survey  SET age='$age', gender='$gender', ethnicity='$ethnicity', end_survey1='$end_survey1', 
end_survey2='$end_survey2', end_survey3='$end_survey3', end_survey4='$end_survey4', end_survey5='$end_survey5', 
end_survey6='$end_survey6', end_survey7='$end_survey7', additional_comments= ?
WHERE email_address='$email_address'")) {
	
	mysqli_stmt_bind_param($stmt, "s", $additional_comments);
	if (!mysqli_stmt_execute($stmt)) {
		die('Error: ' . mysqli_stmt_error($stmt));
	}
	mysqli_stmt_close($stmt);
}


header("Location: /gradstudio/thankyou.php");

?>
