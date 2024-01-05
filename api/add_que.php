<?php
include_once "./db.php";

if(isset($_POST['subject'])){
    $Que->update(['text'=>$_POST['subject'], 'subject_id'=>0, 'vote'=>0]);
}

if(isset($_POST['option']))

?>