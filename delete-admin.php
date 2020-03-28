<?php
session_start();
require "session-auth.php";
//checks if user is allowed to go here
$adminId = $_GET["user"];
require "db.php";
$sql = "DELETE FROM `cms_users` WHERE `userId` = :adminId";
$cmd = $db->prepare($sql);
$cmd->bindParam(":adminId", $adminId, PDO::PARAM_INT);
$cmd->execute();
//Deletes the entry with the assocciated id
$db = null;
header("location:admins.php");
//Links back to admins
