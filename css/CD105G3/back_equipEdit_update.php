<?php
session_start();
error_reporting(0);
$eqmNo = $_REQUEST['eqmNo'];
$eqmName = $_REQUEST['eqmName'];
$eqmKind = $_REQUEST['eqmKind'];

try{
  require_once('connectDb.php');
  if(isset($_REQUEST['eqmNo'])){
    $eqmNo = $_REQUEST['eqmNo'];
    $sql = "UPDATE equipment SET eqmNo=:eqmNo, eqmName=:eqmName, eqmKind=:eqmKind WHERE eqmNo=:eqmNo";
    $eqm = $pdo -> prepare($sql);
    $eqm->bindValue(':eqmNo', $eqmNo);
    $eqm->bindValue(':eqmName', $eqmName);
    $eqm->bindValue(':eqmKind', $eqmKind);
    header('Location:back_equip.php');
   
    $eqm->execute();
  }else{
    if($eqmNo == NULL){
      $sql = 'insert into equipment (eqmName, eqmKind)
      values (:eqmName, :eqmKind)';
      $eqm = $pdo -> prepare($sql);
    }
    $eqm->bindValue(':eqmName', $eqmName);
    $eqm->bindValue(':eqmKind', $eqmKind);
    $eqm->execute();
    header('Location:back_equip.php');
  }
}catch (PDOException $e) {
  echo "失敗",$e->getMessage(),"<br>";
  echo "行號",$e->getLine();
}

?>