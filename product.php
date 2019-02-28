<?php
session_start();
$pdkNo = $_REQUEST['pdkNo'];
try{
  require_once('connectDb.php');
  $sql = 'select a.*, avg(rate) avgRate 
  from productkind a join product b on a.pdkNo = b.pdkNo 
  join `order` c on b.pdNo = c.pdNo 
  where a.pdkNo=:pdkNo and c.ordStatus=1
  group by a.pdkNo';
  $pdk = $pdo->prepare($sql);
  $pdk->bindValue(':pdkNo', $pdkNo);
  $pdk->execute();
  $pdkRow = $pdk->fetch(PDO::FETCH_ASSOC);

  $sql = 'select * 
  from scenerylist a join scenery b on a.scnNo=b.scnNo 
  where a.pdkNo=:pdkNo
  order by scnOrd';
  $scn = $pdo->prepare($sql);
  $scn->bindValue(':pdkNo', $pdkNo);
  $scn->execute();

  $sql = 'select pdNo, pdStart
  from product
  where pdkNo=:pdkNo and pdStart>curdate() and gdNo2 is not null and pdStatus = 1
  order by pdStart asc limit 0,1';
  $pd = $pdo->prepare($sql);
  $pd->bindValue(':pdkNo', $pdkNo);
  $pd->execute();
  $pdRow = $pd->fetch(PDO::FETCH_ASSOC);

  $sql = 'select b.* 
  from product a join guide b on a.gdNo1=b.gdNo 
  where a.pdkNo=:pdkNo and a.pdStart>curdate() and a.gdNo2 is not null and pdStatus = 1
  group by a.gdNo1
  order by pdStart asc limit 0,1';
  $guide1 = $pdo->prepare($sql);
  $guide1->bindValue(':pdkNo', $pdkNo);
  $guide1->execute();
  $guideData1 = $guide1->fetch(PDO::FETCH_ASSOC);

  $sql = 'select b.* 
  from product a join guide b on a.gdNo2=b.gdNo 
  where a.pdkNo=:pdkNo and a.pdStart>curdate() and a.gdNo2 is not null and pdStatus = 1
  group by a.gdNo2
  order by pdStart asc limit 0,1';
  $guide2 = $pdo->prepare($sql);
  $guide2->bindValue(':pdkNo', $pdkNo);
  $guide2->execute();
  $guideData2 = $guide2->fetch(PDO::FETCH_ASSOC);

  $sql = 'select b.*, c.*
  from product a join `order` b on a.pdNo=b.pdNo 
  join member c on b.memNo=c.memNo
  where a.pdkNo=:pdkNo and b.rate is not null and b.ordStatus=1
  order by b.rateDate desc';
  $order = $pdo->prepare($sql);
  $order->bindValue(':pdkNo', $pdkNo);
  $order->execute();

  $sql = 'select a.*, avg(rate) avgRate 
  from productkind a join product b on a.pdkNo = b.pdkNo 
  join `order` c on b.pdNo = c.pdNo 
  where a.pdkNo !=:pdkNo and c.ordStatus=1
  group by a.pdkNo';
  $pdkOther = $pdo->prepare($sql);
  $pdkOther->bindValue(':pdkNo', $pdkNo);
  $pdkOther->execute();
  if(isset($_SESSION['pdkNo']) === false || $_SESSION['pdkNo'] != $pdkRow['pdkNo']){
    $_SESSION['pdkNo']=$pdkRow['pdkNo'];
    $_SESSION['pdkName']=$pdkRow['pdkName'];
    $_SESSION['pdStart']=str_replace('/0', '/', str_replace('-', '/', $pdRow['pdStart']));
    $_SESSION['pdEnd']=str_replace('/0', '/', str_replace('-', '/', date("Y-m-d",strtotime($pdRow['pdStart']."+".($pdkRow['day']-1)." day"))));
    $_SESSION['day']=$pdkRow['day'];
    $_SESSION['pdkPrice']=number_format($pdkRow['pdkPrice']);
    $_SESSION['where']=$_SERVER["PHP_SELF"];
    $_SESSION['pdNo']=$pdRow['pdNo'];
  }
}catch (PDOException $e) {
  echo "失敗",$e->getMessage(),"<br>";
  echo "行號",$e->getLine();
}
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.6/css/swiper.min.css">
  <link rel="stylesheet" href="css/style.css">
  <!-- <link rel="stylesheet" href="css/robot.css"> -->
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/vue.min.js"></script>
  <!-- <script src="js/owl.carousel.js"></script>
  <script src="js/app.js"></script>
  <script src="js/highlight.js"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.6/js/swiper.min.js"></script>
  <link rel="stylesheet" href="css/product.css">
  <title>山行者 - <?php echo $pdkRow['pdkName'] ?></title>
  <link rel="Shortcut Icon" type="image/x-icon" href="img/logo.png">
