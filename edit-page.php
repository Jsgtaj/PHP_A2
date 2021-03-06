<?php
$title = "Edit Page";
$position = "p5";
require "header.php";
// Adding header, setting title, position used for highlighting in header
require "session-auth.php";
//checks if user is allowed to go here

$pageId = $_GET["id"];
if ($pageId != -1) {
  //If the page is not new, fetch page data
  require "db.php";
  $sql = "SELECT title, content FROM cms_pages WHERE :pageId = `pageId`";
  $cmd = $db->prepare($sql);
  $cmd->bindParam(":pageId", $pageId, PDO::PARAM_INT);
  $cmd->execute();
  $result = $cmd->fetch();
  if (empty($result)) {
    // If the page doesn't exist, link back to pages list
    header("location:pages.php");
  }
  //Display this page's title in h1
  echo '<h1>Edit ' . $result["title"] . ' Page</h1>';
} else {
  //If page is new, display a new title h1
  echo '<h1>Create a New Page</h1>';
}
echo '<form action="edit-page-save.php?id=' .  $pageId . '" method="POST">';
?>
<fieldset>
  <legend>Page Info:</legend>
  <label for="title">Page Title:</label>
  <input <?php if ($pageId != -1) {
            //If the page exists already, echo title
            echo 'value="' . $result["title"] . '"';
          } ?> name="title" type="text" maxlength="50" placeholder="your page's title" required>
  <label for="content">Page Content:</label>
  <textarea name="content" rows="8" cols="80" maxlength="4095" placeholder="your page's content" style="resize:none" required>
<?php if ($pageId != -1) {
  //If the page exists already, echo content
  echo $result["content"];
} ?></textarea>
  <button type="submit"><?php
                        if ($pageId != -1) {
                          echo "Update";
                        } else {
                          echo "Create Page";
                        }
                        ?></button>
  <!--fields to be posted upon registration-->
</fieldset>
</form>
<?php
$db = null;
//Close database connection
require "footer.php";
//Header and footer are displayed if an error message keeps the user from continuing
