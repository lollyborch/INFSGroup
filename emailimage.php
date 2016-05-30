<?php

//get img file path from src via http://stackoverflow.com/questions/138313/how-to-extract-img-src-title-and-alt-from-html-using-php
    
//$url="https://infs3202photobooth.azurewebsites.net/index.php";
$url="http://localhost:8888/index.php";

$html = file_get_contents($url);

$doc = new DOMDocument();
@$doc->loadHTML($html);

$photoid = $doc->getElementById('photo');
$filepath = $photoid->getAttribute('src');
echo $filepath;

//phpmaler function based on https://github.com/PHPMailer/PHPMailer/blob/master/examples/gmail.phps

require ('PHPMailer/PHPMailerAutoload.php');

//$email = $_POST['email'];
//$message = $_POST['message'];

if(isset($_POST['submit'])){

    $from = "infsphotobooth@gmail.com"; // your email
    $to = $_POST['email']; 
    $subject = "Photobooth image";
    $message = $first_name . " " . $last_name . " wrote the following:" . "\n\n" . $_POST['message'];
    $headers = "From:" . $from;
    $headers2 = "From:" . $to; 
    
	$mail = new PHPMailer();
	
	$mail->isHTML(true);
	//$mail->SMTPDebug = 4; // enables SMTP debug information 
	$mail->IsSMTP();
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = 'tls';
	$mail->Host = "smtp.gmail.com"; //SMTP host
	$mail->Port = 587;
	$mail->Username = "infsphotobooth@gmail.com"; //your email
	$mail->Password = "infsphotobooth123"; // your SMTP email password

	$mail->SetFrom('infsphotobooth@gmail.com', 'Web App');
	$mail->Subject = ($subject);
	$mail->MsgHTML($message);
	$mail->From = "infsphotobooth@gmail.com"; //email retrieved from database of current logged in user
	$mail->FromName= ($first_name . " " . $last_name);

	
	//Provide file path and name of the attachments
	//$mail->addAttachment("file.txt", "File.txt"); // The image file from the database        
	$mail->addAttachment($filepath); //Filename is optional
	

	$mail->addAddress($to);

	

    if($mail->Send()) {
        $msg3 = "Message sent!";
  		echo "Message sent!" . $first_name . "!";
	} else {
        $msg3 = "Mailer error.  Please try again.";
  		echo "Mailer Error: " . $mail->ErrorInfo;
	}
/*
    mail($to,$subject,$message,$headers);
    mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
*/

	}
    
    
?>