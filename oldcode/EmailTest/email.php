<?php

require("PHPMailerAutoload.php");

$mail = new PHPMailer();

$mail->IsSMTP();  // telling the class to use SMTP
$mail->Host     = "smtp.gmail.com"; // SMTP server
$mail->SMTPAuth   = true;
$mail->Port       = 587;
$mail->SMTPSecure = 'tls';
$mail->Username   = "infsphotobooth@gmail.com";
$mail->Password   = "infsphotobooth123";

$mail->From     = "infsphotobooth@gmail.com";
$mail->AddAddress("infsphotobooth@gmail.com");

$mail->Subject  = "First PHPMailer Message";
$mail->Body     = "Hi! \n\n This is my first e-mail sent through PHPMailer.";
$mail->WordWrap = 50;
$mail->SMTPDebug = 2;

if(!$mail->Send()) {
    echo 'Message was not sent.';
    echo 'Mailer error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent.';
}
?>