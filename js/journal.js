/*用 O(id) 來取得getElementById 減少攏長*/ 
function O(id){
    return (typeof id == 'object'? i : document.getElementById(id));
    }

function jnInsertT(){

    enquire.register("screen and (max-width: 767px)", {     
        match: function() {
                // JavaScript here
                // 當CSS media query計算的視窗寬度小於769px時執行
                // 網頁載入時執行一次
                // 之後每次改變視窗時會再執行一次
                var jnContentInfo=O('jnContent__info');
                jnContentInfo.style.position = 'static';
                var bbb=O('jnContent__1thP');
                var jnContentPlr20=O('jnContent__plr20');
                jnContentPlr20.insertBefore(jnContentInfo,bbb);
            },
        });
        enquire.register("screen and (min-width: 768px)", {     
            
            match: function() {
            
                // JavaScript here
                // 當CSS media query計算的視窗寬度大於等於768px時執行
                // 網頁載入時執行一次
                // 之後每次改變視窗時會再執行一次
                var jnContent=O('jnContent');
                jnContent.style.transform = "translateY(-30px)";

            },
        });
}

function init(){

}

window.addEventListener('load',init);
window.addEventListener('load',jnInsertT);