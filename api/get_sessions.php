<?php
include_once "./base.php";

$movie = $Movie->find($_GET['id']);
$date = $_GET['date'];
$hr = date("G");
$start = ($date == date("Y-n-d") && $hr >= 14) ? (floor($hr / 2) - 5) : 1;

for ($i = $start; $i <= 5; $i++) {
    echo "<option value='{$Movie->session[$i]}'>";
    echo $Movie->session[$i];
    echo "剩餘座位 20";
    echo "</option>";
}
