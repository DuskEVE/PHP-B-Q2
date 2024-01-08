
<fieldset>
    <legend>目前位置: 首頁 > 問卷調查</legend>

    <table style="text-align: center;">
        <tr>
            <th width="10%">編號</th>
            <th width="60%">問卷題目</th>
            <th width="10%">投票總數</th>
            <th width="10%">結果</th>
            <th width="10%">狀態</th>
        </tr>
        <?php
        $datas = $Que->searchAll(['subject_id'=>0]);
        foreach($datas as $index=>$data){
        ?>
        <tr style="height:30px">
            <td><?=$index+1?>.</td>
            <td><?=$data['text']?></td>
            <td><?=$data['vote']?></td>
            <td>
                <a href="?do=result&id=<?=$data['id']?>">結果</a>
            </td>
            <td>
            <?php
            if(isset($_SESSION['user'])) echo "<a href='?do=vote&id={$data['id']}'>參與投票</a>";
            else echo "請先登入";
            ?>
            </td>
        </tr>
        <?php
        }
        ?>
    </table>

</fieldset>