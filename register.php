<?php
$title = "Register";
require "header.php";
?>
<h1>Sign up below!</h1>
<form action="register-save.php" method="POST">
  <fieldset>
    <legend>User Info:</legend>
    <label for="username">Username:</label>
    <input name="username" type="email" placeholder="Username" required>
    <label for="password">Password:</label>
    <input name="password" type="password" placeholder="Password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
    <label for="passwordConfirm">Confirm your Password:</label>
    <input name="passwordConfirm" type="password" placeholder="Confirm Password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
    <p>Password needs at least one number, one lowercase letter,<br> one uppercase letter, and has to be at least 8 characters long.</p>
    <button type="submit">Sign up</button>
  </fieldset>
</form>
</body>
<?php
require "footer.php";
?>