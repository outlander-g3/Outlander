var oneDay = 24*60*60*1000; // hours*minutes*seconds*milliseconds
var firstDate = new Date(2008,01,12);
var secondDate = new Date(2008,01,29);

var diffDays = Math.round(Math.abs((firstDate.getTime() - secondDate.getTime())/(oneDay)));
// alert(diffDays);
$('#cuForm__input--M label:not(:first-of-type)').css('display','none');
$('#cuForm__input--M input:not(:first-of-type)').css('display','none');
$('#cuForm__input--C').click(function (e) {
    // alert(diffDays);
    
    e.preventDefault();
    e.stopPropagation();
    if($('.cuCustom__dropMask').children().length > 0){
        $('#jpjn__C').css('display','block');
    }
    $(this).toggleClass('expanded');
    $('#contient-choose').prop('checked', true)
    $('#' + $(e.target).attr('for')).prop('checked', true);
    switch(e.target.innerText){
        case "亞洲" :
        $('#cuForm__input--M label:not(:first-of-type)').css('display','none'); 
        $('#cuForm__input--M input:not(:first-of-type)').css('display','none');
        $('#mount-choose').next().css('display','block');
        $('#mount-choose').prop('checked', true)
        $('#mt1').next().css('display','block');
        $('#mt2').next().css('display','block');
        $('#mt3').next().css('display','block');
        
        break;
        case "歐洲" :
        $('#cuForm__input--M label:not(:first-of-type)').css('display','none'); 
        $('#cuForm__input--M input:not(:first-of-type)').css('display','none');
        $('#mount-choose').next().css('display','block');
        $('#mount-choose').prop('checked', true)
        $('#mt8').next().css('display','block');
        
        break;
        case "非洲" :
        $('#cuForm__input--M label:not(:first-of-type)').css('display','none'); 
        $('#cuForm__input--M input:not(:first-of-type)').css('display','none');
        $('#mount-choose').next().css('display','block');
        $('#mount-choose').prop('checked', true)
        $('#mt6').next().css('display','block');
        
        break;
        case "北美洲" :
        $('#cuForm__input--M label:not(:first-of-type)').css('display','none'); 
        $('#cuForm__input--M input:not(:first-of-type)').css('display','none');
        $('#mount-choose').next().css('display','block');
        $('#mount-choose').prop('checked', true)
        $('#mt10').next().css('display','block');
        
        break;
        case "南美洲" :
        $('#cuForm__input--M label:not(:first-of-type)').css('display','none'); 
        $('#cuForm__input--M input:not(:first-of-type)').css('display','none');
        $('#mount-choose').next().css('display','block');
        $('#mount-choose').prop('checked', true)
        $('#mt5').next().css('display','block');
        $('#mt7').next().css('display','block');
        $('#mt9').next().css('display','block');
        
        break;
        case "大洋洲" :
        $('#cuForm__input--M label:not(:first-of-type)').css('display','none'); 
        $('#cuForm__input--M input:not(:first-of-type)').css('display','none');
        $('#mount-choose').next().css('display','block');
        $('#mount-choose').prop('checked', true)
        $('#mt4').next().css('display','block');
        break;

        // default:
        // $('#mount-choose').next().css('display','block');        
        // ;  
    }  
});

$(document).click(function () {
    $('#cuForm__input--C').removeClass('expanded');
    }
);

$('#cuForm__input--M').click(function (e2) {
    e2.preventDefault();
    e2.stopPropagation();

    if($('.cuCustom__dropMask').children().length > 0){
        $('#jpjn__M').css('display','block');
    }

    $(this).toggleClass('expanded');
    $('#mount-choose').prop('checked', true);
    $('#' + $(e2.target).attr('for')).prop('checked', true); 
    if($('#' + $(e2.target).attr('for')) != $('#mount-choose')){
        $('#mount-choose').css('display','none');
        // $('#cuForm__input--M label:first-child').remove();
    }


    // $('#cuForm__input--M')
    //將山名放進前台input:hidden
    $('#cuPdkName').val($(e2.target).text());

    //撈資料
    // console.log(pdkNo);
    // let pdkNo = $(e2.target).attr('for').substr(2,1);
    // if($(e2.target).text() != '' &&  $(e2.target).text() != '請選擇山岳'){
    //     $.ajax({
    //         type: 'get',
    //         url: 'cu_getScn.php',
    //         data: 'pdkNo=' + pdkNo,
    //         success: function (data) {
    //             $('#cuCustom__sceneryZone--OF').append(data);
    //             $('.cuCustom__sceneryItem').mouseover(showOption);
    //             $('.cuCustom__sceneryItem').mouseout(closeOption);
    //             $('.btn_cuAddScenery').click(function(){
    //                 var cuSceneryInfo = $('#'+this.id+' input').val();
    //                 addItem(this.id,cuSceneryInfo);
    //             });                
    //             $('.btn_cuWatchScenery').click(cuWatchScenery);
    //             $('.btn_cuAddScenery--767').click(cuPickScenery);
    //         }
    //     });
    // }
});

