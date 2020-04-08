<?php
session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/styles.css">
  <link href="https://fonts.googleapis.com/css?family=Inter&display=swap" rel="stylesheet">
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <script src="js/nav.js" async defer></script>
  <title><?php echo $title ?></title>
  <!--Title is echoed from body pages-->
</head>

<body>
  <nav>
    <a href="control-panel-leave.php"><img src=<?php
                                                if (file_exists("img/php_web_builder_logo.png")) {
                                                  echo "img/php_web_builder_logo.png" . "?" . time();
                                                } else {
                                                  echo "img/php_web_builder_logo.jpeg" . "?" . time();
                                                } //Adding time to end of images to force refresh when updated
                                                ?> alt="Site logo"></a>
    <?php
    if (!empty($_SESSION['userId'])) {
      //If logged in, display username
      $userId = $_SESSION['username'];
      echo "<p>Logged in as: $userId</p>";
    }
    if (!empty($id)) {
      //If page uses id to track position, echo ul with id
      echo '<ul id=i' . $id . ' class="bgVis">';
    } else if (!empty($position)) {
      //If page uses classes to track position, echo ul with class
      echo '<ul class="' . $position . ' bgVis">';
    } else {
      //If page has no class or id
      echo '<ul class="bgVis">';
    }
    ?>
    <!--ul id and class echoed from pages to set highlighted style-->
    <?php
    if (empty($_SESSION['userId'])) {
      //if userId is empty, show pages, register and log in
      require "db.php";
      $sql = "SELECT pageId, title FROM cms_pages";
      $cmd = $db->prepare($sql);
      $cmd->execute();
      $arr = $cmd->fetchAll();
      foreach ($arr as $page) {
        echo "<li class='vis'><a href='index.php?id=" . $page["pageId"] . "'>" . $page["title"] . "</a></li>";
      }
      echo "<li class='vis'><a href='register.php'>Register</a></li><li><a href='login.php'>Log In</a></li>";
    } else {
      if ($_SESSION["panel"] == true) {
        //if user has clicked on control panel link, setting panel to true, show control panel links
        echo "<li class='vis'><a href='admins.php'>Administrators</a></li>
          <li class='vis'><a href='pages.php'>Pages</a></li>
          <li class='vis'><a href='logo.php'>Logo</a></li>
          <li class='vis'><a href='control-panel-leave.php'>Public Site</a></li>
          <li class='vis'><a href='control-panel.php'>Control Panel</a></li>";
      } else {
        //user is not in the control panel, show pages and enter control panel link
        require "db.php";
        $sql = "SELECT pageId, title FROM cms_pages";
        $cmd = $db->prepare($sql);
        $cmd->execute();
        $arr = $cmd->fetchAll();
        foreach ($arr as $page) {
          echo "<li class='vis'><a href='index.php?id=" . $page["pageId"] . "'>" . $page["title"] . "</a></li>";
        }
        echo "<li class='vis'><a href='control-panel-enter.php'>Control Panel</a></li>";
      }
      //if userId exists, show these links
      echo "<li class='vis'><a href='logout.php'>Log Out</a></li>";
    }
    ?>
    <img class="hamb" src="img/hamburger.svg" alt="menu">
    </ul>
  </nav>
  <section class="wrapper">