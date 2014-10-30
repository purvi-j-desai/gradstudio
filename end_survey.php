<!DOCTYPE HTML>
<!--
	MegaCorp by TEMPLATED
    templated.co @templatedco
    Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->

<html>
<head>
<title>GradStudio</title>

<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800" rel="stylesheet" type="text/css" />
<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/skel.min.js"></script>
<!--<script src="js/skel-panels.min.js"></script>-->
<script src="js/init.js"></script>
<script src="js/form_validation_end.js"></script>
<noscript>
	<link rel="stylesheet" href="css/skel-noscript.css" />
	<link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="css/style-desktop.css" />
</noscript>

<style type="text/css">
html {
	height: 100%;
}
</style>


<style>
.errornote, #errormsg, .errorstar { 
	color: red;
	display: none;
}

.server_error {
	color: red;
}


</style>

</head>
<body>

<?php

session_start();

$user_id = $_GET['user_id'];
if (empty($user_id)) {
	header("Location: /gradstudio/missing_id.html");
	exit(1);
}

// Get error and form data
$error = $_SESSION['error'];

$age_error = $_SESSION['age_error'];
$gender_error = $_SESSION['gender_error'];
$end_survey1_error = $_SESSION['end_survey1_error'];
$end_survey2_error = $_SESSION['end_survey2_error'];
$end_survey3_error = $_SESSION['end_survey3_error'];
$end_survey4_error = $_SESSION['end_survey4_error'];
$end_survey5_error = $_SESSION['end_survey5_error'];
$end_survey6_error = $_SESSION['end_survey6_error'];


$age = $_SESSION['age'];
$gender = $_SESSION['gender'];
$ethnicity = $_SESSION['ethnicity'];
$end_survey1 = $_SESSION['end_survey1'];
$end_survey2 = $_SESSION['end_survey2'];
$end_survey3 = $_SESSION['end_survey3'];
$end_survey4 = $_SESSION['end_survey4'];
$end_survey5 = $_SESSION['end_survey5'];
$end_survey6 = $_SESSION['end_survey6'];
$additional_comments = $_SESSION['additional_comments'];
$followup = $_SESSION['followup'];
?>

<!-- Header -->
<div id="header-wrapper-small">

	<div id="header" class="container">
		<div id="logo"><h1><a href="#">GradStudio</a></h1></div>
                <nav id="nav">
                    <ul>
                        <li class="current_page_item"><a href="index.html">Homepage</a></li>
                        <li><a href="instructions.html">Instructions</a></li>
						<li><a href="faq.html">FAQ</a></li>
						<li><a href="aboutus.html">About Us</a></li>
                    </ul>
                </nav>
		
	</div>

</div>
<!-- Header Ends Here -->

<div id="page">
<div class="container">
<div class="row">
	
<div id="content" class="12u skel-cell-important">
<article>
<header>
	<h2 class="main-title">End Survey</h2>
</header>
<p>As a thank-you for your participation, we will be inviting a randomly-selected group of 
people who complete this End Survey to submit an essay for free, in-depth editing help and 
feedback from our team of experienced PhD researchers!</p><br/>
<div id="errormsg" style="<?php if ($error) echo 'display: block !important'; ?>">Please answer all required questions.</div>
<h2>Part 1</h2>
<form action="dbconnect_end.php" method="post" onsubmit="return validateForm()">
<!-- <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="return validateForm()">-->
<ul>
	<li id="age">
		<span class="errorstar">*</span><span class="errornote">Must be a number.</span>
		<span class="server_error"><?php echo $age_error;?></span>
		<b>Age:</b>&nbsp;<input type="text" name="age" size="4" maxlength="3" value="<?php echo $age ?>">
	</li>
	<li id="gender">
		<span class="errorstar">*</span><span class="server_error"><?php echo $gender_error;?></span>
		<b>Gender: </b><input type="radio" name="gender" 
			<?php if (isset($gender) && $gender=="male") echo "checked";?>
			value="male">Male</input>&nbsp;&nbsp;&nbsp;
		<input type="radio" name="gender" 
			<?php if (isset($gender) && $gender=="female") echo "checked";?> 
			value="female">Female</input>&nbsp;&nbsp;&nbsp;
		<input type="radio" name="gender" 
		<?php if (isset($gender) && $gender=="other") echo "checked";?>
		value="other">Other</input>
	</li>
	<li id="ethnicity">
		<b>Ethnicity</b> (optional):<br/>
		<input type="radio" name="ethnicity" 
		<?php if (isset($ethnicity) && $ethnicity=="african_american") echo "checked";?>
		value="african_american">African American</input><br/>
		<input type="radio" name="ethnicity" 
		<?php if (isset($ethnicity) && $ethnicity=="asian") echo "checked";?>
		value="asian">Asian</input><br/>
		<input type="radio" name="ethnicity" 
		<?php if (isset($ethnicity) && $ethnicity=="caucasian") echo "checked";?>
		value="caucasian">Caucasian</input><br/>
		<input type="radio" name="ethnicity" 
		<?php if (isset($ethnicity) && $ethnicity=="latino") echo "checked";?>
		value="latino">Latino</input><br/>
		<input type="radio" name="ethnicity" 
		<?php if (isset($ethnicity) && $ethnicity!="african_american" && $ethnicity!="asian"
		&& $ethnicity!="caucasian" && $ethnicity!="latino") echo "checked";?>
		value="other">Other: </input>
		<input type="text" name="ethnicity_other" size="30" maxlength="30"
		value="<?php if (isset($ethnicity) && $ethnicity!="african_american" && $ethnicity!="asian"
		&& $ethnicity!="caucasian" && $ethnicity!="latino") echo $ethnicity;?>"
		></input><br/>
	</li>
