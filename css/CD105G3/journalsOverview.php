<?php
    ob_start();
    session_start();
    // include_once('connectDb.php'); //連線
    // include_once('session.php'); //判斷會員是否登入

try {
    require_once("connectDb.php");

    $sqlLatestJn1 = "SELECT * FROM `journal` a where jnStatus = 1 order by jnDate desc limit 1 ";
    $latestJn1 = $pdo->query($sqlLatestJn1); 
    $latestJn1 -> bindColumn("jnNo", $jnNo);
	$latestJn1 -> bindColumn("jnTitle", $jnTitle);
	$latestJn1 -> bindColumn("jnCont", $jnCont);
	$latestJn1 -> bindColumn("jnDate", $jnDate);
    $latestJn1 -> bindColumn("jnImg", $jnImg);
    $latestJn1 -> bindColumn("jnCollect", $jnCollect);


    $sqlLatestJn2 = "SELECT * FROM `journal` where jnStatus = 1 order by jnDate desc limit 1,1 ";
    $latestJn2 = $pdo->query($sqlLatestJn2); 
    $latestJn2 -> bindColumn("jnNo", $jnNo);
	$latestJn2 -> bindColumn("jnTitle", $jnTitle);
	$latestJn2 -> bindColumn("jnCont", $jnCont);
	$latestJn2 -> bindColumn("jnDate", $jnDate);
    $latestJn2 -> bindColumn("jnImg", $jnImg);
    $latestJn2 -> bindColumn("jnCollect", $jnCollect);

    $sqlJns = "SELECT * FROM `journal` where jnStatus = 1 order by jnDate desc limit 2,40";
    $jns = $pdo->query($sqlJns); 
    $jns -> bindColumn("jnNo", $jnNo);
	$jns -> bindColumn("jnTitle", $jnTitle);
	$jns -> bindColumn("jnCont", $jnCont);
	$jns -> bindColumn("jnDate", $jnDate);
    $jns -> bindColumn("jnImg", $jnImg);
    $jns -> bindColumn("jnCollect", $jnCollect);

   

    
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
    <title>山行者 - 登山總覽</title>
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
    <link rel="stylesheet" href="css/journalsOverview.css">
    
    
</head>

<body>

<!-- 插入header -->
    <?php
        include_once('header.php');
    ?>

<!-- ===========================各分頁內容開始======================= -->
<div class="first-bg">
        <center>
            <h2>看心得找旅程</h2>
        </center>
        <div class="bg__map">
            <img src="img/line-style-map.svg" alt="日誌總覽地圖">
        </div>
        <div class="many__mounts">
            <!-- <a href="javascript:;" class="imgMount" value="3"> -->
                <div class="row">
                    <input type="hidden" name="mtImg" class="mtImg" value="3">
                    <img src="img/icon_mountain.svg" alt="富士山" class="imgMount" id="img-fuji" value="3">
                    <span alt="3" class="imgType" id="text-fuji">富士山</span>
                </div>
            <!-- </a> -->

            <!-- <a href="javascript:;" class="imgMount" value="2"> -->
                <div class="row">
                    <input type="hidden" name="mtImg" class="mtImg" value="2">
                    <img src="img/icon_mountain.svg" alt="聖母峰" class="imgMount" id="img-himalayas" value="2">
                    <span alt="2" class="imgType" id="text-himalayas">聖母峰</span>
                </div>
            <!-- </a> -->
            <!-- <a href="javascript:;" class="imgMount" value="5"> -->
                <div class="row">
                    <input type="hidden" name="mtImg" class="mtImg" value="5">
                    <img src="img/icon_mountain.svg" alt="百內國家公園" class="imgMount" value="5" id="img-paine">
                    <span alt="5" class="imgType" id="text-paine">百內國家公園</span>
                </div>
            <!-- </a> -->
            <!-- <a href="javascript:;" class="imgMount" value="1"> -->
                <div class="row">
                    <input type="hidden" name="mtImg" class="mtImg" value="1">
                    <img src="img/icon_mountain.svg" alt="玉山" class="imgMount" value="1" id="img-jade">
                    <span alt="1" class="imgType" id="text-jade">玉山</span>
                </div>
            <!-- </a> -->
            <!-- <a href="javascript:;" class="imgMount" value="8"> -->
                <div class="row">
                    <input type="hidden" name="mtImg" class="mtImg" value=8>
                    <img src="img/icon_mountain.svg" alt="少女峰" class="imgMount" value="8" id="img-alps">
                    <span alt="8" class="imgType" id="text-alps">少女峰</span>
                </div>
            <!-- </a> -->
            <!-- <a href="javascript:;" class="imgMount" value="7"> -->
                <div class="row">
                    <input type="hidden" name="mtImg" class="mtImg" value="7">
                    <img src="img/icon_mountain.svg" alt="馬丘比丘" class="imgMount" value="7" id="img-machu">
                    <span alt="7" class="imgType" id="text-machu">馬丘比丘</span>
                </div>
            <!-- </a> -->
            <!-- <a href="javascript:;" class="imgMount" value="9"> -->
                <div class="row">
                    <input type="hidden" name="mtImg" class="mtImg" value="9">
                    <img src="img/icon_mountain.svg" alt="瓦斯卡蘭" class="imgMount" value="9" id="img-huascaran">
                    <span alt="9" class="imgType" id="text-huascaran">瓦斯卡蘭</span>
                </div>
            <!-- </a> -->
            <!-- <a href="javascript:;" class="imgMount" value="6"> -->
                <div class="row">
                    <input type="hidden" name="mtImg" class="mtImg" value="6">
                    <img src="img/icon_mountain.svg" alt="吉力馬札羅" class="imgMount" value="6" id="img-kilimanjaro">
                    <span alt="6" class="imgType" id="text-kilimanjaro">吉力馬札羅</span>
                </div>
            <!-- </a> -->
            <!-- <a href="javascript:;" class="imgMount" value="4"> -->
                <div class="row">
                    <input type="hidden" name="mtImg" class="mtImg" value="4">
                    <img src="img/icon_mountain.svg" alt="阿斯帕林" class="imgMount" value="4" id="img-aspalin">
                    <span alt="4" class="imgType" id="text-aspalin">阿斯帕林</span>
                </div>
            <!-- </a> -->
            <!-- <a href="javascript:;" class="imgMount" value="10"> -->
                <div class="row">
                    <input type="hidden" name="mtImg" class="mtImg" value="10">
                    <img src="img/icon_mountain.svg" alt="優勝美地國家公園" class="imgMount" value="10" id="img-yosemite">
                    <span alt="10" class="imgType" id="text-yosemite">優勝美地國家公園</span>
                </div>
            <!-- </a> -->


        </div>
</div>

    <!-- 篩選bar / 寫日誌的按鈕  -->
    <!-- <a name="jo__results"></a> -->
    <div class="second-bg">
        <div class="jo__filter__and__write">
            <div class="row">
                <div class="jo__filter">
                    <div class="row">
                        <form class="" id="mtFilter">
                            <span class="joForm__input">
                                <input type="radio" name="mtType" class="mtType" value="choose" checked id="mt-choose">
                                <label for="mt-choose">請選擇山岳</label>

                                <input type="radio" name="mtType" class="mtType" value="1" id="mt-jade">
                                <label for="mt-jade">玉山</label>

                                <input type="radio" name="mtType" class="mtType" value="2" id="mt-himalayas">
                                <label for="mt-himalayas">聖母峰</label>

                                <input type="radio" name="mtType" class="mtType" value="3" id="mt-fuji">
                                <label for="mt-fuji">富士山</label>

                                <input type="radio" name="mtType" class="mtType" value="4" id="mt-aspalin">
                                <label for="mt-aspalin">阿斯帕林</label>

                                <input type="radio" name="mtType" class="mtType" value="5" id="mt-paine">
                                <label for="mt-paine">百內國家公園</label>

                                <input type="radio" name="mtType" class="mtType" value="6" id="mt-kilimanjaro">
                                <label for="mt-kilimanjaro">吉力馬札羅</label>

                                <input type="radio" name="mtType" class="mtType" value="7" id="mt-machu">
                                <label for="mt-machu">馬丘比丘</label>
                                

                                <input type="radio" name="mtType" class="mtType" value="8" id="mt-alps">
                                <label for="mt-alps">少女峰</label>

                                <input type="radio" name="mtType" class="mtType" value="9" id="mt-huascaran">
                                <label for="mt-huascaran">瓦斯卡蘭</label>                              

                                <input type="radio" name="mtType" class="mtType" value="10" id="mt-yosemite">
                                <label for="mt-yosemite">優勝美地國家公園</label>

                                <input type="radio" name="mtType" class="mtType" value="0" id="mt-others">
                                <label for="mt-others">其他</label>
                            </span>
                        </form>
                    </div>
                </div>
                <div class="jo__write">
                        <button class="btn-main-l" id="button_with_pencil"><i class="fas fa-pen"></i><span id="jo_write_text">
                            我要寫日誌</span></button>
                </div>
            </div>
        </div>

        <!-- 第二屏日誌的總覽 -->
        <div id=jo__allcards__bg>
            <main class="jo__allcards" id="refreshJo"> 
            <div class="row">
<?php	
while($latestJn1->fetch(PDO::FETCH_ASSOC)){
    $jnCont = mb_substr(strip_tags($jnCont),0,80,"utf-8");

    //內篩選
    // $coll_sql = "SELECT * FROM `collection` where memNo = ".$_SESSION['memNo']." and jnNo=:jnNo";
    // $coll = $pdo->prepare($coll_sql); 
    // $coll -> bindValue(":memNo", $_SESSION["memNo"]);
    // $coll -> bindValue(":jnNo", $jnNo);
    // $coll -> execute();
    // $collRow=$coll->rowCount();
    
?>                    
                    <a name="" href="jn.php?jnNo=<?php echo $jnNo;?>">
                        <article class="jo__onecard">
                            <div class="latestJo">
                                <img src="img/jn/<?php echo $jnNo;?>/1.jpg">
                                <div class="jo__allinfo">
                                    <div class="latestInfo">
                                        <p class="jo__publish">發表於<?php echo $jnDate;?><span class="jnNo"><?php echo $jnNo;?></span></p>
                                        <h3><?php echo $jnTitle;?></h3>
                                        <p class="jo__text"><?php echo $jnCont;?>... </p>
                                    </div>
                                    <div class="icon">
                                        <div class="icon heart" >
                                            <i class="material-icons favHeart favJoBtn1" id="favJoBtn1">favorite_border</i>
                                            <span><?php echo $jnCollect;?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </a>  
<?php  }?>

<?php	
while($latestJn2->fetch(PDO::FETCH_ASSOC)){
    $jnCont = mb_substr(strip_tags($jnCont),0,80,"utf-8"); 
    
    //內篩選
    // $coll_sql = "SELECT * FROM `collection` where memNo = :memNo and jnNo=:jnNo";
    // $coll = $pdo->prepare($coll_sql); 
    // $coll -> bindValue(":memNo", $_SESSION["memNo"]);
    // $coll -> bindValue(":jnNo", $jnNo);
    // $coll -> execute();
    // $collRow=$coll->rowCount();
?>
                    <a name="" href="jn.php?jnNo=<?php echo $jnNo;?>">
                        <article class="jo__onecard">
                            <div class="whole">
                            <img src="img/jn/<?php echo $jnNo;?>/1.jpg">
                                <div class="jo__allinfo">
                                    <p class="jo__publish">發表於<?php echo $jnDate;?><span class="jnNo"><?php echo $jnNo;?></span></p>
                                    <h3><?php echo $jnTitle;?></h3>
                                    <p class="jo__text"><?php echo $jnCont;?>...</p>

                                    <div class="icon">
                                        <div class="icon heart">
                                            <i class="material-icons favHeart favJoBtn2" id="favJoBtn2">favorite_border</i>
                                            <span><?php echo $jnCollect;?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </a>
<?php  }?>
                </div>


                <?php	
                $num=0;
while($jns->fetch(PDO::FETCH_ASSOC)){
    $jnCont = mb_substr(strip_tags($jnCont),0,80,"utf-8");   
    $num++;
    
    //內篩選
    // $coll_sql = "SELECT * FROM `collection` where memNo = :memNo and jnNo=:jnNo";
    // $coll = $pdo->prepare($coll_sql); 
    // $coll -> bindValue(":memNo", $_SESSION["memNo"]);
    // $coll -> bindValue(":jnNo", $jnNo);
    // $coll -> execute();
    // $collRow=$coll->rowCount();
?>
                
                <a name="" href="jn.php?jnNo=<?php echo $jnNo;?>">
                        <article class="jo__onecard jnsView">
                            <div class="whole">
                            <img src="img/jn/<?php echo $jnNo;?>/1.jpg">
                                <div class="jo__allinfo">
                                    <p class="jo__publish">發表於<?php echo $jnDate;?><span class="jnNo"><?php echo $jnNo;?></span></p>
                                    <h3><?php echo $jnTitle;?></h3>
                                    <p class="jo__text"><?php echo $jnCont;?>...</p>

                                    <div class="icon">
                                        <div class="icon heart">
                                            <i class="material-icons favHeart favJoBtn3" id="favJoBtn3">favorite_border</i>
                                            <span><?php echo $jnCollect;?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </a>
<?php  }?>
              
            </main>
        </div>
        <script>
        
        
        
        
        
        
        </script>

        <!-- 查看更多日誌的按鈕 -->
        <center>
            <div class="joOverMore">
                <button class="btn-main-l" id="jnsViewBtn">查看更多日誌</button>
            </div>
        </center>
    </div>
</div>
<script>

    //載入更多日誌js
    $(document).ready(function(){
        var num =<?php echo $num ?> ;
        if( <?php echo $num?><=3){
            $('#jnsViewBtn').hide();
        }
        for(var i =3;i< <?php echo $num ; ?> ;i++){
            $(".jnsView").eq(i).hide();
        }
        var click = 3;
        $("#jnsViewBtn").click(() => {
            click+=3;
            console.log(num);
            if (click > 2) {
                for(var i = 0 ;click>i;i++){
                    $(".jnsView").eq(i).show();
                    if(<?php echo $num?>-1== i){
                    $('#jnsViewBtn').text('向上收合');
                    num = <?php echo $num ?> ;
                    }else if(i><?php echo $num?>){
                        for(var j =1;  j<num ;num--){
                            $(".jnsView").eq(num+1).hide();
                            $('#jnsViewBtn').text('查看更多日誌');
                            click = 3;                                                           
                        }
                    }
                }
            }
        })
    });
</script>


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
<!-- <script src="js/robot.js"></script> -->
<script src="js/journalsOverview.js"></script>