
<style>
    .pop {
        background: rgba(51, 51, 51, 0.8);
        color: #FFF;
        height: 300px;
        width: 300px;
        position: absolute;
        display: none;
        z-index: 9999;
        overflow: auto;
    }
    </style>

<fieldset>
    <legend>目前位置:首頁 > 人氣文章區</legend>

    <table style="width: 90%; margin: auto; text-align: center">
        <tr>
            <th width="30%">標題</th>
            <th width="50%">內容</th>
            <th>讚</th>
        </tr>
        <?php
        $currentPage = 1;
        if(isset($_GET['p'])) $currentPage = $_GET['p'];
        $start = ($currentPage - 1) * 5;
        $count = $News->count(['display'=>1]);
        $end = $start + 5;
        if($end > $count) $end = $count;
        
        // $datas = $News->sql("select * from `news` where `display`='1' order by `good` desc");
        $datas = $News->searchAll(['display'=>1], 'order by `good` desc');
        for($i=$start; $i<$end; $i++){
            $data = $datas[$i];
        ?>
        <tr>
            <td style="background-color: lightgray;" class="title" data-id="<?=$data['id']?>"><?=$data['title']?></td>
            <td>
                <div><?=mb_substr($data['news'], 0, 25)?>...</div>
                <div id="p<?=$data['id']?>" class="pop">
                    <h3 style="color: skyblue;"><?=$data['title']?></h3>
                    <pre><?=$data['news']?></pre>
                </div>
            </td>
            <td>
                <?php
                echo "{$data['good']}個人說<img src='./icon/02B03.jpg' height='20px'>";
                if(isset($_SESSION['user'])){
                    if($Log->count(['news_id'=>$data['id'], 'user'=>$_SESSION['user']]) > 0){
                        echo"-<a href='Javascript:like({$data['id']})'>收回讚</a>";
                    }
                    else{
                        echo"-<a href='Javascript:like({$data['id']})'>讚</a>";
                    }
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
            echo "<a href='./index.php?do=pop&p=$perv'> < </a>";
        }
        for($i=1; $i<=$page; $i++){
            $fontSize = ($i == $currentPage? "20px":"16px");
            echo "<a href='./index.php?do=pop&p=$i' style='font-size:$fontSize;'> $i </a>";
        }
        if($currentPage < $page){
            $next = $currentPage + 1;
            echo "<a href='./index.php?do=pop&p=$next'> > </a>";
        }
        ?>
        </div>
</fieldset>

<script>
    $('.title').hover((event) =>{
        let id = $(event.target).data('id');
        $('.pop').hide();
        $(`#p${id}`).show();
    });
</script>