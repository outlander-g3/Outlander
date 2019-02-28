<?php
session_start();

//===========================自己的php開始=======================

require_once("connectDb.php");
if(isset($_REQUEST["order"])==true){
  // echo $_REQUEST["ordStatus"];
  // echo "123";
        $ordStatus =  $_REQUEST["ordStatus"];
        $ordNo = $_REQUEST["order"];
        $set = "update `order` set `ordStatus` =:ordStatus where `ordNo` =:ordNo";
        $te = $pdo -> prepare($set);
        $te -> bindValue(":ordStatus",$ordStatus);
        $te -> bindValue(":ordNo",$ordNo);
        $te -> execute();
}
if(isset($_REQUEST["psgNo1"])==true){
    $psgNo1=$_REQUEST["psgNo1"];
    $psgName1=$_REQUEST["psgName1"];
    $birthday1=$_REQUEST["birthday1"];
    $psgTel1=$_REQUEST["psgTel1"];
    $psgId1=$_REQUEST["psgId1"];
    $set = "update `passenger` set `psgName` =:psgName1 , `birthday`=:birthday1 , `psgTel`=:psgTel1 , `psgId`=:psgId1 where `psgNo` =:psgNo1";
    $te = $pdo -> prepare($set);
    $te -> bindValue(":psgNo1",$psgNo1);
    $te -> bindValue(":psgName1",$psgName1);
    $te -> bindValue(":birthday1",$birthday1);
    $te -> bindValue(":psgTel1",$psgTel1);
    $te -> bindValue(":psgId1",$psgId1);
    $te -> execute();

}
if(isset($_REQUEST["psgNo2"])==true){
    $psgNo2=$_REQUEST["psgNo2"];
    $psgName2=$_REQUEST["psgName2"];
    $birthday2=$_REQUEST["birthday2"];
    $psgTel2=$_REQUEST["psgTel2"];
    $psgId2=$_REQUEST["psgId2"];
    $set = "update `passenger` set `psgName` =:psgName2 , `birthday`=:birthday2 , `psgTel`=:psgTel2 , `psgId`=:psgId2 where `psgNo` =:psgNo2";
    $te = $pdo -> prepare($set);
    $te -> bindValue(":psgNo2",$psgNo2);
    $te -> bindValue(":psgName2",$psgName2);
    $te -> bindValue(":birthday2",$birthday2);
    $te -> bindValue(":psgTel2",$psgTel2);
    $te -> bindValue(":psgId2",$psgId2);
    $te -> execute();

}
if(isset($_REQUEST["psgNo3"])==true){
    $psgNo3=$_REQUEST["psgNo3"];
    $psgName3=$_REQUEST["psgName3"];
    $birthday3=$_REQUEST["birthday3"];
    $psgTel3=$_REQUEST["psgTel3"];
    $psgId3=$_REQUEST["psgId3"];
    $set = "update `passenger` set `psgName` =:psgName3 , `birthday`=:birthday3 , `psgTel`=:psgTel3 , `psgId`=:psgId3 where `psgNo` =:psgNo3";
    $te = $pdo -> prepare($set);
    $te -> bindValue(":psgNo3",$psgNo3);
    $te -> bindValue(":psgName3",$psgName3);
    $te -> bindValue(":birthday3",$birthday3);
    $te -> bindValue(":psgTel3",$psgTel3);
    $te -> bindValue(":psgId3",$psgId3);
    $te -> execute();

}
if(isset($_REQUEST["psgNo4"])==true){
    $psgNo4=$_REQUEST["psgNo4"];
    $psgName4=$_REQUEST["psgName4"];
    $birthday4=$_REQUEST["birthday4"];
    $psgTel4=$_REQUEST["psgTel4"];
    $psgId4=$_REQUEST["psgId4"];
    $set = "update `passenger` set `psgName` =:psgName4 , `birthday`=:birthday4 , `psgTel`=:psgTel4 , `psgId`=:psgId4 where `psgNo` =:psgNo4";
    $te = $pdo -> prepare($set);
    $te -> bindValue(":psgNo4",$psgNo4);
    $te -> bindValue(":psgName4",$psgName4);
    $te -> bindValue(":birthday4",$birthday4);
    $te -> bindValue(":psgTel4",$psgTel4);
    $te -> bindValue(":psgId4",$psgId4);
    $te -> execute();

}
if(isset($_REQUEST["psgNo5"])==true){
    $psgNo5=$_REQUEST["psgNo5"];
    $psgName5=$_REQUEST["psgName5"];
    $birthday5=$_REQUEST["birthday5"];
    $psgTel5=$_REQUEST["psgTel5"];
    $psgId5=$_REQUEST["psgId5"];
    $set = "update `passenger` set `psgName` =:psgName5 , `birthday`=:birthday5 , `psgTel`=:psgTel5 , `psgId`=:psgId5 where `psgNo` =:psgNo5";
    $te = $pdo -> prepare($set);
    $te -> bindValue(":psgNo5",$psgNo5);
    $te -> bindValue(":psgName5",$psgName5);
    $te -> bindValue(":birthday5",$birthday5);
    $te -> bindValue(":psgTel5",$psgTel5);
    $te -> bindValue(":psgId5",$psgId5);
    $te -> execute();

}
$sql = "SELECT * FROM `order` a LEFT JOIN `member` b ON a.memNo = b.memNo LEFT JOIN `product` c ON a.pdNo = c.pdNo LEFT JOIN `productkind` d ON c.pdkNo = d.pdkNo ";
$products = $pdo->query($sql); 
$products -> bindColumn("ordNo", $ord);
$products -> bindColumn("memName", $memName);
$products -> bindColumn("pdkName", $pdkName);
$products -> bindColumn("ordDate", $ordDate);
$products -> bindColumn("ordStatus", $ordStatus);

