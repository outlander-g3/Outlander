window.addEventListener("load", () => {
    var web = window.innerWidth;
    var burger = new Vue({
        el: "#burger",
        methods: {
            bur() {
                if (web < 768) {
                    document.querySelector("#burgerText").style.left = "0%";
                    document.querySelector("#burSpan1").classList.add("animation1");
                    document.querySelector("#burSpan2").classList.add("animation2");
                    document.querySelector("#burSpan3").classList.add("animation1");
                }
            }
        }
    })
    var burgerText = new Vue({
        el: "#burgerText",
        data: {
            web: web
        },
        methods: {
            out() {
                if (web < 768) {
                    document.querySelector("#burgerText").style.left = "-100%";
                    document.querySelector("#burSpan1").classList.remove("animation1");
                    document.querySelector("#burSpan2").classList.remove("animation2");
                    document.querySelector("#burSpan3").classList.remove("animation1");
                }
            }
        }
    })
    var scr = window.scrollY;
    var headerdAll = document.querySelector("#headerAll");
    var burgerText = document.querySelector("#burgerText");
    if (web > 768) {
        window.onscroll = () => {
            if (scr < window.scrollY) {
                headerdAll.style.top = "-60px";
                burgerText.style.top = "-60px";
            }
            else if (scr > window.scrollY) {
                headerdAll.style.top = "0px";
                burgerText.style.top = "0px";
            }
            scr = window.scrollY;
        }
    }
    var filter = document.querySelector(".filter");
    var search = document.querySelector("#search");
    var on =false;
    var body = document.getElementsByTagName("body")[0];
    search.addEventListener("click", () => {
        if (!on) {
            filter.style.cssText="top: 7%;left: 15%;display:block";
            on=true;
        }
        else if (on) {
            filter.style.display = "none";
            on=false;
        }
    },true);
    filter.addEventListener("click",()=>{
        filter.style.display = "block";
    },true);
    body.addEventListener("click",()=>{
        filter.style.display = "none";
    },true);
});