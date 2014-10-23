<?php

$username = "gs-admin";
$password = "Thu,Nov16";
$hostname = "localhost";
$db = "gradstudio";

$body2  = file_get_contents('php://input');
//echo $body2;

//connection to the database
$dbhandle = mysqli_connect($hostname, $username, $password, $db);
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

//select a database to work with
$sql = "CREATE TABLE IF NOT EXISTS survey
(
email_address VARCHAR(255) NOT NULL,
condition ENUM('review', 'outline') NOT NULL,
age INT NOT NULL,
gender ENUM('male', 'female', 'other') NOT NULL,
is_enrolled ENUM('yes', 'no') NOT NULL,
gpa FLOAT,
is_native_eng ENUM('yes', 'no') NOT NULL,
app_area VARCHAR(255) NOT NULL,
ethnicity VARCHAR(255),
beliefs1 ENUM('1', '2', '3', '4', '5', '6', '7') NOT NULL, 
beliefs2 ENUM('1', '2', '3', '4', '5', '6', '7') NOT NULL,
beliefs3 ENUM('1', '2', '3', '4', '5', '6', '7') NOT NULL,
beliefs4 ENUM('1', '2', '3', '4', '5', '6', '7') NOT NULL,
beliefs5 ENUM('1', '2', '3', '4', '5', '6', '7') NOT NULL,
beliefs6 ENUM('1', '2', '3', '4', '5', '6', '7') NOT NULL,
beliefs7 ENUM('1', '2', '3', '4', '5', '6', '7') NOT NULL,
beliefs8 ENUM('1', '2', '3', '4', '5', '6', '7') NOT NULL,
beliefs9 ENUM('1', '2', '3', '4', '5', '6', '7') NOT NULL,
beliefs10 ENUM('1', '2', '3', '4', '5', '6', '7') NOT NULL,
beliefs12 ENUM('1', '2', '3', '4', '5', '6', '7') NOT NULL,
beliefs13 ENUM('1', '2', '3', '4', '5', '6', '7') NOT NULL,
beliefs14 ENUM('1', '2', '3', '4', '5', '6', '7') NOT NULL
)";

if (mysqli_query($dbhandle, $sql)) {
  // echo "Tables created successfully!";
} else {
  echo "Error creating table: " . mysqli_error($dbhandle);
}

