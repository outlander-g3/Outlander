<?php
// session_start();

    // include_once('connectDb.php'); //連線
    // include_once('session.php'); //判斷會員是否登入
    try{
        require_once('connectDb.php');
       
        $sql= "select a.*, avg(rate) avgRate from productkind a join product b on a.pdkNo = b.pdkNo join `order` c on b.pdNo = c.pdNo group by pdkNo order by avgRate limit 2";
        $products = $pdo -> query($sql);
        $sql="select a.*, avg(rate) avgRate from productkind a join product b on a.pdkNo = b.pdkNo join `order` c on b.pdNo = c.pdNo group by a.pdkNo order by b.pdStart limit 6
        ";
        $recent = $pdo -> query($sql);
        // $prodRows = $products -> fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
	    echo "錯誤 : ", $e -> getMessage(), "<br>";
	    echo "行號 : ", $e -> getLine(), "<br>";
    }
        
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>山行者 - 行程總覽</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="css/robot.css"> -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/vue.min.js"></script>
    <!-- <script src="js/enquire.min.js"></script> -->
    <link rel="stylesheet" href="css/productsOverview.css">
    <!-- css塞這 自己js塞屁股 -->
</head>

<body>

<!-- 插入header -->
    <?php
        include_once('header.php');
    ?>
