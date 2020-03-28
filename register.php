<?php
$title = "Register";
$position = "p2";
require "header.php";
// Adding header, setting title, position used for highlighting in header
?>
<h1>Sign up below!</h1>
<form action="register-save.php" method="POST">
  <fieldset>
    <legend>User Info:</legend>
    <label for="username">Username:</label>
    <input name="username" type="email" placeholder="user@domain.com" required>
    <label for="password">Password:</label>
    <input name="password" type="password" placeholder="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
    <label for="passwordConfirm">Confirm your Password:</label>
    <input name="passwordConfirm" type="password" placeholder="confirm password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
    <p>Passwords need at least one number, one lowercase letter,<br>
      one uppercase letter, and have to be at least 8 characters long.</p>
    <button type="submit">Sign up</button>
    <!--fields to be posted upon registration-->
  </fieldset>
</form>
<?php
require "footer.php";
// Adding footer
?>