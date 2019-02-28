<?php
session_start();
$_SESSION["from"] = $_SERVER['PHP_SELF'];

//===========================自己的php開始=======================
try{
  require_once('connectDb.php');
  $sql = 'select a.pdkNo, a.pdkName, b.*
  from productkind a join product b on a.pdkNo=b.pdkNo
  where pdStart>curdate()
  order by pdStart asc';
  $pd = $pdo->query($sql);
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
  <title>山行者後台 - 行程開團資訊</title>
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
            <span id="currentLoc">行程開團資訊</span>
          </div>
          <div class="tablearea">
            <div class="tab">
              <button class="tablinks active">行程開團資訊</button>
            </div>
            <a href="back_productEdit.php" id="addItem" class="btn-main-s">新增項目</a>
            <div class="tabcontent active">
              <table>
                <thead>
                  <tr>
                    <th class="col-10">行程種類名稱</th>
                    <th class="col-5">開始日期</th>
                    <th class="col-5">開團狀態</th>
                    <th class="col-4">功能</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while($pdRow = $pd->fetch()){?>
                  <tr>
                    <td class="col-10"><?php echo $pdRow['pdkName']; ?></td>
                    <td class="col-5"><?php echo $pdRow['pdStart']; ?></td>
                    <td class="col-5">
                      <?php 
                      if($pdRow['pdStatus'] == 1){
                        echo '1.上架';
                      }else{
                        echo '0.下架';
                      }
                      ?>
                    </td>
                    <td class="col-4">
                      <a href="back_productEdit.php?pdNo=<?php echo $pdRow['pdNo']; ?>" class="edit"><i class="material-icons">edit</i></a>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
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