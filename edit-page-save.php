<?php
require "header.php";
require "db.php";
echo "<a href='pages.php'>Back to list of pages</a><br>";
//Link back to pages list if user has error
$pageId = $_GET["id"];
$pageTitle = $_POST["title"];
$pageContent = $_POST["content"];
if ($pageId < 0) {
  //If creating a new page
  $sql = "INSERT INTO cms_pages (title,content) VALUES (:title,:content)";
  $cmd = $db->prepare($sql);
  $cmd->bindParam(":title", $pageTitle, PDO::PARAM_STR, 50);
  $cmd->bindParam(":content", $pageContent, PDO::PARAM_STR, 4096);
  $cmd->execute();
} else {
  //If updating a page
  $sql = "UPDATE cms_pages SET title = :title, content = :content WHERE pageId = :pageId";
  $cmd = $db->prepare($sql);
  $cmd->bindParam(":title", $pageTitle, PDO::PARAM_STR, 50);
  $cmd->bindParam(":content", $pageContent, PDO::PARAM_STR, 4096);
  $cmd->bindParam(":pageId", $pageId, PDO::PARAM_INT);
  $cmd->execute();
}
$db = null;
header("location:pages.php");
