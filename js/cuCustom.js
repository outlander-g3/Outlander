var storage = sessionStorage;
function doFirst(){
	if(storage['addItemList'] == null){
		storage['addItemList'] = '';	 //storage.setItem('addItemList','');
	}

	//幫每個Add Cart建事件聆聽功能
	var list = document.querySelectorAll('.btn_cuAddScenery');  //list是陣列
	for(var i=0; i<list.length; i++){
		list[i].addEventListener('click', function(){
			var teddyInfo = document.querySelector('#'+this.id+' input').value;
			addItem(this.id,teddyInfo);
		});
	}	
}
function addItem(itemId,itemValue){
	// alert(itemId + ' : ' + itemValue);
	var image = document.createElement('img');
	image.src = 'imgs/'+itemValue.split('|')[1];

	var title = document.createElement('span');
	title.innerText = itemValue.split('|')[0];

	var price = document.createElement('span');
	price.innerText = itemValue.split('|')[2];

	var newItem = document.getElementById('newItem');

	//先判斷此處是否已有物件，如果有就先刪除
	if(newItem.hasChildNodes()){
		while(newItem.childNodes.length >= 1){
			newItem.removeChild(newItem.firstChild)
		}
	}	

	//再顯示新物件
	newItem.appendChild(image);
	newItem.appendChild(title);
	newItem.appendChild(price);

	//存入storage
	if(storage[itemId]){
		alert('You have checked.');
	}else{
		storage['addItemList'] += itemId + ', ';
		storage[itemId] = itemValue;
	}

	// 計算購買數量和小計
	var itemString = storage.getItem('addItemList');
	var items = itemString.substr(0,itemString.length-2).split(', ');
	// items是陣列 
	// console.log(items);		 ["A1001", "A1005", "A1006", "A1002"]

	subtotal = 0;
	for(var key in items){		//use items[key]
		var itemInfo = storage.getItem(items[key]);
		var itemPrice = parseInt(itemInfo.split('|')[2]);

		subtotal += itemPrice;
	}

	document.getElementById('itemCount').innerText = items.length;
	document.getElementById('subtotal').innerText = subtotal;
}
window.addEventListener('load', doFirst);