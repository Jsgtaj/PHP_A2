<?php
session_start();
$_SESSION["panel"] = true;
header("location:control-panel.php");
//go to control panel page, change header
