<?php
ob_start();
session_start();
//取得原本的會員資料
$memMail=$_SESSION['memMail'];
$memName=$_SESSION['memName'];
$memTel=$_SESSION['memTel'];
$ordPrice=$_REQUEST['ordPrice'];
try {
    require_once("connectDb.php");
    //啟動交易
    $pdo->beginTransaction();
echo $_SESSION['where'];
    //先判斷是否從客製來  客制要多寫入開團資訊
    if($_SESSION['where']=='/outlander/cu_Booking.php'){
        $pdStart=str_replace('/','-',$_SESSION['pdStart']);
        $sql="insert into product(pdkNo,gdNo1,pdStart,pdStatus) values (:pdkNo,:gdNo1,:pdStart,0);";
        $product=$pdo->prepare($sql);
        $product->bindValue(':pdkNo',$_SESSION['pdkNo']);
        $product->bindValue(':gdNo1',$_SESSION['gdNo1']);
        $product->bindValue(':pdStart',$pdStart);
        $product->execute();
        $pdNo=$pdo->lastInsertId();
        // echo '寫完開團';
    }
    else{
        $pdNo=$_SESSION['pdNo'];
    }
    //寫入訂單
    //出發 結束日
    $ordStart=str_replace('/','-',$_SESSION['pdStart']);
    $ordEnd=str_replace('/','-',$_SESSION['pdEnd']);
    $sql="insert into `order` (memNo,pdNo,ordDate,people,ordPrice,ordStart,ordEnd,ordStatus) values (:memNo,:pdNo,:ordDate,:people,:ordPrice,:ordStart,:ordEnd,:ordStatus);";
    $order=$pdo->prepare($sql);
    $order->bindValue(':memNo',$_SESSION['memNo']);
    $order->bindValue(':pdNo',$pdNo);
    $order->bindValue(':ordDate',date("Y-m-d"));
    $order->bindValue(':people',(string)count($_REQUEST['psgName']));
    $order->bindValue(':ordPrice',$ordPrice);
    $order->bindValue(':ordStart',$ordStart);
    $order->bindValue(':ordEnd',$ordEnd);
    $order->bindValue(':ordStatus','0'); //下架
    
    // echo '寫完訂單';
    $order->execute();
    $ordNo=$pdo->lastInsertId();

    //同步更新會員資料＆session
    $_SESSION['memName']= $_REQUEST['buyName'];
    $_SESSION['memMail']= $_REQUEST['buyMail'];
    $_SESSION['memTel']= $_REQUEST['buyTel'];
    // 是否使用紅利點數，有就歸零
    
    $sql="update member set memName=:memName,memMail=:memMail,memTel=:memTel where memNo=:memNo";
    $member=$pdo->prepare($sql);
    $member->bindValue(':memName',$_SESSION['memName']);
    $member->bindValue(':memMail',$_SESSION['memMail']);
    $member->bindValue(':memTel',$_SESSION['memTel']);
    $member->bindValue(':memNo',$_SESSION['memNo']);
    $member->execute();
    if($_REQUEST['usePoint']==1){
        $memPoint=0;
        $sql="update member set memPoint=:memPoint where memNo=:memNo";
        $point=$pdo->prepare($sql);
        $point->bindValue(':memPoint',$memPoint);
        $point->bindValue(':memNo',$_SESSION['memNo']);
        $point->execute();
    }
    // echo '同步完會員';



    //寫入旅客明細
    $sql="insert into `passenger` (ordNo,psgName,birthday,psgTel,psgId) values (:ordNo,:psgName,:birthday,:psgTel,:psgId);";
    $psg=$pdo->prepare($sql);
    for($i=0;$i<count($_REQUEST['psgName']);$i++){
        $psg->bindValue(':ordNo',$ordNo);
        $psg->bindValue(':psgName',$_REQUEST['psgName'][$i]);
        $psg->bindValue(':birthday',$_REQUEST['psgBd'][$i]);
        $psg->bindValue(':psgTel',$_REQUEST['psgTel'][$i]);
        $psg->bindValue(':psgId',$_REQUEST['psgId'][$i]);
        $psg->execute();
    }
    // echo '寫完旅客';
    
    //寫入訂單裝備清單
    //找到pdkNo去撈裝備有哪些
    $sql="select * from productchecklist where pdkNo={$_SESSION['pdkNo']}";
    $check=$pdo->query($sql);
    while($rows=$check->fetchObject()){
        $sql="insert into orderchecklist(eqmNo,ordNo) values(".$rows->eqmNo.",{$ordNo})";
        $pdo->exec($sql);
    }
    // echo '寫入訂單裝備';

    
    
    //提交
    $pdo->commit();
    //然後unset一系列跟訂購有關的session
    unset($_SESSION['pdkName']);
    unset($_SESSION['pdkNo']);
    unset($_SESSION['pdStart']);
    unset($_SESSION['pdEnd']);
    unset($_SESSION['day']);
    unset($_SESSION['pdkPrice']);
    unset($_SESSION['where']);
    unset($_SESSION['gdNo1']);
    unset($_SESSION['pdNo']);
    // echo "<script>alert('已下定，您的訂單編號為{$ordNo}')</script>";
    header('Location:member.php');
}

 catch (PDOException $e) {
    echo "失敗",$e->getMessage(),"<br>";
    echo "行號",$e->getLine();
}
?>


