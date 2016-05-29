<?php
session_start();
echo $_POST['email'].$_POST['password'];

//registration form from http://www.eggslab.net/creating-registration-form-with-php-and-mysqli/

include ("database.php");


if(isset($_POST["submit"]))
	{
        $firstname = mysqli_real_escape_string($db, $_POST["firstname"]);
        $lastname = mysqli_real_escape_string($db, $_POST["lastname"]);
		$email = mysqli_real_escape_string($db, $_POST["email"]);
		$password = mysqli_real_escape_string($db, $_POST["password"]);
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
				echo "Thank You! you are now registered. ";
                $msg = "Thank You! you are now registered. <a href='index.php#2'>Login to your account</a>";
			}
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register for PhotoBooth</title>
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
        
        <section class="loginbox">
            
             <?php
        // checks is 'error' variable has been set
      //   if (isset($_SESSION['error'])) {
      //       echo "<div>".$_SESSION['error']."</div>";
      //   }
   
        ?>
            
        <h1>Register for Photoshot</h1>
            
            <p><?php echo $msg;?></p>
            
            <form method="POST" action="">
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
