<?php
session_start();
$_SESSION["from"] = $_SERVER['PHP_SELF'];

//===========================自己的php開始=======================
try{
    require_once('connectDb.php');
    $sql= "select * from productkind where pdkName <> '其他' ";
    $pdk = $pdo -> query($sql);

    $sql = "select * from scenery";
    $scn = $pdo -> query($sql);
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
  <link rel="stylesheet" href="css/back_model.css">
  <script src="js/jquery-3.3.1.min.js"></script>

  <!-- 可自行更動區塊 -->
  <title>山行者後台 - 行程種類</title>
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
            <span>行程種類管理</span>
            <i class="material-icons">keyboard_arrow_right</i>
            <span id="currentLoc">行程種類</span>
        </div>
          <div class="tablearea">
            <div class="tab">
              <button class="tablinks active" value="itineraryType">行程種類</button>
              <!-- <button class="tablinks" value="viewList">行程景點清單</button> -->
              <button class="tablinks" value="itineraryView">景點</button>
            </div>
            <a href="javascript:;" id="addItem" class="btn-main-s">新增項目</a>
            <div id="itineraryType" class="tabcontent active">
              <table>
                <tr>
                  <th class="col-3">編號</th>
                  <th class="col-8">名稱</th>
                  <th class="col-3">行程類型</th>
                  <th class="col-5">行程種類狀態</th>
                  <th class="col-5">處理</th>
                </tr>
                <?php	
                  while($pdkRow = $pdk->fetch(PDO::FETCH_ASSOC)){
                ?>
                <tr>
                  <td class="col-3"><?php echo $pdkRow['pdkNo']; ?></td> 
                  <td class="col-8"><?php echo $pdkRow['pdkName']; ?></td>
                  <td class="col-3"><?php  if($pdkRow['pdkType']==1){
                      echo "1.官方";
                  }else{
                      echo "2.客製";
                  }
                  ;?>
                  </td>
                  <td class="col-5">
                  <?php  if($pdkRow['pdkStatus']==1){
                      echo "已上架";
                  }else{
                      echo "未上架";
                  }
                  ;?>
                  </td>
                  <td class="col-5">
                    <a href="back_pdkEdit.php?pdkNo=<?php echo $pdkRow["pdkNo"]?>"><i class="edit material-icons">edit</i></a>
                    <!-- <a href="#"><i class="delete material-icons">delete</i></a> -->
                  </td>
                </tr>
              <?php 
              }
              ?>
              </table>
            </div>
            
            <!-- <div id="viewList" class="tabcontent">
              <table>
                <tr>
                  <th class="col-8">行程種類名稱</th>
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
                    <a href=back_pdkSceneEdit.php><i class="edit material-icons">edit</i></a>
                    <a href="#"><i class="delete material-icons">delete</i></a>
                  </td>
                </tr>
              </table>
            </div> -->
            
            <div id="itineraryView" class="tabcontent">
              <table>
                    <tr>
                      <th class="col-6">景點編號</th>
                      <th class="col-12">景點標題</th>
                      <th class="col-6">處理</th>
                    </tr>
                    <?php while($scnRow = $scn->fetch(PDO::FETCH_ASSOC)){?>
                    <tr>
                      <td class="col-6"><?php echo $scnRow['scnNo']; ?></td>
                      <td class="col-12"><?php echo $scnRow['scnTitle']; ?></td>
                      <td class="col-6">
                        <a href="back_pdkScenePointEdit.php?scnNo=<?php echo $scnRow['scnNo']?>"><i class="edit material-icons">edit</i></a>
                        <!-- <a href="back_pdkScenePointEdit_update.php?scnNo=<?php echo $scnRow['scnNo']?>"><i class="delete material-icons">delete</i></a> -->
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
<script>
  //only fu
function clickDiffPage(e){
  e.preventDefault;
  let tablinkSelected = document.querySelector('.tablinks.active');
  if(tablinkSelected.value == 'itineraryType'){
    location.href = 'back_pdkEdit.php';
  }else if(tablinkSelected.value == 'viewList'){
    location.href = 'back_pdkSceneEdit.php';
  }else if(tablinkSelected.value == 'itineraryView'){
    location.href = 'back_pdkScenePointEdit.php';
  }
  console.log(tablinkSelected.value);
}

window.addEventListener("load", ()=>{
  //only FU
  addItem = document.getElementById("addItem");
  addItem.addEventListener('click', clickDiffPage);
})

</script>




<!-- ===========================自己的js結束======================= -->
