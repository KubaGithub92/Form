<?php
require_once 'DBBlackbox.php';
require_once 'Album.php';
require_once 'Session.php';


$album = new Album;

Session::instance();


if (isset($_SESSION['success_message'])) {
  $success_message = $_SESSION['success_message'];
  unset($_SESSION['success_message']);
}

if (isset($_SESSION['error_message'])) {
  $error_message = $_SESSION['error_message'];
  unset($_SESSION['error_message']);
}

if (isset($_SESSION['old_data'])) {
  $old_data = $_SESSION['old_data'];
  unset($_SESSION['old_data']);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create a album</title>
</head>

<style>
  .error-message {
    background-color: pink;
    padding: 1em;
    border: 1px solid red;
  }

  .success-message {
    background-color: lightgreen;
    padding: 1em;
    border: 1px solid green;
  }
</style>

<body>

  <?php if (!empty($success_message)) : ?>
    <div class="success-message">
      <?= $success_message ?>
    </div>
  <?php endif; ?>

  <?php if (!empty($error_message)) : ?>
    <div class="error-message">
      <?= $error_message ?>
    </div>
  <?php endif; ?>

  <form action="save.php" method="post">

    <!-- display the form prefilled with entity data -->

    Name:<br>
    <input type="text" name="name" value="<?= htmlspecialchars((string)$album->name) ?>"><br>
    <br>

    Author:<br>
    <input type="text" name="author" value="<?= htmlspecialchars((string)$album->author) ?>"><br>
    <br>

    Number of songs:<br>
    <input type="number" name="num_songs" value="<?= htmlspecialchars((string)$album->num_songs) ?>"> seconds<br>
    <br>


    <button type="submit">Save</button>

  </form>

</body>

</html>