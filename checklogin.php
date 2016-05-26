<?php 
session_start();
echo $_POST['email'].$_POST['password'];

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
            $_SESSION['auth'] = true;
			$_SESSION['error']="";
			$_SESSION['username'] = $_POST['username'];
            header('location: index.php');
            exit;
            //echo "email is on!";
		}
		else
		{
            $_SESSION['error'] = "error Username or Password!!";
			echo "nope-ity nope nope email password wrongs";
            $msg = "The email or password entered was incorrect.  Please try again.";
		}
	}
?>