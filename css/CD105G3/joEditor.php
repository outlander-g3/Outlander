<?php
    session_start();
    // include_once('connectDb.php'); //連線
		// include_once('session.php'); //判斷會員是否登入
		$_SESSION["addlog"] = 1 ;  
		// echo $_SESSION["addlog"];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>山行者 - PHP模板</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="css/robot.css"> -->
    <script src="//cdn.quilljs.com/1.0.0/quill.js"></script>
	<script src="//cdn.quilljs.com/1.0.0/quill.min.js"></script>
	<link href="//cdn.quilljs.com/1.0.0/quill.snow.css" rel="stylesheet">
	<link href="//cdn.quilljs.com/1.0.0/quill.bubble.css" rel="stylesheet">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/vue.min.js"></script>
    <!-- <script src="js/enquire.min.js"></script> -->
    <!-- css塞這 自己js塞屁股 -->
    <link rel="stylesheet" href="css/joEditor.css">
    
</head>
<body>

<!-- 插入header -->
    <?php
		include_once('header.php');
		



	if(isset($_REQUEST["penbtn"])==true){
		
	$jnNo = $_REQUEST["penbtn"];
	echo $jnNo;
		require_once("connectDb.php");
        $sql = "select * from `journal` a  LEFT JOIN `productkind` b ON b.pdkNo = a.pdkNo where `jnNo` =:jnNo ";
        $te = $pdo -> prepare($sql);
        $te -> bindValue(":jnNo",$jnNo);
		$te -> execute();
		

        $tt = $te -> fetchAll(PDO::FETCH_ASSOC);
        foreach($tt as $i => $bb){
			// echo "目前撈出來的文章=>".$bb["jnCont"];
			$mt = $bb["pdkNo"];
			$jnTitle = $bb["jnTitle"];
            $jnCont = $bb["jnCont"];
			$jnStart = $bb["jnStart"];
            $jnEnd = $bb["jnEnd"];
		}
		
	}
	if(isset($_REQUEST["addlog"])){
		$mt="-1";
		$jnTitle = "";
		$jnCont = "";
		$jnStart ="行程出發日期";
		$jnEnd = "行程結束日期";
		$jnNo="-1";
	}
    ?>

