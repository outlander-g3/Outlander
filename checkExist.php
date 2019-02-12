<?php
session_start();
$memMail=$_POST['memMail'];
try {

    require_once("connectDb.php");

    // $sql="select * from member where memMail='{$memMail}' and memPsw='{$memPsw}'";
    // $member=$pdo->query($sql);

    $sql="select * from member where memMail='{$memMail}'";
    $member=$pdo->query($sql);
    if($member->rowCount()==0){
        echo "none";
    }
    //代表有這人存在
    else{
        echo 'exist';
    }
}

catch (PDOException $e) {
    echo "失敗",$e->getMessage(),"<br>";
    echo "行號",$e->getLine();
}
?>