<?php
session_start();


$eqmNo = $_REQUEST['eqmNo'];

try{
  require_once('connectDb.php');
  $sql = 'DELETE  FROM equipment WHERE eqmNo=:eqmNo';
//   $sql = 'DELETE equipment FROM  WHERE ordNo=:ordNo AND eqmName=:eqmName';
  $eqD = $pdo -> prepare($sql);
  $eqD -> bindValue(':eqmNo',$eqmNo);
  $eqD->execute();
  header('Location:back_equip.php');


}catch (PDOException $e) {
  echo "失敗",$e->getMessage(),"<br>";
  echo "行號",$e->getLine();
}


?>