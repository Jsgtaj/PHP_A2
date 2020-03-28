<?php
require "header.php";
require "db.php";
require "session-auth.php";
//checks if user is allowed to go here
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
  echo "<p>An error occured. The admin you are trying to edit does not exist in the database.</p>";
  //If the userId is not found, echo an error message.
} else {
  if (empty($username) || empty($oldPassword) || empty($newPassword) || empty($newPasswordConfirm)) {
    echo "<p>Be sure to fill out all fields.</p>";
    //If any field is empty, echo "Be sure to fill out all fields."
  } else if (!password_verify($oldPassword, $getRes["password"])) {
    echo "<p>The old password you entered does not match the one in our records.</p>";
    //If the old password isn't the one in the database, echo "The old password you entered does not match the one in our records."
  } else if ($newPassword != $newPasswordConfirm) {
    echo "<p>The new password confirmation does not match the new password you entered.</p>";
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
require "footer.php";
