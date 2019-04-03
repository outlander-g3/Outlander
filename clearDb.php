<?php
try {
    require_once("connectDb.php");
    

    $sql="show table status from cd105g3";
    $tb=$pdo->query($sql);
    while($data=$tb->fetch()) {
        $sql="drop table `$data[Name]`";
        $pdo->exec($sql);
    }
}
catch (PDOException $e) {
    echo "失敗",$e->getMessage(),"<br>";
    echo "行號",$e->getLine();
}
?>