<?php
include_once "./db.php";

if(isset($_POST['id'])){
    foreach($_POST['id'] as $id){
        $User->delete(['id'=>$id]);
    }
}

header("location:../admin.php?do=account");
?>