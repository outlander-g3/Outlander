window.onload=()=>{
    var web = window.innerWidth;
    var burger = new Vue({
        el:"#burger",
        methods:{
            bur(){
                document.querySelector("#burgerText").style.left="0%";
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
                }
            }
        }
    })
}