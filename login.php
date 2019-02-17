<?php
session_start();
$memMail=$_POST['memMail'];
$memPsw=$_POST['memPsw'];
try {

    require_once("connectDb.php");

    $sql="select * from member where memMail=:memMail ";
    $member=$pdo->prepare($sql);
    $member->bindValue(':memMail',$memMail);
    $member->execute();
    //檢查是否真有註冊過
    if($member->rowCount()==0){
        echo "none";
    }
    //代表有這人存在
    else{
        //帳號密碼同時符合
        $sql="select * from member where memMail=:memMail and memPsw=:memPsw ";
        $member=$pdo->prepare($sql);
        $member->bindValue(':memMail',$memMail);
        $member->bindValue(':memPsw',$memPsw);
        $member->execute();
        if($member->rowCount()==0){
            echo "pswError";
        }
        else{
            //被停權
            $row=$member->fetch();
            if($row['memStatus']==0){
                echo 'stopRight';
            }
            //正常
            else{
                echo "exist";
                $_SESSION['memNo']=$row['memNo'];
                $_SESSION['memName']=$row['memName'];
                $_SESSION['memId']=$row['memId'];
                $_SESSION['memImg']=$row['memImg'];
                $_SESSION['memMail']=$row['memMail'];
                $_SESSION['memTel']=$row['memTel'];
                $_SESSION['memPsw']=$row['memPsw'];
                $_SESSION['memPoint']=$row['memPoint'];
            }
    
            //檢查從哪跳轉過來登入
            // if(isset($_SESSION['where'])===true){
            //     $to=$_SESSION['where'];
            //     //避免大家都跳回來 所以要清除掉，不然會有一個where陣列ｗｗｗ哪知道登入後要跳回去哪裡
            //     unset($_SESSION['where']);
            //     header('Location:'.$to);
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
    }


 catch (PDOException $e) {
    echo "失敗",$e->getMessage(),"<br>";
    echo "行號",$e->getLine();
}
?>