<?php
require "header.php";
// Adding header
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
  $contentFormatted = preg_replace("/
/", "<br>", $content);
  $id =  $arr["pageId"];
  //title and id will be populated by current page data
  echo "<h1>" . $title . "</h1>";
  echo "<p>" . $contentFormatted . "</p>";
} else if (!empty($_SESSION["userId"])) {
  //If there are no pages and user is logged in
  $_SESSION["panel"] = true;
  //Re-sets control panel variable to true if user goes to this page
  echo '<h1>Your site has no pages. Create one by clicking the link below.</h1>';
  echo "<a href='edit-page.php?id=-1'>Create a new page</a>";
} else {
  //If there are no pages and there is no user, show nohing
}
require "footer.php";
// Adding footer
