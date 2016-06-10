<?php
session_start();
//echo $_POST['email'].$_POST['password'];

include ("database.php");

if(isset($_POST["submit"]))
	{
		$email = mysqli_real_escape_string($db, $_POST["email"]);
		$password = mysqli_real_escape_string($db, $_POST["password"]);
    $password = md5($password);


		$select_user="SELECT * FROM users WHERE email='$email' AND password='$password'";

   // $query_user = mysqli_query($db,$select_user);
   // $check_user = mysqli_num_rows($run_user);

		$user_query=mysqli_query($db,$select_user);
        //$result_rows = mysqli_num_rows($result);
       // $resultarray = mysqli_fetch_array($result);

        //from http://php.net/manual/en/mysqli-result.fetch-assoc.php
        if ($result = mysqli_query($db, $select_user)) {

            /* fetch associative array */
            $row = mysqli_fetch_assoc($result);
            $_SESSION['firstname'] = $row["firstname"];
						$_SESSION['userID'] = $row["user_ID"];
           // printf ("%s (%s)\n", $row["user_ID"], $row["lastname"]);


            /* free result set */
            mysqli_free_result($result);
        }

        /* close connection */
        mysqli_close($link);
        //echo $_SESSION['firstname'];


		if(mysqli_num_rows($user_query)>0)
		{
			$_SESSION['email']=$email;
            $_SESSION['auth'] = true;
			$_SESSION['error']="";
            //echo count($resultarray);
            /*for (i=0; i<count($resultarray); i++){
                $slice = array_slice($resultarray, i);
                echo
            }*/
            //echo array_values($resultarray);
            header('location: index.php');
            exit;
            //echo "email is on!";
		}
		else
		{
            $_SESSION['error'] = "error Username or Password!!";
			//echo "nope-ity nope nope email password wrongs";
            $msg1 = "The email or password entered was incorrect.  Please try again.";
		}
	}
?>
