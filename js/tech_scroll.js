var sceneFront = document.getElementsByClassName('banner');
var bg31 = document.getElementById('bg3-1');
var bg32 = document.getElementById('bg3-2');
var bg33 = document.getElementById('bg3-3');
window.addEventListener('scroll',()=>{
	var originTop_G=700;
	var originTop_N=1000;
	var originTop_T=1900;
	var scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
	sceneFront[0].style.top = 0-(scrollTop*0.2) + "px";//banner 背面
	sceneFront[1].style.top = 0-(scrollTop*0.5) + "px";//banner 正面
	// bg3[0].style.top = originTop_G+( 0-(scrollTop*0.8)) + "px";//羊
	// bg3[1].style.top = originTop_N+(0-(scrollTop*0.5)) + "px";//針葉林
	// bg3[2].style.top = originTop_T+(0-(scrollTop*0.7)) + "px";//熱帶林
	// bg3[2].style.top =originTop_T+(0-(scrollTop*0.1))+ "px";//熱帶林
	bg31.style.top = originTop_G+( 0-(scrollTop*0.8)) + "px";//羊
	bg32.style.top = originTop_N+(0-(scrollTop*0.5)) + "px";//針葉林
	bg33.style.top = originTop_T+(0-(scrollTop*0.7)) + "px";//熱帶林
	

});
window.addEventListener('load',()=>{
	var originTop_G=700;
	var originTop_N=1000;
	var originTop_T=1900;
	var scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
	// sceneFront[0].style.top = 0-(scrollTop*0.2) + "px";//banner 背面
	// sceneFront[1].style.top = 0-(scrollTop*0.5) + "px";//banner 正面
	// // bg3[0].style.top = originTop_G+( 0-(scrollTop*0.8)) + "px";//羊
	// // bg3[1].style.top = originTop_N+(0-(scrollTop*0.5)) + "px";//針葉林
	// // bg3[2].style.top = originTop_T+(0-(scrollTop*0.7)) + "px";//熱帶林
	// // bg3[2].style.top =originTop_T+(0-(scrollTop*0.1))+ "px";//熱帶林
	bg31.style.top = originTop_G+( 0-(scrollTop*0.8)) + "px";//羊
	bg32.style.top = originTop_N+(0-(scrollTop*0.5)) + "px";//針葉林
	bg33.style.top = originTop_T+(0-(scrollTop*0.7)) + "px";//熱帶林
	

});