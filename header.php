<nav id="headerAll">
        <div class="header">
            <ul id="logo">
                <li><a href="index.html"><img src="img/logo.png" alt="logo"></a></li>
                <div id="searchAll">
                    <input type="text" id="search">
                    <i class="material-icons">search</i>
                </div>
            </ul>
            <div id="burger" v-on:click="bur">
                <span class="burger-1" id="burSpan1"></span>
                <span class="burger-2" id="burSpan2"></span>
                <span class="burger-3" id="burSpan3"></span>
            </div>
            <ul id="burgerText">
                <span id="burgerText-X" v-on:click="out"></span>
                <li><a href="#">登山行程</a></li>
                <li><a href="#">客製行程</a></li>
                <li><a href="#">登山日誌</a></li>
                <li><a href="#">登山技巧</a></li>
                <li v-if="web<768"><a href="#">機器人</a></li>
                <li v-if="web>768"><a href="#"><i class="material-icons">person</i></a></li>
                <li v-if="web<768" id="member">會員專區
                    <ul id="member-child">
                        <li><a class="member-a" href="#">個人中心</a></li>
                        <li><a class="member-a" href="#">訂單</a></li>
                        <li><a class="member-a" href="#">登山日誌</a></li>
                        <li><a class="member-a" href="#">行前裝備</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="filter">
            <div id="filterList">
                <ul id="filterListLi">
                    <li>亞洲</li>
                    <li>歐洲</li>
                    <li>非洲</li>
                    <li>北美洲</li>
                    <li>南美洲</li>
                    <li>大洋洲</li>
                </ul>
                <div id="filterListImg">
                    <div class="filterListImg-img">
                        <img src="img/mountain資料/玉山/pic_781_14.jpg">
                    </div>
                    <div class="filterListImg-img">
                        <img src="img/mountain資料/少女峰/2000x2000-0-70-a837fa982028e9587ed5abaa0ca6ef0a.jpg">
                    </div>
                    <div class="filterListImg-img">
                        <img src="img/mountain資料/聖母峰/6ba08327f04d2b1fd59e8126e0f8d92a.jpg">
                    </div>
                    <div class="filterListImg-img">
                        <img src="img/mountain資料/富士山/mt-fuji-japan-top-ports.jpg">
                    </div>
                </div>
            </div>
        </div>
    </nav>