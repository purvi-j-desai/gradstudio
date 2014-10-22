<html>
<head></head>
<body>
Email was sent successfully!
</body>
</html>

<?php
$email_address = $_SESSION['email_address'];
$next_condition = $_SESSION['next_condition'];
echo $email_address;
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
$mail->Body = "Welcome to the Grad Studio Project!<br/>
			you have been placed in the $next_condition style group. Oh I wasn't supposed
			to tell you that. Oh well too bad. click <a href='http://peerstudio.org'>here</a>
			to go to peer studio!";
$mail->AltBody = "Welcome to the Grad Studio Project! blah blah blah\n
			you have been placed in the $next_condition style group. Whoops I wasn't supposed
			to tell you that. oh well too bad. click the link below to go to peer studio\n
			http://peerstudio.org ok bye.";

if (!$mail->send()) {
	echo "did not send email";
	echo 'mailer error: ' . $mail->ErrorInfo;
} else {
	echo "sent email";
}

//header('Location: /gradstudio/postsurvey.html');
session_destroy();
?>

