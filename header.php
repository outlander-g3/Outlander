<?php
    require_once("connectDb.php");
    // 自動幫我們更新訂單～～～
    $today=date('Y-m-d');
    $sql="update `order` set ordStatus=1 where ordStatus=0 and (ordStart between '2000-01-01' and '{$today}');";
    $pdo->exec($sql);

?>
 
 <div id="header-nav">
        <div id="header">
            <nav id="header-all">
                <div id="header-left">
                    <div id="logo">
                        <a href="outlander.php">
                            <img src="img/logo.png" alt="logo">
                        </a>
                    </div>
                    <div id="search">
                        <form action="text.php">    
                            <input id="searchinput" type="text" name="searchinput" placeholder="搜索世界" value="">
                            <input id="searSub" type="submit" name="searSub" value="">
                        </form>
                        <i class="material-icons" id="material">search</i>
                    </div>
                </div>
                <div id="burger">
                    <div id="burger-all" v-on:click="bur">
                        <span id="burger-1"></span>
                        <span id="burger-2"></span>
                        <span id="burger-3"></span>
                    </div>
                </div>
                <ul id="burger-text">
                    <li id="hd_productsOverview"><a href="productsOverview.php">登山行程</a></li>
                    <li id="hd_customized"><a href="cu.php">客製行程</a></li>
                    <li id="hd_journalsOverview"><a href="journalsOverview.php">登山日誌</a></li>
                    <li id="hd_tech"><a href="tech.php">登山技巧</a></li>
                    <li id="hd-robot">機器人</li>
                    <li id="hd-memIcon"><a href="javascript:;"><i class="material-icons memIcon">person</i></a></li>
                    <li id="hd-Sign" class="logout"><i class="fas fa-sign-out-alt logout"id="user-out"></i></li>
                    <li id="hd-member"><a href="javascript:;" class="memIcon">會員專區</a></li>
                    <li id="Sign-m" class="logout">
                        <i class="fas fa-sign-out-alt user-out logout"></i>
                        <span id="user-out-m" class="logout">登出</span>
                    </li>
                </ul>
                <div class="filter">
                    <div id="filterList">
                        <ul id="filterListLi">
                            <li class="list" id="asia-list">亞洲</li>
                            <li class="list">歐洲</li>
                            <li class="list">非洲</li>
                            <li class="list">北美洲</li>
                            <li class="list">南美洲</li>
                            <li class="list">大洋洲</li>
                        </ul>
                        <div id="filterListImg">
                            <div id="asia-img" class="in">
                                <div class="filterListImg-img">
                                    <img class="imgmt" src="img/mt/1/1.jpg" alt="1" >
                                    <h3>玉山</h3>
                                </div>
                                <div class="filterListImg-img">
                                    <img class="imgmt" src="img/mt/2/1.jpg" alt="2">
                                    <h3>聖母峰</h3>
                                </div>
                                <div class="filterListImg-img">
                                    <img class="imgmt" src="img/mt/3/1.jpg" alt="3">
                                    <h3>富士山</h3>
                                </div>
                            </div>
                            <div id="europe" class="in">
                                <div class="filterListImg-img">
                                    <img class="imgmt" src="img/mt/8/1.jpg" alt="8">
                                    <h3>少女峰</h3>
                                </div>
                            </div>
                            <div id="africa" class="in">
                                <div class="filterListImg-img">
                                    <img class="imgmt" src="img/mt/6/1.jpg" alt="6">
                                    <h3>吉力馬札羅</h3>
                                </div>
                            </div>
                            <div id="na" class="in">
                                <div class="filterListImg-img">
                                    <img class="imgmt" src="img/mt/10/1.jpg" alt="10">
                                    <h3>優勝美地</h3>
                                </div>
                            </div>
                            <div id="sa" class="in">
                                <div class="filterListImg-img">
                                    <img class="imgmt" src="img/mt/5/1.jpg" alt="5">
                                    <h3>百內國家公園</h3>
                                </div>
                                <div class="filterListImg-img">
                                    <img class="imgmt" src="img/mt/7/1.jpg" alt="7">
                                    <h3>馬丘比丘</h3>
                                </div>
                                <div class="filterListImg-img">
                                    <img class="imgmt" src="img/mt/9/1.jpg" alt="9">
                                    <h3>瓦斯卡蘭</h3>
                                </div>
                            </div>
                            <div id="oceania" class="in">
                                <div class="filterListImg-img">
                                    <img class="imgmt" src="img/mt/4/1.JPG" alt="4">
                                    <h3>阿斯帕林山</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    