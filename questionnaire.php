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

<style>
.errornote, #errormsg { 
	color: red;
	display: none;
}

.server_error {
	color: red;
}
</style>

</head>
<body>

<!-- server side validation -->
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST["age"])) {
		$age_error = "*";
	} else if (!is_numeric($_POST["age"])) {
		$age_error = "Must be a number.";
	}

	if (empty($_POST["gender"])) {
		$gender_error = "*";
	}
	
	if (empty($_POST["enrolled_in_college"])) {
		$enrolled_in_college_error = "*";
	}
	
	if (!empty($_POST["gpa"]) && !is_numeric($_POST["gpa"])) {
		$gpa_error = "Must be a number.";
	}
	
	if (empty($_POST["english_speaker"])) {
		$english_speaker_error = "*";
	}
	
	if (empty($_POST["area_of_study"]) || ($_POST["area_of_study"] == "other")) {
		$area_of_study_error = "*";
	} 
	
	if (empty($_POST["beliefs1"])) {
		$beliefs1_error = "*";
	}
	
	if (empty($_POST["beliefs2"])) {
		$beliefs2_error = "*";
	}
	
	if (empty($_POST["beliefs3"])) {
		$beliefs3_error = "*";
	}
	
	if (empty($_POST["beliefs4"])) {
		$beliefs4_error = "*";
	}
	
	if (empty($_POST["beliefs5"])) {
		$beliefs5_error = "*";
	}
	
	if (empty($_POST["beliefs6"])) {
		$beliefs6_error = "*";
	}
	
	if (empty($_POST["beliefs7"])) {
		$beliefs7_error = "*";
	}
	
	if (empty($_POST["beliefs8"])) {
		$beliefs8_error = "*";
	}
	
	if (empty($_POST["beliefs9"])) {
		$beliefs9_error = "*";
	}
	
	if (empty($_POST["beliefs10"])) {
		$beliefs10_error = "*";
	}
	
	if (empty($_POST["beliefs11"])) {
		$beliefs11_error = "*";
	}
	
	if (empty($_POST["beliefs12"])) {
		$beliefs12_error = "*";
	}
	
	if (empty($_POST["beliefs13"])) {
		$beliefs13_error = "*";
	}
	
	if (empty($_POST["beliefs14"])) {
		$beliefs14_error = "*";
	}

}
?>

<!-- Header -->
<div id="header-wrapper">

	<div id="header" class="container">
		<div id="logo"><h1><a href="#">GradStudio</a></h1></div>
                <nav id="nav">
                    <ul>
                        <li class="current_page_item"><a href="index.html">Homepage</a></li>
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
<div id="errormsg">Please answer all required questions.</div>
<h2>Part 1</h2>
<!--<form action="/dbconnect.php" method="post" onsubmit="return validateForm()">-->
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="return validateForm()">
<ol>
	<li id="age">
		<span class="errorstar">*</span>
		<b>Age:</b>&nbsp;<input type="text" name="age" size="4" maxlength="3" >
		<span class="errornote">Must be a number.</span>
		<span class="server_error"><?php echo $age_error;?></span>
	</li>
	<li id="gender">
		<span class="errorstar">*</span>
		<b>Gender: </b><input type="radio" name="gender" value="male">Male</input>&nbsp;&nbsp;&nbsp;
		<input type="radio" name="gender" value="female">Female</input>&nbsp;&nbsp;&nbsp;
		<input type="radio" name="gender" value="other">Other</input>
		<span class="server_error"><?php echo $gender_error;?></span>
	</li>
	<li id="enrolled_in_college">
		<span class="errorstar">*</span>
		<b>I am enrolled in College: </b><input type="radio" name="enrolled_in_college" value="yes">Yes</input>&nbsp;&nbsp;&nbsp;
		<input type="radio" name="enrolled_in_college" value="no">No</input>&nbsp;<span class="server_error"><?php echo $enrolled_in_college_error;?></span><br/>
		<span id="gpa">If Yes, enter your GPA (optional): &nbsp; <input type="text" name="gpa" size="4" maxlength="4" ></input>
		<span class="errornote">Must be a number.</span></span><span class="server_error"><?php echo $gpa_error;?></span>
		
	</li>
	<li id="english_speaker">
		<span class="errorstar">*</span>
		<b>I am a native or fluent English language speaker: </b><input type="radio" name="english_speaker" value="yes">Yes</input>&nbsp;&nbsp;&nbsp;
		<input type="radio" name="english_speaker" value="no">No</input>&nbsp;&nbsp;&nbsp;
		<span class="server_error"><?php echo $english_speaker_error;?></span>
	</li>
	<li id="area_of_study">
		<span class="errorstar">*</span>
		<b>Graduate application area:</b><span class="server_error"><?php echo $area_of_study_error;?></span><br/>
		<input type="radio" name="area_of_study" value="arts_humanities">Arts/Humanities</input><br/>
		<input type="radio" name="area_of_study" value="science">Science</input><br/>
		<input type="radio" name="area_of_study" value="social_science">Social Science</input><br/>
		<input type="radio" name="area_of_study" value="law">Law</input><br/>
		<input type="radio" name="area_of_study" value="medicine">Medicine</input><br/>
		<input type="radio" name="area_of_study" value="other">Other:</input> 
		<input type="text" name="area_of_study_other" size="30" maxlength="30"></input><br/>
	</li>
	<li id="ethnicity">
		<b>Ethnicity</b> (optional):<br/>
		<input type="radio" name="ethnicity" value="african_american">African American</input><br/>
		<input type="radio" name="ethnicity" value="asian">Asian</input><br/>
		<input type="radio" name="ethnicity" value="caucasian">Caucasian</input><br/>
		<input type="radio" name="ethnicity" value="latino">Latino</input><br/>
		<input type="radio" name="ethnicity" value="other">Other: </input>
		<input type="text" name="ethnicity_other" size="30" maxlength="30"></input><br/>
	</li>
