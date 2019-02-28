<?php
session_start();

//===========================自己的php開始=======================
try {
    require_once("connectDB.php");
    if(isset($_REQUEST['gdNo'])){
    $gdNo = $_REQUEST['gdNo'];
	$sql = "select * from guide where gdNo=:gdNo";
    $guideL = $pdo->prepare($sql);
    $guideL->bindValue(':gdNo', $gdNo);
    $guideL->execute();
    $guideLRow = $guideL->fetch(PDO::FETCH_ASSOC);
    }
	$sql = 'select pdkNo, pdkName
  from productkind
  where pdkNo != 0';
  $pdk = $pdo->query($sql);

} catch (PDOException $e) {
	$errMsg .= "錯誤 : ".$e -> getMessage()."<br>";
	$errMsg .= "行號 : ".$e -> getLine()."<br>";
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
  <title>山行者後台 - 編輯嚮導管理</title>
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
        <a href="back_guide.php">嚮導管理</a>
        <i class="material-icons">keyboard_arrow_right</i>
        <a href="back_guide.php">嚮導資料清單</a>
        <i class="material-icons">keyboard_arrow_right</i>
        <span id="currentLoc">編輯嚮導管理</span>
    </div>
  
    <form action="back_guideEdit_update.php" method="get">
        <div class="editArea">
            <div class="row">
            <?php if(isset($gdNo)){?>
            <input type="hidden" name="gdNo" value="<?php echo $gdNo; ?>">
            <?php } ?>

            </div>
            <div class="row">
            <div class="col-4">
                <label for="">嚮導姓名</label>
            </div>
            <div class="col-20">
            
                <input type="text" name="gdName" value="<?php 
                if(isset($gdNo)){ echo $guideLRow['gdName']; }?>">
            </div>
            </div>
            <div class="row">
            <div class="col-4">
                <label for="">嚮導身分證字號</label>
            </div>
            <div class="col-20">
            
                <input type="text" name="gdId" value="<?php 
                if(isset($gdNo)){ echo $guideLRow['gdId']; }?>">
            </div>
            </div>
            <div class="row">
            <div class="col-4">
                <label for="">嚮導電話</label>
            </div>
            <div class="col-20">
            
                <input type="text" name="gdTel" value="<?php 
                if(isset($gdNo)){ echo $guideLRow['gdTel']; }?>">
            </div>
            </div>
            <div class="row">
            <div class="col-4">
                <label for="">嚮導頭像</label>
            </div>
            <div class="col-20">
                <!-- <img src="img/guide/<?php echo $guideLRow['gdImg']; ?>" alt=""> -->
                <input type="file" placeholder="請選擇檔案" multiple value="1" name="gdImg">
            </div>
            </div>
            <div class="row">
            <div class="col-4">
                <label for="">嚮導狀態</label>
            </div>
            <div class="col-20">
                <select name="gdStatus" id="">
                <option value="" <?php 
                if(isset($gdNo) === false){ echo "selected";}; ?>>請選擇狀態</option>
                <?php 
                if(isset($gdNo) === false){ 
                    echo '<option value="0">0.不帶團</option>
                        <option value="1" >1.可帶團</option>';
                    }else
                if($guideLRow['gdStatus'] == 1 && isset($gdNo)){
                    echo '  <option value="0">0.不帶團</option>
                            <option value="1" selected>1.可帶團</option>';
                  }else{
                    echo  '  <option value="0"selected>0.不帶團</option>
                            <option value="1">1.可帶團</option>';
                  }
                ?>
             
              
                </select>
            </div>
            </div>
            <div class="row">
            <div class="col-4">
                <label for="">體能表現</label>
            </div>
            <div class="col-20">
                <input type="text" name="hp" value="<?php 
                if(isset($gdNo)){  echo $guideLRow['hp']; } ?>" placeholder="值為0~60">
            </div>
            </div>
            <div class="row">
            <div class="col-4">
                <label for="">帶團經驗</label>
            </div>
            <div class="col-20">
                <input type="text" name="exp" value="<?php 
                if(isset($gdNo)){ echo $guideLRow['exp']; } ?>" placeholder="值為0~60">
            </div>
            </div>
            <div class="row">
            <div class="col-4">
                <label for="">求生能力</label>
            </div>
            <div class="col-20">
                <input type="text" name="survival" value="<?php 
                if(isset($gdNo)){ echo $guideLRow['survival']; } ?>" placeholder="值為0~60">
            </div>
            </div>
            <div class="row">
            <div class="col-4">
                <label for="">應變能力</label>
            </div>
            <div class="col-20">
                <input type="text" name="strain" value="<?php 
                if(isset($gdNo)){ echo $guideLRow['strain']; } ?>" placeholder="值為0~60">
            </div>
            </div>
            <div class="row">
            <div class="col-4">
                <label for="">YDS等級</label>
            </div>
            <div class="col-20">
                <input type="text" name="yds" value="<?php 
                if(isset($gdNo)){ echo $guideLRow['yds']; } ?>" placeholder="值為0~60">
            </div>
            </div>
            
            
            <div class="row">
            <div class="col-4">
                <label for="">嚮導專長</label>
            </div>
            <div class="col-20">
                <textarea name="skill" id="" cols="100" rows="10"><?php
                if(isset($gdNo)){  echo $guideLRow['skill'];} ?></textarea>
            </div>
            </div>
        </div>
        <div class="confirmArea">
            <button class="btn btnCancel" type="button" id="btn_gdCancel"><a href="back_guide.php" style="color:#f4f4f4">取消</a></button>
            <button class="btn btnSubmit" id="btn_gdUpdate">確認修改</button>

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
