<?php
include_once "./db.php";

if(isset($_POST['id'])){
    foreach($_POST['id'] as $id){
        if(isset($_POST['del']) && in_array($id, $_POST['del'])) $News->delete(['id'=>$id]);
        else{
            $news = $News->search(['id'=>$id]);
            $news['display'] = (isset($_POST['display']) && in_array($id, $_POST['display']))? 1:0;
            $News->update($news);
        }
    }
}
header("location:../admin.php?do=news");

?>