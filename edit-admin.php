<?php
$title = "Edit Administrator";
$position = "p6";
require "header.php";
// Adding header, setting title, position used for highlighting in header
require "session-auth.php";
//checks if user is allowed to go here
$userId = $_GET["id"];
require "db.php";
$sql = "SELECT username FROM cms_users WHERE :userId = `userId`";
$cmd = $db->prepare($sql);
$cmd->bindParam(":userId", $userId, PDO::PARAM_INT);
$cmd->execute();
$result = $cmd->fetch();
//Getting info about user for display here
if (empty($result)) {
  // If the admin doesn't exist, link back to header
  header("location:admins.php");
} //else, display edit form
?>
<h1>Edit <?php echo $result["username"] ?>'s Info</h1>
<form action="edit-admin-validate.php?id=<?php echo $userId ?>" method="POST">
  <!-- echo current id for GET purposes on the validate page-->
  <fieldset>
    <legend>User Info:</legend>
    <label for="username">Username:</label>
    <input name="username" type="email" placeholder="user@domain.com" value='<?php echo $result["username"] ?>' required>
    <label for="oldPassword">Old Password:</label>
    <input name="oldPassword" type="password" placeholder="old password" autocomplete="new-password" required>
    <label for="password">New Password:</label>
    <input name="password" type="password" placeholder="new password" autocomplete="new-password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
    <label for="passwordConfirm">Confirm New Password:</label>
    <input name="passwordConfirm" type="password" placeholder="confirm new password" autocomplete="new-password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
    <p>Passwords need at least one number, one lowercase letter,<br>
      one uppercase letter, and have to be at least 8 characters long.</p>
    <button type="submit">Update</button>
    <!--fields to be posted upon registration-->
  </fieldset>
</form>
<?php
$db = null;
//Close database connection
require "footer.php";
//Header and footer are displayed if an error message keeps the user from continuing