<!-- ===========================各分頁內容開始======================= -->
<form action="member.php" enctype="multipart/form-data" method="post">
		
			<section id="edit">
			<input type="text" class="juNo" name="jnNo" value="<?php echo $jnNo ?>">
				<h3>編輯日誌</h3>
				<!-- <form action="/somewhere/to/upload" > -->
				<label id="img-file" form="header-img">
					<img src="img/jn/<?php echo $jnNo?>/1.jpg" alt="user" id="user-img" onerror="this.style.display='none'">
					<input type="file" id="header-img" name="header">
					<div id="file-icon">
						<i class="material-icons">insert_photo</i>
					</div>
				</label>
				
				<ul id="day">
					<li><span>日誌標題:</span><input type="text" id="name" name="textheader" maxlength="10" value="<?php echo $jnTitle ?>"> </li>


					<li>
						<span>登山地點:</span>
						<div id="day-input">
							<span class="joForm__input">
								<input type="radio" name="mountType" value="choose" checked="checked" id="mount-choose">
								<label for="mount-choose">請選擇地點</label>

								<input type="radio" name="mountType" value="3" id="mount-fuji">
								<label for="mount-fuji">富士山</label>

								<input type="radio" name="mountType" value="2" id="mount-himalayas">
								<label for="mount-himalayas">珠穆朗瑪峰</label>

								<input type="radio" name="mountType" value="5" id="mount-paine">
								<label for="mount-paine">百內國家公園</label>

								<input type="radio" name="mountType" value="1" id="mount-jade">
								<label for="mount-jade">玉山</label>

								<input type="radio" name="mountType" value="8" id="mount-alps">
								<label for="mount-alps">阿爾卑斯山-少女峰</label>

								<input type="radio" name="mountType" value="7" id="mount-machu">
								<label for="mount-machu">馬丘比丘</label>

								<input type="radio" name="mountType" value="9" id="mount-cruz">
								<label for="mount-cruz">瓦斯卡蘭國家公園</label>

								<input type="radio" name="mountType" value="6" id="mount-kilimanjaro">
								<label for="mount-kilimanjaro">吉力馬札羅山</label>

								<input type="radio" name="mountType" value="10" id="mount-yosemite">
								<label for="mount-yosemite">優勝美地國家公園</label>

								<input type="radio" name="mountType" value="4" id="mount-aspalin">
								<label for="mount-aspalin">阿斯帕林國家公園</label>

								<input type="radio" name="mountType" value="Others" id="mount-others">
								<label for="mount-others">其他</label>
							</span>
						</div>
					</li>

					<li> <span>出發日期:</span>
						<input id="date" type="text" value="" name="date">
						<div class="day-input-2">
							<span class="msEquipment__input" id="date-text">
								<label id="date-label-1"><?php echo $jnStart ?></label>
								<table class="calendar">
									<tbody>
										<tr>
											<td class="mm" colspan="2"><span id="mm-sp">月份</span> <i id="left-1"
													class="material-icons">keyboard_arrow_left</i></td>
											<td class="yy" colspan="2"><span id="yy-sp">年份</span><i id="right-1"
													class="material-icons">keyboard_arrow_right</i></td>
										</tr>
										<tr>
											<th>Sun</th>
											<th>Mon</th>
											<th>Tue</th>
											<th>Wed</th>
											<th>Thu</th>
											<th>Fri</th>
											<th>Sat</th>
										</tr>
									</tbody>
									<tbody id="calendar-tb">


									</tbody>
								</table>

							</span>
						</div>
					</li>
					<li id="li-4"> <span>結束日期:</span><input id="date_1" type="text" value="" name="date-1">
						<div class="day-input-2">
							<span class="msEquipment__input" id="date-text-2">
								<label id="date-label-2"><?php echo $jnEnd ?></label>
								<table class="calendar">
									<tbody>
										<tr>
											<td class="mm" colspan="2"><span id="mm-sp-1"> 月份</span> <i id="left-2"
													class="material-icons">keyboard_arrow_left</i></td>
											<td class="yy" colspan="2"><span id="yy-sp-1">年份</span><i id="right-2"
													class="material-icons">keyboard_arrow_right</i></td>
										</tr>
										<tr>
											<th>Sun</th>
											<th>Mon</th>
											<th>Tue</th>
											<th>Wed</th>
											<th>Thu</th>
											<th>Fri</th>
											<th>Sat</th>
										</tr>
									</tbody>
									<tbody id="calendar-tb-1">
									</tbody>

								</table>
							</span>
						</div>
					</li>
				</ul>
			</section>
			<div id="editor">
				<?php echo $jnCont ?>
			</div>
			<div id="btn-all">
				<textarea name="text" id="text" cols="30" rows="10"></textarea>
				<span id="btn-out">取消</span>
				<button id="btn-set" name="set" value="0">存為草稿</button>
				<button id="btn-new" name="new" value="1">發佈</button>
			</div>
		</form>





	<!-- 跳窗 -->

	<!-- <div class="jump-window" id="jump-window">
		<div class="ma-j">
			<div class="ju-w">
				<div class="h3-bg"></div>
				<h3>取消編輯中的日誌</h3>
				<p>確定要取消編輯中的日誌？</p>
				<div class="game-jw-btn">
					<button id="jw-game1-clear1">取消</button>
					<a href="member.php" id="jw-game1-go1">確定</a>
				</div>
			</div>
		</div>
	</div> -->


	<!-- 刪除日誌--跳窗 -->
    <div class="jpBase " id="jump-window">
        <div class="jpWin" id="jpWin-deleteJn">
            <div class="jpTitle">
			取消編輯中的日誌
            </div>
            <div class="jpCont">
                <p>
					確定要取消編輯中的日誌？
                </p>
            </div>
            <div class="jpBtn">
                <div class="row">
                    <button class="btn-jump-left" id="jw-game1-clear1">取消</button>
                    <a href="member.php" id="jw-game1-go1"><button class="btn-jump-right" id="jnDelete">確定</button></a>
                </div>
            </div>
        </div>
    </div>



<script>
// var btnnew = document.getElementById("btn-new");
// var btnset = document.getElementById("btn-set");
// $("#btn-new").click(()=>{
// 	btnnew.value=1;
// })
// $("#btn-set").click(()=>{
// 	btnset.value=1;
// })


