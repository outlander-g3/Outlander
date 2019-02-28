<?php
session_start();
$eqmNo=$_POST['eqmNo'];
$ordNo=$_POST['ordNo'];

try {

    require_once("connectDb.php");

    //訂單裝備清單中刪除
    $sql="delete from orderchecklist where eqmNo = {$eqmNo} and ordNo = {$ordNo}";
    $pdo->exec($sql);
    echo '成功刪除訂單裝備';
    if($eqmNo>37){
        //從裝備中刪除
        $sql="delete from equipment where eqmNo = {$eqmNo}";
        $pdo->exec($sql);
        // echo '成功刪除eqmNo>37的裝備';
    }
    else{
        // echo 'eqmNo>37的不能刪唷';
    }
}

catch (PDOException $e) {
    echo "失敗",$e->getMessage(),"<br>";
    echo "行號",$e->getLine();
}
?>