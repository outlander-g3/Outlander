<?php
    session_start();
    include_once('connectDb.php'); //連線
    // include_once('session.php'); //判斷會員是否登入
    try {

        require_once("connectDb.php");
    
        // $sql="select a.jnNo, a.jnTitle, a.jnCont, a.jnDate, a.jnStart, a.jnEnd, b.mt , c.memName ,c.memImg from journal a, productkind b, member c where jnNo=:jnNo AND a.pdkNo=b.pdkNo";
        $sql="select a.jnNo, a.jnTitle, a.jnCont, a.jnDate, a.jnStart, a.jnEnd, b.mt , c.memName ,c.memImg ,c.memNo from journal a, productkind b, member c where jnNo=:jnNo AND a.memNo=c.memNo AND a.pdkNo=b.pdkNo";
        $jns=$pdo->prepare($sql);
        $jnNo =4;
        $jns->bindValue(':jnNo',$jnNo);
        // $jnRow = $jns ->fetch();
        $jns->execute();
      
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
    <title>Outlander - journal</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="css/robot.css"> -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/vue.min.js"></script>
    <script src="js/enquire.min.js"></script>
    <!-- css塞這 自己js塞屁股 -->
    <link rel="stylesheet" href="css/journal.css">
    
    
</head>

<body>

<!-- 插入header -->
    <?php
        include_once('header.php');
    ?>

<!-- ===========================各分頁內容開始======================= -->
<div id="fb-root"></div>
    <script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/zh_TW/sdk.js#xfbml=1&version=v3.2&appId=2118561601789454&autoLogAppEvents=1';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<div class="jpBase">
    <div class="jpWin">
        <div class="jpTitle">檢舉日誌</div>
        <div class="jpCont">
            <p>檢舉原因：</p>
            <form action="jnReport.php" method="get" id="jnReportForm">
                <input type="hidden" value="1" name="jnNo">
                <input type="hidden" value="1" name="memNo">
                <input type="text" name="rptDate">
                <input type="text" name="result">
  
                <div>
                    <input type="radio" id="jnSex" name="reason" value="jnSex">
                    <label for="jnSex">內容包含暴力與色情</label>
                </div>
                <div>
                    <input type="radio" id="jnAd" name="reason" value="jnAd">
                    <label for="jnAd">內容為廣告</label>
                </div>
                <div>
                    <input type="radio" id="jnOther" name="reason" value="jnOther">
                    <label for="jnOther">其他：</label>
                    <textarea name="" id="jnOtherCont" cols="30" rows="7" maxlength="200"></textarea>
                </div>
                <button class="jpBtn btn-sub-s" id="btn__jnSubmit" type="submit" form="jnReportForm">確認送出</button>
            </form>
        </div>
    </div>
</div>
<div class="jnBg">
        <div class="jnMw1200">
            <?php	
                while($jnRow= $jns->fetch(PDO::FETCH_ASSOC)){
            ?>
            <div class="jnBread">
                <span><a href="index.php">首頁</a></span>
                <a href=""></a>
                <i class="material-icons">keyboard_arrow_right</i>
                <span><a href="journalOverview.php">登山日誌</a></span>
                <i class="material-icons">keyboard_arrow_right</i>
                <span><?php echo $jnRow['mt']?></span>

            </div>
            <div class="jnPaper">
                <div class="row jnJCC">
                    <!-- 文章內容開始 -->
                    <section id="jnContent">
                        <div class="jnContent__imgCtrl">
                            <img src="img/jn/<?php echo $jnRow['jnNo']?>/1.jpg" class="inContent__img">
                            <span id="jnIcon__fav">
                                <i class="material-icons">favorite_border</i>
                            </span>
                        </div>
                        <div id="jnContent__plr20"> <!--此容器內物件才padding: 0 20px-->
                            <div id="jnContent__1thP">
                                <!-- 日本飛驒山脈，長野縣松本市、岐阜縣高山市交界，槍岳之下，槍岳山莊的早朝屋南邊朝燒岩稜<br>
                                稜線一路通向穗高群峰，不過穗高現在都被大喰岳擋住了<br>
                                這條稜線也是長野縣松本市、岐阜縣高山市的交界<br>
                                右方遠處有乘鞍岳（3026m）、御嶽（3067m）兩座火山 -->
                            </div>

                            <?php echo $jnRow['jnCont'];?>
 
                            <!-- <img src="img/jn_img2.jpg" class="inContent__img">
                            <p>
                                朝陽照入槍沢大谷中<br>
                                該出發啦，今天可有得走了<br>
                                由槍岳山莊走槍岳的東稜線「東鐮尾根」前往西岳、再轉北經過大天井岳，抵達燕岳山莊<br>
                                這條路線就是以秋紅山色著名的「表銀座」縱走。<br>
                                里程很長，如果反著從燕岳走來槍岳，要花兩天的時間<br>
                                但從槍岳走到燕岳是下坡，所以花九個小時拚一拚，應該可以在今天內完成<br>
                            </p>
                            <img src="img/jn_img3.jpg" class="inContent__img">
                            <p>D3 開始自己走啦！上回的雪西有順取120岳的博可爾基點峰，大南山和弓水山，這次有機會把其他的能走多少是多少。所以第一座為博可爾最高峰，這次和之前走不同路線選，選自基點和最高峰，不同角度拍博可爾草一日竹火，值得。上什最高峰時間多花了些，火石山直接跳過，火石下無水（應上爬100M有），過山澗即背水，因知今天另兩隊共31人會在大南山紮，不想人擠人直接背水走哪紮哪。大南北沒明顯入口和標示，就是好撥箭竹路到最高點找1-2處自拍。登山口勉強可紮一人又有4G，溫暖無風無反潮。</p>
                            <img src="img/jn_img4.jpg" class="inContent__img">
                            <p>D4 一早到大南山營地，冷、風大、又濕，不停留。弓水山不再上，到頭鷹前拍了有人和沒人景色後，忍不住的也立腳架自拍。最後頭鷹山與他隊合照後輕裝往頭鷹北，但無路跡GPX，自己切，本應下300M再上200M返程相反，但才下100M海拔，一眼被樹枝刺傷不適，只好爬上岩石稜線上自拍撤退照，當晚宿奇峻營地大，晚上和友隊協作小喝閒聊（正好先前行程遇過認識），晚間傷的眼不適狂流淚單眼視力減弱，因而評估原計次日要走的釜碗西峰+釜碗山來回約12-14小時，恐不切當，僅走到中間的西峰，避免視力不良摸黑增加危險。</p> -->
                        </div>

                        <button id="btn__jnReport">檢舉日誌</button>
                    </section><!-- 文章內容結束-->


                    <!-- 作者資訊開始 -->
                    <div id="jnContent__info">
                        <div id="jnContent__info--pos">
                          
                            <h2 id="jnContent__title"><?php echo $jnRow['jnTitle']?></h2>
                            <div class="jnContent__infoW">
                                <img src="img/member/<?php echo $jnRow['memImg']?>" id="jnContent__myphoto" alt="作者頭像">
                                <br>
                                <span id="jnContent__writer">作者：<?php echo $jnRow['memName']?></span>
                                <br>
                                <span id="jnContent__publishTime">發表於<?php echo $jnRow['jnDate']?></span>
                            </div>
                            <div class="jnContent__infoJ">
                                <h3>行程日期：</h3>
                                <span id="jnContent__date"><?php echo $jnRow['jnStart']?> - <?php echo $jnRow['jnEnd']?></span>
                                <h3>地點：</h3>
                                <span id="jnContent__locate"><?php echo $jnRow['mt']?></span>
                                <!-- <button id="btn__jnReport">檢舉日誌</button> -->
                                <input type="submit" id="btn__jnSeeProd" value="查看相關行程">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div> <!-- 作者資訊結束 -->
                </div> <!-- display:flex -->
            </div>  <!-- jnPaper底紙 -->
        </div> <!-- max-width:1200px -->
        <?php
            }
        ?>
        <div class="jnMw1200">
            <div class="jnFB">
                <div class="jnFB__plr40">
                dd
                    <div class="fb-comments" data-href="http://localhost:3002/" data-numposts="5" data-width="100%"></div>
                </div>
                
            </div>         
        </div>


    </div>
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

<script src="js/journal.js"></script>