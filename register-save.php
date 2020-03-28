<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    html {
      font-size: 24px;
    }
  </style>
  <title>Error</title>
</head>

<body>

  <?php
  echo "<a href='register.php'>Back to regisration</a><br>";
  //Link back to registration if user has error
  $user = $_POST["username"];
  $pass = $_POST["password"];
  $passConf = $_POST["passwordConfirm"];
  //Getting the posted variables

  if (empty($user) || empty($pass) || empty($passConf)) {
    echo "Be sure to fill out all fields.";
    //If any field is empty, echo "Be sure to fill out all fields."
  } else if ($pass != $passConf) {
    echo "Passwords do not match.";
    //If passwords aren't the same, echo "Passwords do not match."
  } else {
    require "db.php";
    $sql = "SELECT username FROM cms_users WHERE `username` = :user";
    $check = $db->prepare($sql);
    $check->bindParam(":user", $user, PDO::PARAM_STR, 50);
    $check->execute();
    $test = $check->fetch();
    //get record if username entered is in the database
    if (!empty($test)) {
      echo "Username already exists.";
      //if there is a username in the database, echo "Username already exists."
    } else {
      $sql = "INSERT INTO cms_users (username,`password`) VALUES (:user,:pass)";
      $comm = $db->prepare($sql);
      $hashpass = password_hash($pass, PASSWORD_DEFAULT);
      $comm->bindParam(":user", $user, PDO::PARAM_STR, 50);
      $comm->bindParam(":pass", $hashpass, PDO::PARAM_STR, 255);
      $comm->execute();
      //sql insert statement, create hash version of password, bind parameters to insert statement, execute"
      header("location:login.php");
      //send to login page
    }
    $db = null;
  }
  ?>
</body>

</html>