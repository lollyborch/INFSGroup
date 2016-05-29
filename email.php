<!DOCTYPE html>
<head>
<title>Form submission</title>
</head>
<body>

<form action="" method="post">
First Name: <input type="text" name="first_name" id="first_name"><br>
Last Name: <input type="text" name="last_name" id="last_name"><br>
Email: <input type="text" name="email" id="email"><br>
Message:<br><textarea rows="5" name="message" cols="30" email="message"></textarea><br>
<input type="submit" name="submit" value="Submit">
</form>

</body>
</html>

<?php 

require ('PHPMailer/PHPMailerAutoload.php');

$email = $_POST['email'];
$message = $_POST['message'];

if(isset($_POST['submit'])){

    $from = "infsphotobooth@gmail.com"; // your email
    $to = $_POST['email']; 
    $subject = "Photobooth image";
    $message = $first_name . " " . $last_name . " wrote the following:" . "\n\n" . $_POST['message'];
    $headers = "From:" . $from;
    $headers2 = "From:" . $to; 
    
	$mail = new PHPMailer();
	
	$mail->isHTML(true);
	$mail->SMTPDebug = 4; // enables SMTP debug information 
	$mail->IsSMTP();
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = 'ssl';
	$mail->Host = "smtp.gmail.com"; //SMTP host
	$mail->Port = 587;
	$mail->Username = "infsphotobooth@gmail.com"; //your email
	$mail->Password = "infsphotobooth123"; // your SMTP email password

	$mail->SetFrom('infsphotobooth@gmail.com', 'Web App');
	$mail->Subject = ($subject);
	$mail->MsgHTML($message);
	$mail->From = "infsphotobooth@gmail.com"; //email retrieved from database of current logged in user
	$mail->FromName= ($first_name . " " . $last_name);

	/*
	//Provide file path and name of the attachments
	$mail->addAttachment("file.txt", "File.txt"); // The image file from the database        
	$mail->addAttachment("images/profile.png"); //Filename is optional
	*/

	$mail->addAddress($to);

	

    if($mail->Send()) {
  		echo "Message sent!" . $first_name . "!";
	} else {
  		echo "Mailer Error: " . $mail->ErrorInfo;
	}
/*
    mail($to,$subject,$message,$headers);
    mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
*/

	}
?>


