<?php
require "db.php";
$pageId = $_GET["id"];
$sql = "SELECT * FROM cms_pages WHERE pageId = :pageId";
$cmd = $db->prepare($sql);
$cmd->bindParam(":pageId", $pageId, PDO::PARAM_INT);
$cmd->execute();
$arr = $cmd->fetch();
if (!empty($arr)) {
  //If there are any pages
  $title = $arr["title"];
  $content = $arr["content"];
  $id =  $arr["pageId"];
  //setting title and id variables for the header
  require "header.php";
  // Adding header  
  $contentFormatted = preg_replace("/
/", "<br>", $content);
  //replacing enters with <br>
  echo "<h1>" . $title . "</h1>";
  echo "<p>" . $contentFormatted . "</p>";
  //echoing title and content
} else {
  //If there are no pages, show nothing
  $title = "Blank Page";
  require "header.php";
}
require "footer.php";
// Adding footer
