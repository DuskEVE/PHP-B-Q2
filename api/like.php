<?php
session_start();
include_once "./db.php";

$log = $Log->searchAll(['news_id'=>$_POST['news_id'], 'user'=>$_SESSION['user']]);
$news = $News->search(['id'=>$_POST['news_id']]);
if(count($log) > 0){
    $Log->delete(['id'=>$log[0]['id']]);
    $news['good'] -= 1;
    $News->update($news);
}
else{
    $Log->update(['news_id'=>$_POST['news_id'], 'user'=>$_SESSION['user']]);
    $news['good'] += 1;
    $News->update($news);
}

?>