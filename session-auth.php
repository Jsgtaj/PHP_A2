<?php
if (empty($_SESSION["userId"])) {
  header("location:login.php");
  exit();
}
// If there isn't a session running, boot the user back to the login page
