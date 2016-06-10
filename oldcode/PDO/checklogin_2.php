<?php
session_start();
//echo $_POST['email'].$_POST['password'];

include ("database.php");

//PDO tutorial https://www.sitepoint.com/community/t/php-login-form-code-pdo/6772


if(isset($_POST["submit"]))
	{
		$email = mysqli_real_escape_string($db, $_POST["email"]);
		$password = mysqli_real_escape_string($db, $_POST["password"]);
        $password = md5($password);


		//$select_user="SELECT * FROM users WHERE email='$email' AND password='$password'";

        $select_user = $db->prepare("SELECT * FROM tablename WHERE email='$email' AND password='$password'");
    
    
        $user_query = $db->query($select_user);
    
        //$user_query=mysqli_query($db,$select_user);
    
        //from http://php.net/manual/en/mysqli-result.fetch-assoc.php
        if ($result = mysqli_query($db, $select_user)) {

            
            $row = mysqli_fetch_assoc($result);
            $_SESSION['firstname'] = $row["firstname"];
			$_SESSION['userID'] = $row["user_ID"];
            //printf ("%s (%s)\n", $row["user_ID"], $row["lastname"]);

            mysqli_free_result($result);
        }

       
        mysqli_close($link);
        //echo $_SESSION['firstname'];


		if(mysqli_num_rows($user_query)>0)
		{
			$_SESSION['email']=$email;
            $_SESSION['auth'] = true;
			$_SESSION['error']="";

            header('location: index.php');
            exit;
		}
		else
		{
            $_SESSION['error'] = "error Username or Password!!";
            $msg1 = "The email or password entered was incorrect.  Please try again.";
		}
	}
?>
