if($(window).width() < 992){	
    console.log("555");
} else {
	console.log("大");
	var sceneFront = document.getElementById('banner_back');
	var sceneBack = document.getElementById('banner_front');
	window.addEventListener('scroll',()=>{
    var scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
	sceneFront.style.top = 0-(scrollTop*0.2) + "px";//banner 背面
	sceneBack.style.top = 0-(scrollTop*0.5) + "px";//banner 正面

	var pic_g = document.getElementById('pic_g');
	var pic_n = document.getElementById('pic_n');
	var pic_k = document.getElementById('pic_k');
	var pic_t = document.getElementById('pic_t');

	var c_1 = document.getElementById('c_1');
	var c_2 = document.getElementById('c_2');
	var c_3 = document.getElementById('c_3');
	var c_4 = document.getElementById('c_4');



});
};

// window.addEventListener('load',()=>{
// 	var scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
// 	sceneFront.style.top = 0-(scrollTop*0.2) + "px";//banner 背面
// 	sceneBack.style.top = 0-(scrollTop*0.5) + "px";//banner 正面

// });