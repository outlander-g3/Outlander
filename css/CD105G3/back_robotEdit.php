<?php
session_start();

//===========================自己的php開始=======================

//編輯頁的php
include_once('connectDb.php');

if(isset($_REQUEST['qsNo'])){
  $qsNo=$_REQUEST['qsNo'];
  $sql="select * from robot where qsNo=".$qsNo;
  $robot=$pdo->query($sql);
  $rows=$robot->fetchObject();
  $qsOrd=$rows->qsOrd;
}




//===========================自己的php結束=======================

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="Shortcut Icon" type="image/x-icon" href="img/logo.png">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
  <link rel="stylesheet" href="css/back_model.css">
  <script src="js/jquery-3.3.1.min.js"></script>

  <!-- 可自行更動區塊 -->
  <title>山行者後台 - 編輯客服機器人Q&A</title>
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
            <span>客服機器人管理</span>
            <i class="material-icons">keyboard_arrow_right</i>
            <a href="back_robot.php">客服機器人Q&A清單</a>
            <i class="material-icons">keyboard_arrow_right</i>
            <span id="currentLoc">編輯客服機器人Q&A</span>
          </div>
          <form id="robotForm" action="back_robot_update.php">
            <div class="editArea">
              <?php if(isset($_REQUEST['qsNo'])){?>
                  <div class="row">
                    <div class="col-4">
                      <label for="qsNo">問題編號</label>
                    </div>
                    <div class="col-20">
                      <span id><?php echo $rows->qsNo;?></span>
                      <input type="hidden" id="qsNo" name="qsNo" value="<?php echo $rows->qsNo;?>">
                    </div>
                  </div>
               <?php }?>
              <div class="row">
                <div class="col-4">
                  <label for="defaultQ">預設問題</label>
                </div>
                <div class="col-20">
                <input type="text" id="defaultQ" name="defaultQ" placeholder="限15字元內" value="<?php if(isset($_REQUEST['qsNo'])){echo $rows->defaultQ;}?>" maxlength="15">
                </div>
              </div>
              <div class="row">
                <div class="col-4">
                  <label for="ans1">預設答案1</label>
                </div>
                <div class="col-20">
                  <textarea name="ans1" id="ans1" cols="100" rows="5" placeholder="限50字元內"  value=""><?php  if(isset($_REQUEST['qsNo'])){echo $rows->ans1;}?></textarea>
                </div>
              </div>
              <div class="row">
                <div class="col-4">
                  <label for="ans2">預設答案2</label>
                </div>
                <div class="col-20">
                  <textarea name="ans2" id="ans2" cols="100" rows="5" placeholder="限50字元內,若無則毋須填寫"><?php  if(isset($_REQUEST['qsNo'])){echo $rows->ans2;}?></textarea>
                </div>
              </div>
              <div class="row">
                <div class="col-4">
                  <label for="ans3">預設答案3</label>
                </div>
                <div class="col-20">
                  <textarea name="ans3" id="ans3" cols="100" rows="5" placeholder="限50字元內,若無則毋須填寫"><?php  if(isset($_REQUEST['qsNo'])){echo $rows->ans3;}?></textarea>
                </div>
              </div>
              <div class="row">
                <div class="col-4">
                  <label for="ans4">預設答案4</label>
                </div>
                <div class="col-20">
                  <textarea name="ans4" id="ans4" cols="100" rows="5" placeholder="限50字元內,若無則毋須填寫"><?php  if(isset($_REQUEST['qsNo'])){echo $rows->ans4;}?></textarea>
                </div>
              </div>
              <div class="row">
                <div class="col-4">
                  <label for="">於對話框排列順序</label>
                </div>
                <div class="col-20">
                  <select name="qsOrd" id="" >
                    <?php   if(isset($_REQUEST['qsNo'])){echo "<option value='{$qsOrd}'>{$qsOrd}</option>";}
                    ?>
                    <option value="0">不出現</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                  </select>
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

<script src="js/back_robotEdit.js"></script>



<!-- ===========================自己的js結束======================= -->