$(document).click(function () {
    $('#cuForm__input--M').removeClass('expanded');
});
// $(document).ready(function()
//     {
//         setInterval(cuGetScn, 50000);
//     }); 
$('#cuForm__input--M label:not(:first-of-type)').click(function cuGetScn(e3){
    if($(e3.target).text() != "請選擇山岳" && $('#cuForm__MCom').val() != $(e3.target).text()){
        $('#cuPdkName').val("【客製行程】"+$(e3.target).text());
        let pdkNo = $(e3.target).attr('for');
        let pdkNoL = pdkNo.length;
        if(pdkNo.length == 3){
            pdkNo = $(e3.target).attr('for').substr(2,1);
        }else if(pdkNo.length >= 3){
            pdkNo = $(e3.target).attr('for').substr(2,2);
        }

        if($(e3.target).text() != '' &&  $(e3.target).text() != '請選擇山岳'){
            test();
            $.ajax({
                type: 'get',
                url: 'cu_getScn.php',
                data: 'pdkNo=' + pdkNo,
                success: function (data) {
                    $('#cuCustom__sceneryZone--OF').html(data);
                    $('.cuCustom__sceneryItem').mouseover(showOption);
                    $('.cuCustom__sceneryItem').mouseout(closeOption);
                    $('.btn_cuAddScenery').click(function(){
                        var cuSceneryInfo = $('#'+this.id+' input').val();
                        addItemBefore(this.id,cuSceneryInfo);
                    });                
                    $('.btn_cuWatchScenery').click(cuWatchScenery);
                    $('.btn_cuAddScenery--767').click(cuPickScenery);
                }
            });
        }
    }
})
function test(){

}
/*用 O(id) 來取得getElementById 減少攏長*/ 
function O(id){
    return (typeof id == 'object'? i : document.getElementById(id));
    }

var cuProcess1= O('cuProcess1');
var cuProcess2= O('cuProcess2');
var cuForm__inputC = O('cuForm__input--C');
var cuForm__inputM = O('cuForm__input--M');
var cuCustom__dropMask = document.querySelector('.cuCustom__dropMask');


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
    if (window.innerWidth > 768){
        let cuCustom=O('cuCustom');
            cuCustom.scrollIntoView({behavior: "smooth"});
    }
}

