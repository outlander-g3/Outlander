window.addEventListener("load", () => {
	if ($(window).width() > 992) {
		
		// echo("小"); 
		var sceneFront = document.getElementById('banner_back');
		var sceneBack = document.getElementById('banner_front');

		//四張主圖
		var pic_g = document.getElementById('pic_g');
		var pic_n = document.getElementById('pic_n');
		var pic_k = document.getElementById('pic_k');
		var pic_t = document.getElementById('pic_t');

		//雲
		// var c_1 = document.getElementById('c_1');
		// var c_2 = document.getElementById('c_2');
		// var c_3 = document.getElementById('c_3');
		// var c_4 = document.getElementById('c_4');

		//內容
		var cont_a = document.getElementById('cont_a');//高草
		var cont_b = document.getElementById('cont_b');//針葉林
		var cont_c = document.getElementById('cont_c');//涼溫
		var cont_d = document.getElementById('cont_d');//闊葉

		//改內容css
		cont_a.style.cssText = "position:absolute;top:40" + "vh;" + "left:5" + "%";
		cont_b.style.cssText = "position:absolute;top:160" + "vh;" + "right:5" + "%";
		cont_c.style.cssText = "position:absolute;top:260" + "vh;" + "left:5" + "%";
		cont_d.style.cssText = "position:absolute;top:350" + "vh;" + "right:5" + "%";

		//改四張雲css
		// c_1.style.cssText = "position:absolute;top:80" + "vh";
		// c_2.style.cssText = "position:absolute;top:100" + "vh";
		// c_3.style.cssText = "position:absolute;top:90" + "vh";
		// c_4.style.cssText = "position:absolute;top:100" + "vh";


		var scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
		var originTop_G = 700;
		var originTop_N = 1300;
		var originTop_T = 2000;
		var originTop_W = 2500;
		pic_g.style.cssText = "position:absolute;top:" + parseInt(originTop_G + (0 - (scrollTop * 0.2))) + "px;" + "right:10px";//草原
		pic_n.style.cssText = "position:absolute;top:" + parseInt(originTop_N + (0 - (scrollTop * 0.3))) + "px;" + "left:10px";//針葉林
		pic_k.style.cssText = "position:absolute;top:" + parseInt(originTop_T + (0 - (scrollTop * 0.5))) + "px;" + "right:10px";//檜木林
		pic_t.style.cssText = "position:absolute;top:" + parseInt(originTop_W + (0 - (scrollTop * 0.2))) + "px;" + "leftt:10px";//闊葉林

			var scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
		window.addEventListener('scroll', () => {
			var scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
			sceneFront.style.top = 0 - (scrollTop * 0.2) + "px";//banner 背面
			sceneBack.style.top = 0 - (scrollTop * 0.5) + "px";//banner 正面

			var originTop_G = 700;
			var originTop_N = 1500;
			var originTop_T = 2500;
			var originTop_W = 2800;

			//4張主圖
			pic_g.style.cssText = "position:absolute;top:" + parseInt(originTop_G + (0 - (scrollTop * 0.2))) + "px;" + "right:10px";//草原
			pic_n.style.cssText = "position:absolute;top:" + parseInt(originTop_N + (0 - (scrollTop * 0.3))) + "px;" + "left:10px";//針葉林
			pic_k.style.cssText = "position:absolute;top:" + parseInt(originTop_T + (0 - (scrollTop * 0.5))) + "px;" + "right:10px";//檜木林
			pic_t.style.cssText = "position:absolute;top:" + parseInt(originTop_W + (0 - (scrollTop * 0.2))) + "px;" + "leftt:10px";//闊葉林

		});
	}else{

	}
	window.addEventListener("resize", () => {
		// console.log("hhhh");
		if ($(window).width() > 992) {
			// console.log("大");
			var sceneFront = document.getElementById('banner_back');
			var sceneBack = document.getElementById('banner_front');

			//四張主圖
			var pic_g = document.getElementById('pic_g');
			var pic_n = document.getElementById('pic_n');
			var pic_k = document.getElementById('pic_k');
			var pic_t = document.getElementById('pic_t');

			//雲
			// var c_1 = document.getElementById('c_1');
			// var c_2 = document.getElementById('c_2');
			// var c_3 = document.getElementById('c_3');
			// var c_4 = document.getElementById('c_4');

			//內容
			var cont_a = document.getElementById('cont_a');//高草
			var cont_b = document.getElementById('cont_b');//針葉林
			var cont_c = document.getElementById('cont_c');//涼溫
			var cont_d = document.getElementById('cont_d');//闊葉

			//改內容css
			cont_a.style.cssText = "position:absolute;top:80" + "vh;" + "left:5" + "%";
			cont_b.style.cssText = "position:absolute;top:200" + "vh;" + "right:5" + "%";
			cont_c.style.cssText = "position:absolute;top:300" + "vh;" + "left:5" + "%";
			cont_d.style.cssText = "position:absolute;top:400" + "vh;" + "right:5" + "%";

			//改四張雲css
			// c_1.style.cssText = "position:absolute;top:50" + "vh";
			// c_2.style.cssText = "position:absolute;top:80" + "vh";
			// c_3.style.cssText = "position:absolute;top:90" + "vh";
			// c_4.style.cssText = "position:absolute;top:1500" + "vh";


			window.addEventListener('scroll', () => {
				var scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
				sceneFront.style.top = 0 - (scrollTop * 0.2) + "px";//banner 背面
				sceneBack.style.top = 0 - (scrollTop * 0.5) + "px";//banner 正面

				var originTop_G = 700;
				var originTop_N = 1500;
				var originTop_T = 2500;
				var originTop_W = 2800;


				//4張主圖
				pic_g.style.cssText = "position:absolute;top:" + parseInt(originTop_G + (0 - (scrollTop * 0.2))) + "px;" + "right:10px";//草原
				pic_n.style.cssText = "position:absolute;top:" + parseInt(originTop_N + (0 - (scrollTop * 0.3))) + "px;" + "left:10px";//針葉林
				pic_k.style.cssText = "position:absolute;top:" + parseInt(originTop_T + (0 - (scrollTop * 0.5))) + "px;" + "right:10px";//檜木林
				pic_t.style.cssText = "position:absolute;top:" + parseInt(originTop_W + (0 - (scrollTop * 0.2))) + "px;" + "leftt:10px";//闊葉林

			});
		};

	})


})




// window.addEventListener('load',()=>{
// 	var scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
// 	sceneFront.style.top = 0-(scrollTop*0.2) + "px";//banner 背面
// 	sceneBack.style.top = 0-(scrollTop*0.5) + "px";//banner 正面

// });