<?php
session_start();
//echo $_POST['email'].$_POST['password'];

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
			//echo "Sorry...This email already exist...";
            $msg2 = "Sorry...This email already exist...";
		}
		else
		{
			$query = mysqli_query($db, "INSERT INTO users (firstname, lastname, email, password)
            VALUES ('$firstname', '$lastname', '$email', '$password')");
			if($query)
			{
                //echo "Thank You! you are now registered. ";
                $msg2 = "Thank You! you are now registered.";
			}
				header('Location: index.php');
		}
	}
?>
