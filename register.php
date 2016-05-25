<?php
session_start();

//registration form from http://www.eggslab.net/creating-registration-form-with-php-and-mysqli/

include ("database.php");


if(isset($_POST["submit"]))
	{
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
		$email = $_POST["email"];
		$password = $_POST["password"];
        
    
        $firstname = mysqli_real_escape_string($db, $firstname);
        $lastname = mysqli_real_escape_string($db, $lastname);
		$email = mysqli_real_escape_string($db, $email);
		$password = mysqli_real_escape_string($db, $password);
		$password = md5($password);
		
		
		$sql="SELECT email FROM users WHERE email='$email'";
		$result=mysqli_query($db,$sql);
		$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
		if(mysqli_num_rows($result) == 1)
		{
			echo "Sorry...This email already exist...";
            $msg = "Sorry...This email already exist...";
		}
		else
		{
			$query = mysqli_query($db, "INSERT INTO users (firstname, lastname, email, password)
            VALUES ('$firstname', '$lastname', '$email', '$password')");
			if($query)
			{
				echo "Thank You! you are now registered.";
                $msg = "Thank You! you are now registered.";
			}
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
        <p>register</p>
        
        
        
        <?php
        // checks is 'error' variable has been set
      //   if (isset($_SESSION['error'])) {
      //       echo "<div>".$_SESSION['error']."</div>";
      //   }
   
        ?>
        
        <form method="POST" action="">
            
            <p>Register</p>
            <p><?php echo $msg;?></p>
            <p>First name: <input type="text" id="firstname" name="firstname" required /></p>
            <p>Last name: <input type="text" id="lastname" name="lastname" required /></p>
            <p>Email: <input type="email" id="email" name="email" required /></p>
            <p>Password: <input type="password" id="password" name="password" required /></p>
            <p><input type="submit" name="submit" id="submit" value="Register" required /></p>
            
        </form>
        
    
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
