<?php
include_once "./db.php";

if($User->count($_POST)){
    $user = $User->search($_POST);
    if($user['user'] == 'admin') echo "admin";
    else echo "user";

    $_SESSION['user'] = $user['user'];
}
else if($User->search(['user'=>$_POST['user']]) == 1) echo "密碼錯誤";
else echo "查無帳號";
?>