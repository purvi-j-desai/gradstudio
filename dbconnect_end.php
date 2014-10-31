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
$user_id = $_POST['user_id'];
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
$additional_comments = $_POST['additional_comments'];
$followup = $_POST['followup'];
if (empty($followup)) {
	$followup = "no";
}


session_start();
$_SESSION = array();

// Validate form data
$error = false;

if (empty($user_id)) {
	header("Location: /gradstudio/missing_id.html");
	exit(1);
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


$_SESSION['error'] = $error;


// check if the user already exists in the database
$sql = "SELECT user_id FROM survey WHERE user_id = '$user_id'";
$result = mysqli_query($dbhandle, $sql);
if (!$result) {
	die('Error: ' . mysqli_error($dbhandle));
}
if (!(mysqli_num_rows($result) > 0)) {
	// user is not in the database
	$error = true;
	header("Location: /gradstudio/missing_id.html");
	exit(1);
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
	$_SESSION['additional_comments'] = $additional_comments;
	$_SESSION['followup'] = $followup;
	
	// Go back to end survey
	header("Location: /gradstudio/end_survey.php?user_id=$user_id");
	exit(1);
}

// If we make it to here, there are no errors and the user is in the database

// Save all new data in the survey table
// prepared statement to avoid sql injection in additional comments. no hackers allowed here

if ($stmt = mysqli_prepare($dbhandle, "UPDATE survey  SET age='$age', gender='$gender', ethnicity='$ethnicity', end_survey1='$end_survey1', 
end_survey2='$end_survey2', end_survey3='$end_survey3', end_survey4='$end_survey4', end_survey5='$end_survey5', 
end_survey6='$end_survey6', additional_comments= ?, followup='$followup'
WHERE user_id='$user_id'")) {
	
	mysqli_stmt_bind_param($stmt, "s", $additional_comments);
	if (!mysqli_stmt_execute($stmt)) {
		die('Error: ' . mysqli_stmt_error($stmt));
	}
	mysqli_stmt_close($stmt);
}


header("Location: /gradstudio/thankyou.html");

?>
