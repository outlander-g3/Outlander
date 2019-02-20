<?php
session_start();

    // include_once('connectDb.php'); //連線
    // include_once('session.php'); //判斷會員是否登入
    try{
        require_once('connectDb.php');
        //$sql = "select *, avg(rate) avgRate from productkind a join product b on a.pdkNo = b.pdkNo
        //join `order` c on b.pdNo = c.pdNo group by a.pdkNo";/////以上是精選行程第一次寫法
        //$sql = "select * from productkind a join product b on a.pdkNo = b.pdkNo join `order` c on b.pdNo = c.pdNo where c.rate<=5 order by pdStart limit 2";
        //以上是精選行程假寫法
        $sql= "select a.*, avg(rate) avgRate from productkind a join product b on a.pdkNo = b.pdkNo join `order` c on b.pdNo = c.pdNo group by pdkNo order by avgRate limit 2";
        $products = $pdo -> query($sql);
        $sql="select a.*, avg(rate) avgRate from productkind a join product b on a.pdkNo = b.pdkNo join `order` c on b.pdNo = c.pdNo group by a.pdkNo order by b.pdStart limit 6
        ";
        ////以上是近期開團正確寫法
        //$sql="select * from productkind a join product b on a.pdkNo = b.pdkNo join `order` c on b.pdNo = c.pdNo where c.rate<=5 order by pdStart limit 6
        //";////以上是近期開團假寫法
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
    <title>山行者</title>
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
                    <h2>不知道想去哪裡嗎?<?php ?></h2>
                    <h6>點選<a href="#" class="mode">湖泊</a>、<a href="#" class="mode">星空</a>、<a href="#"
                            class="snowCard">雪地</a>三種情境模式進行行程篩選</h6>
                </div>
            </div>
        </div>
        <div class="po-btn-sub-s--flex">
            <div class="btn-sub-s shadow-box shadow-text">星空</div>
            <div class="btn-sub-s shadow-box shadow-text" class="snowCard">雪地</div>
            <div class="btn-sub-s shadow-box shadow-text">湖泊</div>
        </div>
    </div>

    <!-- 以下為三張情境圖片 -->
    <div class="po-wrap-mode">
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
    </div>
    <!------------------以下為篩選bar ------------------------>
    <div class="po-wrap-filter">
        <div class="drop-flex">
            <!-- 月曆 -->
            <ul class="datecont">
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
            </ul>
            <!-- 月曆 -->
            <!-- 洲別 -->
            <form class="" id="cont">
                <span class="joForm__input">
                    <input type="radio" name="contType" class="contType" value="choose" checked id="cont-choose">
                    <label for="cont-choose">請選擇洲別</label>

                    <input type="radio" name="contType" class="contType" value="1" id="cont-asia">
                    <label for="cont-asia">亞洲</label>

                    <input type="radio" name="contType" class="contType" value="2" id="cont-europe">
                    <label for="cont-europe">歐洲</label>

                    <input type="radio" name="contType" class="contType" value="3" id="cont-north">
                    <label for="cont-north">非洲</label>

                    <input type="radio" name="contType" class="contType" value="4" id="cont-south">
                    <label for="cont-south">大洋洲</label>

                    <input type="radio" name="contType" class="contType" value="5" id="cont-oceania">
                    <label for="cont-cont-oceania">北美洲</label>

                    <input type="radio" name="contType" class="contType" value="6" id="cont-africa">
                    <label for="cont-africa">南美洲</label>
                </span>
            </form>
            <!-- 難易度 -->
            <form class="" id="level">
                <span class="joForm__input">
                    <input type="radio" name="levelType" value="choose" checked="checked" id="level-choose">
                    <label for="level-choose">請選擇難易度</label>

                    <input type="radio" name="levelType" value="1" id="hard">
                    <label for="hard">難</label>
                    <!-- <label for="hard"><img src="img/tree_f.png" alt=""></label> -->

                    <input type="radio" name="levelType" value="2" id="very-hard">
                    <label for="very-hard">很難</label>

                    <input type="radio" name="levelType" value="3" id="hard-hard">
                    <label for="hard-hard">非常難</label>
                </span>
            </form>
            <!-- 預算 -->
            <form class="" id="budget">
                <span class="joForm__input">
                    <input type="radio" name="budgetType" value="choose" checked="checked" id="bud-choose">
                    <label for="bud-choose">請選擇預算</label>
                    <input type="radio" name="budgetType" value="cont-1" id="cont-1">
                    <label for="cont-1">1萬以內</label>
                    <input type="radio" name="budgetType" value="cont-2" id="cont-2">
                    <label for="cont-2">1萬~3萬</label>
                    <input type="radio" name="budgetType" value="cont-3" id="cont-3">
                    <label for="cont-3">3萬~10萬</label>
                </span>
            </form>
        </div>
    </div>
<!-- 點按篩選BAR -->
<script>
clickCont = document.querySelectorAll('input[name="contType"]+label');
clickLevel = document.querySelectorAll('input[name="levelType"]+label');
clickBudget = document.querySelectorAll('input[name="budgetType"]+label');
// cont = document.querySelectorAll('input[name="contType"] + label');
// clickLevel = document.querySelectorAll('input[name="levelType"]+label');
// console.log(clickLevel);
// for(var i=0; i<cont.length; i++){
//     console.log(123);
//     cont[i].addEventListener('click', getMember);
// }
// for(i=0;i<clickLevel.length;i++){
    // clickLevel[i].addEventListener('click',getMember);
    // console.log(clickLevel[i]);
// }

for(let i=0;i<clickCont.length;i++){
  clickCont[i].addEventListener('click',getMember);
}
for(let i=0;i<clickLevel.length;i++){
  clickLevel[i].addEventListener('click',getMember);
}
for(let i=0;i<clickBudget.length;i++){
  clickBudget[i].addEventListener('click',getMember);
}
// var aa=document.getElementById('ShowPanel');//為何抓不到panel?
// console.log(aa); 抓不到panel?
function getMember(e){
    contTypeObj = document.querySelector('input[name="contType"]:checked+label').previousElementSibling;
    console.log("....", contTypeObj.value);
    levelTypeObj = document.querySelector('input[name="levelType"]:checked+label').previousElementSibling;
    console.log("------", levelTypeObj.value);
    budgetTypeObj = document.querySelector('input[name="budgetType"]:checked+label').previousElementSibling;
    console.log("=====", budgetTypeObj.value);
    if(e.target.previousElementSibling.name == 'contType'){
        contTypeObj = e.target.previousElementSibling;
    }
    if(e.target.previousElementSibling.name == 'levelType'){
        levelTypeObj = e.target.previousElementSibling;
    }
    if(e.target.previousElementSibling.name == 'budgetType'){
        budgetTypeObj = e.target.previousElementSibling;
    }
    // filter = {
    //     continent:bb.value,
    //     level:bb.value,
    // }
    // console.log(123);
//   console.log(filter.continent);
// console.log(bb.value);
    

  var xhr = new XMLHttpRequest();
  xhr.addEventListener('load',(e)=>{
    //   console.log(document.getElementsByClassName('pro-item-pic').length);
    if( xhr.status == 200 ){
        document.getElementById('mtmtmt').style.display="none";
    //   console.log(document.getElementsByClassName('pro-item-pic').length);
    //   console.log(document.getElementsByClassName('pro-item-pic'));
        document.getElementById('textChange').innerText="篩選結果";                       
        document.getElementById('mtmtmtS').innerHTML = xhr.responseText;
    //   console.log(document.getElementsByClassName('pro-item-pic').length);
        for (var i = 0;i<document.getElementsByClassName('pro-item-pic').length;i++){
        document.getElementsByClassName('pro-item-pic')[i].classList.remove('pro-item-pic-hot');
        //拿掉熱門標籤
      }
       }else{
          alert( xhr.status );
       }
    
  }); 

  var url = "getSelected.php?continent="+contTypeObj.value+"&levelType="+levelTypeObj.value+"&budgetType="+budgetTypeObj.value;
  console.log(url)
  xhr.open("Get", url, true);
  xhr.send( null );
}
</script>
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
            ?>
            <!-- 1個商品卡 -->
            <div class="pro-item" >
                <a href="products.html">
                    <div class="pro-item-pic">
                        <img src="img/mt/<?php echo $prodRow["pdkNo"]?>/1.jpg" alt="EBC">
                    </div>
                    <h4> <?php echo $prodRow["pdkName"];?></h4>
                    <div class="pro-item-view-flex">
                        <p>評價：</p>
                        <?php
                        for($i=0;$i<$prodRow["avgRate"];$i++){
                         echo '<span class="tree_f"><img src="img/tree_f.png" alt="tree"></span>';
                        }
                        ?>  
                    </div>
                    <p>天數：<?php echo $prodRow["day"];?></p>
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
                        <h4>NTD<?php echo $prodRow["pdkPrice"];?></h4>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </a>
            </div>
            <?php
            }
            ?>
            <!-- 1個商品卡 -->
            <!-- 2個商品卡 -->
            <!-- 1個商品卡 -->
            <!-- <div class="pro-item">
                <a href="products.html">
                    <div class="pro-item-pic">
                        <img src="img/ebc.jpg" alt="EBC">
                    </div>
                    <h4>探索尼泊爾•安娜普娜基地營健行15日</h4>
                    <div class="pro-item-view-flex">
                        <p>評價：</p>
                        <span class="tree_f"><img src="img/tree_f.png" alt="tree"></span>
                        <span class="tree_f"><img src="img/tree_f.png" alt="tree"></span>
                        <span class="tree_f"><img src="img/tree_f.png" alt="tree"></span>
                        <span class="tree_f"><img src="img/tree_f.png" alt="tree"></span>
                    </div>
                    <p>天數：15天</p>
                    <div class="pro-item-view-float">
                        <p>難易度：</p>
                        <div class="hike-float">
                            <span class="hike">
                                <i class="fas fa-hiking"></i>
                                <i class="fas fa-hiking"></i>
                                <i class="fas fa-hiking"></i>
                            </span>
                        </div>
                        <h4>NTD76500</h4>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </a>
            </div> -->

        </div>
    </div>
