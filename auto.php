
<?php
try {
    require_once("connectDb.php");
    // 自動幫我們更新訂單～～～
    $today=date('Y-m-d');
    $sql="update `order` set ordStatus=1 where ordStatus=0 and (ordStart between '2000-01-01' and '{$today}');";
    $pdo->exec($sql);
}
catch (PDOException $e) {
    echo "失敗",$e->getMessage(),"<br>";
    echo "行號",$e->getLine();
}

$n=array();
//找出result=0的jnNo有哪些，推到陣列
array_push($n,$row['jnNo']);
//該jnNo有在陣列裡面＝需要被屏蔽
if(in_array($row['jnNo'],$n)){
    continue;
}
?>