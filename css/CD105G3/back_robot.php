<?php
session_start();

//===========================自己的php開始=======================

include_once('connectDb.php');

//先撈資料
$sql="select * from robot";
$robot=$pdo->query($sql);


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
  <title>山行者後台 - 機器人Q&A清單</title>
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
            <span id="currentLoc">客服機器人Q&A清單</span>
          </div>
          <div class="tablearea">
            <div class="tab">
              <button class="tablinks active" value="robotList" disabled>客服機器人Q&A清單</button>
            </div>
            <a href="back_robotEdit.php" id="addItem" class="btn-main-s">新增項目</a>
            <div id="itineraryType" class="tabcontent active">
              <table>
                <tr>
                  <th class="col-3">編號</th>
                  <th class="col-10">預設問題</th>
                  <th class="col-6">排列順序</th>
                  <th class="col-5">處理</th>
                </tr>
                <?php
                  while($rows=$robot->fetchObject()){

                ?>
                	<tr class="qsNo<?php echo $rows->qsNo;?>">
                    <form action="back_robotEdit.php" id="qsNo<?php echo $rows->qsNo;?>" >
                    <input type="hidden" name="qsNo" value="<?php echo $rows->qsNo;?>">
                    <input type="hidden" name="delete" value="1">
                	  <td class="col-3"><?php echo $rows->qsNo;?></td>
                	  <td class="col-10"><?php echo $rows->defaultQ;?></td>
                	  <td class="col-6"><?php echo $rows->qsOrd;?></td>
                	  <td class="col-5">
                	    <a href="back_robotEdit.php?qsNo=<?php echo $rows->qsNo;?>" class="tdEdit"><i class="edit material-icons">edit</i></a>
                	    <a href="#" class="tdDelete"><i class="delete material-icons">delete</i></a>
                    </td>
                    </form>
                	</tr>

                <?php }?>
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

<script src="js/back_robot.js"></script>



<!-- ===========================自己的js結束======================= -->
