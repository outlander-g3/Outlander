window.addEventListener("load", () => {


    $('.msEquipment__input').click(function (e) {
        e.preventDefault();
        e.stopPropagation();
        $(this).toggleClass('expanded');
        $('#' + $(e.target).attr('for')).prop('checked', true);
    });
    $(document).click(function () {
        $('.msEquipment__input').removeClass('expanded');
    });
    $(".calendar").click((e) => {
        e.preventDefault();
        e.stopPropagation();
        $(this).toggleClass('expanded');
        $('#' + $(e.target).attr('for')).prop('checked', true);
        // console.log(e.target);
    })
    // window.addEventListener("click",(e)=>{
    //     console.log(e.target);
    // })
    // window.onclick=()=>{
    //     // console.log(document.querySelector("#date"));
    //     console.log(document.querySelector("#date").value);
    // }
    // var len = document.getElementsByClassName("tdclass");
    // console.log(len);



    var yy = new Date().getFullYear(); //年
    var mm = new Date().getMonth(); //月份
    // console.log(mm);
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
    document.querySelector("#mm-sp-1").innerText = arrmm[mm];
    document.querySelector("#yy-sp").innerText = yy;
    document.querySelector("#yy-sp-1").innerText = yy;

    var dayall = new Date(yy, mm, 0).getDate();//總天數
    // console.log(dayall);
    // var all = dayall / 7;
    var bd = new Date(yy + "-" + (mm + 1) + "-" + 1).getDay();//因為回傳月份是0-11 所以要+1  抓星期他只有1-12月
    // console.log(bd);
    var text1;
    for (var i = 1; i < 6; i++) {
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
            for (var o = 29 - bd; o <= dayall; o++) {
                text += "<td class='tdclass'>" + o + "</td>";
            }
        }
        var tr = document.createElement("tr");
        document.querySelector("#calendar-tb").appendChild(tr).innerHTML = text;
        // document.querySelector("#calendar-tb-1").appendChild(tr).innerHTML = text; //不知道為啥不能一起插入
    }
    // console.log(text);tdclass-1


    var dayfunction = () => {

        // console.log(bd);
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
                if (bd > 4) {
                    for (var o = 29 - bd; o <= 35 - bd; o++) {
                        text += "<td class='tdclass'>" + o + "</td>";
                    }
                    var tr = document.createElement("tr");
                    document.querySelector("#calendar-tb").appendChild(tr).innerHTML = text;
                    text = "";
                    for (var o = 35 - bd; o <= 36 - bd; o++) {
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


    var click = 0; //點擊次數
    var aa = false;
    document.querySelector("#left-1").addEventListener("click", (e) => {
        if (!aa) {
            mm = new Date().getMonth(); //月份
            aa = true;
        }
        click++;
        if (mm - click < 0) {
            mm = 11;
            click = 0;
            yy--;
        }
        dayall = new Date(yy, mm - click + 1, 0).getDate();//總天數
        // console.log(dayall, yy);
        bd = new Date(yy + "-" + (mm - click + 1) + "-" + 1).getDay();
        document.querySelector("#calendar-tb").innerHTML = "";
        dayfunction(bd, dayall);
        document.querySelector("#mm-sp").innerText = arrmm[mm - click];

        document.querySelector("#yy-sp").innerText = yy;
        load();
    })
    var cc = false;
    document.querySelector("#right-1").addEventListener("click", (e) => {
        if (!cc) {
            mm = new Date().getMonth(); //月份
            cc = true;
        }
        click++;
        if (mm + click > 11) {
            mm = 0;
            click = 0;
            yy++;
        }
        dayall = new Date(yy, mm + click + 1, 0).getDate();//總天數
        bd = new Date(yy + "-" + (mm + click + 1) + "-" + 1).getDay();
        document.querySelector("#calendar-tb").innerHTML = "";
        dayfunction(bd, dayall);
        document.querySelector("#mm-sp").innerText = arrmm[mm + click];
        document.querySelector("#yy-sp").innerText = yy;
        load();
    })




    var len;
    function load() {
        len = document.getElementsByClassName("tdclass");
        // console.log("1");
        var ss;
        for (var k = 0; k <= len.length; k++) {
            ss = document.getElementsByClassName("tdclass")[k];
            ss.addEventListener("click", tdclass);
        }
    }


    // console.log($(".tdclass"));
    function tdclass(e) {
        var value = document.querySelector("#mm-sp").innerText;
        var mmtext = Number(arrmm.indexOf(value));//月
        mmtext += 1;
        // document.querySelector("#yy-sp").innerText;// 年
        // console.log(value);
        //e.target.innerText //這是日期
        var datevalue = document.querySelector("#yy-sp").innerText + "-" + mmtext + "-" + e.target.innerText;
        document.querySelector("#date-label-1").innerHTML = datevalue;
        // console.log(e.target.innerText,arrmm.indexOf(value));
        $('.msEquipment__input').removeClass('expanded');
        document.querySelector("#date").value = datevalue;
        // console.log(datevalue);

    }


    load();
})
window.addEventListener("load", () => {
    var yy = new Date().getFullYear(); //年
    var mm = new Date().getMonth(); //月份
    // console.log(mm);
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
    document.querySelector("#mm-sp-1").innerText = arrmm[mm];
    document.querySelector("#yy-sp").innerText = yy;
    document.querySelector("#yy-sp-1").innerText = yy;
    var bd = new Date(yy + "-" + (mm + 1) + "-" + 1).getDay();//因為回傳月份是0-11 所以要+1  抓星期他只有1-12月
    var dayall = new Date(yy, mm, 0).getDate();//總天數
    for (var i = 1; i < 6; i++) {
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
            for (var o = 29 - bd; o <= dayall; o++) {
                text += "<td class='tdclass-1'>" + o + "</td>";
            }
        }
        var tr = document.createElement("tr");
        document.querySelector("#calendar-tb-1").appendChild(tr).innerHTML = text;
    }
    var dayfunction1 = () => {

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
                if (bd > 4) {
                    for (var o = 29 - bd; o <= 35 - bd; o++) {
                        text += "<td class='tdclass-1'>" + o + "</td>";
                    }
                    var tr = document.createElement("tr");
                    document.querySelector("#calendar-tb-1").appendChild(tr).innerHTML = text;
                    text = "";
                    for (var o = 35 - bd; o <= 36 - bd; o++) {
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


    var click1 = 0;
    var bb = false;
    document.querySelector("#left-2").addEventListener("click", (e) => {
        if (!bb) {
            mm = new Date().getMonth(); //月份
            bb = true;
        }
        click1++;
        if (mm - click1 < 0) {
            mm = 11;
            click1 = 0;
            yy--;
        }
        dayall = new Date(yy, mm - click1 + 1, 0).getDate();//總天數
        bd = new Date(yy + "-" + (mm - click1 + 1) + "-" + 1).getDay();
        document.querySelector("#calendar-tb-1").innerHTML = "";
        dayfunction1(bd, dayall);
        document.querySelector("#mm-sp-1").innerText = arrmm[mm - click1];

        document.querySelector("#yy-sp-1").innerText = yy;
        load2();
    })

    var dd = false;
    var click = 0;
    document.querySelector("#right-2").addEventListener("click", (e) => {
        if (!dd) {
            mm = new Date().getMonth(); //月份
            cc = true;
        }
        click++;
        if (mm + click > 11) {
            mm = 0;
            click = 0;
            yy++;
        }
        dayall = new Date(yy, mm + click + 1, 0).getDate();//總天數
        bd = new Date(yy + "-" + (mm + click + 1) + "-" + 1).getDay();
        document.querySelector("#calendar-tb-1").innerHTML = "";
        dayfunction1(bd, dayall);
        document.querySelector("#mm-sp-1").innerText = arrmm[mm + click];
        document.querySelector("#yy-sp-1").innerText = yy;
        load2();
    })
    function load2() {
        var len1 = document.getElementsByClassName("tdclass-1");
        // console.log("1");
        var ss1;
        for (var k = 0; k <= len1.length; k++) {
            ss1 = document.getElementsByClassName("tdclass-1")[k];
            ss1.addEventListener("click", tdclass1);
        }
    }

    function tdclass1(e) {
        var value = document.querySelector("#mm-sp-1").innerText;
        var mmtext = Number(arrmm.indexOf(value));//月
        mmtext += 1;
        // console.log("123");
        // document.querySelector("#yy-sp").innerText;// 年
        // console.log(value);
        //e.target.innerText //這是日期
        var datevlaue1 = document.querySelector("#yy-sp-1").innerText + "-" + mmtext + "-" + e.target.innerText;
        document.querySelector("#date-label-2").innerHTML = datevlaue1;
        // console.log(e.target.innerText,arrmm.indexOf(value));
        $('.msEquipment__input').removeClass('expanded');
        document.querySelector("#date_1").value = datevlaue1;
        // console.log(document.querySelector("#date_1").value);
    }
    load2();
})