</div>
    <!-- 以下為熱門行程----------------------------------------------------------------------->

    <!-- <div id="ShowPanel"></div>   -->
    <div class="pro-product-wrap">
        <h3 id="textChange">近期開團</h3>
        <div class="pro-item-flex pro-item-flex-three" id="mtmtmtS">
            <!-- 1個商品卡 -->
            <?php	
            while($prodRowRe = $recent->fetch(PDO::FETCH_ASSOC)){
            ?>
            <div class="pro-item pro-item-three">
                <a href="products.html">
                    <div class="pro-item-pic pro-item-pic-hot">
                        <img src="img/mt/<?php echo $prodRowRe['pdkNo'];?>/1.jpg" alt="EBC">
                    </div>
                    <h4><?php echo $prodRowRe["pdkName"];?></h4>
                    <div class="pro-item-view-flex">
                        <p>評價：</p>
                            <?php
                                for($i=0;$i<$prodRowRe["avgRate"];$i++){
                                ?>
                            <span class="tree_f"><img src="img/tree_f.png" alt="tree"></span>
                            <?php
                            }
                            ?>
                    </div>
                    <p>天數：<?php echo $prodRowRe["day"];?></p>
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
                        <h4>NTD<?php echo $prodRowRe["pdkPrice"];?></h4>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </a>
            </div>
            <?php
            }
            ?>
            <!-- 1個商品卡 -->
            <!-- 2個商品卡 -->
            <!-- <div class="pro-item pro-item-three">
                <a href="products.html">
                    <div class="pro-item-pic pro-item-pic-hot">
                        <img src="img/ebc.jpg" alt="EBC">
                    </div>
                    <h4>探索尼泊爾•安娜普娜基地營健行15日</h4>
                    <div class="pro-item-view-flex">
                        <p>評價：</p>
                        <span class="tree_f"><img src="img/tree_f.png" alt="tree"></span>
                        <span class="tree_f"><img src="img/tree_f.png" alt="tree"></span>
                        <span class="tree_f"><img src="img/tree_f.png" alt="tree"></span>
                        <span class="tree_f"><img src="img/tree_f.png" alt="tree"></span>

                    </div>
                    <p>天數：15天</p>
                    <div class="pro-item-view-float">
                        <p>難易度：</p>
                        <div class="hike-float">
                            <span class="hike">
                                <i class="fas fa-hiking"></i>
                                <i class="fas fa-hiking"></i>
                                <i class="fas fa-hiking"></i>
                            </span>
                        </div>
                        <h4>NTD76500</h4>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </a>
            </div> -->
            <!-- 2個商品卡 -->
            <!-- 3個商品卡 -->
            <!-- <div class="pro-item pro-item-three">
                <a href="products.html">
                    <div class="pro-item-pic pro-item-pic-hot">
                        <img src="img/ebc.jpg" alt="EBC">
                    </div>
                    <h4>探索尼泊爾•安娜普娜基地營健行15日</h4>
                    <div class="pro-item-view-flex">
                        <p>評價：</p>
                        <span class="tree_f"><img src="img/tree_f.png" alt="tree"></span>
                        <span class="tree_f"><img src="img/tree_f.png" alt="tree"></span>
                        <span class="tree_f"><img src="img/tree_f.png" alt="tree"></span>
                        <span class="tree_f"><img src="img/tree_f.png" alt="tree"></span>

                    </div>
                    <p>天數：15天</p>
                    <div class="pro-item-view-float">
                        <p>難易度：</p>
                        <div class="hike-float">
                            <span class="hike">
                                <i class="fas fa-hiking"></i>
                                <i class="fas fa-hiking"></i>
                                <i class="fas fa-hiking"></i>
                            </span>
                        </div>
                        <h4>NTD76500</h4>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </a>
            </div> -->
            <!-- 3個商品卡 -->
        <!-- </div>
        <div class="pro-item-flex pro-item-flex-three"> -->
            <!-- 1個商品卡 -->
            <!-- <div class="pro-item pro-item-three">
                <a href="products.html">
                    <div class="pro-item-pic pro-item-pic-hot">
                        <img src="img/ebc.jpg" alt="EBC">
                    </div>
                    <h4>探索尼泊爾•安娜普娜基地營健行15日</h4>
                    <div class="pro-item-view-flex">
                        <p>評價：</p>
                        <span class="tree_f"><img src="img/tree_f.png" alt="tree"></span>
                        <span class="tree_f"><img src="img/tree_f.png" alt="tree"></span>
                        <span class="tree_f"><img src="img/tree_f.png" alt="tree"></span>
                        <span class="tree_f"><img src="img/tree_f.png" alt="tree"></span>

                    </div>
                    <p>天數：15天</p>
                    <div class="pro-item-view-float">
                        <p>難易度：</p>
                        <div class="hike-float">
                            <span class="hike">
                                <i class="fas fa-hiking"></i>
                                <i class="fas fa-hiking"></i>
                                <i class="fas fa-hiking"></i>
                            </span>
                        </div>
                        <h4>NTD76500</h4>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </a>
            </div> -->
            <!-- 1個商品卡 -->
            <!-- 2個商品卡 -->
            <!-- <div class="pro-item pro-item-three">
                <a href="products.html">
                    <div class="pro-item-pic pro-item-pic-hot">
                        <img src="img/ebc.jpg" alt="EBC">
                    </div>
                    <h4>探索尼泊爾•安娜普娜基地營健行15日</h4>
                    <div class="pro-item-view-flex">
                        <p>評價：</p>
                        <span class="tree_f"><img src="img/tree_f.png" alt="tree"></span>
                        <span class="tree_f"><img src="img/tree_f.png" alt="tree"></span>
                        <span class="tree_f"><img src="img/tree_f.png" alt="tree"></span>
                        <span class="tree_f"><img src="img/tree_f.png" alt="tree"></span>

                    </div>
                    <p>天數：15天</p>
                    <div class="pro-item-view-float">
                        <p>難易度：</p>
                        <div class="hike-float">
                            <span class="hike">
                                <i class="fas fa-hiking"></i>
                                <i class="fas fa-hiking"></i>
                                <i class="fas fa-hiking"></i>
                            </span>
                        </div>
                        <h4>NTD76500</h4>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </a>
            </div> -->
            <!-- 2個商品卡 -->
            <!-- 3個商品卡 -->
            <!-- <div class="pro-item pro-item-three">
                <a href="products.html">
                    <div class="pro-item-pic pro-item-pic-hot">
                        <img src="img/ebc.jpg" alt="EBC">
                    </div>
                    <h4>探索尼泊爾•安娜普娜基地營健行15日</h4>
                    <div class="pro-item-view-flex">
                        <p>評價：</p>
                        <span class="tree_f"><img src="img/tree_f.png" alt="tree"></span>
                        <span class="tree_f"><img src="img/tree_f.png" alt="tree"></span>
                        <span class="tree_f"><img src="img/tree_f.png" alt="tree"></span>
                        <span class="tree_f"><img src="img/tree_f.png" alt="tree"></span>

                    </div>
                    <p>天數：15天</p>
                    <div class="pro-item-view-float">
                        <p>難易度：</p>
                        <div class="hike-float">
                            <span class="hike">
                                <i class="fas fa-hiking"></i>
                                <i class="fas fa-hiking"></i>
                                <i class="fas fa-hiking"></i>
                            </span>
                        </div>
                        <h4>NTD76500</h4>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </a>
            </div> -->
            <!-- 3個商品卡 -->
        </div>
    </div>
