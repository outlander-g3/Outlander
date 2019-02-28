<?php
session_start();
$mydata = $_POST['mydata'];
$pdkNo = $mydata['pdkNo'];
$year = $mydata['year'];
$month = $mydata['month'];
try{
  require_once('connectDb.php');
  //todo 限定sql回傳當月資料
  $sql = 'select pdStart
  from product
  where pdkNo=:pdkNo and pdStart>curdate() and pdStatus=1 and gdNo2 is not null and pdStatus = 1
  order by pdStart asc';
  $pd = $pdo->prepare($sql);
  $pd->bindValue(':pdkNo', $pdkNo);
  $pd->execute();
  $orderDate = [];
  while($pdRow = $pd->fetch(PDO::FETCH_ASSOC)){

    if(date('Y', strtotime($pdRow['pdStart'])) == $year){
      if(date('m', strtotime($pdRow['pdStart'])) == $month+1){
        array_push($orderDate, date('d', strtotime($pdRow['pdStart'])));
      }

    }
  }

  $mydata['pdkNo'];
  $returnData = array(   
    'mydata' => $mydata,
    'date' => $orderDate
  );
  echo json_encode($returnData);
}catch (PDOException $e) {
  echo "失敗",$e->getMessage(),"<br>";
  echo "行號",$e->getLine();
}
?>