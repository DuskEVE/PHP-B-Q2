
<fieldset>
    <legend>目前位置:首頁 > 最新消息區</legend>

    <table style="width: 90%; margin: auto; text-align: center">
        <tr>
            <th width="30%">標題</th>
            <th width="50%">內容</th>

        </tr>
        <?php
        $currentPage = 1;
        if(isset($_GET['p'])) $currentPage = $_GET['p'];
        $start = ($currentPage - 1) * 5;
        $count = $News->count(['display'=>1]);
        $end = $start + 5;
        if($end > $count) $end = $count;

        $datas = $News->searchAll(['display'=>1]);
        for($i=$start; $i<$end; $i++){
            $data = $datas[$i];
        ?>
        <tr>
            <td style="background-color: lightgray;" class="title" data-id="<?=$data['id']?>"><?=$data['title']?></td>
            <td>
                <div id="s<?=$data['id'];?>"><?=mb_substr($data['news'], 0, 25);?>...</div>
                <?php
                if(!isset($_SESSION['user'])){
                    echo "<div id='a{$data['id']}' style='display: none;'><pre>{$data['news']}</pre></div>";
                }
                else{
                    echo "
                    <fieldset id='a{$data['id']}' style='display: none;'>
                        <legend>文章標題:{$data['title']}|讚</legend>

                        <div><pre>{$data['news']}</pre></div>
                    </fieldset>
                    ";
                }
                ?>
            </td>
        </tr>
        <?php
        }
        ?>
        </table>

        <div style="text-align: center;">
        <?php
        $page = ceil($count / 5);
        if($currentPage > 1){
            $perv = $currentPage - 1;
            echo "<a href='./index.php?do=news&p=$perv'> < </a>";
        }
        for($i=1; $i<=$page; $i++){
            $fontSize = ($i == $currentPage? "20px":"16px");
            echo "<a href='./index.php?do=news&p=$i' style='font-size:$fontSize;'> $i </a>";
        }
        if($currentPage < $page){
            $next = $currentPage + 1;
            echo "<a href='./index.php?do=news&p=$next'> > </a>";
        }
        ?>
        </div>
</fieldset>

<script>
$(".title").on('click', (event) => {
    let id = $(event.target).data('id');
    $(`#s${id}, #a${id}`).toggle();
});

</script>