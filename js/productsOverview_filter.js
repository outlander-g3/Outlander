/////日期
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
    function tdclass(e) {
            for(var i = 0 ; i<=len.length-1 ; i++){
                arr[i].style.background="#F4F4F4";
            }
            e.target.style.background="#F99D19";
            var value = document.querySelector("#mm-sp").innerText;
            var mmtext = Number(arrmm.indexOf(value));//月
            mmtext += 1;
            datevalue = document.querySelector("#yy-sp").innerText + "-" + mmtext + "-" + e.target.innerText;
            document.querySelector("#date-label").innerHTML = datevalue;
            $('#date-text').removeClass('expanded');
            document.querySelector("#date").value = datevalue;
            
    
            //////////////抓出點選的日期用ajax撈資料
            dateInfo = document.getElementById('dateInfo');
            dateInfo.value=datevalue;
            // console.log("111",dateInfo.value);
            if(datevalue!="請選擇日期"){
                getDate();
            }
            function getDate(){
                    var xhr = new XMLHttpRequest();
                    xhr.addEventListener('load',(e)=>{
                    if( xhr.status == 200 ){
                    document.getElementById('mtmtmt').style.display="none";
                    document.getElementById('textChange').innerText="篩選結果"; 
                    document.getElementById('textChange-hot').innerText="相關行程";                      
                    document.getElementById('mtmtmtS').innerHTML = xhr.responseText;
                    for (var i = 0;i<document.getElementsByClassName('pro-item-pic').length;i++){
                    document.getElementsByClassName('pro-item-pic')[i].classList.remove('pro-item-pic-hot');//拿掉熱門標籤
                }
            }else{
                alert( xhr.status );
           }
      });
        contTypeObj = document.querySelector('input[name="contType"]:checked+label').previousElementSibling;
        // console.log("....", contTypeObj.value);
        levelTypeObj = document.querySelector('input[name="levelType"]:checked+label').previousElementSibling;
        // console.log("------", levelTypeObj.value);
        budgetTypeObj = document.querySelector('input[name="budgetType"]:checked+label').previousElementSibling;
        // console.log("=====", budgetTypeObj.value); 
    //   var url = "getSelected.php?dateInfo="+dateInfo.value;
      var url = "productsOverview_getSelected.php?dateInfo="+dateInfo.value+"&continent="+contTypeObj.value+"&levelType="+levelTypeObj.value+"&budgetType="+budgetTypeObj.value;
      console.log("點日期:",url);
      xhr.open("Get", url, true);
      xhr.send( null );
                
    }
    
        }
    load();
    })
    
    
    
    //抓洲、難易度、預算篩選資料
    clickCont = document.querySelectorAll('input[name="contType"]+label');
    clickLevel = document.querySelectorAll('input[name="levelType"]+label');
    clickBudget = document.querySelectorAll('input[name="budgetType"]+label');
    
    for(let i=0;i<clickCont.length;i++){
      clickCont[i].addEventListener('click',getFilter);
    }
    for(let i=0;i<clickLevel.length;i++){
      clickLevel[i].addEventListener('click',getFilter);
    }
    for(let i=0;i<clickBudget.length;i++){
      clickBudget[i].addEventListener('click',getFilter);
    }
    
        
    function getFilter(e){
        contTypeObj = document.querySelector('input[name="contType"]:checked+label').previousElementSibling;
        levelTypeObj = document.querySelector('input[name="levelType"]:checked+label').previousElementSibling;
        budgetTypeObj = document.querySelector('input[name="budgetType"]:checked+label').previousElementSibling;
       
    
        if(e.target.previousElementSibling.name == 'contType'){
            contTypeObj = e.target.previousElementSibling;
            if(contTypeObj.value!='choose'){
                getselected();
            }
        }
        if(e.target.previousElementSibling.name == 'levelType'){
            levelTypeObj = e.target.previousElementSibling;
            if(levelTypeObj.value!='choose'){
                getselected();
            }
        }
        if(e.target.previousElementSibling.name == 'budgetType'){
            budgetTypeObj = e.target.previousElementSibling;
            if(budgetTypeObj.value!='choose'){
                getselected();
            }
        }
    
        function getselected(){
            var xhr = new XMLHttpRequest();
      xhr.addEventListener('load',(e)=>{
        if( xhr.status == 200 ){
            document.getElementById('mtmtmt').style.display="none";
            document.getElementById('textChange').innerText="篩選結果";  
            document.getElementById('textChange-hot').innerText="相關行程";                
            document.getElementById('mtmtmtS').innerHTML = xhr.responseText;
            for (var i = 0;i<document.getElementsByClassName('pro-item-pic').length;i++){
            document.getElementsByClassName('pro-item-pic')[i].classList.remove('pro-item-pic-hot');//拿掉熱門標籤
          }
           }else{
              alert( xhr.status );
           }
      }); 
      url = "productsOverview_getSelected.php?dateInfo="+dateInfo.value+"&continent="+contTypeObj.value+"&levelType="+levelTypeObj.value+"&budgetType="+budgetTypeObj.value;
      xhr.open("Get", url, true);
      xhr.send( null );
        }
      
    }
    
    
    