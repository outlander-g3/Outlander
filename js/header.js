window.addEventListener("load", () => {
    var web = window.innerWidth;
    window.addEventListener("resize", () => {
        web = window.innerWidth;
    })

    //搜尋用js
    $(".imgmt").click((e)=>{
            // console.log(e.target.nextSibling.nextSibling.innerText);
            document.querySelector("#searchinput").value=e.target.nextSibling.nextSibling.innerText;
            document.querySelector("#searSub").value = $(e.target).attr("alt");
            location.href="productsOverview.php?searSub="+document.querySelector("#searSub").value+"&searchinput="+document.querySelector("#searchinput").value;
            // console.log( document.querySelector("#searSub").value);
            
    })
    $("#material").click(()=>{
        if(document.querySelector("#searchinput").value==""){
            alert("請輸入關鍵字");
        }else{
            location.href="productsOverview.php?searSub="+document.querySelector("#searSub").value+"&searchinput="+document.querySelector("#searchinput").value;
        }
    })
    
    // 漢堡設定
    var cl = false;
    var burger = new Vue({  
        el: "#burger-all",
        methods: {
            bur() {
                if (web < 992 && !cl) {
                    document.querySelector("#burger-text").style.left = "0%";
                    document.querySelector("#burger-1").style.cssText = "transform:rotate(45deg);transform-origin:left center;top:3px";
                    document.querySelector("#burger-2").style.opacity = "0";
                    document.querySelector("#burger-3").style.cssText = "transform:rotate(-45deg);transform-origin:left center";
                    cl = true;
                } else if (web < 992 && cl) {
                    document.querySelector("#burger-text").style.left = "100%";
                    document.querySelector("#burger-1").style.cssText = "transform:rotate(0deg);transform-origin:left center;top:3px";
                    document.querySelector("#burger-2").style.opacity = "1";
                    document.querySelector("#burger-3").style.cssText = "transform:rotate(0deg);transform-origin:left center";
                    cl = false;
                }
            }
        }
    })
    var burgerText = new Vue({
        el: "#burger-text",
        data: {
            web: web
        },
    })
    // 會員專區的子選單  2/14刪除
    // if (window.innerWidth < 768) {
    //     var member = document.querySelector("#member");
    //     var memberclick = false;
    //     member.addEventListener("click", () => {
    //         if (!memberclick) {
    //                 document.querySelector("#member-child").style.top="70%";
    //             for (var i = 0; i <= 2; i++) {
    //                 var membera = document.getElementsByClassName("member-a")[i];
    //                 membera.classList.add("member-b");
    //                 memberclick = true;
    //             }
    //         } else {
    //             document.querySelector("#member-child").style.top="50%";
    //             for (var i = 0; i <= 2; i++) {
    //                 var membera = document.getElementsByClassName("member-a")[i];
    //                 membera.classList.remove("member-b");
    //                 memberclick = false;
    //             }

    //         }
    //     })
    // }

    //出現篩選
    var filter = document.querySelector(".filter");
    var search = document.querySelector("#search");
    var on = false;
    var body = document.getElementsByTagName("body")[0];
    search.addEventListener("click", () => {
        if (!on) {
            filter.style.cssText = "top: 70px;left: 15%;display:block";
            document.querySelector("#filterListImg").style.background = "#f4f4f4";
            on = true;
        }
        else if (on) {
            filter.style.display = "none";
            on = false;
        }
    }, true);
    filter.addEventListener("click", () => {
        filter.style.display = "block";
    }, true);
    body.addEventListener("click", () => {
        filter.style.display = "none";
    }, true);


    //點擊切換圖片
    $("#filterListLi li").click((e) => {
        $("#filterListLi li").css("color", "#484848");
        e.target.style.color = "#088B9A";
        var list = document.getElementsByClassName("list");
        for (let i = 0; i < list.length; i++) {
            if (e.target == list[i]) {
                var index = i;
            }
        }
        $(".in").hide();
        if (web > 768) {
            $(".in").eq(index).css("display", "flex");
        } else {
            $(".in").eq(index).css("display", "block");
        }
    })
    window.addEventListener("scroll",()=>{
        filter.style.display = "none";
    })




    // document.querySelector("#up").addEventListener("click", () => {
    //     window.scrollTo({
    //         top: 0,
    //         behavior: "smooth"
    //     });
    // })

})