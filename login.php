<?php
$title = "Login";
require "header.php";
?>
<h1>Log in below!</h1>
<form action="login-validate.php" method="POST">
  <fieldset>
    <legend>User Info:</legend>
    <label for="username">Username:</label>
    <input name="username" type="text" placeholder="Username" required>
    <label for="password">Password:</label>
    <input name="password" type="password" placeholder="Password" required>
    <button type="submit">Log in</button>
  </fieldset>
</form>
</body>
<?php
require "footer.php";
?>