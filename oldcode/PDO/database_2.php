<?php

//registration form from http://www.eggslab.net/creating-registration-form-with-php-and-mysqli/
	/*define('DB_HOST', 'localhost');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', 'root');
	define('DB_DATABASE', 'infs3202photobooth');
	$db = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_DATABASE); */

    $DB_HOST 	= "localhost";
    $DB_DATABASE		= "infs3202photobooth";
    $DB_USERNAME		= "root";
    $DB_PASSWORD		= "root";

    $db = new PDO("mysql:host=$DB_HOST;dbname=$DB_DATABASE",$DB_USERNAME,$DB_PASSWORD);

   /* $db = new PDO('mysql:dbname=infs3202photobooth;host=localhost;charset=utf8', 'root', 'root');

    $dbConnection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); */

    if (mysqli_connect_error()) {
      die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
     }

 echo "<div>Connected successfully.</div>";

// $mysqli->close();

?>
