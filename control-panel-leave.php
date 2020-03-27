<?php
session_start();
$_SESSION["panel"] = false;
header("location:index.php");
//leave control panel menu, go to first public page