$products1 = $pdo->query($sql); 
$products1 -> bindColumn("ordNo", $ordNo);
$products1 -> bindColumn("memName", $memName);
$products1 -> bindColumn("pdkName", $pdkName);
$products1 -> bindColumn("rateCont", $rateCont);
$products1 -> bindColumn("rateDate", $rateDate);
$products1 -> bindColumn("rate", $rate);





//===========================自己的php結束=======================

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
  <link rel="stylesheet" href="css/back_model.css">
  <script src="js/jquery-3.3.1.min.js"></script>

  <!-- 可自行更動區塊 -->
  <title>山行者後台 - 訂單管理</title>
  <!-- 可自行更動區塊 -->

<!-- ===========================自己的css開始======================= -->


<style>
.tdform{
  display:flex;
  width:100%;    
  justify-content:space-evenly;
    border-bottom: 1px solid #ddd !important;
    border-top: unset!important;    
    /* margin-top:d */
    /* border: 1px solid #ddd; */
    border-right:1px solid #ddd !important;
    border-left: unset !important;
}
.tdform button{
  border:unset;
  background:#fff;
}
.edit{
  color:#484848;
}

</style>



<!-- ===========================自己的css結束======================= -->

</head>
<body>
  <?php include_once('back_header.php'); ?>
<!-- ===========================各分頁內容開始(可填寫區塊開始)======================= -->
<!-- table頁面：breadcrumb、tablearea -->
<!-- input頁面：breabcrumb、form+editarea -->
          <div id="breadcrumb">
            <span>行程管理</span>
            <i class="material-icons">keyboard_arrow_right</i>
            <span>訂單管理</span>
            <i class="material-icons">keyboard_arrow_right</i>
            <span id="currentLoc">訂單清單</span>
          </div>
          <div class="tablearea">
            <div class="tab">
              <button class="tablinks active" value="itineraryType">訂單清單</button>
            </div>
            <div id="itineraryType" class="tabcontent active">
              <table>
                <tr>
                  <th class="col-3">訂單編號</th>
                  <th class="col-3">會員姓名</th>
                  <th class="col-8">行程名稱</th>
                  <th class="col-4">訂單時間</th>
                  <th class="col-3">訂單狀態</th>
                  <th class="col-3">處理</th>
                </tr>
                <?php	
                
	while($products->fetch(PDO::FETCH_ASSOC)){
    if($ordStatus == 0){
      $ordStatus="已成立";
    }
    else if($ordStatus == 1){
      $ordStatus="已完成";
    }
    else if($ordStatus == 2){
      $ordStatus="待退款";
    }
    else if($ordStatus == 3){
      $ordStatus="已取消";
    }
?>	
                <tr>
                  <td class="col-3"><?php echo $ord;?></td>
                  <td class="col-2"><?php echo $memName?></td>
                  <td class="col-8"><?php echo $pdkName;?></td>
                  <td class="col-4"><?php echo $ordDate;?></td>
                  <td class="col-3"><?php echo $ordStatus;?></td>
                  <td class="col-3 tdform">
                  <form action="back_orderEdit.php" method="post">
                  <?php 
                 echo  "<button name='ordNo' type='submit' value=$ord><i class='edit material-icons'>edit</i></button>"
                 ?>
                    
                  </form>
                  <form action="back_orderEditPsg.php" method="post">
                <?php echo  "<button name='ordNo' type='submit' value=$ord><i class='edit material-icons'>people</i></button>" ?>

                  </form>
                  </td>
                </tr>
            <?php	
  }
?>	
              </table>
            </div>
          </div>










<!-- ===========================各分頁內容結束(可填寫區塊結束)======================= -->
        </div>
      </div>
    </div>
  </section>
</body>
</html>
<script src="js/back_model.js"></script>
<!-- ===========================自己的js開始======================= -->





<!-- ===========================自己的js結束======================= -->
