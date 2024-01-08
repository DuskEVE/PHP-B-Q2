<?php
include_once "./db.php";

$option = $Que->search(['id'=>$_POST['option']]);
$option['vote'] += 1;
$Que->update($option);

$que = $Que->search(['id'=>$option['subject_id']]);
$que['vote'] += 1;
$Que->update($que);

header("location: ../index.php?do=result&id={$option['subject_id']}")
?>