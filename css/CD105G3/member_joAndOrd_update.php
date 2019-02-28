<?php
    ob_start();
    session_start();
    $memNo = $_SESSION['memNo'];
    // echo "回傳測試";
    // echo $_REQUEST["del"];
    require_once("connectDb.php");

    //刪除日誌(前台與資料庫)
    if(isset($_REQUEST["del"])==true){
        $dlelog = $_REQUEST["del"];
        $sql = "delete from `journal` where `jnNo` = :jnNo";
        $te = $pdo -> prepare($sql);
        $te -> bindValue(":jnNo",$dlelog);
        $te -> execute();
    };

    //更改訂單狀態(前台與資料庫)
    if(isset($_REQUEST["updateOrdStatus"])==true){
        echo "更改";
        $ordNo = $_REQUEST["updateOrdStatus"];
        $updateOrdStatus = 2;
        $sql = "update `order` set `ordStatus` = :ordStatus where `ordNo`=:ordNo";  
        $te = $pdo -> prepare($sql);
        $te -> bindValue(":ordNo",$ordNo);
        $te -> bindValue(":ordStatus",$updateOrdStatus);
        $te -> execute();

    };

    //刪除收藏日誌(前台與資料庫)
    if(isset($_REQUEST["unFavJo"])==true){
        $jnNo = $_REQUEST["unFavJo"];
        $sql = "delete from `collection` where `jnNo` = :jnNo and `memNo` = $memNo";
        $te = $pdo -> prepare($sql);
        $te -> bindValue(":jnNo",$jnNo);
        $te -> execute(); 
        
        //連著取消收藏的code一起寫
         $sql="update journal set jnCollect=jnCollect-1 where jnNo={$jnNo}";
        $pdo->exec($sql);
    };

    // 新增收藏日誌
    if(isset($_REQUEST["addFavJo"])==true){
        $jnNo = $_REQUEST["addFavJo"];
        $sql = "INSERT INTO `collection` (`memNo`,`jnNo`) VALUES ($memNo,$jnNo)";
        $te = $pdo -> prepare($sql);
        $te -> bindValue(":jnNo",$jnNo);
        $te -> bindValue(":memNo",$memNo);
        $te -> execute();

        $sql="update journal set jnCollect=jnCollect+1 where jnNo={$jnNo}";
        $pdo->exec($sql);
   };
?>