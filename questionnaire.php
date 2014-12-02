<?php

header("Location: index.html");
exit;

?>
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
<script src="js/form_validation.js"></script>
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

<script type="text/javascript">

/*function sticky_relocate() {
  var window_top = $(window).scrollTop();
  var div_top = $('#sticky_anchor').offset().top;
  if (window_top > div_top) {
    $('#survey_header').addClass('sticky');
  } else {
    $('#survey_header').removeClass('sticky');
  }
}

$(function() {
  $(window).scroll(sticky_relocate);
  sticky_relocate();
});*/

</script>


<style>
.errornote, #errormsg, .errorstar { 
	color: red;
	display: none;
}

.server_error {
	color: red;
}

#survey_header.sticky {
     position: fixed;
     top: 0;
}

</style>

</head>
<body>


<?php

session_start();

// Get error and form data
$error = $_SESSION['error'];

$email_address_error = $_SESSION['email_address_error'];
$enrolled_in_college_error = $_SESSION['enrolled_in_college_error'];
$gpa_error = $_SESSION['gpa_error'];
$english_speaker_error = $_SESSION['english_speaker_error'];
$area_of_study_error = $_SESSION['area_of_study_error'];
$beliefs1_error = $_SESSION['beliefs1_error'];
$beliefs2_error = $_SESSION['beliefs2_error'];
$beliefs3_error = $_SESSION['beliefs3_error'];
$beliefs4_error = $_SESSION['beliefs4_error'];
$beliefs5_error = $_SESSION['beliefs5_error'];
$beliefs6_error = $_SESSION['beliefs6_error'];
$beliefs7_error = $_SESSION['beliefs7_error'];
$beliefs8_error = $_SESSION['beliefs8_error'];
$beliefs9_error = $_SESSION['beliefs9_error'];
$beliefs10_error = $_SESSION['beliefs10_error'];
$beliefs11_error = $_SESSION['beliefs11_error'];
$beliefs12_error = $_SESSION['beliefs12_error'];
$beliefs13_error = $_SESSION['beliefs13_error'];
$beliefs14_error = $_SESSION['beliefs14_error'];

$email_address = $_SESSION['email_address'];
$enrolled_in_college = $_SESSION['enrolled_in_college'];
$gpa = $_SESSION['gpa'];
$english_speaker = $_SESSION['english_speaker'];
$area_of_study = $_SESSION['area_of_study'];
$beliefs1 = $_SESSION['beliefs1'];
$beliefs2 = $_SESSION['beliefs2'];
$beliefs3 = $_SESSION['beliefs3'];
$beliefs4 = $_SESSION['beliefs4'];
$beliefs5 = $_SESSION['beliefs5'];
$beliefs6 = $_SESSION['beliefs6'];
$beliefs7 = $_SESSION['beliefs7'];
$beliefs8 = $_SESSION['beliefs8'];
$beliefs9 = $_SESSION['beliefs9'];
$beliefs10 = $_SESSION['beliefs10'];
$beliefs11 = $_SESSION['beliefs11'];
$beliefs12 = $_SESSION['beliefs12'];
$beliefs13 = $_SESSION['beliefs13'];
$beliefs14 = $_SESSION['beliefs14'];

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
	<h2 class="main-title">Sign-up Survey</h2>
