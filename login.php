<?php 
session_start();

include ("database.php");

if(isset($_POST["submit"]))
	{   
		$email = mysqli_real_escape_string($db, $_POST["email"]);
		$password = mysqli_real_escape_string($db, $_POST["password"]);
    $password = md5($password);
		
		
		$select_user="SELECT * FROM users WHERE email='$email' AND password='$password'";
    
    $query_user = mysqli_query($db,$select_user);
    $check_user = mysqli_num_rows($run_user);
    
    
		$result=mysqli_query($db,$select_user);
		if(mysqli_num_rows($result)>0)
		{
			$_SESSION['email']=$email;
            echo "email is on!";
            $msg = "You have successfully logged in";
            header('location: index.php');
		}
		else
		{
			echo "nope-ity nope nope email password wrongs";
            $msg = "The email or password entered was incorrect.  Please try again.";
		}
	}
?>