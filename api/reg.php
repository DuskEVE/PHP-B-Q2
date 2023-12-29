<?php
session_start();
include_once "./db.php";

$account = ['user'=>$_POST['user'], 'password'=>$_POST['password'], 'email'=>$_POST['email']];
$User->update($account);
$_SESSION['user'] = $_POST['user'];
?>