</script>



	<script>
					// onError
					// user-img
				var drag = document.getElementById("header-img");
					window.addEventListener("load",()=>{
						
				var img = document.getElementById("user-img");
				var dragstyle = getComputedStyle(img);
				console.log(dragstyle.getPropertyValue("display"));
					// console.log($("#user-img").attr("display"));
					if(dragstyle.getPropertyValue("display")=="none"){
						document.getElementById("file-icon").style.display="flex";
						console.log("123");
					}else if(dragstyle.getPropertyValue("display")!="none"){
						drag.innerHTML = "<img src='1.jpg' alt='user' id='user-img'> <input type='file' id='header-img' name='header'>";
						document.getElementById("file-icon").style.display="none";
					}
					
				})
					$("#header-img").change(function(){
							drag.innerHTML = "<img src='' alt='user' id='user-img'> <input type='file' id='header-img' name='header-img'>";
							
     						readURL(this); 
					});
				
				
					function readURL(input){
						document.getElementById("file-icon").style.display="none";
							if(input.files && input.files[0]){
								
								var reader = new FileReader();
								reader.onload = function (e) {
								$("#user-img").show();
								$("#user-img").attr('src', e.target.result);
								}
								reader.readAsDataURL(input.files[0]);
							}
						}		
				
				
				</script>




	<script>
		var quill = new Quill("#editor", {
			theme: "snow", // 模板
			modules: {
				toolbar: [
					// 工具列列表[註1]
					[{ 'color': [] }],
					[{ 'background': [] }], // 顏色          
					['bold'],
					['italic'],
					['underline'], // 粗體、斜體、底線和刪節線
					[{ 'list': 'ordered' }],
					[{ 'list': 'bullet' }], // 清單
					['image'],
					[{ 'header': [1, 2, 3, 4, 5, 6, false] }],// 標題
					// [{ 'font': [] }], // 字體
					// [{ 'align': [] }], // 文字方向
					// [ 'clean' ] // 清除文字格是
				]
			}
		})
		// document.getElementsByClassName("ql-image")[0].addEventListener("click",()=>{
		// 	$(".ql-image").eq(1).attr("name","textImg");
		// 	console.log($(".ql-image").eq(1).attr("name","textImg"));
		// console.log(document.getElementsByName("textImg")[0].files.length);
		// })
	</script>
	<script>
//日期  
document.querySelector("#date").value="<?php echo $jnStart ?>";
document.querySelector("#date_1").value="<?php echo $jnEnd ?>";
console.log(document.querySelector("#date").value);
console.log(document.querySelector("#date_1").value);




		// 下拉

		var mt = "<?php echo $mt ?>";
			if(mt==1){
				$('#mount-jade').prop('checked', true)
			}
			else if(mt==2){
				$('#mount-himalayas').prop('checked', true)
			}
			else if(mt==3){
				$('#mount-fuji').prop('checked', true)
			}
			else if(mt==4){
				$('#mount-aspalin').prop('checked', true)
			}
			else if(mt==5){
				$('#mount-paine').prop('checked', true)
			}
			else if(mt==6){
				$('#mount-kilimanjaro').prop('checked', true)
			}
			else if(mt==7){
				$('#mount-machu').prop('checked', true)
			}
			else if(mt==8){
				$('#mount-alps').prop('checked', true)
			}
			else if(mt==9){
				$('#mount-cruz').prop('checked', true)
			}
			else if(mt==10){
				$('#mount-yosemite').prop('checked', true)
			}
			else if(mt==0){
				$('#mount-others').prop('checked', true)
			}else{
				$('#mount-choose').prop('checked', true)
			}