</header>
<p>Fill out the following quick survey to begin the project. Your responses
will be anonymized and will never be shared with participants in this
project.</p><br/>
<div id="errormsg" style="<?php if ($error) echo 'display: block !important'; ?>">Please answer all required questions.</div>
<h2>Part 1</h2>
<form action="dbconnect.php" method="post" onsubmit="return validateForm()">
<!-- <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="return validateForm()">-->
<ul>
	<li id="enrolled_in_college">
		<span class="errorstar">*</span><span class="server_error"><?php echo $enrolled_in_college_error;?></span>
		<b>I am enrolled in College: </b><input type="radio" name="enrolled_in_college" 
		<?php if (isset($enrolled_in_college) && $enrolled_in_college=="yes") echo "checked";?>
		value="yes">Yes</input>&nbsp;&nbsp;&nbsp;
		<input type="radio" name="enrolled_in_college" 
		<?php if (isset($enrolled_in_college) && $enrolled_in_college=="no") echo "checked";?>
		value="no">No</input>&nbsp;<br/>
		<span id="gpa">If Yes, enter your GPA (optional): &nbsp; <input type="text" name="gpa" size="4" maxlength="4" value="<?php echo $gpa ?>"></input>
		<span class="errornote">Must be a number.</span></span><span class="server_error"><?php echo $gpa_error;?></span>
		
	</li>
	<li id="english_speaker">
		<span class="errorstar">*</span><span class="server_error"><?php echo $english_speaker_error;?></span>
		<b>I am a native or fluent English language speaker: </b>
		<input type="radio" name="english_speaker" 
		<?php if (isset($english_speaker) && $english_speaker=="yes") echo "checked";?>
		value="yes">Yes</input>&nbsp;&nbsp;&nbsp;
		<input type="radio" name="english_speaker" 
		<?php if (isset($english_speaker) && $english_speaker=="no") echo "checked";?>
		value="no">No</input>&nbsp;&nbsp;&nbsp;
	</li>
	<li id="area_of_study">
		<span class="errorstar">*</span><span class="server_error"><?php echo $area_of_study_error;?></span>
		<b>Graduate application area:</b><br/>
		<input type="radio" name="area_of_study" 
		<?php if (isset($area_of_study) && $area_of_study=="arts_humanities") echo "checked";?>
		value="arts_humanities">Arts/Humanities</input><br/>
		<input type="radio" name="area_of_study" 
		<?php if (isset($area_of_study) && $area_of_study=="science") echo "checked";?>
		value="science">Science</input><br/>
		<input type="radio" name="area_of_study" 
		<?php if (isset($area_of_study) && $area_of_study=="social_science") echo "checked";?>
		value="social_science">Social Science</input><br/>
		<input type="radio" name="area_of_study" 
		<?php if (isset($area_of_study) && $area_of_study=="law") echo "checked";?>
		value="law">Law</input><br/>
		<input type="radio" name="area_of_study" 
		<?php if (isset($area_of_study) && $area_of_study=="medicine") echo "checked";?>
		value="medicine">Medicine</input><br/>
		<input type="radio" name="area_of_study" 
		<?php if (isset($area_of_study) && $area_of_study!="arts_humanities" && $area_of_study!="science"
		&& $area_of_study!="social_science" && $area_of_study!="law" && $area_of_study!="medicine") echo "checked";?>
		value="other">Other:</input> 
		<input type="text" name="area_of_study_other" size="30" maxlength="30"
		value="<?php if (isset($area_of_study) && $area_of_study!="arts_humanities" && $area_of_study!="science"
		&& $area_of_study!="social_science" && $area_of_study!="law" && $area_of_study!="medicine") echo $area_of_study;?>"
		></input><br/>
	</li>
</ul>	
<br/>
<h2>Part 2</h2><br/>
<p>The following is a short survey about your beliefs and opinions. It
is important that you know there are no right or wrong answers to these
questions. Answer these questions honestly and thoughtfully. </p>
<ul>
<table>
<div id="sticky_anchor"><tr id="survey_header">
	<td class="td_column1"></td>
	<td>1 <br/>Not at all true of me</td>
	<td>2 <br/>Not true of me</td>
	<td>3 <br/>Mostly not true of me</td>
	<td>4 <br/>Neither</td>
	<td>5 <br/>Mostly true of me</td>
	<td>6 <br/>True of me</td>
	<td>7 <br/>Very true of me</td>
