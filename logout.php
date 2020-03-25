<?php
session_start();
session_unset();
session_destroy();
header("location:login.php");
//opens the session, unsets the variable, destroys section, links back to index
