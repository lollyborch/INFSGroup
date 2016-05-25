<?php
	session_start();

    session_destroy();

	header('Location:index.php');
    echo "It is destroyed";

?>