</ul>	
<br/>

<h2>Part 2</h2>
<p>The following is a brief survey about your experiences in the GradStudio Project. It is important
that you know there are no “right” or “wrong” answers; please simply answer honestly and
thoughtfully. Thank you!  </p>
<ul>
<table>
<div id="sticky_anchor"><tr id="survey_header">
	<td class="td_column1"></td>
	<td>1 <br/>Strongly Disagree</td>
	<td>2 <br/>Disagree</td>
	<td>3 <br/>Neutral</td>
	<td>4 <br/>Agree</td>
	<td>5 <br/>Strongly Agree</td>
</tr></div>
<tr>
	<td class="td_column1"><li id="end_survey1">
	<span class="errorstar">*</span><span class="server_error"><?php echo $end_survey1_error;?></span> 
	The peer reviewers gave me helpful, relevant comments</li></td>
	<td><input type="radio" name="end_survey1" value="1"
	<?php if (isset($end_survey1) && $end_survey1=="1") echo "checked";?>></input></td>
	<td><input type="radio" name="end_survey1" value="2"
	<?php if (isset($end_survey1) && $end_survey1=="2") echo "checked";?>></input></td>
	<td><input type="radio" name="end_survey1" value="3"
	<?php if (isset($end_survey1) && $end_survey1=="3") echo "checked";?>></input></td>
	<td><input type="radio" name="end_survey1" value="4"
	<?php if (isset($end_survey1) && $end_survey1=="4") echo "checked";?>></input></td>
	<td><input type="radio" name="end_survey1" value="5"
	<?php if (isset($end_survey1) && $end_survey1=="5") echo "checked";?>></input></td>
</tr>
<tr>
	<td class="td_column1"><li id="end_survey2">
	<span class="errorstar">*</span><span class="server_error"><?php echo $end_survey2_error;?></span> 
	My essay changed for the better because of the comments I got from reviewers</li></td>
	<td><input type="radio" name="end_survey2" value="1"
	<?php if (isset($end_survey2) && $end_survey2=="1") echo "checked";?>></input></td>
	<td><input type="radio" name="end_survey2" value="2"
	<?php if (isset($end_survey2) && $end_survey2=="2") echo "checked";?>></input></td>
	<td><input type="radio" name="end_survey2" value="3"
	<?php if (isset($end_survey2) && $end_survey2=="3") echo "checked";?>></input></td>
	<td><input type="radio" name="end_survey2" value="4"
	<?php if (isset($end_survey2) && $end_survey2=="4") echo "checked";?>></input></td>
	<td><input type="radio" name="end_survey2" value="5"
	<?php if (isset($end_survey2) && $end_survey2=="5") echo "checked";?>></input></td>
</tr>
<tr>
	<td class="td_column1"><li id="end_survey3">
	<span class="errorstar">*</span><span class="server_error"><?php echo $end_survey3_error;?></span> 
	I gave helpful, relevant comments to the essays I reviewed</li></td>
	<td><input type="radio" name="end_survey3" value="1"
	<?php if (isset($end_survey3) && $end_survey3=="1") echo "checked";?>></input></td>
	<td><input type="radio" name="end_survey3" value="2"
	<?php if (isset($end_survey3) && $end_survey3=="2") echo "checked";?>></input></td>
	<td><input type="radio" name="end_survey3" value="3"
	<?php if (isset($end_survey3) && $end_survey3=="3") echo "checked";?>></input></td>
	<td><input type="radio" name="end_survey3" value="4"
	<?php if (isset($end_survey3) && $end_survey3=="4") echo "checked";?>></input></td>
	<td><input type="radio" name="end_survey3" value="5"
	<?php if (isset($end_survey3) && $end_survey3=="5") echo "checked";?>></input></td>
