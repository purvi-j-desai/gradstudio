<?php
$username = "gs-admin";
$password = "Thu,Nov16";
$hostname = "localhost";
$db = "gradstudio";

$body2  = file_get_contents('php://input');
echo $body2;

//connection to the database
$dbhandle = mysqli_connect($hostname, $username, $password, $db);
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

//select a database to work with
$sql = "CREATE TABLE IF NOT EXISTS survey
(

age INT NOT NULL,
gender ENUM('male', 'female', 'other') NOT NULL,
is_enrolled ENUM('yes', 'no') NOT NULL,
gpa FLOAT,
is_native_eng ENUM('yes', 'no') NOT NULL,
app_area VARCHAR(255) NOT NULL,
ethnicity VARCHAR(255)
)";

if (mysqli_query($dbhandle, $sql)) {
  echo "Tables created successfully!";
} else {
  echo "Error creating table: " . mysqli_error($dbhandle);
}

$age = $_POST['age'];
echo $age . "  ";
$gender = $_POST['gender'];
echo $gender . "  ";
$enrolled = $_POST['enrolled_in_college'];
echo $enrolled . "  ";
$gpa = $_POST['gpa'];
echo $gpa . "  ";
$english_speaker = $_POST['english_speaker'];
echo $english_speaker . "  ";
$area_of_study = $_POST['area_of_study'];
echo $area_of_study . "  ";
$ethnicity = $_POST['ethnicity'];
echo $ethnicity . "  ";

$sql = "INSERT INTO survey (age, gender, is_enrolled, gpa, is_native_eng, app_area, ethnicity)
VALUES ('$age', '$gender', '$enrolled', '$gpa', '$english_apeaker', '$area_of_study', '$ethnicity')
";

if (!mysqli_query($dbhandle,$sql)) {
 die('Error: ' . mysqli_error($dbhandle));
}
echo "1 record added";

Print "Your table has been created";

//header('Location: /');

?>
