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
<noscript>
	<link rel="stylesheet" href="css/skel-noscript.css" />
	<link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="css/style-desktop.css" />
</noscript>

<style type="text/css">
html {
	height: 100%;
}

.errornote, #errormsg, .errorstar { 
	color: red;
	display: none;
}

.server_error {
	color: red;
}
</style>

<script type="text/javascript">
function validateForm() {
	
	var valid = true;
	var email_address = $("input:text[name=email_address]").val();
	// Remove previous notes
	$(".errorstar").css("display", "none");
	$(".errornote").css("display", "none");
	$("#errormsg").css("display", "none");
	
	if (!email_address) {
		valid = false;
		$("#email_address").find(".errorstar").css("display", "inline");
	} else {
		var atpos = email_address.indexOf("@");
		var dotpos = email_address.lastIndexOf(".");
		if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= email_address.length) {
			$("#email_address").find(".errorstar").css("display", "inline");
			$("#email_address").find(".errornote").css("display", "inline");
			valid = false;
		}
	} 
	if (!valid) {
		$("#errormsg").css("display", "block");
		$('html,body').scrollTop(0);
	}
	return valid;
}
</script>

</head>
<body>
<div id="body_wrapper">
<!-- Header -->
    <div id="header-wrapper-small">

	<div id="header" class="container">
		<div id="logo"><h1><a href="#">GradStudio</a></h1></div>
                <nav id="nav">
                    <ul>
                        <li><a href="index.html">Homepage</a></li>
                        <li><a href="instructions.html">Instructions</a></li>
			<li><a href="faq.html">FAQ</a></li>
			<li><a href="aboutus.html">About Us</a></li>
                    </ul>
                </nav>
		
	</div>
</div>

<div id="page">
<div class="container">
<div class="row">

<div id="content" class="12u skel-cell-important">
<article>
<header>
	<h2 class="main-title">Remove Email</h2>
</header>
<p style="color: red;">
<?php
include 'optout.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email_address = $_POST["email_address"];
    // Validate form data
	$error = false;
	if (empty($email_address)) {
		$error = true;
		$email_address_error = "*";
	} else if (!filter_var($email_address, FILTER_VALIDATE_EMAIL)) {
		$error = true;	
		$email_address_error = "Must be a valid email address.";
	}
	
	if (!$error) {
		$optout = optout($email_address);
		if ($optout) {
		?>
			<span style="color: green;">You have successfully opted out of Gradstudio. You will no longer 
			receive emails from us.</span>
		<?php	
		} else {
		?>
			<span>Your email is not in our database. Please enter
			the same email address you used when you first signed up.</span>
		<?php
		}
	}
}
?>
</p>
<?php 
if (!isset($error) || (!$optout)) {
?>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="return validateForm()">
<p>Please enter your email address here to stop receiving emails from us. By doing this, 
you are letting us know that you no longer wish to take part in the GradStudio Project. </p>
<div id="email_address">
<span class="errorstar">*</span>
<span class="server_error"><?php echo $email_address_error;?></span>
<b>Email address:</b>&nbsp;
<input type="text" name="email_address" size="40" maxlength="40" value="<?php echo $email_address ?>">
<span class="errornote">Must be a valid email address.</span>
</div>
<button class="button button-alt2" type="submit">Submit</button>
</form>
<?php } ?>

</article>
</div>
</div>
</div>
</div>
<div id="footer_push"></div>
</div>
<!-- Copyright -->
<div id="copyright" class="container">
	Design: <a href="http://templated.co">TEMPLATED</a>
	Images: © Catherine M. Hicks
</div>

</body>
</html>