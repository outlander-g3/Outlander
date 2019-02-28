<?php
session_start();

//===========================自己的php開始=======================
require_once("connectDb.php");
$sql = "SELECT * FROM `tech`";
$products = $pdo->query($sql); 
$products -> bindColumn("techNo",$techNo);
$products -> bindColumn("techOrd",$techOrd);
$products -> bindColumn("techTitle",$techTitle);
// include_once('connectDb.php'); //連線
    // include_once('session.php'); //判斷會員是否登入

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
  <title>山行者後台 -登山技巧清單</title>
  <!-- 可自行更動區塊 -->

<!-- ===========================自己的css開始======================= -->
 <style>
/*.tdform{
  display:flex;
  width:100%;    
  justify-content:space-evenly;
}*/
.tdform button{
  border:unset;
  background:#fff;
}
.edit{
  color:#484848;
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
      <span>登山技巧管理</span>
      <i class="material-icons">keyboard_arrow_right</i>
      <span id="currentLoc">登山技巧清單</span>
  </div>
      <div class="tablearea">
          <div class="tab">
            <button class="tablinks active" value="itineraryType">登山技巧管理</button>
          </div>
          <a href="back_techEdit_update.php" id="addItem" class="btn-main-s">新增項目</a>
            <div id="itineraryType" class="tabcontent active">
              <table>
                <tr>
                  <th class="col-5">技巧編號</th>
                  <th class="col-10">技巧名稱</th>
                  <th class="col-5">排列順序</th>
                  <th class="col-4">處理</th>
                </tr>
                <?php while($products->fetch(PDO::FETCH_ASSOC)){ ?>  
                <tr>
                  <td class="col-5"><?php echo $techNo;?></td>
                  <td class="col-10"><?php echo $techTitle;?></td>
                  <td class="col-5"><?php echo $techOrd;?></td>
                  <td class="col-4 tdform">

                    <form action="back_techEdit.php">

                        <input type="hidden" name="techNo" value="<?php echo $techNo?>"><a href="back_techEdit.php?techNo=<?php echo $techNo; ?>"><i class='edit material-icons'>edit</i></a>

                     


                    </form>

                  </td>
                </tr>
              
              <?php } ?>  

                
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
