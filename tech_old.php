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
    <link rel="stylesheet" href="css/tech.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- css塞這 自己js塞屁股 -->
    
    
</head>

<body>

<!-- 插入header -->
    <?php
        include_once('header.php');
    ?>

<!-- ===========================各分頁內容開始======================= -->
		<div id="scene_back" class="scene">
			<img id="banner_back" class="banner" src="img/banner_back.png">
			<img id="banner_front" class="banner" src="img/banner.png">
		</div>
		
        <div id="wrapper">	
           
			<!-- <nav id="primary">
				<ul>
					<li>
						<h1>高山草原</h1>
						<a class="manned-flight" href="#manned-flight">View</a>
					</li>
					<li>
						<h1>溫帶針葉林</h1>
						<a class="frameless-parachute" href="#frameless-parachute">View</a>
					</li>
					<li>
						<h1>亞熱帶闊葉林</h1>
						<a class="english-channel" href="#english-channel">View</a>
					</li>
					<li>
						<h1>出發爬山吧!</h1>
						<a class="about" href="#about">View</a>
					</li>
				</ul>
			</nav> -->
			
			<div id="content">
				<article id="manned-flight">
					<header>
						<h1>高山草原</h1>
					</header>
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
				</article>
				
				<article id="frameless-parachute">
					<header>
						<h1>溫帶針葉林</h1>
					</header>
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
					<!-- <nav class="next-prev"> -->
						<!-- <a class="prev manned-flight" href="#manned-flight">Prev</a>
						<hr />
						<a class="next english-channel" href="#english-channel">Next</a> -->
					<!-- </nav> -->
				</article>

				<article id="frameless-parachute-2">
					<header>
						<h1>涼溫帶針闊葉混合林</h1>
					</header>
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
					<!-- <nav class="next-prev"> -->
						<!-- <a class="prev manned-flight" href="#manned-flight">Prev</a>
						<hr />
						<a class="n	ext english-channel" href="#english-channel">Next</a> -->
					<!-- </nav> -->
				</article>

				
				<article id="english-channel">
					<header>
						<h1>暖溫帶闊葉林</h1>
					</header>
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
					<!-- <nav class="next-prev">
						<a class="prev frameless-parachute" href="#frameless-parachute">Prev</a>
						<hr />
						<a class="next about" href="#about">Next</a>
					</nav> -->
				</article>
			</div>
				
			 <!-- Parallax foreground  -->
			<div id="parallax-bg3">
				<div id="bg3-1">
					<img class="bg3-1" src="img/333.png" alt="grass"/>
				</div>
				<div id="bg3-2">
					<img class="bg3-1" src="img/444.png" alt="niddle"/>
				</div>
				<div id="bg3-3">
					<img  class="bg3-1" src="img/555.png" alt="tropical"/>
				</div>
				<div id="bg3-4">
					<img  class="bg3-1" src="img/666.png"/>
				</div>
				<!-- <img id="bg3-4" src="img/05-2.png" alt="song"/> -->
			</div>
			
			<!-- Parallax  midground clouds -->
			<div id="parallax-bg2">
				<img id="bg2-1" src="img/cloud-1.png" alt="cloud"/>
				<img id="bg2-3" src="img/cloud-2.png" alt="cloud"/>
				<img id="bg2-4" src="img/cloud-4.png" alt="cloud"/>
				<img id="bg2-5" src="img/cloud-3.png"" alt="cloud"/>
			</div>
			
			<!-- Parallax  background clouds -->
			<div id="parallax-bg1">
				<!-- <img id="bg1-1" src="img/01-cloud.png"alt="cloud"/> -->
				<!-- <img id="bg1-2" src="img/cloud-3.png" alt="cloud"/> -->
				<!-- <img id="bg1-3" src="img/c-4-w.png" alt="cloud" width="1200px" /> -->
				<!-- <img id="bg1-4" src="img/c-5-w.png" alt="cloud"/> -->
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
    include_once('memLogin.php');
?>
</body>
<script>
var sceneFront = document.getElementsByClassName('banner');
var bg31 = document.getElementById('bg3-1');
var bg32 = document.getElementById('bg3-2');
var bg33 = document.getElementById('bg3-3');
var bg34 = document.getElementById('bg3-4');
var bg21 = document.getElementById('bg2-1');//雲一
window.addEventListener('scroll',()=>{
	var originTop_G=700;
	var originTop_N=1000;
	var originTop_T=1900;
	var originTop_W=2500;
	var originTop_C=1500;
	var scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
	sceneFront[0].style.top = 0-(scrollTop*0.2) + "px";//banner 背面
	sceneFront[1].style.top = 0-(scrollTop*0.5) + "px";//banner 正面
	// bg3[0].style.top = originTop_G+( 0-(scrollTop*0.8)) + "px";//羊
	// bg3[1].style.top = originTop_N+(0-(scrollTop*0.5)) + "px";//針葉林
	// bg3[2].style.top = originTop_T+(0-(scrollTop*0.7)) + "px";//熱帶林
	// bg3[2].style.top =originTop_T+(0-(scrollTop*0.1))+ "px";//熱帶林
	bg31.style.top = originTop_G+( 0-(scrollTop*0.8)) + "px";//羊
	bg32.style.top = originTop_N+(0-(scrollTop*0.5)) + "px";//針葉林
	bg33.style.top = originTop_T+(0-(scrollTop*0.7)) + "px";//檜木林
	bg34.style.top = originTop_W+(0-(scrollTop*0.7)) + "px";//熱帶林

	// bg21.style.top = originTop_C+(0-(scrollTop*0.9) + "px";//雲一

	

});
window.addEventListener('load',()=>{
	var originTop_G=700;
	var originTop_N=1000;
	var originTop_T=1900;
	var originTop_W=2500;
	var scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
	// sceneFront[0].style.top = 0-(scrollTop*0.2) + "px";//banner 背面
	// sceneFront[1].style.top = 0-(scrollTop*0.5) + "px";//banner 正面
	// // bg3[0].style.top = originTop_G+( 0-(scrollTop*0.8)) + "px";//羊
	// // bg3[1].style.top = originTop_N+(0-(scrollTop*0.5)) + "px";//針葉林
	// // bg3[2].style.top = originTop_T+(0-(scrollTop*0.7)) + "px";//熱帶林
	// // bg3[2].style.top =originTop_T+(0-(scrollTop*0.1))+ "px";//熱帶林
	bg31.style.top = originTop_G+( 0-(scrollTop*0.8)) + "px";//羊
	bg32.style.top = originTop_N+(0-(scrollTop*0.5)) + "px";//針葉林
	bg33.style.top = originTop_T+(0-(scrollTop*0.7)) + "px";//檜木林
	bg34.style.top = originTop_W+(0-(scrollTop*0.7)) + "px";//熱帶林
	
	

});
</script>
</html>


<script src="js/common.js"></script>
<script src="js/header.js"></script>
<!-- <script src="js/robot.js"></script> -->