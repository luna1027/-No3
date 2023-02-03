<?php
include_once "./base.php";

$movie = $Movie->find($_POST['id']);

// $movie['sh'] = ($movie['sh'] == 1) ? 0 : 1;
$movie['sh'] = ($movie['sh'] + 1) % 2;

$Movie->save($movie);
?>