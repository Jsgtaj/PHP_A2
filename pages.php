<?php
$title = "Pages";
$position = "p5";
require "header.php";
// Adding header, setting title, position used for highlighting in header
if (empty($_SESSION["username"])) {
  header("location:login.php");
}
// If there isn't a session running, boot the user back to the login page
?>

<?php
require "footer.php";
// Adding footer
?>