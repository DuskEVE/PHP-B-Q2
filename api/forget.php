<?php
include_once "./db.php";
if($User->count($_POST)){
    $user = $User->search($_POST);
    echo "您的密碼為:{$user['password']}";
}
else echo "查無此資料";

?>