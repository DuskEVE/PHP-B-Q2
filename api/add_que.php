<?php
include_once "./db.php";

if(isset($_POST['subject'])){
    $Que->update(['text'=>$_POST['subject'], 'subject_id'=>0, 'vote'=>0]);
}

if(isset($_POST['option'])){
    $id = $Que->search(['text'=>$_POST['subject']])['id'];
    foreach($_POST['option'] as $option){
        $Que->update(['text'=>$option, 'subject_id'=>$id, 'vote'=>0]);
    }
}

header("location:../admin.php?do=que");
?>