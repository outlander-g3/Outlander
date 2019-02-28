<?php
session_start();
// $_SESSION["from"] = $_SERVER['PHP_SELF'];

//===========================自己的php開始=======================
try{
  require_once('connectDb.php');
  $sql = 'select * from tag';
  $tag = $pdo->query($sql);
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
  <title>山行者後台 - 標籤清單</title>
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
            <span>標籤管理</span>
            <i class="material-icons">keyboard_arrow_right</i>
            <span id="currentLoc">標籤清單</span>
          </div>
          <div class="tablearea">
            <div class="tab">
              <button class="tablinks active">標籤清單</button>
            </div>
            <a href="javascript:;" id="addItem" class="btn-main-s">新增項目</a>
            <div class="tabcontent active">
              <table>
                <thead>
                <tr>
                  <th class="col-18">標籤名稱</th>
                  <th class="col-6">功能</th>
                </tr>
                </thead>
                <tbody>
                <?php while($tagRow = $tag->fetch()){?>
                  <tr>
                    <td class="col-18"><?php echo $tagRow['tagName']; ?></td>
                    <td class="col-6">
                      <form action="back_tag_edit">
                        <input type="hidden" name="tagNo" class="tagNo" value="<?php echo $tagRow['tagNo']; ?>">
                        <input type="hidden" name="tagName" class="tagName" value="<?php echo $tagRow['tagName']; ?>">
                        <button type="button" class="edit"><i class="material-icons">edit</i></a>
                        <button type="button" class="delete"><i class="material-icons">delete</i></a>
                      </form>
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
<script src="js/back_tag.js"></script>




<!-- ===========================自己的js結束======================= -->