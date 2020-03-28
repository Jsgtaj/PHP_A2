<?php
session_start();
require "session-auth.php";
//checks if user is allowed to go here
$_SESSION["panel"] = true;
header("location:control-panel.php");
//go to control panel page, change header to show control panel pages
