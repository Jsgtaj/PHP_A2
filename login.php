<?php
$title = "Login";
$position = "p1";
require "header.php";
// Adding header, setting title, position used for highlighting in header
?>
<h1>Log in below!</h1>
<form action="login-validate.php" method="POST">
  <fieldset>
    <legend>User Info:</legend>
    <label for="username">Username:</label>
    <input name="username" type="text" placeholder="user@domain.com" required>
    <label for="password">Password:</label>
    <input name="password" type="password" placeholder="password" required>
    <button type="submit">Log in</button>
    <!--fields to be posted upon login-->
  </fieldset>
</form>
<?php
require "footer.php";
// Adding footer
?>