<?php
session_start();

class myDB{
    private $host = "localhost";
    private $charset = "utf8";
    private $dbname = "db15_2";
    private $user = "root";
    private $password = "";
    private $table;

    function __construct($table){
        $this->table = $table;
    }
    function dbLogin(){
        $dns = "mysql:host={$this->host};charset={$this->charset};dbname={$this->dbname}";
        return new PDO($dns, $this->user, $this->password);
    }
    function getTargetSet($target, $sep){
        $targetSet = [];

        foreach($target as $key=>$value){
            $str = "`$key`='$value'";
            array_push($targetSet, $str);
        }

        return join($sep, $targetSet);
    }
    function search($target){
        $pdo = $this->dbLogin();
        $targetSet = $this->getTargetSet($target, "&&");
        $sql = "select * from `$this->table` where $targetSet";

        return $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }
    function searchAll($target=[], $option=""){
        $pdo = $this->dbLogin();
        $sql = "select * from `$this->table`";

        if(count($target) > 0){
            $targetSet = $this->getTargetSet($target, "&&");
            $sql = "$sql where $targetSet";
        }
        if(strlen($option) > 0) $sql = "$sql $option";

        return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    function update($target){
        $pdo = $this->dbLogin();
        $sql = "";

        if(isset($target['id'])){
            $id = $target['id'];
            unset($target['id']);
            $targetSet = $this->getTargetSet($target, ",");
            $sql = "update `$this->table` set $targetSet where `id`='$id'";
        }
        else{
            $cols = array_keys($target);
            $values = array_values($target);
            $sql = "insert into `$this->table`(`".join("`,`", $cols)."`) values('".join("','", $values)."')";
        }

        return $pdo->exec($sql);
    }
    function delete($target){
        $pdo = $this->dbLogin();
        $targetSet = $this->getTargetSet($target, "&&");
        $sql = "delete from `$this->table` where $targetSet";

        return $pdo->exec($sql);
    }
    function count($target=[]){
        $pdo = $this->dbLogin();
        $sql = "select count(*) from `$this->table`";
        if(count($target) > 0){
            $targetSet = $this->getTargetSet($target, "&&");
            $sql = "$sql where $targetSet";
        }

        return $pdo->query($sql)->fetch(PDO::FETCH_ASSOC)['count(*)'];
    }
    function sql($sql){
        $pdo = $this->dbLogin();
        return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
}

$Total = new myDB('total');
$User = new myDB('user');
$Type = new myDB('type');
$Post = new myDB('post');

function updateCount($date, $Total){
    if($Total->count(['date'=>$date])){
        $total = $Total->search(['date'=>$date]);
        $total['count'] += 1;
        $Total->update($total);
    }
    else $Total->update(['count'=>1, 'date'=>$date]);
};

$date = date('Y-m-d');
if(!isset($_SESSION['visited'])){
    $_SESSION['visited'] = $date;
    updateCount($date, $Total);
}
else if($_SESSION['visited'] != $date){
    $_SESSION['visited'] = $date;
    updateCount($date, $Total);
}
?>