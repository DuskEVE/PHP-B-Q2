<style>
.content-pop{
    position: absolute;
    width: 300px;
    height: 300px;
    background-color: rgba(50, 50, 50, 0.8);
    overflow: auto;
    z-index: 10;
}
</style>

<fieldset>
    <legend>目前位置:首頁>人氣文章區</legend>
    <div class="container">
        <div style="display: flex; ">
            <div style="width: 30%;">標題</div>
            <div style="width: 50%;">內容</div>
            <div style="width: 18%;">人氣</div>
        </div>
        <?php
        $posts = $Post->searchAll([], "order by `like_count` desc");
        foreach($posts as $post){
            $preview = mb_substr($post['text'], 0, 10)."...";
        ?>
        <div style="display: flex;">
            <div class="title" style="width: 30%; background-color: lightgray; margin:3px">
                <?=$post['title']?>
            </div>
            <div class="content" style="width: 50%; margin:3px">
                <div class="content-preview"><?=$preview?></div>
                <div class="content-pop" style="display: none;">
                    <h3 style="color: lightblue;"><?=$post['title']?></h3>
                    <pre style="color: white;"><?=$post['text']?></pre>
                </div>
            </div>
            <div class="option" style="width: 18%; margin:3px; display:flex; align-items: center;">
                <span>
                    <?php
                    echo "<span class='likecount-{$post['id']}'>{$post['like_count']}</span> 個人說<img src='./icon/02B03.jpg' style='width: 16px'>";
                    if(isset($_SESSION['user'])){
                        if($PostLike->count(['post_id'=>$post['id'], 'user'=>$_SESSION['user']])){
                            echo "-<a class='like-btn' style='text-decoration: none;' data-id='{$post['id']}' data-user='{$_SESSION['user']}'>收回讚</a>";
                        }
                        else echo "-<a class='like-btn' style='text-decoration: none;' data-id='{$post['id']}' data-user='{$_SESSION['user']}'>讚</a>";
                    }
                    ?>
                </span>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
</fieldset>

<script>
    $('.content-preview').on('mouseover', (event) => {
        $('.content-pop').hide();
        $(event.target).siblings().show();
    });
    $('.like-btn').on('click', (event) => {
        let id = $(event.target).data('id');
        let user = $(event.target).data('user');

        $.get('./api/post_like.php', {id, user}, (response) => {
            response = JSON.parse(response);
            console.log(response);
            $(event.target).text(response.text);
            $(`.likecount-${id}`).text(response.likeCount);
        });
    });
</script>