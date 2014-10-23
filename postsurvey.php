<?php
include 'generate_email.php';
session_start();
$email_address = $_SESSION['email_address'];
$next_condition = $_SESSION['next_condition'];
send_email($email_address, $next_condition);

//header('Location: /gradstudio/postsurvey.html');
session_destroy();
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
	<h2 class="main-title">Survey Complete</h2>
</header>

<p>Thanks for completing the survey! You are now registered for the GradStudio Project.</p>

<p><b>Next Steps:</b></p>
<p>(You can return to these instructions at any time by visiting our <a href="http://d.ucsd.edu/gradstudio">main page</a> and clicking
the <a href="instructions.html">"Instructions"</a> button on the top.)
<ol style="margin-left: 2%;" >
  <li>Complete! <span id="completed_step">Fill out the survey by clicking "get started" on the front page of <u>The GradStudio Project</u></span></li>
  <li><b>Click "Submit My Essay" at the bottom of this page</b> to be taken to your assignment in PeerStudio.
  When you get there, click "Create/Edit Your Draft". The first time you do this you will 
  need to create a PeerStudio account:
  <ol style="list-style:lower-alpha outside none;">
      <li> Click <b>"I have a password"</b> underneath the "1-click sign-in" buttons that appear.
      </li>
  	  <li> Click <b>"Sign Up"</b> at the bottom of the form that appears.
  	  </li>
  	  <li> Fill in the form to create your PeerStudio account. Remember your password, as you
  	  will need it to log back in to PeerStudio in the future.
  	  </li>
  </ol>
  </li>
  <li>Once you complete this, you will be logged in and taken to the assignment page. There, 
  you will be able to upload your essay for peer review.</li>
  <li>You will then be prompted to review 2 other graduate application essays. Instructions for reviewing will be provided. Be a thoughtful and helpful reviewer!</li>
  <li>Once you have completed the required peer review and others have reviewed your essay, you will have the option to view the feedback on your essay.</li>
  <li>To complete the project, you will submit your essay with revisions to get another round of useful feedback! </li>
  <li>The deadline for the entire project, including both submissions, is <b>December 1st</b>! Be sure to complete all your peer reviews by this date to get the most benefit from the project.</li>
</ol>

<p>Got lost? Need help? Check out the <a href="/faq.html">FAQs</a>. If your question isn’t answered there, email 
<a href="mailto:GradStudioProject@gmail.com">GradStudioProject@gmail.com</a>.

<div style="text-align: center">
<a href="http://peerstudio.org" class="button button-alt2" style="font-size:120% !important;">Submit My Essay</a>
</div>
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
