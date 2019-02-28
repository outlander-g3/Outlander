<?php
    ob_start();
    session_start();
    // include_once('connectDb.php'); //連線
    // include_once('session.php'); //判斷會員是否登入
    if(!isset($_SESSION['memMail'])){
        header('location:outlander.php');
    }
    
?>

<?php
try {
    require_once("connectDb.php");

//--------------日誌存取-----------------------------------
    
// echo "===============", $_FILES["textImg"]["name"];
if(isset($_REQUEST["set"])==true  &&$_SESSION["addlog"]==1){
    $jnNo = $_REQUEST["jnNo"];
    $jnStatus = $_REQUEST["set"];
    $jnTitle=$_REQUEST["textheader"];
    $pdkNo=$_REQUEST["mountType"];
    $jnStart=$_REQUEST["date"];
    $jnEnd=$_REQUEST["date-1"];
    $jnCont=$_REQUEST["text"];
    // echo $jnCont;
    if($jnNo>-1){
        $set = "update journal set jnStatus =:jnStatus , `jnTitle`=:jnTitle , `pdkNo`=:pdkNo , `jnStart`=:jnStart , `jnEnd`=:jnEnd , jnCont = :jnCont , jnDate = NOW() where jnNo =:jnNo ";
        $te = $pdo -> prepare($set);
        $te -> bindValue(":jnStatus",$jnStatus);
        $te -> bindValue(":jnNo",$jnNo);
        $te -> bindValue(":jnTitle",$jnTitle);
        $te -> bindValue(":pdkNo",$pdkNo);
        $te -> bindValue(":jnStart",$jnStart);
        $te -> bindValue(":jnEnd",$jnEnd);
        $te -> bindValue(":jnCont",$jnCont);
        $te -> execute();
            switch( $_FILES["header"]["error"] ){
            case UPLOAD_ERR_OK:
                //檢查是否有images資料夾
                if( file_exists("img/jn/$jnNo") === false){
                    //建立資料夾 make directory
                    mkdir("img/jn/$jnNo");
                }
                // echo $jnNo;
                $name = $_FILES["header"]["name"] ="1.jpg";
                $from = $_FILES['header']['tmp_name'];
                $to = "img/jn/$jnNo/{$_FILES['header']['name']}";
                copy($from, $to);
                rename($from,$name);
                // echo "OK";
                break;
            case UPLOAD_ERR_INI_SIZE:
                // echo "上傳檔案太大,不得超過: ", ini_get("upload_max_filesize"), "<br>";
                break;
            case UPLOAD_ERR_FORM_SIZE:
                // echo "上傳檔案太大 <br>";
                break;
            case UPLOAD_ERR_PARTIAL:
                // echo "上傳資料有問題，請重送<br>";
                break;
            case UPLOAD_ERR_NO_FILE:
            // echo "未選檔案<br>";
                break;
            default : 
                echo "['error']: " , $_FILES['header']['error'] , "<br>";
                
            }
			$_SESSION["addlog"]=0;
    }else{
        // echo "新增的路";
        $set = " INSERT INTO journal (`jnStatus`,`jnTitle`,`pdkNo`,`jnStart`,`jnEnd`,`jnCont`,`jnDate`,`memNo`) VALUES(:jnStatus,:jnTitle,:pdkNo,:jnStart,:jnEnd,:jnCont,NOW(),:memNo) ";
        $te = $pdo -> prepare($set);
        $memNolog=$_SESSION['memNo'];
        $te -> bindValue(":memNo",$memNolog);
        $te -> bindValue(":jnStatus",$jnStatus);
        $te -> bindValue(":jnTitle",$jnTitle);
        $te -> bindValue(":pdkNo",$pdkNo);
        $te -> bindValue(":jnStart",$jnStart);
        $te -> bindValue(":jnEnd",$jnEnd);
        $te -> bindValue(":jnCont",$jnCont);
        $te -> execute();
        // echo "last Insert Id: ".$pdo->lastInsertId()."<br />";
        $jnNo = $pdo->lastInsertId();
        // echo $jnNo;
        switch( $_FILES["header"]["error"] ){
        case UPLOAD_ERR_OK:
            //檢查是否有images資料夾
            if( file_exists("img/jn/$jnNo") === false){
                //建立資料夾 make directory
                mkdir("img/jn/$jnNo");
            }
    
            $name = $_FILES["header"]["name"] ="1.jpg";
            $from = $_FILES['header']['tmp_name'];
            $to = "img/jn/$jnNo/{$_FILES['header']['name']}";
            copy($from, $to);
            rename($from,$name);
            // echo "OK";
            break;
        case UPLOAD_ERR_INI_SIZE:
            // echo "上傳檔案太大,不得超過: ", ini_get("upload_max_filesize"), "<br>";
            break;
        case UPLOAD_ERR_FORM_SIZE:
            // echo "上傳檔案太大 <br>";
            break;
        case UPLOAD_ERR_PARTIAL:
            // echo "上傳資料有問題，請重送<br>";
            break;
        case UPLOAD_ERR_NO_FILE:
        // echo "未選檔案<br>";
            break;
        default : 
            echo "['error']: " , $_FILES['header']['error'] , "<br>";
        }
    
    }
	$_SESSION["addlog"]=0;
}
    if(isset($_REQUEST["new"])==true &&$_SESSION["addlog"]=1){
        $jnNo = $_REQUEST["jnNo"];
        $jnStatus = $_REQUEST["new"];
        $jnTitle=$_REQUEST["textheader"];
        $pdkNo=$_REQUEST["mountType"];
        $jnStart=$_REQUEST["date"];
        $jnEnd=$_REQUEST["date-1"];
        $jnCont=$_REQUEST["text"];
        if($jnNo>-1){
            $set = "update journal set jnStatus =:jnStatus , `jnTitle`=:jnTitle , `pdkNo`=:pdkNo , `jnStart`=:jnStart , `jnEnd`=:jnEnd , jnCont = :jnCont , jnDate = NOW() where jnNo =:jnNo ";
        $te = $pdo -> prepare($set);
        $te -> bindValue(":jnStatus",$jnStatus);
        $te -> bindValue(":jnNo",$jnNo);
        $te -> bindValue(":jnTitle",$jnTitle);
        $te -> bindValue(":pdkNo",$pdkNo);
        $te -> bindValue(":jnStart",$jnStart);
        $te -> bindValue(":jnEnd",$jnEnd);
        $te -> bindValue(":jnCont",$jnCont);
        $te -> execute();
            switch( $_FILES["header"]["error"] ){
            case UPLOAD_ERR_OK:
                //檢查是否有images資料夾
                if( file_exists("img/jn/$jnNo") === false){
                    //建立資料夾 make directory
                    mkdir("img/jn/$jnNo");
                }
                // echo $jnNo;
                $name = $_FILES["header"]["name"] ="1.jpg";
                $from = $_FILES['header']['tmp_name'];
                $to = "img/jn/$jnNo/{$_FILES['header']['name']}";
                copy($from, $to);
                rename($from,$name);
                // echo "OK";
                break;
            case UPLOAD_ERR_INI_SIZE:
                // echo "上傳檔案太大,不得超過: ", ini_get("upload_max_filesize"), "<br>";
                break;
            case UPLOAD_ERR_FORM_SIZE:
                // echo "上傳檔案太大 <br>";
                break;
            case UPLOAD_ERR_PARTIAL:
                // echo "上傳資料有問題，請重送<br>";
                break;
            case UPLOAD_ERR_NO_FILE:
            // echo "未選檔案<br>";
                break;
            default : 
                echo "['error']: " , $_FILES['header']['error'] , "<br>";
                
            }
			$_SESSION["addlog"]=0;
        }else{
            $set = " INSERT INTO journal (`jnStatus`,`jnTitle`,`pdkNo`,`jnStart`,`jnEnd`,`jnCont`,`jnDate`,`memNo`)  VALUES(:jnStatus,:jnTitle,:pdkNo,:jnStart,:jnEnd,:jnCont,NOW(),:memNo)";
            $te = $pdo -> prepare($set);
            $memNolog=$_SESSION['memNo'];
            $te -> bindValue(":memNo",$memNolog);
            $te -> bindValue(":jnStatus",$jnStatus);
            $te -> bindValue(":jnTitle",$jnTitle);
            $te -> bindValue(":pdkNo",$pdkNo);
            $te -> bindValue(":jnStart",$jnStart);
            $te -> bindValue(":jnEnd",$jnEnd);
            $te -> bindValue(":jnCont",$jnCont);
            $te -> execute();
            $jnNo = $pdo->lastInsertId();
            switch( $_FILES["header"]["error"] ){
            case UPLOAD_ERR_OK:
                //檢查是否有images資料夾
                if( file_exists("img/jn/$jnNo") === false){
                    //建立資料夾 make directory
                    mkdir("img/jn/$jnNo");
                }
    
                $name = $_FILES["header"]["name"] ="1.jpg";
                $from = $_FILES['header']['tmp_name'];
                $to = "img/jn/$jnNo/{$_FILES['header']['name']}";
                copy($from, $to);
                rename($from,$name);
                // echo "OK";
                break;
            case UPLOAD_ERR_INI_SIZE:
                // echo "上傳檔案太大,不得超過: ", ini_get("upload_max_filesize"), "<br>";
                break;
            case UPLOAD_ERR_FORM_SIZE:
                // echo "上傳檔案太大 <br>";
                break;
            case UPLOAD_ERR_PARTIAL:
                // echo "上傳資料有問題，請重送<br>";
                break;
            case UPLOAD_ERR_NO_FILE:
            // echo "未選檔案<br>";
                break;
            default : 
                echo "['error']: " , $_FILES['header']['error'] , "<br>";
                
            }
        }
			$_SESSION["addlog"]=0;
    }

//-------------------------------------------------------------
    
	$sql = "select * from `member` where memNo = ".$_SESSION['memNo'];
	$member = $pdo->query($sql); 
	$member -> bindColumn("memId", $memId);
	$member -> bindColumn("memMail", $memMail);
	$member -> bindColumn("memPoint", $memPoint);
    $member -> bindColumn("memImg", $memImg);
    

    $sqlEditMember = "select * from `member` where memNo = ".$_SESSION['memNo'];
    $editMember = $pdo->query($sqlEditMember); 
    $editMember -> bindColumn("memName", $memName);
	$editMember -> bindColumn("memId", $memId);
	$editMember -> bindColumn("memMail", $memMail);
    
    $sqlOrd = "SELECT * FROM `order` a LEFT JOIN `member` b ON a.memNo = b.memNo LEFT JOIN `product` c ON a.pdNo = c.pdNo LEFT JOIN `productkind` d ON c.pdkNo =d.pdkNo where a.memNo =".$_SESSION['memNo']." order by a.ordNo desc";
    $orders = $pdo->prepare($sqlOrd);
    $orders -> execute(); 

    $sqlHisOrd = "SELECT * FROM `order` a LEFT JOIN `member` b ON a.memNo = b.memNo LEFT JOIN `product` c ON a.pdNo = c.pdNo LEFT JOIN `productkind` d ON c.pdkNo =d.pdkNo where a.memNo =".$_SESSION['memNo']." order by a.ordNo desc";
    $hisOrders = $pdo->prepare($sqlHisOrd);
    $hisOrders -> execute(); 

    $sqlPpl = "SELECT * FROM `passenger` a LEFT JOIN `order` b ON a.ordNo = b.ordNO LEFT JOIN `member` c ON b.memNo = c.memNo where c.memNo =".$_SESSION['memNo']." order by a.ordNo desc";
    $ppl = $pdo->prepare($sqlPpl);
    $ppl -> execute(); 

    $sqlJn = "SELECT * FROM `journal` a LEFT JOIN `member` b ON a.memNo = b.memNo LEFT JOIN `productkind` c ON a.pdkNo =c.pdkNo where a.memNo =".$_SESSION['memNo']." order by a.jnDate desc";
    $jns = $pdo->prepare($sqlJn);
    $jns -> execute(); 


    $sqlFavJn = "SELECT * FROM `collection` a LEFT JOIN `member` b ON a.memNo = b.memNo LEFT JOIN `journal` c ON a.jnNo =c.jnNo where a.memNo =".$_SESSION['memNo']." order by a.collectNo desc";
    $favJns = $pdo->prepare($sqlFavJn);
    $jnNo=1;
    $favJns -> bindParam(":jnNo", $jnNo);
    $favJns -> execute(); 


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
    <title>山行者 - 會員中心</title>
    <link rel="Shortcut Icon" type="image/x-icon" href="img/logo.png">
    <script type="text/javascript" src="~/Scripts/TimeControl/timeControl.js?v=1.2.0"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="css/robot.css"> -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/vue.min.js"></script>
    <!-- <script src="js/enquire.min.js"></script> -->
    <!-- css塞這 自己js塞屁股 -->
    <link rel="stylesheet" href="css/member.css">
    <style> 
        .gray{
            background-color:gray;
        }
    </style>
</head>

<body>

<!-- 插入header -->
    <?php
        include_once('header.php');
    ?>

<!-- ===========================各分頁內容開始======================= -->
 <!-- 會員中心共同banner -->
 <div class="memberBanner">
        <h2>會員中心</h2>
        <img src="img/memberBanner.jpg" alt="會員中心banner1">
        <img src="img/memberBannerForDesktop.png" alt="會員中心banner2" id="showOnlyDesktop">
    </div>
    <div class="memberWrap">
        <div class="rowWithTab">
            <div class="col-3">
                <!-- 會員左側個人資訊卡片 -->
                <div class="maximunInfoAndContent">
                    <div class="memberInfo">
                        <div class="row">
                                <?php	
	while($member->fetch(PDO::FETCH_ASSOC)){
        if($memImg==null){
            $memImg = "default.jpg";
        }
?>	
                            <div>
                                <div class="memberPic">
                                    <figure class="snip1205">
                                        <?php echo "<img src='img/member/$memImg' alt='會員頭像'>";?>
                                        <i class="fas fa-pen"></i>
                                        <a href="javascript:;" class="btn-memberEdit"></a>
                                    </figure>
                                </div>
                                <div id="name"><?php echo $memId;?></div>
                                <div id="email"><?php echo $memMail;?></div>
                            </div>
                         
                        </div>
                        <div class="row rowPoint">   
                            <div id="pointNum">
                                <span id="point"><?php echo $memPoint;?>點</span><span id="vanishPoint">紅利點數</span>
                            </div>
    <?php }                            ?>
                            <div id="pointIntro">
                                <h4>紅利折抵辦法</h4>
                                <span>每10點可於消費時折抵1元。</span>
                                <h4>如何獲取紅利點數</h4>
                                <div class="pointIntroRow">
                                    <div class="pointIcon">
                                        <img src='img/iconfinder_46_171420.png' alt='樹'>
                                        <p>評價行程</p>

                                    </div>
                                    <div class="pointIcon">
                                        <img src='img/iconfinder_081_Pen_183209.png' alt='筆'>
                                        <p>撰寫日誌</p>

                                    </div>
                                    <div class="pointIcon">
                                        <img src='img/iconfinder_icon-game-controller-b_211668.png' alt='遊戲'>
                                        <p>玩小遊戲</p>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-9">
                <div class="tab-component">
                    <ul class="tab theme-a position-top text-layout" data-show-slides="1">
                        <li class="active">
                            <a href="#tab-a" class="active">訂單管理</a>
                        </li>
                        <li>
                            <a href="#tab-b">日誌管理</a>
                        </li>
                        <li>
                            <a href="#tab-c">行前裝備</a>
                        </li>
                        <div class="tab-underline">
                            <span class="line"></span>
                        </div>
                    </ul>
                    <section id="tab-a">

                        <div class="currentOrders">
                            <h3>我的訂單</h3>

                            <div class="allOrdersCard">
<?php	
$num=0;
	while($prodRow=$orders->fetch(PDO::FETCH_ASSOC)){
        $setDeal='';
        if($prodRow["ordStatus"]==0){ 
          $setDeal='已成立';
        }
        // $ordStart= explode("-",$prodRow["ordStart"]);
        // foreach ($ordStart as $value){
        //     echo $value;
        // }
        //去找有沒有嚮導2
        $sql="select * from product p,`order` o where gdNo2 is null and p.pdNo={$prodRow["pdNo"]}";
        $ifCust=$pdo->query($sql);
        //沒有嚮導2就是客製
        if($ifCust->rowCount()!=0){
            //pdNo去找pdkNo去找mt
            $sql="select mt from productKind pdk left join product pd on pdk.pdkNo=pd.pdkNo where  pd.pdkNo={$prodRow["pdkNo"]} limit 1";
            $mt=$pdo->query($sql);
            $row=$mt->fetchObject();
            $pdkName=$row->mt."-客製";
        }
        else{
            $pdkName=$prodRow["pdkName"];
        }
        $ordPrice =number_format($prodRow["ordPrice"]);
        $ordStartYM=substr($prodRow["ordStart"],0,7);
        $ordStartD=substr($prodRow["ordStart"],8,2);
        $ordEndYM=substr($prodRow["ordEnd"],0,7);
        $ordEndD=substr($prodRow["ordEnd"],8,2);
		
		$startdate=strtotime($prodRow["ordStart"]);
		$enddate=strtotime($prodRow["ordEnd"]); 
		$days=round(($enddate-$startdate)/3600/24)+1 ;
		
        $ordNo =$prodRow["ordNo"];
        if($prodRow["ordStatus"]==0){
        $num++;
?>	
                                <div class="oneOrderCard currentOrder">
                                    <div class="rowWithOrder">
                                        <div class="orderImg">
                                        <img src="img/mt/<?php echo $prodRow["pdkNo"];?>/1.jpg" alt="訂單圖片">
                                        </div>
                                        <div class="orderInfo">
                                            <div class="orderText">
                                                <p>訂單編號:<span class="ordNo"><?php echo $prodRow["ordNo"];?></span></p>
                                                <p>訂單狀態:<span><?php echo $setDeal;?></span></p>
                                            </div>

                                            <h4><?php echo $pdkName;?></h4>
                                            <div class="orderText mobileOrdText">
                                                <p>人數:<span><?php echo $prodRow["people"];?></span>人</p>
                                                <p>天數:<span><?php echo $days;?></span>天</p>
                                            </div>
                                            <p class="price">NTD <?php echo $ordPrice;?></p>
                                        </div>
                                        <div class="dateAndButtons">
                                            <div class="duration">
                                                <div class="dateImg">
                                                    <p id="startYearMonth"><?php echo $ordStartYM;?></p>
                                                    <p id="startDay"><?php echo $ordStartD;?></p>
                                                    <img src="img/calender.png" alt="訂單日期底圖">
                                                </div>
                                                <div>
                                                    <i class="material-icons">keyboard_arrow_right</i>
                                                </div>
                                                <div class="dateImg">
                                                    <p id="endYearMonth"><?php echo $ordEndYM;?></p>
                                                    <p id="endDay"><?php echo $ordEndD;?></p>
                                                    <img  src="img/calender.png" alt="訂單日期底圖">
                                                </div>
                                            </div>
                                            <div class="fourButtons">
                                                <div class="img-buttons"></div>
                                                <button class="btnEquip"></button>    
                                                <a href="" class="
                                                btn-orderDelete">
                                                    <div class="img-buttons">
                                                        <img class="del" src="img/baseline-delete-24px.svg">
                                                    </div>
                                                </a>
                                                <button class="btn-pplDetail">訂單明細</button>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
<?php } }  ?>
                                
                                 <center>
                                    <div class="downArrow">
                                        <i class="material-icons" id="currentOrdersArrow">keyboard_arrow_down</i>
                                    </div>
                                </center>                               
                            </div>
                        </div>

                        <script>
                            //載入更多我的訂單js--向下箭頭到底之後會往上
                            $(document).ready(function(){
                                var num =<?php echo $num  ?> ;
                                var flag = false;
                                if( <?php echo $num?><=2){
                                    $('#currentOrdersArrow').hide();
                                }
                                for(var i =2;i< <?php echo $num ; ?> ;i++){
                                    $(".currentOrder").eq(i).hide();
                                }
                                var click = 2;
                                    $("#currentOrdersArrow").click(() => {
                                        click+=2;
                                        // if (click > 1) {
                                            for(var i = 0 ;click>i;i++){
                                            console.log(i,<?php echo $num?>);
                                            $(".currentOrder").eq(i).show();
                                            if(num%2!=0){
                                                console.log("基數");
                                                if(<?php echo $num?> == i){
                                                    $('#currentOrdersArrow').css({"transition":".5s","transform":"rotate(180deg)"});
                                                flag = true;
                                                // break;
                                            }else if(flag){
                                                flag = false;
                                                for(var j =1;  j<num ;num--){
                                                    $(".currentOrder").eq(num).hide();     
                                                }
                                                $('#currentOrdersArrow').css({"transition":".5s","transform":"rotate(0deg)"});
                                                    click = 2;        
                                                    num =<?php echo $num  ?> ;   
                                                }
                                            }else{
                                                // console.log("雙數",i);
                                                if(<?php echo $num?> == i+1){
                                                    console.log("動畫開始");
                                                    $('#currentOrdersArrow').css({"transition":".5s","transform":"rotate(180deg)"});
                                                flag = true;
                                                // break;
                                            }else if(flag){
                                                flag = false;
                                                for(var j =1;  j<num ;num--){
                                                    $(".currentOrder").eq(num).hide();     
                                                }
                                                $('#currentOrdersArrow').css({"transition":".5s","transform":"rotate(0deg)"});
                                                    click = 2;        
                                                    num =<?php echo $num  ?> ;   
                                                }

                                            }
                                        // }
                                    }
                                })
                            });
                        </script>

                        <div class="historyOrders">
                            <h3>歷史訂單</h3>
                            <div class="allOrdersCard">

  <?php	
  $num = 0;
	while($prodRow=$hisOrders->fetch(PDO::FETCH_ASSOC)){
        $oldDeal='';
        if($prodRow["ordStatus"]==1){ 
          $oldDeal='已完成';
        }if($prodRow["ordStatus"]==2){ 
            $oldDeal='待退款';
          }if($prodRow["ordStatus"]==3){
            $oldDeal='已取消';
          };
          
        //去找有沒有嚮導2
        $sql="select * from product p,`order` o where gdNo2 is null and p.pdNo={$prodRow["pdNo"]}";
        $ifCust=$pdo->query($sql);
        //沒有嚮導2就是客製
        if($ifCust->rowCount()!=0){
            //pdNo去找pdkNo去找mt
            $sql="select mt from productKind pdk left join product pd on pdk.pdkNo=pd.pdkNo where  pd.pdkNo={$prodRow["pdkNo"]} limit 1";
            $mt=$pdo->query($sql);
            $row=$mt->fetchObject();
            $pdkName=$row->mt."-客製";
        }
        else{
            $pdkName=$prodRow["pdkName"];
        }
        $ordPrice =number_format($prodRow["ordPrice"]);
        $ordStartYM=substr($prodRow["ordStart"],0,7);
        $ordStartD=substr($prodRow["ordStart"],8,2);
        $ordEndYM=substr($prodRow["ordEnd"],0,7);
        $ordEndD=substr($prodRow["ordEnd"],8,2);
        if($prodRow["ordStatus"]!=0){
        $num++;
            //判斷是否評價
            if($prodRow["rate"]==null){
                $ifRate='<button class="btnRate">我要評價</button>';
            }if($prodRow["ordStatus"]==2 && $prodRow["rate"]==null){
                $ifRate='<button class="btnCancel" disabled></button>';
            }
            else{
                $ifRate='<button class="btnRateDone" disabled>已評價</button>';
            }
?>	
                                <div class="oneOrderCard historyOrder">
                                    <p id="note"></p>
                                    <div class="rowWithOrder">
                                        <div class="orderImg">
                                        <img src="img/mt/<?php echo $prodRow["pdkNo"];?>/1.jpg" alt="訂單圖片">
                                        </div>
                                        <div class="orderInfo">
                                            <div class="orderText">
                                                <p>訂單編號:<span class="oldOrdNo"><?php echo $prodRow["ordNo"];?></span></p>
                                                <p>訂單狀態:<span><?php echo $oldDeal;?></span></p>
                                            </div>

                                            <h4><?php echo $pdkName;?></h4>
                                            <div class="orderText mobileOrdText">
                                                <p>人數:<span><?php echo $prodRow["people"];?></span>人</p>
                                                <p>天數:<span><?php echo $prodRow["day"];?></span>天</p>
                                            </div>
                                            <p class="price">NTD <?php echo $ordPrice;?></p>
                                        </div>
                                        <div class="dateAndButtons">
                                            <div class="duration">
                                                <div class="dateImg">
                                                    <p id="startYearMonth"><?php echo $ordStartYM;?></p>
                                                    <p id="startDay"><?php echo $ordStartD;?></p>
                                                    <img src="img/calender.png" alt="訂單日期底圖">
                                                </div>
                                                <div>
                                                    <i class="material-icons">keyboard_arrow_right</i>
                                                </div>
                                                <div class="dateImg">
                                                    <p id="endYearMonth"><?php echo $ordEndYM;?></p>
                                                    <p id="endDay"><?php echo $ordEndD;?></p>
                                                    <img src="img/calender.png" alt="訂單日期底圖">
                                                </div>
                                            </div>
                                            <div class="fourButtons">
                                                <div class="img-buttons">     
                                                </div>
                                                <div class=" img-buttons">
                                                </div>
                                                <input type="hidden" name="ordNo" value="<?php echo $prodRow["ordNo"];?>">
                                                
                                                <a href="" class="btn-rate"><?php echo $ifRate;?></a>
                                                <a href="product.php?pdkNo=<?php echo $prodRow["pdkNo"];?>"><button class="btnSecondOrder">再次預訂</button></a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <?php } }  ?>
                                <center>
                                    <div class="downArrow">
                                        <i class="material-icons" id="historyOrdersArrow">keyboard_arrow_down</i>         
                                    </div>
                                </center>
                                <script>
                                    //載入更多歷史訂單js--向下箭頭到底之後會往上
                                    $(document).ready(function(){
                                        var num =<?php echo $num  ?> ;
                                        var flag = false;
                                        if( <?php echo $num?><=2){
                                            $('#historyOrdersArrow').hide();
                                        }
                                        for(var i =2;i< <?php echo $num ; ?> ;i++){
                                            $(".historyOrder").eq(i).hide();
                                        }
                                        var click = 2;
                                            $("#historyOrdersArrow").click(() => {
                                                click+=2;
                                                // if (click > 1) {
                                                    for(var i = 0 ;click>i;i++){
                                                    console.log(i,<?php echo $num?>);
                                                    $(".historyOrder").eq(i).show();
                                                    if(num%2!=0){
                                                        console.log("基數");
                                                        if(<?php echo $num?> == i){
                                                            $('#historyOrdersArrow').css({"transition":".5s","transform":"rotate(180deg)"});
                                                        flag = true;
                                                        // break;
                                                    }else if(flag){
                                                        flag = false;
                                                        for(var j =1;  j<num ;num--){
                                                            $(".historyOrder").eq(num).hide();     
                                                        }
                                                        $('#historyOrdersArrow').css({"transition":".5s","transform":"rotate(0deg)"});
                                                            click = 2;        
                                                            num =<?php echo $num  ?> ;   
                                                        }
                                                    }else{
                                                        // console.log("雙數",i);
                                                        if(<?php echo $num?> == i+1){
                                                            console.log("動畫開始");
                                                            $('#historyOrdersArrow').css({"transition":".5s","transform":"rotate(180deg)"});
                                                        flag = true;
                                                        // break;
                                                    }else if(flag){
                                                        flag = false;
                                                        for(var j =1;  j<num ;num--){
                                                            $(".historyOrder").eq(num).hide();     
                                                        }
                                                        $('#historyOrdersArrow').css({"transition":".5s","transform":"rotate(0deg)"});
                                                            click = 2;        
                                                            num =<?php echo $num  ?> ;   
                                                        }

                                                    }
                                                // }
                                            }
                                        })
                                    });
                                </script>


                            </div>

                        </div>
                    </section>
                    <section id="tab-b">
                    <div id="h3-btn">
                            <h3>我的日誌</h3>
                            <form action="joEditor.php">
                                <button id="log-add" name="addlog" value="-1"><i class="fas fa-pen"></i><span>我要寫日誌</span></button>
                            </form>
                        </div>


                        <div id="log">
                            <table id="log-table">
                                <tr>
                                    <th>日誌標題</th>
                                    <th class="log-t">最後編輯時間</th>
                                    <th class="log-m">發布狀態</th>
                                    <th>處理</th>
                                </tr>
<?php	
$num = 0;
	while($prodRow=$jns->fetch(PDO::FETCH_ASSOC)){
        $jnStatus='';
        if($prodRow["jnStatus"]==0){ 
          $jnStatus='未發布';
        }else{ 
            $jnStatus='已發布';
        }
        $num++;
 ?>	
                                <tr class="myJn">
                                    <td class="log-header"><?php echo $prodRow["jnTitle"];?></td>
                                    <td class="log-t"><?php echo $prodRow["jnDate"];?></td>
                                    <td class="log-m"><?php echo $jnStatus;?></td>
                                    <td class="log-img">
                                        <form action="joEditor.php">
                                            <input type="text" class="jnNonone" name="<?php echo "lognamedel"?>" value="<?php echo $prodRow["jnNo"] ?>">
                                            <button class="penbtn" name="penbtn"value="<?php echo $prodRow["jnNo"]?>">
                                            <i class="fas fa-pen"></i></button>
                                        </form>
                                        <img src="img/baseline-delete-24px.svg" alt="垃圾桶" class="btn-jnDelete">
                                    </td>    
                                </tr>
                                <?php }                            ?>
                            </table>
                            <!-- <button id="log-more">查看更多</button> -->
                            <center>
                                    <div class="downArrow">
                                        <i class="material-icons" id="myJnArrow">keyboard_arrow_down</i>
                                    </div>
                                </center>
                        </div>
                        <script>
                            //日誌標題字數限制
                            var loghd = document.getElementsByClassName("log-header");
                            var web = document.body.offsetWidth;
                            for (var i = 0; i < loghd.length; i++) {
                                var loghdte = document.getElementsByClassName("log-header")[i].innerHTML;
                                if (web < 767) {
                                    if (loghdte.length > 5) {//手機版長度
                                        document.getElementsByClassName("log-header")[i].innerHTML = loghdte.substr(0, 5) + "...";
                                    }
                                } else {
                                    if (loghdte.length > 25) {//桌機版
                                        document.getElementsByClassName("log-header")[i].innerHTML = loghdte.substr(0, 25) + "...";
                                    }
                                }
                            }
                        </script>
                        <script>
                            //載入更多我的日誌js--向下箭頭到底之後會往上
                            $(document).ready(function(){
                                var num =<?php echo $num  ?> ;
                                var flag = false;
                                if( <?php echo $num?><=2){
                                    $('#log-table').css("margin-bottom","40px");
                                    $('#myJnArrow').hide();
                                }
                                for(var i =2;i< <?php echo $num ; ?> ;i++){
                                    $(".myJn").eq(i).hide();
                                }
                                var click = 2;
                                    $("#myJnArrow").click(() => {
                                        click+=2;
                                        // if (click > 1) {
                                            for(var i = 0 ;click>i;i++){
                                            console.log(i,<?php echo $num?>);
                                            $(".myJn").eq(i).show();
                                            if(num%2!=0){
                                                console.log("基數");
                                                if(<?php echo $num?> == i){
                                                    $('#myJnArrow').css({"transition":".5s","transform":"rotate(180deg)"});
                                                flag = true;
                                                // break;
                                            }else if(flag){
                                                flag = false;
                                                for(var j =1;  j<num ;num--){
                                                    $(".myJn").eq(num).hide();     
                                                }
                                                $('#myJnArrow').css({"transition":".5s","transform":"rotate(0deg)"});
                                                    click = 2;        
                                                    num =<?php echo $num  ?> ;   
                                                }
                                            }else{
                                                // console.log("雙數",i);
                                                if(<?php echo $num?> == i+1){
                                                    console.log("動畫開始");
                                                    $('#myJnArrow').css({"transition":".5s","transform":"rotate(180deg)"});
                                                flag = true;
                                                // break;
                                            }else if(flag){
                                                flag = false;
                                                for(var j =1;  j<num ;num--){
                                                    $(".myJn").eq(num).hide();     
                                                }
                                                $('#myJnArrow').css({"transition":".5s","transform":"rotate(0deg)"});
                                                    click = 2;        
                                                    num =<?php echo $num  ?> ;   
                                                }

                                            }
                                        // }
                                    }
                                })
                            });
                        </script>
                        


                        <h3>收藏日誌</h3>
                        <div id=jo__allcards__bg>
                            <main class="jo__allcards">
<?php
$num =0;	
	while($prodRow=$favJns->fetch(PDO::FETCH_ASSOC)){
        $jnCont = mb_substr(strip_tags($prodRow["jnCont"]),0,50,"utf-8");
        // $jnCont=str_pad(substr(strip_tags($prodRow["jnCont"]),0,164),167,".");
        $num++;
 ?>	
 
                                <form action="jn.php?jnNo=<?php echo $prodRow['jnNo'] ?>" method="post">
                                    
                                        <button>
                                            <input type="hidden" value="<?php echo $prodRow['jnNo']?>" name = "">
                                            <article class="jo__onecard">
                                                <div class="whole">
                                                    <img src="img/jn/<?php echo $prodRow["jnNo"];?>/1.jpg">
                                                    <div class="jo__allinfo">
                                                        <p class="jo__publish">發表於<?php echo $prodRow["jnDate"];?><span class="jnNo"><?php echo $prodRow["jnNo"];?></span></p>
                                                        <h3 class="jnTitle"><?php echo $prodRow["jnTitle"];?></h3>
                                                        <p class="jo__text">
                                                            <?php echo $jnCont;?>...
                                                        </p>
        
                                                        <div class="icon">
                                                                <div class="icon heart">
                                                                    <i class="material-icons fav">favorite_border</i><span><?php echo $prodRow["jnCollect"];?></span>
                                                                </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                        </button>
                                </form>
                                
                                <?php }                            ?>
                            </main>
                            <!-- <button>查看更多</button> -->
                            <center>
                                    <div class="downArrow">
                                        <i class="material-icons" id="favJnArrow">keyboard_arrow_down</i>
                                    </div>
                                </center>
                        </div>
                         <script>
                            //載入更多收藏日誌js--向下箭頭到底之後會往上
                            $(document).ready(function(){
                                var num =<?php echo $num ?> ;
                                if( <?php echo $num?><=3){
                                    $('#favJnArrow').hide();
                                }
                                for(var i =3;i< <?php echo $num ; ?> ;i++){
                                    $(".jo__onecard").eq(i).hide();
                                }
                                var click = 3;
                                $("#favJnArrow").click(() => {
                                    click+=3;
                                    if (click > 2) {
                                        for(var i = 0 ;click>i;i++){
                                            $(".jo__onecard").eq(i).show();
                                            if(<?php echo $num?>== i-1){
                                            $('#favJnArrow').css({"transition":".5s","transform":"rotate(180deg)"});
                                            num = <?php echo $num ?> ;
                                            }else if(i><?php echo $num?>){
                                                for(var j =1;  j<num ;num--){
                                                    $(".jo__onecard").eq(num+1).hide();
                                                    $('#favJnArrow').css({"transition":".5s","transform":"rotate(0deg)"});
                                                    click = 3;                                                           
                                                }
                                            }
                                        }
                                    }
                                })
                            });
                        </script>
                      
                        <script>
                            //刪除收藏日誌
                            $(document).ready(function(){
                                var index = 0;
                                // var jnsat = 0;
                                // $('.fav').click(function(){
                                //     var heart = $('.fav').index(this);
                                //     // console.log(aa);
                                //     var singleJn = $('.jo__onecard')[heart];
                                //     // console.log(bb);
                                //     $(singleJn).css('display','none');
                                //     var logdelajax = $.ajax({url:"member_joAndOrd_update.php?unFavJo="+josat,async:false})  
                                // // console.log(logdelajax.responseText,ordsat);
                                // //         xx.appendTo=logdelajax.responseText;
                                // });


                                // $('.fav').click(function(e){
                                //     var jnTitle = document.getElementsByClassName("jnTitle");
                                //     jnsat =e.target.parentNode.parentNode.parentNode.childNodes[3].innerText;
                                //     console.log(e.target.parentNode.parentNode.parentNode.childNodes[3].innerText);
                                //     for(var i =0;i<jnTitle.length;i++){
                                //         if(e.target.parentNode.parentNode.parentNode.childNodes[3].innerText==jnTitle[i].innerText ){
                                //             index=i;
                                //             console.log("出現RRR",index);
                                //         }
                                //     }
                                // });
                                // $('.fav').click(function(e){
                                //     $($('.jo__onecard')[index]).css('display','none'); 
                                //     var logdelajax = $.ajax({url:"member_joAndOrd_update.php?unFavJo="+jnsat,async:false})  
                                //     // console.log(logdelajax.responseText,ordsat);
                                //     //         xx.appendTo=logdelajax.responseText;
                                // });


                                $('.fav').click(function(e){
                                    e.preventDefault();
                                    var jnNo = document.getElementsByClassName("jnNo");
                                    jnsat =e.target.parentNode.parentNode.parentNode.childNodes[1].childNodes[1].innerText;
                                    console.log(e.target.parentNode.parentNode.parentNode.childNodes[1].childNodes[1].innerText);
                                    for(var i =0;i<jnNo.length;i++){
                                        if(e.target.parentNode.parentNode.parentNode.childNodes[1].childNodes[1].innerText==jnNo[i].innerText ){
                                            index=i;
                                            console.log("出現RRR",index);
                                        }
                                    }
                                });
                                $('.fav').click(function(e){
                                    $($('.jo__onecard')[index]).css('display','none'); 
                                    var logdelajax = $.ajax({url:"member_joAndOrd_update.php?unFavJo="+jnsat,async:false})  
                                    console.log(logdelajax.responseText,jnsat);           
                                });
                            });
                        </script>

                    </section>
                    <section id="tab-c">

                        <div class="eqSelect">
                            <form class="">

                            <input type="hidden" name="choosed" value="0">
                                <span class="joForm__input">
                                    <input type="radio" name="mountType" value="0" checked="checked"
                                        id="mount-choose">
                                    <label for="mount-choose">請選擇地點</label>

                                    <!-- <input type="radio" name="mountType" value="Fuji" id="mount-fuji">
                                    <label for="mount-fuji">富士山</label> -->
                                    <?php
                                        // 有哪些訂單
                                        $today=date('Y-m-d');
                                        $sql="select * from `order` where memNo=".$_SESSION['memNo']." and ordStatus=0 and ( ordStart between '".$today."' and '2030-01-01')";
                                        $ord=$pdo->query($sql);                       

                                          while($rows=$ord->fetchObject()){
                                            $ordNo=$rows->ordNo;
                                            // //從訂單編號去找開團資訊再去找行程種類中的山名
                                            $sql="select `order`.pdNo,mt,ordStart from 	`order`,productkind pdk,product pd where `order`.`pdNo`=`pd`.`pdNo` and `pd`.`pdkNo`=`pdk`.`pdkNo` and `order`.`ordNo`={$ordNo}";
                                            $s=$pdo->query($sql);
                                            $r=$s->fetchObject();
                                            $mt=$r->mt; 
                                            // $start=$r->ordStart;
                                    ?>
                                    <input type="radio" name="mountType" value="<?php echo $ordNo;?>" id="ord<?php echo $ordNo;?>">
                                    <label for="ord<?php echo $ordNo;?>"><?php echo $mt?></label>

                                    <?php }?>
                                </span>
                            </form>
                        </div>
                        <div class="row" id="list">
                            <!-- php動態生成 -->

                        </div>

                    </section>
                </div>
            </div>
        </div>
    </div>


    <!-- 跳窗html -->

    <!-- 編輯會員--跳窗 -->
<?php	
	while($editMember->fetch(PDO::FETCH_ASSOC)){
?>	
    <div class="jpBase editMember" id="editMember">
        <div class="jpWin" id="jpWin-edit">
            <div class="jpTitle">
                修改會員資料
            </div>
            <form method="POST"  enctype="multipart/form-data" accept-charset ="utf-8" action="member_info_edit.php">
            <div class="jpCont">
                <div id="memberUploadImg">
                    <p>
                        上傳新頭像
                    </p>
                        <label>
                            <input type="file" name="upImg" id="upImg" accept="image/*" />
                            <img src="img/iconfinder_icon-camera_211634.png" alt="" id="imgPreview">
                        </label>
                </div>
                <p>
                    會員暱稱
                    <input type="text" name="memId" maxlength="20" placeholder="<?php echo $memId;?>">
                </p>
                
                <p>
                    會員信箱
                    <input type="email" name="memMail" placeholder="<?php echo $memMail;?>">
                </p>
                
            </div>
            <div class="jpBtn">
                <div class="row">
                    <span class="btn-jump-left" id="unsave">取消修改</span>
                    <input type="submit" value="確定修改" class="btn-jump-right">
                </div>
            </div>
            </form>
        </div>
    </div>
<?php }                            ?>
        <script>
            //預覽會員新頭像
            function $id(id){
                return document.getElementById(id);
            }

            function init(){
                $id("upImg").onchange = function(e){
                    var file = e.target.files[0];
                    var reader = new FileReader();
                    reader.onload = function(){
                        $id("imgPreview").src = reader.result;
                    }
                    reader.readAsDataURL(file);
                }
            }	
            window.addEventListener("load",init,false);

            //按取消修改--跳窗消失
            $("#unsave").click(()=>{
                $("#editMember").hide();
            });
        </script>

    <!-- 取消訂單--跳窗 -->
    <div class="jpBase deleteOrder" id="deleteOrder">       
        <div class="jpWin jpWin-deleteOrder">        
            <div class="jpTitle">
                取消訂單
            </div>        
            <div class="jpCont">
                <p>
                    您確定要取消該筆訂單?
                </p>
            </div>   
            <div class="jpBtn">
                <div class="row">
                <span class="btn-jump-left" id="ordOut">離開</span>
                <a href="member.php"><button class="btn-jump-right ordDelete">確定</button></a>
                </div>
            </div>
        </div>
    </div>

    <script>

        //點擊離開 跳窗消失--jq寫法
        // $("#ordOut").click(()=>{
        //     $("#deleteOrder").hide();
        // });
        
        //點擊離開 跳窗消失--js寫法
        document.querySelector("#ordOut").addEventListener("click",()=>{
            document.querySelector("#deleteOrder").style.display="none";
        });


        //取消我的訂單
        
        $(document).ready(function(){
            var index=0;
            var ordsat=0;
            $(".del").click((e)=>{
                var ordNo = document.getElementsByClassName("ordNo");
                ordsat=e.target.parentNode.parentNode.parentNode.parentNode.parentNode.childNodes[2].nextSibling.childNodes[1].childNodes[1].childNodes[1].innerText;
                console.log(e.target.parentNode.parentNode.parentNode.parentNode.parentNode.childNodes[2].nextSibling.childNodes[1].childNodes[1].childNodes[1].innerText);
                for(var i =0;i<ordNo.length;i++){
                    if(e.target.parentNode.parentNode.parentNode.parentNode.parentNode.childNodes[2].nextSibling.childNodes[1].childNodes[1].childNodes[1].innerText==ordNo[i].innerText ){
                        index=i;
                        console.log("出現RRR",index);
                    }
                }
            })
            $('.ordDelete').click(function(e){
                $($('.oneOrderCard')[index]).css('display','none'); 
                var logdelajax = $.ajax({url:"member_joAndOrd_update.php?updateOrdStatus="+ordsat,async:false})  
                console.log(logdelajax.responseText,ordsat);
                //         xx.appendTo=logdelajax.responseText;
            });
        });
                
    </script>
    
    <!-- 旅客明細--跳窗 -->
    <div class="jpBase pplDetail" id="pplDetail">
        <div class="jpWin" id="jpWin-pplDetail">   
            <div class="jpTitle">
                旅客明細
            </div> 
            <div class="jpCont">
            <table id="">
                    <tr>
                        <th>姓名</th>
                        <th>生日</th>
                        <th>電話</th>
                        <th>身份證字號</th>
                    </tr>  
                    <?php	
    $i =0;
	while($prodRow=$ppl->fetch(PDO::FETCH_ASSOC)){
    $i++;
       
 ?>	
                    <tr class="ordNo psg ordNo<?php echo $prodRow["ordNo"]?>" alt="<?php echo $prodRow["ordNo"]?>">
                        <td class=" psgName<?php echo $i ?> "><?php echo $prodRow["psgName"];?></td>
                        <td class=" birthday<?php echo $i ?>"><?php echo $prodRow["birthday"];?></td>
                        <td class=" psgTel<?php echo $i ?>"><?php echo $prodRow["psgTel"];?></td>
                        <td class=" psgId<?php echo $i ?>"><?php echo $prodRow["psgId"];?></i>    
                        </td>
                    </tr>
            <?php }                      ?>
    </table>
                
            </div>
            <div class="jpBtn">
                <div class="row">
                    <span class="btn-jump-right" id="pplOut">離開</span>
                </div>
            </div>
        </div>
    </div>
    <script>
        //旅客明細
        $(document).ready(function(){
            // var index=0;
            $(".btn-pplDetail").click((e)=>{
                var psaarr = new Array();
                $(".psg").hide();
                var ordNo = document.getElementsByClassName("ordNo");
                var ordNo1=e.target.parentNode.parentNode.parentNode.childNodes[2].nextSibling.childNodes[1].childNodes[1].childNodes[1].innerText;
                // console.log(e.target.parentNode.parentNode.parentNode.childNodes[2].nextSibling.childNodes[1].childNodes[1].childNodes[1].innerText);
                // console.log(ordNo1,psgalt);
                var i = <?php echo $i ?>;
                for(var j = 1 ; j<=i ; j++){
                    psaarr[j] = $(".psg").eq(j-1).attr("alt");
                    // console.log(psaarr[j]);
                    // console.log(ordNo1,psaarr[j]);
                    
                    if(psaarr[j] == ordNo1){
                        $(".ordNo"+ordNo1).show();
                    }
                }
            })   
        });

        //點擊離開--跳窗消失
        $("#pplOut").click(()=>{
            $("#pplDetail").hide();
        });

    </script>
    

    <!-- 評價--跳窗 --> 
    <div class="jpBase rate" id="rate">
        <div class="jpWin" id="jpWin-rate">
        <div class="jpTitle">
                評價行程
            </div>
            <div class="jpCont">
                <p>
                    來幫這次的行程評個分吧
                </p>
                <p class="rating">
                    <input type="radio" id="star5" name="rating" value="5" />
                    <label class="full" for="star5" title="非常值得"></label>

                    <input type="radio" id="star4" name="rating" value="4" checked/>
                    <label class="full" for="star4" title="還不錯"></label>

                    <input type="radio" id="star3" name="rating" value="3" />
                    <label class="full" for="star3" title="普通"></label>

                    <input type="radio" id="star2" name="rating" value="2" />
                    <label class="full" for="star2" title="有點不理想"></label>

                    <input type="radio" id="star1" name="rating" value="1" />
                    <label class="full" for="star1" title="非常糟糕"></label>
                </p>
                <p>
                    有什麼話想說
                </p>
                <input type="hidden" name="ordNoSub">
                <textarea name="" id="talk" cols="31" rows="3" maxlength="100"></textarea>
                <p id="feedback"></p>
            </div>
            <div class="jpBtn">
                <div class="row">
                    <span class="btn-jump-left" id="rateOut">取消評價</span>
                    <span href="jspanvascript:;" class="btn-jump-right" id="rateSubmit">送出評價</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        //評價訂單
        $(document).ready(function(){
            var index=0;
            var aa = 0;
            $(".btnRate").click((e)=>{
                var oldOrdNo = document.getElementsByClassName("oldOrdNo");
                aa = e.target.parentNode.parentNode.parentNode.parentNode.childNodes[2].nextSibling.childNodes[1].childNodes[1].childNodes[1].innerText
                console.log(e.target.parentNode.parentNode.parentNode.parentNode.childNodes[2].nextSibling.childNodes[1].childNodes[1].childNodes[1].innerText);
                for(var i =0;i<oldOrdNo.length;i++){
                    if(e.target.parentNode.parentNode.parentNode.parentNode.childNodes[2].nextSibling.childNodes[1].childNodes[1].childNodes[1].innerText==oldOrdNo[i].innerText ){
                        index=i;
                        console.log("出現RRR",index);
                    }
                }       
            })    
        });
    
        //textarea 字數提醒
        $(document).ready(function(){
            var textMax = 100;
            $('#feedback').html('剩餘 <span style="color:red;">'+textMax+'</span> 字');
            $('#talk').keyup(function(){
                var textLength = $(this).val().length;
                var textRemaining = textMax - textLength;
                $('#feedback').html('剩餘 <span style="color:red;">'+textRemaining+'</span> 字');
            });
            
        });

         //點擊離開--跳窗消失
         $("#rateOut").click(()=>{
            $("#rate").hide();
        });

	</script>
    
    <!-- 刪除日誌--跳窗 -->
    <div class="jpBase deleteJn" id="deleteJn">
        <div class="jpWin" id="jpWin-deleteJn">
            <div class="jpTitle">
                刪除日誌
            </div>
            <div class="jpCont">
                <p>
                    您確定要刪除該筆日誌?
                </p>
            </div>
            <div class="jpBtn">
                <div class="row">
                    <button class="btn-jump-left" id="jnOut">離開</button>
                    <button class="btn-jump-right" id="jnDelete">確定</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        //刪除日誌
        window.addEventListener("load",()=>{
            
            // console.log(document.getElementsByClassName("btn-jnDelete"));
            var dellogimg = document.getElementsByClassName("btn-jnDelete").length;
            // console.log(dellogimg);
            var deljnNo =0,jnlistdel;
            var winJump = document.querySelector("#deleteJn");
            // document.getElementsByClassName("btn-jnDelete").addEventListener;
            for(var i = 0;i<dellogimg;i++){
                document.getElementsByClassName("btn-jnDelete")[i].addEventListener("click",delimg,true);
            }
            function delimg (e){
                // console.log(e.target.parentNode.childNodes[1].childNodes[0]);
                // console.log(e.target.parentNode.parentNode);
                jnlistdel = e.target.parentNode.parentNode;
                winJump.style.display = 'block';
                deljnNo = e.target.parentNode.childNodes[1].childNodes[0].nextElementSibling.value;
            } 
            document.querySelector("#jnDelete").addEventListener("click",()=>{
                winJump.style.display = 'none';
                jnlistdel.style.display="none";
                var logdelajax = $.ajax({url:"member_joAndOrd_update.php?del="+deljnNo,async:false})
                console.log(logdelajax.responseText,deljnNo);
                
            })
            document.querySelector("#jnOut").addEventListener("click",()=>{
                winJump.style.display = 'none';
            })
        })
    </script>

   
<!-- ===========================各分頁內容結束======================= -->
<!-- 插入 footer 會員登入跟機器人 -->
<?php
    include_once('footer.php');
    // include_once('robot.php');
    include_once('memLogin.php');
?>

<script>

//tab切換
jQuery(document).ready(function ($) {
    $(".tab li a").on("click", function (e) {
        e.preventDefault();
        $(".tab li a").removeClass("active");
        $(".tab li").removeClass("active");
        $(this).parent().addClass("active");
        $(this).addClass("active");
        $('.tab-component section').css("display", "none");
        $("" + $(this).attr("href")).fadeIn();
    });
});


// 跳窗 winJump_if
//給有條件的情況下使用 例如購物車要先勾選同意 
window.addEventListener("load", () => {
    function winJump_if(btn, win) {
        var winJump = document.querySelector(win);
        winJump.style.display = 'block';
    }
    //無條件的狀況使用winJump
    function winJump(btn, win, jpw) {
        var btns = document.querySelectorAll(btn);
        var winJump = document.querySelector(win);
        var jpWin = document.querySelector(jpw);
        winJump.style.height = document.body.offsetHeight;
        for (let i = 0; i < btns.length; i++) {
            btns[i].addEventListener('click', function (e) {
                e.preventDefault();
                winJump.style.display = 'block';
            }, true);
        }
        jpWin.addEventListener("click", () => {
            winJump.style.display = 'block';
        }, true)
        winJump.addEventListener("click", (e) => {
            winJump.style.display = 'none';
        }, true)
    }
    winJump('.btn-memberEdit', '.editMember', '#jpWin-edit');
    winJump('.btn-orderDelete', '.deleteOrder', '.jpWin-deleteOrder');
    winJump('.btn-rate', '.rate', '#jpWin-rate');
    // winJump('.btn-jnDelete', '.deleteJn', '#jpWin-deleteJn'); 
    winJump('.btn-pplDetail', '.pplDetail', '#jpWin-pplDetail');

})



//下拉選單
$('.joForm__input').click(function (e) {
    e.preventDefault();
    e.stopPropagation();
    $(this).toggleClass('expanded');
    $('#' + $(e.target).attr('for')).prop('checked', true);
});
$(document).click(function () {
    $('.joForm__input').removeClass('expanded');
});

//日誌收藏按鈕的js-------------------------
$('.fav').click(function (e) {
    e.preventDefault();
    e.stopPropagation();
    $(this).toggleClass('unsetFavorite');
});
$(document).click(function () {
    $('.fav').removeClass('unsetFavorite');
});






</script>
</body>
</html>


<script src="js/common.js"></script>
<script src="js/header.js"></script>
<!-- <script src="js/robot.js"></script> -->
<script src="js/member.js"></script>