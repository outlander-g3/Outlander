<?php
session_start();
$eqmNo=$_POST['eqmNo'];
$checked=$_POST['checked'];
$ordNo=$_POST['ordNo'];

try {

    require_once("connectDb.php");

    $sql="update orderchecklist set checked={$checked}  where eqmNo = {$eqmNo} and ordNo = {$ordNo}";
    $pdo->exec($sql);
    
}

catch (PDOException $e) {
    echo "失敗",$e->getMessage(),"<br>";
    echo "行號",$e->getLine();
}
?>
