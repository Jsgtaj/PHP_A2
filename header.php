<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/styles.css">
  <link href="https://fonts.googleapis.com/css?family=Inter&display=swap" rel="stylesheet">
  <title><?php echo $title ?></title>
  <!--Title is echoed from body pages-->
</head>

<body>
  <nav>
    <a href="index.php"><img src="img/php_web_builder_logo.png" alt="php web builder logo"></a>
    <ul class="<?php echo $title ?>">
      <!--ul class is echoed from body pages to set highlighted style-->
      <li><a href="index.php">Home</a></li>
      <li><a href="#">About</a></li>
      <li><a href="#">Contact</a></li>
      <?php
      session_start();
      if (!$_SESSION) {
        echo   "<li><a href='register.php'>Register</a></li>
        <li><a href='login.php'>Log In</a></li>";
      } else {
        echo   "<li><a href='logout.php'>Log Out</a></li>";
      }
      // If there isn't a session, echo register and log in links, if there is a session, echo log out link
      ?>
    </ul>
  </nav>
  <section class="wrapper">