<?php
require "header.php";
require "session-auth.php";
//checks if user is allowed to go here
echo "<a href='pages.php'>Back to list of pages</a><br>";
//Link back to pages list if user has error
$adminId = $_GET["user"];
require "db.php";
$sqlCheck = "SELECT `userId` FROM `cms_users` WHERE `userId` = :adminId";
$cmdCheck = $db->prepare($sqlCheck);
$cmdCheck->bindParam("adminId", $adminId, PDO::PARAM_INT);
$cmdCheck->execute();
$arrCheck = $cmdCheck->fetch();
//Checking if admin exists before deleting
if (!empty($arrCheck)) {
  //If admin exists
  $sql = "DELETE FROM `cms_users` WHERE `userId` = :adminId";
  $cmd = $db->prepare($sql);
  $cmd->bindParam(":adminId", $adminId, PDO::PARAM_INT);
  $cmd->execute();
  header("location:admins.php");
  //Deletes the entry with the assocciated id, link back to admins
} else {
  //If admin doesn't exist
  echo "<p>An error occurred. The admin you wish to delete doesn't exist.</p>";
}
$db = null;
//Close database connection
require "footer.php";
//Header and footer are displayed if an error message keeps the user from continuing
