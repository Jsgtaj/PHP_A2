<?php
if (!empty($_SESSION["userId"])) {
  header("location:control-panel.php");
  exit();
}
// If there is session running, boot the user back to the control panel
