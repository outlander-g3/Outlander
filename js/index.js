window.addEventListener("load", () => {
    // 利用程式讓文字跟著圖片大小而改變
    var h1 = document.querySelector("h1");
    h1.style.fontSize = ((window.innerWidth) / 10) + "px";
    var searchicon = document.querySelector(".searchicon");
    searchicon.style.fontSize = ((window.innerWidth) / 30) + "px";
    var bannerSearch = document.querySelector("#bannerSearch");
    bannerSearch.style.fontSize = ((window.innerWidth) / 30) + "px";
    var web = window.innerWidth;
    window.onresize = () => {
        var web = window.innerWidth;
        h1.style.fontSize = ((window.innerWidth) / 10) + "px";
        searchicon.style.fontSize = ((window.innerWidth) / 30) + "px";
        bannerSearch.style.fontSize = ((window.innerWidth) / 30) + "px";
    }
    for (let i = 1; i <= 9; i++) {
        var indexName = document.querySelector("#indexName" + i);
        indexName.classList.add("indexName" + i);
    }


    var burgerText = document.querySelector("#burgerText");


    // 點擊banner搜尋的時候 抓到當前搜尋的位子 再把nav的搜尋固定定位到 banner搜尋下方 因為我懶 不想寫2個搜尋 XD
    var searchAll = document.querySelector("#searchAll");
    var filter = document.querySelector(".filter");
    var topp = getComputedStyle(bannerSearch);
    var topp2 = topp.getPropertyValue("top");
    topp3 = topp2.substr(0, topp2.length - 2);
    topp4 = topp3 - window.scrollY;
    topp2 = topp.getPropertyValue("height");
    topp3 = topp2.substr(0, topp2.length - 2);
    topp4 += Number(topp3);
    window.addEventListener("scroll", () => {
        // if(window.scrollY==window.innerHeight){

        //     burgerText.style.b="#0d6172";
        // }
        if (bannerSearch.offsetTop > window.scrollY) {
            searchAll.style.display = "none";
            filter.style.display = "none";
        }
        else if (bannerSearch.offsetTop < window.scrollY + 60) {
            searchAll.style.display = "block";
        }
        topp = getComputedStyle(bannerSearch);
        topp2 = topp.getPropertyValue("top");
        topp3 = topp2.substr(0, topp2.length - 2);
        topp4 = topp3 - window.scrollY;
        topp2 = topp.getPropertyValue("height");
        topp3 = topp2.substr(0, topp2.length - 2);
        topp4 += Number(topp3);
    })
    bannerSearch.addEventListener("click", () => {
        filter.style.display = "block";
        filter.style.top = (topp4 + 5) + "px";
    })



    //行程的風琴夾預留位子 



    // 遊戲的文字定位+挑選遊戲
    //測試偽類比對ID 成功
    // var aaa = document.querySelector("#aaa");
    // window.addEventListener("click",(e)=>{
    //     console.log(e.target,aaa);
    //     if(e.target==aaa){
    //         aaa.style.background="black";
    //     }
    // })
    document.querySelector("#index-game1").addEventListener("click", () => {
        document.querySelector("#game-title").innerHTML = $("#index-game1 span").text();
        $("#humanity").css({ "top": "90%", "left": "0%" });
    })

    document.querySelector("#index-game2").addEventListener("click", () => {
        document.querySelector("#game-title").innerHTML = $("#index-game2 span").text();
        $("#humanity").css({ "top": "50%", "left": "60%" });
    })
    document.querySelector("#index-game3").addEventListener("click", () => {
        document.querySelector("#game-title").innerHTML = $("#index-game3 span").text();
        $("#humanity").css({ "top": "-4%", "left": "45%" });
    })


    // 第一個遊戲




    // 第二個遊戲




    // 第三個遊戲





    // 登山日誌
    // 點擊按鈕換洲圖 懶得寫js 直接jq 
    document.querySelector("#asia").addEventListener("click", (e) => {
        if (web < 1200) {
            $("#index-list-img-all .index-list-hide").hide();
            $("#asia-all").show();
        }

        $(".list-1 button").css("color", "white");
        e.target.style.color = "red";
    })
    var index = document.querySelector("#index-asia-card-1");
    var index1 = document.querySelector("#index-asia-card-text-1");
    var index2 = document.querySelector("#index-card-europe-1");
    var index3 = document.querySelector("#index-europe-card-text-1");
    var indexCard = false;
    window.addEventListener("click", (e) => {
        if (e.target == index && !indexCard) {
            $("#asia-all").css("zIndex", "1");
            index1.style.display = "block";
            index1.style.position = "absolute";
            index1.style.top = "-" + index1.clientHeight + "px";
            index1.style.left = "-" + 43 + "px";
            indexCard = true;
        } else {
            index1.style.display = "none";
            indexCard = false;
        }


        if (e.target == index2 && !indexCard) {
            index3.style.display = "block";
            index3.style.position = "absolute";
            index3.style.top = "-" + index3.clientHeight + "px";
            index3.style.left = "-" + 43 + "px";
            indexCard = true;
        } else {
            index3.style.display = "none";
            indexCard = false;
        }
    }, true);
    document.querySelector("#europe").addEventListener("click", (e) => {
        if (web < 1200) {
            $("#index-list-img-all .index-list-hide").hide();
            $("#europe-all").show();

        }
        $(".list-1 button").css("color", "white");
        e.target.style.color = "red";
    })
    document.querySelector("#africa").addEventListener("click", (e) => {
        if (web < 1200) {
            $("#index-list-img-all .index-list-hide").hide();
            $("#africa-all").show();
        }

        $(".list-1 button").css("color", "white");
        e.target.style.color = "red";
    })
    document.querySelector("#oceania").addEventListener("click", (e) => {
        if (web < 1200) {
            $("#index-list-img-all .index-list-hide").hide();
            $("#oceania-all").show();

        }
        $(".list-1 button").css("color", "white");
        e.target.style.color = "red";
    })
    document.querySelector("#namerica").addEventListener("click", (e) => {
        if (web < 1200) {
            $("#index-list-img-all .index-list-hide").hide();
            $("#namerica-all").show();

        }
        $(".list-1 button").css("color", "white");
        e.target.style.color = "red";
    })
    document.querySelector("#samerica").addEventListener("click", (e) => {
        if (web < 1200) {
            $("#index-list-img-all .index-list-hide").hide();
            $("#samerica-all").show();

        }
        $(".list-1 button").css("color", "white");
        e.target.style.color = "red";
    })










    // 裝備清單




})