</tr></div>
<tr>
	<td class="td_column1"><li id="beliefs1">
	<span class="errorstar">*</span><span class="server_error"><?php echo $beliefs1_error;?></span> 
	I finish what I begin</li></td>
	<td><input type="radio" name="beliefs1" value="1"
	<?php if (isset($beliefs1) && $beliefs1=="1") echo "checked";?>></input></td>
	<td><input type="radio" name="beliefs1" value="2"
	<?php if (isset($beliefs1) && $beliefs1=="2") echo "checked";?>></input></td>
	<td><input type="radio" name="beliefs1" value="3"
	<?php if (isset($beliefs1) && $beliefs1=="3") echo "checked";?>></input></td>
	<td><input type="radio" name="beliefs1" value="4"
	<?php if (isset($beliefs1) && $beliefs1=="4") echo "checked";?>></input></td>
	<td><input type="radio" name="beliefs1" value="5"
	<?php if (isset($beliefs1) && $beliefs1=="5") echo "checked";?>></input></td>
	<td><input type="radio" name="beliefs1" value="6"
	<?php if (isset($beliefs1) && $beliefs1=="6") echo "checked";?>></input></td>
	<td><input type="radio" name="beliefs1" value="7"
	<?php if (isset($beliefs1) && $beliefs1=="7") echo "checked";?>></input></td>
</tr>
<tr>
	<td class="td_column1"><li id="beliefs2">
	<span class="errorstar">*</span><span class="server_error"><?php echo $beliefs2_error;?></span>
	I work very hard. I keep working when others stop to take a break</li></td>
	<td><input type="radio" name="beliefs2" value="1"
	<?php if (isset($beliefs2) && $beliefs2=="1") echo "checked";?>></input></td>
	<td><input type="radio" name="beliefs2" value="2"
	<?php if (isset($beliefs2) && $beliefs2=="2") echo "checked";?>></input></td>
	<td><input type="radio" name="beliefs2" value="3"
	<?php if (isset($beliefs2) && $beliefs2=="3") echo "checked";?>></input></td>
	<td><input type="radio" name="beliefs2" value="4"
	<?php if (isset($beliefs2) && $beliefs2=="4") echo "checked";?>></input></td>
	<td><input type="radio" name="beliefs2" value="5"
	<?php if (isset($beliefs2) && $beliefs2=="5") echo "checked";?>></input></td>
	<td><input type="radio" name="beliefs2" value="6"
	<?php if (isset($beliefs2) && $beliefs2=="6") echo "checked";?>></input></td>
	<td><input type="radio" name="beliefs2" value="7"
	<?php if (isset($beliefs2) && $beliefs2=="7") echo "checked";?>></input></td>
</tr>
<tr>
	<td class="td_column1"><li id="beliefs3">
	<span class="errorstar">*</span><span class="server_error"><?php echo $beliefs3_error;?></span> 
	I stay interested in my goals, even if they take a long time (months or years) to complete
	</li></td>
	<td><input type="radio" name="beliefs3" value="1"
	<?php if (isset($beliefs3) && $beliefs3=="1") echo "checked";?>></input></td>
	<td><input type="radio" name="beliefs3" value="2"
	<?php if (isset($beliefs3) && $beliefs3=="2") echo "checked";?>></input></td>
	<td><input type="radio" name="beliefs3" value="3"
	<?php if (isset($beliefs3) && $beliefs3=="3") echo "checked";?>></input></td>
	<td><input type="radio" name="beliefs3" value="4"
	<?php if (isset($beliefs3) && $beliefs3=="4") echo "checked";?>></input></td>
	<td><input type="radio" name="beliefs3" value="5"
	<?php if (isset($beliefs3) && $beliefs3=="5") echo "checked";?>></input></td>
	<td><input type="radio" name="beliefs3" value="6"
	<?php if (isset($beliefs3) && $beliefs3=="6") echo "checked";?>></input></td>
	<td><input type="radio" name="beliefs3" value="7"
	<?php if (isset($beliefs3) && $beliefs3=="7") echo "checked";?>></input></td>
