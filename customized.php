<?php
    include_once('connectDb.php'); //連線
    // include_once('session.php'); //判斷會員是否登入
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Outlander - customized</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="css/robot.css"> -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/vue.min.js"></script>
    <!-- <script src="js/enquire.min.js"></script> -->
    <!-- css塞這 自己js塞屁股 -->
    <link rel="stylesheet" href="css/customized.css">
    
    
</head>

<body>

<!-- 插入header -->
    <?php
        include_once('header.php');
    ?>

<!-- ===========================各分頁內容開始======================= -->
<div class="cu_bg">
        <h2>安排專屬於你的登山景點</h2>
    </div> <!-- cu_bg 結束-->
        <div class="cuProcess">
            <div class="cuProcess__first">
                <div class="cuProcess__circle cuProcess__circle--done" id="cuProcess1">1</div>
                <p>選擇行程</p>
            </div>
            <div class="cuProcess__line"></div>
            <div class="cuProcess__second">
                <div class="cuProcess__circle" id="cuProcess2">2</div>
                <p id="cuProcessFill__title2">選擇日期及嚮導</p>
            </div>
        </div>

        <!-- 風景詳細介紹，避免1200阻礙所以放在這 -->
        <div class="cuCustom__detailBg">
            <!-- <div id="cuCustom__detail">
                <img src="img/cu__sceneryItem3.jpg" alt="安娜普納基地" class="cuDetail__img">
                <div class="cuCustom__detail--content">
                    <h4>安娜普那基地</h4>
                    <i class="material-icons">restaurant</i>
                    <i class="fas fa-campground"></i>
                    <p id="cuCustom__price">價格：2,000 NTW</p>
                    <p><span>景點介紹：</span>尼泊爾著名健行步道之一。安娜普娜(Annapurna)基地營高4,130M。有魚尾峰千變萬化的景觀及山上村落悠閒的田園生活、驢隊漫步其間叮叮噹噹聲不絕於耳，無怪乎全世界喜愛高山健行的登山客把這路線當作必行之地。</p>
                    <button id="btn_cuAddOne" class="btn-main-s">加入景點</button>
                </div>
            </div> -->
        </div>

        <div class="cuMask">
            <section id="cu__step1">
                <!-- 選擇器__洲別及山岳 -->
                <div id="cuCustom">
                    <div class="cuCustom__crtlRWD">
                        
                        <form class="cuSelect">
                            <span class="cuForm__input" id="cuForm__input--C">
                                <input type="radio" name="AreaType" value="choose" checked="checked" id="contient-choose">
                                <label for="contient-choose">請選擇洲別</label>
                
                                <input type="radio" name="AreaType" value="Asia" id="contient-Asia">
                                <label for="contient-Asia">亞洲</label>
                
                                <input type="radio" name="AreaType" value="Europe" id="contient-Europe">
                                <label for="contient-Europe">歐洲</label>
                
                                <input type="radio" name="AreaType" value="Africa" id="contient-Africa">
                                <label for="contient-Africa">非洲</label>
                
                                <input type="radio" name="AreaType" value="NorthA" id="contient-NorthA">
                                <label for="contient-NorthA">北美洲</label>
                
                                <input type="radio" name="AreaType" value="SouthA" id="contient-SouthA">
                                <label for="contient-SouthA">南美洲</label>
                
                                <input type="radio" name="AreaType" value="Oceania" id="contient-Oceania">
                                <label for="contient-Oceania">大洋洲</label>
                            </span>
                        </form>
                        <form class="cuSelect">
                            <span class="cuForm__input" id="cuForm__input--M">
                                <input type="radio" name="mountType" value="choose" checked="checked" id="mount-choose">
                                <label for="mount-choose">請選擇山岳</label>
                                <!-- <?php echo "asd"?> -->
                            </span>
                        </form>
                            
                        <div id="cuCustom__zone">
                            <!-- 風景列表 -->
                            <h3 id="cuCustom__sceneryTitle">山岳風景列表</h3>
                            <div id="cuCustom__sceneryZone--bg">
                                <div class="cuCustom__sceneryZone">
                                    <div id="cuCustom__sceneryZone--OF" id="scroll">
                                        
                                        <div class="cuCustom__sceneryItem cuScenery__Item1" id="cu_A1001">
                                            <div class="cuCustom__sceneryContent">
                                                <p>安娜普那基地</p>
                                                <i class="material-icons">restaurant</i>
                                                <i class="fas fa-campground"></i>
                                            </div>
                                            <button class="btn_cuAddScenery--767 cuBtn__styleClear">
                                                <i class="material-icons">check_box_outline_blank</i>
                                            </button>
                                            <span class="cuCustom__price1">$2,000</span>
                                            <div class="cuCustom__showOption">
                                                <button id="cu_A2001" class="btn_cuAddScenery">
                                                    <input type="hidden" value="安娜普那基地|cu__sceneryItem1.jpg|2000|cu_A1001|尼泊爾著名健行步道之一。安娜普娜(Annapurna)基地營高4,130M。有魚尾峰千變萬化的景觀及山上村落悠閒的田園生活、驢隊漫步其間叮叮噹噹聲不絕於耳，無怪乎全世界喜愛高山健行的登山客把這路線當作必行之地。">
                                                        <i class="material-icons">add</i>

                                                </button>
                                                <button class="btn_cuWatchScenery">
                                                    <i class="material-icons" >search</i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="btn_cuAddScenery--confirm">確認加入</div>
                                </div>
                            </div>      
                        </div>
                    </div>
                    <!-- 調整風景順序 -->
                    <div class="cuCustom__dropZone">
                        <span class="cuCustom__dropTell" >拖曳可以更改風景順序</span>
                        <div class="cuCustom__dropMask">
                           
                        </div>
                        <div class="cuCustom__count">
                            <span class="cuCustom__line"></span>
                            <span class="cuCustom__count1">景點個數：<span id="cuQuan">0</span></span>
                            <span class="cuCustom__count2">總金額：<span id="pdkPrice">0</span>元</span>

                        </div>
                        <!-- btn_查看風景列表 -->
                        <div id="btn_cuCheckScenery">
                            <i class="material-icons">add</i>
                        </div>
                    </div>
        
                </div>
                <div class="cuCtrlBtn">
                    <!-- btn選擇日期及嚮導 -->
                    <input type="submit" id="btn_cuPickTG" class="cuBtn" value="選擇日期及嚮導">
                </div>
            </section>

        
            <!-- 客製化第二步驟（選時間、嚮導） -->
            <section id="cu__step2">
                <div id="cuCustom2">
                        <div class="cuProcess cuProcess2">
                                <div class="cuProcess__first">
                                    <div class="cuProcess__circle cuProcess__circle--done" id="cuProcess1_768">1</div>
                                    <p>選擇行程</p>
                                </div>
                                <div class="cuProcess__line"></div>
                                <div class="cuProcess__second">
                                    <div class="cuProcess__circle" id="cuProcessFill2">2</div>
                                    <p>選擇日期及嚮導</p>
                                </div>
                            </div>
                            <ul>
                                    <li><input id="date" type="text" value="">
                                        <span id="date-text">
                                            <label id="date-label">請選擇日期</label>
                                            <table class="calendar">
                                                <tbody>
                                                    <tr>
                                                        <td class="mm" colspan="2"><span id="mm-sp">月份</span> <i id="left-1" class="material-icons">keyboard_arrow_left</i></td>
                                                        <td class="yy" colspan="2"><span id="yy-sp">年份</span><i id="right-1" class="material-icons">keyboard_arrow_right</i></td>
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
                            <!-- <form class="cuSelect">
                                <span class="cuForm__input cuForm__input--D">
                                    <input type="radio" name="startType" value="choose" checked="checked" id="start-choose">
                                    <label for="start-choose">請選擇開始日期</label>
                                </span>
                            </form>
                            <form class="cuSelect">
                                <span class="cuForm__input cuForm__input--D">
                                    <input type="radio" name="endType" value="choose" checked="checked" id="end-choose">
                                    <label for="end-choose">請選擇結束日期</label>
                                </span>
                            </form>                -->
    
                    <h3>選擇嚮導</h3>
                    <div class="cu__pickGuide">
                       
                        <div class="cu__guideList">
                            <div class="cuGuide__crtl cuGuide__crtl1">
                                <p class="cuGuide__subtitle">可選擇之嚮導</p>
                                <div class="cu__guideListBg cu__guideList--pick">
                                    <div class="cu__guideList--mask">
                                        <!-- <div class="cu__guideItem cu__guideItem1">
                                            <img src="img/cu_guideItem1.png" alt="嚮導照片">
                                            <input type="hidden" value="Vivan|擅長高山百岳健行、中級山探勘、高海拔遠征、攀岩極冰攀略有涉獵。">
                                        </div>                 
                                        <div class="cu__guideItem cu__guideItem1">
                                            <img src="img/cu_guideItem2.png" alt="嚮導照片">
                                            <input type="hidden" value="Ken|制度建立起來, 登山行動當更為順利, 山難必然會減少。">
                                        </div>                 
                                        <div class="cu__guideItem cu__guideItem1">
                                            <img src="img/cu_guideItem3.png" alt="嚮導照片">
                                            <input type="hidden" value="Moore|負責提供路況或天候等的資訊負責提供路況或天候等的資訊。">
                                        </div>                  -->
                                    </div>
                                </div>
                            </div>

                            <div class="cuGuide__crtl cuGuide__crtl2">
                                <p class="cuGuide__subtitle cuGuide__subtitle2">已選擇之嚮導</p>
                                <div class="cu__guideListBg cu__guideList--picked">                                    
                                    <img src="img/cu_guideItem1.png" alt="嚮導照片" id="cuGuide_picL">
                                    <h4 id="cuGuide_name">Vivian</h4>
                                    <p id="cuGuide_expertise">擅長高山百岳健行、中級山探勘、高海拔遠征、攀岩極冰攀略有涉獵。</p>                         
                                </div>
                            </div>
                        </div>                  
        
                    </div>
                </div>
                <div class="cuCtrlBtn">
                    <!-- btn選擇日期及嚮導 -->
                    <input type="button" id="btn_cuBack" class="cuBtn" value="上一頁">
                    <!-- btn選擇日期及嚮導 -->
                    <input type="submit" id="btn_cuBooking" class="cuBtn" value="訂購行程">
                </div>
            </section>
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
<script src="js/customized.js"></script>
<script src="js/date.js"></script>