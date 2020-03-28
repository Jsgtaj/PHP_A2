<?php
$title = "Administrators";
$position = "p6";
require "header.php";
// Adding header, setting title, position used for highlighting in header
require "session-auth.php";
//checks if user is allowed to go here
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
    //gets an array of all data from cms_users
    foreach ($arr as $admin) {
      echo "</tr><td>" . $admin['username'] . "</td>";
      echo "<td><a href=edit-admin.php?id=" . $admin['userId'] . ">Edit</a></td>";
      echo '<td><a onclick="return confirmDelete(\'' . $admin["username"] . '\',\'';
      echo $admin['userId'] . '\',\'' . $_SESSION["userId"] . '\');"';
      echo "href=delete-admin.php?user=" . $admin['userId'] . ">Delete</a><tr>";
    } //echo all the usernames plus edit and delete links with appropriate variables.
    $db = null;
    ?>
  </tbody>
</table>
<script>
  function confirmDelete(username, currentId, sessionId) {
    if (currentId == sessionId) {
      alert(`You cannot delete the current user.`);
      return false;
      //if you are the user you want to delete, give an alert and prevent that from happening
    } else {
      return confirm(`Are you sure you want to delete ${username}?`);
      //if you want to delete another admin, show confirmation pop-up
    }
  }
</script>
<?php
require "footer.php";
// Adding footer
?>