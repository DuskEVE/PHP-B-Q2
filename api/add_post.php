<?php
include_once "./db.php";
$_POST['display'] = 1;
$Post->update($_POST);
header("location:../admin.php?do=news");
?>