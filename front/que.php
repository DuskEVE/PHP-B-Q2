
<fieldset>
    <legend>目前位置: 首頁 > 問卷調查</legend>
    <table style="width: 100%;">
        <tr>
            <td style="width: 10%;">編號</td>
            <td style="width: 60%;">問卷題目</td>
            <td style="width: 10%;">投票總數</td>
            <td style="width: 10%;">結果</td>
            <td style="width: 10%;">狀態</td>
        </tr>
        <?php
        $ques = $Que->searchAll(['display'=>1, 'subject_id'=>0]);
        $no = 1;
        foreach($ques as $que){
        ?>
        <tr>
            <td><?=$no?>.</td>
            <td><?=$que['text']?></td>
            <td><?=$que['vote']?></td>
            <td><a href="?do=result&id=<?=$que['id']?>">結果</a></td>
            <td>
                <?=isset($_SESSION['user'])?"<a href='?do=vote&id={$que['id']}'>參與投票</a>":"請先登入"?>
            </td>
        </tr>
        <?php
            $no += 1;
        }
        ?>
    </table>
</fieldset>