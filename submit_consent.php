<?php 
	
$consent1 = $_POST['consent1'];
$consent2 = $_POST['consent2'];

if (!($consent1 == "yes" && $consent2 == "yes")) {
	header("Location: /gradstudio");
} else {
	header("Location: /gradstudio/questionnaire.php");
}
	
?>