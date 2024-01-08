<?php
$que = $Que->search(['id'=>$_GET['id']]);

?>

<fieldset>
    <legend>目前位置:首頁 > 問卷調查 > <?=$que['text']?></legend>
    <h3 style="text-align: center;"><?=$que['text']?></h3>

    <?php
    $options = $Que->searchAll(['subject_id'=>$_GET['id']]);
    foreach($options as $option){
        $total = ($Que->search(['id'=>$_GET['id']]))['vote'];
        $per = ($total == 0? 0:round(($option['vote'] / $total), 2));
        echo "
            <div style='width: 90%; display: flex; align-items: center; margin: 10px'>
                <div style='width: 45%; text-align: center;'>
                    {$option['text']}
                </div>
                <div style='width:".($per*45)."%; height:20px; background-color: gray;'></div>
                <div style='width: 10%;'>
                    {$option['vote']}票(".($per*100)."%)
                </div>
            </div>";
    }
    ?>
    <div style="text-align: center; width:100%;">
        <button onclick="location.href='./index.php?do=que'">返回</button>
    </div>

</fieldset>