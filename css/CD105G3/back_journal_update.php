<?php
$result=$_REQUEST['result'];
$rptNo=$_REQUEST['rptNo'];
try{
    
    include_once('connectDb.php');
    
    //修改狀態
    $sql="update report  set result={$result} where rptNo={$rptNo}";
    $pdo->exec($sql);
    
    }catch (PDOException $e) {
        echo "失敗",$e->getMessage(),"<br>";
        echo "行號",$e->getLine();
    }

?>