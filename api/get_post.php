<?php
include_once "./db.php";
echo json_encode($Post->searchAll($_GET));
?>