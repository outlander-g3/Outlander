<?php
session_start();
// $techNo = $_REQUEST["techNo"];
//===========================自己的php開始=======================
require_once("connectDb.php");

$sql = "SELECT * FROM tech where techNo=:techNo";

$products = $pdo->prepare($sql); 
$products->bindValue(":techNo", $_REQUEST["techNo"]); 
$products->execute(); 


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
  <title>山行者後台 -登山技巧管理</title>
  <!-- 可自行更動區塊 -->

<!-- ===========================自己的css開始======================= -->
 <style>
.tdform{
  display:flex;
  width:100%;    
  justify-content:space-evenly;
}
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
    <a href="back_tech.php">登山技巧清單</a>
    <i class="material-icons">keyboard_arrow_right</i>
    <span id="currentLoc">編輯登山技巧</span>
</div>
          
        <form action="back_tech.php">

          <?php while($prodRow = $products->fetch(PDO::FETCH_ASSOC)){ ?>
            <div class="editArea">
              <div class="row">
                <div class="col-4">
                  <label for="">登山技巧編號</label>
                </div>
                <div class="col-20">
                 <span><?php echo $prodRow["techNo"];?></span>
                  <!-- <input type="text" value="30001"> -->
                </div>
              </div>
              <div class="row">
                <div class="col-4">
                  <label for="">登山技巧名稱</label>
                </div>
                <div class="col-20">

                  <input type="text" name="techTitle" value="<?php echo $prodRow["techTitle"]; ?>">
                 <!--  <span></span> -->
                </div>
              </div>
              
              <div class="row">
                <div class="col-4">
                  <label for="">技巧內容</label>
                </div>
                <div class="col-20">
                  <textarea type="text" name="techCont"><?php echo $prodRow["techCont"]; ?></textarea>
                  <!-- <span></span> -->
                </div>
              </div>

             
            </div>

            

        

            <div class="confirmArea">
              <button class="btn btnCancel">取消</button>
              <button class="btn btnSubmit">確認修改</button>
            </div>
          <?php }?>
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
