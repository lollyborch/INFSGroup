<?php

//registration form from http://www.eggslab.net/creating-registration-form-with-php-and-mysqli/
	define('DB_HOST', 'us-cdbr-azure-west-c.cloudapp.net');
	define('DB_USERNAME', 'bc1b91c9e04598');
	define('DB_PASSWORD', '2a10133a');
	define('DB_DATABASE', 'infs3202photobooth');
	$db = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_DATABASE); 

    if (mysqli_connect_error()) {
      die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
     }

 //echo "<div>Connected successfully.</div>";

// $mysqli->close();

?>
