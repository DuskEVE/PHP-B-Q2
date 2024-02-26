<?php
include_once "./db.php";
if($PostLike->count(['post_id'=>$_GET['id'], 'user'=>$_GET['user']])){
    echo "讚";
    $PostLike->delete(['post_id'=>$_GET['id'], 'user'=>$_GET['user']]);
}
else{
    echo "收回讚";
    $PostLike->update(['post_id'=>$_GET['id'], 'user'=>$_GET['user']]);
}
?>