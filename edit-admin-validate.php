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
  require "db.php";

  $userId = $_GET["id"];
  $username = $_POST["username"];
  $oldPassword = $_POST["oldPassword"];
  $newPassword = $_POST["password"];
  $newPasswordConfirm = $_POST["passwordConfirm"];
  echo "<a href=edit-admin.php?id=" . $userId . ">Back to edit page</a><br>";
  //Link back to edit page if user has error

  $sqlGet = "SELECT * FROM cms_users WHERE `userId` = :userId ";
  $get = $db->prepare($sqlGet);
  $get->bindParam(":userId", $userId, PDO::PARAM_INT);
  $get->execute();
  $getRes = $get->fetch();
  if (empty($getRes)) {
    echo "An error occured. The admin you are trying to edit does not exist in the database.";
    //If the userId is not found, echo an error message.
  } else {
    if (empty($username) || empty($oldPassword) || empty($newPassword) || empty($newPasswordConfirm)) {
      echo "Be sure to fill out all fields.";
      //If any field is empty, echo "Be sure to fill out all fields."
    } else if (!password_verify($oldPassword, $getRes["password"])) {
      echo "The old password you entered does not match the one in our records.";
      //If the old password isn't the one in the database, echo "The old password you entered does not match the one in our records."
    } else if ($newPassword != $newPasswordConfirm) {
      echo "The new password confirmation does not match the new password you entered.";
      //If the new passwords don't match, echo "The new password confirmation does not match the new password you entered."
    } else {
      //Everything is ok, begin the update
      $newPasswordHash = password_hash($newPassword, PASSWORD_DEFAULT);
      //Hash the new password
      $sqlSet = "UPDATE cms_users SET `username` = :username ,`password` = :newPasswordHash WHERE `userId` = :userId";
      $set = $db->prepare($sqlSet);
      $set->bindParam(":username", $username, PDO::PARAM_STR, 50);
      $set->bindParam(":newPasswordHash", $newPasswordHash, PDO::PARAM_STR, 255);
      $set->bindParam(":userId", $userId, PDO::PARAM_INT);
      $set->execute();
      header("location:admins.php");
      //Link back to admins page
    }
  }
  $db = null;
  ?>
</body>

</html>