<!-- ===========================各分頁內容結束======================= -->
<!-- 插入 footer 會員登入跟機器人 -->
<?php
    include_once('footer.php');
    // include_once('robot.php');
    include_once('memLogin.php');
?>
<script src="js/common.js"></script>
<script src="js/header.js"></script>
<!-- <script src="js/robot.js"></script> -->
</body>

<script>
    // app = document.getElementById('app');
    // ooxx = document.getElementsByClassName('ooxx');
    
    // console.log(ooxx);
    
    // window.addEventListener('click',(e)=>{
    //     if(e.target.id == 'ooxx'){
    //         alert("p");
    //     }
    // })


        // card[1].addEventListener('click',(e)=>{
        //     alert('sds');
        // });

$('div .card-wrap').on('click',function(){
    alert("!");
});

$('.snowCard').on("click",function(){
    alert ("p");
    var c = document.getElementById('canv'), 
        $ = c.getContext("2d");
    var w = c.width = window.innerWidth, 
        h = c.height = window.innerHeight;

    Snowy();
    function Snowy() {
      var snow, arr = [];
      var num = 60, tsc = 1, sp = 0.4;
      var sc = 1.3, t = 0, mv = 20, min = 1;
        for (var i = 0; i < num; ++i) {
          snow = new Flake();
          snow.y = Math.random() * (h + 50);
          snow.x = Math.random() * w;
          snow.t = Math.random() * (Math.PI * 2);
          snow.sz = (100 / (10 + (Math.random() * 100))) * sc;
          snow.sp = (Math.pow(snow.sz * .8, 2) * .15) * sp;
          snow.sp = snow.sp < min ? min : snow.sp;
          arr.push(snow);
        }
      go();
      function go(){
        window.requestAnimationFrame(go);
          $.clearRect(0, 0, w, h);
          $.fillStyle = 'hsla(242, 95%, 3%, 0)';
          $.fillRect(0, 0, w, h);
          $.fill();
            for (var i = 0; i < arr.length; ++i) {
              f = arr[i];
              f.t += .05;
              f.t = f.t >= Math.PI * 2 ? 0 : f.t;
              f.y += f.sp;
              f.x += Math.sin(f.t * tsc) * (f.sz * .3);
              if (f.y > h + 50) f.y = -10 - Math.random() * mv;
              if (f.x > w + mv) f.x = - mv;
              if (f.x < - mv) f.x = w + mv;
              f.draw();}
     }
     function Flake() {
       this.draw = function() {
          this.g = $.createRadialGradient(this.x, this.y, 0, this.x, this.y, this.sz);
          this.g.addColorStop(0, 'hsla(255,255%,255%,1)');
          this.g.addColorStop(1, 'hsla(255,255%,255%,0)');
          $.moveTo(this.x, this.y);
          $.fillStyle = this.g;
          $.beginPath();
          $.arc(this.x, this.y, this.sz, 0, Math.PI * 2, true);
          $.fill();}
      }
    }
    /*________________________________________*/
    window.addEventListener('resize', function(){
      c.width = w = window.innerWidth;
      c.height = h = window.innerHeight;
    }, false);
});


