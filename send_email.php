<?php
function send_email($email_address, $next_condition, $show_confirm=false) {

	// Send email to user
	require 'phpmailer/PHPMailerAutoload.php';

	$mail = new PHPMailer;
	//$mail->SMTPDebug = 3;
	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'GradStudioProject@gmail.com';
	$mail->Password = 'feedbackisgreat';
	$mail->SMTPSecure = 'tls';
	$mail->Port = 587;
	$mail->From = 'GradStudioProject@gmail.com';
	$mail->FromName = "Grad Studio";
	$mail->addAddress($email_address);
	$mail->WordWrap = 50;
	$mail->isHTML(true);

	$mail->Subject = "Welcome to the Grad Studio Project!";
	
	if ($next_condition == "review") {
		$link = "https://www.peerstudio.org/assignments/44";
	} else { // condition = outline
		$link = "https://www.peerstudio.org/assignments/39";
	}
	
	$text = "<p>Welcome to the GradStudio Project! </p>
			<p>You're on your way to getting  helpful feedback on your application essays!</p>
			<p>There are two stages in the project. The first stage gives you a 'quick check' 
			on your essay, and the second stage of feedback after you've already made revisions 
			will give you in-depth comments. Be sure to complete both rounds in order to get 
			the most help from the project!</p>
			<p>You will be using Peerstudio to submit and review essays.</p>
			<p><b>Here is your unique link to sign up on Peerstudio: </b><br/>
			<a href=$link>$link</a></p>
			<p>You will need to follow this link to upload your essay, get feedback, give 
			feedback to other participants, and re-submit your essay with revisions. </p>
			<p>When you get there, click <b>'Create/Edit Your Draft'</b>. The first time you do 
			this you will need to create a PeerStudio account:</p>
			<ol><li>Click <b>'I have a password'</b> underneath the '1-click sign-in' buttons 
			that appear.</li>
			<li>Click 'Sign Up' at the bottom of the form that appears.</li>
			<li>Fill in the form to create your Peerstudio account. Remember your password, 
			as you will need it to log back in to Peerstudio in the future.</li></ol>
			<p>Once you complete this, you will be logged in and taken to the assignment 
			page. There, you will be able to upload your essay for peer review.</p>
			<p>Because the GradStudio Project is not an online course, your assignment will 
			not be visible on the “Course” homepage for Peerstudio if you login to Peerstudio 
			directly. It is important that you <b>follow your unique assignment link, 
			above.</b> </p>
			<p>Happy Writing! </p>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;The GradStudio Team</p>
			<p>PS. If you ever lose this link, you can ask for it again on the 
			<a href='http://d.ucsd.edu/gradstudio/instructions.html'>Instructions 
			page</a>.</p>";
	
	$mail->Body = $text;
	$mail->AltBody = strip_tags($text);

	if (!$mail->send()) {
		echo 'Problem sending email: ' . $mail->ErrorInfo;
	} else if ($show_confirm) {
		echo "Email successfully sent!";
	}
}

?>