<!-- ===========================各分頁內容開始======================= -->
<div class="po-wrap">
        <div class="po-banner">
            <div class="po-banner-pic">
                <canvas id='canv'></canvas>
                <img src="img/banner_0206.png" alt="train">
                <div class="po-banner-des">
                    <!-- <h2>不知道想去哪裡嗎?<?php ?></h2>
                    <h6>點選<a href="#" class="mode">湖泊</a>、<a href="#" class="mode">星空</a>、<a href="#"
                            class="snowCard">雪地</a>三種情境模式進行行程篩選</h6> -->
                </div>
            </div>
        </div>
        <!-- <div class="po-btn-sub-s--flex">
            <div class="btn-sub-s shadow-box shadow-text">星空</div>
            <div class="btn-sub-s shadow-box shadow-text" class="snowCard">雪地</div>
            <div class="btn-sub-s shadow-box shadow-text">湖泊</div>
        </div> -->
    </div>

    <!-- 以下為三張情境圖片 -->
    <!-- <div class="po-wrap-mode">
        <div id="app" class="container">
            <card data-image="img/night.jpg" id="mode-pic">
                <h2 slot="header">星空</h2>
            </card>
            <card data-image="img/snow.png" class="snowCard" id="ooxx">
                <h2 slot="header">雪地</h2>
            </card>
            <card data-image="img/lake_new.jpg">
                <h2 slot="header">湖泊</h2>
            </card>
        </div>
    </div> -->
    <!------------------以下為篩選bar ------------------------>
    <div class="po-wrap-filter">
        <div class="drop-flex">
            <!-- 月曆 -->
            
            <ul class="datecont" id="fullDate">
            <form method="get" id="dateStart">
                <input type="hidden" name="dateInfo" id="dateInfo">
                <li><input id="date" type="text" value="">
                    <span id="date-text">
                        <label id="date-label">請選擇日期</label>
                        <table class="calendar">
                            <tbody>
                                <tr>
                                    <td class="mm" colspan="2"><span id="mm-sp">月份</span> <i id="left-1"
                                            class="material-icons">keyboard_arrow_left</i></td>
                                    <td class="yy" colspan="2"><span id="yy-sp">年份</span><i id="right-1"
                                            class="material-icons">keyboard_arrow_right</i></td>
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
                            </tbody>
                            <tbody id="calendar-tb">
                            </tbody>
                        </table>
                    </span></li>
            </form>
            </ul>
            <!-- 月曆 -->
            <!-- 洲別 -->
            <div class="po-date">
                <span class="joForm__input">
                <form class="" id="cont">
                    <input type="radio" name="contType" class="contType" value="choose" checked id="cont-choose" class="cc">
                    <label for="cont-choose">請選擇洲別</label>

                    <input type="radio" name="contType" class="contType" value="1" id="cont-asia" class="cc">
                    <label for="cont-asia">亞洲</label>

                    <input type="radio" name="contType" class="contType" value="2" id="cont-europe" class="cc">
                    <label for="cont-europe">歐洲</label>

                    <input type="radio" name="contType" class="contType" value="3" id="cont-north" class="cc">
                    <label for="cont-north">非洲</label>

                    <input type="radio" name="contType" class="contType" value="4" id="cont-south" class="cc">
                    <label for="cont-south">大洋洲</label>

                    <input type="radio" name="contType" class="contType" value="5" id="cont-oceania" class="cc">
                    <label for="cont-cont-oceania">北美洲</label>

                    <input type="radio" name="contType" class="contType" value="6" id="cont-africa" class="cc">
                    <label for="cont-africa">南美洲</label>
                </form>
                </span>
            </div>
            <!-- 難易度 -->
            <div class="po-date">
                <span class="joForm__input">
                <form class="" id="level">
                    <input type="radio" name="levelType" value="choose" checked id="level-choose" class="aa">
                    <label for="level-choose">請選擇難易度</label>

                    <input type="radio" name="levelType" value="1" id="hard" class="aa">
                    <label for="hard">簡</label>
                    <!-- <label for="hard"><img src="img/tree_f.png" alt=""></label> -->

                    <input type="radio" name="levelType" value="2" id="very-hard" class="aa">
                    <label for="very-hard">中</label>

                    <input type="radio" name="levelType" value="3" id="hard-hard" class="aa">
                    <label for="hard-hard">難</label>
                </form>
                </span>
            </div>
            <!-- 預算 -->
            <div class="po-date">
                <span class="joForm__input">
                <form class="" id="budget">
                    <input type="radio" name="budgetType" value="choose" checked id="bud-choose" class="bb">
                    <label for="bud-choose">請選擇預算</label>

                    <input type="radio" name="budgetType" value="1" id="cont-1" class="bb">
                    <label for="cont-1">1萬以內</label>

                    <input type="radio" name="budgetType" value="2" id="cont-2" class="bb">
                    <label for="cont-2">1萬~5萬</label>

                    <input type="radio" name="budgetType" value="3" id="cont-3" class="bb">
                    <label for="cont-3">5萬~20萬</label>
                </form>
                </span>
            </div>
        </div>
    </div>

    <!-- 雲背景 -->
    <div class="cloud-wrap">
        <img src="img/cloud.png" alt="cloud">
    </div>
   	
    <!-- 以下為精選行程 -->
    <div class="pro-product-wrap pro-product-wrap-topic" id="mtmtmt">
        <h3>精選行程</h3>
        <h5>你一生必去的經典登山路線</h5>		
        <div class="pro-item-flex">
            <?php	
            while($prodRow = $products->fetch(PDO::FETCH_ASSOC)){
                $pdkPrice =number_format($prodRow["pdkPrice"]);
            ?>
            <!-- 1個商品卡 -->
            <div class="pro-item" >
                <a href="product.php?pdkNo=<?php echo $prodRow['pdkNo'];?>">
                    <div class="pro-item-pic">
                        <img src="img/mt/<?php echo $prodRow["pdkNo"]?>/1.jpg" alt="EBC">
                    </div>
                    <h4> <?php echo $prodRow["pdkName"];?></h4>
                    <div class="pro-item-view-flex">
                        <p id="pdk-rate">評價：</p>
                        <?php 
                        for($i=0; $i<floor($prodRow['avgRate']); $i++){ 
                        ?>
                        <span class="tree_f">
                            <img src="img/tree_j.png" alt="rate">
                        </span>
                        <?php 
                        } 
                        if($prodRow['avgRate']*10%10 != 0){
                        ?>
                        <span class="tree_f_h">
                            <img src="img/tree_f_h.png" alt="rate">
                        </span>
                        <?php
                        }?>    
                    </div>
                    <p>天數：<?php echo $prodRow["day"];?>天</p>
                    <div class="pro-item-view-float">
                        <p>難易度：</p>
                        <div class="hike-float">
                            <span class="hike">
                                <?php 
                                    for($i=0; $i<$prodRow["level"]; $i++){
                                ?>
                                <i class="fas fa-hiking"></i>
                                <?php } ?>
                            </span>
                        </div>
                        <div class="clearfix"></div>
                        
                    </div>
                    <div class="clearfix"></div>
                    <h4 id="pdk-price">NTD<?php echo $pdkPrice;?></h4>
                </a>
            </div>
            <?php
            }
            ?>
          

        </div>
    </div>
