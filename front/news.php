
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
                <span><a class="like-btn" style="text-decoration: none;">讚</a></span>
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
</script>