<?php
include_once "./db.php";

if(isset($_POST['del'])){
    foreach($_POST['del'] as $id){
        $User->delete(['id'=>$id]);
    }
}

header("location:../admin.php?do=account");
?>