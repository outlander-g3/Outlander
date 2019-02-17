<?php
session_start();
try{
include_once('connectDb.php');

for($i=15;$i<=65;$i++){
    for($j=1;$j<=37;$j++){
        $sql='insert into orderchecklist values('.$i.','.$j.',0)';
        echo $sql;
        // $pdo->exec($sql);

    }
}
}catch (PDOException $e) {
    echo "失敗",$e->getMessage(),"<br>";
    echo "行號",$e->getLine();
}
echo '完成';
?>