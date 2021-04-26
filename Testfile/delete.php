<?php

include('db.php');

$id = $_GET['id'];

$sql = "DELETE FROM courses WHERE id = '$id'";
$val = $con->query($sql);

if ($val) {
    header('location: dashboard.php');
}

?>