<?php
session_start();
header('Content-Type: text/html; charset=utf-8');

$host = "localhost";
$db = "jhpfqzah_116";
$user = "jhpfqzah";
$password = "1iE7s9c4hX"; 

$mysqli = mysqli_connect("$host", "$user", "$password", "$db");


if ($mysqli == false) {
  print("error5");
} else {
  $email = trim(mb_strtolower($_POST["email"]));
  $pass = trim($_POST["pass"]);

  $result = $mysqli->query("SELECT * FROM `users` WHERE `email`='$email'");
  $result = $result->fetch_assoc();
  //echo "Такой email есть";
  //var_dump ($result);
  if ($pass == $result["pass"]) { 
    echo "success";

    $_SESSION["id"] = $result["id"];
    $_SESSION["email"] = $result["email"];
    $_SESSION["name"] = $result["name"];
    $_SESSION["lastname"] = $result["lastname"];
  } else {
    echo "rejected";
  }
}
