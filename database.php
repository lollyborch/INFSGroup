<?php

//registration form from http://www.eggslab.net/creating-registration-form-with-php-and-mysqli/
	define('DB_HOST', 'localhost');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', 'root');
	define('DB_DATABASE', 'infs3202photobooth');
	$db = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

    if (mysqli_connect_error()) {
      die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
     }

 echo "<div'>Connected successfully.</div>";

// $mysqli->close();

?>