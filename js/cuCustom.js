var storage = sessionStorage;
function doFirst(){
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
}
// alert();
function addItem(itemId,itemValue){	
    //風景列表物件代號
    var cu_IDNum = itemValue.split('|')[3];
    var cu_ID =O(cu_IDNum);
    //新增風景最大容器
    var cuCustom__dropSceneryNew = document.createElement('div');
    //加A是為了與上片的cu_ID做區別
    // cuCustom__dropSceneryNew.id=cu_IDNum+"A";
    cuCustom__dropSceneryNew.classList.add("cuCustom__dropScenery");
    cuCustom__dropSceneryNew.style.backgroundImage = ' url(../img/'+itemValue.split('|')[1]+')';

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
    
    var cu_mIconClear = document.createElement('i');
    cu_mIconClear.classList.add('material-icons');
    cu_mIconClear.innerText = 'clear'; 
    
    
    
	//先判斷此處是否已有物件，如果有就先刪除
	if(cuCustom__dropSceneryNew.hasChildNodes()){
        	while(cuCustom__dropSceneryNew.childNodes.length >= 1){
            		cuCustom__dropSceneryNew.removeChild(cuCustom__dropSceneryNew.firstChild)
            	}
            }	
            
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

    var cuCustom__sceneryZoneOF = O('cuCustom__sceneryZone--OF');
    cuCustom__sceneryZoneOF.removeChild(cu_ID);

    var btn_cuDelete= cuCustom__dropSceneryNew.appendChild(btn_cuIconClear);
    btn_cuDelete.addEventListener('click',function(){
        cuCustom__dropMask.removeChild(cuCustom__dropSceneryNew);
        cuCustom__sceneryZoneOF.insertBefore(cu_ID,cuCustom__sceneryZoneOF.childNodes[0]);
        //刪除時，扣除金額
        cuAmount -= itemPrice;
        storage.removeItem(itemId);
        // // 計算購買數量和小計
        var itemString = storage.getItem('addItemList');

        var items = itemString.substr(0,itemString.length-2).split(', ');
        for(var j=0;j<=items.length;j++){ 
            console.log(items[j]);   
            if(items[j] == itemId){
                items.splice(j,1);
                storage.setItem('addItemList', items);
            }
        };
        document.getElementById('cuAmount').innerText = cuAmount;
    })
	//存入storage
	if(storage[itemId]){
        // alert('You have checked.');
	}else{
        storage['addItemList'] += itemId + ', ';
		storage[itemId] = itemValue;
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

	document.getElementById('cuQuan').innerText = items.length;
    document.getElementById('cuAmount').innerText = cuAmount;
}
window.addEventListener('load', doFirst);