</ol>	
<br/>
<h2>Part 2</h2><br/>
<p>The following is a short survey about your beliefs and opinions. It
is important that you know there are no right or wrong answers to these
questions. Answer these questions honestly and thoughtfully. </p>
<ol>
<table>
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
<tr>
	<td class="td_column1"><li id="beliefs1">
	<span class="errorstar">*</span> I finish what I begin
	<span class="server_error"><?php echo $beliefs1_error;?></span></li></td>
	<td><input type="radio" name="beliefs1" value="1"></input></td>
	<td><input type="radio" name="beliefs1" value="2"></input></td>
	<td><input type="radio" name="beliefs1" value="3"></input></td>
	<td><input type="radio" name="beliefs1" value="4"></input></td>
	<td><input type="radio" name="beliefs1" value="5"></input></td>
	<td><input type="radio" name="beliefs1" value="6"></input></td>
	<td><input type="radio" name="beliefs1" value="7"></input></td>
</tr>
<tr>
	<td class="td_column1"><li id="beliefs2">
	<span class="errorstar">*</span> I work very hard. I keep working when others stop to take a break
	<span class="server_error"><?php echo $beliefs2_error;?></span></li></td>
	<td><input type="radio" name="beliefs2" value="1"></input></td>
	<td><input type="radio" name="beliefs2" value="2"></input></td>
	<td><input type="radio" name="beliefs2" value="3"></input></td>
	<td><input type="radio" name="beliefs2" value="4"></input></td>
	<td><input type="radio" name="beliefs2" value="5"></input></td>
	<td><input type="radio" name="beliefs2" value="6"></input></td>
	<td><input type="radio" name="beliefs2" value="7"></input></td>
</tr>
<tr>
	<td class="td_column1"><li id="beliefs3">
	<span class="errorstar">*</span> I stay interested in my goals, even if they take a
	 long time (months or years) to complete
	 <span class="server_error"><?php echo $beliefs3_error;?></span></li></td>
	<td><input type="radio" name="beliefs3" value="1"></input></td>
	<td><input type="radio" name="beliefs3" value="2"></input></td>
	<td><input type="radio" name="beliefs3" value="3"></input></td>
	<td><input type="radio" name="beliefs3" value="4"></input></td>
	<td><input type="radio" name="beliefs3" value="5"></input></td>
	<td><input type="radio" name="beliefs3" value="6"></input></td>
	<td><input type="radio" name="beliefs3" value="7"></input></td>
