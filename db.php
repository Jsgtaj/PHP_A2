<?php
try {
  //new pdo linking to aws database set to db variable
  $db = new PDO("mysql:host=172.31.22.43; dbname=Justin200418255", "Justin200418255", "fsQ9DwTT-g");
} catch (Exception $e) {
  //If User can't connect, redirect to error page with error code
  header("location:general-error.php?error=" . $e->getCode());
}
