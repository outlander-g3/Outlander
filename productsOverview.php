<?php
// session_start();

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

        
        // if isset()
        // $sql = ""
        // $mt = 1;
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
            <form method="get">
                <input type="hidden" name="dateInfo" id="dateInfo">
                <!-- <input type="submit" value="nj/4"> -->
            </form>
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
                    <input type="radio" name="levelType" value="choose" checked id="level-choose" class="aa">
                    <label for="level-choose">請選擇難易度</label>

                    <input type="radio" name="levelType" value="1" id="hard" class="aa">
                    <label for="hard">難</label>
                    <!-- <label for="hard"><img src="img/tree_f.png" alt=""></label> -->

                    <input type="radio" name="levelType" value="2" id="very-hard" class="aa">
                    <label for="very-hard">很難</label>

                    <input type="radio" name="levelType" value="3" id="hard-hard" class="aa">
                    <label for="hard-hard">非常難</label>
                </span>
            </form>
            <!-- 預算 -->
            <form class="" id="budget">
                <span class="joForm__input">
                    <input type="radio" name="budgetType" value="choose" checked="checked" id="bud-choose">
                    <label for="bud-choose">請選擇預算</label>
                    <input type="radio" name="budgetType" value="1" id="cont-1">
                    <label for="cont-1">1萬以內</label>
                    <input type="radio" name="budgetType" value="2" id="cont-2">
                    <label for="cont-2">1萬~5萬</label>
                    <input type="radio" name="budgetType" value="3" id="cont-3">
                    <label for="cont-3">5萬~20萬</label>
                </span>
            </form>
        </div>
    </div>