</tr>
<tr>
	<td class="td_column1"><li id="beliefs4">
	<span class="errorstar">*</span> I am diligent, I never give up.
	<span class="server_error"><?php echo $beliefs4_error;?></span></li></td>
	<td><input type="radio" name="beliefs4" value="1"></input></td>
	<td><input type="radio" name="beliefs4" value="2"></input></td>
	<td><input type="radio" name="beliefs4" value="3"></input></td>
	<td><input type="radio" name="beliefs4" value="4"></input></td>
	<td><input type="radio" name="beliefs4" value="5"></input></td>
	<td><input type="radio" name="beliefs4" value="6"></input></td>
	<td><input type="radio" name="beliefs4" value="7"></input></td>
</tr>
<tr>
	<td class="td_column1"><li id="beliefs5">
	<span class="errorstar">*</span> When I take a class, I want to learn as much as possible
	<span class="server_error"><?php echo $beliefs5_error;?></span></li></td>
	<td><input type="radio" name="beliefs5" value="1"></input></td>
	<td><input type="radio" name="beliefs5" value="2"></input></td>
	<td><input type="radio" name="beliefs5" value="3"></input></td>
	<td><input type="radio" name="beliefs5" value="4"></input></td>
	<td><input type="radio" name="beliefs5" value="5"></input></td>
	<td><input type="radio" name="beliefs5" value="6"></input></td>
	<td><input type="radio" name="beliefs5" value="7"></input></td>
</tr>
<tr>
	<td class="td_column1"><li id="beliefs6">
	<span class="errorstar">*</span> I ask myself questions to make sure I know the material I have been studying.
	<span class="server_error"><?php echo $beliefs6_error;?></span></li></td>
	<td><input type="radio" name="beliefs6" value="1"></input></td>
	<td><input type="radio" name="beliefs6" value="2"></input></td>
	<td><input type="radio" name="beliefs6" value="3"></input></td>
	<td><input type="radio" name="beliefs6" value="4"></input></td>
	<td><input type="radio" name="beliefs6" value="5"></input></td>
	<td><input type="radio" name="beliefs6" value="6"></input></td>
	<td><input type="radio" name="beliefs6" value="7"></input></td>
</tr>
<tr>
	<td class="td_column1"><li id="beliefs7">
	<span class="errorstar">*</span> When work is hard I either give up or study only the easy parts. 
	<span class="server_error"><?php echo $beliefs7_error;?></span></li></td>
	<td><input type="radio" name="beliefs7" value="1"></input></td>
	<td><input type="radio" name="beliefs7" value="2"></input></td>
	<td><input type="radio" name="beliefs7" value="3"></input></td>
	<td><input type="radio" name="beliefs7" value="4"></input></td>
	<td><input type="radio" name="beliefs7" value="5"></input></td>
	<td><input type="radio" name="beliefs7" value="6"></input></td>
	<td><input type="radio" name="beliefs7" value="7"></input></td>
</tr>
<tr>
	<td class="td_column1"><li id="beliefs8">
	<span class="errorstar">*</span> I work on practice exercises and answer end of 
	chapter questions even when I don't have to.
	<span class="server_error"><?php echo $beliefs8_error;?></span> </li></td>
	<td><input type="radio" name="beliefs8" value="1"></input></td>
	<td><input type="radio" name="beliefs8" value="2"></input></td>
	<td><input type="radio" name="beliefs8" value="3"></input></td>
	<td><input type="radio" name="beliefs8" value="4"></input></td>
	<td><input type="radio" name="beliefs8" value="5"></input></td>
	<td><input type="radio" name="beliefs8" value="6"></input></td>
	<td><input type="radio" name="beliefs8" value="7"></input></td>
</tr>
<tr>
	<td class="td_column1"><li id="beliefs9">
	<span class="errorstar">*</span> Even when study materials are dull and uninteresting, I keep working until I finish.
	<span class="server_error"><?php echo $beliefs9_error;?></span> </li></td>
	<td><input type="radio" name="beliefs9" value="1"></input></td>
	<td><input type="radio" name="beliefs9" value="2"></input></td>
	<td><input type="radio" name="beliefs9" value="3"></input></td>
	<td><input type="radio" name="beliefs9" value="4"></input></td>
	<td><input type="radio" name="beliefs9" value="5"></input></td>
	<td><input type="radio" name="beliefs9" value="6"></input></td>
	<td><input type="radio" name="beliefs9" value="7"></input></td>
