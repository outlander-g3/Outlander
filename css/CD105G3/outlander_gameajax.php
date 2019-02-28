<?php 


session_start();
require_once("connectDb.php");
//檢查是否有登入
if(isset($_SESSION['memMail'])){
    echo "login";
    if(isset( $_REQUEST["game"])){
      $game = $_REQUEST["game"];
      $memNo = $_SESSION["memNo"];
      // echo $game;
      // echo $_SESSION["memNo"];
      $sql = "select * from `member`  where memNo = :memNo";
      $te = $pdo -> prepare($sql);
      $te -> bindValue(":memNo",$memNo);
      $te -> bindColumn("memPoint", $memPoint);
      $te->execute(); 
    while($te->fetch(PDO::FETCH_ASSOC)){
      
    }
    $memPoint+=50;
    $sql = "UPDATE `member` set `memPoint` =:memPoint  where `memNo` = :memNo";
    $te = $pdo -> prepare($sql);
    $te -> bindValue(":memPoint",$memPoint);
    $te -> bindValue(":memNo",$memNo);
    $te->execute(); 

  }
}else{
    $_SESSION['memPoint']=50;
    echo "logout";
}


?>