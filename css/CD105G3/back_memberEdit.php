<?php
session_start();

//===========================自己的php開始=======================
include_once('connectDb.php');

//先撈資料
$sql="select * from member where memNo={$_REQUEST['memNo']}";
$member=$pdo->query($sql);
$rows=$member->fetchObject();





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
  <title>山行者後台 - 編輯會員資料</title>
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
            <span>會員系統管理</span>
            <i class="material-icons">keyboard_arrow_right</i>
            <a href="back_member.php"><span>會員帳號管理</span></a>
            <i class="material-icons">keyboard_arrow_right</i>
            <span id="currentLoc">會員資料管理</span>
          </div>
          <form action="back_member_update.php">
            <input type="hidden" name="memNo" value="<?php echo $_REQUEST['memNo'];?>">
            <div class="editArea">
              <div class="row">
                <div class="col-4">
                  <label for="memPoint">紅利點數</label>
                </div>
                <div class="col-20">
                  <input type="text" name="memPoint" id="memPoint" value="<?php echo $rows->memPoint;?>">
                </div>
              </div>
              <div class="row">
                <div class="col-4">
                  <label for="memStatus">會員狀態</label>
                </div>
                <div class="col-20">
                  <select name="memStatus" id="memStatus">
                    <option value="">請選擇狀態</option>
                    <option value="1"
                    <?php
                        if($rows->memStatus == 1){
                          echo 'selected';
                        };
                    ?>>1.正常</option>
                    <option value="0"
                    <?php
                        if($rows->memStatus == 0){
                          echo 'selected';
                        };
                    ?>>0.停權</option>
                  </select>
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

<script>
document.querySelector('.btnCancel').addEventListener('click',function(e){
  e.preventDefault();
  window.location.href='back_member.php';
});
</script>



<!-- ===========================自己的js結束======================= -->