</tr>
<tr>
	<td class="td_column1"><li id="beliefs10">
	<span class="errorstar">*</span> Before I begin studying I think about the things I will need to do to learn.
	<span class="server_error"><?php echo $beliefs10_error;?></span> </li></td>
	<td><input type="radio" name="beliefs10" value="1"></input></td>
	<td><input type="radio" name="beliefs10" value="2"></input></td>
	<td><input type="radio" name="beliefs10" value="3"></input></td>
	<td><input type="radio" name="beliefs10" value="4"></input></td>
	<td><input type="radio" name="beliefs10" value="5"></input></td>
	<td><input type="radio" name="beliefs10" value="6"></input></td>
	<td><input type="radio" name="beliefs10" value="7"></input></td>
</tr>
<tr>
	<td class="td_column1"><li id="beliefs11">
	<span class="errorstar">*</span> I often find that I have been reading for class but don't know what it is all about.
	<span class="server_error"><?php echo $beliefs11_error;?></span> </li></td>
	<td><input type="radio" name="beliefs11" value="1"></input></td>
	<td><input type="radio" name="beliefs11" value="2"></input></td>
	<td><input type="radio" name="beliefs11" value="3"></input></td>
	<td><input type="radio" name="beliefs11" value="4"></input></td>
	<td><input type="radio" name="beliefs11" value="5"></input></td>
	<td><input type="radio" name="beliefs11" value="6"></input></td>
	<td><input type="radio" name="beliefs11" value="7"></input></td>
</tr>
<tr>
	<td class="td_column1"><li id="beliefs12">
	<span class="errorstar">*</span> I find that when the teacher is talking I 
	think of other things and don't really listen to what is being said.
	<span class="server_error"><?php echo $beliefs12_error;?></span> </li></td>
	<td><input type="radio" name="beliefs12" value="1"></input></td>
	<td><input type="radio" name="beliefs12" value="2"></input></td>
	<td><input type="radio" name="beliefs12" value="3"></input></td>
	<td><input type="radio" name="beliefs12" value="4"></input></td>
	<td><input type="radio" name="beliefs12" value="5"></input></td>
	<td><input type="radio" name="beliefs12" value="6"></input></td>
	<td><input type="radio" name="beliefs12" value="7"></input></td>
</tr>
<tr>
	<td class="td_column1"><li id="beliefs13">
	<span class="errorstar">*</span> When I'm reading I stop once in a while and go over what I have read.
	<span class="server_error"><?php echo $beliefs13_error;?></span> </li></td>
	<td><input type="radio" name="beliefs13" value="1"></input></td>
	<td><input type="radio" name="beliefs13" value="2"></input></td>
	<td><input type="radio" name="beliefs13" value="3"></input></td>
	<td><input type="radio" name="beliefs13" value="4"></input></td>
	<td><input type="radio" name="beliefs13" value="5"></input></td>
	<td><input type="radio" name="beliefs13" value="6"></input></td>
	<td><input type="radio" name="beliefs13" value="7"></input></td>
</tr>
<tr>
	<td class="td_column1"><li id="beliefs14">
	<span class="errorstar">*</span> I work hard to get a good grade even when I don't like a class.
	<span class="server_error"><?php echo $beliefs14_error;?></span>  </li></td>
	<td><input type="radio" name="beliefs14" value="1"></input></td>
	<td><input type="radio" name="beliefs14" value="2"></input></td>
	<td><input type="radio" name="beliefs14" value="3"></input></td>
	<td><input type="radio" name="beliefs14" value="4"></input></td>
	<td><input type="radio" name="beliefs14" value="5"></input></td>
	<td><input type="radio" name="beliefs14" value="6"></input></td>
	<td><input type="radio" name="beliefs14" value="7"></input></td>
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
<button class="button button-alt2" type="submit">Submit and Continue</button>
</form>


</article>
</div>
</div>
</div>
</div>


<!-- Copyright -->
<div id="copyright" class="container">
	Design: <a href="http://templated.co">TEMPLATED</a>
</div>

</body>
</html>