window.addEventListener("load",()=>{
    var h1 = document.querySelector("h1");
    h1.style.fontSize=((window.innerWidth)/10)+"px";
    var searchicon = document.querySelector(".searchicon");
    searchicon.style.fontSize=((window.innerWidth)/30)+"px";
    var bannerSearch = document.querySelector("#bannerSearch");
    bannerSearch.style.fontSize=((window.innerWidth)/30)+"px";
    window.onresize=()=>{
        h1.style.fontSize=((window.innerWidth)/10)+"px";
        searchicon.style.fontSize=((window.innerWidth)/30)+"px";
        bannerSearch.style.fontSize=((window.innerWidth)/30)+"px";
    }
    for(let i = 1 ; i<=9;i++ ){
        var indexName = document.querySelector("#indexName"+i);
        indexName.classList.add("indexName"+i);
    }
    var searchAll = document.querySelector("#searchAll");
    var filter = document.querySelector(".filter");
   var  topp = bannerSearch.offsetTop-window.scrollY;
    window.onscroll=()=>{
        if(bannerSearch.offsetTop>window.scrollY){
            searchAll.style.display="none";
            filter.style.display = "none";
        }
        else if(bannerSearch.offsetTop<window.scrollY+60){
            searchAll.style.display="block";
        }
         topp = bannerSearch.offsetTop-window.scrollY+(window.scrollY/10);
    }
    bannerSearch.addEventListener("click",()=>{
        filter.style.display="block";
        filter.style.top=topp/6.5+"%";
    })
    
})