// Collect data from form
$email_address = $_POST['email_address'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$enrolled = $_POST['enrolled_in_college'];
$gpa = $_POST['gpa'];
$english_speaker = $_POST['english_speaker'];
$area_of_study = $_POST['area_of_study'];
if ("other" == $area_of_study) $area_of_study = $_POST["area_of_study_other"];
$ethnicity = $_POST['ethnicity'];
if ("other" == $ethnicity) $ethnicity = $_POST["ethnicity_other"];
$beliefs1 =$_POST['beliefs1'];
$beliefs2 =$_POST['beliefs2'];
$beliefs3 =$_POST['beliefs3'];
$beliefs4 =$_POST['beliefs4'];
$beliefs5 =$_POST['beliefs5'];
$beliefs6 =$_POST['beliefs6'];
$beliefs7 =$_POST['beliefs7'];
$beliefs8 =$_POST['beliefs8'];
$beliefs9 =$_POST['beliefs9'];
$beliefs10 =$_POST['beliefs10'];
$beliefs11 =$_POST['beliefs11'];
$beliefs12 =$_POST['beliefs12'];
$beliefs13 =$_POST['beliefs13'];
$beliefs14 =$_POST['beliefs14'];

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

if (empty($enrolled)) {
	$error = true;
	$_SESSION['enrolled_in_college_error'] = "*";
}

if (!empty($gpa) && !is_numeric($gpa)) {
	$error = true;
	$_SESSION['gpa_error'] = "Must be a number.";
}

if (empty($english_speaker)) {
	$error = true;
	$_SESSION['english_speaker_error'] = "*";
}

if (empty($area_of_study)) {
	$error = true;
	$_SESSION['area_of_study_error'] = "*";
} 

if (empty($beliefs1)) {
	$error = true;
	$_SESSION['beliefs1_error'] = "*";
}

if (empty($beliefs2)) {
	$error = true;
	$_SESSION['beliefs2_error'] = "*";
}

if (empty($beliefs3)) {
	$error = true;
	$_SESSION['beliefs3_error'] = "*";
}

if (empty($beliefs4)) {
	$error = true;
	$_SESSION['beliefs4_error'] = "*";
}

if (empty($beliefs5)) {
	$error = true;
	$_SESSION['beliefs5_error'] = "*";
}

if (empty($beliefs6)) {
	$error = true;
	$_SESSION['beliefs6_error'] = "*";
}

if (empty($beliefs7)) {
	$error = true;
	$_SESSION['beliefs7_error'] = "*";
}

if (empty($beliefs8)) {
	$error = true;
	$_SESSION['beliefs8_error'] = "*";
}

if (empty($beliefs9)) {
	$error = true;
	$_SESSION['beliefs9_error'] = "*";
}

if (empty($beliefs10)) {
	$error = true;
	$_SESSION['beliefs10_error'] = "*";
}

if (empty($beliefs11)) {
	$error = true;
	$_SESSION['beliefs11_error'] = "*";
}

if (empty($beliefs12)) {
	$error = true;
	$_SESSION['beliefs12_error'] = "*";
}

if (empty($beliefs13)) {
	$error = true;
	$_SESSION['beliefs13_error'] = "*";
}

if (empty($beliefs14)) {	
	$error = true;
	$_SESSION['beliefs14_error'] = "*";
}

$_SESSION['error'] = $error;

// Save email address
$_SESSION['email_address'] = $email_address;

if ($error) {
	// Save data so the form will still be filled out
	
	$_SESSION['age'] = $age;
	$_SESSION['gender'] = $gender;
	$_SESSION['enrolled_in_college'] = $enrolled;
	$_SESSION['gpa'] = $gpa;
	$_SESSION['english_speaker'] = $english_speaker;
	$_SESSION['area_of_study'] = $area_of_study;
	$_SESSION['ethnicity'] = $ethnicity;
	$_SESSION['beliefs1'] = $beliefs1;
	$_SESSION['beliefs2'] = $beliefs2;
	$_SESSION['beliefs3'] = $beliefs3;
	$_SESSION['beliefs4'] = $beliefs4;
	$_SESSION['beliefs5'] = $beliefs5;
	$_SESSION['beliefs6'] = $beliefs6;
	$_SESSION['beliefs7'] = $beliefs7;
	$_SESSION['beliefs8'] = $beliefs8;
	$_SESSION['beliefs9'] = $beliefs9;
	$_SESSION['beliefs10'] = $beliefs10;
	$_SESSION['beliefs11'] = $beliefs11;
	$_SESSION['beliefs12'] = $beliefs12;
	$_SESSION['beliefs13'] = $beliefs13;
	$_SESSION['beliefs14'] = $beliefs14;
	
	// Go back to questionnaire
	header('Location: /gradstudio/questionnaire.php');
	exit(1);
}
// If we make it to here, there are no errors




// Table that stores which condition to send the next english speaker and next non-english
// speaker to.
$sql = "CREATE TABLE IF NOT EXISTS next_conditions
(
english_speaker ENUM('yes', 'no') NOT NULL,
next_condition ENUM('review', 'outline') NOT NULL,
PRIMARY KEY (english_speaker)
)";

if (mysqli_query($dbhandle, $sql)) {
  // echo "Tables created successfully!";
} else {
   echo "Error creating table: " . mysqli_error($dbhandle);
}

// Insert initial values into table only if we just created it.
$sql = "INSERT INTO next_conditions (english_speaker, next_condition) VALUES ('yes', 'review')
ON DUPLICATE KEY UPDATE english_speaker=english_speaker";
if (!mysqli_query($dbhandle,$sql)) {
 die('Error: ' . mysqli_error($dbhandle));
}
$sql = "INSERT INTO next_conditions (english_speaker, next_condition) VALUES ('no', 'outline')
ON DUPLICATE KEY UPDATE english_speaker=english_speaker";
if (!mysqli_query($dbhandle,$sql)) {
 die('Error: ' . mysqli_error($dbhandle));
}

// Now retrieve current value and use it, depending on whether user is english speaker or not.
$sql = "SELECT next_condition FROM next_conditions WHERE english_speaker = '$english_speaker'";

$result = mysqli_query($dbhandle, $sql);
if (!$result) {
	die('Error: ' . mysqli_error($dbhandle));
}
$row = $result->fetch_row();
$next_condition = $row['0'];
$_SESSION['next_condition'] = $next_condition;


// Save all user data in the survey table
$sql = "INSERT INTO survey (email_address, condition, age, gender, is_enrolled, gpa, is_native_eng, app_area, ethnicity, beliefs1, beliefs2, beliefs3, beliefs4, beliefs5, beliefs6, beliefs7, beliefs8, beliefs9, beliefs10, beliefs12, beliefs13, beliefs14)
VALUES ('$email_address', '$next_condition', '$age', '$gender', '$enrolled', '$gpa', '$english_speaker', '$area_of_study', '$ethnicity', '$beliefs1', '$beliefs2', '$beliefs3', '$beliefs4', '$beliefs5', '$beliefs6', '$beliefs7', '$beliefs8', '$beliefs9', '$beliefs10', '$beliefs12', '$beliefs13', '$beliefs14')
";

if (!mysqli_query($dbhandle,$sql)) {
 die('Error: ' . mysqli_error($dbhandle));
}

// update next_condition in table so the next user will get sent to the other condition
if ($next_condition == "review") {
	$new_condition = "outline";
} else { // next_condition == "outline" 
	$new_condition = "review";
}

$sql = "UPDATE next_conditions SET next_condition='$new_condition' WHERE english_speaker = '$english_speaker'";
if (!mysqli_query($dbhandle,$sql)) {
 die('Error: ' . mysqli_error($dbhandle));
}

header("Location: /gradstudio/postsurvey.php");

?>
