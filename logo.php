<?php
$title = "Logo";
$position = "p4";
require "header.php";
// Adding header, setting title, position used for highlighting in header
require "session-auth.php";
//checks if user is allowed to go here
?>
<h1>Upload a New Logo</h1>
<p>Current logo:</p>
<img src=<?php
          if (file_exists("img/php_web_builder_logo.png")) {
            echo "img/php_web_builder_logo.png" . "?" . time();
          } else {
            echo "img/php_web_builder_logo.jpeg" . "?" . time();
          } //Adding time to end of images to force refresh when updated
          ?> alt="Current Logo">
<form action="logo-upload.php" method="POST" enctype="multipart/form-data">
  <fieldset>
    <legend>Upload logo:</legend>
    <label for="upload">Choose a New Logo</label>
    <input type="file" name=upload id=upload>
    <button>Upload</button>
  </fieldset>
</form>
<script>
  //script to update 'button's' text content when the file is picked.
  const file = document.querySelector("input[type='file']");
  const uploadButton = document.querySelector("label[for='upload']");

  function nameChange() {
    uploadButton.textContent = `File: ${file.files[0].name}`;
  }
  file.addEventListener("change", nameChange);
</script>
<?php
require "footer.php";
// Adding footer
?>