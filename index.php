<?php 

session_start();

//login from week 5 tutorial

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
</head>
<body>
    <header>
      <nav>
        <ul>
          <li><a href="index.html">Home</a></li>
          <li><a id="aboutButton" href=#1>About</a></li>
          <li><a id="loginButton" href=#2>Login</a></li>
        </ul>
      </nav>
    </header>
    
    <section style="background-color: white; color: black; margin: 100px; padding: 50px;">
        <p>login</p>
        
        <?php
        // checks is 'error' variable has been set
         if (isset($_SESSION['error'])) {
             echo "<div>".$_SESSION['error']."</div>";
         }
   
        ?>
        
        <form method="POST">
            
            <p>Login to take a shot</p>
            <p>Username: <input type="text" id="username" name="username"></p>
            <p>Password: <input type="text" id="password" name="password"></p>
            <p><input type="submit" name="submit" id="submit" value="Login"</p>
        
        
        
        </form>
        
    
    
    
    </section>
    <section class="hero">
      <a  id="openCameraButton" class="callToActionButton" role="button" tabindex="0">
        <i class="fa fa-2x fa-camera-retro" aria-hidden="true"></i>
        Take a Shot
      </a>
      <img class="callToAction" src="images/hero2.jpg" alt="Shady character holding whisky glass"/>
    </section>
    <section class="camera">
        <video id="video">Video Stream not Available</video>
        <img id="photo" alt="The Screen Capture will appear in this box"/>
        <canvas id="canvas"></canvas>
        <button id="takePhotoButton">Take Photo</button>
        <button id="filterLeft"><</button>
        <button id="filterRight">></button>
    </section>
    <section id="aboutModal">
      <div class="aboutContent">
        <p class="close">X</p>
        <p>About the project</p>
      </div>
    </section>
    <footer>

        <ul class="soc">
            <li><a class="soc-facebook" href="https://www.facebook.com/"></a></li>
            <li><a class="soc-twitter" href="https://twitter.com/?lang=en"></a></li>
            <li><a class="soc-instagram soc-icon-last" href="https://www.instagram.com/?hl=en"></a></li>
        </ul>
        <!--
      <ul>
        <li>
          <a href="https://www.facebook.com/">
            <img class="socialImage" src="images/facebook.png" alt="facebook"/>
          </a>
        </li>
        <li>
          <a href="https://www.instagram.com/?hl=en">
            <img class="socialImage" src="images/instagram.png" alt="instagram"/>
          </a>
        </li>
        <li>
          <a href="https://twitter.com/?lang=en">
            <img class="socialImage" src="images/twitter.png" alt="twitter"/>
          </a>
        </li>
      </ul> -->
      <p>Copyright &copy; 2016</p>
    </footer>
    <script src="js\modal.js"></script>
    <script src="js\camera.js"></script>
</body>
</html>
