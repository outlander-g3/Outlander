<?php
session_start();
try {

    require_once("connectDb.php");
    //檢查是否有登入
    if(isset($_SESSION['memMail'])){
        echo "login";
    }else{
        echo "logout";
    }
   
}

catch (PDOException $e) {
    echo "失敗",$e->getMessage(),"<br>";
    echo "行號",$e->getLine();
}
?>