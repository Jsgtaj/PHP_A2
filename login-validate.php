<?php
$user = $_POST["username"];
$pass = $_POST["password"];
//Getting the posted variables
require "db.php";
//linking the pdo setup
$sql = "SELECT userId, `password` FROM cms_users WHERE username = :user";
$cmd = $db->prepare($sql);
$cmd->bindParam(":user", $user, PDO::PARAM_STR, 50);
$cmd->execute();
$fetch = $cmd->fetch();
//selecting one row of the table cms_users
if (empty($fetch)) {
  echo "<a href='login.php'>Back to login</a><br>Invalid username.";
  exit();
  //if there is no username match, exit and echo "Invalid username"
} else if (!password_verify($pass, $fetch["password"])) {
  echo  "<a href='login.php'>Back to login</a><br>Username exists, Invalid password.";
  exit();
  //if there is a username match, but the passwords son't match, exit and echo "Username exists, Invalid password"
} else {
  session_start();
  $_SESSION["userId"] = $fetch["userId"];
  header("location:index.php");
  //if there is a username and password match, start a session, make the session variable userId the user's Id, link to index
}
$db = null;
//close db connection