function cuSlide2(){
    if (window.innerWidth < 768){
        let cuProcess2= O('cuProcess2');
        setTimeout(function () {
            cuProcess2.style.transitionDuration = "0.5s";
            cuProcess2.style.backgroundColor = '#088B9A';
            cuProcess2.style.color = '#fff';
        },2000);

        cuForm__inputC.style.transform = "translateX(-1200px)";
        cuForm__inputM.style.transform = "translateX(-1200px)";
        O('cu__step1').style.transform = "translateX(-1200px)";
        O('cu__step2').style.transform = " translateY(-643px) translateX(0px)";
        O('cu__step2').style.transitionDuration = "0.9s";

    }else if(window.innerWidth >= 768){
        let cuProcessFill2= O('cuProcessFill2');
        let cuCustom2=O('cuCustom2');
        cuCustom2.scrollIntoView({behavior: "smooth"});

        setTimeout(function () {
            cuProcessFill2.style.transitionDuration = "1s";
            cuProcessFill2.style.backgroundColor = '#088B9A';
            cuProcessFill2.style.color = '#fff';
        },900);
    }
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
    setTimeout(function(){ 
        window.scrollTo({
            top: 0,
            behavior: 'smooth',
        });
     }, 800);
  
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


/* 768以上 查看風景詳細內容*/
function cuWatchScenery(e){
    let cuCustom__detail = document.createElement('div');
    cuCustom__detail.id = 'cuCustom__detail';

    let cuCustom__detailALL =e.currentTarget.previousElementSibling.children[0].value;

    let cuDetail_input = document.createElement('input');
    cuDetail_input.type = 'hidden';
    cuDetail_input.value = cuCustom__detailALL;

    // let img = document.createElement('img');
    let img = document.createElement('div');
    // img.src = '../img/'+cuCustom__detailALL.split('|')[1]+'';
    //無法新增div
    img.style.backgroundImage = document.querySelector('#'+cuCustom__detailALL.split('|')[3]).style.backgroundImage;
    img.classList.add('cuDetail__img');

    let cuCustom__detailContent = document.createElement('div');
    cuCustom__detailContent.classList.add('cuCustom__detail--content');

    let cuDetailH4 = document.createElement('h4');
    cuDetailH4.classList.add('cuCustom__detail--content&#x20;h4');
    cuDetailH4.innerText = cuCustom__detailALL.split('|')[0];

    let price = document.createElement('p');
    // price.innerText = "價格：NTD "  + cuCustom__detailALL.split('|')[2];
    price.innerText = "價格：NTD "  +`${cuCustom__detailALL.split('|')[2].toString().substring(0,cuCustom__detailALL.split('|')[2].toString().length-3)+","+cuCustom__detailALL.split('|')[2].toString().substring(cuCustom__detailALL.split('|')[2].toString().length-3,cuCustom__detailALL.split('|')[2].toString().length)}`;
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


    // let  cuCustomDetailBg = document.querySelector('.cuCustom__detailBg');

  
    
}

function cuCloseScenery(e){
    let  cuCustomDetailBg = document.querySelector('.cuCustom__detailBg');
    if(e.target == cuCustomDetailBg ){
        cuCustomDetailBg.style.display = 'none';
    }
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

//767以上 讓動態新增的風景點先加到web session
function addItemBefore(itemId,itemValue){
    let addItemStr = storage['addItemList'];
    console.log(addItemStr.search("scu"));
    if(addItemStr.search("scu") == -1 ){
        console.log("應該要是沒有,");
        storage['addItemList'] = itemId;
    }else{
        console.log("有,");
        storage['addItemList'] += ',' + itemId ;
    }
    storage[itemId] = itemValue;

    // console.log(itemId);
    // console.log(itemValue);
    addItem(itemId,itemValue);
}

function addItem(itemId,itemValue){	
    // storage['addItemList'] += itemId + ',';
    // storage[itemId] = itemValue;
    //風景列表物件代號
    var cu_IDNum = itemValue.split('|')[3];
    var cu_ID =O(cu_IDNum);
   
    //新增風景最大容器
    var cuCustom__dropSceneryNew = document.createElement('div');
    
    cuCustom__dropSceneryNew.classList.add("cuCustom__dropSceneryNew");
    cuCustom__dropSceneryNew.setAttribute("draggable","true");
    // cuCustom__dropSceneryNew.style.backgroundImage = ' url(img/'+itemValue.split('|')[1]+')';
    cuCustom__dropSceneryNew.style.backgroundImage = document.querySelector('#'+itemValue.split('|')[3]).style.backgroundImage;
	var cuCustom__sceneryContent= document.createElement('div');
    cuCustom__sceneryContent.classList.add("cuCustom__dropScenery&#x20;div:first-child");
    
    var title = document.createElement('p');
	title.innerText = itemValue.split('|')[0];


	var price = document.createElement('span');
    price.innerText = `$${itemValue.split('|')[2].toString().substring(0,itemValue.split('|')[2].toString().length-3)+","+itemValue.split('|')[2].toString().substring(itemValue.split('|')[2].toString().length-3,itemValue.split('|')[2].toString().length)}`;
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
    btn_cuIconClear.id = `cu${itemId}`;
    btn_cuIconClear.value = `${itemId}`;
    var cu_mIconClear = document.createElement('i');
    cu_mIconClear.classList.add('material-icons');
    cu_mIconClear.innerText = 'clear'; 
    
            
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

   


  
    cu_ID.style.display ='none';
    /* 在我的風景列表 btn_刪除風景 */ 
    let btn_cuDelete= cuCustom__dropSceneryNew.appendChild(btn_cuIconClear);
    let btn_cuDeleteID = O(btn_cuDelete.id);
    btn_cuDeleteID.addEventListener('click',deleteItem);
    btn_cuDeleteID.addEventListener('click',changeItemCount);




    
	// // 計算購買數量和小計
    var itemString = storage.getItem('addItemList');
    let addItemStr = storage['addItemList'];
    
    // var items = itemString.substr(0,itemString.length-1);
    
    if(addItemStr.search(",") != -1 ){
        var itemMore = itemString.substr(0,itemString.length);
        var items = itemMore.split(',');
    }else if(addItemStr.search(",") == -1){
        var items = [];
        items[0]= itemString;
    }

    
	pdkPrice = 0;
    for(var key in items){		
        var itemInfo = storage.getItem(items[key]);
		var itemPrice = parseInt(itemInfo.split('|')[2]);        
		pdkPrice += itemPrice;
    }
	O('cuQuan').innerText = items.length;
    O('pdkPrice').innerText = pdkPrice.toString().substring(0,pdkPrice.toString().length-3)+","+pdkPrice.toString().substring(pdkPrice.toString().length-3,pdkPrice.toString().length);
    O('cuPdkPrice').value = O('pdkPrice').innerText;
    function changeItemCount(){
        var itemString = storage.getItem('addItemList');
        console.log(itemString);
        console.log(itemString.length);
        var items = itemString.substr(0,itemString.length-2).split(',');
        
        // console.log(items);
        O('cuQuan').innerText = (items.length-1);
        // if(items == ""){
        //     items.length -= 1;
        //     O('cuQuan').innerText = items.length;
        // }
    }
}

function deleteItem(){
    // 刪除該筆資料之前:
    // 1.先將總金額(total)扣除
    let itemId = this.value;
    let itemValue = storage.getItem(itemId);

    pdkPrice -= parseInt(itemValue.split('|')[2]);
    document.getElementById('pdkPrice').innerText = pdkPrice;

    // 2.清除storage的資料
    storage.removeItem(itemId);
    
    if(storage['addItemList'].search(','+itemId) != -1){
        storage['addItemList'] = storage['addItemList'].replace(','+itemId,"");
        console.log(itemId);
        // console.log('不是第一個');
        // console.log('不是第一個');
    }else{
        storage['addItemList'] = storage['addItemList'].replace(itemId,"");
        console.log(itemId);
        console.log('only one');
        
    }
    
    // 3.再將該筆div刪除
    // let cuCustom__dropMask = document.getElementsByClassName('cuCustom__dropMask')[0];
    // let cuCustom__dropSceneryNew = document.getElementsById();
    // let cuCustom__sceneryZoneOF = O('cuCustom__sceneryZone--OF');
    let cu_IDNum = itemValue.split('|')[3];
    let cu_ID =O(cu_IDNum);
    // cuCustom__dropMask.removeChild(cuCustom__dropSceneryNew);
    let aaa = $(this).closest('.cuCustom__dropSceneryNew').remove();
    // cuCustom__dropMask.removeChild(aaa);

     // 4.在山岳風景列表加回景點
    cu_ID.style.display ='block';

    //5.將景點的checkbox恢復空格
    let iconCheckBox =  document.querySelector('#'+itemValue.split('|')[3]+'> button i');
    iconCheckBox.innerText = 'check_box_outline_blank';
}

// function changeItemCount(){
//     var itemString = storage.getItem('addItemList');
//     // var itemStringa = storage.removeItem('addItemList');     
//     var items = itemString.substr(0,itemString.length-2).split(',');

//     if(items == ""){
//         items.length -= 1;
//         O('cuQuan').innerText = items.length;
//     }
//     O('cuQuan').innerText = items.length;
// }
// 767以下點選景點
function cuPickScenery(e){
    let inputDetail = document.querySelector('#'+e.target.parentNode.parentNode.id+' input').value;
    let iconCheckBox = e.currentTarget.childNodes[1];
    let addItemStr = storage['addItemList'];

    if(iconCheckBox.innerText == 'check_box_outline_blank'){
        iconCheckBox.innerText = 'check_box';
        // storage['addItemList'] += e.target.parentNode.parentNode.id + ',';
        if(addItemStr.search("cu") == -1 ){
            console.log("應該要是沒有,");
            storage['addItemList'] += e.target.parentNode.parentNode.id ;
            storage[e.target.parentNode.parentNode.id] = inputDetail;
        }else{
            console.log("有,");
            
            storage['addItemList'] +=  ','+e.target.parentNode.parentNode.id;
            storage[e.target.parentNode.parentNode.id] = inputDetail;
        }
    } else if(iconCheckBox.innerText == 'check_box'){
        iconCheckBox.innerText = 'check_box_outline_blank';
        // storage.removeItem(e.target.parentNode.parentNode.id);
        // storage['addItemList'] = storage['addItemList'].replace(e.target.parentNode.parentNode.id+',',"");
        storage.removeItem(e.target.parentNode.parentNode.id);
        alert();
        if(storage['addItemList'].search(','+e.target.parentNode.parentNode.id) != -1){
            storage['addItemList'] = storage['addItemList'].replace(','+e.target.parentNode.parentNode.id,"");
            console.log(e.target.parentNode.parentNode.id);
            // console.log('不是第一個');
            // console.log('不是第一個');
        }else{
            storage['addItemList'] = storage['addItemList'].replace(e.target.parentNode.parentNode.id,"");
            console.log(e.target.parentNode.parentNode.id);
            console.log('only one');
            
        }
    }

}


function cuConfirm(){
    if(cuCustomSceneryZoneBg.style.display == 'block'){
        cuCustomSceneryZoneBg.style.display = 'none';
    }

    //先判斷此處是否已有物件，如果有就先刪除
    let cuCustom__dropMask =document.querySelector('.cuCustom__dropMask');
    if(cuCustom__dropMask.hasChildNodes()){
        for(let i = 0; i< cuCustom__dropMask.childNodes.length;i++){
            cuCustom__dropMask.removeChild(cuCustom__dropMask.childNodes[i]);
        }
    }

    //加入景點
    let addItemStr = storage['addItemList'];
    if(addItemStr.search("cu") == -1 ){
    }else{
        let items= addItemStr.split(',');
        let addItemStrL = addItemStr.length;

        addItem(items[0],storage.getItem(items[0]));
        for(let i=1 ; i<addItemStrL;i++){
            itemID = items[i];
            let itemValue = storage.getItem(itemID);
            addItem(itemID,itemValue);
        }
    }
};

/* 按鈕--控制風景【確認加入】同時關閉風景列表*/ 
// function cuAddSceneryC(){
//     if(cuCustomSceneryZoneBg.style.display == 'block'){
//         cuCustomSceneryZoneBg.style.display = 'none';
//     }
//     console.log(storage['addItemList']);
//     // addItem(storage['addItemList']);
// }


function cuShowGuide(){
    var cu__guideItem = document.getElementsByClassName('cu__guideItem');
    // let cuGuide_picL = O('cuGuide_picL');
    let cuGuide_picL = document.createElement('img');
    cuGuide_picL.src = this.childNodes[1].src;
    cuGuide_picL.className ='cuGuide_picL';
    let cuGuideListPicked = document.querySelector('.cu__guideList--picked');
    console.log(cuGuideListPicked.firstChild.className);
    console.log(cuGuide_picL);
    while (cuGuideListPicked.firstChild.className == 'cuGuide_picL') {
        cuGuideListPicked.removeChild(cuGuideListPicked.firstChild);
    }
    // cuGuideListPicked.appendChild(cuGuide_picL);
    cuGuideListPicked.insertBefore(cuGuide_picL, cuGuideListPicked.childNodes[0]);
    this.style.border = '1px solid rgba(244, 244, 244, 1)';
    O('cuGuide_name').innerText = this.childNodes[3].value.split('|')[0];
    O('cuGuide_expertise').innerText  = this.childNodes[3].value.split('|')[1]; 
    O('cuGdNo').value = this.childNodes[3].value.split('|')[2]; 
    for(var m=0;m<cu__guideItem.length;m++){
        if(cu__guideItem[m] != this){
            cu__guideItem[m].style.border = '1px solid rgba(244, 244, 244, .3)';

        }
    }

}
//跳窗（重新整理警示）
if(cuCustom__dropMask.hasChildNodes() == true){
    window.onbeforeunload = function(){
        return 'Are you sure you want to leave?';
    };
    var xhr = new XMLHttpRequest();
    xhr.onload=function (){
        if( xhr.status == 200 ){
        }else{
            alert( xhr.status );
        }
    }
    var url = "cu_deletSession.php";
    xhr.open("Get", url, true);
    xhr.send( null );
    sessionStorage.clear();
}
//跳窗
function cuBooking(){
    //跳窗
    let jpjnBooking = O('jpjn__booking');
    //漏選的提示內容
    let jpContLost = O('jpCont__lost');
    // 嚮導欄
    let cuGuideP = document.querySelector('.cu__guideList--picked h4');

    if(cuCustom__dropMask.children.length == 0 && cuGuideP.innerText != ""){
        //沒有選景點
        jpjnBooking.style.display = "block";
        jpContLost.innerText = "「風景景點」";
        return;
    }else if(cuGuideP.innerText == "" && cuCustom__dropMask.children.length != 0){
        //沒選嚮導
        // alert(cuGuideP.innerText);
        jpjnBooking.style.display = "block";
        jpContLost.innerText = "「行程嚮導」";
        return;
    }else if(cuCustom__dropMask.children.length == 0 && cuGuideP.innerText == ""){
        //沒選景點＆嚮導
        jpjnBooking.style.display = "block";
        jpContLost.innerText = "風景景點及行程嚮導";
        return;
    }else{
        var xhr = new XMLHttpRequest();
        xhr.onload=function (){
            // alert(xhr.status);
            if( xhr.status == 200 ){
                if(xhr.responseText == 'login' ){
                    let cuBookingPhp =O('cuBookingPhp');
                    cuBookingPhp.submit();
                } else if (xhr.responseText == 'logout') {
                    var winLogin = document.querySelector(".memLogin");
                    winLogin.style.display = 'block';
                    // alert(xhr.responseText);
                    return ;
                    // return false;
                }
            }else{
                alert( xhr.status );
            }
        }
        var url = "session.php";
        xhr.open("Get", url, true);
        xhr.send( null );
    }
    window.onbeforeunload = null; 
    
}

//【跳窗】btn確認  清除全部資料
function cuClearItem(){
    cuJpcClose();

    let mountChoose = O('mount-choose');
    mountChoose.checked = true;
   
    //清除網頁的session
    storage['addItemList'] = "";
    // sessionStorage.clear();
    
    //讓價格跟數量歸零
    let cuQuan = O('cuQuan');
    cuQuan.innerText = '0';
    let pdkPrice = O('pdkPrice');
    pdkPrice.innerText = '0';
    
    //清除山岳風景列表裡的景點
    let cuCustomSceneryZoneOF = O('cuCustom__sceneryZone--OF');
    while (cuCustomSceneryZoneOF.firstChild) {
        cuCustomSceneryZoneOF.removeChild(cuCustomSceneryZoneOF.firstChild);
    }
  

    //清除我的風景路線規劃裡的景點
    let cuCustomDropMask = document.querySelector('.cuCustom__dropMask');
    while (cuCustomDropMask.firstChild) {
        cuCustomDropMask.removeChild(cuCustomDropMask.firstChild);
    }
 
  
    

}

//【跳窗】btn取消 並關掉視窗
function cuJpcClose(){
    let jpjnC = O('jpjn__C');
    jpjnC.style.display = 'none';
    let jpjnM = O('jpjn__M');
    jpjnM.style.display = 'none';
    let jpjnB = O('jpjn__booking');
    jpjnB.style.display = 'none';

}

// function cuCloseAdd767(){
//     let cuCustomSceneryZoneBg = O('cuCustom__sceneryZone--bg');
//     // e.stopPropagation;
//     enquire.register("screen and (max-width: 767px)", {     
//         match: function() {
//             // e2.stopPropagation;
//             cuCustomSceneryZoneBg.style.display = 'none';
//             },
//         });
// }



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
    // var btn_cuAddSceneryConfirm = document.getElementById("btn_cuAddScenery--confirm");
    // btn_cuAddSceneryConfirm.addEventListener("click",cuAddSceneryC);
    

    /*768以上 按鈕--查看詳細資訊 */
    var btn_cuWatchScenery = document.getElementsByClassName('btn_cuWatchScenery');
    for(var j=0 ; j<btn_cuWatchScenery.length;j++){
        btn_cuWatchScenery[j].addEventListener('click',cuWatchScenery);
    }

    let  cuCustomDetailBg = document.querySelector('.cuCustom__detailBg');
    cuCustomDetailBg.addEventListener('click', cuCloseScenery);


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
    // let btnCuAddScenery = document.querySelectorAll('.btn_cuAddScenery');  //list是陣列
    // let btnCuAddSceneryL = btnCuAddScenery.length;
	// for(var i=0; i<btnCuAddSceneryL; i++){
    //     btnCuAddScenery[i].addEventListener('click', function(){
    //         var cuSceneryInfo = document.querySelector('#'+this.id+' input').value;
    //         addItem(this.id,cuSceneryInfo);
	// 	});
    // }

    // 767以下點選景點
    // var btnCuAddScenery767 = document.getElementsByClassName('btn_cuAddScenery--767');
    // for(var m=0 ; m<btnCuAddScenery767.length;m++){
    //     btnCuAddScenery767[m].addEventListener('click',cuPickScenery);
    // }


    let btnCuAddSceneryConfirm = document.getElementById("btn_cuAddScenery--confirm");
    btnCuAddSceneryConfirm.addEventListener('click',cuConfirm);

    // 客製化第二步驟，嚮導點小圖換大圖
    // var cu__guideItem = document.getElementsByClassName('cu__guideItem');
    // for(var l=0;l<cu__guideItem.length;l++){
    //     cu__guideItem[l].addEventListener('click',cuShowGuide);
    // }

    //btn訂購行程
    let btnCuBooking = O('btn_cuBooking');
    btnCuBooking.addEventListener('click',cuBooking);


    //
    let btnjpcConfirm = O('btnjpc__confirm');
    let btnjpmConfirm = O('btnjpm__confirm');
    btnjpcConfirm.addEventListener('click',cuClearItem);
    btnjpmConfirm.addEventListener('click',cuClearItem);

    //btn取消 並關掉視窗
    let btnjpcClose = O('btnjpc__close');
    btnjpcClose.addEventListener('click',cuJpcClose);
    let btnjpMclose = O('btnjpm__close');
    btnjpMclose.addEventListener('click',cuJpcClose);
    let btnjpRclose = O('btnjpr__close');
    btnjpRclose.addEventListener('click',cuJpcClose);
    let btnjpBconfirm = O('btnjpb__confirm');
    btnjpBconfirm.addEventListener('click',cuJpcClose);

    let cuCustomSceneryZoneBg = O('cuCustom__sceneryZone--bg');
    cuCustomSceneryZoneBg.addEventListener('click',cuCloseAdd767);
    
}

window.addEventListener("load", () => {
    $('#date-text').click(function (e) {
        e.preventDefault();
        e.stopPropagation();
        $(this).toggleClass('expanded');
        $('#' + $(e.target).attr('for')).prop('checked', true);
    });
    $(document).click(function () {
        $('#date-text').removeClass('expanded');
    });
    $(".calendar").click((e) => {
        e.preventDefault();
        e.stopPropagation();
        $(this).toggleClass('expanded');
        $('#' + $(e.target).attr('for')).prop('checked', true);
    })



    var yy = new Date().getFullYear(); //年
    var mm = new Date().getMonth(); //月份
    var dd = new Date().getDate();//今天日期
    var arrmm = new Array();
    arrmm[0] = "一月";
    arrmm[1] = "二月";
    arrmm[2] = "三月";
    arrmm[3] = "四月";
    arrmm[4] = "五月";
    arrmm[5] = "六月";
    arrmm[6] = "七月";
    arrmm[7] = "八月";
    arrmm[8] = "九月";
    arrmm[9] = "十月";
    arrmm[10] = "十一月";
    arrmm[11] = "十二月";
    document.querySelector("#mm-sp").innerText = arrmm[mm];
    document.querySelector("#yy-sp").innerText = yy;
    var dayall = new Date(yy, (mm + 1), 0).getDate();//總天數
    var bd = new Date(yy + "/" + (mm + 1) + "/1").getDay();//因為回傳月份是0-11 所以要+1  抓星期他只有1-12月
    var dayfunction = () => {
        for (var i = 1; i < 7; i++) {
            var text = "";
            if (i == 1) {
                if (i - bd < 1) {
                    for (var p = 0; p < bd; p++) {
                        text += "<td class='tdclass-1'></td>";
                    }
                }
                for (var o = 1; o <= 7 - bd; o++) {
                    text += "<td class='tdclass'>" + o + "</td>";
                }
            }
            else if (i == 2) {
                for (var o = 8 - bd; o <= 14 - bd; o++) {
                    text += "<td class='tdclass'>" + o + "</td>";
                }
            }
            else if (i == 3) {
                for (var o = 15 - bd; o <= 21 - bd; o++) {
                    text += "<td class='tdclass'>" + o + "</td>";
                }
            }
            else if (i == 4) {
                for (var o = 22 - bd; o <= 28 - bd; o++) {
                    text += "<td class='tdclass'>" + o + "</td>";
                }
            }
            else if (i == 5) {
                if (bd > 4 && dayall > 28) {
                    for (var o = 29 - bd; o <= 35 - bd; o++) {
                        text += "<td class='tdclass'>" + o + "</td>";
                    }
                    var tr = document.createElement("tr");
                    document.querySelector("#calendar-tb").appendChild(tr).innerHTML = text;
                    text = "";
                    for (var o = 36 - bd; o <= dayall; o++) {
                        text += "<td class='tdclass'>" + o + "</td>";
                    }
                } else {
                    for (var o = 29 - bd; o <= dayall; o++) {
                        text += "<td class='tdclass'>" + o + "</td>";
                    }

                }

            }

            var tr = document.createElement("tr");
            document.querySelector("#calendar-tb").appendChild(tr).innerHTML = text;
        }
    }
    dayfunction();
    document.querySelector("#left-1").addEventListener("click", (e) => {
        var num = arrmm.indexOf(document.querySelector("#mm-sp").innerText);
        dayall = new Date(yy, num, 0).getDate();//總天數
        document.querySelector("#calendar-tb").innerHTML = "";
        if (num - 1 < 0) {
            num = 12;
            yy--;
        }
        bd = new Date(yy + "/" + num + "/1").getDay();
        dayfunction(bd, dayall);
        document.querySelector("#mm-sp").innerText = arrmm[num - 1];
        document.querySelector("#yy-sp").innerText = yy;
        load();
    })
    document.querySelector("#right-1").addEventListener("click", (e) => {
        var num = arrmm.indexOf(document.querySelector("#mm-sp").innerText);
        if (num == 0) {
            dayall = new Date(yy, 2, 0).getDate()
            bd = new Date(yy + "/" + 2 + "/1").getDay();
        } else if (num == 11) {
            dayall = new Date(yy, num + 1, 0).getDate();//總天數
            bd = new Date(yy + "/" + (num + 1) + "/1").getDay();
        } else if (num == 10) {
            dayall = new Date(yy, num, 0).getDate();//總天數
            bd = new Date(yy + "/" + (num) + "/1").getDay();
        }
        else {
            dayall = new Date(yy, num + 2, 0).getDate();//總天數
            bd = new Date(yy + "/" + (num + 2) + "/1").getDay();
        }
        document.querySelector("#calendar-tb").innerHTML = "";
        if (num + 1 > 11) {
            num = -1;
            yy++;
        }
        dayfunction(bd, dayall);
        document.querySelector("#mm-sp").innerText = arrmm[num + 1];
        document.querySelector("#yy-sp").innerText = yy;
        load();
    })

    var len;
    var arr = new Array();
    function load() {
        len = document.getElementsByClassName("tdclass");
        var ss;
        for (var k = 0; k <= len.length - 1; k++) {
            ss = document.getElementsByClassName("tdclass")[k];
            ss.addEventListener("click", tdclass);
            arr[k]=ss;
        }
    }
    var click = 0;
    var cl=false;
    var datevalue1;
    function tdclass(e) {
        if(!click){
            for(var i = 0 ; i<=len.length-1 ; i++){
                arr[i].style.background="#F4F4F4";
                arr[i].style.color="#F27F22";
            }
            e.target.style.background="#F27F22";
            e.target.style.color="#F4F4F4";
            click++;
            cl =arr.indexOf(e.target); 
            var value = document.querySelector("#mm-sp").innerText;
            var mmtext = Number(arrmm.indexOf(value));//月
            mmtext += 1;
            datevalue1 = document.querySelector("#yy-sp").innerText + "-" + mmtext + "-" + e.target.innerText;
        }else{
            if(cl<arr.indexOf(e.target)){
                for (var l = cl;l<arr.indexOf(e.target)+1;l++){
                    arr[l].style.background="#F27F22";
                    arr[l].style.color="#F4F4F4";
                }
            }else{
                for (var l = cl;l>arr.indexOf(e.target)-1;l--){
                    arr[l].style.background="#F27F22";
                    arr[l].style.color="#F4F4F4";
                }
            }
            var value = document.querySelector("#mm-sp").innerText;
            var mmtext = Number(arrmm.indexOf(value));//月
            mmtext += 1;
            
            var datevalue = document.querySelector("#yy-sp").innerText + "-" + mmtext + "-" + e.target.innerText;
            document.querySelector("#date-label").innerHTML =datevalue1+" ~ "+datevalue;
            $('#date-text').removeClass('expanded');
            document.querySelector("#date").value =datevalue1+datevalue;

            //回傳時間
            document.querySelector("#pdStart").value =datevalue1.replace(/-/g,"/");
            document.querySelector("#pdEnd").value =datevalue.replace(/-/g,"/");
            document.querySelector("#cuStart").value =datevalue1.replace(/-/g,"/");
            document.querySelector("#cuEnd").value =datevalue.replace(/-/g,"/");
      

            //將天數丟進php session
            const oneDay = 24*60*60*1000; // hours*minutes*seconds*milliseconds
            let firstDate = new Date(datevalue1);
            let secondDate = new Date(datevalue);
            let diffDays = Math.round(Math.abs((firstDate.getTime() - secondDate.getTime())/(oneDay)-1));
            O('cuDay').value = diffDays;


            //AJax撈嚮導資料
            if(document.querySelector("#date-label").innerText != "請選擇日期"){
                var xhr = new XMLHttpRequest();
                xhr.onload=function (){
                    if( xhr.status == 200 ){
                        let cuGuideListMask = document.querySelector('.cuGuide__mask--ctrl');
                        cuGuideListMask.innerHTML = xhr.responseText;
                        var cu__guideItem = document.getElementsByClassName('cu__guideItem');
                        for(var l=0;l<cu__guideItem.length;l++){
                            cu__guideItem[l].addEventListener('click',cuShowGuide);
                        }
                    }else{
                        alert( xhr.status );
                    }
                }
                var url = "cu_getGuide.php?cuStart=" + O('cuStart').value+"&cuEnd="+O('cuEnd').value;
                xhr.open("Get", url, true);
                xhr.send( null );
            }
            click=false;
        }
    }
    load();
})

window.addEventListener('load',init);
