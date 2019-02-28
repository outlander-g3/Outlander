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
  <title>山行者後台 - 編輯景點</title>
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
            <span>行程種類管理</span>
            <i class="material-icons">keyboard_arrow_right</i>
            <a href="back_pdk.php">行程景點清單</a>
            <i class="material-icons">keyboard_arrow_right</i>
            <span id="currentLoc">編輯行程景點清單</span>
          </div>
          <form>
            <div class="editArea">
              <div class="row">
                <div class="col-4">
                  <label for="">行程種類編號</label>
                </div>
                <div class="col-20">
                  <input type="text" value="10001">
                </div>
              </div>
              <div class="row">
                <div class="col-4">
                  <label for="">景點名稱</label>
                </div>
                <div class="col-20">
                  <input type="text" value="玉山">
                </div>
              </div>
              
              <div class="row">
                <div class="col-4">
                  <label for="">景點順序</label>
                </div>
                <div class="col-20">
                    <select name="" id="">
                        <option value="">請選擇順序</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
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





<!-- ===========================自己的js結束======================= -->
