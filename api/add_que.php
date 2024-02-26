<?php
include_once "./db.php";
$title['text'] = $_POST['title'];
$title['subject_id'] = 0;
$title['display'] = 1;
$title['vote'] = 0;
$Que->update($title);

$id = $Que->search($title)['id'];
foreach($_POST['subject'] as $text){
    $subject['text'] = $text;
    $subject['subject_id'] = $id;
    $subject['display'] = 1;
    $subject['vote'] = 0;
    $Que->update($subject);
}

?>