<!-- 點按篩選BAR取值並篩選-->
<script>
/////日期
window.addEventListener("load", () => {

$('#date-text').click(function (e) {
    e.preventDefault();
    e.stopPropagation();
    $(this).toggleClass('expanded');
    $('#' + $(e.target).attr('for')).prop('checked', true);
});
$(document).click(function () {
    $('#date-text').removeClass('expanded');
});
$(".calendar").click((e) => {
    e.preventDefault();
    e.stopPropagation();
    $(this).toggleClass('expanded');
    $('#' + $(e.target).attr('for')).prop('checked', true);
    // console.log(e.target);
})

var yy = new Date().getFullYear(); //年
var mm = new Date().getMonth(); //月份
var dd = new Date().getDate();//今天日期
var arrmm = new Array();
arrmm[0] = "一月";
arrmm[1] = "二月";
arrmm[2] = "三月";
arrmm[3] = "四月";
arrmm[4] = "五月";
arrmm[5] = "六月";
arrmm[6] = "七月";
arrmm[7] = "八月";
arrmm[8] = "九月";
arrmm[9] = "十月";
arrmm[10] = "十一月";
arrmm[11] = "十二月";
document.querySelector("#mm-sp").innerText = arrmm[mm];
document.querySelector("#yy-sp").innerText = yy;
var dayall = new Date(yy, mm, 0).getDate();//總天數
var bd = new Date(yy + "/" + (mm + 1) + "/1").getDay();//因為回傳月份是0-11 所以要+1  抓星期他只有1-12月
var dayfunction = () => {
    for (var i = 1; i < 7; i++) {
        var text = "";
        if (i == 1) {
            if (i - bd < 1) {
                for (var p = 0; p < bd; p++) {
                    text += "<td class='tdclass-1'></td>";
                }
            }
            for (var o = 1; o <= 7 - bd; o++) {
                text += "<td class='tdclass'>" + o + "</td>";
            }
        }
        else if (i == 2) {
            for (var o = 8 - bd; o <= 14 - bd; o++) {
                text += "<td class='tdclass'>" + o + "</td>";
            }
        }
        else if (i == 3) {
            for (var o = 15 - bd; o <= 21 - bd; o++) {
                text += "<td class='tdclass'>" + o + "</td>";
            }
        }
        else if (i == 4) {
            for (var o = 22 - bd; o <= 28 - bd; o++) {
                text += "<td class='tdclass'>" + o + "</td>";
            }
        }
        else if (i == 5) {
            if (bd > 4 && dayall > 28) {
                for (var o = 29 - bd; o <= 35 - bd; o++) {
                    text += "<td class='tdclass'>" + o + "</td>";
                }
                var tr = document.createElement("tr");
                document.querySelector("#calendar-tb").appendChild(tr).innerHTML = text;
                text = "";
                for (var o = 36 - bd; o <= dayall; o++) {
                    text += "<td class='tdclass'>" + o + "</td>";
                }
            } else {
                for (var o = 29 - bd; o <= dayall; o++) {
                    text += "<td class='tdclass'>" + o + "</td>";
                }

            }

        }

        var tr = document.createElement("tr");
        document.querySelector("#calendar-tb").appendChild(tr).innerHTML = text;
    }
}
dayfunction();
document.querySelector("#left-1").addEventListener("click", (e) => {
    var num = arrmm.indexOf(document.querySelector("#mm-sp").innerText);
    dayall = new Date(yy, num, 0).getDate();//總天數
    document.querySelector("#calendar-tb").innerHTML = "";
    if (num - 1 < 0) {
        num = 12;
        yy--;
    }
    bd = new Date(yy + "/" + num + "/1").getDay();
    dayfunction(bd, dayall);
    // console.log(arrmm.indexOf( document.querySelector("#mm-sp").innerText));
    document.querySelector("#mm-sp").innerText = arrmm[num - 1];
    document.querySelector("#yy-sp").innerText = yy;
    load();
})
document.querySelector("#right-1").addEventListener("click", (e) => {
    var num = arrmm.indexOf(document.querySelector("#mm-sp").innerText);
    if (num == 0) {
        dayall = new Date(yy, 2, 0).getDate()
        bd = new Date(yy + "/" + 2 + "/1").getDay();
    } else if (num == 11) {
        dayall = new Date(yy, num + 1, 0).getDate();//總天數
        bd = new Date(yy + "/" + (num + 1) + "/1").getDay();
    } else if (num == 10) {
        dayall = new Date(yy, num, 0).getDate();//總天數
        bd = new Date(yy + "/" + (num) + "/1").getDay();
    }
    else {
        dayall = new Date(yy, num + 2, 0).getDate();//總天數
        bd = new Date(yy + "/" + (num + 2) + "/1").getDay();
    }
    document.querySelector("#calendar-tb").innerHTML = "";
    if (num + 1 > 11) {
        num = -1;
        yy++;
    }
    dayfunction(bd, dayall);
    document.querySelector("#mm-sp").innerText = arrmm[num + 1];
    document.querySelector("#yy-sp").innerText = yy;
    load();
})

var len;
var arr = new Array();
function load() {
    len = document.getElementsByClassName("tdclass");
    var ss;
    for (var k = 0; k <= len.length - 1; k++) {
        ss = document.getElementsByClassName("tdclass")[k];
        ss.addEventListener("click", tdclass);
        arr[k]=ss;
    }
}
function tdclass(e) {
        for(var i = 0 ; i<=len.length-1 ; i++){
            arr[i].style.background="#F4F4F4";
        }
        e.target.style.background="#F99D19";
        var value = document.querySelector("#mm-sp").innerText;
        var mmtext = Number(arrmm.indexOf(value));//月
        mmtext += 1;
        datevalue = document.querySelector("#yy-sp").innerText + "-" + mmtext + "-" + e.target.innerText;
        document.querySelector("#date-label").innerHTML = datevalue;
        $('#date-text').removeClass('expanded');
        document.querySelector("#date").value = datevalue;
        

        //////////////抓出點選的日期用ajax撈資料
        dateInfo = document.getElementById('dateInfo');
        dateInfo.value=datevalue;
        console.log("111",dateInfo.value);
        if(datevalue!="請選擇日期"){
            getDate();
        }
        function getDate(){
                var xhr = new XMLHttpRequest();
                xhr.addEventListener('load',(e)=>{
                if( xhr.status == 200 ){
                document.getElementById('mtmtmt').style.display="none";
                document.getElementById('textChange').innerText="篩選結果";                       
                document.getElementById('mtmtmtS').innerHTML = xhr.responseText;
                for (var i = 0;i<document.getElementsByClassName('pro-item-pic').length;i++){
                document.getElementsByClassName('pro-item-pic')[i].classList.remove('pro-item-pic-hot');//拿掉熱門標籤
            }
        }else{
            alert( xhr.status );
       }
  });
    contTypeObj = document.querySelector('input[name="contType"]:checked+label').previousElementSibling;
    // console.log("....", contTypeObj.value);
    levelTypeObj = document.querySelector('input[name="levelType"]:checked+label').previousElementSibling;
    // console.log("------", levelTypeObj.value);
    budgetTypeObj = document.querySelector('input[name="budgetType"]:checked+label').previousElementSibling;
    // console.log("=====", budgetTypeObj.value); 
//   var url = "getSelected.php?dateInfo="+dateInfo.value;
  var url = "productsOverview_getSelected.php?dateInfo="+dateInfo.value+"&continent="+contTypeObj.value+"&levelType="+levelTypeObj.value+"&budgetType="+budgetTypeObj.value;
  console.log("點日期:",url);
  xhr.open("Get", url, true);
  xhr.send( null );
            
}





    }
load();
})



