<?php
include_once "./db.php";
$que = $Que->search($_GET);
if($que['display'] == 1){
    $que['display'] = 0;
    echo "開放";
}
else{
    $que['display'] = 1;
    echo "關閉";
}
$Que->update($que);
?>