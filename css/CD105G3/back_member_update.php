<?php

  session_start();
  include_once('connectDb.php');
  $memNo=$_REQUEST['memNo'];
  $memPoint=$_REQUEST['memPoint'];
  $memStatus=$_REQUEST['memStatus'];
  
  $sql="update member set memPoint={$memPoint} where memNo={$memNo}";
  $pdo->exec($sql);
  $sql="update member set memStatus={$memStatus} where memNo={$memNo}";
  $pdo->exec($sql);
  
    header('Location:back_member.php');
?>