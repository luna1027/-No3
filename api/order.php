<?php
include_once "./base.php";

if (isset($_POST['id'])) {
    $row = $Movie->find($_POST['id']);
    json_encode($row);
}
?>