<?php
if (empty($_SESSION["username"])) {
  header("location:login.php");
}
// If there isn't a session running, boot the user back to the login page