</tr>
<tr>
	<td class="td_column1"><li id="beliefs4">
	<span class="errorstar">*</span><span class="server_error"><?php echo $beliefs4_error;?></span> 
	I am diligent, I never give up.</li></td>
	<td><input type="radio" name="beliefs4" value="1"
	<?php if (isset($beliefs4) && $beliefs4=="1") echo "checked";?>></input></td>
	<td><input type="radio" name="beliefs4" value="2"
	<?php if (isset($beliefs4) && $beliefs4=="2") echo "checked";?>></input></td>
	<td><input type="radio" name="beliefs4" value="3"
	<?php if (isset($beliefs4) && $beliefs4=="3") echo "checked";?>></input></td>
	<td><input type="radio" name="beliefs4" value="4"
	<?php if (isset($beliefs4) && $beliefs4=="4") echo "checked";?>></input></td>
	<td><input type="radio" name="beliefs4" value="5"
	<?php if (isset($beliefs4) && $beliefs4=="5") echo "checked";?>></input></td>
	<td><input type="radio" name="beliefs4" value="6"
	<?php if (isset($beliefs4) && $beliefs4=="6") echo "checked";?>></input></td>
	<td><input type="radio" name="beliefs4" value="7"
	<?php if (isset($beliefs4) && $beliefs4=="7") echo "checked";?>></input></td>
</tr>
<tr>
	<td class="td_column1"><li id="beliefs5">
	<span class="errorstar">*</span><span class="server_error"><?php echo $beliefs5_error;?></span> 
	When I take a class, I want to learn as much as possible</li></td>
	<td><input type="radio" name="beliefs5" value="1"
	<?php if (isset($beliefs5) && $beliefs5=="1") echo "checked";?>></input></td>
	<td><input type="radio" name="beliefs5" value="2"
	<?php if (isset($beliefs5) && $beliefs5=="2") echo "checked";?>></input></td>
	<td><input type="radio" name="beliefs5" value="3"
	<?php if (isset($beliefs5) && $beliefs5=="3") echo "checked";?>></input></td>
	<td><input type="radio" name="beliefs5" value="4"
	<?php if (isset($beliefs5) && $beliefs5=="4") echo "checked";?>></input></td>
	<td><input type="radio" name="beliefs5" value="5"
	<?php if (isset($beliefs5) && $beliefs5=="5") echo "checked";?>></input></td>
	<td><input type="radio" name="beliefs5" value="6"
	<?php if (isset($beliefs5) && $beliefs5=="6") echo "checked";?>></input></td>
	<td><input type="radio" name="beliefs5" value="7"
	<?php if (isset($beliefs5) && $beliefs5=="7") echo "checked";?>></input></td>
</tr>
<tr>
	<td class="td_column1"><li id="beliefs6">
	<span class="errorstar">*</span><span class="server_error"><?php echo $beliefs6_error;?></span> 
	I ask myself questions to make sure I know the material I have been studying.</li></td>
	<td><input type="radio" name="beliefs6" value="1"
	<?php if (isset($beliefs6) && $beliefs6=="1") echo "checked";?>></input></td>
	<td><input type="radio" name="beliefs6" value="2"
	<?php if (isset($beliefs6) && $beliefs6=="2") echo "checked";?>></input></td>
	<td><input type="radio" name="beliefs6" value="3"
	<?php if (isset($beliefs6) && $beliefs6=="3") echo "checked";?>></input></td>
	<td><input type="radio" name="beliefs6" value="4"
	<?php if (isset($beliefs6) && $beliefs6=="4") echo "checked";?>></input></td>
	<td><input type="radio" name="beliefs6" value="5"
	<?php if (isset($beliefs6) && $beliefs6=="5") echo "checked";?>></input></td>
	<td><input type="radio" name="beliefs6" value="6"
	<?php if (isset($beliefs6) && $beliefs6=="6") echo "checked";?>></input></td>
	<td><input type="radio" name="beliefs6" value="7"
	<?php if (isset($beliefs6) && $beliefs6=="7") echo "checked";?>></input></td>
