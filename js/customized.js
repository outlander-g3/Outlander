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

function cuWatchScenery(e){
    let cuCustom__detail = document.createElement('div');
    cuCustom__detail.id = 'cuCustom__detail';
    let cuCustom__detailALL =e.currentTarget.previousElementSibling.children[0].value;
    let cuDetail_input = document.createElement('input');
    cuDetail_input.type = 'hidden';
    cuDetail_input.value = cuCustom__detailALL;
    let img = document.createElement('img');
    img.src = '../img/'+cuCustom__detailALL.split('|')[1]+'';
    img.classList.add('cuDetail__img');
    let cuCustom__detailContent = document.createElement('div');
    cuCustom__detailContent.classList.add('cuCustom__detail--content');
    let cuDetailH4 = document.createElement('h4');
    cuDetailH4.classList.add('cuCustom__detail--content&#x20;h4');
    cuDetailH4.innerText = cuCustom__detailALL.split('|')[0];
    let price = document.createElement('p');
    price.innerText = "價格：" + cuCustom__detailALL.split('|')[2] + " NTW";
    price.style.fontWeight = 'bold';
    let detail = document.createElement('p');
    let detailTitle = document.createElement('span');
    let detailContent = document.createElement('span');
    detailTitle.innerText = '景點介紹：';
    detailTitle.style.fontWeight = 'bold';
    detailContent.innerText = cuCustom__detailALL.split('|')[4];
    let btn_cuAddOne =document.createElement('button');
    btn_cuAddOne.classList.add('btn-main-s');
    btn_cuAddOne.style.margin = 'auto';
    btn_cuAddOne.style.display = 'block';
    btn_cuAddOne.innerText = '加入景點';
    btn_cuAddOne.id = 'btn_cuAddOne';
    var cuCustomDetailBg = document.getElementsByClassName('cuCustom__detailBg')[0];
    cuCustomDetailBg.style.display = 'block';
    cuCustomDetailBg.appendChild(cuCustom__detail);
    cuCustom__detail.appendChild(img);
    cuCustom__detail.appendChild(cuCustom__detailContent);
    cuCustom__detailContent.appendChild(cuDetailH4);
    cuCustom__detailContent.appendChild(price);
    cuCustom__detailContent.appendChild(detail);
    cuCustom__detailContent.appendChild(btn_cuAddOne);
    detail.appendChild(detailTitle);
    detail.appendChild(detailContent);

    // var btn_cuAddOne = O('btn_cuAddOne');
    btn_cuAddOne.addEventListener('click',function(){
        var cuSceneryInfo = cuCustom__detailALL;
        addItem(this.id,cuSceneryInfo);
        var cuCustomDetailBg = document.getElementsByClassName('cuCustom__detailBg')[0];
        cuCustomDetailBg.style.display = 'none';
    });
    
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










/*****  計算價格數量及動態新增刪除到【我的風景路線規劃】  *****/ 
var storage = sessionStorage;


function addItem(itemId,itemValue){	
    //風景列表物件代號
    var cu_IDNum = itemValue.split('|')[3];
    var cu_ID =O(cu_IDNum);
   
    //新增風景最大容器
    var cuCustom__dropSceneryNew = document.createElement('div');
    //加A是為了與上片的cu_ID做區別
    // cuCustom__dropSceneryNew.id=cu_IDNum+"A";
    cuCustom__dropSceneryNew.classList.add("cuCustom__dropSceneryNew");
    cuCustom__dropSceneryNew.setAttribute("draggable","true");
    cuCustom__dropSceneryNew.style.backgroundImage = ' url(./../img/'+itemValue.split('|')[1]+')';
	var cuCustom__sceneryContent= document.createElement('div');
    cuCustom__sceneryContent.classList.add("cuCustom__dropScenery&#x20;div:first-child");
    
    var title = document.createElement('p');
	title.innerText = itemValue.split('|')[0];


	var price = document.createElement('span');
    price.innerText = itemValue.split('|')[2];
    price.classList.add('cuCustom__price');
    
  
    var cu_mIconRestaurant = document.createElement('i');
    cu_mIconRestaurant.classList.add('material-icons');
    cu_mIconRestaurant.classList.add('.cuCustom__dropScenery&#x20;div:first-child&#x20;i');
    cu_mIconRestaurant.innerText = 'restaurant';
    
    var cu_fIconCampground = document.createElement('i');
    cu_fIconCampground.classList.add('fas');
    cu_fIconCampground.classList.add('fa-campground');
    cu_fIconCampground.classList.add('.cuCustom__dropScenery&#x20;div:first-child&#x20;i');

    
    //刪除按鈕
    var btn_cuIconClear = document.createElement('button');
    btn_cuIconClear.classList.add('btn_cuIcon--clear');
    btn_cuIconClear.classList.add('cuBtn__styleClear');
    btn_cuIconClear.id = itemId;
    var cu_mIconClear = document.createElement('i');
    cu_mIconClear.classList.add('material-icons');
    cu_mIconClear.innerText = 'clear'; 
    
    
    
	//先判斷此處是否已有物件，如果有就先刪除
	// if(cuCustom__dropMask.hasChildNodes()){
        //     	while(cuCustom__dropMask.childNodes.length >= 1){
            //         		cuCustom__dropMask.removeChild(cuCustom__dropMask.firstChild)
            //         	}
            //         }	
            
    //再顯示新物件
    var cuCustom__dropMask = document.getElementsByClassName('cuCustom__dropMask')[0];
    cuCustom__dropMask.insertBefore(cuCustom__dropSceneryNew, cuCustom__dropMask.childNodes[0]);
    cuCustom__dropSceneryNew.appendChild(cuCustom__sceneryContent);
    cuCustom__dropSceneryNew.appendChild(price);
    cuCustom__dropSceneryNew.appendChild(btn_cuIconClear);
    cuCustom__sceneryContent.appendChild(title);
    cuCustom__sceneryContent.appendChild(cu_mIconRestaurant);
    cuCustom__sceneryContent.appendChild(cu_fIconCampground);
    btn_cuIconClear.appendChild(cu_mIconClear);










    // 此串是給【768以上】  拖曳事件   draggable使用  
    // var cuCustom__dropSceneryD = document.querySelectorAll('.cuCustom__dropSceneryNew');
    // [].forEach.call(cuCustom__dropSceneryD, addDnDHandlers);

    // var dragSrcEl = null;

    // function handleDragStart(e) {
    //     // Target (this) element is the source node.
    //     dragSrcEl = this;
        
    //     e.dataTransfer.effectAllowed = 'move';
    //     e.dataTransfer.setData('text/html', this.outerHTML);

    // }
    // function handleDragOver(e) {
    //     if (e.preventDefault) {
    //         e.preventDefault(); // Necessary. Allows us to drop.
    //     }
    //     this.classList.add('cu_over');

    //     e.dataTransfer.dropEffect = 'move';  // See the section on the DataTransfer object.

    //     return false;
    // }

    // function handleDragEnter(e) {
    //     // this / e.target is the current hcu_over target.
    // }

    // function handleDragLeave(e) {
    //     this.classList.remove('cu_over');  // this / e.target is previous target element.
    // }

    // function handleDrop(e) {
    //     // this/e.target is current target element.

    //     if (e.stopPropagation) {
    //         e.stopPropagation(); // Stops some browsers from redirecting.
    //     }

    //     // Don't do anything if dropping the same column we're dragging.
    //     if (dragSrcEl != this) {
    //         // Set the source column's HTML to the HTML of the column we dropped on.
    //         //alert(this.outerHTML);
    //         //dragSrcEl.innerHTML = this.innerHTML;
    //         //this.innerHTML = e.dataTransfer.getData('text/html');
    //         this.parentNode.removeChild(dragSrcEl);
    //         var dropHTML = e.dataTransfer.getData('text/html');
    //         this.insertAdjacentHTML('beforebegin',dropHTML);
    //         var dropElem = this.previousSibling;

    //         // dropElem.childNodes[2].addEventListener('click',changeItemCount);
    //         addDnDHandlers(dropElem);
            
            
    //     }
    //             dropElem.childNodes[2].addEventListener('click',function(){
                    
    //                 cuCustom__dropMask.removeChild(dropElem);
    //                 cuCustom__sceneryZoneOF.insertBefore(cu_ID,cuCustom__sceneryZoneOF.childNodes[0]);
    //                 console.log(cu_ID);
    //             });
        
    //     this.classList.remove('cu_over');
    //     return false;
    // }

    // function handleDragEnd(e) {
    //     // this/e.target is the source node.
    //     this.classList.remove('over');
    //     /*[].forEach.call(cols, function (col) {
    //         col.classList.remove('cu_over');
    //     });*/
    // }

    // function addDnDHandlers(elem) {
    //     elem.addEventListener('dragstart', handleDragStart, false);
    //     elem.addEventListener('dragenter', handleDragEnter, false)
    //     elem.addEventListener('dragover', handleDragOver, false);
    //     elem.addEventListener('dragleave', handleDragLeave, false);
    //     elem.addEventListener('drop', handleDrop, false);
    //     elem.addEventListener('dragend', handleDragEnd, false);

    // }
	//存入storage
	if(storage[itemId]){
        // alert('You have checked.');
	}else{
        storage['addItemList'] += itemId + ', ';
		storage[itemId] = itemValue;
	}


    var cuCustom__sceneryZoneOF = O('cuCustom__sceneryZone--OF');
    cuCustom__sceneryZoneOF.removeChild(cu_ID);

    var btn_cuDelete= cuCustom__dropSceneryNew.appendChild(btn_cuIconClear);
    btn_cuDelete.addEventListener('click',deleteItem);
    btn_cuDelete.addEventListener('click',changeItemCount);
    function deleteItem(){
        var itemId = this.getAttribute('id');
        // 刪除該筆資料之前:
        // 1.先將總金額(total)扣除
        var itemValue = storage.getItem(itemId);
        // console.log(itemValue);
        cuAmount -= parseInt(itemValue.split('|')[2]);

        document.getElementById('cuAmount').innerText = cuAmount;

        // 2.清除storage的資料
        storage.removeItem(itemId);
        storage['addItemList'] = storage['addItemList'].replace(itemId+', ','');
        // storage.setItem('addItemList',storage.getItem('addItemList').replace(itemId+', ',''));

        // 3.再將該筆div刪除
        cuCustom__dropMask.removeChild(cuCustom__dropSceneryNew);
        cuCustom__sceneryZoneOF.insertBefore(cu_ID,cuCustom__sceneryZoneOF.childNodes[0]);
    }

    function changeItemCount(){
        var itemString = storage.getItem('addItemList');
        // var itemStringa = storage.removeItem('addItemList');     
        var items = itemString.substr(0,itemString.length-2).split(', ');
 
        if(items == ""){
            items.length -= 1;
            O('cuQuan').innerText = items.length;
        }
        O('cuQuan').innerText = items.length;
    }


    
	// // 計算購買數量和小計
    var itemString = storage.getItem('addItemList');
    // var itemStringa = storage.removeItem('addItemList');
    
    var items = itemString.substr(0,itemString.length-2).split(', ');
    
    
	cuAmount = 0;
	for(var key in items){		//use items[key]
		var itemInfo = storage.getItem(items[key]);
		var itemPrice = parseInt(itemInfo.split('|')[2]);        
		cuAmount += itemPrice;
	}

	O('cuQuan').innerText = items.length;
    O('cuAmount').innerText = cuAmount;
}


function cuShowGuide(){
    var cu__guideItem = document.getElementsByClassName('cu__guideItem');
    let cuGuide_picL = O('cuGuide_picL');
    cuGuide_picL.src = this.childNodes[1].src;
    this.style.border = '1px solid rgba(244, 244, 244, 1)';
    O('cuGuide_name').innerText = this.childNodes[3].value.split('|')[0];
    O('cuGuide_expertise').innerText  = this.childNodes[3].value.split('|')[1];   
    for(var m=0;m<cu__guideItem.length;m++){
        if(cu__guideItem[m] != this){
            cu__guideItem[m].style.border = '1px solid rgba(244, 244, 244, .3)';

        }
    }

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

    if(storage['addItemList'] == null){
		storage['addItemList'] = '';	 //storage.setItem('addItemList','');
	}

    //幫每個Add Cart建事件聆聽功能
	var list = document.querySelectorAll('.btn_cuAddScenery');  //list是陣列
	for(var i=0; i<list.length; i++){
        list[i].addEventListener('click', function(){
            var cuSceneryInfo = document.querySelector('#'+this.id+' input').value;
            addItem(this.id,cuSceneryInfo);
		});
    }
  


    // 客製化第二步驟，嚮導點小圖換大圖
    var cu__guideItem = document.getElementsByClassName('cu__guideItem');
    for(var l=0;l<cu__guideItem.length;l++){
        cu__guideItem[l].addEventListener('click',cuShowGuide);
    }
}

window.addEventListener('load',init);


$('#cuForm__input--C').click( bbb = function (e) {
    e.preventDefault();
    e.stopPropagation();
    $(this).toggleClass('expanded');
    $('#' + $(e.target).attr('for')).prop('checked', true);
    $('#cuForm__input--M label').remove();
    $('#cuForm__input--M input').remove();
    switch(e.target.innerText){
        case "亞洲" :
        $('#cuForm__input--M').append('<input type="radio" name="mountType" value="choose" checked="checked" id="mount-choose">');
        $('#cuForm__input--M').append('<label for="mount-choose">請選擇山岳</label>');
        $('#cuForm__input--M').append('<input type="radio" name="mountType" value="Alps" id="mount-himalayas">');
        $('#cuForm__input--M').append('<label for="mount-himalayas">珠穆朗瑪峰</label>');
        $('#cuForm__input--M').append('<input type="radio" name="mountType" value="Alps" id="mount-fuji">');
        $('#cuForm__input--M').append('<label for="mount-fuji">富士山</label>');
        $('#cuForm__input--M').append('<input type="radio" name="mountType" value="Jade" id="mount-jade">');
        $('#cuForm__input--M').append('<label for="mount-jade">玉山</label>');
   
        break;
        case "歐洲" :
        $('#cuForm__input--M').append('<input type="radio" name="mountType" value="choose" checked="checked" id="mount-choose">');
        $('#cuForm__input--M').append('<label for="mount-choose">請選擇山岳</label>');
        $('#cuForm__input--M').append('<input type="radio" name="mountType" value="Alps" id="mount-alps">');
        $('#cuForm__input--M').append('<label for="mount-alps">阿爾卑斯山-少女峰</label>');
        break;
        case "非洲" :
        $('#cuForm__input--M').append('<input type="radio" name="mountType" value="choose" checked="checked" id="mount-choose">');
        $('#cuForm__input--M').append('<label for="mount-choose">請選擇山岳</label>');
        $('#cuForm__input--M').append('<input type="radio" name="mountType" value="Kilimanjaro" id="mount-kilimanjaro">');
        $('#cuForm__input--M').append('<label for="mount-kilimanjaro">吉力馬札羅山</label>');
        break;
        case "北美洲" :
        $('#cuForm__input--M').append('<input type="radio" name="mountType" value="choose" checked="checked" id="mount-choose">');
        $('#cuForm__input--M').append('<label for="mount-choose">請選擇山岳</label>');
        $('#cuForm__input--M').append('<input type="radio" name="mountType" value="Yosemite" id="mount-yosemite">');
        $('#cuForm__input--M').append('<label for="mount-yosemite">優勝美地國家公園</label>');
        break;
        case "南美洲" :
        $('#cuForm__input--M').append('<input type="radio" name="mountType" value="choose" checked="checked" id="mount-choose">');
        $('#cuForm__input--M').append('<label for="mount-choose">請選擇山岳</label>');
        $('#cuForm__input--M').append('<input type="radio" name="mountType" value="MachuPicchu" id="mount-machu">');
        $('#cuForm__input--M').append('<label for="mount-machu">馬丘比丘</label>');
        $('#cuForm__input--M').append('<input type="radio" name="mountType" value="SantaCruz" id="mount-cruz">');
        $('#cuForm__input--M').append('<label for="mount-cruz">聖克魯斯</label>');
        $('#cuForm__input--M').append('<input type="radio" name="mountType" value="Paine" id="mount-paine">');
        $('#cuForm__input--M').append('<label for="mount-paine">百內國家公園</label>');
        break;
        case "大洋洲" :
        $('#cuForm__input--M').append('<input type="radio" name="mountType" value="choose" checked="checked" id="mount-choose">');
        $('#cuForm__input--M').append('<label for="mount-choose">請選擇山岳</label>');
        $('#cuForm__input--M').append('<input type="radio" name="mountType" value="Aspalin" id="mount-aspalin">');
        $('#cuForm__input--M').append('<label for="mount-aspalin">阿斯帕林國家公園</label>');
        break;
        default:
        $('#cuForm__input--M').append('<input type="radio" name="mountType" value="choose" checked="checked" id="mount-choose">');
        $('#cuForm__input--M').append('<label for="mount-choose">請選擇山岳</label>');
        
    }  
});

$(document).click(function () {
    $('#cuForm__input--C').removeClass('expanded');
    }
);


$('#cuForm__input--M').click(function aaa(e2) {
    e2.preventDefault();
    e2.stopPropagation();
    $(this).toggleClass('expanded');
    // $('#cuForm__input--M label').hide();
    
    $('#' + $(e2.target).attr('for')).prop('checked', true); 
    // console.log($('#' + $(e2.target).attr('for')).prop('checked', true).attr('id'));   
    if($('#' + $(e2.target).attr('for')).prop('checked', true).attr('id') == undefined){

        $('#cuForm__input--M #mount-choose').remove();
        $('#cuForm__input--M label:first-child').remove();
    }
});

$(document).click(function () {
    $('#cuForm__input--M').removeClass('expanded');
});
