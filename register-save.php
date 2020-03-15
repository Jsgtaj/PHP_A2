<?php
echo "<a href='register.php'>Back to regisration</a><br>";
$user = $_POST["username"];
$pass = $_POST["password"];
$passConf = $_POST["passwordConfirm"];

if (empty($user) || empty($pass) || empty($passConf)) {
  echo "Be sure to fill out all fields.";
} else if ($pass != $passConf) {
  echo "Passwords do not match.";
} else {

  require "db.php";
  $sql = "SELECT username FROM cms_users WHERE username = :user";
  $check = $db->prepare($sql);
  $check->bindParam(":user", $user, PDO::PARAM_STR, 50);
  $check->execute();
  $test = $check->fetch();

  if (!empty($test)) {

    echo "Username already exists.";
    $db = null;
  } else {
    $sql = "INSERT INTO cms_users (username,`password`) VALUES (:user,:pass)";
    $comm = $db->prepare($sql);
    $hashpass = password_hash($hashpass, PASSWORD_DEFAULT);
    $comm->bindParam(":user", $user, PDO::PARAM_STR, 50);
    $comm->bindParam(":pass", $hashpass, PDO::PARAM_STR, 255);

    $comm->execute();
    header("location:login.php");
    $db = null;
  }
}
