<?php
session_start();
include ("database.php");

$userID = $_SESSION['userID'];
$hello = $_SESSION['firstname'];
//echo($_SESSION['uuserID']);
//$userID = $_SESSION['userID'];

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

    <section class="hero">
      <?php
        $result = mysqli_query($db, "SELECT `img_name` FROM `images` WHERE `user_ID` = $userID");
        $fetchresult = mysqli_fetch_all($result);
        foreach ($fetchresult as $row) {
          $result = $row;
          foreach($result as $value) {
            $formatstring = substr($value,15);
            $image = "<div class='galleryContainer'><img class='galleryImg' src=$formatstring /></div>";
            echo($image);
          }
        }
       ?>
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

        <!-- Share links generated at http://www.sharelinkgenerator.com/ -->
        <ul class="soc">
            <li><a class="soc-facebook" href="https://www.facebook.com/sharer/sharer.php?u=http%3A//infs3202photobooth.azurewebsites.net/" target="_blank"></a></li>
            <li><a class="soc-twitter" href="https://twitter.com/home?status=Take%20a%20photo%20with%20Photo%20Shot%20http%3A//infs3202photobooth.azurewebsites.net/" target="_blank"></a></li>
            <li><a class="soc-google soc-icon-last" href="https://plus.google.com/share?url=http%3A//infs3202photobooth.azurewebsites.net/" target="_blank"></a></li>
        </ul>
      <p>Copyright &copy; 2016</p>
    </footer>
    <script src="js\modal.js"></script>
</body>
</html>
