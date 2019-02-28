<?php
session_start();
$pdkName = $_REQUEST['pdkName'];
$lat = $_REQUEST['lat'];
$lon = $_REQUEST['lon'];
$pdkStatus = $_REQUEST['pdkStatus'];
$level = $_REQUEST['level'];
$pdkPrice = $_REQUEST['pdkPrice'];
$continent = $_REQUEST['continent'];
$day = $_REQUEST['day'];
$mt = $_REQUEST['mt'];
$pdkType = $_REQUEST['pdkType'];
$priceInfoIn = $_REQUEST['priceInfoIn'];
$priceInfoEx  = $_REQUEST['priceInfoEx'];
$pdkCont = $_REQUEST['pdkCont'];

//===========================自己的php開始=======================
try{
  require_once('connectDb.php');
  if(isset($_REQUEST['pdkNo'])){
      $pdkNo = $_REQUEST['pdkNo'];
      $sql = 'update productkind set pdkName=:pdkName, pdkCont=:pdkCont,  
      lat=:lat, lon=:lon, pdkStatus=:pdkStatus, level=:level, pdkPrice=:pdkPrice, 
      continent=:continent, day=:day, mt=:mt, pdkType=:pdkType, priceInfoIn=:priceInfoIn, priceInfoEx=:priceInfoEx
      where pdkNo=:pdkNo';
      $pdk = $pdo->prepare($sql);
      $pdk->bindValue(":pdkNo", $pdkNo);
  }else{
      $sql = 'insert into productkind (pdkName,pdkCont,lat,lon,pdkStatus,level,pdkPrice,continent,day,mt,pdkType,priceInfoIn,priceInfoEx)
      values( :pdkName,:pdkCont, :lat, :lon, :pdkStatus, :level, :pdkPrice, :continent, :day, :mt, :pdkType, :priceInfoIn, :priceInfoEx)';
      $pdk = $pdo->prepare($sql);
  }
   $pdk->bindValue(":pdkName",$pdkName);
   $pdk->bindValue(":pdkCont",$pdkCont);
   $pdk->bindValue(":lat",$lat);
   $pdk->bindValue(":lon",$lon);
   $pdk->bindValue(":pdkStatus",$pdkStatus);
   $pdk->bindValue(":level",$level);
   $pdk->bindValue(":pdkPrice",$pdkPrice);
   $pdk->bindValue(":continent",$continent);
   $pdk->bindValue(":day",$day);
   $pdk->bindValue(":mt",$mt);
   $pdk->bindValue(":pdkType",$pdkType);
   $pdk->bindValue(":priceInfoIn",$priceInfoIn);
   $pdk->bindValue(":priceInfoEx",$priceInfoEx);
    $pdk->execute();

}catch (PDOException $e) {
  echo "失敗",$e->getMessage(),"<br>";
  echo "行號",$e->getLine();
}
if(isset($e) === false){
    header('location:back_pdk.php');
}else{
    echo $e;
}