<?php
    session_start();
    // include_once('connectDb.php'); //連線
    // include_once('session.php'); //判斷會員是否登入
    try{
    require_once('connectDb.php');
    $techTitleArr = array();
    $techContArr = array();
    $sql= "select * from tech";
    $tech = $pdo->query($sql);
    $tech -> bindColumn("techTitle", $techTitle);
	$tech -> bindColumn("techCont", $techCont);
    $i =0;
    while($tech->fetch(PDO::FETCH_ASSOC)){
        $techTitleArr[$i] = $techTitle;
        $techContArr[$i] = $techCont;
        $i++;
    }

    }catch (PDOException $e) {
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
    <title>山行者 - 登山小技巧</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/tech_0226.css">
    <!-- <link rel="stylesheet" href="css/robot.css"> -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/vue.min.js"></script>
    <!-- <script src="js/enquire.min.js"></script> -->
    <!-- css塞這 自己js塞屁股 -->
    
    
</head>

<body>

<!-- 插入header -->
    <?php
        include_once('header.php');
    ?>

<!-- ===========================各分頁內容開始======================= -->
<div class="wrap-all">
        <div class="tech_banner_wrap ">
            <div class="banner_pic_b">
                <img id="banner_back" class="banner" src="img/banner_back.png">
            </div>
			<div class="banner_pic_f" id="banner_front" >
                <img class="banner" src="img/banner.png">
            </div>
        </div>
        <!-- A區 -->
        <div class="a-wrap">
            <div class="cont" id="cont_a">
				<h2><?php echo $techTitleArr[0]?></h2>
				<p><?php echo $techContArr[0]?></p>
				<h3><?php echo $techTitleArr[1]?></h3>
				<p><?php echo $techContArr[1]?></p>
            </div>
            <div id="pic_g" class="pic-main">
                <img id="bg3-1" src="img/333.png" alt="grass"/>
            </div>  
        </div>
        <!-- B區 -->
        
        <div class="a-wrap">
            <div class="cont" id="cont_b">
                    <h2><?php echo $techTitleArr[2]?></h2>
                        <p><?php echo $techContArr[2]?></p>
                    <h3><?php echo $techTitleArr[3]?></h3>
                        <p><?php echo $techContArr[3]?></p>
            </div>
            <div id="pic_n" class="pic-main">
                <img id="bg3-2" src="img/444.png" alt="nidle"/>
            </div> 
        </div>
        
        <!-- C區 -->
        <div class="a-wrap">
            <div class="cont" id="cont_c">
                    <h2><?php echo $techTitleArr[4]?></h2>
                        <p><?php echo $techContArr[4]?>
                        </p>
                    <h3><?php echo $techTitleArr[5]?></h3>
                        <p><?php echo $techContArr[5]?>
                        </p>
            </div>
            <div id="pic_k" class="pic-main">
                <img id="bg3-3" src="img/555.png" alt="leaf"/>
            </div>
        </div>
        
        <!-- D區 -->
        <div class="a-wrap">
            <div class="cont" id="cont_d">
                <h2><?php echo $techTitleArr[6]?></h2>
                        <p><?php echo $techContArr[6]?>
                        </p>
                        <h3><?php echo $techTitleArr[7]?></h3>
                        <p><?php echo $techContArr[7]?>
                        </p>
            </div>
            <div id="pic_t" class="pic-main">
                <img id="bg3-4" src="img/666.png" alt="tropical"/>
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
<script src="js/tech_scroll.js"></script>
<!-- <script src="js/robot.js"></script> -->