</tr>
<tr>
	<td class="td_column1"><li id="beliefs7">
	<span class="errorstar">*</span><span class="server_error"><?php echo $beliefs7_error;?></span> 
	When work is hard I either give up or study only the easy parts. </li></td>
	<td><input type="radio" name="beliefs7" value="1"
	<?php if (isset($beliefs7) && $beliefs7=="1") echo "checked";?>></input></td>
	<td><input type="radio" name="beliefs7" value="2"
	<?php if (isset($beliefs7) && $beliefs7=="2") echo "checked";?>></input></td>
	<td><input type="radio" name="beliefs7" value="3"
	<?php if (isset($beliefs7) && $beliefs7=="3") echo "checked";?>></input></td>
	<td><input type="radio" name="beliefs7" value="4"
	<?php if (isset($beliefs7) && $beliefs7=="4") echo "checked";?>></input></td>
	<td><input type="radio" name="beliefs7" value="5"
	<?php if (isset($beliefs7) && $beliefs7=="5") echo "checked";?>></input></td>
	<td><input type="radio" name="beliefs7" value="6"
	<?php if (isset($beliefs7) && $beliefs7=="6") echo "checked";?>></input></td>
	<td><input type="radio" name="beliefs7" value="7"
	<?php if (isset($beliefs7) && $beliefs7=="7") echo "checked";?>></input></td>
</tr>
<tr>
	<td class="td_column1"><li id="beliefs8">
	<span class="errorstar">*</span><span class="server_error"><?php echo $beliefs8_error;?></span> 
	I work on practice exercises and answer end of 
	chapter questions even when I don't have to.</li></td>
	<td><input type="radio" name="beliefs8" value="1"
	<?php if (isset($beliefs8) && $beliefs8=="1") echo "checked";?>></input></td>
	<td><input type="radio" name="beliefs8" value="2"
	<?php if (isset($beliefs8) && $beliefs8=="2") echo "checked";?>></input></td>
	<td><input type="radio" name="beliefs8" value="3"
	<?php if (isset($beliefs8) && $beliefs8=="3") echo "checked";?>></input></td>
	<td><input type="radio" name="beliefs8" value="4"
	<?php if (isset($beliefs8) && $beliefs8=="4") echo "checked";?>></input></td>
	<td><input type="radio" name="beliefs8" value="5"
	<?php if (isset($beliefs8) && $beliefs8=="5") echo "checked";?>></input></td>
	<td><input type="radio" name="beliefs8" value="6"
	<?php if (isset($beliefs8) && $beliefs8=="6") echo "checked";?>></input></td>
	<td><input type="radio" name="beliefs8" value="7"
	<?php if (isset($beliefs8) && $beliefs8=="7") echo "checked";?>></input></td>
</tr>
<tr>
	<td class="td_column1"><li id="beliefs9">
	<span class="errorstar">*</span><span class="server_error"><?php echo $beliefs9_error;?></span> 
	Even when study materials are dull and uninteresting, I keep working until I finish.
	</li></td>
	<td><input type="radio" name="beliefs9" value="1"
	<?php if (isset($beliefs9) && $beliefs9=="1") echo "checked";?>></input></td>
	<td><input type="radio" name="beliefs9" value="2"
	<?php if (isset($beliefs9) && $beliefs9=="2") echo "checked";?>></input></td>
	<td><input type="radio" name="beliefs9" value="3"
	<?php if (isset($beliefs9) && $beliefs9=="3") echo "checked";?>></input></td>
	<td><input type="radio" name="beliefs9" value="4"
	<?php if (isset($beliefs9) && $beliefs9=="4") echo "checked";?>></input></td>
	<td><input type="radio" name="beliefs9" value="5"
	<?php if (isset($beliefs9) && $beliefs9=="5") echo "checked";?>></input></td>
	<td><input type="radio" name="beliefs9" value="6"
	<?php if (isset($beliefs9) && $beliefs9=="6") echo "checked";?>></input></td>
	<td><input type="radio" name="beliefs9" value="7"
	<?php if (isset($beliefs9) && $beliefs9=="7") echo "checked";?>></input></td>
