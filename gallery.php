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

    <!--Social media sharing from http://www.sharethis.com/ -->
    <script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="https://ws.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "bf70e5df-bbc2-489d-b572-e29842752e2a", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
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

    <section class="hero">
      <!--<img class="callToAction" src="images/hero2.jpg" alt="Shady character holding whisky glass"/>-->
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
</body>
</html>
