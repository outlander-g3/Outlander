<?php
session_start();

//===========================自己的php開始=======================
try {
	require_once("connectDB.php");
	$sql = "select * from guide ";
	$guide = $pdo->prepare($sql);
	$guide->execute();
	
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
  <title>山行者後台 - 嚮導管理</title>
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
        <span>嚮導管理</span>
        <i class="material-icons">keyboard_arrow_right</i>
        <span id="currentLoc">嚮導資料清單</span>
    </div>

    <div class="tablearea">
        <div class="tab">
            <button class="tablinks active" value="itineraryType">嚮導資料清單</button>
        </div>
        <a href="back_guideEdit.php" id="addItem" class="btn-main-s">新增項目</a>
        <div id="itineraryType" class="tabcontent active">
            <table>
            <tr>
                <th class="col-3">姓名</th>
                <th class="col-3">狀態</th>
                <th class="col-5">功能</th>
            </tr>
            <?php while($guideRow = $guide->fetch()){?>
            <tr>
                <td class="col-3"><?php echo $guideRow['gdName']; ?></td>
                <td class="col-3"><?php 
                  if($guideRow['gdStatus'] == 1){
                    echo '1.可帶團';
                  }else{
                    echo '0.不帶團';
                  }?>
                </td>
                <td class="col-5">
                <a href="back_guideEdit.php?gdNo=<?php echo $guideRow['gdNo']; ?>" id="btn_gdEdit"><i class="edit material-icons">edit</i></a>
                <a href="back_guideEdit_delete.php?gdNo=<?php echo $guideRow['gdNo']; ?>"><i class="delete material-icons">delete</i></a>
                </td>
            </tr>
            <?php } ?>
            </table>
        </div>
        
        <div id="viewList" class="tabcontent">
            <h3>行程景點清單</h3>
        </div>
        
        <div id="itineraryView" class="tabcontent">
            <h3>景點</h3>
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
