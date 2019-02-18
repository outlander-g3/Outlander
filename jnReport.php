<?php
  try {
      require_once("connectDb.php");
  
      $sql="INSERT INTO report (jnNo,memNo,reason, rptDate,result)
            VALUES('$_GET[jnNo]','$_GET[memNo]','$_GET[reason]','$_GET[rptDate]','$_GET[result]')";
      echo 123;
      header("Location:journal.php"); 
  } catch (PDOException $e) {
      echo "失敗",$e->getMessage(),"<br>";
      echo "行號",$e->getLine();
  }
?>