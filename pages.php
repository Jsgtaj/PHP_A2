<?php
$title = "Pages";
$position = "p5";
require "header.php";
// Adding header, setting title, position used for highlighting in header
require "session-auth.php";
//checks if user is allowed to go here
require "db.php";
$sql = "SELECT pageId, title FROM cms_pages";
$cmd = $db->prepare($sql);
$cmd->execute();
$arr = $cmd->fetchAll();
//gets an array of Ids and titles from cms_pages
if (!empty($arr)) {
  //If pages exist
  echo '<h1>Your Site\'s Pages</h1>';
  echo '<div class="grid">';
  echo '<div>Page Title</div>';
  echo '<div>Edit Page</div>';
  echo '<div>Delete Page</div>';
  foreach ($arr as $page) {
    echo "<div>" . $page['title'] . "</div>";
    echo "<div><a href=edit-page.php?id=" . $page['pageId'] . ">Edit</a></div>";
    echo '<div><a onclick="return confirmDelete(\'' . $page["title"] . '\');"';
    echo "href=delete-page.php?user=" . $page['pageId'] . ">Delete</a></div>";
  } //echo all the page titles plus edit and delete links with appropriate variables.
  echo '</div>';
} else {
  //If no pages exist
  echo '<h1>Your site has no pages. Create one by clicking the link below.</h1>';
}
$db = null;
?>

<a href='edit-page.php?id=-1'>Create a new page</a>
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