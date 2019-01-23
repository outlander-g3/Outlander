window.addEventListener("load", () => {
    // 利用程式讓文字跟著圖片大小而改變
    var h1 = document.querySelector("h1");
    h1.style.fontSize = ((window.innerWidth) / 10) + "px";
    var searchicon = document.querySelector(".searchicon");
    searchicon.style.fontSize = ((window.innerWidth) / 30) + "px";
    var bannerSearch = document.querySelector("#bannerSearch");
    bannerSearch.style.fontSize = ((window.innerWidth) / 30) + "px";
    window.onresize = () => {
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




// 第一個遊戲




// 第二個遊戲




// 第三個遊戲





// 登山日誌





















})