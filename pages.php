<?php
$title = "Pages";
$position = "p5";
require "header.php";
// Adding header, setting title, position used for highlighting in header
require "session-auth.php";
//checks if user is allowed to go here
?>
<a href='edit-page.php?id=-1'>Create a new page</a>
<div class="grid">
  <div>Page Title</div>
  <div>Edit Page</div>
  <div>Delete Page</div>
  <?php
  require "db.php";
  $sql = "SELECT pageId, title FROM cms_pages";
  $cmd = $db->prepare($sql);
  $cmd->execute();
  $arr = $cmd->fetchAll();
  //gets an array of Ids and titles from cms_pages
  foreach ($arr as $page) {
    echo "<div>" . $page['title'] . "</div>";
    echo "<div><a href=edit-page.php?id=" . $page['pageId'] . ">Edit</a></div>";
    echo '<div><a onclick="return confirmDelete(\'' . $page["title"] . '\');"';
    echo "href=delete-page.php?user=" . $page['pageId'] . ">Delete</a></div>";
  } //echo all the usernames plus edit and delete links with appropriate variables.
  $db = null;
  ?>
</div>
<script>
  function confirmDelete(title) {
    return confirm(`Are you sure you want to delete the ${title} page?`);
    //custom confirm with current pageId
  }
</script>
<?php
require "footer.php";
// Adding footer
?>