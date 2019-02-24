<?php
    // include_once('connectDb.php'); //連線
    // include_once('login.php'); //會員登入

    //要去抓選擇的開團資訊（圖,名稱,日期

    //抓
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>山行者 - 登山小技巧</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/cart.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/vue.min.js"></script>
    <script src="js/enquire.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script> 
    <link rel="stylesheet" href="css/tech_test.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- css塞這 自己js塞屁股 -->
    
    
</head>

<body>

<!-- 插入header -->
    <?php
        include_once('header.php');
    ?>

<!-- ===========================各分頁內容開始======================= -->
    <div class="wrap-all">
        <div id="tech_banner_wrap">
            <div class="banner_pic_b">
                <img id="banner_back" class="banner" src="img/banner_back.png">
            </div>
			<div class="banner_pic_f">
                <img id="banner_front" class="banner" src="img/banner.png">
            </div>
        </div>
        <!-- A區 -->
            <div class="cont" id="cont_a">
				<h1>高山草原</h1>
				<p>臺灣高山草原是指海拔3,000公尺以上的高山地帶，由於表土層薄，
					水分保持不易，年均溫10度以下，樹木不易生長，因此遍布耐旱、
					耐寒的矮小植物。
				</p>
				<h2>高山症預防</h2>
				<p>高度上升原則： 預防勝於治療，緩慢上升，讓身體有足夠的時間去適應高度的變化，
				是預防高山症最重要的準則。 <br/>
				一般預防原則： <br/>
				攜帶氧氣筒（瓶）或攜帶式加壓袋、避免劇烈的活動、保溫、不要吸菸、
				不要喝酒及服用鎮靜劑、吃高碳水化合物、避免吃產氣食物(如豆類或碳酸飲料)，
				都可減輕或避免高山症的發生。</p>
            </div>
            <div id="pic_g" class="pic-main">
                <img id="bg3-1" src="img/333.png" alt="grass"/>
            </div>
        <!-- B區 -->
        <div class="cont" id="cont_b">
                <h1>溫帶針葉林</h1>
					<p>台灣海拔3,000～3,500公尺的植物生態－針葉林帶，
						越過寒原往下走，台灣有三種不同型態的針葉林帶：
						冷杉林帶、鐵杉林帶、及檜木林帶。
						其中，冷杉林是台灣海拔最高的一種森林，
						同時也稱為北方針葉林，全世界只見於北半球極地附近，
						是最接近北極圈的一種寒帶針葉林，台灣是其分布的南限。
					</p>
				<h2>高山保暖建議</h2>
					<p>野外保暖的三個基本要件: a.隔溫層 b.乾燥 c.防風。<br/>
						只要達成這三個原則，基本上保暖不是問題，反而要注意是否太過保暖造成流汗的情況。<br/>
						A.隔溫層:氣溫越低需要越厚的隔溫層，或以洋蔥式穿法增加隔溫層的厚度。<br/>
						B.乾燥:主要是防止身體潮濕時的"水寒效應"，最好穿著排汗衣來保持身體乾燥。<br/>
						C.防風:穿得再保暖，如果沒有注意防風，保暖效果也會打折扣，
						這是由於風力帶走體溫所造成的"風寒效應"。</p>
        </div>
        <div id="pic_n" class="pic-main">
            <img id="bg3-2" src="img/444.png" alt="nidle"/>
        </div>
        
        <!-- C區 -->
        <div class="cont" id="cont_c">
                <h1>涼溫帶針闊葉混合林</h1>
					<p>海拔1,800～2,500公尺的涼溫帶針闊葉混合林中因為雲霧終年繚繞，
						又稱為「盛行雲霧帶」或「霧林帶」。本區年均溫10～20oC之間，
						年雨量約為3,000～4,200公釐，是台灣山區雨量最豐富、最潮濕的地區，
						全世界品質最好，材積最大的檜木林就生長在此一林帶。
					</p>
				<h2>爬坡省力訣竅</h2>
					<p>A.走上坡路時儘量讓腳後跟吃力，腳後跟自然就在人的重心上，
						於是身體的重量就能分配在大小腿乃至腰上，
						這比用前腳掌爬山要省1/3左右的勁。<br/>
						B.爬坡時可以有點外八字。
						外八字式邁步便於讓腳跟吃重,也減少腳面與小腿的角度而肌腱舒服。<br/>
						C.使用登山杖。</p>
        </div>
        <div id="pic_k" class="pic-main">
            <img id="bg3-3" src="img/555.png" alt="leaf"/>
        </div>
        
        <!-- D區 -->
        <div class="cont" id="cont_d">
            <h1>暖溫帶闊葉林</h1>
					<p>在海拔1800公尺以下的闊葉林是屬於暖溫帶闊葉林。
						本林帶的主要植物為樟科和殼斗科的植物，故又稱之為樟殼林帶。
						臺灣大約有43％的生物種類生活在此一林帶。
						此區氣候溫和，溼潤，是常綠闊葉林生長的地帶，
						常見的有楓科植物、赤楊、山櫻花、台灣胡桃與櫟屬植物。
					</p>
					<h2>登山蚊蟲蛇叮咬預防</h2>
					<p>
					A.林內行走時，避穿花色或鮮豔衣物，宜著白色、綠色衣帽，
						並注意樹上、草叢、土堆。<br/>
					B.避免使用香水、髮膠等含香料物品。<br/>
					C.儘量穿著長袖、長褲並戴手套。<br/>
					D.遇到蜂群，應保持冷靜，慢慢移動，避免拍打或快速移動，
					如無法逃離，可就地趴下並用手抱住頭部。<br/>
					</p>
        </div>
        <div id="pic_t" class="pic-main">
            <img id="bg3-4" src="img/666.png" alt="tropical"/>
        </div>
        
    </div>

    <!-- 雲 -->
    <div class="wrap-cloud">
        <div class="cl-1" id="c_1">
            <img src="img/cloud-1" alt="cloud">
        </div>
        <div class="cl-1" id="c_2">
            <img src="img/cloud-2.png" alt="cloud">
        </div>
        <div class="cl-1" id="c_3" >
            <img src="img/cloud-3.png" alt="cloud">
        </div>
        <div class="cl-1" id="c_4">
            <img src="img/cloud-4.png" alt="cloud">
        </div>

    </div>
   



    <?
        echo $_SESSION['memName'];
    ?>

<!-- ===========================各分頁內容結束======================= -->
<!-- 插入 footer 會員登入跟機器人 -->
<?php
    // include_once('footer.php');
    // include_once('robot.php');
    // include_once('memLogin.php');
?>
</body>


</html>


<!-- <script src="js/common.js"></script> -->
<!-- <script src="js/header.js"></script> -->
<!-- <script src="js/robot.js"></script>  -->
<script src="js/scroll_test.js"></script>
