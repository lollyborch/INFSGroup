<?php
session_start();
include ("database.php");

$userID = $_SESSION['userID'];

if(isset( $_SESSION['firstname'])) {

  $result = mysqli_query($db, "SELECT * FROM `images` WHERE `user_ID` = $userID");
  $fetched = mysqli_fetch_all($result);
  $counter = sizeof($fetched);

  $encodeddata = file_get_contents('php://input');

  $dirpath = $_SERVER['DOCUMENT_ROOT'] . '/img' . '/' . $userID;
  $filepath = $_SERVER['DOCUMENT_ROOT'] . '/img' . '/' . $userID . '/' . $counter . '.png';

  /* snippets from http://codepad.org/BBNt1GkK */
  $dataUrl = $encodeddata;
  list($meta, $content) = explode(',', $dataUrl);

  $content = base64_decode($content);
  if (!file_exists($filepath)) {
    mkdir("$dirpath");
  }
  file_put_contents($filepath, $content);

  if (mysqli_query($db, "INSERT INTO `images`(`img_ID`, `user_ID`, `img_name`) VALUES (0,'$userID','$filepath')")) {
    echo("IT WORKED");
    //echo($_SESSION['userID']);
  };
}
?>
