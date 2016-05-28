<?php
session_start();
echo $_POST['email'].$_POST['password'];

include ("database.php");
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

    <!--Social media sharing from http://www.sharethis.com/ -->
    <script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="https://ws.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "bf70e5df-bbc2-489d-b572-e29842752e2a", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
</head>
<body>
    <header>
      <nav>
        <ul>
          <li><a href="index.html">Home</a></li>
          <li><a id="aboutButton" href=#1 >About</a></li>
          <li><a id="loginButton" href=#2>Login/Register</a></li>
            <li><a id="logoutButton" href=logout.php>Logout</a></li>
        </ul>
      </nav>
    </header>

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
        <button id="takePhotoButton">Take Photo</button>
        <i id="filterLeft" class="fa fa-chevron-left" aria-hidden="true"></i>
        <i id="filterRight" class="fa fa-chevron-right" aria-hidden="true"></i>
        <button id="emailButton">Email to Friend</button>
    </section>

    <!-- Login Modal content -->
    <section id="loginModal">
      <div class="loginleft">
        <p id="closeLogin">X</p>
        <h1>Login to Photoshot</h1>
          <p><?php echo $msg1;?></p>

        <?php
        // checks is 'error' variable has been set
         if (isset($_SESSION['error'])) {
             echo "<div>".$_SESSION['error']."</div>";
         }

        ?>

        <form action="checklogin.php" method="POST">
            <div id="flexform">
                <label>Email: &nbsp; </label> <input type="email" id="email" name="email" required />
            </div>
            <div id="flexform">
                <label>Password: &nbsp; </label> <input type="password" id="password" name="password" required />
            </div>
            <div>
                <p class="registerText"><a href="register.php">Register for an account</a></p>
                <input type="submit" name="submit" id="submit" value="Login" />
            </div>

        </form>

      </div>
    <div class="registerright">
         <h1>Register for Photoshot</h1>

            <p><?php echo $msg2;?></p>

            <form method="POST" action="registermodal.php">
            <div id="flexform">
                <label>First name: &nbsp; </label> <input type="text" id="firstname" name="firstname" required />
            </div>
            <div id="flexform">
                <label>Last name: &nbsp; </label> <input type="text" id="lastname" name="lastname" required />
            </div>
            <div id="flexform">
                <label>Email: &nbsp; </label> <input type="email" id="email" name="email" required />
            </div>
            <div id="flexform">
                <label>Password: &nbsp; </label> <input type="password" id="password" name="password" required />
            </div>
            <div>
                <p class="registerText"><a href="index.php#2">Login to your account</a></p>
                <input type="submit" name="submit" id="submit" value="Register" required />
            </div>

        </form>
    </div>
    </section>
    <!-- About Modal content -->
    <section id="aboutModal">
      <div >
        <p id="closeAbout">X</p>
        <p>About the project</p>
      </div>
    </section>
    <footer>

        <ul class="soc">
            <li><a class="soc-facebook" href="https://www.facebook.com/"></a></li>
            <li><a class="soc-twitter" href="https://twitter.com/?lang=en"></a></li>
            <li><a class="soc-instagram soc-icon-last" href="https://www.instagram.com/?hl=en"></a></li>
        </ul>

        <span class='st_facebook_large' displayText='Facebook'></span>
<span class='st_twitter_large' displayText='Tweet'></span>
<span class='st_email_large' displayText='Email'></span>

      <p>Copyright &copy; 2016</p>
    </footer>
    <script src="js\modal.js"></script>
    <script src="js\camera.js"></script>
</body>
</html>
