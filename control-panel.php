<?php
$title = "Control Panel";
$position = "p2";
require "header.php";
// Adding header, setting title, position used for highlighting in header
?>
<section>
  <a href="admins.php">
    <h2>Administrators</h2>
  </a>
  <p>Edit or delete administrators.</p>
</section>
<section>
  <a href="pages.php">
    <h2>Pages</h2>
  </a>
  <p>Manage public pages on your site.</p>
</section>
<section>
  <a href="logo.php">
    <h2>Logo</h2>
  </a>
  <p>Modify your site's logo.</p>
</section>
<section>
  <a href="control-panel-leave.php">
    <h2>Public Site</h2>
  </a>
  <p>View your public site's pages.</p>
</section>
<?php
require "footer.php";
// Adding footer
?>