<?php
	session_start();
    echo $_POST['email'].$_POST['password'];

//destroys session variables and redirects to index.php
    session_destroy();

	header('Location:index.php');
    echo "It is destroyed";

?>
