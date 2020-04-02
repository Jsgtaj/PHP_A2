<?php
require "header.php";
echo "<a href='register.php'>Back to regisration</a><br>";
//Link back to registration if user has error

$apiPostArray = array();
$apiPostArray["secret"] = "6LcoOeYUAAAAALERx6nzUAeGQ4p9-dk6AbZFlxye";
$apiPostArray["response"] = $_POST["g-recaptcha-response"];
$apiRequest = curl_init();
curl_setopt($apiRequest, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
curl_setopt($apiRequest, CURLOPT_RETURNTRANSFER, true);
curl_setopt($apiRequest, CURLOPT_POST, true);
curl_setopt($apiRequest, CURLOPT_POSTFIELDS, $apiPostArray);
$apiResult = curl_exec($apiRequest);
curl_close($apiRequest);
$resultArray = json_decode($apiResult, true);
// POSTing recapcha verification to google

$user = $_POST["username"];
$pass = $_POST["password"];
$passConf = $_POST["passwordConfirm"];
//Getting the posted variables

if (empty($user) || empty($pass) || empty($passConf)) {
  echo "<p>Be sure to fill out all fields.</p>";
  //If any field is empty, echo "Be sure to fill out all fields."
} else if ($pass != $passConf) {
  echo "<p>Passwords do not match.</p>";
  //If passwords aren't the same, echo "Passwords do not match."
} else if ($resultArray["success"] == false) {
  echo "<p>The recaptcha verification wasn't successful.</p>";
  //If recaptcha wasn't correct, echo "The recaptcha verification wasn't successful."
} else {
  require "db.php";
  $sql = "SELECT username FROM cms_users WHERE `username` = :user";
  $check = $db->prepare($sql);
  $check->bindParam(":user", $user, PDO::PARAM_STR, 50);
  $check->execute();
  $test = $check->fetch();
  //get record if username entered is in the database
  if (!empty($test)) {
    echo "<p>Username already exists.</p>";
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
require "footer.php";
//Header and footer are displayed if an error message keeps the user from continuing
