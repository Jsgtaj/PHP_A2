<?php
$title = "Login";
require "header.php";
// Adding header, setting title
?>
<h1>Log in below!</h1>
<form action="login-validate.php" method="POST">
  <fieldset>
    <legend>User Info:</legend>
    <label for="username">Username:</label>
    <input name="username" type="text" placeholder="username" required>
    <label for="password">Password:</label>
    <input name="password" type="password" placeholder="password" required>
    <button type="submit">Log in</button>
    <!--fields to be posted upon login-->
  </fieldset>
</form>
</body>
<?php
require "footer.php";
// Adding footer
?>