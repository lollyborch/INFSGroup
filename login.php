<?php
session_start();
echo $_POST['email'].$_POST['password'];

include ("database.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login to Photoshot</title>
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
<body class="bodybackground">
    <header>
      <nav>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a id="aboutButton" href=#1>About</a></li>
          <li><a id="loginButton" href=#2>Login</a></li>
            <li><a id="logoutButton" href=logout.php>Logout</a></li>
        </ul>
      </nav>
    </header>

    <section class="loginbox">
        <h1>Login to Photoshot</h1>

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
      <p>Copyright &copy; 2016</p>
    </footer>
    <script src="js\modal.js"></script>
    <script src="js\camera.js"></script>
</body>
</html>
