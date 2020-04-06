<?php
require "header.php";
require "session-auth.php";
//checks if user is allowed to go here
echo "<a href=pages.php>Back to pages list</a><br>";
//Link back to 'pages' page if user has error
require "db.php";
$pageId = $_GET["id"];
$sqlCheck = "SELECT pageId FROM cms_pages WHERE pageId = :pageId";
$cmdCheck = $db->prepare($sqlCheck);
$cmdCheck->bindParam(":pageId", $pageId, PDO::PARAM_INT);
$cmdCheck->execute();
$thisPage = $cmdCheck->fetch();
//Checking if this page exists before deleting
if (!empty($thisPage)) {
  //If page exists
  $sql = "DELETE FROM `cms_pages` WHERE `pageId` = :pageId";
  $cmd = $db->prepare($sql);
  $cmd->bindParam(":pageId", $pageId, PDO::PARAM_INT);
  $cmd->execute();
  header("location:pages.php");
  //Deletes the entry with the assocciated id, link back to pages
} else {
  //If page doesn't exist
  echo "<p>An error occurred. The page you wish to delete doesn't exist.</p>";
}
$db = null;
//Close database connection
require "footer.php";
//Header and footer are displayed if an error message keeps the user from continuing
