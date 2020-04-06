<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/styles.css">
  <link href="https://fonts.googleapis.com/css?family=Inter&display=swap" rel="stylesheet">
  <title>General Error</title>
</head>

<body>
  <?php
  $error = $_GET["error"];
  //Get error number
  if (!empty($error)) {
    //If number is specified, echo error message with number
    echo "<p style='font-size:30px; margin:auto;  margin-bottom:20px'>Error number <b>" . $error . "</b> occurred while connecting to the database.</p><br>";
  } else {
    //If no number is specified, echo u nknown error message
    echo "<p style='font-size:30px; margin:auto;  margin-bottom:20px'>An unknown error occurred while connecting to the database.</p><br>";
  }
  echo "<a style='font-size:26px;margin:auto; margin-top:20px' href='index.php?id=1'>Try again</a>";
  //Echo link to try again
  ?>
</body>

</html>