</head>
<body>
  <?php include_once('header.php'); ?>
  <div class="product__main">
    <div class="product__imgContainer">
      <!-- Full-width images with number and caption text -->
      <?php 
      $pdkImg = explode("|", $pdkRow['pdkImg']);
      for($i=0; $i<count($pdkImg); $i++){
      ?>
      <div class="product__img fade">
      <img src="img/mt/<?php echo $pdkRow['pdkNo']?>/<?php echo $pdkImg[$i]?>">
      </div> 
      <?php
      }?>
      <!-- Next and previous buttons -->
      <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
      <a class="next" onclick="plusSlides(1)">&#10095;</a>
      <!-- The dots/circles -->
      <div class="dot__group">
        <?php 
        $pdkImg = explode("|", $pdkRow['pdkImg']);
        for($i=1; $i<=count($pdkImg); $i++){
        ?>
        <span class="dot" onclick="currentSlide(<?php echo $i; ?>)"></span>
        <?php
        }?>
      
      </div>
    </div>
    <div class="product__info">
      <h1><?php echo $pdkRow['pdkName']?></h2>
      <p>洲&nbsp&nbsp&nbsp名 : 
        <span>
          <?php 
          $arr = ['亞洲','歐洲','非洲','大洋洲','北美洲','南美洲'];
          for($i=0; $i<count($arr); $i++){
            if(($pdkRow['continent']-1) == $i){
              echo $arr[$i];
            }
          }
          ?>
        </span>
      </p>
      <p>天&nbsp&nbsp&nbsp數 : 
        <span><?php echo $pdkRow['day']?>天</span>
      </p>
      <p>難易度 : 
        <span>
          <?php for($i=0; $i<$pdkRow['level']; $i++){ ?>
          <i class="fas fa-hiking"></i>
          <?php } ?>
        </span>
      </p>
      <p>評&nbsp&nbsp&nbsp價 : 
        <span>
          <?php for($i=0; $i<floor($pdkRow['avgRate']); $i++){ ?>
          <img src="img/tree_j.png" alt="rate">
          <?php } 
          if($pdkRow['avgRate']*10%10 != 0){
          ?>
          <img src="img/tree_f_h.png" class="tree_half" alt="rate">
          <?php
          }?>
          <span><?php echo number_format($pdkRow['avgRate'],1)?> (<?php echo $order->rowCount()?>)</span>
        </span>
      </p>
      <p class="product__price">NTD <?php echo number_format($pdkRow['pdkPrice']); ?></p>
      <button class="btn-main-s checkTime">查看時間</button>
    </div>
  </div>
  <div id="breadcrumb">
    <a href="index.html">首頁</a>
    <i class="material-icons">keyboard_arrow_right</i>
    <a href="productsOverview.php">登山行程</a>
    <i class="material-icons">keyboard_arrow_right</i>
    <span><?php echo $pdkRow['pdkName']?></span>
    <p style="display:none" id="pdkNo"><?php echo $pdkRow['pdkNo']?></p>
    <p style="display:none" id="day"><?php echo $pdkRow['day']?></p>
  </div>

  <div id="product__submenu">
    <div class="product__wrap">
      <ul>
        <li><a href="#product__itineraryTitle">行程介紹</a></li>
        <li><a href="#product__routeTitle">路線介紹</a></li>
        <li><a href="#product__timeTitle">行程時間</a></li>
        <li><a href="#product__guideTitle">嚮導介紹</a></li>
        <li><a href="#product__reviewTitle">旅客評價</a></li>
      </ul>
      <div class="product__submenuPrice">
        <p class="product__price">NTD <?php echo number_format($pdkRow['pdkPrice']); ?></p>
        <button class="btn-main-s checkTime">查看時間</button>
      </div>
    </div>
  </div>

  <section class="product__wrap">
    <h2 id="product__itineraryTitle">行程介紹</h2>
    <div class="product__itinerary">
      <p><?php echo $pdkRow['pdkCont']?></p>
      <span id='lat'><?php echo $pdkRow['lat']?></span>
      <span id='lon'><?php echo $pdkRow['lon']?></span>
      <div id="stage"></div>
          <svg class="thunder-cloud" viewBox="0 0 512 512" style='display:none'>
            <path d="M400,64c-5.3,0-10.6,0.4-15.8,1.1C354.3,24.4,307.2,0,256,0s-98.3,24.4-128.2,65.1c-5.2-0.8-10.5-1.1-15.8-1.1
            C50.2,64,0,114.2,0,176s50.2,112,112,112c13.7,0,27.1-2.5,39.7-7.3c12.3,10.7,26.2,19,40.9,25.4l24.9-24.9
            c-23.5-7.6-44.2-21.3-59.6-39.9c-13,9.2-28.8,14.7-45.9,14.7c-44.2,0-80-35.8-80-80s35.8-80,80-80c10.8,0,21.1,2.2,30.4,6.1
            C163.7,60.7,206.3,32,256,32s92.3,28.7,113.5,70.1c9.4-3.9,19.7-6.1,30.5-6.1c44.2,0,80,35.8,80,80s-35.8,80-80,80
            c-17.1,0-32.9-5.5-45.9-14.7c-10.4,12.5-23.3,22.7-37.6,30.6L303,312.2c20.9-6.6,40.5-16.9,57.3-31.6c12.6,4.8,26,7.3,39.7,7.3
            c61.8,0,112-50.2,112-112S461.8,64,400,64z" />
            <polygon class="bolt" points="192,352 224,384 192,480 288,384 256,352 288,256 " />
          </svg>
          <svg class='snow-cloud' viewBox='0 0 512 512' style='display:none'>
              <path d='M512,176c0-61.8-50.2-112-112-112c-5.3,0-10.6,0.4-15.8,1.1C354.3,24.4,307.2,0,256,0s-98.3,24.4-128.2,65.1
              c-5.2-0.8-10.5-1.1-15.8-1.1C50.2,64,0,114.2,0,176s50.2,112,112,112c13.7,0,27.1-2.5,39.7-7.3c29,25.2,65.8,39.3,104.3,39.3
              c38.5,0,75.3-14.1,104.3-39.3c12.6,4.8,26,7.3,39.7,7.3C461.8,288,512,237.8,512,176z M354.1,241.3C330.6,269.6,295.6,288,256,288
              c-39.6,0-74.6-18.4-98.1-46.7c-13,9.2-28.8,14.7-45.9,14.7c-44.2,0-80-35.8-80-80s35.8-80,80-80c10.8,0,21.1,2.2,30.4,6.1
              C163.7,60.7,206.3,32,256,32s92.3,28.7,113.5,70.1c9.4-3.9,19.7-6.1,30.5-6.1c44.2,0,80,35.8,80,80s-35.8,80-80,80
              C382.9,256,367.1,250.5,354.1,241.3z' />
          
              <path class='snowflake-one' d='M131.8,349.9c-1.5-5.6-7.3-8.9-12.9-7.4l-11.9,3.2c-1.1-1.5-2.2-3-3.6-4.4c-1.4-1.4-2.9-2.6-4.5-3.6l3.2-11.9
            c1.5-5.6-1.8-11.4-7.4-12.9c-5.6-1.5-11.4,1.8-12.9,7.4l-3.2,12.1c-3.8,0.3-7.5,1.2-10.9,2.9l-8.8-8.8c-4.1-4.1-10.8-4.1-14.8,0
            c-4.1,4.1-4.1,10.8,0,14.9l8.8,8.8c-1.6,3.5-2.6,7.2-2.9,11l-12,3.2c-5.6,1.5-9,7.2-7.5,12.9c1.5,5.6,7.3,8.9,12.9,7.4l11.9-3.2
            c1.1,1.6,2.2,3.1,3.7,4.5c1.4,1.4,2.9,2.6,4.4,3.6l-3.2,11.9c-1.5,5.6,1.8,11.4,7.4,12.9c5.6,1.5,11.3-1.8,12.8-7.4l3.2-12
            c3.8-0.3,7.5-1.3,11-2.9l8.8,8.8c4.1,4.1,10.7,4,14.8,0c4.1-4.1,4.1-10.7,0-14.8l-8.8-8.8c1.7-3.5,2.7-7.2,2.9-11l12.1-3.2
            C130,361.3,133.3,355.6,131.8,349.9z M88.6,371c-4.1,4.1-10.8,4.1-14.9,0c-4.1-4.1-4.1-10.8,0-14.8c4.1-4.1,10.8-4.1,14.9,0
            S92.6,366.9,88.6,371z' />
              <path class='snowflake-two' d='M304.8,437.6l-12.6-7.2c0.4-2.2,0.7-4.4,0.7-6.7c0-2.3-0.3-4.5-0.7-6.7l12.6-7.2c5.9-3.4,7.9-11,4.5-16.8
            c-3.4-5.9-10.9-7.9-16.8-4.5l-12.7,7.3c-3.4-2.9-7.2-5.2-11.5-6.7v-14.6c0-6.8-5.5-12.3-12.3-12.3s-12.3,5.5-12.3,12.3V389
            c-4.3,1.5-8.1,3.8-11.5,6.7l-12.7-7.3c-5.9-3.4-13.5-1.4-16.9,4.5c-3.4,5.9-1.4,13.4,4.5,16.8l12.5,7.2c-0.4,2.2-0.7,4.4-0.7,6.7
            c0,2.3,0.3,4.5,0.7,6.7l-12.5,7.2c-5.9,3.4-7.9,11-4.5,16.9s10.9,7.9,16.8,4.5l12.7-7.3c3.4,2.9,7.2,5.1,11.5,6.7V473
            c0,6.8,5.5,12.3,12.3,12.3s12.3-5.5,12.3-12.3v-14.6c4.3-1.5,8.2-3.8,11.5-6.7l12.7,7.3c5.9,3.4,13.4,1.4,16.8-4.5
            C312.8,448.6,310.7,441.1,304.8,437.6z M256,436c-6.8,0-12.3-5.5-12.3-12.3c0-6.8,5.5-12.3,12.3-12.3s12.3,5.5,12.3,12.3
            C268.3,430.5,262.8,436,256,436z' />
              <path class='snowflake-three' d='M474.2,396.2l-12.1-3.2c-0.3-3.8-1.2-7.5-2.9-11l8.8-8.8c4.1-4.1,4.1-10.8,0-14.9c-4.1-4.1-10.7-4.1-14.8,0
            l-8.8,8.8c-3.5-1.6-7.1-2.6-11-2.9l-3.2-12.1c-1.5-5.6-7.2-8.9-12.9-7.4c-5.6,1.5-8.9,7.3-7.4,12.9l3.2,11.9
            c-1.6,1.1-3.1,2.3-4.5,3.7c-1.4,1.4-2.5,2.9-3.6,4.5l-11.9-3.2c-5.6-1.5-11.4,1.9-12.9,7.4c-1.5,5.6,1.9,11.4,7.4,12.9l12,3.2
            c0.3,3.8,1.3,7.5,3,11l-8.8,8.8c-4.1,4.1-4.1,10.7,0,14.8c4.1,4.1,10.7,4.1,14.8,0l8.8-8.8c3.5,1.7,7.2,2.7,11,3l3.2,12
            c1.5,5.6,7.2,8.9,12.9,7.4c5.6-1.5,9-7.2,7.5-12.9l-3.2-11.9c1.5-1.1,3-2.2,4.5-3.6c1.4-1.4,2.5-2.9,3.6-4.5l11.9,3.2
            c5.6,1.5,11.4-1.9,12.9-7.4C483.1,403.5,479.8,397.8,474.2,396.2z M438.3,402.9c-4.1,4.1-10.8,4.1-14.9,0c-4.1-4.1-4.1-10.7,0-14.9
            c4.1-4.1,10.8-4.1,14.9,0C442.4,392.2,442.4,398.9,438.3,402.9z' />
            </svg>
          <svg class="rain-cloud" viewBox="0 0 512 512" style='display:none'>
              <path class="raindrop-one" d="M96,384c0,17.7,14.3,32,32,32s32-14.3,32-32s-32-64-32-64S96,366.3,96,384z" />
              <path class="raindrop-two" d="M225,480c0,17.7,14.3,32,32,32s32-14.3,32-32s-32-64-32-64S225,462.3,225,480z" />
              <path class="raindrop-three" d="M352,448c0,17.7,14.3,32,32,32s32-14.3,32-32s-32-64-32-64S352,430.3,352,448z" />
              <path d="M400,64c-5.3,0-10.6,0.4-15.8,1.1C354.3,24.4,307.2,0,256,0s-98.3,24.4-128.2,65.1c-5.2-0.8-10.5-1.1-15.8-1.1
              C50.2,64,0,114.2,0,176s50.2,112,112,112c13.7,0,27.1-2.5,39.7-7.3c29,25.2,65.8,39.3,104.3,39.3c38.5,0,75.3-14.1,104.3-39.3
              c12.6,4.8,26,7.3,39.7,7.3c61.8,0,112-50.2,112-112S461.8,64,400,64z M400,256c-17.1,0-32.9-5.5-45.9-14.7
              C330.6,269.6,295.6,288,256,288c-39.6,0-74.6-18.4-98.1-46.7c-13,9.2-28.8,14.7-45.9,14.7c-44.2,0-80-35.8-80-80s35.8-80,80-80
              c10.8,0,21.1,2.2,30.4,6.1C163.7,60.7,206.3,32,256,32s92.3,28.7,113.5,70.1c9.4-3.9,19.7-6.1,30.5-6.1c44.2,0,80,35.8,80,80
              S444.2,256,400,256z" />
            </svg>
          <svg class="sun-cloud" viewBox="0 0 512 512" style='display:none'>
              <path class="sun-half" d="M127.8,259.1c3.1-4.3,6.5-8.4,10-12.3c-6-11.2-9.4-24-9.4-37.7c0-44.1,35.7-79.8,79.8-79.8
                  c40,0,73.1,29.4,78.9,67.7c11.4,2.3,22.4,5.7,32.9,10.4c-0.4-29.2-12-56.6-32.7-77.3C266.1,109,238,97.4,208.2,97.4
                  c-29.9,0-57.9,11.6-79.1,32.8c-21.1,21.1-32.8,49.2-32.8,79.1c0,17.2,3.9,33.9,11.2,48.9c1.5-0.1,3-0.1,4.4-0.1
                  C117.3,258,122.6,258.4,127.8,259.1z" />
              <path class="cloud" d="M400,256c-5.3,0-10.6,0.4-15.8,1.1c-16.8-22.8-39-40.5-64.2-51.7c-10.5-4.6-21.5-8.1-32.9-10.4
                  c-10.1-2-20.5-3.1-31.1-3.1c-45.8,0-88.4,19.6-118.2,52.9c-3.5,3.9-6.9,8-10,12.3c-5.2-0.8-10.5-1.1-15.8-1.1c-1.5,0-3,0-4.4,0.1
                  C47.9,258.4,0,307.7,0,368c0,61.8,50.2,112,112,112c13.7,0,27.1-2.5,39.7-7.3c29,25.2,65.8,39.3,104.3,39.3
                  c38.5,0,75.3-14.1,104.3-39.3c12.6,4.8,26,7.3,39.7,7.3c61.8,0,112-50.2,112-112S461.8,256,400,256z M400,448
                  c-17.1,0-32.9-5.5-45.9-14.7C330.6,461.6,295.6,480,256,480c-39.6,0-74.6-18.4-98.1-46.7c-13,9.2-28.8,14.7-45.9,14.7
                  c-44.2,0-80-35.8-80-80s35.8-80,80-80c7.8,0,15.4,1.2,22.5,3.3c2.7,0.8,5.4,1.7,8,2.8c4.5-8.7,9.9-16.9,16.2-24.4
                  C182,241.9,216.8,224,256,224c10.1,0,20,1.2,29.4,3.5c10.6,2.5,20.7,6.4,30.1,11.4c23.2,12.4,42.1,31.8,54.1,55.2
                  c9.4-3.9,19.7-6.1,30.5-6.1c44.2,0,80,35.8,80,80S444.2,448,400,448z" />
          
              <path class="ray ray-one" d="M16,224h32c8.8,0,16-7.2,16-16s-7.2-16-16-16H16c-8.8,0-16,7.2-16,16S7.2,224,16,224z" />
              <path class="ray ray-two" d="M83.5,106.2c6.3,6.2,16.4,6.2,22.6,0c6.3-6.2,6.3-16.4,0-22.6L83.5,60.9c-6.2-6.2-16.4-6.2-22.6,0
                  c-6.2,6.2-6.2,16.4,0,22.6L83.5,106.2z" />
              <path class="ray ray-three" d="M208,64c8.8,0,16-7.2,16-16V16c0-8.8-7.2-16-16-16s-16,7.2-16,16v32C192,56.8,199.2,64,208,64z" />
              <path class="ray ray-four" d="M332.4,106.2l22.6-22.6c6.2-6.2,6.2-16.4,0-22.6c-6.2-6.2-16.4-6.2-22.6,0l-22.6,22.6
                  c-6.2,6.2-6.2,16.4,0,22.6S326.2,112.4,332.4,106.2z" />
              <path class="ray ray-five" d="M352,208c0,8.8,7.2,16,16,16h32c8.8,0,16-7.2,16-16s-7.2-16-16-16h-32C359.2,192,352,199.2,352,208z" />
            </svg>
          <svg class="sunshine" viewBox="0 0 512 512" style='display:none'>
            <path class="sun-full" d="M256,144c-61.8,0-112,50.2-112,112s50.2,112,112,112s112-50.2,112-112S317.8,144,256,144z M256,336
                c-44.2,0-80-35.8-80-80s35.8-80,80-80s80,35.8,80,80S300.2,336,256,336z" />
            <path class="sun-ray-eight" d="M131.6,357.8l-22.6,22.6c-6.2,6.2-6.2,16.4,0,22.6s16.4,6.2,22.6,0l22.6-22.6c6.2-6.3,6.2-16.4,0-22.6
                C147.9,351.6,137.8,351.6,131.6,357.8z" />
            <path class="sun-ray-seven" d="M256,400c-8.8,0-16,7.2-16,16v32c0,8.8,7.2,16,16,16s16-7.2,16-16v-32C272,407.2,264.8,400,256,400z" />
            <path class="sun-ray-six" d="M380.5,357.8c-6.3-6.2-16.4-6.2-22.6,0c-6.3,6.2-6.3,16.4,0,22.6l22.6,22.6c6.2,6.2,16.4,6.2,22.6,0
                s6.2-16.4,0-22.6L380.5,357.8z" />
            <path class="sun-ray-five" d="M448,240h-32c-8.8,0-16,7.2-16,16s7.2,16,16,16h32c8.8,0,16-7.2,16-16S456.8,240,448,240z" />
            <path class="sun-ray-four" d="M380.4,154.2l22.6-22.6c6.2-6.2,6.2-16.4,0-22.6s-16.4-6.2-22.6,0l-22.6,22.6c-6.2,6.2-6.2,16.4,0,22.6
                C364.1,160.4,374.2,160.4,380.4,154.2z" />
            <path class="sun-ray-three" d="M256,112c8.8,0,16-7.2,16-16V64c0-8.8-7.2-16-16-16s-16,7.2-16,16v32C240,104.8,247.2,112,256,112z" />
            <path class="sun-ray-two" d="M131.5,154.2c6.3,6.2,16.4,6.2,22.6,0c6.3-6.2,6.3-16.4,0-22.6l-22.6-22.6c-6.2-6.2-16.4-6.2-22.6,0
                c-6.2,6.2-6.2,16.4,0,22.6L131.5,154.2z" />
            <path class="sun-ray-one" d="M112,256c0-8.8-7.2-16-16-16H64c-8.8,0-16,7.2-16,16s7.2,16,16,16h32C104.8,272,112,264.8,112,256z" />
            </svg>
          <svg class="windy-cloud" viewBox="0 0 512 512" style='display:none'>
            <g class="cloud-wrap">
            <path class="cloud" d="M417,166.1c-24-24.5-57.1-38.8-91.7-38.8c-34.6,0-67.7,14.2-91.7,38.8c-52.8,2.5-95,46.2-95,99.6
            c0,55,44.7,99.7,99.7,99.7c5.8,0,11.6-0.5,17.3-1.5c20.7,13.5,44.9,20.9,69.7,20.9c24.9,0,49.1-7.3,69.8-20.9
            c5.7,1,11.5,1.5,17.3,1.5c54.9,0,99.6-44.7,99.6-99.7C512,212.3,469.8,168.5,417,166.1z M412.4,333.3c-8.3,0-16.4-1.5-24-4.4
            c-17.5,15.2-39.8,23.8-63.1,23.8c-23.2,0-45.5-8.5-63-23.8c-7.6,2.9-15.8,4.4-24,4.4c-37.3,0-67.7-30.4-67.7-67.7
            c0-37.3,30.4-67.7,67.7-67.7c3.2,0,6.4,0.2,9.5,0.7c18.1-24.6,46.5-39.4,77.5-39.4c30.9,0,59.4,14.8,77.5,39.4
            c3.1-0.5,6.3-0.7,9.6-0.7c37.3,0,67.6,30.4,67.6,67.7C480,303,449.7,333.3,412.4,333.3z" />
            </g>
            <path class="wind-three" d="M144,352H16c-8.8,0-16,7.2-16,16s7.2,16,16,16h128c8.8,0,16-7.2,16-16S152.8,352,144,352z" />
            <path class="wind-two" d="M16,320h94c8.8,0,16-7.2,16-16s-7.2-16-16-16H16c-8.8,0-16,7.2-16,16S7.2,320,16,320z" />
            <path class="wind-one" d="M16,256h64c8.8,0,16-7.2,16-16s-7.2-16-16-16H16c-8.8,0-16,7.2-16,16S7.2,256,16,256z" />
          </svg>
    </div>
  </section>

  <section class="product__wrap">
    <h2 id="product__routeTitle">路線介紹</h2>
    <div class="product__routeInfo">
      <div class="product__route">
        <?php while($scnRow = $scn->fetch(PDO::FETCH_ASSOC)){?>
          <div class="route">
            <div class="route__img">
              <img src="img/mt/<?php echo $pdkNo?>/scn/<?php echo $scnRow['scnImg']?>" alt="<?php echo $scnRow['scnTitle']?>">
            </div>
            <div class="route__info">
              <h3>風景點  <span><?php echo $scnRow['scnTitle']?></span></h3>
              <p><?php echo $scnRow['scnCont']?></p>
              <div class="route__icon">
                <?php
                $arr = explode("|", $scnRow['iconList']);
                for($i=0; $i<count($arr); $i++){
                  if(strpos($arr[$i], "fa") !== false){
                    echo "<i class='fas ", $arr[$i], "'></i>";
                    if($arr[$i] == "fa-tint"){
                      echo "<span>水源區</span>";
                    }
                    if($arr[$i] == "fa-campground"){
                      echo "<span>露營區</span>";
                    }
                  }else{
                    echo "<i class='material-icons'>", $arr[$i], "</i>";
                    if($arr[$i] == "hotel"){
                      echo "<span>山屋</span>";
                    }
                    if($arr[$i] == "restaurant"){
                      echo "<span>餐廳</span>";
                    }
                  }
                }
                ?>
              </div>
            </div>
          </div>
        <?php }?>
        <div id="showMore">
          <button class="btn-main-s" id="showRoute">查看更多</button>
        </div>
      </div>
      <div class="product__map">
        <div class="product__map--img">
          <img src="img/viewpoint.png" alt="viewpoint">
          <?php
          if($scn->rowcount() == 3){
            echo '<span class="product__map--point first"></span>';
            echo '<span class="product__map--point center"></span>';
            echo '<span class="product__map--point last"></span>';
          }else if($scn->rowcount() == 4){
            echo '<span class="product__map--point first"></span>';
            echo '<span class="product__map--point twoOfFour"></span>';
            echo '<span class="product__map--point threeOfFour"></span>';
            echo '<span class="product__map--point last"></span>';
          }else if($scn->rowcount() == 5){
            echo '<span class="product__map--point first"></span>';
            echo '<span class="product__map--point twoOfFive"></span>';
            echo '<span class="product__map--point center"></span>';
            echo '<span class="product__map--point fourOfFive"></span>';
            echo '<span class="product__map--point last"></span>';
          }
          ?>
        </div>
      </div>
    </div>
  </section>

  <section class="product__wrap">
    <h2 id="product__timeTitle">行程時間</h2>
    <div class="product_timePrice">
      <ul class="datepicker">
        <li>
          <span id="date-text" class="expanded">
            <table class="calendar">
              <thead>
                <tr>
                  <td class="mm" colspan="2"><span id="mm-sp">月份</span> <i id="left-1" class="material-icons">keyboard_arrow_left</i></td>
                  <td class="yy" colspan="2"><span id="yy-sp">年份</span><i id="right-1" class="material-icons">keyboard_arrow_right</i></td>
                </tr>
                <tr>
                  <th>Sun</th>
                  <th>Mon</th>
                  <th>Tue</th>
                  <th>Wed</th>
                  <th>Thu</th>
                  <th>Fri</th>
                  <th>Sat</th>
                </tr>
              </thead>
              <tbody id="calendar-tb"></tbody>
            </table>
          </span>
        </li>
      </ul>
      <div class="product__priceDetail">
        <div id="product__include">
          <h3>費用包含</h3>
          <ul>
            <?php
              $arr = preg_split("/(，|,)/", $pdkRow['priceInfoIn']);
              for($i=0; $i<count($arr); $i++){
                echo "<li> $arr[$i]</li>";
              }
            ?>
          </ul>
        </div>
        <div id="product__exclude">
          <h3>費用不包含</h3>
          <ul>
            <?php
              $arr = preg_split("/(，|,)/", $pdkRow['priceInfoEx']);
              for($i=0; $i<count($arr); $i++){
                echo "<li> $arr[$i]</li>";
              }
            ?>
          </ul>
        </div>
        <div id="product__time">
          <h3>行程時間</h3>
          <form>
          <p id="product__timeStart">
            <i class="material-icons">explore</i>
            開始時間
            <span>
            <?php echo str_replace('/0', '/', str_replace('-', '/', $pdRow['pdStart']));?>
            </span>
          </p>
          <p id="product__timeEnd">
            <i class="material-icons">flag</i>
            結束時間
            <span></span>
          </p>
          </form>
        </div>
      </div>
      <a class="btn-main-s" id="cart" href="cart.php">確認訂購</a>
    </div>
  </section>

  <div class="product__guideBackground">
    <section class="product__wrap">
      <h2 id="product__guideTitle">嚮導介紹</h2>
      <div class="product__guideGroup swiper-container">
        <div class="product__guide__pagination"></div>
        <div class="swiper-wrapper">
          <div class="product__guide swiper-slide">
            <div class="product__guideImg">
              <img src="img/guide/<?php echo $guideData1['gdImg']?>" alt="<?php echo $guideData1['gdName']?>">
            </div>
            <div class="product__guideInfo">
              <h3>登山嚮導</h3>
              <h3 class="product__guideName" id="gdName1"><?php echo $guideData1['gdName']?></h3>
              <p class="guideSkill"><?php echo $guideData1['skill']?></p>
              <p style="display:none" id='guide1radar'>
              <?php
              $guide1radar = '';
              $guide1radar.= $guideData1['hp'].','.$guideData1['exp'].','.$guideData1['survival'].','.$guideData1['strain'].','.$guideData1['yds'];
              echo $guide1radar;
              ?>
              </p>
            </div>
            <div class="product__guideCapability">
              <h3 class="product__guideName"><?php echo $guideData1['gdName']?></h3>
              <h3>嚮導綜合能力</h3>
              <canvas id="guide1" width="300" height="300"></canvas>
            </div>
          </div>
          <div class="product__guide swiper-slide">
            <div class="product__guideImg">
              <img src="img/guide/<?php echo $guideData2['gdImg']?>" alt="<?php echo $guideData2['gdName']?>">
            </div>
            <div class="product__guideInfo">
              <h3>登山嚮導</h3>
              <h3 class="product__guideName" id="gdName2"><?php echo $guideData2['gdName']?></h3>
              <p class="guideSkill"><?php echo $guideData2['skill']?></p>
              <p style="display:none" id='guide2radar'>
              <?php
              $guide2radar = '';
              $guide2radar.= $guideData2['hp'].','.$guideData2['exp'].','.$guideData2['survival'].','.$guideData2['strain'].','.$guideData2['yds'];
              echo $guide2radar;
              ?>
              </p>
            </div>
            <div class="product__guideCapability">
              <h3 class="product__guideName"><?php echo $guideData2['gdName']?></h3>
              <h3>嚮導綜合能力</h3>
              <canvas id="guide2" width="300" height="300"></canvas>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <div>
    <div class="product__reviewBackground">
      <img src="img/reviewBackground.png" alt="" class="product__reviewBackgroundImg">
    </div>
    <section class="product__wrap">
      <h2 id="product__reviewTitle">旅客評價</h2>
      <div id="totalReview">
        <span id="totalRate"><?php echo number_format($pdkRow['avgRate'],1)?></span>
        <span id="totalRateImg">
          <?php for($i=0; $i<floor($pdkRow['avgRate']); $i++){ ?>
          <img src="img/tree_j.png" alt="rate">
          <?php } 
          if($pdkRow['avgRate']*10%10 != 0){
          ?>
          <img src="img/tree_f_h.png" class="tree_half" alt="rate">
          <?php
          }?>
        </span>
        <span id="numberOfRate"><?php echo $order->rowCount()?>則評價</span>
      </div>
      <div class="clearfix"></div>
      <div class="product__review">
        <?php while($orderRow = $order->fetch()){?>
        <div class="product__customerReview">
          <div class="product__customerImg">
            <img src="img/member/<?php echo $orderRow['memImg']; ?>" alt="<?php echo $orderRow['memId']; ?>">
          </div>
          <div class="product__customerMain">
            <div class="product__customerInfo">
              <span class="product__customerName"><?php echo $orderRow['memId']; ?></span>
              <span class="product__customerRate">
              <?php for($i=0; $i<$orderRow['rate']; $i++){ ?>
              <img src="img/tree_j.png" alt="rate">
              <?php } ?>
              </span>
              <span class="product__reviewDate">
              <?php 
              echo $orderRow['rateDate'];
              ?>
              </span>
            </div>
            <p class="product__customerReview"><?php echo $orderRow['rateCont']; ?></p>
          </div>
        </div>
        <?php } ?>
      </div>
      <div class="clearfix"></div>
    </section>
  </div>

  <section class="product__wrap">
    <h2>更多推薦行程</h2>
    <div class="swiper-container">
      <div class="product__card">
        <div class="swiper-wrapper">
          <?php while($pdkOtherRow = $pdkOther->fetch(PDO::FETCH_ASSOC)){?>
          <div class="swiper-slide pro-item">
            <a class='otherProduct' href="product.php?pdkNo=<?php echo $pdkOtherRow['pdkNo']?>" style="display:block">
              <div class="pro-item-pic">
                <img src="img/mt/<?php echo $pdkOtherRow['pdkNo']?>/1.jpg" alt="<?php echo $pdkOtherRow['pdkName']?>">
              </div>
              <h4><?php echo $pdkOtherRow['pdkName']?></h4>
              <div class="pro-item-view-flex">
                <p>評價：</p>
                <?php for($i=0; $i<$pdkOtherRow['avgRate']; $i++){ ?>
                  <span class="tree"><img src="img/tree_j.png" alt="rate"></span>
                <?php } ?>
              </div>
              <p>天數：<?php echo $pdkOtherRow['day']?>天</p>
              <div class="pro-item-view-flex">
                <p>難易度:</p>
                <?php for($i=0; $i<$pdkOtherRow['level']; $i++){ ?>
                  <span class="hike"><i class="fas fa-hiking"></i></span>
                <?php } ?>
              </div>
              <div class="pro-item-view">    
                <span class="price"><h4>NTD <?php echo number_format($pdkOtherRow['pdkPrice']);?></h4></span>
              </div>
            </a>
          </div>
          <?php }?>
        </div>
      </div>
      <button class="swiper-button-prev">
        <i class="material-icons">keyboard_arrow_left</i>
      </button>
      <button class="swiper-button-next">
        <i class="material-icons">keyboard_arrow_right</i>
      </button>
    </div>
  </section>

  <?php
    include_once('footer.php');
    // include_once('robot.php');
    include_once('memLogin.php');
  ?>
  
  <script src="js/common.js"></script>
  <script src="js/header.js"></script>
  <!-- <script src="js/robot.js"></script> -->
  <script src="js/product_date.js"></script>
  <script src="js/product_weather.js"></script>
  <script src="js/product.js"></script>
  <script>
  </script>
</body>
</html>