</div>
    <!-- 以下為熱門行程----------------------------------------------------------------------->

    <div class="pro-product-wrap pro-product-wrap-recent">
        <h3 id="textChange">近期開團</h3>
        <h5 id="textChange-hot">熱門經典登山路線</h5>
        <div class="pro-item-flex pro-item-flex-three" id="mtmtmtS">
            <!-- 1個商品卡 -->
            <?php	
            while($prodRowRe = $recent->fetch(PDO::FETCH_ASSOC)){
                $pdkPrice =number_format($prodRowRe["pdkPrice"]);
            ?>
            <div class="pro-item pro-item-three">
                <a href="product.php?pdkNo=<?php echo $prodRowRe['pdkNo'];?>">
                    <div class="pro-item-pic pro-item-pic-hot">
                        <img src="img/mt/<?php echo $prodRowRe['pdkNo'];?>/1.jpg" alt="EBC">
                    </div>
                    <h4><?php echo $prodRowRe["pdkName"];?></h4>
                    <div class="pro-item-view-flex">
                        <p>評價：</p>
                        <?php 
                        for($i=0; $i<floor($prodRowRe['avgRate']); $i++){ 
                        ?>
                        <span class="tree_f">
                            <img src="img/tree_j.png" alt="rate">
                        </span>
                        <?php 
                        } 
                        if($prodRowRe['avgRate']*10%10 != 0){
                        ?>
                        <span class="tree_f_h">
                            <img src="img/tree_f_h.png" alt="rate">
                        </span>
                        <?php
                        }?>  
                    </div>
                    <p>天數：<?php echo $prodRowRe["day"];?>天</p>
                    <div class="pro-item-view-float">
                        <p>難易度：</p>
                        <div class="hike-float">
                            <?php
                            for($i=0;$i<$prodRowRe["level"];$i++){
                            ?>
                            <span class="hike">
                                <i class="fas fa-hiking"></i>
                            </span>
                            <?php
                            }
                            ?>
                        </div>
                        <!-- <div class="clearfix"></div> -->
                    </div>
                    <div class="clearfix"></div>
                    <h4 id="pdk-price">NTD<?php echo $pdkPrice;?></h4>
                </a>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
<!-- ===========================各分頁內容結束======================= -->
<!-- 插入 footer 會員登入跟機器人 -->
<?php
    include_once('footer.php');
    // include_once('robot.php');
    include_once('memLogin.php');
?>
<!-- <script src="js/common.js"></script> -->
<script src="js/header.js"></script>
<!-- <script src="js/robot.js"></script> -->  

<!-- 篩選-->
 <script src="js/productsOverview_filter.js"></script> 
<!-- 風景卡片 -->
<script src="js/productsOverview_viewcard.js"></script>
<!-- 下拉式選單 -->
<script src="js/productsOverview_dropdown.js"></script>
<!-- 雪景 -->
<!-- <script src="js/productsOverview_snow.js"></script> -->

</body>
</html>
