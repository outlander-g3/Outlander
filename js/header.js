window.onload=()=>{
    var web = window.innerWidth;
    var burger = new Vue({
        el:"#burger",
        methods:{
            bur(){
                document.querySelector("#burgerText").style.left="0%";
                document.querySelector("#burSpan1").classList.add("animation1");
                document.querySelector("#burSpan2").classList.add("animation2");
                document.querySelector("#burSpan3").classList.add("animation1");
            }
        }
    })
    var burgerText = new Vue({
        el:"#burgerText",
        data:{
            web:web
        },
        methods:{
            out(){
                if(web<768){
                    document.querySelector("#burgerText").style.left="-100%";
                    document.querySelector("#burSpan1").classList.remove("animation1");
                    document.querySelector("#burSpan2").classList.remove("animation2");
                    document.querySelector("#burSpan3").classList.remove("animation1");
                }
            }
        }
    })
}