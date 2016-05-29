<?php
session_start();
include ("database.php");
$msg1 = '';
$msg2 = '';

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
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Film Noir PhotoBooth</title>
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
<!--Start Body container-->  
    <div class="bodycontainer">
<!--Camera button and video stream-->
    <section class="hero">
      <a  id="openCameraButton" class="callToActionButton" role="button" tabindex="0">
        <i class="fa fa-2x fa-camera-retro" aria-hidden="true"></i>
        Take a Shot
      </a>
      <!--<img class="callToAction" src="images/hero2.jpg" alt="Shady character holding whisky glass"/>-->
    </section>
    <section class="camera">
        <video id="video">Video Stream not Available</video>
        <img id="photo" alt="The Screen Capture will appear in this box"/>
        <canvas id="canvas"></canvas>
        <div class="buttons-left">
            <button id="takePhotoButton">Take Photo</button>
        </div>
        <div class="buttons-right">
            <button id="emailButton">Email to Friend</button>
            <i id="filterLeft" class="fa fa-chevron-left" aria-hidden="true"></i>
            <i id="filterRight" class="fa fa-chevron-right" aria-hidden="true"></i>
        </div>
        
    </section>

   
<!--End Body container-->
    </div>
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
    <script src="js\camera.js"></script>
</body>
</html>
