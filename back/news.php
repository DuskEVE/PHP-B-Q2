
<form action="./api/edit_news.php" method="post">
    <div class="container" style="width: 100%; display:flex; justify-content:center; margin-bottom:10px;">

        <table style="width: 70%; text-align:center">
            <tr>
                <th style="width: 10%;">編號</th>
                <th style="width: 70%;">標題</th>
                <th style="width: 10%;">顯示</th>
                <th style="width: 10%;">刪除</th>
            </tr>
            <?php
            $datas = $News->searchAll();
            $start = 0;
            if(isset($_GET['p'])) $start = $_GET['p']-1;
            $end = ($start+1) * 3;
            if($end > count($datas)) $end = count($datas);
            $page = ceil(count($datas) / 3);

            for($i=$start*3; $i<$end; $i++){
                $data = $datas[$i];
            ?>
            <tr>
                <td style="background-color: lightgray;"><?=$i+1?></td>
                <td><?=$data['title']?></td>
                <td><input type="checkbox" name="display[]" value="<?=$data['id']?>" <?=$data['display']==1? "checked":""?>></td>
                <td><input type="checkbox" name="del[]" value="<?=$data['id']?>"></td>
                <input type="hidden" name="id[]" value="<?=$data['id']?>">
            </tr>
            <?php
            }
            ?>
        </table>

    </div>
        
    <div style="text-align: center;">
    <?php
    if($start > 0){
        $p = $start;
        echo "<a style='margin:5px;' href='./admin.php?do=news&p=$p'><</a>";
    }
    for($i=1; $i<=$page; $i++){
        echo "<a style='margin:5px;' href='./admin.php?do=news&p=$i'>$i</a>";
    }
    if($start+1 < $page){
        $p = $start+2;
        echo "<a style='margin:5px;' href='./admin.php?do=news&p=$p''>></a>";
    }
    ?>
    </div>
    <div style="text-align: center;">
        <input type="submit" value="確認送出">
    </div>
</form>