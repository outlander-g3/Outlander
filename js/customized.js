/*用 O(id) 來取得getElementById 減少攏長*/ 
function O(id){
    return (typeof id == 'object'? i : document.getElementById(id));
    }
// function S(aaa){
//     // console.log(O(id));
//     return (O(id).style.aaa);
//     alert();
//     }

var x, i, j, selElmnt, a, b, c;
        /* Look for any elements with the class "custom-select": */
        x = document.getElementsByClassName("custom-select");
        for (i = 0; i < x.length; i++) {
            selElmnt = x[i].getElementsByTagName("select")[0];
            /* a是目前被選的 For each element, create a new DIV that will act as the selected item: */
            a = document.createElement("DIV");
            a.setAttribute("class", "select-selected");
            a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
            x[i].appendChild(a);
            /* For each element, create a new DIV that will contain the option list: */
            // 放option 的地方
            b = document.createElement("DIV");
            b.setAttribute("class", "select-items select-hide");
            // console.log(a);
            for (j = 1; j < selElmnt.length; j++) {
                // console.log(selElmnt.length);算出selector裡面option的個數
                /* c是每一座山變成一個div For each option in the original select element,
                create a new DIV that will act as an option item: */
                c = document.createElement("DIV");
                c.innerHTML = selElmnt.options[j].innerHTML;
                // console.log(c.innerHTML);
                c.addEventListener("click", function(e) {
                    /* When an item is clicked, update the original select box,
                    and the selected item: */
                    var y, i, k, s, h;
                    // s = this.parentNode.parentNode.getElementsByTagName("select")[0];
                    s = this.parentNode.parentNode.getElementsByTagName("select")[0];
                    h = this.parentNode.previousSibling;
                    console.log(this.parentNode.parentNode);
                    // console.log(s.length);
                    for (i = 0; i < s.length; i++) {
                        if (s.options[i].innerHTML == this.innerHTML) {
                            s.selectedIndex = i;
                            // console.log(i);
                            h.innerHTML = this.innerHTML;
                            // console.log(h.innerHTML);
                            y = this.parentNode.getElementsByClassName("same-as-selected");
                            for (k = 0; k < y.length; k++) {
                                y[k].removeAttribute("class");
                                // console.log(y);
                        }
                        this.setAttribute("class", "same-as-selected");
                        break;
                    }
                    }
                    // 看不懂
                    h.click();
                });
                //將c所產生的div山名放進div.select-items select-hide中
                b.appendChild(c);
            }
            x[i].appendChild(b);
            a.addEventListener("click", function(e) {
                /* When the select box is clicked, close any other select boxes,
                and open/close the current select box: */
                e.stopPropagation();
                closeAllSelect(this);
                console.log(this);
                console.log(this.classList);
                this.nextSibling.classList.toggle("select-hide");
                this.classList.toggle("select-arrow-active");
            });
        }

        function closeAllSelect(elmnt) {
        /* A function that will close all select boxes in the document,
        except the current select box: */
        var x, y, i, arrNo = [];
        x = document.getElementsByClassName("select-items");
        y = document.getElementsByClassName("select-selected");
        for (i = 0; i < y.length; i++) {
            if (elmnt == y[i]) {
            arrNo.push(i)
            } else {
            y[i].classList.remove("select-arrow-active");
            }
        }
        for (i = 0; i < x.length; i++) {
            if (arrNo.indexOf(i)) {
            x[i].classList.add("select-hide");
            }
        }
        }

        /* If the user clicks anywhere outside the select box,
        then close all select boxes: */
        document.addEventListener("click", closeAllSelect);


function cuShowScenery(e){
// alert(123);
}
/* 按鈕--控制查看風景內容【icon__serach, icon__】*/
var cuCustom__showOption = document.getElementsByClassName("cuCustom__showOption"); 
function showOption(){   
    for(var j=0;j<cuCustom__showOption.length;j++){
        if(this.children[2] == cuCustom__showOption[j]){
            cuCustom__showOption[j].style.display = 'block';
        }
    }
}
function closeOption(){ 
    for(var j=0;j<cuCustom__showOption.length;j++){
        if(this.children[2] == cuCustom__showOption[j]){
            cuCustom__showOption[j].style.display = 'none';
        }
    }
}

/* 按鈕--控制風景【確認加入】*/ 
function cuAddSceneryC(){
    var cuCustom__zone= document.getElementById("cuCustom__zone");
    if(cuCustom__zone.style.display == ''){
        cuCustom__zone.style.display = 'none';
    }
}
// 
function cuWatchScenery(){
    var cuCustomDetailBg = document.getElementsByClassName('cuCustom__detailBg')[0];
    cuCustomDetailBg.style.display = 'block';
    console.log(cuCustomDetailBg);
    // var btn_cuWatchScenery = O('btn_cuWatchScenery');
    // alert();
}
/*768以上 按鈕--查看詳細資訊【加入景點】 */
function closeDetail(){
    var btn_cuAddOne = O('btn_cuAddOne');
    var cuCustomDetailBg = document.getElementsByClassName('cuCustom__detailBg')[0];
    cuCustomDetailBg.style.display = 'none';
}

/* btn選擇日期及嚮導 --> 畫面切換到 */
var cuProcessFill= O('cuProcessFill');
function showPickTG(){
    cuProcessFill.style.backgroundColor = '#088B9A';
    cuProcessFill.style.color = '#fff';

    enquire.register("screen and (max-width: 767px)", {     
        match: function() {
                // JavaScript here
                // 當CSS media query計算的視窗寬度小於769px時執行
                // 網頁載入時執行一次
                // 之後每次改變視窗時會再執行一次
                O('cu__step1').style.transform = "translateX(-1200px)";
                O('cu__step2').style.transform = " translateY(-551px) translateX(0px)";
            },
        });
    enquire.register("screen and (min-width: 768px)", {     

        match: function() {
                // JavaScript here
                // 當CSS media query計算的視窗寬度大於等於768px時執行
                // 網頁載入時執行一次
                // 之後每次改變視窗時會再執行一次
                O('cu__step1').style.transform = "translateX(-1200px)";
                O('cu__step2').style.transform = " translateY(-633px) translateX(0px)";
            },
        });
}
function backPickSc(){
    cuProcessFill.style.backgroundColor = 'transparent';
    cuProcessFill.style.color = '#088B9A';
    enquire.register("screen and (max-width: 767px)", {     
        match: function() {
                // JavaScript here
                // 當CSS media query計算的視窗寬度小於769px時執行
                // 網頁載入時執行一次
                // 之後每次改變視窗時會再執行一次
                O('cu__step1').style.transform = "translateX(0px)";
                O('cu__step2').style.transform = " translateY(-551px) translateX(1200px)";
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