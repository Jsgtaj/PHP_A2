<?php
$title = "Login";
$position = "p1";
require "header.php";
require "session-auth-reverse.php";
// Adding header, setting title, position used for highlighting in header
// If someone's already logged in, send them to the control panel
?>
<h1>Log In Below!</h1>
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