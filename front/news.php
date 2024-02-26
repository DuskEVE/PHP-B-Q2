
<fieldset>
    <legend>目前位置:首頁>最新文章區</legend>
    <div class="container">
        <div style="display: flex; text-align: center;">
            <div style="width: 30%;">標題</div>
            <div style="width: 50%;">內容</div>
        </div>
        <?php
        $posts = $Post->searchAll();
        foreach($posts as $post){
            $preview = mb_substr($post['text'], 0, 10)."...";
        ?>
        <div style="display: flex;">
            <div class="title" style="width: 30%; background-color: lightgray; margin:3px">
                <?=$post['title']?>
            </div>
            <div class="content" style="width: 50%; margin:3px">
                <div class="content-preview"><?=$preview?></div>
                <div class="content-full">
                    <pre style="display: none;"><?=$post['text']?></pre>
                </div>
            </div>
            <div class="option" style="width: 18%; margin:3px; display:flex; justify-content: center; align-items: center;">
                <span>
                    <?php
                    if(isset($_SESSION['user'])){
                        if($PostLike->count(['post_id'=>$post['id'], 'user'=>$_SESSION['user']])){
                            echo "<a class='like-btn' style='text-decoration: none;' data-id='{$post['id']}' data-user='{$_SESSION['user']}'>收回讚</a>";
                        }
                        else echo "<a class='like-btn' style='text-decoration: none;' data-id='{$post['id']}' data-user='{$_SESSION['user']}'>讚</a>";
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
    $('.content-preview').on('click', (event) => {
        $(event.target).hide();
        $(event.target).siblings('.content-full').children().show();
    });
    $('.content-full').on('click', (event) => {
        $(event.target).hide();
        $(event.target).parent().siblings().show();
    });
    $('.like-btn').on('click', (event) => {
        let id = $(event.target).data('id');
        let user = $(event.target).data('user');
        $.get('./api/post_like.php', {id, user}, (response) => {
            $(event.target).text(response);
        });
    });
</script>