//抓洲、難易度、預算篩選資料
clickCont = document.querySelectorAll('input[name="contType"]+label');
clickLevel = document.querySelectorAll('input[name="levelType"]+label');
clickBudget = document.querySelectorAll('input[name="budgetType"]+label');

for(let i=0;i<clickCont.length;i++){
  clickCont[i].addEventListener('click',getFilter);
}
for(let i=0;i<clickLevel.length;i++){
  clickLevel[i].addEventListener('click',getFilter);
}
for(let i=0;i<clickBudget.length;i++){
  clickBudget[i].addEventListener('click',getFilter);
}
function getFilter(e){
    console.log("dateInfo.value:",dateInfo.value);
    contTypeObj = document.querySelector('input[name="contType"]:checked+label').previousElementSibling;
    
    levelTypeObj = document.querySelector('input[name="levelType"]:checked+label').previousElementSibling;
    console.log("------", levelTypeObj.value);
    budgetTypeObj = document.querySelector('input[name="budgetType"]:checked+label').previousElementSibling;
    console.log("=====", budgetTypeObj.value);
    console.log("fff",e.target);

    if(e.target.previousElementSibling.name == 'contType'){
        contTypeObj = e.target.previousElementSibling;
        console.log("....", contTypeObj.value);
    }
    if(e.target.previousElementSibling.name == 'levelType'){
        levelTypeObj = e.target.previousElementSibling;
    }
    if(e.target.previousElementSibling.name == 'budgetType'){
        budgetTypeObj = e.target.previousElementSibling;
    }
  var xhr = new XMLHttpRequest();
  xhr.addEventListener('load',(e)=>{
    if( xhr.status == 200 ){
        document.getElementById('mtmtmt').style.display="none";
        document.getElementById('textChange').innerText="篩選結果";                       
        document.getElementById('mtmtmtS').innerHTML = xhr.responseText;
        for (var i = 0;i<document.getElementsByClassName('pro-item-pic').length;i++){
        document.getElementsByClassName('pro-item-pic')[i].classList.remove('pro-item-pic-hot');//拿掉熱門標籤
      }
       }else{
          alert( xhr.status );
       }
  }); 
  url = "productsOverview_getSelected.php?dateInfo="+dateInfo.value+"&continent="+contTypeObj.value+"&levelType="+levelTypeObj.value+"&budgetType="+budgetTypeObj.value;
  console.log("點了其他:",url);
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
                <a href="product.php?pdkNo=<?php echo $prodRow['pdkNo'];?>">
                    <div class="pro-item-pic">
                        <img src="img/mt/<?php echo $prodRow["pdkNo"]?>/1.jpg" alt="EBC">
                    </div>
                    <h4> <?php echo $prodRow["pdkName"];?></h4>
                    <div class="pro-item-view-flex">
                        <p>評價：</p>
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

    <div class="pro-product-wrap">
        <h3 id="textChange">近期開團</h3>
        <div class="pro-item-flex pro-item-flex-three" id="mtmtmtS">
            <!-- 1個商品卡 -->
            <?php	
            while($prodRowRe = $recent->fetch(PDO::FETCH_ASSOC)){
            ?>
            <div class="pro-item pro-item-three">
                <a href="product.php?pdkNo=<?php echo $prodRow['pdkNo'];?>">
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

<!-- 選擇日期 -->
<!-- <script src="js/proview_date.js"></script> -->
<!-- 風景卡片 -->
<script src="js/productsOverview_viewcard.js"></script>
<!-- 下拉式選單 -->
<script src="js/productsOverview_dropdown.js"></script>
<!-- 雪景 -->
<!-- <script src="js/productsOverview_snow.js"></script> -->

</body>
</html>
