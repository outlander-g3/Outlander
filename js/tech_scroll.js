window.addEventListener("load", () => {
	originTop_G = 250;
	originTop_N = 420;
	originTop_T = 200;
	originTop_W = 550;
	if ($(window).width() > 992) {
		
		var sceneBack = document.getElementById('banner_front');
		//四張主圖
		var pic_g = document.getElementById('pic_g');
		var pic_n = document.getElementById('pic_n');
		var pic_k = document.getElementById('pic_k');
		var pic_t = document.getElementById('pic_t');

		


		var scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
		pic_g.style.cssText = "position:absolute;top:" + parseInt(originTop_G + (0 - (scrollTop * 0.2))) + "px;";//草原
		pic_n.style.cssText = "position:absolute;top:" + parseInt(originTop_N + (0 - (scrollTop * 0.2))) + "px;";//針葉林
		pic_k.style.cssText = "position:absolute;top:" + parseInt(originTop_T + (0 - (scrollTop * 0.1))) + "px;";//檜木林
		pic_t.style.cssText = "position:absolute;top:" + parseInt(originTop_W + (0 - (scrollTop * 0.2))) + "px;";//闊葉林

		var scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
		window.addEventListener('scroll', () => {
			var scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
		
			sceneBack.style.top = 0 - (scrollTop * 0.5) + "px";//banner 正面


			//4張主圖
			pic_g.style.cssText = "position:absolute;top:" + parseInt(originTop_G + (0 - (scrollTop * 0.2))) + "px;";//草原
			pic_n.style.cssText = "position:absolute;top:" + parseInt(originTop_N + (0 - (scrollTop * 0.2))) + "px;";//針葉林
			pic_k.style.cssText = "position:absolute;top:" + parseInt(originTop_T + (0 - (scrollTop * 0.1))) + "px;";//檜木林
			pic_t.style.cssText = "position:absolute;top:" + parseInt(originTop_W + (0 - (scrollTop * 0.2))) + "px;";//闊葉林

		});
	}else{

	}
	window.addEventListener("resize", () => {
	
		if ($(window).width() > 992) {
		
			var sceneBack = document.getElementById('banner_front');

			//四張主圖
			var pic_g = document.getElementById('pic_g');
			var pic_n = document.getElementById('pic_n');
			var pic_k = document.getElementById('pic_k');
			var pic_t = document.getElementById('pic_t');

			window.addEventListener('scroll', () => {
				var scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
			
				sceneBack.style.top = 0 - (scrollTop * 0.5) + "px";//banner 正面
				//4張主圖
				pic_g.style.cssText = "position:absolute;top:" + parseInt(originTop_G + (0 - (scrollTop * 0.2))) + "px;";//草原
				pic_n.style.cssText = "position:absolute;top:" + parseInt(originTop_N + (0 - (scrollTop * 0.2))) + "px;";//針葉林
				pic_k.style.cssText = "position:absolute;top:" + parseInt(originTop_T + (0 - (scrollTop * 0.1))) + "px;";//檜木林
				pic_t.style.cssText = "position:absolute;top:" + parseInt(originTop_W + (0 - (scrollTop * 0.2))) + "px;";//闊葉林

			});
		};

	})


})