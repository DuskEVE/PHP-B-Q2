<?php
include_once "./db.php";
$title = $Que->search(['id'=>$_POST['subject_id']]);
$subject = $Que->search(['id'=>$_POST['id']]);
$title['vote'] += 1;
$subject['vote'] += 1;
$Que->update($title);
$Que->update($subject);

header("location:../index.php?do=result&id={$_POST['subject_id']}");
?>