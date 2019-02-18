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
                var btnJnSeeProd = O('btn__jnSeeProd');
                var jnContentInfoPos = O('jnContent__info--pos');
                var clearfix = document.getElementsByClassName('clearfix')[0];

                jnContentInfoPos.insertBefore(btnJnSeeProd,clearfix);

            },
        });
}

function jnReport(){
    let jpBase = document.querySelector('.jpBase');
    jpBase.style.display = 'block';

    let jnOther = O('jnOther');
    // jnOther.checked = true;    
    let jnOtherCont =O('jnOtherCont');
    // jnOtherCont.autofocus = true;
    if(document.getElementById('jnOther').checked == true){
        console.log(jnOther);
        let jnOtherCont =O('jnOtherCont');
        jnOtherCont.autofocus = true;
    }
}


function init(){
    document.title = O('jnContent__title').innerText;
    
    //註冊檢舉日誌按鈕
    let btn__jnReport = O('btn__jnReport').addEventListener('click',jnReport);
    
}

window.addEventListener('load',init);
window.addEventListener('load',jnInsertT);