</script>
<script src="js/proview_date.js"></script>
<!-- 卡片 -->
<script>
    Vue.config.devtools = true;

    Vue.component('card', {
        template: `
        <div class="card-wrap"
          @mousemove="handleMouseMove"
          @mouseenter="handleMouseEnter"
          @mouseleave="handleMouseLeave"
          ref="card">
          <div class="card"
            :style="cardStyle">
            <div class="card-bg" :style="[cardBgTransform, cardBgImage]"></div>
            <div class="card-info">
              <slot name="header"></slot>
              <slot name="content"></slot>
            </div>
          </div>
        </div>`,
        mounted() {
            this.width = this.$refs.card.offsetWidth;
            this.height = this.$refs.card.offsetHeight;
        },
        props: ['dataImage'],
        data: () => ({
            width: 0,
            height: 0,
            mouseX: 0,
            mouseY: 0,
            mouseLeaveDelay: null
        }),
        computed: {
            mousePX() {
                return this.mouseX / this.width;
            },
            mousePY() {
                return this.mouseY / this.height;
            },
            cardStyle() {
                const rX = this.mousePX * 30;
                const rY = this.mousePY * -30;
                return {
                    transform: `rotateY(${rX}deg) rotateX(${rY}deg)`
                };
            },
            cardBgTransform() {
                const tX = this.mousePX * -40;
                const tY = this.mousePY * -40;
                return {
                    transform: `translateX(${tX}px) translateY(${tY}px)`
                }
            },
            cardBgImage() {
                return {
                    backgroundImage: `url(${this.dataImage})`
                }
            }
        },
        methods: {
            handleMouseMove(e) {
                this.mouseX = e.pageX - this.$refs.card.offsetLeft - this.width / 2;
                this.mouseY = e.pageY - this.$refs.card.offsetTop - this.height / 2;
            },
            handleMouseEnter() {
                clearTimeout(this.mouseLeaveDelay);
            },
            handleMouseLeave() {
                this.mouseLeaveDelay = setTimeout(() => {
                    this.mouseX = 0;
                    this.mouseY = 0;
                }, 1000);
            }
        }
    });

    const app = new Vue({
        el: '#app'
    });

