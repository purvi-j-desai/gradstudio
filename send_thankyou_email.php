<?php
function send_thankyou_email($email_address) {

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

	$mail->Subject = "Thank you for participating in the Grad Studio Project!";
	
	
	$text = "<p>Thanks for being in the GradStudio Project! </p>
			<p>Good luck with school and stuff</p>";
	
	$mail->Body = $text;
	$mail->AltBody = strip_tags($text);

	if (!$mail->send()) {
		echo 'Problem sending email: ' . $mail->ErrorInfo;
	}
}

?>