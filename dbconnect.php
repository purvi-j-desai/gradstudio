<?php
$username = "gs-admin";
$password = "Thu,Nov16";
$hostname = "d.ucsd.edu"; 

//connection to the database
$dbhandle = mysql_connect($hostname, $username, $password) 
  or die("Unable to connect to MySQL");
echo "Connected to MySQL<br>";
?>
