<?php
	session_start();
    echo $_POST['email'].$_POST['password'];

    session_destroy();

	header('Location:index.php');
    echo "It is destroyed";

?>
