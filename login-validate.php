<?php
$user = $_POST["username"];
$pass = $_POST["password"];

require "db.php";

$sql = "SELECT userId, `password` FROM cms_users WHERE username = :user";
$cmd = $db->prepare($sql);
$cmd->bindParam(":user", $user, PDO::PARAM_STR, 50);
$cmd->execute();

$fetch = $cmd->fetch();
if (empty($fetch)) {
  echo "<a href='login.php'>Back to login</a><br>Invalid username.";
  exit();
} else if (!password_verify($pass, $fetch["password"])) {
  echo  "<a href='login.php'>Back to login</a><br>Username exists, Invalid password.";
  exit();
} else {
  session_start();
  $_SESSION["userId"] = $fetch["userId"];
  header("location:index.php");
}
$db = null;
