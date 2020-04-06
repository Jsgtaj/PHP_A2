<?php
require "db.php";
$pageId = $_GET["id"];
if (empty($pageId)) {
  //if user went to an index page without an id, default id to 1
  header("location:index.php?id=1");
}
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
  $_SESSION["panel"] = false;
  //Hide control panel when going to an index page
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
  $_SESSION["panel"] = false;
  //Hide control panel when going to an index page
}
require "footer.php";
// Adding footer
