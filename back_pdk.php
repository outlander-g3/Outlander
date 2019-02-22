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
  <title>山行者後台 - PHP模板</title>
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
            <span id="currentLoc">行程種類</span>
        </div>
          <div class="tablearea">
            <div class="tab">
              <button class="tablinks active" value="itineraryType">行程種類</button>
              <button class="tablinks" value="viewList">行程景點清單</button>
              <button class="tablinks" value="itineraryView">景點</button>
            </div>
            <a href="back_pdk.php" id="addItem" class="btn-main-s">新增項目</a>
            <div id="itineraryType" class="tabcontent active">
              <table>
                <tr>
                  <th class="col-3">編號</th>
                  <th class="col-8">名稱</th>
                  <th class="col-3">行程類型</th>
                  <th class="col-5">行程種類狀態</th>
                  <th class="col-5">處理</th>
                </tr>
                <tr>
                  <td class="col-3">10001</td>
                  <td class="col-8">優勝美地-美國西部國家公園健行</td>
                  <td class="col-3">1.官方</td>
                  <td class="col-5">2.已上架</td>
                  <td class="col-5">
                    <a href="back_pdkEdit.php"><i class="edit material-icons">edit</i></a>
                    <a href="#"><i class="delete material-icons">delete</i></a>
                  </td>
                </tr>
                <tr>
                  <td class="col-3">10001</td>
                  <td class="col-8">優勝美地-美國西部國家公園健行</td>
                  <td class="col-3">1.官方</td>
                  <td class="col-5">2.已上架</td>
                  <td class="col-5">
                    <a href="back_pdkEdit.php"><i class="edit material-icons">edit</i></a>
                    <a href="#"><i class="delete material-icons">delete</i></a>
                  </td>
                </tr>
                <tr>
                    <td class="col-3">10001</td>
                    <td class="col-8">優勝美地-美國西部國家公園健行</td>
                    <td class="col-3">1.官方</td>
                    <td class="col-5">2.已上架</td>
                    <td class="col-5">
                      <a href="back_pdkEdit.php"><i class="edit material-icons">edit</i></a>
                      <a href="#"><i class="delete material-icons">delete</i></a>
                    </td>
                  </tr>
              </table>
            </div>
            
            <div id="viewList" class="tabcontent">
              <!-- <h3>行程景點清單</h3> -->
              <table>
                <tr>
                    <th class="col-8">行程種類編號</th>
                  <th class="col-3">景點編號</th>
                  <th class="col-5">景點名稱</th>
                  <th class="col-3">景點順序</th>
                  <th class="col-5">處理</th>
                </tr>
                <tr>
                  <td class="col-8">優勝美地-美國西部國家公園健行</td>
                  <td class="col-3">1</td>
                  <td class="col-5">優勝美地瀑布</td>
                  <td class="col-3">2</td>
                  <td class="col-5">
                    <a href=back_pdk_sceneEdit.php><i class="edit material-icons">edit</i></a>
                    <a href="#"><i class="delete material-icons">delete</i></a>
                  </td>
                </tr>
              </table>
            </div>
            
            <div id="itineraryView" class="tabcontent">
              <!-- <h3>景點</h3> -->
              <table>
                    <tr>
                      <th class="col-3">景點編號</th>
                      <th class="col-5">景點標題</th>
                      <th class="col-8">景點icon列表</th>
                      <th class="col-3">所屬山岳</th>
                      <th class="col-5">處理</th>
                    </tr>
                    <tr>
                      <td class="col-3">1</td>
                      <td class="col-5">西峰觀景台</td>
                      <td class="col-8">2</td>
                      <td class="col-3">玉山</td>
                      <td class="col-5">
                        <a href="back_pdk_ScenePointEdit.php"><i class="edit material-icons">edit</i></a>
                        <a href="#"><i class="delete material-icons">delete</i></a>
                      </td>
                    </tr>
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
