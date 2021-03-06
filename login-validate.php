<?php
require "header.php";
$user = $_POST["username"];
$pass = $_POST["password"];
//Getting the posted variables
require "db.php";
//linking the pdo setup
$sql = "SELECT * FROM cms_users WHERE `username` = :user";
$cmd = $db->prepare($sql);
$cmd->bindParam(":user", $user, PDO::PARAM_STR, 50);
$cmd->execute();
$fetch = $cmd->fetch();
//selecting one row of the table cms_users
if (empty($fetch)) {
  echo "<a href='login.php'>Back to login</a><br><p>Invalid username.</p>";
  //if there is no username match, exit and echo "Invalid username"
} else if (!password_verify($pass, $fetch["password"])) {
  echo  "<a href='login.php'>Back to login</a><br><p>Username exists, Invalid password.</p>";
  //if there is a username match, but the passwords don't match, 
  //exit and echo "Username exists, Invalid password"
} else {
  session_start();
  $_SESSION["userId"] = $fetch["userId"];
  $_SESSION["username"] = $fetch["username"];
  $_SESSION["panel"] = false;
  header("location:index.php?id=1");
  /*if there is a username and password match, start a session
  make the session variable userId the user's Id, get username for display
  control panel variable is false on login*/
  //link to index page 1
}
$db = null;
require "footer.php";
//Header and footer are displayed if an error message keeps the user from continuing
