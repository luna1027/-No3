<?php
include_once "./base.php";

$date = date("Y-m-d");
$ondate = date("Y-m-d", strtotime("-2 days"));
$rows = $Movie->all(['sh' => 1,], " && `ondate` BETWEEN '$ondate' AND '$date' ORDER BY `rank`");

foreach ($rows as $row) {
    // prr($rows);
    echo "<option value='{$row['id']}' data-ondate='{$row['ondate']}'>{$row['name']}</option>";
}
?>