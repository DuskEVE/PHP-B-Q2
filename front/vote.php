<?php
$que = $Que->search(['id'=>$_GET['id']]);

?>

<fieldset>
    <legend>目前位置:首頁 > 問卷調查 > <?=$que['text']?></legend>
    <h3><?=$que['text']?></h3>

    <form action="./api/vote.php" method="post">
    <?php
    $options = $Que->searchAll(['subject_id'=>$_GET['id']]);
    foreach($options as $option){
        echo "<div>
                <input type='radio' name='option' value={$option['id']}>{$option['text']}
              </div>";
    }
    ?>
        <div style="text-align: center;">
            <input type="submit" value="我要投票">
        </div>

    </form>

</fieldset>