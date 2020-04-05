<?php
require "header.php";
require "session-auth.php";
echo "<a href='logo.php'>Back to logo upload</a><br>";
//checks if user is allowed to go here
$logo = $_FILES["upload"];
$logoTmpName = $logo["tmp_name"];
$logoName = $logo["name"];
$logoSize = $logo["size"];
$logoType = mime_content_type($logoTmpName);
if (!empty($logoType)) {
  if ($logoSize < 1024000 && ($logoType == "image/jpeg" || $logoType == "image/png")) {
    if (file_exists("img/php_web_builder_logo.jpeg")) {
      unlink("img/php_web_builder_logo.jpeg");
    } else if (file_exists("img/php_web_builder_logo.jpg")) {
      unlink("img/php_web_builder_logo.jpg");
    } else if (file_exists("img/php_web_builder_logo.png")) {
      unlink("img/php_web_builder_logo.png");
    }
    if ($logoType == "image/jpeg") {
      move_uploaded_file($logoTmpName, "img/php_web_builder_logo.jpeg");
    } else if ($logoType == "image/png") {
      move_uploaded_file($logoTmpName, "img/php_web_builder_logo.png");
    }
    header("location:logo.php");
  } else if ($logoSize >= 1024000 && ($logoType == "image/jpeg" || $logoType == "image/png")) {
    echo "<p>Your logo is too large. Please choose a file under 1MB in size.</p>";
  } else if ($logoSize >= 1024000 && $logoType != "image/jpeg" && $logoType != "image/png") {
    echo "<p>Please choose either a jpeg or png file under 1MB in size.</p>";
  } else {
    echo "<p>Please upload either a jpeg or png file.</p>";
  }
} else {
  header("location:logo.php");
}
require "footer.php";
