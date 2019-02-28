<?php
session_start();
$pdkNo = $_REQUEST['pdkNo'];
$gdNo1 = $_REQUEST['guide1'];
$gdNo2 = $_REQUEST['guide2'];
$pdStart = $_REQUEST['pdStart'];
$pdStatus = $_REQUEST['pdStatus'];
try{
  require_once('connectDb.php');
  if(isset($_REQUEST['pdNo'])){
    $pdNo = $_REQUEST['pdNo'];
    $sql = 'update product set pdkNo=:pdkNo, gdNo1=:gdNo1, 
    gdNo2=:gdNo2, pdStart=:pdStart, pdStatus=:pdStatus
    where pdNo=:pdNo';
    $product = $pdo -> prepare($sql);
    $product->bindValue(':pdNo', $pdNo);
    $product->bindValue(':pdkNo', $pdkNo);
    $product->bindValue(':gdNo1', $gdNo1);
    $product->bindValue(':gdNo2', $gdNo2);
    $product->bindValue(':pdStart', $pdStart);
    $product->bindValue(':pdStatus', $pdStatus);
    $product->execute();
  }else{
    $sql = 'insert into product (pdkNo, gdNo1, gdNo2, pdStart, pdStatus)
    values (:pdkNo, :gdNo1, :gdNo2, :pdStart, :pdStatus)';
    $product = $pdo -> prepare($sql);
    $product->bindValue(':gdNo2', $gdNo2);
    $product->bindValue(':pdkNo', $pdkNo);
    $product->bindValue(':gdNo1', $gdNo1);
    $product->bindValue(':pdStart', $pdStart);
    $product->bindValue(':pdStatus', $pdStatus);
    $product->execute();
  }
}catch (PDOException $e) {
  echo "失敗",$e->getMessage(),"<br>";
  echo "行號",$e->getLine();
}
if(isset($e) === false){
  header("location:back_product.php");
}else{
  echo $e;
}
?>