// console.log(mt);
		$('.joForm__input').click(function (e) {
			e.preventDefault();
			e.stopPropagation();
			$(this).toggleClass('expanded');
			$('#date-text').removeClass('expanded');
			$('#date-text-2').removeClass('expanded');
			$('#' + $(e.target).attr('for')).prop('checked', true);
		});
		$(document).click(function () {
			$('.joForm__input').removeClass('expanded');
		});








		//按鈕

		document.querySelector("#btn-set").addEventListener("click", (e) => {
			// console.log(document.querySelector(".ql-editor").innerHTML);
		// console.log($("#editor img").length);
		// var aa= 0;
		// console.log($("#editor img").eq(aa).attr("src"));
		// console.log($("#editor img").eq(aa).attr("src",(aa+2)+".jpg"));
		// console.log($("#editor img").eq(aa).attr("src"));
		
			document.querySelector("#text").value = document.querySelector(".ql-editor").innerHTML;
		})
		document.querySelector("#btn-new").addEventListener("click", () => {
			// console.log(document.querySelector(".ql-editor").innerHTML);
			document.querySelector("#text").value = document.querySelector(".ql-editor").innerHTML;
		})

		//測試改SRC











		window.addEventListener("load", (e) => {
			$('#date-text').click(function (e) {
				e.preventDefault();
				e.stopPropagation();
				$(this).toggleClass('expanded');
				$('#date-text-2').removeClass('expanded');
				$('.joForm__input').removeClass('expanded');
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
				// console.log(e.target);
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
			var dayall = new Date(yy, (mm+1), 0).getDate();//總天數
			var bd = new Date(yy + "/" + (mm + 1) + "/1").getDay();//因為回傳月份是0-11 所以要+1  抓星期他只有1-12月
			var dayfunction = () => {
				for (var i = 1; i < 7; i++) {
					var text = "";
					if (i == 1) {
						if (i - bd < 1) {
							for (var p = 0; p < bd; p++) {
								text += "<td class='tdclass'></td>";
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
				// console.log(num,dayall);
				document.querySelector("#calendar-tb").innerHTML = "";
				if (num - 1 < 0) {
					num = 12;
					yy--;
				}
				bd = new Date(yy + "/" + num + "/1").getDay();
				dayfunction(bd, dayall);
				// console.log(arrmm.indexOf( document.querySelector("#mm-sp").innerText));
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
			function load() {
				len = document.getElementsByClassName("tdclass");
				var ss;
				for (var k = 0; k <= len.length - 1; k++) {
					ss = document.getElementsByClassName("tdclass")[k];
					ss.addEventListener("click", tdclass);
				}
			}

			function tdclass(e) {
				var value = document.querySelector("#mm-sp").innerText;
				var mmtext = Number(arrmm.indexOf(value));//月
				mmtext += 1;
				if(mmtext<10){
					var mmtext1 = "0"+mmtext;
				}else {
					var	mmtext1 =mmtext;
				}
				if(e.target.innerText<10){
					var mmtext2 = "0"+e.target.innerText;
				}else{
					var mmtext2 = e.target.innerText;
				}
				var datevalue = document.querySelector("#yy-sp").innerText + "-" + mmtext1 + "-" + mmtext2;

				document.querySelector("#date-label-1").innerHTML = datevalue;
				$('#date-text').removeClass('expanded');
				document.querySelector("#date").value = datevalue;
				// console.log(document.querySelector("#date").value);//確認送表單的value正確
			}
			load();
		
		})




		//第2個月曆



		window.addEventListener("load", () => {
			$('#date-text-2').click(function (e) {
				e.preventDefault();
				e.stopPropagation();
				$(this).toggleClass('expanded');
				$('.joForm__input').removeClass('expanded');
				$('#date-text').removeClass('expanded');
				$('#' + $(e.target).attr('for')).prop('checked', true);
			});
			$(document).click(function () {
				$('#date-text-2').removeClass('expanded');
			});
			$(".calendar").click((e) => {
				e.preventDefault();
				e.stopPropagation();
				$(this).toggleClass('expanded');
				$('#' + $(e.target).attr('for')).prop('checked', true);
				// console.log(e.target);
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
			document.querySelector("#mm-sp-1").innerText = arrmm[mm];
			document.querySelector("#yy-sp-1").innerText = yy;
			var dayall = new Date(yy, mm+1, 0).getDate();//總天數
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
							text += "<td class='tdclass-1'>" + o + "</td>";
						}
					}
					else if (i == 2) {
						for (var o = 8 - bd; o <= 14 - bd; o++) {
							text += "<td class='tdclass-1'>" + o + "</td>";
						}
					}
					else if (i == 3) {
						for (var o = 15 - bd; o <= 21 - bd; o++) {
							text += "<td class='tdclass-1'>" + o + "</td>";
						}
					}
					else if (i == 4) {
						for (var o = 22 - bd; o <= 28 - bd; o++) {
							text += "<td class='tdclass-1'>" + o + "</td>";
						}
					}
					else if (i == 5) {
						if (bd > 4 && dayall > 28) {
							for (var o = 29 - bd; o <= 35 - bd; o++) {
								text += "<td class='tdclass-1'>" + o + "</td>";
							}
							var tr = document.createElement("tr");
							document.querySelector("#calendar-tb-1").appendChild(tr).innerHTML = text;
							text = "";
							for (var o = 36 - bd; o <= dayall; o++) {
								text += "<td class='tdclass-1'>" + o + "</td>";
							}
						} else {
							for (var o = 29 - bd; o <= dayall; o++) {
								text += "<td class='tdclass-1'>" + o + "</td>";
							}

						}

					}

					var tr = document.createElement("tr");
					document.querySelector("#calendar-tb-1").appendChild(tr).innerHTML = text;
				}
			}
			dayfunction();
			document.querySelector("#left-2").addEventListener("click", (e) => {
				var num = arrmm.indexOf(document.querySelector("#mm-sp-1").innerText);
				dayall = new Date(yy, num, 0).getDate();//總天數
				// console.log(num,dayall);
				document.querySelector("#calendar-tb-1").innerHTML = "";
				if (num - 1 < 0) {
					num = 12;
					yy--;
				}
				bd = new Date(yy + "/" + num + "/1").getDay();
				dayfunction(bd, dayall);
				// console.log(arrmm.indexOf( document.querySelector("#mm-sp").innerText));
				document.querySelector("#mm-sp-1").innerText = arrmm[num - 1];
				document.querySelector("#yy-sp-1").innerText = yy;
				load();
			})
			document.querySelector("#right-2").addEventListener("click", (e) => {
				var num = arrmm.indexOf(document.querySelector("#mm-sp-1").innerText);
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
				document.querySelector("#calendar-tb-1").innerHTML = "";
				if (num + 1 > 11) {
					num = -1;
					yy++;
				}
				dayfunction(bd, dayall);
				document.querySelector("#mm-sp-1").innerText = arrmm[num + 1];
				document.querySelector("#yy-sp-1").innerText = yy;
				load();
			})

			var len;
			function load() {
				len = document.getElementsByClassName("tdclass-1");
				var ss;
				for (var k = 0; k <= len.length - 1; k++) {
					ss = document.getElementsByClassName("tdclass-1")[k];
					ss.addEventListener("click", tdclass);
				}
			}

			function tdclass(e) {
				var value = document.querySelector("#mm-sp-1").innerText;
				var mmtext = Number(arrmm.indexOf(value));//月
				mmtext += 1;
				if(mmtext<10){
					var mmtext1 = "0"+mmtext;
				}else {
					var	mmtext1 =mmtext;
				}
				if(e.target.innerText<10){
					var mmtext2 = "0"+e.target.innerText;
				}else{
					var mmtext2 = e.target.innerText;
				}
				var datevalue = document.querySelector("#yy-sp-1").innerText + "-" + mmtext1 + "-" +mmtext2;

				document.querySelector("#date-label-2").innerHTML = datevalue;
				$('#date-text-2').removeClass('expanded');
				document.querySelector("#date_1").value = datevalue;
				// console.log(document.querySelector("#date").value);//確認送表單的value正確
			}
			load();
		})






	</script>


	<!-- 按鈕 -->
	<script>
		document.querySelector("#btn-out").addEventListener("click", () => {
			document.querySelector("#jump-window").style.display = "block";
		})
		document.querySelector("#jw-game1-clear1").addEventListener("click", () => {
			document.querySelector("#jump-window").style.display = "none";
		})




	</script>
<!-- ===========================各分頁內容結束======================= -->
<!-- 插入 footer 會員登入跟機器人 -->
<?php
    include_once('footer.php');
    // include_once('robot.php');
    include_once('memLogin.php');
?>
</body>
</html>


<script src="js/common.js"></script>
<script src="js/header.js"></script>
<!-- <script src="js/robot.js"></script> -->