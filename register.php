<?php
$title = "Home";
require "header.php";
?>
<h1>Sign up below!</h1>
<form action="register-save.php" method="POST">
  <fieldset>
    <legend>User Info:</legend>
    <label for="username">Username:</label>
    <input name="username" type="text" placeholder="Username">
    <label for="password">Password:</label>
    <input name="password" type="password" placeholder="Password">
    <label for="passwordConfirm">Confirm your Password:</label>
    <input name="passwordConfirm" type="password" placeholder="Confirm Password">
  </fieldset>
</form>
</body>
<?php
require "footer.php";
?>