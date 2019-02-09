/*用 O(id) 來取得getElementById 減少攏長*/ 
function O(id){
    return (typeof id == 'object'? i : document.getElementById(id));
    }

var cuProcess1= O('cuProcess1');
var cuProcess2= O('cuProcess2');
var cuForm__inputC = O('cuForm__input--C');
var cuForm__inputM = O('cuForm__input--M');

function cuSlide1(){
    //控制767以下，步驟一及步驟一左右滑動，步驟二顏色圓圈填色
    enquire.register("screen and (max-width: 767px)", {     
        match: function() {
            // let cuCustom=O('cuCustom');
            // cuCustom.scrollIntoView({behavior: "smooth"});
            cuForm__inputC.style.transform = "translateX(0px)";
            cuForm__inputM.style.transform = "translateX(0px)";
            O('cu__step1').style.transform = "translateX(0px)";
            O('cu__step2').style.transform = " translateY(-643px) translateX(1200px)";
            O('cu__step1').style.transitionDuration = "0.9s";
            },
        });
}
function cuSlide1_768(){
    enquire.register("screen and (min-width: 768px)", {     
        match: function() {
                let cuCustom=O('cuCustom');
                cuCustom.scrollIntoView({behavior: "smooth"});

               
            },
        });
}
function cuSlide2(){
    //控制767以下，步驟一及步驟一左右滑動，步驟二顏色圓圈填色
    enquire.register("screen and (max-width: 767px)", {     
        match: function() {
                let cuProcess2= O('cuProcess2');
                setTimeout(function () {
                    cuProcess2.style.transitionDuration = "0.5s";
                    cuProcess2.style.backgroundColor = '#088B9A';
                    cuProcess2.style.color = '#fff';
                },900);

                cuForm__inputC.style.transform = "translateX(-1200px)";
                cuForm__inputM.style.transform = "translateX(-1200px)";
                O('cu__step1').style.transform = "translateX(-1200px)";
                O('cu__step2').style.transform = " translateY(-643px) translateX(0px)";
                O('cu__step2').style.transitionDuration = "0.9s";
            },
        });

    //控制767以上，步驟二顏色圓圈填色
    enquire.register("screen and (min-width: 768px)", {     
        match: function() {
                let cuProcessFill2= O('cuProcessFill2');
                let cuCustom2=O('cuCustom2');
                cuCustom2.scrollIntoView({behavior: "smooth"});

                setTimeout(function () {
                    cuProcessFill2.style.transitionDuration = "1s";
                    cuProcessFill2.style.backgroundColor = '#088B9A';
                    cuProcessFill2.style.color = '#fff';
                },900);
            },
        });
}

/* btn選擇日期及嚮導 --> 畫面切換到 */

function showPickTG(){
    cuProcess2.style.transitionDuration = "0.5s";
    cuProcess2.style.backgroundColor = '#088B9A';
    cuProcess2.style.color = '#fff';
    
    cuForm__inputC.style.transform = "translateX(-1200px)";
    cuForm__inputM.style.transform = "translateX(-1200px)";
    O('cu__step1').style.transform = "translateX(-1200px)";
    O('cu__step2').style.transform = " translateY(-643px) translateX(0px)";
    O('cu__step2').style.transitionDuration = "0.9s";
    enquire.register("screen and (max-width: 767px)", {     
        match: function() {
                // JavaScript here
                // 當CSS media query計算的視窗寬度小於769px時執行
                // 網頁載入時執行一次
                // 之後每次改變視窗時會再執行一次
            },
        });
}

/* 按鈕--控制查看風景內容【icon__serach, icon__】*/
var cuCustom__showOption = document.getElementsByClassName("cuCustom__showOption"); 
function showOption(){   
   
    for(var j=0;j<cuCustom__showOption.length;j++){
        if(this.children[3] == cuCustom__showOption[j]){
            cuCustom__showOption[j].style.display = 'block';
        }
    }
}
function closeOption(){ 
    for(var j=0;j<cuCustom__showOption.length;j++){
        if(this.children[3] == cuCustom__showOption[j]){
            cuCustom__showOption[j].style.display = 'none';
        }
    }
}

/*767以下*/ 
/* 按鈕--開始風景列表*/ 
var cuCustomSceneryZoneBg =O('cuCustom__sceneryZone--bg');
function cuShowScenery(){
    if(cuCustomSceneryZoneBg.style.display = 'none'){
        
        cuCustomSceneryZoneBg.style.display = 'block';
    }    
}
/* 按鈕--控制風景【確認加入】同時關閉風景列表*/ 
function cuAddSceneryC(){
    if(cuCustomSceneryZoneBg.style.display == 'block'){
        cuCustomSceneryZoneBg.style.display = 'none';
    }

}

function cuWatchScenery(){
    var cuCustomDetailBg = document.getElementsByClassName('cuCustom__detailBg')[0];
    cuCustomDetailBg.style.display = 'block';
    console.log(cuCustomDetailBg);
}

/*768以上 按鈕--查看詳細資訊【加入景點】 */
function closeDetail(){
    var btn_cuAddOne = O('btn_cuAddOne');
    var cuCustomDetailBg = document.getElementsByClassName('cuCustom__detailBg')[0];
    cuCustomDetailBg.style.display = 'none';
}


