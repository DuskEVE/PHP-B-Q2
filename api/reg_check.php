<?php
include_once "./db.php";
echo $User->count(['user'=>$_POST['user']]);
?>