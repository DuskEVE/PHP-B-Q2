<?php
session_start();
include_once "./db.php";
$userCheck = $User->count(['user'=>$_POST['user']]);
$passwordCheck = $User->count(['user'=>$_POST['user'], 'password'=>$_POST['password']]);

if($userCheck == 0) echo "查無帳號";
else if($passwordCheck == 0) echo "密碼錯誤";
else{
    echo 1;
    $_SESSION['user'] = $_POST['user'];
}
?>