<?php
include_once "./db.php";

$datas = $News->searchAll(['type'=>$_GET['type']]);
foreach($datas as $data){
    $element = "<a href='Javascript:getNews({$data['id']})' style='display:block;'>{$data['title']}</a>";
    echo $element;
}
?>