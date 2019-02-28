<?php
session_start();
$mydata = $_POST['mydata'];
$pdkNo = $mydata['pdkNo'];
$pdStart = $mydata['year'].'-'.$mydata['month'].'-'.$mydata['day'];
try{
  require_once('connectDb.php');
  $sql = 'select a.pdNo, b.* 
  from product a join guide b on a.gdNo1=b.gdNo and a.gdNo2 is not null and pdStatus = 1
  where a.pdkNo=:pdkNo and a.pdStart=:pdStart 
  group by a.gdNo1';
  $guide1 = $pdo->prepare($sql);
  $guide1->bindValue(':pdkNo', $pdkNo);
  $guide1->bindValue(':pdStart', $pdStart);
  $guide1->execute();
  $guideData1 = $guide1->fetchAll(PDO::FETCH_ASSOC);
  $_SESSION['pdStart']=str_replace('/0', '/', str_replace('-', '/', $pdStart));
  $_SESSION['pdEnd']=str_replace('/0', '/', str_replace('-', '/', date("Y-m-d",strtotime($pdStart."+".($_SESSION['day']-1)." day"))));
  // $_SESSION['pdStart']=$pdStart;
  // $_SESSION['pdEnd']=date("Y-m-d",strtotime($pdStart."+".($_SESSION['day']-1)." day")); 
  foreach( $guideData1 as $i => $guide ){
    $_SESSION['pdNo']=$guide['pdNo'];
  }


  $sql = 'select b.* 
  from product a join guide b on a.gdNo2=b.gdNo 
  where a.pdkNo=:pdkNo and a.pdStart=:pdStart and a.gdNo2 is not null and pdStatus = 1
  group by a.gdNo2';
  $guide2 = $pdo->prepare($sql);
  $guide2->bindValue(':pdkNo', $pdkNo);
  $guide2->bindValue(':pdStart', $pdStart);
  $guide2->execute();
  $guideData2 = $guide2->fetchAll(PDO::FETCH_ASSOC);

  $mydata = [11,22];
  $returnData = array(   
    'guide1' => $guideData1,
    'guide2' => $guideData2
  );
  echo json_encode($returnData);
}catch (PDOException $e) {
  echo "失敗",$e->getMessage(),"<br>";
  echo "行號",$e->getLine();
}
?>