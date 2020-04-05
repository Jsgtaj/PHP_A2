<?php
$title = "Logo";
$position = "p4";
require "header.php";
// Adding header, setting title, position used for highlighting in header
require "session-auth.php";
//checks if user is allowed to go here
?>
<h1>Upload a new logo</h1>
<p>Current logo:</p>
<img src=<?php
          if (file_exists("img/php_web_builder_logo.png")) {
            echo "img/php_web_builder_logo.png";
          } else {
            echo "img/php_web_builder_logo.jpeg";
          }
          ?> alt="Current Logo">
<form action="logo-upload.php" method="POST" enctype="multipart/form-data">
  <fieldset>
    <legend>Upload logo:</legend>
    <label for="upload">Choose a new logo:</label>
    <input type="file" name=upload>
    <button>Upload</button>
  </fieldset>
</form>
<?php
require "footer.php";
// Adding footer
?>