function backPickSc(){
    cuProcess2.style.backgroundColor = 'transparent';
    cuProcess2.style.color = '#088B9A';
    enquire.register("screen and (max-width: 767px)", {     
        match: function() {
                // JavaScript here
                // 當CSS media query計算的視窗寬度小於769px時執行
                // 網頁載入時執行一次
                // 之後每次改變視窗時會再執行一次
                cuForm__inputC.style.transform = "translateX(0px)";
                cuForm__inputM.style.transform = "translateX(0px)";
                O('cu__step1').style.transform = "translateX(0px)";
                O('cu__step1').style.transitionDuration = "0.9s";
                O('cu__step2').style.transform = " translateY(-643px) translateX(1200px)";
            },
        });
    enquire.register("screen and (min-width: 768px)", {     

        match: function() {
                // JavaScript here
                // 當CSS media query計算的視窗寬度大於等於768px時執行
                // 網頁載入時執行一次
                // 之後每次改變視窗時會再執行一次
                O('cu__step1').style.transform = "translateX(00px)";
                O('cu__step2').style.transform = " translateY(-633px) translateX(1200px)";
            },
        });
}
function init(){
    // var cuProcess2 = O('cuProcess2');
    cuProcess1.addEventListener('click',cuSlide1);
    // let cuProcessFillTitle=O('cuProcessFill__title');
    // cuProcessFillTitle.addEventListener('click',cuSlide);
    let cuProcess1_768= O('cuProcess1_768');
    cuProcess1_768.addEventListener('click',cuSlide1_768);
    
    cuProcess2.addEventListener('click',cuSlide2);
    let cuProcessFillTitle2=O('cuProcessFill__title2');
    cuProcessFillTitle2.addEventListener('click',cuSlide2);


    var btn_cuCheckScenery = document.getElementById("btn_cuCheckScenery");
    btn_cuCheckScenery.addEventListener("click",cuShowScenery);
    
    
    /* 按鈕--控制風景【確認加入】*/ 
    var btn_cuAddSceneryConfirm = document.getElementById("btn_cuAddScenery--confirm");
    btn_cuAddSceneryConfirm.addEventListener("click",cuAddSceneryC);
    

    /*768以上 按鈕--查看詳細資訊 */
    var btn_cuWatchScenery = document.getElementsByClassName('btn_cuWatchScenery');
    for(var j=0 ; j<btn_cuWatchScenery.length;j++){
        btn_cuWatchScenery[j].addEventListener('click',cuWatchScenery);
    }


    /*768以上 按鈕--詳細資訊【加入景點】 */
    /*第二件事 按下後將景點加到dropZone*/ 
    var btn_cuAddOne = O('btn_cuAddOne');
    btn_cuAddOne.addEventListener('click',closeDetail);
    /*待處理～～～～～～～～～～第二件事 按下後將景點加到dropZone*/ 
    // btn_cuAddOne.addEventListener('click',addIndrop);


    var cuCustom__showOption = document.getElementsByClassName("cuCustom__sceneryItem");
    for(var i=0;i<cuCustom__showOption.length;i++){
        cuCustom__showOption[i].addEventListener("mouseover",showOption);
        cuCustom__showOption[i].addEventListener("mouseout",closeOption);
    }


    /* btn選擇日期及嚮導 --> 畫面切換到 */
    var btn_cuPickTG=document.getElementById('btn_cuPickTG');
    btn_cuPickTG.addEventListener('click',showPickTG);


    var btnCuBack=O('btn_cuBack');
    btnCuBack.addEventListener('click',backPickSc);
    // alert(123);
}

window.addEventListener("load",init);

$('.cuForm__input--C').click( bbb = function (e) {
    e.preventDefault();
    e.stopPropagation();
    $(this).toggleClass('expanded');
    $('#' + $(e.target).attr('for')).prop('checked', true);
    var aaa =e.target;
    $('.cuForm__input--M label').hide();
   
    if(aaa.innerText == '亞洲'){
        
        $('.cuForm__input--M').append('<input type="radio" name="mountType" value="choose" id="mount-choose">');
        $('.cuForm__input--M').append('<label for="mount-choose">請選擇山岳</label>');
        $('.cuForm__input--M').append('<input type="radio" name="mountType" value="Himalayas" id="mount-himalayas"');
        $('.cuForm__input--M').append('<label for="mount-himalayas">珠穆朗瑪峰</label>');
        $('.cuForm__input--M').append('<input type="radio" name="mountType" value="fuji" id="mount-fuji"');
        $('.cuForm__input--M').append('<label for="mount-fuji">富士山</label>');
        $('.cuForm__input--M').append('<input type="radio" name="mountType" value="Jade" id="mount-jade">');
        $('.cuForm__input--M').append('<label for="mount-jade">玉山</label>');
        // if($('input').val() == $('label').val()){
        //     console.log($('label').val());

        //     $('.cuForm__input--M').click(function (e2) {
        //         e2.preventDefault();
        //         e2.stopPropagation();
        //         $(this).toggleClass('expanded');
        //         $('#' + $(e2.target).attr('for')).prop('checked', true);
        //         $(document).click(function () {
        //             $('.cuForm__input--M').removeClass('expanded');
        //         });
        //     });
        // }
    }
    });
    $(document).click(function () {
        $('.cuForm__input--C').removeClass('expanded');
    }
    );

$('.cuForm__input--M').click(function (e2) {
    e2.preventDefault();
    e2.stopPropagation();
    $(this).toggleClass('expanded');
    $('#' + $(e2.target).attr('for')).prop('checked', true);
    $(document).click(function () {
        $('.cuForm__input--M').removeClass('expanded');
    });
});