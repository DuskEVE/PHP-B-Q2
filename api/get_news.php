<?php
include_once "./db.php";

$data = $News->search(['id'=>$_GET['id']]);
echo nl2br($data['news']);
?>