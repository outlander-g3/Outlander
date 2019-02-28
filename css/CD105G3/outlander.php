<?php
    session_start();
    // include_once('connectDb.php'); //連線
    // include_once('session.php'); //判斷會員是否登入
?>

<?php
try {
    require_once("connectDb.php");
    // 自動幫我們更新訂單～～～
    $today=date('Y-m-d');
    $sql="update `order` set ordStatus = 1 where ordStatus=0 and (ordStart between '2000-01-01' and '{$today}')";
    $pdo->exec($sql);
}
catch (PDOException $e) {
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
    <title>山行者 - 首頁</title>
    <link rel="Shortcut Icon" type="image/x-icon" href="img/logo.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="css/robot.css"> -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/vue.min.js"></script>
    <!-- <script src="js/enquire.min.js"></script> -->
    <!-- css塞這 自己js塞屁股 -->
    <link rel="stylesheet" href="css/index.css">


</head>

<body id="body">

    <!-- 插入header -->
    <?php
        include_once('header.php');
    ?>

    <!-- ===========================各分頁內容開始======================= -->

    <?php
require_once("connectDb.php");
$pdkNameArr =Array();
$levelArr =Array();
$avgRateArr =Array();
$pdkContArr =Array();
$pdkPriceArr =Array();
$pdkNo = Array();


$pdkNameArr[0] = 0;//名
$levelArr[0] = 0;//難度
$avgRateArr[0] = 0;//評價
$pdkContArr[0] = 0;//文字
$pdkPriceArr[0] = 0;//價錢
$pdkNo[0] =  0; //編號

$pdkNameArr[1] = 0;//名
$levelArr[1] = 0;//難度
$avgRateArr[1] = 0;//評價
$pdkContArr[1] = 0;//文字
$pdkPriceArr[1] = 0;//價錢
$pdkNo[1] =  0; //編號


$pdkNameArr[2] = 0;//名
$levelArr[2] = 0;//難度
$avgRateArr[2] = 0;//評價
$pdkContArr[2] = 0;//文字
$pdkPriceArr[2] = 0;//價錢
$pdkNo[2] =  0; //編號


$pdkNameArr[3] = 0;//名
$levelArr[3] = 0;//難度
$avgRateArr[3] = 0;//評價
$pdkContArr[3] = 0;//文字
$pdkPriceArr[3] = 0;//價錢
$pdkNo[3] =  0; //編號


$pdkNameArr[4] = 0;//名
$levelArr[4] = 0;//難度
$avgRateArr[4] = 0;//評價
$pdkContArr[4] = 0;//文字
$pdkPriceArr[4] = 0;//價錢
$pdkNo[4] =  0; //編號


$pdkNameArr[5] = 0;//名
$levelArr[5] = 0;//難度
$avgRateArr[5] = 0;//評價
$pdkContArr[5] = 0;//文字
$pdkPriceArr[5] = 0;//價錢
$pdkNo[5] =  0; //編號


$pdkNameArr[6] = 0;//名
$levelArr[6] = 0;//難度
$avgRateArr[6] = 0;//評價
$pdkContArr[6] = 0;//文字
$pdkPriceArr[6] = 0;//價錢
$pdkNo[6] =  0; //編號


$pdkNameArr[7] = 0;//名
$levelArr[7] = 0;//難度
$avgRateArr[7] = 0;//評價
$pdkContArr[7] = 0;//文字
$pdkPriceArr[7] = 0;//價錢
$pdkNo[7] =  0; //編號


$pdkNameArr[8] = 0;//名
$levelArr[8] = 0;//難度
$avgRateArr[8] = 0;//評價
$pdkContArr[8] = 0;//文字
$pdkPriceArr[8] = 0;//價錢
$pdkNo[8] =  0; //編號


$pdkNameArr[9] = 0;//名
$levelArr[9] = 0;//難度
$avgRateArr[9] = 0;//評價
$pdkContArr[9] = 0;//文字
$pdkPriceArr[9] = 0;//價錢
$pdkNo[9] =  0; //編號



$i=0;
$sql1 = "select a.*, avg(rate) avgRate from `productkind` a join `product` b on a.pdkNo = b.pdkNo join `order` c on b.pdNo = c.pdNo group by pdkNo ORDER BY `avgRate`  DESC ";
$te = $pdo -> query($sql1);
$te -> bindColumn("pdkName", $pdkName);
$te -> bindColumn("level", $level);
$te -> bindColumn("avgRate", $avgRate);
$te -> bindColumn("pdkCont", $pdkCont);
$te -> bindColumn("pdkPrice", $pdkPrice);
$te -> bindColumn("pdkNo", $pdkNo1);
while($te->fetch(PDO::FETCH_ASSOC)){

    if($avgRate>4.5){
        $pdkNameArr[$i] =  $pdkName;//名
        $levelArr[$i] =  $level;//難度
        $avgRateArr[$i] =  $avgRate;//評價
        $pdkContArr[$i] =  $pdkCont;//文字
        $pdkPriceArr[$i] =  $pdkPrice;//價錢
        $pdkNo[$i] = $pdkNo1; //編號
        // echo $pdkNo[$i];
        $i++;
    }
    // echo $pdkName.$level.$avgRate.$pdkCont.$pdkPrice;
}
// echo $pdkContArr[4];

$pdkNameArrjs = count($pdkNameArr);
  ?>

    <form action="productsOverview.php">
        <section class="index-warpper" id="index-banner">
            <img src="img/banner_mt.png" alt="banner">
            <div id="banner-title">
                <h1>山行者</h1>
                <p>去爬山喜馬拉雅合歡</p>
            </div>
            <div id="banner-search">
                <input type="text" id="bannerSearch" name="searchinput" value="">
                <input type="submit" id="bannersub" name="searSub" value="">
                <i class="material-icons" id="bannericon">search</i>
            </div>
        </section>
    </form>
    <script>


        $(".imgmt").click((e) => {
            document.querySelector("#searchinput").value = e.target.nextSibling.nextSibling.innerText;
            document.querySelector("#searSub").value = $(e.target).attr("alt");
            document.querySelector("#bannerSearch").value = e.target.nextSibling.nextSibling.innerText;
            document.querySelector("#bannersub").value = $(e.target).attr("alt");
            location.href = "productsOverview.php?searSub=" + document.querySelector("#bannersub").value + "&searchinput=" + document.querySelector("#bannerSearch").value;

        })
        $("#bannericon").click(() => {
            if (document.querySelector("#bannerSearch").value == "") {
                alert("請輸入關鍵字");
            } else {
                // open("text.php?searSub="+document.querySelector("#bannersub").value+"&searchinput="+document.querySelector("#bannerSearch").value);
                location.href = "productsOverview.php?searSub=" + document.querySelector("#bannersub").value + "&searchinput=" + document.querySelector("#bannerSearch").value;
            }
        })

    </script>



    <section class="index-warpper" id="index-stroke">
        <div class="index-stroke-img">
            <img id="index-stroke-img" src="img/mt/<?php echo $pdkNo[0]?>/index.jpg" alt="yosimite">
            <div id="index-img-span">
                <?php for($u = 0; $u<$i;$u++){
                    echo "<span class='img-sw-span'></span>";
                }?>

                <!-- <span class="img-sw-span"></span>
                <span class="img-sw-span"></span>
                <span class="img-sw-span"></span>
                <span class="img-sw-span"></span> -->
            </div>
        </div>
        <?php 
        
        $img="";
        for($j=0;$j<$levelArr[0]; $j++){ 
            $img .= '<i class="fas fa-hiking"></i>';
        }
        $img2="";
        for($j=0; $j<floor($avgRateArr[0]); $j++){ 
            $img2 .= '<img src="img/tree_j.png" class="avgRateArr" alt="rate">';
        }
            if($avgRateArr[0]*10%10 != 0){
                $img2 .= '<img src="img/tree_f_h.png" class=" tree_half" alt="rate">';

            }
        ?>
        <div class="stroke">
            <h2>精選行程</h2>
            <!-- <h3 id="stroke-h3">美西經典地標</h3> -->
            <div id="money">
                <h3 class="stroke-me" id="stroke-day"><?php echo $pdkNameArr[0] ?></h3>
                <p class="stroke-twd">NTD&nbsp<span id="stroke-twd"><?php echo number_format($pdkPriceArr[0]); ?></span>
                </p>
            </div>
            <p class="stroke-lv">難易度：<span id="stroke-lv"> <?php echo $img ?></span></p>
            <p>評價：<span id="stroke-evaluation"><?php echo $img2 ?></span></p>

            <div class="stroke-text" id="stroke-text">
                <p><?php echo $pdkContArr[0] ?></p>
            </div>
            <a id="index-product" class="btn-main-s" href="product.php?pdkNo=<?php echo $pdkNo[0]?>">查看行程</a>
            <div id="st-icon"><i id="icon-left" class="material-icons">keyboard_arrow_left</i><i id="icon-right"
                    class="material-icons">keyboard_arrow_right</i></div>
        </div>
    </section>
    <script>



        var web = window.innerWidth;
        //熱門行程的切換程式
        var index = 0;
        var cl = 0;//點擊次數 也是要取得資料的位子
        var tree = "<i class='fas fa-hiking'></i>";
        var eva1 = "<img src='img/tree_j.png' class='avgRateArr' alt='rate'>";
        var eva2 = "<img src='img/tree_f_h.png' class='tree_half' alt='rate'>";
        var imgspan = document.querySelectorAll(".img-sw-span");
        window.addEventListener("load", () => {
            //    console.log("12");
            //    console.log("123");
            window.addEventListener("resize", () => {
                index = 0;
                cl = 0;//點擊次數 也是要取得資料的位子
                web = window.innerWidth;
                // console.log(web);
                if (web < 768) {//判斷手機還是電腦
                    for (i = 0; i < imgspan.length; i++) {
                        document.getElementsByClassName("img-sw-span")[i].addEventListener("click", imgsw, true);

                    }

                } else if (web > 768) {//判斷手機還是電腦
                    document.querySelector("#icon-left").addEventListener("click", (e) => {
                        cl--;
                        if (cl == -1) {
                            cl = <?php echo $i - 1 ?>;
                        }
                        imgsw(e, cl);
                        // console.log(cl,"cl");
                    })
                    document.querySelector("#icon-right").addEventListener("click", (e) => {
                        cl++;
                        if (cl == <?php echo $i ?>) {
                        cl = 0;
                    }
                    imgsw(e, cl);
                    // console.log(cl,"cl");
                })

        }

    })






        if (web < 768) {//判斷手機還是電腦
            // console.log("1");
            for (i = 0; i < imgspan.length; i++) {
                document.getElementsByClassName("img-sw-span")[i].addEventListener("click", imgsw, true);

            }

        } else if (web > 768) {//判斷手機還是電腦
            // console.log("2");
            document.querySelector("#icon-left").addEventListener("click", (e) => {
                cl--;
                if (cl == -1) {
                    cl = <?php echo $i - 1 ?>;
                }
                imgsw(e, cl);
            })
            document.querySelector("#icon-right").addEventListener("click", (e) => {
                cl++;
                if (cl == <?php echo $i ?>) {
                cl = 0;
            }
            imgsw(e, cl);
            console.log(cl, "cl");
        })

    }
       
})


        //資料酷的資料
        function imgsw(e, cl) {//撰寫函式
            if (web > 768) {//桌機路
                index = cl;
            }
            else if (web < 768) {//手機路
                for (var i = 0; i < imgspan.length; i++) {
                    if (e.target == imgspan[i]) {
                        index = i;
                    }
                }
                $(".img-sw-span").css("background", "rgba(249, 157, 25, 0.3)");
                $(".img-sw-span").eq(index).css("background", "rgba(249, 157, 25, 0.6)");
            }

            //資料的存放地點
            if (index == 0) {
                var indextree1 = "";
                var indexeva1 = "";
                for (var i = 1; i <= <?php echo  $levelArr[0] ?>; i++) {//之後要知道難度改變數字
                    indextree1 += tree;
                }
                for (var i = 1; i <= <?php echo floor($avgRateArr[0]) ?>; i++) {//之後要知道評價改變數字
                    indexeva1 += eva1;
                }
                if (<?php echo $avgRateArr[0] * 10 % 10 ?>!= 0) {
                    indexeva1 += eva2;
                }
                document.querySelector("#index-stroke-img").src = "img/mt/<?php echo $pdkNo[0]?>/index.jpg";
                document.querySelector("#stroke-day").innerHTML = "<?php echo $pdkNameArr[0] ?>";
                document.querySelector("#stroke-twd").innerHTML = "<?php echo  number_format($pdkPriceArr[0]) ?>";
                document.querySelector("#stroke-lv").innerHTML = indextree1;
                document.querySelector("#stroke-evaluation").innerHTML = indexeva1;
                document.querySelector("#stroke-text").innerHTML = "<p>" + `<?php echo $pdkContArr[0]?>` + "</p>";
                $("#index-product").attr("href", "product.php?pdkNo=<?php echo $pdkNo[0]?>");

            }
            else if (index == 1) {
                var indextree1 = "";
                var indexeva1 = "";
                for (var i = 1; i <= <?php echo  $levelArr[1] ?>; i++) {//之後要知道難度改變數字
                    indextree1 += tree;
                }
                for (var i = 1; i <= <?php echo floor($avgRateArr[1]) ?>; i++) {//之後要知道評價改變數字
                    indexeva1 += eva1;
                }
                if (<?php echo $avgRateArr[1] * 10 % 10 ?>!= 0) {
                    indexeva1 += eva2;
                }
                document.querySelector("#index-stroke-img").src = "img/mt/<?php echo $pdkNo[1]?>/index.jpg";
                document.querySelector("#stroke-day").innerHTML = "<?php echo $pdkNameArr[1] ?>";
                document.querySelector("#stroke-twd").innerHTML = "<?php echo  number_format($pdkPriceArr[1]) ?>";
                document.querySelector("#stroke-lv").innerHTML = indextree1;
                document.querySelector("#stroke-evaluation").innerHTML = indexeva1;
                document.querySelector("#stroke-text").innerHTML = "<p>" + `<?php echo $pdkContArr[1]?>` + "</p>";
                $("#index-product").attr("href", "product.php?pdkNo=<?php echo $pdkNo[1]?>");

            }
            else if (index == 2) {
                var indextree1 = "";
                var indexeva1 = "";
                for (var i = 1; i <= <?php echo  $levelArr[2] ?>; i++) {//之後要知道難度改變數字
                    indextree1 += tree;
                }
                for (var i = 1; i <= <?php echo floor($avgRateArr[2]) ?>; i++) {//之後要知道評價改變數字
                    indexeva1 += eva1;
                }
                if (<?php echo $avgRateArr[2] * 10 % 10 ?>!= 0) {
                    indexeva1 += eva2;
                }
                document.querySelector("#index-stroke-img").src = "img/mt/<?php echo $pdkNo[2]?>/index.jpg";
                document.querySelector("#stroke-day").innerHTML = "<?php echo $pdkNameArr[2] ?>";
                document.querySelector("#stroke-twd").innerHTML = "<?php echo  number_format($pdkPriceArr[2]) ?>";
                document.querySelector("#stroke-lv").innerHTML = indextree1;
                document.querySelector("#stroke-evaluation").innerHTML = indexeva1;
                document.querySelector("#stroke-text").innerHTML = "<p>" + `<?php echo $pdkContArr[2]?>` + "</p>";
                $("#index-product").attr("href", "product.php?pdkNo=<?php echo $pdkNo[2]?>");

            }
            else if (index == 3) {
                var indextree1 = "";
                var indexeva1 = "";
                for (var i = 1; i <= <?php echo  $levelArr[3] ?>; i++) {//之後要知道難度改變數字
                    indextree1 += tree;
                }
                for (var i = 1; i <= <?php echo floor($avgRateArr[3]) ?>; i++) {//之後要知道評價改變數字
                    indexeva1 += eva1;
                }
                if (<?php echo $avgRateArr[3] * 10 % 10 ?>!= 0) {
                    indexeva1 += eva2;
                }
                document.querySelector("#index-stroke-img").src = "img/mt/<?php echo $pdkNo[3]?>/index.jpg";
                document.querySelector("#stroke-day").innerHTML = "<?php echo $pdkNameArr[3] ?>";
                document.querySelector("#stroke-twd").innerHTML = "<?php echo  number_format($pdkPriceArr[3]) ?>";
                document.querySelector("#stroke-lv").innerHTML = indextree1;
                document.querySelector("#stroke-evaluation").innerHTML = indexeva1;
                document.querySelector("#stroke-text").innerHTML = "<p>" + `<?php echo $pdkContArr[3]?>` + "</p>";
                $("#index-product").attr("href", "product.php?pdkNo=<?php echo $pdkNo[3]?>");
            } else if (index == 4) {
                var indextree1 = "";
                var indexeva1 = "";
                for (var i = 1; i <= <?php echo  $levelArr[4] ?>; i++) {//之後要知道難度改變數字
                    indextree1 += tree;
                }
                for (var i = 1; i <= <?php echo floor($avgRateArr[4]) ?>; i++) {//之後要知道評價改變數字
                    indexeva1 += eva1;
                }
                if (<?php echo $avgRateArr[3] * 10 % 10 ?>!= 0) {
                    indexeva1 += eva2;
                }
                document.querySelector("#index-stroke-img").src = "img/mt/<?php echo $pdkNo[4]?>/index.jpg";
                document.querySelector("#stroke-day").innerHTML = "<?php echo $pdkNameArr[4] ?>";
                document.querySelector("#stroke-twd").innerHTML = "<?php echo  number_format($pdkPriceArr[4]) ?>";
                document.querySelector("#stroke-lv").innerHTML = indextree1;
                document.querySelector("#stroke-evaluation").innerHTML = indexeva1;
                document.querySelector("#stroke-text").innerHTML = "<p>" + `<?php echo $pdkContArr[4]?>` + "</p>";
                $("#index-product").attr("href", "product.php?pdkNo=<?php echo $pdkNo[4]?>");
            } else if (index == 5) {
                var indextree1 = "";
                var indexeva1 = "";
                for (var i = 1; i <= <?php echo  $levelArr[5] ?>; i++) {//之後要知道難度改變數字
                    indextree1 += tree;
                }
                for (var i = 1; i <= <?php echo floor($avgRateArr[5]) ?>; i++) {//之後要知道評價改變數字
                    indexeva1 += eva1;
                }
                if (<?php echo $avgRateArr[5] * 10 % 10 ?>!= 0) {
                    indexeva1 += eva2;
                }
                document.querySelector("#index-stroke-img").src = "img/mt/<?php echo $pdkNo[5]?>/index.jpg";
                document.querySelector("#stroke-day").innerHTML = "<?php echo $pdkNameArr[5] ?>";
                document.querySelector("#stroke-twd").innerHTML = "<?php echo  number_format($pdkPriceArr[5]) ?>";
                document.querySelector("#stroke-lv").innerHTML = indextree1;
                document.querySelector("#stroke-evaluation").innerHTML = indexeva1;
                document.querySelector("#stroke-text").innerHTML = "<p>" + "<?php echo $pdkContArr[5]?>" + "</p>";
                $("#index-product").attr("href", "product.php?pdkNo=<?php echo $pdkNo[5]?>");
            } else if (index == 6) {
                var indextree1 = "";
                var indexeva1 = "";
                for (var i = 1; i <= <?php echo  $levelArr[6] ?>; i++) {//之後要知道難度改變數字
                    indextree1 += tree;
                }
                for (var i = 1; i <= <?php echo floor($avgRateArr[6]) ?>; i++) {//之後要知道評價改變數字
                    indexeva1 += eva1;
                }
                if (<?php echo $avgRateArr[6] * 10 % 10 ?>!= 0) {
                    indexeva1 += eva2;
                }
                document.querySelector("#index-stroke-img").src = "img/mt/<?php echo $pdkNo[6]?>/index.jpg";
                document.querySelector("#stroke-day").innerHTML = "<?php echo $pdkNameArr[6] ?>";
                document.querySelector("#stroke-twd").innerHTML = "<?php echo  number_format($pdkPriceArr[6]) ?>";
                document.querySelector("#stroke-lv").innerHTML = indextree1;
                document.querySelector("#stroke-evaluation").innerHTML = indexeva1;
                document.querySelector("#stroke-text").innerHTML = "<p>" + "<?php echo $pdkContArr[6]?>" + "</p>";
                $("#index-product").attr("href", "product.php?pdkNo=<?php echo $pdkNo[6]?>");
            } else if (index == 7) {
                var indextree1 = "";
                var indexeva1 = "";
                for (var i = 1; i <= <?php echo  $levelArr[7] ?>; i++) {//之後要知道難度改變數字
                    indextree1 += tree;
                }
                for (var i = 1; i <= <?php echo floor($avgRateArr[7]) ?>; i++) {//之後要知道評價改變數字
                    indexeva1 += eva1;
                }
                if (<?php echo $avgRateArr[7] * 10 % 10 ?>!= 0) {
                    indexeva1 += eva2;
                }
                document.querySelector("#index-stroke-img").src = "img/mt/<?php echo $pdkNo[7]?>/index.jpg";
                document.querySelector("#stroke-day").innerHTML = "<?php echo $pdkNameArr[7] ?>";
                document.querySelector("#stroke-twd").innerHTML = "<?php echo  number_format($pdkPriceArr[7]) ?>";
                document.querySelector("#stroke-lv").innerHTML = indextree1;
                document.querySelector("#stroke-evaluation").innerHTML = indexeva1;
                document.querySelector("#stroke-text").innerHTML = "<p>" + "<?php echo $pdkContArr[7]?>" + "</p>";
                $("#index-product").attr("href", "product.php?pdkNo=<?php echo $pdkNo[7]?>");
            } else if (index == 8) {
                var indextree1 = "";
                var indexeva1 = "";
                for (var i = 1; i <= <?php echo  $levelArr[8] ?>; i++) {//之後要知道難度改變數字
                    indextree1 += tree;
                }
                for (var i = 1; i <= <?php echo floor($avgRateArr[8]) ?>; i++) {//之後要知道評價改變數字
                    indexeva1 += eva1;
                }
                if (<?php echo $avgRateArr[8] * 10 % 10 ?>!= 0) {
                    indexeva1 += eva2;
                }
                document.querySelector("#index-stroke-img").src = "img/mt/<?php echo $pdkNo[8]?>/index.jpg";
                document.querySelector("#stroke-day").innerHTML = "<?php echo $pdkNameArr[8] ?>";
                document.querySelector("#stroke-twd").innerHTML = "<?php echo  number_format($pdkPriceArr[8]) ?>";
                document.querySelector("#stroke-lv").innerHTML = indextree1;
                document.querySelector("#stroke-evaluation").innerHTML = indexeva1;
                document.querySelector("#stroke-text").innerHTML = "<p>" + "<?php echo $pdkContArr[8]?>" + "</p>";
                $("#index-product").attr("href", "product.php?pdkNo=<?php echo $pdkNo[8]?>");
            } else if (index == 9) {
                var indextree1 = "";
                var indexeva1 = "";
                for (var i = 1; i <= <?php echo  $levelArr[9] ?>; i++) {//之後要知道難度改變數字
                    indextree1 += tree;
                }
                for (var i = 1; i <= <?php echo floor($avgRateArr[9]) ?>; i++) {//之後要知道評價改變數字
                    indexeva1 += eva1;
                }
                if (<?php echo $avgRateArr[9] * 10 % 10 ?>!= 0) {
                    indexeva1 += eva2;
                }
                document.querySelector("#index-stroke-img").src = "img/mt/<?php echo $pdkNo[9]?>/index.jpg";
                document.querySelector("#stroke-day").innerHTML = "<?php echo $pdkNameArr[9] ?>";
                document.querySelector("#stroke-twd").innerHTML = "<?php echo  number_format($pdkPriceArr[9]) ?>";
                document.querySelector("#stroke-lv").innerHTML = indextree1;
                document.querySelector("#stroke-evaluation").innerHTML = indexeva1;
                document.querySelector("#stroke-text").innerHTML = "<p>" + "<?php echo $pdkContArr[9]?>" + "</p>";
                $("#index-product").attr("href", "product.php?pdkNo=<?php echo $pdkNo[9]?>");
            }

        }


    </script>



    <section class="index-warpper" id="index-choose">
        <h3>已經想好去爬哪座山了嗎？</h3>
        <img src="img/bg_choose.png" alt="choose">
        <div id="chose-yesno">
            <section class="p12">
                <a href="cu.php" id="p12-yes" data-content="YES">YES</a>
                <button id="p12-btn">前往客製行程</button>
            </section>
            <section class="p12">
                <a id="p12-no" data-content="NO">NO</a>
                <button id="p12-btn-2">前往裝備篩選</button>
            </section>
        </div>
    </section>
    <script>

        window.addEventListener("load", () => {
            $("#p12-btn").click(() => {
                location.href = "cu.php";
            })
            // setInterval(()=>{
            //             console.log(scrollY);

            // },50)
            $("#p12-no").click(() => {
                window.scrollTo({
                    left: 0,
                    top: ($("#index-equipment").offset().top) - 50,
                    behavior: "smooth"
                });
            })
            $("#p12-btn-2").click(() => {
                window.scrollTo({
                    left: 0,
                    top: ($("#index-equipment").offset().top) - 50,
                    behavior: "smooth"
                });

            })
        })





    </script>

    <div id="index-game-bg">

        <section class="index-warpper" id="index-game">
            <div id="game-block-bg">
                <div id="game-h2">
                    <h2>登山小遊戲</h2>
                </div>
                <div id="game-all">
                        <div id="game-xx">
                            <span id="game-xx1"></span>
                            <span id="game-xx2"></span>
                        </div>
                    <div id="game-1">
                        <div id="game-bg-bbb"></div>
                        <!-- <canvas id="canvas"></canvas> -->
                        <img id="game-1-bg" src="img/game/bg_game1.svg" alt="bg_game1">
                        <div id="hourglass-time">
                            <img id="hourglass" src="img/game/hourglass.png" alt=""><span id="time">30</span>
                        </div>
                        <div id="game-1-svg">
                            <svg id="click-game" xmlns="http://www.w3.org/2000/svg" width="55.684" height="75.891"
                                viewBox="0 0 55.684 75.891">
                                <g id="Group_394" data-name="Group 394" transform="translate(0 0)">
                                    <g id="資產_2" data-name="資產 2" transform="translate(2.546 57.847)">
                                        <g id="OBJECTS" transform="translate(0 0)">
                                            <path id="Path_288" data-name="Path 288"
                                                d="M10.4-.011,51.8,6.225,49.784,17.95,9.423,5.8a2.682,2.682,0,0,1-1.85-3.289A2.751,2.751,0,0,1,10.4-.011Z"
                                                transform="translate(-2.458 0.033)" fill="#58351f" />
                                            <path id="Path_289" data-name="Path 289"
                                                d="M64.786,14.287c-.565,3.242,1.09,6.209,3.686,6.68s5.166-1.816,5.724-5.045-1.09-6.229-3.686-6.68S65.351,11.079,64.786,14.287Z"
                                                transform="translate(-21.167 -2.985)" fill="#8b5e3c" />
                                            <path id="Path_290" data-name="Path 290"
                                                d="M47.043-.011,5.64,6.225,7.658,17.95,48.072,5.8a2.7,2.7,0,0,0,1.8-3.289A2.751,2.751,0,0,0,47.043-.011Z"
                                                transform="translate(-1.843 0.033)" fill="#7c4a19" />
                                            <path id="Path_291" data-name="Path 291"
                                                d="M9.517,14.287c.572,3.242-1.09,6.209-3.686,6.68S.671,19.151.106,15.922,1.2,9.693,3.792,9.242,8.952,11.079,9.517,14.287Z"
                                                transform="translate(0.005 -2.985)" fill="#8b5e3c" />
                                        </g>
                                    </g>
                                    <g id="fire1" transform="translate(0 0)">
                                        <path id="Path_273" data-name="Path 273"
                                            d="M117.322,59.256c-1.506-1.646-3.847-3.867-4.843,1.149a11.629,11.629,0,0,1-1.808,4.078,25.318,25.318,0,0,0-5-10.121,21,21,0,0,1-4.055-11.241,1.155,1.155,0,0,0-1.93-.763A32.775,32.775,0,0,0,89,66.629a16.708,16.708,0,0,1-4.375-6.841,1.527,1.527,0,0,0-2.716-.367c-.134.2-.258.407-.369.6-5.252,9.3-7.779,20.585-5.443,31.087C80,108.7,105.836,113.619,119.513,102.564,132.894,91.749,128.64,71.618,117.322,59.256Z"
                                            transform="translate(-72.39 -42.022)" fill="#ed694a" />
                                        <g id="Group_266" data-name="Group 266" transform="translate(2.834)">
                                            <path id="Path_274" data-name="Path 274"
                                                d="M80.691,200.72c-2.8-12.855.164-26.66,6.381-38.095-.157-.379-.309-.772-.45-1.18A1.852,1.852,0,0,0,83.331,161c-.162.246-.312.493-.448.733-6.367,11.258-9.43,24.93-6.6,37.649,2.159,9.716,9.85,16.237,19.15,19.189C88.179,215.057,82.5,209.033,80.691,200.72Z"
                                                transform="translate(-75.225 -153.95)" fill="#d8553a" />
                                            <path id="Path_275" data-name="Path 275"
                                                d="M177.262,71.442a41.065,41.065,0,0,1,10.966-27.218c-.047-.4-.082-.756-.1-1.027a1.38,1.38,0,0,0-2.288-.983,39.688,39.688,0,0,0-13,29.442l1.492,1.159a2.008,2.008,0,0,0,2.432.023A1.825,1.825,0,0,0,177.262,71.442Z"
                                                transform="translate(-156.132 -41.861)" fill="#d8553a" />
                                        </g>
                                        <path id="Path_276" data-name="Path 276"
                                            d="M161.627,180.274c-1.348-1.472-3.445-3.459-4.337,1.027a10.4,10.4,0,0,1-1.619,3.648,22.639,22.639,0,0,0-4.479-9.053,18.773,18.773,0,0,1-3.631-10.056,1.034,1.034,0,0,0-1.728-.683,29.3,29.3,0,0,0-9.565,21.711,14.944,14.944,0,0,1-3.917-6.12,1.368,1.368,0,0,0-2.432-.329c-.12.182-.231.364-.331.541-4.7,8.316-6.965,18.414-4.874,27.809,3.5,15.734,26.628,20.132,38.874,10.243C175.57,209.34,171.761,191.333,161.627,180.274Z"
                                            transform="translate(-123.932 -157.852)" fill="#f4a32c" />
                                        <path id="Path_277" data-name="Path 277"
                                            d="M129.075,282.327c-1.852-9.184.066-19.038,4.132-27.244a15.783,15.783,0,0,1-.858-2.011,1.368,1.368,0,0,0-2.432-.329c-.12.182-.231.364-.331.541-4.7,8.316-6.965,18.414-4.874,27.808,1.626,7.318,7.5,12.181,14.551,14.3A18.543,18.543,0,0,1,129.075,282.327Z"
                                            transform="translate(-115.286 -230.173)" fill="#e89528" />
                                        <path id="Path_278" data-name="Path 278"
                                            d="M193.914,287.442c-.913-1-2.332-2.342-2.936.7a7.037,7.037,0,0,1-1.1,2.47,15.322,15.322,0,0,0-3.032-6.128,12.711,12.711,0,0,1-2.458-6.807.7.7,0,0,0-1.17-.462,19.837,19.837,0,0,0-6.475,14.7,10.115,10.115,0,0,1-2.652-4.142.926.926,0,0,0-1.646-.222c-.081.123-.156.247-.224.366-3.184,5.629-4.715,12.465-3.3,18.825,2.367,10.651,18.026,13.628,26.315,6.934a13.332,13.332,0,0,0,4.956-9.1C200.736,299.16,198.653,292.614,193.914,287.442Z"
                                            transform="translate(-155.485 -250.804)" fill="#f4d44e" />
                                        <path id="Path_279" data-name="Path 279"
                                            d="M223.878,386.892c-.509-.555-1.3-1.3-1.636.387a3.919,3.919,0,0,1-.611,1.376,8.537,8.537,0,0,0-1.689-3.414,7.082,7.082,0,0,1-1.37-3.792.39.39,0,0,0-.652-.258,11.052,11.052,0,0,0-3.607,8.188,5.635,5.635,0,0,1-1.477-2.308.516.516,0,0,0-.917-.124c-.045.069-.087.137-.125.2a15.054,15.054,0,0,0-1.838,10.488c1.8,8.081,16.519,7.836,17.422-1.2A12.751,12.751,0,0,0,223.878,386.892Z"
                                            transform="translate(-189.614 -337.062)" fill="#eae9e8" />
                                        <path id="Path_280" data-name="Path 280"
                                            d="M213.374,399.245a12.27,12.27,0,0,1,1.838-9.382c.038-.06.08-.121.125-.183a.542.542,0,0,1,.917.111,5.07,5.07,0,0,0,1.477,2.065,9.355,9.355,0,0,1,2.479-6.26,7.12,7.12,0,0,1-1.638-4.146.39.39,0,0,0-.652-.258,11.052,11.052,0,0,0-3.607,8.188,5.637,5.637,0,0,1-1.477-2.308.516.516,0,0,0-.917-.124c-.045.069-.087.137-.125.2a15.054,15.054,0,0,0-1.838,10.488c.73,3.284,3.729,5.258,7.044,5.734A6.427,6.427,0,0,1,213.374,399.245Z"
                                            transform="translate(-188.908 -337.064)" fill="#f7e7a1" />
                                        <path id="Path_285" data-name="Path 285"
                                            d="M199.428,185.495a30.351,30.351,0,0,1,8.009-18.558q-.07-.533-.117-1.095a1.034,1.034,0,0,0-1.728-.683,28.823,28.823,0,0,0-9.072,16.51h0c-.085.477-.19,1.173-.256,1.719h0a32.724,32.724,0,0,0-.236,3.481C196.155,186.9,199.075,188.4,199.428,185.495Z"
                                            transform="translate(-177.236 -149.902)" fill="#e89528" />
                                        <g id="Group_268" data-name="Group 268" transform="translate(14.607 26.222)">
                                            <path id="Path_286" data-name="Path 286"
                                                d="M173.193,357.2a29.047,29.047,0,0,1,2.3-17.767,10.735,10.735,0,0,1-1.4-2.713.926.926,0,0,0-1.646-.222c-.081.123-.156.247-.224.366-3.184,5.629-4.715,12.465-3.3,18.825,1.109,4.988,5.132,8.293,9.949,9.71A12.954,12.954,0,0,1,173.193,357.2Z"
                                                transform="translate(-168.396 -325.983)" fill="#e8c842" />
                                            <path id="Path_287" data-name="Path 287"
                                                d="M221.746,289.311A21.353,21.353,0,0,1,225.3,280.3a14.711,14.711,0,0,1-.454-2.626.7.7,0,0,0-1.17-.462,19.406,19.406,0,0,0-5.465,8.457h0c-.165.509-.4,1.353-.539,2.019h0a21.757,21.757,0,0,0-.472,4.222C219.512,292.2,221.422,291.623,221.746,289.311Z"
                                                transform="translate(-208.853 -277.026)" fill="#e8c842" />
                                        </g>
                                    </g>
                                </g>
                            </svg>

                        </div>
                    </div>
                </div>
                <div id="game-btn">
                    <button class="btn btn-main-s" id="roll-game-btn">遊戲介紹</button>
                </div>
            </div>
        </section>

    </div>


    <!-- 遊戲1 -->

    <div class="jpBase deleteJn" id="game-jw-1">
        <div class="jpWin">
            <div class="jpTitle">
                登山遊戲
            </div>
            <div class="jpCont">
                <p>請點擊火推，於30秒內將火堆升起來，即可獲得50點紅利點數！</p>
            </div>
            <div class="jpBtn">
                <div class="row">
                    <!-- <button class="btn-jump-left" id="jw-game1-clear1">離開</button> -->
                    <button class="btn-jump-right" id="jw-game1-go1">開始遊戲</button>
                </div>
            </div>
        </div>
    </div>

    <!-- 遊戲成功的區塊 -->
    <div class="jpBase deleteJn" id="game-win-jw">
        <div class="jpWin">
            <div class="jpTitle">
                恭喜獲得紅利點數
            </div>
            <div class="jpCont">
                <p>50點</p>
                <p>記得登入可以獲得紅利點數！另外登山請注重保暖喔~!</p>
            </div>
            <div class="jpBtn">
                <div class="row">
                    <button class="btn-jump-left" id="jw-game1-clear2">登入</button>
                    <button class="btn-jump-right" id="jw-game1-go2">在玩一次</button>
                </div>
            </div>
        </div>
    </div>



    <div class="jpBase deleteJn" id="game-lose-jw">
        <div class="jpWin">
            <div class="jpTitle">
                遊戲結束
            </div>
            <div class="jpCont">
                <p>
                    您已凍死在山上?
                </p>
            </div>
            <div class="jpBtn">
                <div class="row">
                    <button class="btn-jump-left" id="jw-game1-clear3">確認</button>
                </div>
            </div>
        </div>
    </div>



    <?php  
   $sql = "select b.* from (select pdkNo,max(jnCollect) m from journal GROUP BY pdkNo) t,journal b where t.pdkNo=b.pdkNo and t.m=b.jnCollect";
   
    $te = $pdo -> query($sql);
    $te -> bindColumn("memNo", $memNo);
    $te -> bindColumn("jnDate", $jnDate);
    $te -> bindColumn("pdkNo", $pdkNoCard);
    $te -> bindColumn("jnNo", $jnNo);
    $te -> bindColumn("jnTitle", $jnTitle);
    $te -> bindColumn("jnCont", $jnCont);
    $te -> bindColumn("jnCollect", $MAXIMUM);
    

   
   
   ?>




    <section class="index-warpper" id="index-log">
        <h2>登山日誌</h2>

        <div id="button-all">
            <div class="button">
                <button class="map-btn">歐洲</button>
                <button class="map-btn btn-color">亞洲</button>
                <button class="map-btn">大洋</button>
            </div>
            <div class="button">
                <button class="map-btn">北美</button>
                <button class="map-btn">南美</button>
                <button class="map-btn">非洲</button>
            </div>
        </div>
        <iframe class="show map" src="img/map/map_europe.svg" id="europe" frameborder="0"></iframe>
        <iframe class="show" src="img/map/map_asia.svg" id="asia" frameborder="0"></iframe>
        <iframe class="show map" src="img/map/map_oceania.svg" id="oceania" frameborder="0"></iframe>
        <iframe class="show map" src="img/map/map_north_america.svg" id="namerica" frameborder="0"></iframe>
        <iframe class="show map" src="img/map/map_south_america.svg" id="samerica" frameborder="0"></iframe>
        <iframe class="show map" src="img/map/map_africa.svg" id="africa" frameborder="0"></iframe>
        <iframe id="map-all" src="img/map/map.svg" frameborder="0"></iframe>
        <a class="a-btn" href="journalsOverview.php">查看更多日誌</a>
        <?php
        while($te->fetch(PDO::FETCH_ASSOC)){
        $jnCont = mb_substr(strip_tags($jnCont),0,50,"utf-8");




    // $te -> bindColumn("memNo", $memNo);
    // $te -> bindColumn("pdkNo", $pdkNo);
    // $te -> bindColumn("jnNo", $jnNo);
    // $te -> bindColumn("jnTitle", $jnTitle);
    // $te -> bindColumn("jnCont", $jnCont);
    // $te -> bindColumn("MAXIMUM", $MAXIMUM);
?>


        <!-- 亞洲卡片 -->

        <!-- 富士山 -->
        <?php 
        if($pdkNoCard==3){

            
            ?>


        <article class="jo__onecard  map-card asia-card" id="asia-card-1" alt="<?php echo $jnNo?>">
            <a href="jn.php?jnNo=<?php echo $jnNo?>">
                <div class="whole card-none">
                    <img class="map-card-img" src="img/jn/<?php echo $jnNo?>/1.jpg" alt="<?php echo $jnNo?>">
                    <div class="jo__allinfo">
                        <p class="jo__publish">發表於<?php echo $jnDate;?></p>
                        <h3 class="jnTitle"><?php echo $jnTitle;?></h3>
                        <p class="jo__text">
                            <?php echo $jnCont;?>...
                        </p>
                        <div class="icon">
                            <div class="icon heart">
                                <i class="material-icons fav">favorite_border</i><span><?php echo $MAXIMUM;?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </article>



        <?php } else if($pdkNoCard ==1){
            ?>

        <!-- 玉山 -->


        <article class="jo__onecard  map-card asia-card" id="asia-card-2" alt="<?php echo $jnNo?>">
            <a href="jn.php?jnNo=<?php echo $jnNo?>">
                <div class="whole card-none">
                    <img class="map-card-img" src="img/jn/<?php echo $jnNo?>/1.jpg" alt="<?php echo $jnNo?>">
                    <div class="jo__allinfo">
                        <p class="jo__publish">發表於<?php echo $jnDate;?></p>
                        <h3 class="jnTitle"><?php echo $jnTitle;?></h3>
                        <p class="jo__text">
                            <?php echo $jnCont;?>...
                        </p>

                        <div class="icon">
                            <div class="icon heart">
                                <i class="material-icons fav">favorite_border</i><span><?php echo $MAXIMUM;?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </article>


        <?php  }else if($pdkNoCard==2){
            ?>

        <!-- ??? -->
        <article class="jo__onecard  map-card asia-card" id="asia-card-3" alt="<?php echo $jnNo?>">
            <a href="jn.php?jnNo=<?php echo $jnNo?>">
                <div class="whole card-none">
                    <img class="map-card-img" src="img/jn/<?php echo $jnNo?>/1.jpg" alt="<?php echo $jnNo?>">
                    <div class="jo__allinfo">
                        <p class="jo__publish">發表於<?php echo $jnDate;?></p>
                        <h3 class="jnTitle"><?php echo $jnTitle;?></h3>
                        <p class="jo__text">
                            <?php echo $jnCont;?>...
                        </p>

                        <div class="icon">
                            <div class="icon heart">
                                <i class="material-icons fav">favorite_border</i><span><?php echo $MAXIMUM;?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </article>

        <?php  }else if($pdkNoCard==8){?>

        <!-- 歐洲卡片 -->
        <!-- 少女峰 -->
        <article class="jo__onecard  map-card europe-card" id="europe-card-1" alt="<?php echo $jnNo?>">
            <a href="jn.php?jnNo=<?php echo $jnNo?>">
                <div class="whole card-none">
                    <img class="map-card-img" src="img/jn/<?php echo $jnNo?>/1.jpg" alt="<?php echo $jnNo?>">
                    <div class="jo__allinfo">
                        <p class="jo__publish">發表於<?php echo $jnDate;?></p>
                        <h3 class="jnTitle"><?php echo $jnTitle;?></h3>
                        <p class="jo__text">
                            <?php echo $jnCont;?>...
                        </p>

                        <div class="icon">
                            <div class="icon heart">
                                <i class="material-icons fav">favorite_border</i><span><?php echo $MAXIMUM;?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </article>



        <!-- 大洋洲卡片 -->

        <!-- 啊斯帕林 -->
        <?php }else if($pdkNoCard==4){?>

        <article class="jo__onecard  map-card oceania-card" id="oceania-card-1" alt="<?php echo $jnNo?>">
            <a href="jn.php?jnNo=<?php echo $jnNo?>">
                <div class="whole card-none">
                    <img class="map-card-img" src="img/jn/<?php echo $jnNo?>/1.jpg" alt="<?php echo $jnNo?>">
                    <div class="jo__allinfo">
                        <p class="jo__publish">發表於<?php echo $jnDate;?></p>
                        <h3 class="jnTitle"><?php echo $jnTitle;?></h3>
                        <p class="jo__text">
                            <?php echo $jnCont;?>...
                        </p>
                        <div class="icon">
                            <div class="icon heart">
                                <i class="material-icons fav">favorite_border</i><span><?php echo $MAXIMUM;?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </article>


        <?php }else if($pdkNoCard == 10){?>

        <!-- 北美洲卡片 -->

        <!-- 卡蘭 -->
        <article class="jo__onecard  map-card  namerica-card" id="namerica-card-1" alt="<?php echo $jnNo?>">
            <a href="jn.php?jnNo=<?php echo $jnNo?>">
                <div class="whole card-none">
                    <img class="map-card-img" src="img/jn/<?php echo $jnNo?>/1.jpg" alt="<?php echo $jnNo?>">
                    <div class="jo__allinfo">
                        <p class="jo__publish">發表於<?php echo $jnDate;?></p>
                        <h3 class="jnTitle"><?php echo $jnTitle;?></h3>
                        <p class="jo__text">
                            <?php echo $jnCont;?>...
                        </p>
                        <div class="icon">
                            <div class="icon heart">
                                <i class="material-icons fav">favorite_border</i><span><?php echo $MAXIMUM;?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </article>


        <?php } else if ($pdkNoCard==7){?>

        <!-- 南美洲卡片 -->


        <!-- 百內 -->

        <article class="jo__onecard  map-card  samerica-card" id="samerica-card-1" alt="<?php echo $jnNo?>">
            <a href="jn.php?jnNo=<?php echo $jnNo?>">
                <div class="whole card-none">
                    <img class="map-card-img" src="img/jn/<?php echo $jnNo?>/1.jpg" alt="<?php echo $jnNo?>">
                    <div class="jo__allinfo">
                        <p class="jo__publish">發表於<?php echo $jnDate;?></p>
                        <h3 class="jnTitle"><?php echo $jnTitle;?></h3>
                        <p class="jo__text">
                            <?php echo $jnCont;?>...
                        </p>
                        <div class="icon">
                            <div class="icon heart">
                                <i class="material-icons fav">favorite_border</i><span><?php echo $MAXIMUM;?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </article>





        <?php  }else if($pdkNoCard==9){?>
        <!-- 卡 -->
        <article class="jo__onecard  map-card  samerica-card" id="samerica-card-2" alt="<?php echo $jnNo?>">
            <a href="jn.php?jnNo=<?php echo $jnNo?>">
                <div class="whole card-none">
                    <img class="map-card-img" src="img/jn/<?php echo $jnNo?>/1.jpg" alt="<?php echo $jnNo?>">
                    <div class="jo__allinfo">
                        <p class="jo__publish">發表於<?php echo $jnDate;?></p>
                        <h3 class="jnTitle"><?php echo $jnTitle;?></h3>
                        <p class="jo__text">
                            <?php echo $jnCont;?>...
                        </p>
                        <div class="icon">
                            <div class="icon heart">
                                <i class="material-icons fav">favorite_border</i><span><?php echo $MAXIMUM;?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </article>

        <!-- ??? -->
        <?php }else if($pdkNoCard==5){?>

        <article class="jo__onecard  map-card  samerica-card" id="samerica-card-3" alt="<?php echo $jnNo?>">
            <a href="jn.php?jnNo=<?php echo $jnNo?>">
                <div class="whole card-none">
                    <img class="map-card-img" src="img/jn/<?php echo $jnNo?>/1.jpg" alt="<?php echo $jnNo?>">
                    <div class="jo__allinfo">
                        <p class="jo__publish">發表於<?php echo $jnDate;?></p>
                        <h3 class="jnTitle"><?php echo $jnTitle;?></h3>
                        <p class="jo__text">
                            <?php echo $jnCont;?>...
                        </p>
                        <div class="icon">
                            <div class="icon heart">
                                <i class="material-icons fav">favorite_border</i><span><?php echo $MAXIMUM;?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </article>


        <?php }else if($pdkNoCard==6){?>



        <!-- 非洲卡片 -->
        <!-- 馬札 -->
        <article class="jo__onecard  map-card  africa-card" id="africa-card-1" alt="<?php echo $jnNo?>">
            <a href="jn.php?jnNo=<?php echo $jnNo?>">
                <div class="whole card-none">
                    <img class="map-card-img" src="img/jn/<?php echo $jnNo?>/1.jpg" alt="<?php echo $jnNo?>">
                    <div class="jo__allinfo">
                        <p class="jo__publish">發表於<?php echo $jnDate;?></p>
                        <h3 class="jnTitle"><?php echo $jnTitle;?></h3>
                        <p class="jo__text">
                            <?php echo $jnCont;?>...
                        </p>
                        <div class="icon">
                            <div class="icon heart">
                                <i class="material-icons fav">favorite_border</i><span><?php echo $MAXIMUM;?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </article>

        <?php }
}?>
    </section>

    <script>
        var climgop = "";
        var climgop1 = "";
        var web = window.innerWidth;
        window.addEventListener("resize", () => {
            web = window.innerWidth;
        })
        $(".map-card").click((e) => {
            climgop = $(e.target).attr("alt");
            if (web < 992 && climgop == climgop1) {
                location.href = 'jn.php?jnNo=' + $(e.target).attr("alt");
            }
            if (web > 992) {
                location.href = 'jn.php?jnNo=' + $(e.target).attr("alt");
            }
        })
        $(".map-card-img").click((e) => {
            climgop1 = $(e.target).attr("alt");
        })



    </script>
    <form id="eqmfrom" name="formPost" method="POST">
        <section class="index-warpper" id="index-equipment">
            <div id="index-equipment-bg">

                <div id="index-equipment-50p">
                    <h2>推薦行程</h2>
                    <p>我們可以從你現有的裝備推薦行程給你</p>
                </div>
                <img id="people-img" src="img/eqm/people.png" alt="人類">
                <div id="eq-from">
                    <div class="eq-all">
                        <div class="people-equipment">
                            <div class="people-equipment-1" id="equipment-an-1">
                                <label for="equipment1" class="equipment-lable">
                                    <img class="eq1" src="img/eqm/冰爪.png" alt="冰爪">
                                </label>
                                <input class="input-checkbox" type="checkbox" name="equipment1" id="equipment1"
                                    value="23">
                                <label for="equipment1" class="eq-icon">
                                    <i class="material-icons">check_box</i>
                                    <i class="material-icons">check_box_outline_blank</i>
                                    <i>冰爪</i>
                                </label>
                            </div>
                            <div class="people-equipment-1" id="equipment-an-2">
                                <label for="equipment2" class="equipment-lable">
                                    <img src="img/eqm/帳篷.png" alt="帳篷">
                                </label>
                                <input class="input-checkbox" type="checkbox" name="equipment2" id="equipment2"
                                    value="1">
                                <label for="equipment2" class="eq-icon">
                                    <i class="material-icons">check_box</i>
                                    <i class="material-icons">check_box_outline_blank</i>
                                    <i>帳篷</i>
                                </label>
                            </div>
                        </div>
                        <div class="people-equipment">
                            <div class="people-equipment-1" id="equipment-an-3">
                                <label for="equipment3" class="equipment-lable">
                                    <img src="img/eqm/扣繩.png" alt="扣繩">
                                </label>
                                <input class="input-checkbox" type="checkbox" name="equipment3" id="equipment3"
                                    value="22">
                                <label for="equipment3" class="eq-icon">
                                    <i class="material-icons">check_box</i>
                                    <i class="material-icons">check_box_outline_blank</i>
                                    <i>扣繩</i>
                                </label>
                            </div>
                            <div class="people-equipment-1 " id="equipment-an-4">
                                <label for="equipment4" class="equipment-lable">
                                    <img class="eq1" src="img/eqm/睡袋.png" alt="睡袋">
                                </label>
                                <input class="input-checkbox" type="checkbox" name="equipment4" id="equipment4"
                                    value="3">
                                <label for="equipment4" class="eq-icon">
                                    <i class="material-icons">check_box</i>
                                    <i class="material-icons">check_box_outline_blank</i>
                                    <i>睡袋</i>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="eq-all">
                        <div class="people-equipment">
                            <div class="people-equipment-1" id="equipment-an-5">
                                <label for="equipment5" class="equipment-lable">
                                    <img class="eq1" src="img/eqm/手套.png" alt="手套">
                                </label>
                                <input class="input-checkbox" type="checkbox" name="equipment5" id="equipment5"
                                    value="14">
                                <label for="equipment5" class="eq-icon">
                                    <i class="material-icons">check_box</i>
                                    <i class="material-icons">check_box_outline_blank</i>
                                    <i>手套</i>
                                </label>
                            </div>
                            <div class="people-equipment-1" id="equipment-an-6">
                                <label for="equipment6" class="equipment-lable">
                                    <img class="eq1" src="img/eqm/登山杖.png" alt="登山杖">
                                </label>
                                <input class="input-checkbox" type="checkbox" name="equipment6" id="equipment6"
                                    value="17">
                                <label for="equipment6" class="eq-icon">
                                    <i class="material-icons">check_box</i>
                                    <i class="material-icons">check_box_outline_blank</i>
                                    <i>登山杖</i>
                                </label>
                            </div>
                        </div>
                        <div class="people-equipment">
                            <div class="people-equipment-1 " id="equipment-an-7">
                                <label for="equipment7" class="equipment-lable">
                                    <img class="eq1" src="img/eqm/登山鞋.png" alt="登山鞋">
                                </label>
                                <input class="input-checkbox" type="checkbox" name="equipment7" id="equipment7"
                                    value="18">
                                <label for="equipment7" class="eq-icon">
                                    <i class="material-icons">check_box</i>
                                    <i class="material-icons">check_box_outline_blank</i>
                                    <i>登山鞋</i>
                                </label>
                            </div>
                            <div class="people-equipment-1" id="equipment-an-8">
                                <label for="equipment8" class="equipment-lable">
                                    <img class="eq1" src="img/eqm/外套.png" alt="外套">
                                </label>
                                <input class="input-checkbox" type="checkbox" name="equipment8" id="equipment8"
                                    value="2">
                                <label for="equipment8" class="eq-icon">
                                    <i class="material-icons">check_box</i>
                                    <i class="material-icons">check_box_outline_blank</i>
                                    <i>外套</i>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="line" id="line-1"></div>
                    <div class="line" id="line-2"></div>
                    <div class="line" id="line-3"></div>
                    <div class="line" id="line-4"></div>
                    <div class="line" id="line-5"></div>
                </div>
                <div id="eq-sw-btn">
                    <div id="eq-switch"><span id="switch-left"></span><span id="switch-right"></span></div>
                    <div class="btn-color" id="eq-btn">看推薦行程</div>
                </div>

            </div>
        </section>
    </form>
    <script>
        window.addEventListener("load", () => {
            $("#textChange").hide();
        })




    </script>


    <div id="ba-product">
        <div class="pro-product-wrap">
            <h3 id="textChange">推薦行程</h3>
            <div class="pro-item-flex pro-item-flex-three" id="mtmtmtS"></div>
        </div>
    </div>
























    <!-- <div class="jump-window" id="eq-jw">
        <div class="ma-j">
            <div class="ju-w">
                <div class="h3-bg"></div>
                <h3>登山裝備</h3>
                <p>請至少選擇一件裝備</p>
                <button id="jw-clear">確定</button>
            </div>
        </div>
    </div> -->
    <div class="jpBase deleteJn" id="eq-jw">
        <div class="jpWin">
            <div class="jpTitle">
                登山裝備
            </div>
            <div class="jpCont">
                <p>請至少選擇一件裝備</p>
            </div>
            <div class="jpBtn">
                <div class="row">
                    <button class="btn-jump-left" id="jw-clear">確定</button>
                </div>
            </div>
        </div>
    </div>

    <!-- <div id="ma-ba"></div> -->



























    <!-- ===========================各分頁內容結束======================= -->
    <!-- 插入 footer 會員登入跟機器人 -->
    <?php
    include_once('footer.php');
    // include_once('robot.php');
    include_once('memLogin.php');
?>
</body>

</html>


<script src="js/common.js"></script>
<script src="js/header.js"></script>
<!-- <script src="js/robot.js"></script>  -->
<script src="js/index.js"></script>