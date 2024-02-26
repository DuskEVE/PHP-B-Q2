
<div style="margin-bottom: 20px;">

    <form action="./api/update_post.php" method="post" style="width: 80%; margin: auto">
        <table style="width: 100%;">
            <tr style="text-align: center; background-color: lightgray;">
                <td style="width: 10%;">編號</td>
                <td style="width: 70%;">標題</td>
                <td style="width: 10%;">顯示</td>
                <td style="width: 10%;">刪除</td>
            </tr>
            <?php
            $posts = $Post->searchAll();
            $pageCount = ceil(count($posts) / 3);
            $currentPage = (isset($_GET['p'])? $_GET['p']:1);
            $start = ($currentPage-1) * 3;
            $end = ($currentPage==$pageCount? count($posts):$start+3);
            for($i=$start; $i<$end; $i++){
                $post = $posts[$i];
            ?>
            <tr style="text-align: center; height: 30px;">
                <input type="hidden" name="id[]" value="<?=$post['id']?>">
                <td style="background-color: lightgray;"><?=$i?>.</td>
                <td><?=$post['title']?></td>
                <td><input type="checkbox" name="display[]" value="<?=$post['id']?>" <?=$post['display']==1?"checked":""?>></td>
                <td><input type="checkbox" name="del[]" value="<?=$post['id']?>"></td>
            </tr>
            <?php
            }
            ?>
        </table>
        <div style="text-align: center;">
        <?php
        if($currentPage > 1){
            $perv = $currentPage - 1;
            echo "<a href='?do=news&p=$perv'><</a>";
        }
        for($i=1; $i<=$pageCount; $i++){
            $fontSize = '18px';
            if($i == $currentPage) $fontSize = '24px';
            echo "<a href='?do=news&p=$i' style='font-size: $fontSize; margin: 5px;'>$i</a>";
        }
        if($currentPage < $pageCount){
            $next = $currentPage + 1;
            echo "<a href='?do=news&p=$next'>></a>";
        }
        ?>
        </div>
        <div style="text-align: center;">
            <input type="submit" value="確定修改">
            <input type="reset" value="清空選取">
        </div>
    </form>
</div>