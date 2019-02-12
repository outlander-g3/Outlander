<?php
session_start();
$memMail=$_POST['memMail'];
$memPsw=$_POST['memPsw'];
try {

    require_once("connectDb.php");

    // $sql="select * from member where memMail='{$memMail}' and memPsw='{$memPsw}'";
    // $member=$pdo->query($sql);

    $sql="select * from member where memMail='{$memMail}'";
    $member=$pdo->query($sql);
    
    //檢查是否真有註冊過
    if($member->rowCount()==0){
        echo "none";
    }
    //代表有這人存在
    else{
        $sql="select * from member where memMail='{$memMail}' and memPsw='{$memPsw}'";
        $member=$pdo->query($sql);
        if($member->rowCount()==0){
            echo "pswError";
        }
        else{
            $row=$member->fetch();
            // echo '歡迎登入<br>';
            // echo $row[1].$row[2].$row[3];
            echo "exist";
            $_SESSION['memId']=$row['no'];
            $_SESSION['memName']=$row['memName'];
            $_SESSION['memMail']=$row['memMail'];
    
        //檢查從哪跳轉過來登入
        if(isset($_SESSION['where'])===true){
            $to=$_SESSION['where'];
            //避免大家都跳回來 所以要清除掉，不然會有一個where陣列ｗｗｗ哪知道登入後要跳回去哪裡
            unset($_SESSION['where']);
            header('Location:'.$to);
        }
    }
    // if($member->rowCount()==0){
    //     echo "none";
    // }
    // else{
    //     $row=$member->fetch();
    //     // echo '歡迎登入<br>';
    //     // echo $row[1].$row[2].$row[3];
    //     echo "exist";
    //     $_SESSION['memId']=$row['no'];
    //     $_SESSION['memName']=$row['memName'];
    //     $_SESSION['email']=$row['email'];

    // //檢查從哪跳轉過來登入
    // if(isset($_SESSION['where'])===true){
    //     $to=$_SESSION['where'];
    //     //避免大家都跳回來 所以要清除掉，不然會有一個where陣列ｗｗｗ哪知道登入後要跳回去哪裡
    //     unset($_SESSION['where']);
    //     header('Location:'.$to);
    // }
}

} catch (PDOException $e) {
    echo "失敗",$e->getMessage(),"<br>";
    echo "行號",$e->getLine();
}
?>