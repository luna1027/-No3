<?php
include_once "./base.php";

if (isset($_POST['id'])) {
    // prr($_POST);
    $row = $Movie->find($_POST['id']);
    $row['ondate'];
    $ondate = date($row['ondate']);
    $today = date("Y-n-j");
    // $days = "";
    for ($i = 0; $i <= 2; $i++) {
        if (strtotime("$ondate +$i days") >= strtotime($today)) {
            // $days = date("Y-n-j-l", strtotime("$ondate +$i days"));
            $tt = date("Y-n-j", strtotime("$ondate +$i days"));
            $str = date("n月j日 l", strtotime("$ondate +$i days"));
            echo "<option value='$tt'>$str</option>";
        }
    }
    // echo json_encode($days);
}
