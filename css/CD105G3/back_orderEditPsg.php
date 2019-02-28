<?php
session_start();

//===========================自己的php開始=======================






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
  <title>山行者後台 - 旅客明細</title>
  <!-- 可自行更動區塊 -->

<!-- ===========================自己的css開始======================= -->

<style>
.psgNo{
  display:none;
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
            <a href="back_order.php">訂單清單</a>
            <i class="material-icons">keyboard_arrow_right</i>
            <span id="currentLoc">旅客資訊</span>
          </div>
          <?php 
              

          require_once("connectDb.php");
          $ordNo = $_REQUEST["ordNo"];
          // echo $ordNo;
          $sql = "SELECT * FROM `passenger` where ordNo = :ordNo ";
          $products = $pdo->prepare($sql); 
          $products -> bindParam(":ordNo", $ordNo);
	        $products->execute();	
        $i=0;
      while($prodRow = $products->fetch(PDO::FETCH_ASSOC)){
        $i++;
    ?>	
          <form action="back_order.php" method="post">
            <div class="editArea">
              <div class="row">
                <div class="col-4">
                  <label for="">訂單編號</label>
                </div>
                <div class="col-20">
                  <span><?php echo $prodRow["ordNo"]?></span>
                </div>
              </div>
              <div class="row psgNo">
                <?php echo "<input type='text' name='psgNo$i' value=$prodRow[psgNo]";?>
                </div>
              </div>
              <div class="row">
                <div class="col-4">
                  <label for="">旅客姓名</label>
                </div>
                <div class="col-20">
                <input type='text' name='psgName<?php echo $i?>' value='<?php  echo $prodRow["psgName"] ?>'>
                </div>
              </div>
              <div class="row">
                <div class="col-4">
                  <label for="">旅客生日</label>
                </div>
                <div class="col-20">
                <input type='date' name='birthday<?php echo $i?>' value='<?php  echo $prodRow["birthday"] ?>'>
                </div>
              </div>
              <div class="row">
                <div class="col-4">
                  <label for="">旅客電話</label>
                </div>
                <div class="col-20">
                <input type='text' name='psgTel<?php echo $i?>' value='<?php  echo $prodRow["psgTel"] ?>'>
                </div>
              </div>
              <div class="row">
                <div class="col-4">
                  <label for="">旅客身分證字號</label>
                </div>
                <div class="col-20">
                <input type='text' name='psgId<?php echo $i?>' value='<?php  echo $prodRow["psgId"] ?>'>
                </div>
              </div>
            </div>
            <?php  
            
  }?>
            <div class="confirmArea">
              <button class="btn btnCancel">取消</button>
              <button class="btn btnSubmit" name="<?php echo $ordNo ?>">確認修改</button>
            </div>
          </form>





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
