<?php
require_once 'DBBlackbox.php';
require_once 'Album.php';
require_once 'Session.php';

session_start();



// find the ID of the album we want to edit in the request
$id = $_GET['id'] ?? null;

// declare that everything is OK
$valid = true;

if (empty($_POST['name'])) {
  // VALIDATION FAILED
  $valid = false;
}

if (!empty($_POST['num_songs'] && !is_numeric($_POST['num_songs']))) {
  $valid = false;
}

// Validation failed
if (!$valid) {
  Session::instance()->set('error_message', 'Something went wrong');
  // $_SESSION['error_message'] = 'Something went wrong';
  $_SESSION['old_data'] = $_POST;
  var_dump($_SESSION['old_data']);
  header('Location: edit.php');

  // ends execution here
  exit();
}


if ($id) {
  // somehow retrieve existing data from some storage
  $album = find($id, 'Album');
} else {
  // prepare empty data
  $album = new Album;
}

// Fill the object with the properties
$album->name =   $_POST['name']   ?? $album->name;
$album->author = $_POST['author'] ?? $album->author;
$album->num_songs = $_POST['num_songs'] ?? $album->num_songs;

// if ID exists update, if it doesn't exist create id
if ($id) {
  update($id, $album);
} else {
  $id = insert($album);
}

Session::instance()->set('success_message', 'Album saved successfully');
// $_SESSION['success_message'] = 'Song saved succesfully';

header('Location: edit.php?id=' . $id);
