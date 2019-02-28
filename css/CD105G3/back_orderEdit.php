<?php
session_start();

//===========================自己的php開始=======================




require_once("connectDb.php");
$ordNo = $_REQUEST["ordNo"];
$sql = "SELECT * FROM `order` a LEFT JOIN `member` b ON a.memNo = b.memNo LEFT JOIN `product` c ON a.pdNo = c.pdNo LEFT JOIN `productkind` d ON c.pdkNo =d.pdkNo where rate !='null' and a.ordNo = :ordNo ";
$products = $pdo->prepare($sql); 
$products -> bindParam(":ordNo", $ordNo);
$products->execute();	








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
  <title>山行者後台 - 訂單編輯</title>
  <!-- 可自行更動區塊 -->

<!-- ===========================自己的css開始======================= -->



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
            <a href="back_order.php">訂單清單</a>
            <i class="material-icons">keyboard_arrow_right</i>
            <span id="currentLoc">編輯訂單</span>
          </div>
          <form action="back_order.php" method="post">
          
          <?php	
                
                while($prodRow = $products->fetch(PDO::FETCH_ASSOC)){
                  $order = $prodRow["ordNo"];
              ?>	
            <div class="editArea">
              <div class="row">
                <div class="col-4">
                  <label for="">訂單編號</label>
                </div>
                <div class="col-20">
                  <span> <?php   echo $prodRow["ordNo"]; ?></span>
                </div>
              </div>
              <div class="row">
                <div class="col-4">
                  <label for="">會員姓名</label>
                </div>
                <div class="col-20">
                  <span><?php   echo $prodRow["memName"]; ?></span>
                </div>
              </div>
              <div class="row">
                <div class="col-4">
                  <label for="">行程名稱</label>
                </div>
                <div class="col-20">
                  <span><?php   echo $prodRow["pdkName"]; ?></span>
                </div>
              </div>
              <div class="row">
                <div class="col-4">
                  <label for="">參加人數</label>
                </div>
                <div class="col-20">
                  <span><?php   echo $prodRow["people"]; ?></span>
                </div>
              </div>
              <div class="row">
                <div class="col-4">
                  <label for="">訂單日期</label>
                </div>
                <div class="col-20">
                  </select>
                  <span><?php   echo $prodRow["ordDate"]; ?></span>
                </div>
              </div>
              <div class="row">
                <div class="col-4">
                  <label for="">出發日期</label>
                </div>
                <div class="col-20">
                  <span><?php   echo $prodRow["ordStart"]; ?></span>
                </div>
              </div>
              <div class="row">
                <div class="col-4">
                  <label for="">結束日期</label>
                </div>
                <div class="col-20">
                  <span><?php   echo $prodRow["ordEnd"]; ?></span>
                </div>
              </div>
              <div class="row">
                <div class="col-4">
                  <label for="">訂單金額</label>
                </div>
                <div class="col-20">
                  <span><?php   echo $prodRow["ordPrice"]; ?></span>
                </div>
              </div>
              <div class="row">
                <div class="col-4">
                  <label for="">評價日期</label>
                </div>
                <div class="col-20">
                  <span><?php   echo $prodRow["rateDate"]; ?></span>
                </div>
              </div>
              <div class="row">
                <div class="col-4">
                  <label for="">評價內容</label>
                </div>
                <div class="col-20">
                  <span><?php   echo $prodRow["rateCont"]; ?></span>
                </div>
              </div>
              <div class="row">
                <div class="col-4">
                  <label for="">評價等級</label>
                </div>
                <div class="col-20">
                  <span><?php   echo $prodRow["rate"]; ?></span>
                </div>
              </div>
              <div class="row">
                <div class="col-4">
                  <label for="">訂單狀態</label>
                </div>
                <div class="col-20">
                  <select name="ordStatus" id="ordStatus">
                  <?php 
                    echo $prodRow["ordStatus"];
                    if($prodRow["ordStatus"]==0){
                      echo "
                      <option value='0' selected>已成立</option>
                      <option value='1'>已完成</option>
                      <option value='2'>待退款</option>
                      <option value='3'>已取消</option>";
                      
                    }elseif($prodRow["ordStatus"]==1){
                      echo "
                      <option value='0'>已成立</option>
                      <option value='1' selected>已完成</option>
                      <option value='2'>待退款</option>
                      <option value='3'>已取消</option>";

                    }elseif($prodRow["ordStatus"]==2){
                      echo "
                      <option value='0'>已成立</option>
                      <option value='1'>已完成</option>
                      <option value='2'selected>待退款</option>
                      <option value='3'>已取消</option>";
                      
                    }elseif($prodRow["ordStatus"]==3){
                      echo "
                      <option value='0'>已成立</option>
                      <option value='1'>已完成</option>
                      <option value='2'>待退款</option>
                      <option value='3'selected>已取消</option>";
                      
                    }
                  
                  
                  
                  ?>
                    </select>
                </div>
              </div>
            </div>
            
            <?php	
                }
              ?>	
            <div class="confirmArea">
              <button class="btn btnCancel">取消</button>
              <button class="btn btnSubmit" name="order" value="<?php  echo $order ?>">確認修改</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>





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