</script>

<!-- 下拉式選單 -->
<script>
    $('.joForm__input').click(function (e) {
        e.preventDefault();
        e.stopPropagation();
        $(this).toggleClass('expanded');
        $("." + $('#' + $(e.target).attr('for')).attr('class')).attr('checked', false);
        $('#' + $(e.target).attr('for')).attr('checked', true);
        // getMember();
        // console.log(e.target);
    });
    $(document).click(function () {
        $('.joForm__input').removeClass('expanded');
    });
        clickCont = document.querySelector('input[name="contType"]:checked');
</script>
<!-- 雪景 -->
<!-- <script>
        var c = document.getElementById('canv'), 
        $ = c.getContext("2d");
    var w = c.width = window.innerWidth, 
        h = c.height = window.innerHeight;
    
    Snowy();
    function Snowy() {
      var snow, arr = [];
      var num = 60, tsc = 1, sp = 0.4;
      var sc = 1.3, t = 0, mv = 20, min = 1;
        for (var i = 0; i < num; ++i) {
          snow = new Flake();
          snow.y = Math.random() * (h + 50);
          snow.x = Math.random() * w;
          snow.t = Math.random() * (Math.PI * 2);
          snow.sz = (100 / (10 + (Math.random() * 100))) * sc;
          snow.sp = (Math.pow(snow.sz * .8, 2) * .15) * sp;
          snow.sp = snow.sp < min ? min : snow.sp;
          arr.push(snow);
        }
      go();
      function go(){
        window.requestAnimationFrame(go);
          $.clearRect(0, 0, w, h);
          $.fillStyle = 'hsla(242, 95%, 3%, 0)';
          $.fillRect(0, 0, w, h);
          $.fill();
            for (var i = 0; i < arr.length; ++i) {
              f = arr[i];
              f.t += .05;
              f.t = f.t >= Math.PI * 2 ? 0 : f.t;
              f.y += f.sp;
              f.x += Math.sin(f.t * tsc) * (f.sz * .3);
              if (f.y > h + 50) f.y = -10 - Math.random() * mv;
              if (f.x > w + mv) f.x = - mv;
              if (f.x < - mv) f.x = w + mv;
              f.draw();}
     }
     function Flake() {
       this.draw = function() {
          this.g = $.createRadialGradient(this.x, this.y, 0, this.x, this.y, this.sz);
          this.g.addColorStop(0, 'hsla(255,255%,255%,1)');
          this.g.addColorStop(1, 'hsla(255,255%,255%,0)');
          $.moveTo(this.x, this.y);
          $.fillStyle = this.g;
          $.beginPath();
          $.arc(this.x, this.y, this.sz, 0, Math.PI * 2, true);
          $.fill();}
      }
    }
    /*________________________________________*/
    window.addEventListener('resize', function(){
      c.width = w = window.innerWidth;
      c.height = h = window.innerHeight;
    }, false);

</script> -->
</html>
<!-- <script src="js/robot.js"></script> -->