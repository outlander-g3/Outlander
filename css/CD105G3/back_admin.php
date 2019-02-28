<?php
session_start();
$_SESSION["from"] = $_SERVER['PHP_SELF'];

//===========================自己的php開始=======================
try{
  require_once('connectDb.php');
  $sql = 'select * from admin';
  $adm = $pdo->query($sql);
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
  <title>山行者後台 - 後台系統管理</title>
  <link rel="Shortcut Icon" type="image/x-icon" href="img/logo.png">
  <!-- 可自行更動區塊 -->

<!-- ===========================自己的css開始======================= -->
<style>
.admPswShow i{
  font-size: 12px;
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
            <span id="currentLoc">後台管理員清單</span>
          </div>
          <div class="tablearea">
            <div class="tab">
              <button class="tablinks active">後台管理員清單</button>
            </div>

            <?php 
              if($_SESSION['admPower'] == 2){?>
            <a href="back_adminEdit.php" id="addItem" class="btn-main-s">新增項目</a>
            <?php }?>
            <div class="tabcontent active">
              <table>
                <thead>
                <tr>
                  <?php if($_SESSION['admNo'] != 1){?>
                  <th class="col-5">管理員姓名</th>
                  <th class="col-5">管理員帳號</th>
                  <th class="col-5">管理員密碼</th>
                  <th class="col-5">管理權限</th>
                  <th class="col-4">功能</th>
                  <?php }else{ ?>
                  <th class="col-6">管理員姓名</th>
                  <th class="col-6">管理員帳號</th>
                  <th class="col-6">管理員密碼</th>
                  <th class="col-6">管理權限</th>
                  <?php } ?>
                </tr>
                </thead>
                <tbody>
                <?php while($admRow = $adm->fetch()){?>
                  <tr>
                    <?php if($_SESSION['admNo'] != 1){?>
                    <td class="col-5" class="admName"><?php echo $admRow['admName']; ?></td>
                    <td class="col-5"><?php echo $admRow['admId']; ?></td>
                    <td class="col-5">
                      <span class="admPswShow">
                        <?php 
                        for($i=0; $i<8; $i++){ 
                        echo "<i class='material-icons'>fiber_manual_record</i>";
                        }?>
                      </span>
                    </td>
                    <td class="col-5">
                      <span class="admPowerShow">
                        <?php
                        if($admRow['admPower'] == 0){
                          echo '0. 停權';
                        }else if($admRow['admPower'] == 1){
                          echo '1. 一般';
                        }else if($admRow['admPower'] == 2){
                          echo '2.ROOT';
                        }
                        ?> 
                      </span>           
                    </td>   
                    <td class="col-4">
                        <a href="back_adminEdit.php?admNo=<?php echo $admRow['admNo']?>" class="edit"><i class="material-icons">edit</i></a>
                      </form>   
                    </td>    
                    <?php }else{  ?>
                    <td class="col-6"><?php echo $admRow['admName']; ?></td>
                    <td class="col-6"><?php echo $admRow['admId']; ?></td>
                    <td class="col-6">
                      <span class="admPswShow">
                        <?php 
                        for($i=0; $i<8; $i++){ 
                          echo "<i class='material-icons'>fiber_manual_record</i>";
                        }?>
                      </span>
                    </td>
                    <td class="col-6">    
                      <?php
                      if($admRow['admPower'] == 0){
                        echo '0. 停權';
                      }else if($admRow['admPower'] == 1){
                        echo '1. 一般';
                      }else if($admRow['admPower'] == 2){
                        echo '2.ROOT';
                      }
                      ?>      
                    </td>
                    <?php } ?>
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