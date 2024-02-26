
<?php
if(!isset($_GET['id']) || $Que->count(['id'=>$_GET['id']])==0) header("location:?do=que");
$title = $Que->search(['id'=>$_GET['id']]);
?>

<fieldset>
    <legend>目前位置: 首頁 > 問卷調查 > <?=$title['text']?></legend>
    <h3><?=$title['text']?></h3>
    <form action="./api/vote.php" method="post">
        <input type="hidden" name="subject_id" value="<?=$title['id']?>">
        <table style="width: 100%;">

            <?php
            $ques = $Que->searchAll(['subject_id'=>$_GET['id']]);

            foreach($ques as $que){
                $pre = 0;
                if($title['vote'] != 0) $pre = floor(($que['vote'] / $title['vote']) * 100);
            ?>
            <tr>
                <td><input type="radio" name="id" value="<?=$que['id']?>"></td>
                <td><?=$que['text']?></td>
            </tr>
            <?php
            }
            ?>
        </table>
        <div style="text-align: center;">
            <input type="submit" value="我要投票">
        </div>
    </form>
</fieldset>