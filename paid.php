<?php
ob_start();
session_start();
//取得原本的會員資料
$memMail=$_SESSION['memMail'];
$memName=$_SESSION['memName'];
$memTel=$_SESSION['memTel'];
try {
    require_once("connectDb.php");
    //啟動交易
    $pdo->beginTransaction();

    $sql="insert into order values (:memId,:pdNo,:ordDate,:people,:ordPrice,:ordStart,:ordEnd,:ordStatus);";
    $order=$pdo->prepare($sql);
    $order->bindValue(':memId',$_SESSION['memId']);
    $order->bindValue(':pdNo',$_SESSION['pdNo']);
    $order->bindValue(':ordDate',date("Y-m-d"));
    $order->bindValue(':people',count($_REQUEST['psgName']));
    $order->bindValue(':ordPrice',$_REQUEST['ordPrice']);
    $order->bindValue(':ordStart',$_SESSION['ordStart']);
    $order->bindValue(':ordStart',$_SESSION['ordStart']);
    $order->execute();
    // echo $_REQUEST['buyName'];
    // echo $_REQUEST['buyMail'];
    echo '人數'.count($_REQUEST['psgName']);
    $psgName=$_REQUEST['psgName'];
    foreach ($psgName as $i=>$value){
        echo $value;
        echo $_REQUEST['psgTel'][$i];
        echo $_REQUEST['psgId'][$i];
        echo $_REQUEST['psgBd'][$i];    
    }

$ordNo=$pdo->lastInsertId();
//提交
$pdo->commit();
//然後unset一系列跟訂購有關的session
// header('Location:member.php');
}

 catch (PDOException $e) {
    echo "失敗",$e->getMessage(),"<br>";
    echo "行號",$e->getLine();
}
?>


