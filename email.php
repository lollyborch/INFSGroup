<?php
//stand alone email file works and sends text based messages.


session_start();
include ("database.php");
$msg3 = '';

//echo $_SESSION['firstname'];
$hello = $_SESSION['firstname'];
//sets gallery variable to display none as default
$gallery = "<li style='display:none'><a href='gallery.php'>Gallery</a></li>";


if (isset($_SESSION['firstname']))
{
      if (!empty($_SESSION['firstname']))
      {
          //if you are logged in, shows a hello message and a link to logout through the $hello variable
          $account = "Hello ". $hello . ".  <a href='logout.php'>Logout</a>";
          //shows link to gallery if you are logged in
          $gallery = "<li><a href='gallery.php'>Gallery</a></li>";
      }

}
else
    {
        //if you are not logged in show a link to login or register
       $account = "<a id='loginButton' href='#2'>Login/Register</a>";
       //$account = "hello2";
    }
    
?>
<?php 

//get img file path from src via http://stackoverflow.com/questions/138313/how-to-extract-img-src-title-and-alt-from-html-using-php
    
$url="https://infs3202photobooth.azurewebsites.net/index.php";
//$url="http://localhost:8888/index.php";

$html = file_get_contents($url);

$doc = new DOMDocument();
@$doc->loadHTML($html);

//finds id=photo
$photoid = $doc->getElementById('photo');
//gets src filepath of photo to attach to message
$filepath = $photoid->getAttribute('src');
echo $filepath;
//echo "<p style='color:white'>" . "hello" . "</p>";

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
	//$mail->addAttachment("images/profile.png"); //Filename is optional
	

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

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Film Noir PhotoBooth Email</title>
  <!-- Meta Information -->
  <meta charset="utf-8"/>
  <meta name="Author" content="Lyndon Moore, Sarah Balsillie, Lilly Borchardt"/>
  <meta name="Description" content="A fun photo photo capturing website built in PHP and JavaScript"/>
  <meta name="keywords" content="photo, booth, image, film, noir"/>
  <!-- Link to Stylesheets -->
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css"/>
  <link rel="stylesheet" type="text/css" href="css/main.css"/>
  <link href='https://fonts.googleapis.com/css?family=Roboto:500,300' rel='stylesheet' type='text/css'>

  <!-- Font awesome -->
  <script src="https://use.fontawesome.com/049fef273f.js"></script>

   
</head>
<body>
    
    <!--NAVIGATION-->
    <header>
      <nav>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a id="aboutButton" href=#1 >About</a></li>
          <?php echo $gallery; ?>

        </ul>
          <p class="hellologout"><?php echo $account;?></p>
      </nav>
    </header>
<!--END NAVIGATION-->
    
<!--START EMAIL FORM-->
    
    <section class="loginbox">
        <h1>Email your photo</h1>
        <p class="submitmessage"><?php echo $msg3;?></p>
    

<form method="POST" action="">
            <div id="flexform">
                <label>First name: &nbsp; </label> <input type="text" id="first_name" name="first_name" required />
            </div>
            <div id="flexform">
                <label>Last name: &nbsp; </label> <input type="text" id="last_name" name="last_name" required />
            </div>
            <div id="flexform">
                <label>To email: &nbsp; </label> <input type="email" id="email" name="email" required />
            </div>
            <div id="flexform">
                <label>Message: &nbsp; </label> <textarea rows="5" name="message" cols="30" email="message"></textarea>
            </div>
            <div>
                <input type="submit" name="submit" id="submit" value="Submit" required />
            </div>
        
        </form>
        
        </section>
    <section>
        <img id="photo" src="images/hero2.jpg" alt="shot glass in black and white" />
    
    </section>
    
    <!-- FOOTER START -->
    <footer>

        <!-- Share links generated at http://www.sharelinkgenerator.com/ -->
        <ul class="soc">
            <li><a class="soc-facebook" href="https://www.facebook.com/sharer/sharer.php?u=http%3A//infs3202photobooth.azurewebsites.net/" target="_blank"></a></li>
            <li><a class="soc-twitter" href="https://twitter.com/home?status=Take%20a%20photo%20with%20Photo%20Shot%20http%3A//infs3202photobooth.azurewebsites.net/" target="_blank"></a></li>
            <li><a class="soc-google soc-icon-last" href="https://plus.google.com/share?url=http%3A//infs3202photobooth.azurewebsites.net/" target="_blank"></a></li>
        </ul>
      <p>Copyright &copy; 2016</p>
    </footer>
<!-- FOOTER END -->
    <script src="js\modal.js"></script>
</body>
</html>


