<?php
session_start();

//===========================自己的php開始=======================
try{
  require_once('connectDb.php');
  if(isset($_REQUEST['scnNo'])){
    $scnNo = $_REQUEST['scnNo'];
    $sql = "select c.pdkNo, a.* 
    from scenery a join scenerylist b on a.scnNo=b.scnNo
    join productkind c on b.pdkNo=c.pdkNo
    where a.scnNo={$scnNo}";
    $scn = $pdo->query($sql);
    $scnRow = $scn->fetch(PDO::FETCH_ASSOC);
    $iconList = explode("|", $scnRow['iconList']);
  }
  $sql = 'select pdkNo, mt from productkind where pdkNo != 0';
  $pdk = $pdo -> query($sql);
} catch (PDOException $e) {
  echo "錯誤 : ", $e -> getMessage(), "<br>";
  echo "行號 : ", $e -> getLine(), "<br>";
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
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <link rel="stylesheet" href="css/back_model.css">
  <script src="js/jquery-3.3.1.min.js"></script>

  <!-- 可自行更動區塊 -->
  <title>山行者後台 - 編輯行程景點</title>
  <link rel="Shortcut Icon" type="image/x-icon" href="img/logo.png">
  <!-- 可自行更動區塊 -->

<!-- ===========================自己的css開始======================= -->
<style>
.scnImg{
  width: 300px;
}
.scnImg img{
  width: 100%;
}
.col-20 .col-2{
  display: inline-block;
}
.col-2 label{
  text-align: left;
}
.material-icons{
  font-size: 20px;
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
            <span>行程管理</span>
            <i class="material-icons">keyboard_arrow_right</i>
            <span>行程種類管理</span>
            <i class="material-icons">keyboard_arrow_right</i>
            <a href="back_pdk.php">行程種類</a>
            <i class="material-icons">keyboard_arrow_right</i>
            <span id="currentLoc">編輯行程景點</span>
          </div>
          <form action="back_pdkScenePointEdit_update.php" method="post" enctype="multipart/form-data">
            <div class="editArea">
              <?php if(isset($scnNo)){?>
              <input type="hidden" name="scnNo" value="<?php echo $scnNo;?>">
              <input type="hidden" name="pdkOri" value="<?php echo $scnRow['pdkNo'];?>">
              <?php }?>
              <div class="row">
                <div class="col-4">
                  <label>山岳</label>
                </div>
                <div class="col-20">
                  <select name="pdkNo" required>
                    <option value="">請選擇山岳</option>
                    <?php while($pdkRow = $pdk->fetch(PDO::FETCH_ASSOC)){?>
                    <option value="<?php echo $pdkRow['pdkNo'];?>"
                    <?php if(isset($scnNo)){
                      if($scnRow['pdkNo'] == $pdkRow['pdkNo']){
                        echo 'selected';
                      }
                    }?>
                    ><?php echo $pdkRow['mt'];?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="col-4">
                  <label>景點標題</label>
                </div>
                <div class="col-20">
                  <input type="text" name="scnTitle" value="<?php if(isset($scnNo)){
                    echo $scnRow["scnTitle"];}?>" placeholder="請輸入景點標題" required>
                </div>
              </div>
              <div class="row">
                <div class="col-4">
                  <label>景點文章</label>
                </div>
                <div class="col-20">
                    <textarea name="scnCont" cols="100" rows="10" required><?php if(isset($scnNo)){
                    echo $scnRow["scnCont"];}?></textarea>
                </div>
              </div>
              <?php if(isset($scnNo)){?>

              <div class="row">
                <div class="col-4">
                  <label>景點圖片</label>
                </div>
                <div class="col-20">
                  <input type="file" placeholder="請選擇檔案" name="scnImg" id="scnImg">
                  <div class="scnImg">
                    <img id="imgPreview" src="<?php if(isset($scnNo)){ if($scnRow['scnImg'] != ''){?>img/mt/<?php echo $scnRow['pdkNo']; ?>/scn/<?php echo $scnRow['scnImg'];}} ?>" alt="">
                  </div>
                </div>
              </div>
              <?php }?>
              <div class="row">
                <div class="col-4">
                  <label>icon列表</label>
                </div>
                <div class="col-20">
                  <div class="col-2">
                    <label>
                      <input type="checkbox" name="iconList[]" value="restaurant"<?php
                      if(isset($iconList)){
                        for($i=0; $i<count($iconList); $i++){
                          if($iconList[$i] == 'restaurant'){
                            echo 'checked';
                          }
                        }
                      };?>>
                      <i class="material-icons">restaurant</i>
                    </label>
                  </div>
                  <div class="col-2">
                    <label>
                        <input type="checkbox" name="iconList[]" value="hotel"<?php
                        if(isset($iconList)){
                          for($i=0; $i<count($iconList); $i++){
                            if($iconList[$i] == 'hotel'){
                              echo 'checked';
                            }
                          }
                        };?>>
                        <i class="material-icons">hotel</i>
                    </label>
                  </div>
                  <div class="col-2">
                    <label>
                        <input type="checkbox" name="iconList[]" value="fa-tint"<?php
                        if(isset($iconList)){
                          for($i=0; $i<count($iconList); $i++){
                            if($iconList[$i] == 'fa-tint'){
                              echo 'checked';
                            }
                          }
                        };?>>
                        <i class="fas fa-tint"></i>
                    </label>
                  </div>
                  <div class="col-2">
                    <label>
                      <input type="checkbox" name="iconList[]" value="fa-campground"<?php
                      if(isset($iconList)){
                        for($i=0; $i<count($iconList); $i++){
                          if($iconList[$i] == 'fa-campground'){
                            echo 'checked';
                          }
                        }
                      };?>>
                      <i class="fas fa-campground"></i>
                    </label>
                  </div>
                </div>
              </div>
              <input type="hidden" name="from" id="from" value="<?php echo $_SESSION['from']; ?>">
            </div>
            <div class="confirmArea">
              <button class="btn btnCancel" id="btnCancel">取消</button>
              <button class="btn btnSubmit" id="btnSubmit">確認修改</button>
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
<script>
window.addEventListener("load", ()=>{
  btnCancel = document.getElementById("btnCancel");
  btnCancel.addEventListener("click", (e)=>{
    e.preventDefault();
    location.href = document.getElementById('from').value;
  });
  scnImg = document.getElementById('scnImg');
  imgPreview = document.getElementById('imgPreview');
  if(scnImg != null){
  scnImg.addEventListener("change", (e)=>{
      var file = e.target.files[0];
      var reader = new FileReader();
      reader.onload = function(){
        imgPreview.src = reader.result;
      }
      reader.readAsDataURL(file);
    })
  }
})
</script>




<!-- ===========================自己的js結束======================= -->
