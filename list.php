<?php
//retrieve songs from the database
require_once 'DBBlackbox.php';
require_once 'Album.php';

session_start();

// if you select song from the database, create Song object for the song
$albums = select(null, 0, "Album")
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>List of your albums</title>
</head>

<body>

  <!-- display list of songs -->
  <a href="edit.php">Add new album</a>

  <ul>
    <?php foreach ($albums as $album) :   ?>

      <li>
        <?= $album->name ?> by
        <?= $album->author ?>

        <a href="edit.php?id=<?= $album->id ?>">EDIT</a>
      </li>
    <?php endforeach; ?>
  </ul>

</body>

</html>