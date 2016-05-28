<?php
session_start();
include ("database.php");

echo($_SESSION);

if(isset( $_SESSION['firstname'])) {
  $encodeddata = file_get_contents('php://input');

  $filepath = $_SERVER['DOCUMENT_ROOT'] . '/img/test.png';

  /* snippets from http://codepad.org/BBNt1GkK */
  $dataUrl = $encodeddata;
  list($meta, $content) = explode(',', $dataUrl);
  $content = base64_decode($content);

  file_put_contents($filepath, $content);

  if (mysqli_query($db, "INSERT INTO `images`(`img_ID`, `user_ID`, `img_name`) VALUES (0,1,'$filepath')")) {
    echo("IT WORKED");
  };
}
?>
