
<div style="margin: 10px;">
    目前位置:首頁>分類網誌<span class="location">>健康新知</span>
</div>

<div class="container" style="padding: 10px; display: flex">
    <fieldset style="width: 20%; height:100px">
        <legend>分類網誌</legend>
        <?php
        $types = $Type->searchAll();
        foreach($types as $type){
            echo "<div><a class='post-menus' data-id='{$type['id']}' style='text-decoration:none;'>{$type['type']}</a></div>";
        }
        ?>
    </fieldset>
    <fieldset style="width: 70%;">
        <legend>文章列表</legend>
        <div class="post-list">

        </div>
        <div class="post-content">

        </div>
    </fieldset>
</div>

<script>
    const getList = (typeId) => {
        $.get('./api/get_post.php', {type_id: typeId}, (response) => {
            response = JSON.parse(response);
            let arr = Array.from(response);

            $('.post-list').empty();
            $('.post-content').empty();

            arr.forEach(element => {
                let list = `
                <div><a class='lists' style='text-decoration:none;' data-id='${element['id']}'>${element['title']}</a></div>
                `;
                let content = `
                <pre class='contents content-${element['id']}' style='display:none;'>${element['text']}</pre>
                `;

                $('.post-list').append(list);
                $('.post-content').append(content);
            });

            $('.lists').on('click', (event) => {
                let id = $(event.target).data('id');
                $('.lists').hide();
                $('.contents').hide();
                $(`.content-${id}`).show();
            })
        })
    };

    $('.post-menus').on('click', (event) => {
        let typeId = $(event.target).data('id');
        let location = $(event.target).text();
        $('.location').text(`>${location}`);
        getList(typeId);
    });

    getList(1);
</script>