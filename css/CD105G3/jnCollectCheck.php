<?php
    session_start();
    include_once('connectDb.php'); //連線
    // include_once('session.php'); //判斷會員是否登入
    try {        
        // $sql="select collectNo from collection";
        // $jnCol=$pdo->query($sql);
        // $jnCol->execute();
        // $jnCArr =[];
        // while($jnColRow= $jnCol->fetch(PDO::FETCH_ASSOC)){
        //     array_push($jnCArr,$jnColRow['collectNo']);
        // }
        // print_r($jnCArr);

        $memNo = $_SESSION['memNo'];
        $jnNo = $_REQUEST['jnNo'];
  
       
        //先檢查是否也有重複收藏
        $sql="select collectNo,memNo,jnNo from collection where memNo=:memNo AND jnNo=:jnNo";
        $jnColCK = $pdo->prepare($sql);
        $jnColCK->bindValue(':memNo',$memNo);
        $jnColCK->bindValue(':jnNo',$jnNo);
        $jnColCK->execute();
        $memNoCK = "" ;
        $jnNoCK = "";
      
        while($jnColCKRow= $jnColCK->fetch(PDO::FETCH_ASSOC)){
            $memNoCK = $jnColCKRow['memNo'];
            $jnNoCK = $jnColCKRow['jnNo'];
        }
     
        if($memNoCK == $memNo && $jnNoCK == $jnNo){
            // echo "已收藏過";
         
            // echo "UP";
        }else if($memNoCK != $memNo || $jnNoCK != $jnNo){
            // echo $memNoCK;
            // echo  $jnNoCK ;
            $sql="insert into collection
            (memNo,jnNo)
            values(:memNo,:jnNo);
            ";
            $jnColIn=$pdo->prepare($sql);
            $jnColIn->bindValue(':memNo',$memNo);
            $jnColIn->bindValue(':jnNo',$jnNo);
            $jnColIn->execute();
            // echo "IN";
        }

    }
    
    catch (PDOException $e) {
        echo "失敗",$e->getMessage(),"<br>";
        echo "行號",$e->getLine();
    }
?>