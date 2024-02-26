<?php
if(!isset($_GET['id']) || $Que->count(['id'=>$_GET['id']])==0) header("location:?do=que");
$title = $Que->search(['id'=>$_GET['id']]);
?>

<fieldset>
    <legend>目前位置: 首頁 > 問卷調查 > <?=$title['text']?></legend>
    <h3><?=$title['text']?></h3>
    <table style="width: 100%;">

        <?php
        $ques = $Que->searchAll(['subject_id'=>$_GET['id']]);
        $no = 1;
        foreach($ques as $que){
            $pre = 0;
            if($title['vote'] != 0) $pre = floor(($que['vote'] / $title['vote']) * 100);
        ?>
        <tr>
            <td style="width: 40%;"><?=$no?>.<?=$que['text']?></td>
            <td style="width: 60%; display: flex; align-items:center;">
                <div style="width: <?=$pre?>%; height: 10px; background-color: gray;"></div>
                <span><?=$que['vote']?>(<?=$pre?>%)</span>
            </td>
        </tr>
        <?php
            $no += 1;
        }
        ?>
    </table>
    <div style="text-align: center;">
        <button onclick="location.href='?do=que'">返回</button>
    </div>
</fieldset>