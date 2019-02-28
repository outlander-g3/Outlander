<?php
session_start();
// error_reporting(0);
// $pdkNo = $_REQUEST['pdkNo'];
$eqmNo = $_REQUEST['eqmNo'];

try{
  require_once('connectDb.php');
  $sql = 'select distinct pdkNo from productchecklist';

  $findPdkNo = $pdo -> query($sql); 
  $findArr = [];       
  while($findRow = $findPdkNo->fetch(PDO::FETCH_ASSOC)){
    array_push($findArr,$findRow['pdkNo']);
  }
  // print_r($findArr);
  
  $pdkNo = $_REQUEST['pdkNo'];
  // echo $pdkNo;
  echo in_array($pdkNo, $findArr);
  if(in_array($pdkNo, $findArr)){
    echo "UP";

    //先刪除
    $sql ="DELETE FROM productchecklist WHERE pdkNo=:pdkNo";
    $product = $pdo -> prepare($sql);
    $product->bindValue(':pdkNo', $pdkNo);
    $product->execute();
      
    //再新增 
    $len = count($eqmNo); 
    $sql = "";
    for ($i = 0; $i < $len; $i++) { // Enter the loop   
        $sql = "insert into
                  productchecklist
                  (pdkNo, eqmNo)
                  values(".$pdkNo.",".$eqmNo[$i].")
                  ;"; 
                  $product = $pdo -> query($sql);        
                  $product->execute();                
    }
    header('Location:back_equip.php');
  }else
    if(! in_array($pdkNo, $findArr)){
    //要先有行程種類才能創建裝備清單
    $len = count($eqmNo);  // Number of iterations
    $sql = "";
    for ($i = 0; $i < $len; $i++) { // Enter the loop
        $sql = "insert into
                  productchecklist
                  (pdkNo, eqmNo)
                  values(".$pdkNo.",".$eqmNo[$i].")
                  ;";
        //
        $pdo->exec($sql);
    }
    header('Location:back_equip.php');
    // $product->bindValue(':pdkNo', $pdkNo);
  }
}catch (PDOException $e) {
  echo "失敗",$e->getMessage(),"<br>";
  echo "行號",$e->getLine();
}

?>