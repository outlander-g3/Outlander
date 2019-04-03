<?php
session_start();

if(isset($_SESSION['memMail'])){
    $memMail=$_SESSION['memMail'];
}
else{
    
    $memMail=$_REQUEST['memMail'];
}
try {

    require_once("connectDb.php");

    //登出
    if(isset($_REQUEST['logout'])){
        session_unset();
        echo 'logout';
    }
    //是否已存在
    else if(isset($_REQUEST['checkId'])){
        
        // $memMail=$_REQUEST['memMail'];
        $sql="select * from member where memMail=:memMail ";
        $member=$pdo->prepare($sql);
        $member->bindValue(':memMail',$memMail);
        $member->execute();
        
        if($member->rowCount()==0){
            echo "none";
        }
        //代表有這人存在
        else{
            echo 'exist';
        }
    }
    //註冊
    else if(isset($_REQUEST['regist'])){
        
        // $memMail=$_REQUEST['memMail'];
        $memPsw=$_REQUEST['memPsw'];
        $arr=explode('@',$memMail);
        $memId=$arr[0];
        //檢查是否玩完遊戲來註冊
        if(isset($_SESSION['memPoint'])){
            $memPoint=$_SESSION['memPoint'];
            unset($_SESSION['memPoint']);
        }
        else{
            $memPoint=0;
        }

        // require_once("connectDb.php");
        //寫入資料庫
        $sql="insert into member (memMail,memPsw,memId,memPoint) values (:memMail,:memPsw,:memId,:memPoint);";
        $member=$pdo->prepare($sql);
        $member->bindValue(':memMail',$memMail);
        $member->bindValue(':memPsw',$memPsw);
        $member->bindValue(':memId',$memId);
        $member->bindValue(':memPoint',$memPoint);
        $member->execute();
        
        $sql="select * from member where memMail='{$memMail}'";
        $member=$pdo->query($sql);
        $row=$member->fetch();
        $_SESSION['memNo']=$row['memNo'];
        $_SESSION['memName']=$row['memName'];
        $_SESSION['memId']=$row['memId'];
        $_SESSION['memImg']=$row['memImg'];
        $_SESSION['memMail']=$row['memMail'];
        $_SESSION['memTel']=$row['memTel'];
        $_SESSION['memPsw']=$row['memPsw'];
        $_SESSION['memPoint']=$row['memPoint'];
    }
    //登入
    else{
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
            
            $memPsw=$_REQUEST['memPsw'];
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
            }
        }
    }
    
}
 catch (PDOException $e) {
    echo "失敗",$e->getMessage(),"<br>";
    echo "行號",$e->getLine();
}
?>