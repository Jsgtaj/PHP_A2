<?php
session_start();
require "session-auth.php";
//checks if user is allowed to go here
$_SESSION["panel"] = false;
header("location:index.php");
//leave control panel menu, go to first public page
