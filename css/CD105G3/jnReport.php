<?php
  try {
      require_once("connectDb.php");
  
      $sql="INSERT INTO report (rptNo,jnNo,memNo,reason, rptDate,result)
            VALUES(NULL,'$_GET[jnNo]','$_GET[memNo]','$_GET[reason]',CURDATE(),'0')";
      echo $sql;
      $pdo->exec($sql);
      header("Location:jn.php?jnNo=$_GET[jnNo]"); 
  } catch (PDOException $e) {
      echo "失敗",$e->getMessage(),"<br>";
      echo "行號",$e->getLine();
  }
?>