 <?php
    session_start();
    try {

        require_once("connectDb.php");

        $rate=$_REQUEST['rate'];
        $rateCont=$_REQUEST['rateCont'];
        $ordNo=$_REQUEST['ordNo'];
        $rateDate=date('Y-m-d');
        $sql="update `order` set rate={$rate},rateCont=:rateCont,rateDate='{$rateDate}' where ordNo={$ordNo}";
        $ord=$pdo->prepare($sql);
        $ord->bindValue(':rateCont',$rateCont);
        $ord->execute();
        echo 'success';
    
    }

    catch (PDOException $e) {
        echo "失敗",$e->getMessage(),"<br>";
        echo "行號",$e->getLine();
    }
?>