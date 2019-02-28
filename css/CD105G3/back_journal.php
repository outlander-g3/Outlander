<?php
session_start();

//===========================自己的php開始=======================

try{
include_once('connectDb.php');

//先撈資料
$sql="select * from report";
$report=$pdo->query($sql);



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
  <title>山行者後台 - 被檢舉日誌清單</title>
  <!-- 可自行更動區塊 -->

<!-- ===========================自己的css開始======================= -->
<style>
a.jnTitle{
  text-decoration:underline;
  color:#088B9A;
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
            <span>登山日誌管理</span>
            <i class="material-icons">keyboard_arrow_right</i>
            <span id="currentLoc">被檢舉日誌清單</span>
          </div>
          <div class="tablearea">
            <div class="tab">
              <button class="tablinks active" value="reportList">被檢舉日誌清單</button>
            </div>

            <div id="reportList" class="tabcontent active">
              <table>
                <tr>
                  <th class="col-3">檢舉編號</th>
                  <th class="col-8">被檢舉日誌標題</th>
                  <th class="col-7">理由</th>
                  <th class="col-3">審核結果</th>
                  <th class="col-3">處理</th>
                </tr>
                <!-- 開始動態生成 -->
                <?php while($rows=$report->fetchObject()){
                  //要特別去撈日誌標題
                  $sqlJn="select j.jnTitle from journal j,report r where j.jnNo=".$rows->jnNo;
                  $jn=$pdo->query($sqlJn);
                  $jnTitle=$jn->fetchObject();
                  //檢舉結果的顯示
                  $result=$rows->result;
                  if($result==1){
                    $result='屏蔽';
                  }
                  else{
                    $result="不屏蔽";
                  }
                  ?>
                <tr id="rptNo<?php echo $rows->rptNo;?>">    
                  <td class="col-3"><?php echo $rows->rptNo;?></td>
                  <td class="col-8"><a class="jnTitle" href="jn.php?jnNo=<?php echo $rows->jnNo;?>"><?php echo $jnTitle->jnTitle;?></a></td>
                  <td class="col-7"><?php echo $rows->reason;?></td>
                  <td class="col-3 result"><?php echo $result;?></td>
                  <td class="col-3">
                    <a href="#"><i class="edit material-icons">edit</i></a>
                  </td>
                </tr>
                <?php }
                }catch (PDOException $e) {
        echo "失敗",$e->getMessage(),"<br>";
        echo "行號",$e->getLine();
    }?>




<!-- ===========================各分頁內容結束(可填寫區塊結束)======================= -->
        </div>
      </div>
    </div>
  </section>
</body>
</html>
<script src="js/back_model.js"></script>
<!-- ===========================自己的js開始======================= -->

<script src="js/back_journal.js"></script>



<!-- ===========================自己的js結束======================= -->
