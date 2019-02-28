<?php
session_start();

//===========================自己的php開始=======================
try{
  require_once('connectDb.php');
  if(isset($_REQUEST['admNo'])){
    $admNo = $_REQUEST['admNo'];
    $sql = 'select * 
    from admin
    where admNo=:admNo';
    $adm = $pdo->prepare($sql);
    $adm->bindValue(':admNo', $admNo);
    $adm->execute();
    $admRow = $adm->fetch(PDO::FETCH_ASSOC);
  }
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
  <title>山行者後台 - 編輯後台管理員資料</title>
  <link rel="Shortcut Icon" type="image/x-icon" href="img/logo.png">
  <!-- 可自行更動區塊 -->

<!-- ===========================自己的css開始======================= -->
<style>
.admImg{
  width: 200px;
}
.admImg img{
  width: 100%;
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
            <span>後台系統管理</span>
            <i class="material-icons">keyboard_arrow_right</i>
            <a href="back_admin.php">後台管理員清單</a>
            <i class="material-icons">keyboard_arrow_right</i>
            <span id="currentLoc">編輯後台管理員資料</span>
          </div>
          <form action="back_adminEdit_update.php" method="post" enctype="multipart/form-data">
            <?php if(isset($admNo)){?>
            <input type="hidden" name="admNo" value="<?php echo $admNo; ?>">
            <?php } ?>
            <div class="editArea">
              <div class="row">
                <div class="col-4">
                  <label for="admName">管理員姓名</label>
                </div>
                <div class="col-20">
                  <input type="text" id="admName" name="admName" value="<?php 
                      if(isset($admNo)){
                        echo $admRow['admName'];
                      };
                    ?>" placeholder="最長8個字元" max="8" required>
                </div>
              </div>
              <div class="row">
                <div class="col-4">
                  <label for="admId">管理員帳號</label>
                </div>
                <div class="col-20">
                  <input type="text" id="admId" name="admId" value="<?php 
                      if(isset($admNo)){
                        echo $admRow['admId'];
                      };
                    ?>" placeholder="最長8個字元" max="8" required>
                </div>
              </div>
              <div class="row">
                <div class="col-4">
                  <label for="admPsw">管理員密碼</label>
                </div>
                <div class="col-20">
                  <input type="password" id="admPsw" name="admPsw" value="<?php 
                      if(isset($admNo)){
                        echo $admRow['admPsw'];
                      };
                    ?>" placeholder="最長8個字元" max="8" required>
                </div>
              </div>
              <div class="row">
                <div class="col-4">
                  <label for="admPower">管理權限</label>
                </div>
                <div class="col-20">
                  <select name="admPower" id="admPower" required>
                    <option value="">請選擇管理權限</option>
                    <option value="0" <?php if(isset($admNo)){
                      if($admRow['admPower'] == 0){
                        echo'selected';}}?>>0. 停權</option>
                    <option value="1" <?php if(isset($admNo)){
                      if($admRow['admPower'] == 1){
                        echo'selected';}}?>>1. 一般</option>
                    <option value="2" <?php if(isset($admNo)){
                      if($admRow['admPower'] == 2){
                        echo'selected';}}?>>2. ROOT</option>
                  </select>
                </div>
              </div>
              <?php if(isset($admNo)){?>
              <div class="row">
                <div class="col-4">
                  <label for="admImg">管理員頭像</label>
                </div>
                <div class="col-20">
                  <input type="file" id="admImg" name="admImg" title="檔案不得大於<?php echo ini_get("upload_max_filesize");?>">
                  <div class="admImg">
                    <img id="imgPreview" src="<?php if(isset($admNo)){ if($admRow['admImg'] != ''){?>img/admin/<?php echo $admRow['admImg']; ?><?php }} ?>" alt="">
                  </div>
                </div>
              </div>
              <?php } ?>
              
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
<script type="text/javascript" src="~/Scripts/TimeControl/timeControl.js?v=1.2.0"></script>
<script src="js/back_model.js"></script>
<!-- ===========================自己的js開始======================= -->
<script>
window.addEventListener("load", ()=>{
  btnCancel = document.getElementById("btnCancel");
  btnCancel.addEventListener("click", ()=>{
    console.log(document.getElementById('from').value);
    location.href = document.getElementById('from').value;
  });
  admImg = document.getElementById('admImg');
  imgPreview = document.getElementById('imgPreview');
  if(admImg != null){
    admImg.addEventListener("change", (e)=>{
      var file = e.target.files[0];
      var reader = new FileReader();
      reader.onload = function(){
        imgPreview.src = reader.result;
      }
      reader.readAsDataURL(file);
    })
  }
})
</script>



<!-- ===========================自己的js結束======================= -->