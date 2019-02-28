<?php
session_start();

//===========================自己的php開始=======================
try{
  require_once('connectDb.php');
  if(isset($_REQUEST['pdNo'])){
    $pdNo = $_REQUEST['pdNo'];
    $sql = 'select a.*, b.* 
    from productkind a join product b on a.pdkNo=b.pdkNo 
    where b.pdNo=:pdNo';
    $pd = $pdo->prepare($sql);
    $pd->bindValue(':pdNo', $pdNo);
    $pd->execute();
    $pdRow = $pd->fetch(PDO::FETCH_ASSOC);
  }
  $sql = 'select pdkNo, pdkName
  from productkind
  where pdkNo != 0';
  $pdk = $pdo->query($sql);

  $sql = 'select gdNo, gdName
  from guide';
  $guide = $pdo->query($sql);
  
  $sql = 'select gdNo, gdName
  from guide';
  $guideAgain = $pdo->query($sql);
}catch (PDOException $e) {
  echo "失敗",$e->getMessage(),"<br>";
  echo "行號",$e->getLine();
}
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
  <title>山行者後台 - 編輯行程開團資訊</title>
  <link rel="Shortcut Icon" type="image/x-icon" href="img/logo.png">
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
            <span>行程開團資訊管理</span>
            <i class="material-icons">keyboard_arrow_right</i>
            <a href="back_product.php">行程開團資訊</a>
            <i class="material-icons">keyboard_arrow_right</i>
            <span id="currentLoc">編輯行程開團資訊</span>
          </div>
          <form action="back_productEdit_update.php" method="get">
            <?php if(isset($pdNo)){?>
            <input type="hidden" name="pdNo" value="<?php echo $pdNo; ?>">
            <?php } ?>
            <div class="editArea">
              <div class="row">
                <div class="col-4">
                  <label for="pdkNo">行程種類名稱</label>
                </div>
                <div class="col-20">
                  <select name="pdkNo" id="pdkNo" required>
                    <option value="">請選擇行程</option>
                    <?php while($pdkRow = $pdk->fetch(PDO::FETCH_ASSOC)){?>
                      <option value="<?php echo $pdkRow['pdkNo'];?>" 
                        <?php 
                        if(isset($pdNo)){
                          if($pdkRow['pdkNo'] == $pdRow['pdkNo']){
                            echo 'selected';
                          }
                        };?>>
                        <?php echo $pdkRow['pdkName'];?>
                      </option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="col-4">
                  <label for="pdStart">開始日期</label>
                </div>
                <div class="col-20">
                  <input id="pdStart" name="pdStart" type="date" placeholder="請選擇日期" value="<?php if(isset($pdNo)){ echo $pdRow['pdStart'];} ?>" min="<?php echo date('Y-m-d'); ?>" required>
                </div>
              </div>
              <div class="row">
                <div class="col-4">
                  <label for="guide1">嚮導編號1</label>
                </div>
                <div class="col-20">
                  <select name="guide1" id="guide1" required>
                    <option value="">請選擇嚮導1</option>
                    <?php while($guideRow = $guide->fetch()){ ?>
                    <option value="<?php echo $guideRow['gdNo']?>" 
                      <?php
                      if(isset($pdNo)){
                        if($guideRow['gdNo'] == $pdRow['gdNo1']){
                          echo 'selected';
                        }
                      }
                      ?>>
                      <?php echo $guideRow['gdName']?>
                    </option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="col-4">
                  <label for="">嚮導編號2</label>
                </div>
                <div class="col-20">
                  <select name="guide2" id="guide2" required>
                    <option value="">請選擇嚮導2</option>
                    <?php while($guideRow = $guideAgain->fetch()){ ?>
                    <option value="<?php echo $guideRow['gdNo']?>" 
                      <?php
                      if(isset($pdNo)){
                        if($guideRow['gdNo'] == $pdRow['gdNo2']){
                          echo 'selected';
                        }
                      }
                      ?>>
                      <?php echo $guideRow['gdName']?>
                    </option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="col-4">
                  <label for="pdStatus">開團狀態</label>
                </div>
                <div class="col-20">
                  <select name="pdStatus" id="pdStatus" required>
                    <option value="">請選擇狀態</option>
                    <option value="1"
                    <?php
                      if(isset($pdNo)){
                        if($pdRow['pdStatus'] == 1){
                          echo 'selected';
                        }
                      }
                    ?>
                    >1.上架</option>
                    <option value="0"
                    <?php
                      if(isset($pdNo)){
                        if($pdRow['pdStatus'] == 0){
                          echo 'selected';
                        }
                      }
                    ?>
                    >0.下架</option>
                  </select>
                </div>
              </div>
              <input type="hidden" name="from" id="from" value="<?php echo $_SESSION['from']; ?>">
            </div>
            <div class="confirmArea">
              <button class="btn btnCancel" id="btnCancel" type="button">取消</button>
              <button class="btn btnSubmit" id="btnSubmit" type="submit">確認修改</button>
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
<script src="js/back_editProduct.js"></script>




<!-- ===========================自己的js結束======================= -->