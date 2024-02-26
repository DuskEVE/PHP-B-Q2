<?php
include_once "./db.php";
if(isset($_POST['id'])){
    foreach($_POST['id'] as $index=>$id){
        if(isset($_POST['del']) && in_array($id, $_POST['del'])){
            $Post->delete(['id'=>$id]);
            continue;
        }
        $post['id'] = $id;
        $post['display'] = 0;
        if(isset($_POST['display']) && in_array($id, $_POST['display'])) $post['display'] = 1;

        $Post->update($post);
    }
}
header("location:../admin.php?do=news");
?>