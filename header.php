<?php
session_start(); ?>
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
    <?php
    if (!empty($_SESSION['userId'])) {
      $userId = $_SESSION['username'];
      echo "<p>Logged in as: $userId</p>";
    }
    ?>
    <ul id="i<?php /*echo $id*/ ?>" class="<?php echo $position ?>">
      <!--ul id and class echoed from pages to set highlighted style-->
      <?php
      if (empty($_SESSION['userId'])) {
        //if userId is empty, show register and log in
        echo "<li><a href='register.php'>Register</a></li>
      <li><a href='login.php'>Log In</a></li>";
      } else {
        if ($_SESSION["panel"] == true) {
          //if user has clicked on control panel link, setting panel to true, show control panel links
          echo "<li><a href='admins.php'>Administrators</a></li>
          <li><a href='pages.php'>Pages</a></li>
          <li><a href='logo.php'>Logo</a></li>
          <li><a href='control-panel-leave.php'>Public Site</a></li>
          <li><a href='control-panel.php'>Control Panel</a></li>";
        } else {
          //user is not in the control panel, show enter control panel link
          echo "<li><a href='control-panel-enter.php'>Control Panel</a></li>";
        }
        //if userId exists, show these links
        echo "<li><a href='logout.php'>Log Out</a></li>";
      }
      ?>
    </ul>
  </nav>
  <section class="wrapper">