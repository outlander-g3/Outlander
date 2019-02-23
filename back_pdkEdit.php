<?php
session_start();

//===========================自己的php開始=======================
try{
  require_once('connectDb.php');
    if(isset($_REQUEST['pdkNo'])){ // 有值要做的事
      $pdkNo = $_REQUEST['pdkNo'];
      $sql = 'select *
      from productkind where pdkNo=:pdkNo';//名稱、編號
      $pdkchecked = $pdo->prepare($sql);
      $pdkchecked->bindValue(':pdkNo',$pdkNo);
      $pdkchecked->execute();
      $pdkcheckedRow=$pdkchecked->fetch(PDO::FETCH_ASSOC);

      //
      $sql= 'select b.tagNo from `productkind` a join `producttag` b on a.pdkNo = b.pdkNo where  b.pdkNo=:pdkNo';//抓該行程種類的標籤內容
      $pdkTag = $pdo->prepare($sql);
      $pdkTag ->bindValue(':pdkNo',$pdkNo);
      $pdkTag ->execute();
      $pdkTagChecked = [];
      while($pdkTagRow = $pdkTag->fetch(PDO::FETCH_ASSOC)){
        array_push($pdkTagChecked, $pdkTagRow['tagNo']);
      }
    }
  
  $sql = 'select pdkName,pdkNo
  from productkind';//名稱、編號
  $pdk = $pdo->query($sql);
  
  $sql = 'select * from tag';
  $tag = $pdo->query($sql);
  // $sql = 'select a.pdkNo, b.tagNo, a.pdkName from `productkind` a join `producttag` b on a.pdkNo = b.pdkNo';
  // $pdkTag = $pdo -> query($sql);
  // $pdkTagRow = $pdkTag->fetch(PDO::FETCH_ASSOC);
  

 





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
  <title>山行者後台 - 編輯行程種類</title>
  <!-- 可自行更動區塊 -->

<!-- ===========================自己的css開始======================= -->
<style>
.col-20 label{
  text-align: left;
  display: inline;
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
            <span id="currentLoc">編輯行程種類</span>
          </div>
          <form action="back_pdkEdit_update.php" method="post" enctype="multipart/form-data">
            <div class="editArea">
            <!-- 行程名稱編號 -->
              <!-- <div class="row">
                <div class="col-4">
                  <label for="pdkno">行程種類</label>
                </div>
                <div class="col-20">
                  <select name="pdkName" id="">
                    <option value="NULL" 
                    <?php 
                    if (isset($pdkNo) === false){
                      echo 'selected';
                    };?>>請選擇行程種類</option>
                    <?php while($pdkRow = $pdk->fetch(PDO::FETCH_ASSOC)){
                    ?>
                      <option value="<?php $pdkRow['pdkNo'];?>"
                        <?php
                        if (isset($pdkNo)){
                          if($pdkRow['pdkNo'] == $pdkNo){
                            echo 'selected';
                          }
                        };  
                        ?>>
                        <?php echo $pdkRow['pdkNo'];?>. <?php echo $pdkRow['pdkName'];?>
                      </option>
                    <?php
                    }   
                    ?>
                  </select>   
                </div>
              </div> -->
              <div class="row">
                <div class="col-4">
                  <label for="pdkno">行程種類</label>
                </div>
                <div class="col-20">
                  <input type="text" name="pdkName" placeholder="請輸入行程名稱" value="<?php if(isset($pdkNo)){
                    echo $pdkcheckedRow['pdkName'];
                  }; ?>" required>
                </div>
              </div>
              <!-- 山名 -->
              <div class="row">
                <div class="col-4">
                  <label for="pdkno">山岳名稱</label>
                </div>
                <div class="col-20">
                  <input type="text" name="mt"placeholder="請輸入山岳名稱" value="<?php if (isset($pdkNo)){
                    echo $pdkcheckedRow['mt'];
                  }; ?>" required>
                </div>
              </div>
              <!-- 價格 -->
              <div class="row">
                <div class="col-4">
                  <label for="pdkno">行程價格</label>
                </div>
                <div class="col-20">
                  <input type="text" name="pdkPrice"placeholder="請輸入價格" value="<?php if (isset($pdkNo)){
                    echo $pdkcheckedRow['pdkPrice'];
                    };?>元" required>
                </div>
              </div>
              <!-- 圖片 -->
              <div class="row">
                <div class="col-4">
                  <label for="">行程圖片列表</label>
                </div>
                <div class="col-20">
                  <input type="file" name="pdkImg" placeholder="請選擇檔案" multiple>
                </div>
              </div>
              <!-- 行程座標 -->
              <div class="row">
                <div class="col-4">
                  <label for="">行程座標</label>
                </div>
                <div class="col-20">
                  <input type="text"name="lat"placeholder="緯度" 
                  value="<?php 
                  if(isset($pdkNo)){
                    echo $pdkcheckedRow['lat'];
                  }; ?>"required>
                  <input type="text" name="lon" placeholder="經度"
                  value="<?php if(isset($pdkNo)){
                    echo $pdkcheckedRow['lon'];
                  }; ?>"required>
                </div>
              </div>
              <!-- 行程種類狀態 -->
              <div class="row">
                <div class="col-4">
                  <label for="">行程種類狀態</label>
                </div>
                <div class="col-20">
                  <select name="pdkStatus" id="pdStatus">
                  <option value="NULL"
                        <?php 
                        if(isset($pdkNo) === false){
                          echo 'selected';
                        };?>>請選擇狀態</option>
                    <option value="1"
                    <?php
                      if(isset($pdkNo)){
                        if($pdkcheckedRow['pdkStatus'] == 1){
                          echo 'selected';
                        };
                      };
                    ?>
                    >1.上架</option>
                    <option value="0"
                    <?php
                      if(isset($pdNo)){
                        if($pdkcheckedRow['pdkStatus'] == 0){
                          echo 'selected';
                        };
                      };
                    ?>
                    >0.下架</option>
                  </select>
                </div>
              </div>
              <!-- 行程難易度 -->
              <div class="row">
                <div class="col-4">
                  <label for="">難易度</label>
                </div>
                <div class="col-20">
                  <select name="level" id="level" name="level">
                    <option value="NULL"
                    <?php 
                    if (isset($pdkNo) === false){
                      echo 'selected';
                    };?>>請選擇難易度</option>
                    <option value="1" 
                    <?php    
                    if(isset($pdkNo)){
                      if($pdkcheckedRow['level'] == 1){
                        echo 'selected';
                      };
                    };
                    ?>
                    >1. 易</option>
                    <option value="2"
                    <?php
                     if(isset($pdkNo)){
                      if($pdkcheckedRow['level'] == 2){
                        echo 'selected';
                      };
                    };
                    ?>
                    >2. 中</option>
                    <option value="3"
                    <?php
                     if(isset($pdkNo)){
                      if($pdkcheckedRow['level'] == 2){
                        echo 'selected';
                      };
                    };
                    ?>>3. 難</option>
                  </select>
                </div>
              </div>
              <!-- 選擇洲名 -->
              <div class="row">
                <div class="col-4">
                  <label for="">洲名</label>
                </div>
                <div class="col-20">
                  <select name="continent" id="">
                    <option value="請選擇洲名"
                    <?php
                    if(isset($pdkNo) === false){
                      echo 'selected';
                    };?>>請選擇洲名
                    </option>
                    <option value="1" 
                    <?php 
                    if (isset($pdkNo)){
                      if ($pdkcheckedRow['continent']==1){
                        echo 'selected';
                      }
                    }
                    ?>
                    >亞洲</option>
                    <option value="2"
                    <?php 
                    if (isset($pdkNo)){
                      if ($pdkcheckedRow['continent']==2){
                        echo 'selected';
                      }
                    }
                    ?>>歐洲</option>
                    <option value="3"
                    <?php 
                    if (isset($pdkNo)){
                      if ($pdkcheckedRow['continent']==3){
                        echo 'selected';
                      }
                    }
                    ?>>非洲</option>
                    <option value="4"
                    <?php 
                    if (isset($pdkNo)){
                      if ($pdkcheckedRow['continent']==4){
                        echo 'selected';
                      }
                    }
                    ?>>大洋洲</option>
                    <option value="5"
                    <?php 
                    if (isset($pdkNo)){
                      if ($pdkcheckedRow['continent']==5){
                        echo 'selected';
                      }
                    }
                    ?>>北美洲</option>
                    <option value="6"
                    <?php 
                    if (isset($pdkNo)){
                      if ($pdkcheckedRow['continent']==6){
                        echo 'selected';
                      }
                    }
                    ?>>南美洲</option>
                    
                  </select>
                </div>
              </div>
              <!-- 天數 -->
              <div class="row">
                <div class="col-4">
                  <label for="">天數</label>
                </div>
                <div class="col-20">
                  <input type="text" name="day" value="<?php if (isset($pdkNo)){
                    echo $pdkcheckedRow['day'];
                  }?>" placeholder="請輸入天數" required>
                </div>
              </div>
              <!-- 行程類型 -->
              <div class="row">
                <div class="col-4">
                  <label for="">行程類型</label>
                </div>
                <div class="col-20">
                  <select name="pdkType" id="">
                    <option value="NULL" 
                    <?php
                    if (isset($pdkNo)==false){
                      echo 'seclected';
                    }
                    ?>>請選擇類型
                    </option>
                    <option value="1" 
                    <?php
                    if (isset($pdkNo)){
                      if($pdkcheckedRow['pdkType']==1){
                        echo'selected';
                      }
                    }
                    ?>
                    >1:官方</option>
                    <option value="2" 
                    <?php
                    if (isset($pdkNo)){
                      if($pdkcheckedRow['pdkType']==2){
                        echo 'selected';
                      }
                    }
                    ?>>2:客製</option>
                  </select>
                </div>
              </div>
              <!-- 行程簡介 -->
              <div class="row">
                <div class="col-4">
                  <label for="pdkno">行程簡介</label>
                </div>
                <div class="col-20">
                  <textarea name="pdkCont" cols="100" rows="10" value="" placeholder="請輸入內容"><?php if (isset($pdkNo)){
                    echo $pdkcheckedRow['pdkCont'];
                  }; ?></textarea>
                </div>
              </div>
              <!-- 費用資訊包含 -->
              <div class="row">
                <div class="col-4">
                  <label for="priceInfoIn">費用資訊包含</label>
                </div>
                <div class="col-20">
                  <textarea name="priceInfoIn" id="" cols="100" rows="10" placeholder="ex:嚮導，500萬責任險...請以逗號區別項目" 
                  value=""><?php if (isset($pdkNo)){
                    echo $pdkcheckedRow['priceInfoIn'];
                  }?></textarea>
                </div>
              </div>
              <!-- 費用資訊不包含 -->
              <div class="row">
                <div class="col-4">
                  <label for="">費用資訊不包含</label>
                </div>
                <div class="col-20">
                  <textarea name="priceInfoEx" id="" cols="100" rows="10" placeholder="ex:小費，護照費用...請以逗號區別項目" required><?php if (isset($pdkNo)){
                    echo $pdkcheckedRow['priceInfoEx'];
                  }?></textarea>
                </div>
              </div>
              <!-- 行程標籤 -->
              <div class="row">
                <div class="col-4">
                  <label for="">行程標籤</label>
                </div>
                <div class="col-20">
                    <?php while($tagRow = $tag->fetch(PDO::FETCH_ASSOC)){ ?>
                    <label>
                    <input type="checkbox" name="tagName" value="<?php echo $tagRow['tagNo'];?>" 
                    <?php 
                    for($i=0; $i<count($pdkTagChecked); $i++){
                      if($pdkTagChecked[$i] == $tagRow['tagNo']){
                        echo "checked";
                        break;
                      }
                    }
                    ?>>
                    <?php echo $tagRow['tagName'];?>
                    </label>

                      <?php } ?>
                      <!-- echo $pdkTagRow['tagNo']; -->
                </div>
            </div>
            <div class="confirmArea">
              <button class="btn btnCancel">取消</button>
              <button class="btn btnSubmit">確認修改</button>
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





<!-- ===========================自己的js結束======================= -->
