<?php
$title = "Administrators";
$position = "p6";
require "header.php";
// Adding header, setting title, position used for highlighting in header
?>
<table>
  <thead>
    <tr>
      <th scope="col">Admin</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php
    require "db.php";
    $sql = "SELECT * FROM cms_users";
    $cmd = $db->prepare($sql);
    $cmd->execute();
    $arr = $cmd->fetchAll();
    foreach ($arr as $admin) {
      echo "</tr><td>" . $admin['username'] . "</td>";
      echo "<td><a href=edit-admin.php?id=" . $admin['userId'] . ">Edit</a></td>";
      echo '<td><a onclick="return confirmDelete(\'' . $admin["username"] . '\');"';
      echo "href=delete-dmin.php?user=" . $admin['userId'] . ">Delete</a><tr>";
    }
    $db = null;
    ?>
  </tbody>
</table>
<script>
  function confirmDelete(admin) {
    return confirm(`Are you sure you want to delete ${admin}?`);
  }
</script>
<?php
require "footer.php";
// Adding footer
?>