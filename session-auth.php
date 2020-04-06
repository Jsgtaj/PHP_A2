<?php
if (empty($_SESSION["userId"])) {
  header("location:index.php?id=1");
  exit();
}
// If there isn't a session running, boot the user back to the login page