</tr>
<tr>
	<td class="td_column1"><li id="end_survey4">
	<span class="errorstar">*</span><span class="server_error"><?php echo $end_survey4_error;?></span> 
	I enjoyed my experience in this project </li></td>
	<td><input type="radio" name="end_survey4" value="1"
	<?php if (isset($end_survey4) && $end_survey4=="1") echo "checked";?>></input></td>
	<td><input type="radio" name="end_survey4" value="2"
	<?php if (isset($end_survey4) && $end_survey4=="2") echo "checked";?>></input></td>
	<td><input type="radio" name="end_survey4" value="3"
	<?php if (isset($end_survey4) && $end_survey4=="3") echo "checked";?>></input></td>
	<td><input type="radio" name="end_survey4" value="4"
	<?php if (isset($end_survey4) && $end_survey4=="4") echo "checked";?>></input></td>
	<td><input type="radio" name="end_survey4" value="5"
	<?php if (isset($end_survey4) && $end_survey4=="5") echo "checked";?>></input></td>
</tr>
<tr>
	<td class="td_column1"><li id="end_survey5">
	<span class="errorstar">*</span><span class="server_error"><?php echo $end_survey5_error;?></span> 
	If I had a choice between anonymous reviewers and reviewers that I know (e.g. Facebook 
	friends, LinkedIn connections), I would choose reviewers that I know.</li></td>
	<td><input type="radio" name="end_survey5" value="1"
	<?php if (isset($end_survey5) && $end_survey5=="1") echo "checked";?>></input></td>
	<td><input type="radio" name="end_survey5" value="2"
	<?php if (isset($end_survey5) && $end_survey5=="2") echo "checked";?>></input></td>
	<td><input type="radio" name="end_survey5" value="3"
	<?php if (isset($end_survey5) && $end_survey5=="3") echo "checked";?>></input></td>
	<td><input type="radio" name="end_survey5" value="4"
	<?php if (isset($end_survey5) && $end_survey5=="4") echo "checked";?>></input></td>
	<td><input type="radio" name="end_survey5" value="5"
	<?php if (isset($end_survey5) && $end_survey5=="5") echo "checked";?>></input></td>
</tr>
<tr>
	<td class="td_column1"><li id="end_survey6">
	<span class="errorstar">*</span><span class="server_error"><?php echo $end_survey6_error;?></span> 
	I feel confident that I am a strong candidate for graduate school</li></td>
	<td><input type="radio" name="end_survey6" value="1"
	<?php if (isset($end_survey6) && $end_survey6=="1") echo "checked";?>></input></td>
	<td><input type="radio" name="end_survey6" value="2"
	<?php if (isset($end_survey6) && $end_survey6=="2") echo "checked";?>></input></td>
	<td><input type="radio" name="end_survey6" value="3"
	<?php if (isset($end_survey6) && $end_survey6=="3") echo "checked";?>></input></td>
	<td><input type="radio" name="end_survey6" value="4"
	<?php if (isset($end_survey6) && $end_survey6=="4") echo "checked";?>></input></td>
	<td><input type="radio" name="end_survey6" value="5"
	<?php if (isset($end_survey6) && $end_survey6=="5") echo "checked";?>></input></td>
</tr>
</table>
</ul><br/>
<p id="additional_comments">
	<b>Feel free to share any additional comments or feedback: </b><br/>
	<textarea name="additional_comments" rows="8" cols="60" maxlength="750"><?php echo $additional_comments ?></textarea>
</p>

<p id="followup">
To learn more about how to help people in their applications for future projects, we’d like 
to followup with you and learn what graduate programs you’ve been accepted into. <br/>Check here 
to help our future research!
<input type="checkbox" name="followup" value="yes" <?php if (isset($followup) && $followup=="yes") echo "checked";?>></input>
</p>
<br/>
<input type="hidden" name="user_id" value="<?php echo $user_id ?>" />
<button class="button button-alt2" type="submit">Submit</button>
</form>


</article>
</div>
</div>
</div>
</div>


<!-- Copyright -->
<div id="copyright" class="container">
	Design: <a href="http://templated.co">TEMPLATED</a>
	Images: © Catherine M. Hicks
</div>

</body>
</html>
