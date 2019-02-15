<?php
    // include_once('connectDb.php'); //連線
    // include_once('login.php'); //會員登入

    //要去抓選擇的開團資訊（圖,名稱,日期

    //抓
    $_SESSION['pdkName']='瓦斯卡蘭國家公園健行四天三夜';
    $_SESSION['day']=10;
    $_SESSION['pdkImg']='img/fuji.jpg';
    $_SESSION['pdStart']='1991/04/27';
    $_SESSION['pdEnd']='1992/11/04';
    $_SESSION['pdkPrice']=999999;
    $point=300;
    $memName='Elison';
    $memMail='1@';
    $memTel='222';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>山行者 - 結帳頁面</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/cart.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/vue.min.js"></script>
    <script src="js/enquire.min.js"></script>
    
    <!-- css塞這 自己js塞屁股 -->
    
    
</head>

<body>

<!-- 插入header -->
    <?php
        include_once('header.php');
    ?>

<!-- ===========================各分頁內容開始======================= -->


    <div class="ctStep__title--mobile">
        <div class="row">
            <div class="ctStep__item ctStep--on" id="ctStep1">
                <div class="ctStep__item--circle ctStep__circle--on">1</div>
                <div class="ctStep__item--text">決定日期</div>
            </div>
            <div class="ctStep__line"></div>
            <div class="ctStep__item" id="ctStep2">
                <div class="ctStep__item--circle">2</div>
                <h3 class="ctStep__item--text">資料填寫</h3>
            </div>
            <div class="ctStep__line"></div>
            <div class="ctStep__item" id="ctStep3">
                <div class="ctStep__item--circle">3</div>
                <h3 class="ctStep__item--text">付款資訊</h3>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="wrap">
            <form action="paid.php" id="ctForm">
                <!-- 第一步驟選日期 -->
                <div class="ctProduct" id="ctProduct">
                    <!-- <h2>步驟1 決定日期</h2> -->
                    <div class="ctStep__title">
                        <div class="row">
                            <div class="ctStep__item ctStep--on">
                                <div class="ctStep__item--circle ctStep__circle--on">1</div>
                                <div class="ctStep__item--text">決定日期</div>
                            </div>
                            <div class="ctStep__line"></div>
                            <div class="ctStep__item">
                                <div class="ctStep__item--circle">2</div>
                                <h3 class="ctStep__item--text">資料填寫</h3>
                            </div>
                            <div class="ctStep__line"></div>
                            <div class="ctStep__item">
                                <div class="ctStep__item--circle">3</div>
                                <h3 class="ctStep__item--text">付款資訊</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="ctProduct__img">
                            <?php echo 
                                "<script> $('.ctProduct__img').css('background-image','url(".$_SESSION['pdkImg'].")')</script>";
                            
                            ?>
                            <!-- <img src='img/fuji.jpg' alt=''> -->
                        </div>
                        <div class="ctProduct__text">
                            <h3 class="ctProduct__text--title"><?php echo $_SESSION['pdkName']?></h3>
                            <div class="ctProduct__text--content">
                                <p>出發日：<?php echo $_SESSION['pdStart']?></p>
                                <p>回程日：<?php echo $_SESSION['pdEnd']?></p>
                                <p>天數 : <?php echo $_SESSION['day'];?>日</p>
                                <p>費用 : <span id="price"><?php echo $_SESSION['pdkPrice']?></span>/人</p>
                            </div>
                            <!-- <a href="javascript:;" class="ctProduct__btn--date btn-sub-s">修改日期</a> -->
                        </div>
                    </div>
                    <div class="ctMobile__btn">
                        <a href="javascript:;" class="ctMobile__btn--front btn-sub-s">上一頁</a>
                        <a href="javascript:;" class="ctMobile__btn--next btn-main-s" id="ctProductNextBtn">下一步</a>
                    </div>
                </div>



                <!-- 第二步驟填資料 -->
                <div class="ctProfile" id="ctProfile">
                    <!-- <h2>步驟2 資料填寫</h2> -->
                    <div class="ctStep__title">
                        <div class="row">
                            <div class="ctStep__item ctStep--on">
                                <div class="ctStep__item--circle ctStep__circle--on">1</div>
                                <div class="ctStep__item--text">決定日期</div>
                            </div>
                            <div class="ctStep__line ctStep__line--on"></div>
                            <div class="ctStep__item ctStep--on">
                                <div class="ctStep__item--circle ctStep__circle--on">2</div>
                                <h3 class="ctStep__item--text">資料填寫</h3>
                            </div>
                            <div class="ctStep__line"></div>
                            <div class="ctStep__item">
                                <div class="ctStep__item--circle">3</div>
                                <h3 class="ctStep__item--text">付款資訊</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="ctC">
                            <div class="ctCount">
                                <div class="row">
                                    <span>旅客人數：</span>
                                    <div class="ctCountBox">
                                        <div class="row">
                                            <a href="javascript:;" class="ctCountBox__a--mi">
                                                <i class="material-icons">remove</i>
                                            </a>
                                            <span id="count">1</span>
                                            <a href="javascript:;" class="ctCountBox__a--plus">
                                                <i class="material-icons">add</i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ctContact">
                                <div>
                                    <ul>

                                        <li class="ctContact__title">
                                            <span>訂購人資料<span>( 將同步到會員資料 )</span></span>
                                        </li>

                                        <li>
                                            <label for="buyName">
                                                <span>姓名</span>
                                                <input type="text" name="buyName" id="buyName" value="<?php echo $memName;?>">
                                            </label>
                                        </li>
                                        <li>
                                            <label for="buyMail">
                                                <span>電子信箱</span>
                                                <input type="text" name="buyMail" id="buyMail" value="<?php echo $memMail;?>">
                                            </label>
                                        </li>
                                        <li>
                                            <label for="buyTel">
                                                <span>聯絡電話</span>
                                                <input type="text" name="buyTel" id="buyTel" value="<?php echo $memTel;?>">
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="ctPassanger">
                            <div class="ctPassanger__tab">
                                <label>
                                    <a href="javascript:;" class="who">
                                        <div class="row">
                                            <i class="material-icons">person</i>
                                            <i>1</i>
                                            <input type="hidden" name="psgName[]"  value="">
                                            <input type="hidden" name="psgBd[]"  value="">
                                            <input type="hidden" name="psgId[]"  value="">
                                            <input type="hidden" name="psgTel[]"  value="">
                                        </div>
                                    </a>
                                </label>
                            </div>
                            <div class="ctPassanger__input">
                                <div>
                                    <ul>
                                        <li class="ctPassanger__title">
                                            <span>旅客資料</span>
                                        </li>

                                        <li>
                                            <label for="psgName">
                                                <span>旅客姓名</span>
                                                <input type="text" id="psgName" value="">
                                            </label>
                                        </li>

                                        <li>
                                            <label for="psgBd">
                                                <span>生日日期</span>
                                                <input type="text" id="psgBd" value="">

                                            </label>
                                            <div class="date">
                                                <ul>
                                                    <li>
                                                        <!-- <span id="date-text"> -->
                                                        <!-- <label id="date-label-1">請選擇日期</label> -->
                                                        <table class="calendar">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="mm" colspan="2">
                                                                        <span id="mm-sp">月份</span>
                                                                        <i id="left-1"
                                                                            class="material-icons">keyboard_arrow_left</i>
                                                                    </td>
                                                                    <td class="yy" colspan="2">
                                                                        <span id="yy-sp">年份</span>
                                                                        <i id="right-1"
                                                                            class="material-icons">keyboard_arrow_right</i>
                                                                    </td>
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

                                                        </span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>

                                        <li>
                                            <label for="psgId">
                                                <span>身分證字號</span>
                                                <input type="text" id="psgId" value="">
                                            </label>
                                        </li>
                                        <li>
                                            <label for="psgTel">
                                                <span>聯絡電話</span>
                                                <input type="text" id="psgTel" value="">
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ctMobile__btn">
                        <a href="javascript:;" class="ctMobile__btn--front btn-sub-s" id="ctProfilePreBtn">上一步</a>
                        <a href="javascript:;" class="ctMobile__btn--next btn-main-s" id="ctProfileNextBtn">下一步</a>
                    </div>
                </div>

                <!-- 第三步付款資訊 -->
                <div class="ctPay" id="ctPay">
                    <!-- <h2>步驟3 付款資訊</h2> -->
                    <div class="ctStep__title">
                        <div class="row">
                            <div class="ctStep__item ctStep--on">
                                <div class="ctStep__item--circle ctStep__circle--on">1</div>
                                <div class="ctStep__item--text">決定日期</div>
                            </div>
                            <div class="ctStep__line ctStep__line--on"></div>
                            <div class="ctStep__item ctStep--on">
                                <div class="ctStep__item--circle ctStep__circle--on">2</div>
                                <h3 class="ctStep__item--text">資料填寫</h3>
                            </div>
                            <div class="ctStep__line ctStep__line--on"></div>
                            <div class="ctStep__item ctStep--on">
                                <div class="ctStep__item--circle ctStep__circle--on">3</div>
                                <h3 class="ctStep__item--text">付款資訊</h3>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="ctRule">
                            <h3>訂購條款</h3>
                            <div class="ctRule__text">
                                <p>若於行程前7天退訂，可全額退款。</p>
                                <p>若於行程前3-7天退訂，可半額退款。</p>
                                <p>若於行程前3天內退訂，則是20%退款。</p>
                                <p>若行程取消為天災人禍之因素，無條件全額退款。</p>
                            </div>
                            <div class="ctRule__check">
                                <input type="checkbox" id="memPoint">
                                <label for="memPoint">
                                    <i class="material-icons">check_box</i>
                                    <i class="material-icons">check_box_outline_blank</i>
                                    <i>使用紅利點數折抵</i>
                                </label>
                                <p>您持有的紅利點數為：<span id="point"><?php echo $point;?></span>點 </p>
                                <p>(每10點可折抵1元)</p>
                                <input type="checkbox" id="ctRule">
                                <label for="ctRule">
                                    <i class="material-icons">check_box</i>
                                    <i class="material-icons">check_box_outline_blank</i>
                                    <i>我已詳閱並同意行程購買的條款</i>
                                </label for="ctRule">
                            </div>
                        </div>
                        <div class="ctCredit">
                            <h3>信用卡資訊</h3>
                            <div class="ctCredit__text">
                                <ul>
                                    <li>
                                        <label for="">
                                            <span>持卡人姓名</span>
                                            <span><input type="text" name=""></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label for="">
                                            <span>信用卡卡號</span>
                                            <span><input type="text" name=""></span>
                                        </label>
                                    </li>
                                    <li>
                                        <span>到期月/年</span>
                                        <span>
                                            <label for="month" class="ctCredit__select">
                                                <select name="" id="month" class="ctCredit__select--month">
                                                    <option value="">月</option>
                                                    <option value="">01</option>
                                                    <option value="">02</option>
                                                    <option value="">03</option>
                                                    <option value="">04</option>
                                                    <option value="">05</option>
                                                    <option value="">06</option>
                                                    <option value="">07</option>
                                                    <option value="">08</option>
                                                    <option value="">09</option>
                                                    <option value="">10</option>
                                                    <option value="">11</option>
                                                    <option value="">12</option>
                                                </select>
                                                <i class="material-icons">keyboard_arrow_down</i>
                                            </label>
                                            <label for="year" class="ctCredit__select">
                                                <select name="" id="year" class="ctCredit__select--year">
                                                    <option value="">年</option>
                                                    <option value="">2019</option>
                                                    <option value="">2020</option>
                                                    <option value="">2021</option>
                                                    <option value="">2022</option>
                                                    <option value="">2023</option>
                                                    <option value="">2024</option>
                                                    <option value="">2025</option>
                                                    <option value="">2026</option>
                                                </select>
                                                <i class="material-icons">keyboard_arrow_down</i>
                                            </label>
                                        </span>
                                    </li>
                                    <li>
                                        <label for="safe">
                                            <span>安全碼</span>
                                            <span><input type="text" name="" id="safe"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <i class="fab fa-cc-mastercard"></i>
                                        <i class="fab fa-cc-visa"></i>
                                        <i class="fab fa-cc-jcb"></i>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
        <div class="ctSticky">
            <div class="ctDetail">
                <h2>訂單詳情</h2>
                <div class="ctDetail__content">
                    <div class="ctDetail__text">
                        <p><?php echo $_SESSION['pdkName']?></p>
                        <p>出發日：<?php echo $_SESSION['pdStart']?></p>
                        <p>回程日：<?php echo $_SESSION['pdEnd']?></p>
                        <p>天數 : <?php echo $_SESSION['day'];?>日</p>
                        <p>費用 : <?php echo $_SESSION['pdkPrice']?>/人</p>
                        <p>旅客人數 : <span id="detailCount">1</span>人</p>
                    </div>
                    <div class="ctDetail__cal">
                        <p>
                            <span>總金額 NTD</span>
                            <span class="ctDetail__cal--sum ctDetail__cal--num"><?php echo $_SESSION['pdkPrice']?></span>
                        </p>
                        <p>
                            <span>紅利折抵 NTD</span>
                            <span class="ctDetail__cal--dis ctDetail__cal--num">0</span>
                        </p>
                    </div>
                    <div class="ctDetail__total">
                        <p>
                            <span>應付金額 NTD</span>
                            <span class="ctDetail__total--num"><?php echo $_SESSION['pdkPrice']?></span>
                        </p>
                    </div>
                </div>

                <div class="ctDetail__btn">
                    <a href="javascript:;" class="ctMobile__btn--front btn-sub-s" id="ctPayPreBtn">上一步</a>
                    <button type="submit" class="btn-main-s btn-pay">確認付款</button>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <!-- <div class="jpBase ctPaid">
        <div class="jpWin">
            <div class="jpTitle">
                <h2>訂購完成</h2>
            </div>
            <div class="jpCont">
                <p>感謝您此次的購買！！</p>
                <p>前往『<a href="member.php">會員專區</a>』查看訂單</p>
                <p>回到『<a href="index.php">山行者首頁</a>』繼續逛逛</p>
            </div>
        </div>
    </div> -->

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
<script src="js/cart.js"></script>
<!-- <script src="js/robot.js"></script> -->