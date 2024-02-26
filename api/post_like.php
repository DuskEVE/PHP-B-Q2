<?php
include_once "./db.php";
$post = $Post->search(['id'=>$_GET['id']]);
if($PostLike->count(['post_id'=>$_GET['id'], 'user'=>$_GET['user']])){
    $PostLike->delete(['post_id'=>$_GET['id'], 'user'=>$_GET['user']]);
    $post['like_count'] -= 1;
    echo json_encode(['text'=>'讚', 'likeCount'=>$post['like_count']]);
}
else{
    $PostLike->update(['post_id'=>$_GET['id'], 'user'=>$_GET['user']]);
    $post['like_count'] += 1;
    echo json_encode(['text'=>'收回讚', 'likeCount'=>$post['like_count']]);
}
$Post->update($post);
?>