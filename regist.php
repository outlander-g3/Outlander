<?php
session_start();
$memMail=$_POST['memMail'];
$memPsw=$_POST['memPsw'];
try {

    require_once("connectDb.php");
    //寫入資料庫
    $sql="insert into member (memMail,memPsw) values (:memMail,:memPsw);";
    $member=$pdo->prepare($sql);
    $member->bindValue(':memMail',$memMail);
    $member->bindValue(':memPsw',$memPsw);
    $member->execute();
    
    $sql="select * from member where memMail='{$memMail}'";
        $member=$pdo->query($sql);
        $row=$member->fetch();
        $_SESSION['memId']=$row['no'];
            $_SESSION['memName']=$row['memName'];
            $_SESSION['memMail']=$row['memMail'];


} catch (PDOException $e) {
    echo "失敗",$e->getMessage(),"<br>";
    echo "行號",$e->getLine();
}
?>