
    <div id="header-nav">
        <div id="header">
            <nav id="header-all">
                <div id="header-left">
                    <div id="logo">
                        <a href="index.php">
                            <img src="img/logo.png" alt="logo">
                        </a>
                    </div>
                    <div id="search">
                        <input type="text" placeholder="搜索世界">
                        <i class="material-icons">search</i>
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
                    <li><a href="productsOverview.php">登山行程</a></li>
                    <li><a href="customized.php">客製行程</a></li>
                    <li><a href="journalsOverview.php">登山日誌</a></li>
                    <li><a href="tech.php">登山技巧</a></li>
                    <li v-if="web<768">機器人</li>
                    <li v-if="web>768" id="memIcon"><a href="javascript:;"><i class="material-icons memIcon">person</i></a></li>
                    <li v-if="web>768" id="Sign"><i class="fas fa-sign-out-alt logout"id="user-out"></i></li>
                    <li v-if="web<768" id="member"><a href="javascript:;" class="memIcon">會員專區</a></li>
                    <li v-if="web<768" id="Sign-m" class="logout">
                        <i class="fas fa-sign-out-alt user-out"></i>
                        <span id="user-out-m">登出</span>
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
                                    <!-- <img src="img/玉山/1.jpg"> -->
                                    <h3>玉山</h3>
                                </div>
                                <div class="filterListImg-img">
                                    <!-- <img src="img/聖母峰/1.jpg"> -->
                                    <h3>聖母峰</h3>
                                </div>
                                <div class="filterListImg-img">
                                    <!-- <img src="img/富士山/1.jpg"> -->
                                    <h3>富士山</h3>
                                </div>
                            </div>
                            <div id="europe" class="in">
                                <div class="filterListImg-img">
                                    <!-- <img src="img/少女峰/1.jpg"> -->
                                    <h3>少女峰</h3>
                                </div>
                                <div class="filterListImg-img">
                                    <!-- <img src="img/少女峰/2.jpg"> -->
                                    <h3>少女峰</h3>
                                </div>
                            </div>
                            <div id="africa" class="in">
                                <div class="filterListImg-img">
                                    <!-- <img src="img/吉利馬札羅/1.jpg"> -->
                                    <h3>吉利馬札羅</h3>
                                </div>
                                <div class="filterListImg-img">
                                    <!-- <img src="img/吉利馬札羅/2.jpg"> -->
                                    <h3>吉利馬札羅</h3>
                                </div>
                                <div class="filterListImg-img">
                                    <!-- <img src="img/馬丘比丘/1.jpg"> -->
                                    <h3>馬丘比丘</h3>
                                </div>
                            </div>
                            <div id="na" class="in">
                                <div class="filterListImg-img">
                                    <!-- <img src="img/聖克魯斯/1.JPG"> -->
                                    <h3>聖克魯斯</h3>
                                </div>
                                <div class="filterListImg-img">
                                    <!-- <img src="img/優勝美地/1.jpg"> -->
                                    <h3>優勝美地</h3>
                                </div>
                            </div>
                            <div id="sa" class="in">
                                <div class="filterListImg-img">
                                    <!-- <img src="img/百內國家公園/1.jpg"> -->
                                    <h3>百內國家公園</h3>
                                </div>
                                <div class="filterListImg-img">
                                    <!-- <img src="img/百內國家公園/2.jpg"> -->
                                    <h3>百內國家公園</h3>
                                </div>
                            </div>
                            <div id="oceania" class="in">
                                <div class="filterListImg-img">
                                    <!-- <img src="img/阿斯帕林/1.JPG"> -->
                                    <h3>阿斯帕林山</h3>
                                </div>
                                <div class="filterListImg-img">
                                    <!-- <img src="img/阿斯帕林/2.jpg"> -->
                                    <h3>阿斯帕林山</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>