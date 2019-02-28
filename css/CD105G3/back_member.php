<?php
session_start();

//===========================自己的php開始=======================
include_once('connectDb.php');

  //先撈資料
  $sql="select * from member";
  $member=$pdo->query($sql);





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
  <title>山行者後台 - 會員系統管理</title>
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
            <span id="currentLoc">會員帳號管理</span>

          </div>
          <div class="tablearea">
            <div class="tab">
              <button class="tablinks active" value="itineraryType">會員資料管理</button>
            </div>
            <!-- <a href="editmodel.html" id="addItem" class="btn-main-s">新增項目</a> -->
            <div id="itineraryType" class="tabcontent active">
              <table>
                <tr>
                  <th class="col-3">會員編號</th>
                  <th class="col-3">會員姓名</th>
                  <th class="col-3">會員暱稱</th>
                  <th class="col-3">會員信箱</th>
                  <th class="col-3">會員電話</th>
                  <th class="col-3">紅利點數</th>
                  <th class="col-3">會員狀態</th>
                  <th class="col-3">修改資料</th>
                </tr>
                <?php while($rows=$member->fetchObject()){
                  //是否被停權
                  if($rows->memStatus==0){
                    $ms='停權';
                  }
                  else{
                    $ms='正常';
                  }
                  
                  ?>  
                 
                 
                 
                <tr>
                  <td class="col-3"><?php echo $rows->memNo;?></td>
                  <td class="col-3"><?php echo $rows->memName;?></td>
                  <td class="col-3"><?php echo $rows->memId;?></td>
                  <td class="col-3"><?php echo $rows->memMail;?></td>
                  <td class="col-3"><?php echo $rows->memTel;?></td>
                  <td class="col-3"><?php echo $rows->memPoint;?></td>
                  <td class="col-3"><?php echo $ms;?></td>
                  <td class="col-3">
                    <a href="back_memberEdit.php?memNo=<?php echo $rows->memNo;?>"><i class="edit material-icons">edit</i></a>
                  </td>
                </tr>

                <?php
                  
                 
                }?>
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
