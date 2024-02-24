<?php
include_once "./db.php";
if($User->count(['user'=>$_POST['user']])) echo "帳號重複";
else{
    echo 1;
    $User->update($_POST);
    $_SESSION['user'] = $_POST['user'];
}
?>