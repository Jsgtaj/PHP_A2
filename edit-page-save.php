<?php
require "header.php";
require "db.php";
echo "<a href='pages.php'>Back to list of pages</a><br>";
//Link back to pages list if user has error
$pageId = $_GET["id"];
$pageTitle = $_POST["title"];
$pageContent = $_POST["content"];
if ($pageId == -1) {
  //If creating a new page
  $sql = "INSERT INTO cms_pages (title,content) VALUES (:title,:content)";
  $cmd = $db->prepare($sql);
  $cmd->bindParam(":title", $pageTitle, PDO::PARAM_STR, 50);
  $cmd->bindParam(":content", $pageContent, PDO::PARAM_STR, 4096);
  $cmd->execute();
  header("location:pages.php");
  //Link to 'pages' page
} else { //If updating a page
  $sqlCheck = "SELECT pageId FROM cms_pages WHERE pageId = :pageId";
  $cmdCheck = $db->prepare($sqlCheck);
  $cmdCheck->bindParam(":pageId", $pageId, PDO::PARAM_INT);
  $cmdCheck->execute();
  $thisPage = $cmdCheck->fetch();
  if (!empty($thisPage)) {
    //If page exists
    $sql = "UPDATE cms_pages SET title = :title, content = :content WHERE pageId = :pageId";
    $cmd = $db->prepare($sql);
    $cmd->bindParam(":title", $pageTitle, PDO::PARAM_STR, 50);
    $cmd->bindParam(":content", $pageContent, PDO::PARAM_STR, 4096);
    $cmd->bindParam(":pageId", $pageId, PDO::PARAM_INT);
    $cmd->execute();
    header("location:pages.php");
    //Link to 'pages' page
  } else {
    //If the page doesn't exist
    echo "<p>An error occurred. The page you wish to edit doesn't exist.</p>";
  }
}
$db = null;
//Close database connection
require "footer.php";
//Header and footer are displayed if an error message keeps the user from continuing