</tr>
<tr>
	<td class="td_column1"><li id="beliefs10">
	<span class="errorstar">*</span><span class="server_error"><?php echo $beliefs10_error;?></span> 
	Before I begin studying I think about the things I will need to do to learn.</li></td>
	<td><input type="radio" name="beliefs10" value="1"
	<?php if (isset($beliefs10) && $beliefs10=="1") echo "checked";?>></input></td>
	<td><input type="radio" name="beliefs10" value="2"
	<?php if (isset($beliefs10) && $beliefs10=="2") echo "checked";?>></input></td>
	<td><input type="radio" name="beliefs10" value="3"
	<?php if (isset($beliefs10) && $beliefs10=="3") echo "checked";?>></input></td>
	<td><input type="radio" name="beliefs10" value="4"
	<?php if (isset($beliefs10) && $beliefs10=="4") echo "checked";?>></input></td>
	<td><input type="radio" name="beliefs10" value="5"
	<?php if (isset($beliefs10) && $beliefs10=="5") echo "checked";?>></input></td>
	<td><input type="radio" name="beliefs10" value="6"
	<?php if (isset($beliefs10) && $beliefs10=="6") echo "checked";?>></input></td>
	<td><input type="radio" name="beliefs10" value="7"
	<?php if (isset($beliefs10) && $beliefs10=="7") echo "checked";?>></input></td>
</tr>
<tr>
	<td class="td_column1"><li id="beliefs11">
	<span class="errorstar">*</span><span class="server_error"><?php echo $beliefs11_error;?></span> 
	I often find that I have been reading for class but don't know what it is all about.
	</li></td>
	<td><input type="radio" name="beliefs11" value="1"
	<?php if (isset($beliefs11) && $beliefs11=="1") echo "checked";?>></input></td>
	<td><input type="radio" name="beliefs11" value="2"
	<?php if (isset($beliefs11) && $beliefs11=="2") echo "checked";?>></input></td>
	<td><input type="radio" name="beliefs11" value="3"
	<?php if (isset($beliefs11) && $beliefs11=="3") echo "checked";?>></input></td>
	<td><input type="radio" name="beliefs11" value="4"
	<?php if (isset($beliefs11) && $beliefs11=="4") echo "checked";?>></input></td>
	<td><input type="radio" name="beliefs11" value="5"
	<?php if (isset($beliefs11) && $beliefs11=="5") echo "checked";?>></input></td>
	<td><input type="radio" name="beliefs11" value="6"
	<?php if (isset($beliefs11) && $beliefs11=="6") echo "checked";?>></input></td>
	<td><input type="radio" name="beliefs11" value="7"
	<?php if (isset($beliefs11) && $beliefs11=="7") echo "checked";?>></input></td>
</tr>
<tr>
	<td class="td_column1"><li id="beliefs12">
	<span class="errorstar">*</span><span class="server_error"><?php echo $beliefs12_error;?></span> 
	I find that when the teacher is talking I 
	think of other things and don't really listen to what is being said.
	</li></td>
	<td><input type="radio" name="beliefs12" value="1"
	<?php if (isset($beliefs12) && $beliefs12=="1") echo "checked";?>></input></td>
	<td><input type="radio" name="beliefs12" value="2"
	<?php if (isset($beliefs12) && $beliefs12=="2") echo "checked";?>></input></td>
	<td><input type="radio" name="beliefs12" value="3"
	<?php if (isset($beliefs12) && $beliefs12=="3") echo "checked";?>></input></td>
	<td><input type="radio" name="beliefs12" value="4"
	<?php if (isset($beliefs12) && $beliefs12=="4") echo "checked";?>></input></td>
	<td><input type="radio" name="beliefs12" value="5"
	<?php if (isset($beliefs12) && $beliefs12=="5") echo "checked";?>></input></td>
	<td><input type="radio" name="beliefs12" value="6"
	<?php if (isset($beliefs12) && $beliefs12=="6") echo "checked";?>></input></td>
	<td><input type="radio" name="beliefs12" value="7"
	<?php if (isset($beliefs12) && $beliefs12=="7") echo "checked";?>></input></td>
