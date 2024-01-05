
<style>
    .types, .news-list{
        display: inline-block;
        vertical-align: top;
    }
    .news-list{
        width: 600px;
    }
    .types > a{
        display: block;
    }
</style>

<div class="nav">目前位置:首頁 > 分類網誌 > <span class="type">健康新知</span></div>
<fieldset class="types">
    <legend>分類網誌</legend>

    <a class="type-item" data-id="1">健康新知</a>
    <a class="type-item" data-id="2">菸害防治</a>
    <a class="type-item" data-id="3">癌症防治</a>
    <a class="type-item" data-id="4">慢性病防治</a>
</fieldset>

<fieldset class="news-list">
    <legend>文章列表</legend>

    <div class="list-items" style="display: none;"></div>
    <div class="article"></div>
</fieldset>

<script>
    getList(1);
    function getList(type){
        $.get('./api/get_list.php', {type}, (respond) => {
            $('.list-items').html(respond);
            // $('.list-items, .article').toggle();
            $('.list-items').show();
            $('.article').hide();
        });
    }

    function getNews(id){
        $.get('./api/get_news.php', {id}, (respond) => {
            $('.article').html(respond);
            // $('.list-items, .article').toggle();
            $('.article').show();
            $('.list-items').hide();
        })
    }

    $('.type-item').on('click', (event) => {
        $('.type').text($(event.target).text());
        let type = $(event.target).data('id');
        getList(type);
    });

</script>