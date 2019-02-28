<?php
session_start();
error_reporting(0);

//===========================自己的php開始=======================
try{
  require_once('connectDb.php');
  $pdkNo = $_REQUEST['pdkNo'];
  if(isset($_REQUEST['pdkNo'])){
    $pdkNo = $_REQUEST['pdkNo'];
    $pdkName = $_REQUEST['pdkName'];
    
  }
  if(isset($_REQUEST['pdkNo'])){
    $sql = 'select DISTINCT pdkNo,eqmNo from productchecklist where pdkNo='.$pdkNo;
    echo $sql;
    $pdkC = $pdo->query($sql);
    // $pdkCArr = [];
    // while($pdkCRow = $pdkC->fetch(PDO::FETCH_ASSOC)){
    //   array_push($pdkCArr,$pdkCRow['eqmNo']);
    // }


  }
    $sql = 'select DISTINCT pdkNo,eqmNo from productchecklist';
    $pdk = $pdo->query($sql);

    $sql = 'select DISTINCT pdkNo ,pdkName from productkind';
    $pdkD = $pdo->query($sql);

    $sql = 'select eqmNo,eqmName from equipment where eqmKind="寢具類"';
    $eqmS = $pdo->query($sql);
    
    $sql = 'select eqmNo,eqmName from equipment where eqmKind="醫療類"';
    $eqmM = $pdo->query($sql);
    
    $sql = 'select eqmNo,eqmName from equipment where eqmKind="衣物類"';
    $eqmC = $pdo->query($sql);
    
    $sql = 'select eqmNo,eqmName from equipment where eqmKind="配件類"';
    $eqmA = $pdo->query($sql);
    
    $sql = 'select eqmNo,eqmName from equipment where eqmKind="炊具類"';
    $eqmCK = $pdo->query($sql);
    
    $sql = 'select eqmNo,eqmName from equipment where eqmKind="食品類"';
    $eqmF = $pdo->query($sql);

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
  <title>山行者後台 - 編輯裝備清單</title>
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
    <span>裝備管理</span>
    <i class="material-icons">keyboard_arrow_right</i>
    <a href="back_equip.php".html">裝備清單</a>
    <i class="material-icons">keyboard_arrow_right</i>
    <span id="currentLoc">編輯裝備清單</span>
  </div>
  <form action="back_equipListEdit_update.php">
    <div class="editArea">
    
      <div class="row">
        <div class="col-4">
          <label for="">行程種類名稱</label>
        </div>
        <div class="col-20">
        <select name="pdkNo" id="" required>
          <option value="" 
            <?php 
            if(isset($pdkNo) === false){
              echo 'selected';
                };?>>請選擇行程種類名稱</option>
            <?php while($pdkRow = $pdk->fetch(PDO::FETCH_ASSOC)){?>
            <?php while($pdkRowD = $pdkD->fetch(PDO::FETCH_ASSOC)){?>
              <option value="<?php echo $pdkRowD['pdkNo'];?>" 
                  <?php 
                if(isset($pdkNo)){
                    if($pdkNo == $pdkRowD['pdkNo']){
                      echo 'selected';
                  }
                };?>>
                <?php echo $pdkRowD['pdkName'];?>
          </option>
          <?php }} ?>
        </select>

        </div>
      </div>
      <div class="row">
        <div class="col-4">
          <label for="">寢具類</label>
        </div>
        <div class="col-20">
          <?php while($eqmSRow = $eqmS->fetch(PDO::FETCH_ASSOC)){?>
            <input type="checkbox" name="eqmNo[]" value="<?php echo $eqmSRow['eqmNo'];?>"
            <?php 
                if(isset($pdkNo)){
                  $pdkCArr = [];
                  while($pdkCRow = $pdkC->fetch(PDO::FETCH_ASSOC)){
                    array_push($pdkCArr,$pdkCRow['eqmNo']);
                    if( in_array($pdkCArr,$pdkCRow['eqmNo'])){
                      echo 'checked';
                    }
                  }
                };?>
            ><?php echo $eqmSRow['eqmName'];?>
            <?php } ?>
        </div>
      </div>
      <div class="row">
        <div class="col-4">
          <label for="">醫療類</label>
        </div>
        <div class="col-20">
        <?php while($eqmMRow = $eqmM->fetch(PDO::FETCH_ASSOC)){?>
            <input type="checkbox" name="eqmNo[]" value="<?php echo $eqmMRow['eqmNo'];?>"
            <?php 
                if(isset($pdkNo)){
                  while($pdkCRow = $pdkC->fetch(PDO::FETCH_ASSOC)){
                    if($pdkCRow['eqmNo'] == $eqmMRow['eqmNo']){
                      echo 'checked';
                    }
                  }
                };?>
            ><?php echo $eqmMRow['eqmName'];?>
            <?php } ?>
        </div>
      </div>
      <div class="row">
        <div class="col-4">
          <label for="">衣物類</label>
        </div>
        <div class="col-20">
          <?php while($eqmCRow = $eqmC->fetch(PDO::FETCH_ASSOC)){?>
            <input type="checkbox" name="eqmNo[]" value="<?php echo $eqmCRow['eqmNo'];?>"
            <?php 
                if(isset($pdkNo)){
                  while($pdkCRow = $pdkC->fetch(PDO::FETCH_ASSOC)){
                    if($pdkCRow['eqmNo'] == $eqmCRow['eqmNo']){
                      echo 'checked';
                    }
                  }
                };?>
            ><?php echo $eqmCRow['eqmName'];?>
          <?php } ?>
        </div>
      </div>
      <div class="row">
          <div class="col-4">
            <label for="">配件類</label>
          </div>
          <div class="col-20">
            <?php while($eqmARow = $eqmA->fetch(PDO::FETCH_ASSOC)){?>
              <input type="checkbox" name="eqmNo[]" value="<?php echo $eqmARow['eqmNo'];?>"
              <?php 
                  if(isset($pdkNo)){
                    while($pdkCRow = $pdkC->fetch(PDO::FETCH_ASSOC)){
                      if($pdkCRow['eqmNo'] == $eqmARow['eqmNo']){
                        echo 'checked';
                      }
                    }
                  };?>
              ><?php echo $eqmARow['eqmName'];?>
            <?php } ?>
          </div>
        </div>
      <div class="row">
        <div class="col-4">
          <label for="">炊具類</label>
        </div>
        <div class="col-20">
          <?php while($eqmCKRow = $eqmCK->fetch(PDO::FETCH_ASSOC)){?>
            <input type="checkbox" name="eqmNo[]" value="<?php echo $eqmCKRow['eqmNo'];?>"
            <?php 
                if(isset($pdkNo)){
                  while($pdkCRow = $pdkC->fetch(PDO::FETCH_ASSOC)){
                    if($pdkCRow['eqmNo'] == $eqmCKRow['eqmNo']){
                      echo 'checked';
                    }
                  }
                };?>
            ><?php echo $eqmCKRow['eqmName'];?>
          <?php } ?>
        </div>
      </div>
      <div class="row">
        <div class="col-4">
          <label for="">食品類</label>
        </div>
        <div class="col-20">
          <?php while($eqmFRow = $eqmF->fetch(PDO::FETCH_ASSOC)){?>
            <input type="checkbox" name="eqmNo[]" value="<?php echo $eqmFRow['eqmNo'];?>"
            <?php 
                if(isset($pdkNo)){
                  while($pdkCRow = $pdkC->fetch(PDO::FETCH_ASSOC)){
                    if($pdkCRow['eqmNo'] == $eqmFRow['eqmNo']){
                      echo 'checked';
                    }
                  }
                };?>
            ><?php echo $eqmFRow['eqmName'];?>
          <?php } ?>
        </div>
      </div>
      
      
        
    </div>
    <div class="confirmArea">
      <button class="btn btnCancel">取消</button>
      <button class="btn btnSubmit">確認修改</button>
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