</tr>
<tr>
	<td class="td_column1"><li id="beliefs13">
	<span class="errorstar">*</span><span class="server_error"><?php echo $beliefs13_error;?></span> 
	When I'm reading I stop once in a while and go over what I have read.</li></td>
	<td><input type="radio" name="beliefs13" value="1"
	<?php if (isset($beliefs13) && $beliefs13=="1") echo "checked";?>></input></td>
	<td><input type="radio" name="beliefs13" value="2"
	<?php if (isset($beliefs13) && $beliefs13=="2") echo "checked";?>></input></td>
	<td><input type="radio" name="beliefs13" value="3"
	<?php if (isset($beliefs13) && $beliefs13=="3") echo "checked";?>></input></td>
	<td><input type="radio" name="beliefs13" value="4"
	<?php if (isset($beliefs13) && $beliefs13=="4") echo "checked";?>></input></td>
	<td><input type="radio" name="beliefs13" value="5"
	<?php if (isset($beliefs13) && $beliefs13=="5") echo "checked";?>></input></td>
	<td><input type="radio" name="beliefs13" value="6"
	<?php if (isset($beliefs13) && $beliefs13=="6") echo "checked";?>></input></td>
	<td><input type="radio" name="beliefs13" value="7"
	<?php if (isset($beliefs13) && $beliefs13=="7") echo "checked";?>></input></td>
</tr>
<tr>
	<td class="td_column1"><li id="beliefs14">
	<span class="errorstar">*</span><span class="server_error"><?php echo $beliefs14_error;?></span> 
	I work hard to get a good grade even when I don't like a class.</li></td>
	<td><input type="radio" name="beliefs14" value="1"
	<?php if (isset($beliefs14) && $beliefs14=="1") echo "checked";?>></input></td>
	<td><input type="radio" name="beliefs14" value="2"
	<?php if (isset($beliefs14) && $beliefs14=="2") echo "checked";?>></input></td>
	<td><input type="radio" name="beliefs14" value="3"
	<?php if (isset($beliefs14) && $beliefs14=="3") echo "checked";?>></input></td>
	<td><input type="radio" name="beliefs14" value="4"
	<?php if (isset($beliefs14) && $beliefs14=="4") echo "checked";?>></input></td>
	<td><input type="radio" name="beliefs14" value="5"
	<?php if (isset($beliefs14) && $beliefs14=="5") echo "checked";?>></input></td>
	<td><input type="radio" name="beliefs14" value="6"
	<?php if (isset($beliefs14) && $beliefs14=="6") echo "checked";?>></input></td>
	<td><input type="radio" name="beliefs14" value="7"
	<?php if (isset($beliefs14) && $beliefs14=="7") echo "checked";?>></input></td>
</tr>
<tr>
	<td class="td_column1"></td>
	<td>1 <br/>Not at all true of me</td>
	<td>2 <br/>Not true of me</td>
	<td>3 <br/>Mostly not true of me</td>
	<td>4 <br/>Neither</td>
	<td>5 <br/>Mostly true of me</td>
	<td>6 <br/>True of me</td>
	<td>7 <br/>Very true of me</td>
</tr>
</table>
</ul>
<br/>
<h2>Part 3</h2>
<p>Please enter your email. You must use the same email to sign up for your PeerStudio account. This
email will only be used to contact you about your paper and match your responses to your essay in
the PeerStudio system; we will never use your email for any other purpose. </p>
<div id="email_address">
<span class="errorstar">*</span>
<span class="server_error"><?php echo $email_address_error;?></span>
<b>Email address:</b>&nbsp;
<input type="text" name="email_address" size="40" maxlength="40" value="<?php echo $email_address ?>">
<span class="errornote">Must be a valid email address.</span>
</div>
<br/>
<p><b style="font-size: 110%">Honor Code:</b></p>
<p>I agree to participate respectfully in this peer-assessment project,
giving thoughtful and useful feedback to my peers in exchange for
getting similar feedback on my essays. I agree to respect the
intellectual property of others, and will not use any material in this
project other than my own. I am aware that both initial and revised
essays are the sole property of their author. I agree to be courteous in
all of my interactions in this project. I will not reveal any personal information about 
myself or others in the materials I submit for review. </p>
<p>Click below to indicate your agreement and consent to all information in this form.</p>
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
