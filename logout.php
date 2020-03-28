<?php
session_start();
session_unset();
session_destroy();
header("location:login.php");
//opens the session, unsets the variables, destroys session, links back to login
