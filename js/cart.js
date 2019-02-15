window.addEventListener('load', function () {
    // 初始寬度
    var winWidth = document.body.clientWidth;
    var currentWin = winWidth;

    var ctProduct = $('.ctProduct');
    var ctProfile = $('.ctProfile');
    var ctPay = $('.ctPay');
    var ctSticky = $('.ctSticky');
    var ctDetail = $('.ctDetail');

    function winW() {
        winWidth = document.body.offsetWidth;
        console.log("1 : ", winWidth);
        //看有沒有被按全螢幕
        if (winWidth > (window.screen.width - 20)) {
            console.log("2 : ", winWidth);
            ctProduct.removeClass('no-active');
            ctProfile.removeClass('no-active');
            ctPay.removeClass('no-active');
            ctSticky.removeClass('no-active');
            $('.date').css({
                'position': 'absolute',
                'left': '0',
                'top': '0',
            });
        }
        if (winWidth + 20 < 768) {
            console.log("3 : ", winWidth);
            ctProduct.removeClass('no-active');
            ctProfile.addClass('no-active');
            ctPay.addClass('no-active');
            ctSticky.addClass('no-active');
            ctDetail.addClass('no-active');
            $('.date').css({
                'position': 'fixed',
                'left': '20px',
                'top': '30%',
            });
        }
        else if (winWidth + 20 > 768) {
            console.log("4 : ", winWidth);
            ctProduct.removeClass('no-active');
            ctProfile.removeClass('no-active');
            ctPay.removeClass('no-active');
            ctSticky.removeClass('no-active');
            ctDetail.removeClass('no-active');

            $('.date').css({
                'position': 'absolute',
                'left': '0',
                'top': '0',
            });
        }
    }
    //一開始先進來判斷螢幕大小
    winW();
    window.addEventListener("resize", winW);


    function ctScrollTop() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth',
        });
    }
    var ctSteps = document.querySelectorAll('.ctStep__item');
    var ctStepCircle = document.querySelectorAll('.ctStep__item--circle');
    var ctStepLine = document.querySelectorAll('.ctStep__line');

    //根據step正在哪頁改變的簡寫
    function ctNextStep(i) {
        ctSteps[i + 1].classList.add("ctStep--on");
        ctStepCircle[i + 1].classList.add("ctStep__circle--on");
        ctStepLine[i].classList.add("ctStep__line--on");
        ctScrollTop();
    }
    function ctPreStep(i) {
        ctSteps[i].classList.remove("ctStep--on");
        ctStepLine[i - 1].classList.remove("ctStep__line--on");
        ctStepCircle[i].classList.remove("ctStep__circle--on");
        ctScrollTop();
    }
    $("#ctProductNextBtn").click(nextToFile);
    function nextToFile() {
        ctProfile.removeClass("no-active");
        ctProduct.addClass('no-active');
        ctNextStep(0);
        console.log('第一步的btn');
    }

    $("#ctProfileNextBtn").click(nextToPay);
    function nextToPay() {
        //有資料為空值就不能進下階段
        let hasNull = false;
        let memNull = false;
        let psgNull = false;
        let msg = '';

        let mem = $('.ctContact input[type="text"]');
        mem.each(function () {
            if ($(this).val() == "") {
                memNull = true;
            }
        });
        //旅客資料的檢驗
        let psg = $('input[type="hidden"]');
        psg.each(function () {
            if ($(this).val() == "") {
                psgNull = true;
            }
        });
        if (memNull == true && psgNull == true) {
            msg = "購買人及旅客";
            hasNull = true;
        }
        else if (memNull == true) {
            msg = "購買人";
            hasNull = true;
        }
        else if (psgNull == true) {
            msg = '旅客';
            hasNull = true;
        }

        if (hasNull == true) {
            alert('尚有' + msg + '欄位未填寫');
        }
        else {
            ctProfile.addClass('no-active');
            ctPay.removeClass('no-active');
            ctSticky.removeClass('no-active');
            ctDetail.removeClass('no-active');
            ctNextStep(1);
        }
    }


    $("#ctProfilePreBtn").click(preToProduct);
    function preToProduct() {
        ctProduct.removeClass('no-active');
        ctProfile.addClass('no-active');
        ctPreStep(1);
    }

    $("#ctPayPreBtn").click(preToFile);
    function preToFile() {
        ctProfile.removeClass('no-active');
        ctPay.addClass('no-active');
        ctSticky.addClass('no-active');
        ctDetail.addClass('no-active');
        ctPreStep(2);
    }

    // window.addEventListener('fullscreen', ctResize, false);


    //旅客人數
    var count = document.querySelector('#count');
    var detailCount = document.querySelector('#detailCount');
    var add = document.querySelector('.ctCountBox__a--plus');
    var mi = document.querySelector('.ctCountBox__a--mi');
    var passengerTab = document.querySelector('.ctPassanger__tab');
    add.addEventListener('click', addPassanger, false);
    mi.addEventListener('click', miPassanger, false);

    function addPassanger() {
        //旅客人數
        if (count.innerHTML == 5) {
            return;
        }
        count.innerHTML = parseInt(count.innerHTML) + 1;
        let label = document.createElement('label');
        let a = document.createElement('a');
        a.setAttribute('herf', 'javascript:;');
        a.addEventListener('click', showFile, false);
        let div = document.createElement('div');
        div.setAttribute('class', 'row');
        let i1 = document.createElement('i');
        i1.setAttribute('class', 'material-icons');
        i1.innerText = 'person';
        let i2 = document.createElement('i');
        i2.innerText = count.innerHTML;
        detailCount.innerHTML = count.innerHTML;
        let input1 = document.createElement('input');
        input1.setAttribute('type', 'hidden');
        input1.setAttribute('name', 'psgName[]');
        let input2 = document.createElement('input');
        input2.setAttribute('type', 'hidden');
        input2.setAttribute('name', 'psgBd[]');
        let input3 = document.createElement('input');
        input3.setAttribute('type', 'hidden');
        input3.setAttribute('name', 'psgId[]');
        let input4 = document.createElement('input');
        input4.setAttribute('type', 'hidden');
        input4.setAttribute('name', 'psgTel[]');
        div.append(i1);
        div.append(i2);
        div.append(input1);
        div.append(input2);
        div.append(input3);
        div.append(input4);
        a.append(div);
        label.append(a);
        passengerTab.append(label);

        //呼叫改變金額函數
        newTotal();
    }
    function miPassanger() {
        if (count.innerHTML == 1) {
            return;
        }
        count.innerHTML = parseInt(count.innerHTML) - 1;
        passengerTab.removeChild(passengerTab.lastChild);

        //呼叫改變金額函數
        newTotal();

        //如果正在填寫的人被刪掉，資料欄位要改成前一個旅客
        //正在填寫的人的位置 
        var whoIsWritten = $('.who').find('i:nth-child(2)').text();
        // console.log("現在在寫旅客：" + whoIsWritten);
        var whoNo = document.querySelectorAll('.who').length;
        // console.log("有幾個who：" + whoNo);
        if (count.innerHTML < 5) {
            if (whoNo < 1) {
                $('.ctPassanger__tab label:last-child a').attr('class', 'who');
            }
            let nowName = $('.who').find("input[name='psgName[]']").val();
            let nowBd = $('.who').find("input[name='psgBd[]']").val();
            let nowId = $('.who').find("input[name='psgId[]']").val();
            let nowTel = $('.who').find("input[name='psgTel[]']").val();
            //顯示該人資料
            $('#psgName').val(nowName);
            $('#psgBd').val(nowBd);
            $('#psgId').val(nowId);
            $('#psgTel').val(nowTel);
        }
    }

    var total = document.querySelector('.ctDetail__total--num');
    var sum = document.querySelector('.ctDetail__cal--sum');
    var dis = document.querySelector('.ctDetail__cal--dis');
    function newTotal() {
        sum.innerHTML = parseInt($('#price').html()) * count.innerHTML;
        console.log($('#price').html());
        total.innerHTML = parseInt(sum.innerHTML) - parseInt(dis.innerHTML);
    }

    //紅利點數是否折抵
    var memPoint = document.querySelector('#memPoint');
    memPoint.addEventListener('click', function () {
        if (memPoint.checked) {
            dis.innerHTML = $('#point').text();
        }
        else {
            dis.innerHTML = 0;
        }
        //呼叫改變金額函數
        newTotal();
    }, false);


    //檢查訂購條款是否被勾選
    var ctRule = document.querySelector('#ctRule');
    var btnPay = '.btn-pay';
    $(btnPay).click(function (e) {

        let hasNull = false;
        let memNull = false;
        let psgNull = false;
        let cdNull = false;
        let msg = '';
        let mem = $('.ctContact input[type="text"]');
        mem.each(function () {
            if ($(this).val() == "") {
                memNull = true;
                return;
            }
        });
        //旅客資料的檢驗
        let psg = $('input[type="hidden"]');
        psg.each(function () {
            if ($(this).val() == "") {
                psgNull = true;
                return;
            }
        });
        let cd = $('.ctCredit input[type="text"]');
        cd.each(function () {
            if ($(this).val() == "") {
                cdNull = true;
                return;
            }
        });
        if (memNull == true && psgNull == true) {
            msg = "購買人、旅客";
            hasNull = true;
        }
        else if (memNull == true) {
            msg = "購買人";
            hasNull = true;
        }
        else if (psgNull == true) {
            msg = '旅客';
            hasNull = true;
        }
        if (cdNull) {
            if (msg == '') {
                msg = '信用卡';
                hasNull = true;
                return;
            }
            msg += "、信用卡";
        }
        if (hasNull == true) {
            alert('尚有' + msg + '欄位未填寫');
        }
        if (!ctRule.checked) {
            alert('請詳閱並同意訂購條款');
        }
        else {
            // $('.ctPaid').css('display', 'block');
            //執行寫入資料庫
            // $.ajax({
            //     type: 'post',
            //     url: 'paid.php',
            //     data: 'memMail=' + memMail + '&memName=' + memName + '&memTel=' + memTel + '',
            //     success: function (data) {

            //     },
            //     error: function (X, t, e) {
            //         alert(e);
            //     }
            // });
            $('#ctForm').submit();

        }
    });



    var psgTabs = document.querySelectorAll('.ctPassanger__tab a');
    for (let i = 0; i < psgTabs.length; i++) {
        psgTabs[i].addEventListener('click', showFile, false);
    }


    // 有input就塞進去
    function bring() {
        // 把資料塞進去該tab到的旅客的值
        //只有一個人的話，input值塞給第一個人的value
        if (count.innerHTML == 1) {
            // console.log($('#psgName').val());
            $("input[name='psgName[]']").val($('#psgName').val());
            $("input[name='psgBd[]']").val($('#psgBd').val());
            $("input[name='psgId[]']").val($('#psgId').val());
            $("input[name='psgTel[]']").val($('#psgTel').val());
            // return;
        }
        //如果有兩個人以上,tab到誰,先顯示別人的value，有輸入的話塞給那個人的value
        else {
            // 值塞進去
            let inputName = $('#psgName').val();
            // console.log("現在的框框值:" + inputNow);
            // 把現在框框值寫回去
            // console.log($(this));
            // $('.who').find("input[name='psgName']").attr('value', inputName);
            $('.who').find("input[name='psgName[]']").val(inputName);
            // return inputNow;
            let inputBd = $('#psgBd').val();
            $('.who').find("input[name='psgBd[]']").val(inputBd);
            let inputId = $('#psgId').val();
            $('.who').find("input[name='psgId[]']").val(inputId);
            let inputTel = $('#psgTel').val();
            $('.who').find("input[name='psgTel[]']").val(inputTel);

        }
    }



    var psgName = document.querySelector('#psgName');
    function showFile(e) {
        // 該人目前資料
        $('.who').attr('class', '');
        $(this).attr('class', 'who');
        let nowName = $(this).closest('a').find("input[name='psgName[]']").val();
        let nowBd = $(this).closest('a').find("input[name='psgBd[]']").val();
        let nowId = $(this).closest('a').find("input[name='psgId[]']").val();
        let nowTel = $(this).closest('a').find("input[name='psgTel[]']").val();
        //顯示該人資料
        $('#psgName').val(nowName);
        $('#psgBd').val(nowBd);
        $('#psgId').val(nowId);
        $('#psgTel').val(nowTel);
        // console.log(now);
    }
    //每個input註冊輸入事件
    var inputs = document.querySelectorAll('.ctPassanger__input input');
    for (let i = 0; i < inputs.length; i++) {
        inputs[i].addEventListener('input', bring, false);
    }


    // 點擊框框打開月曆
    $('#psgBd').click(function (e) {
        e.preventDefault();
        $('.date').css('display', 'block');
    });

    z
    //信用卡的到期

    $('.ctCredit__select i').click(function () {
        // $('.ctCredit__select select').change();
        // $('#month option').css('display', 'block');
        // alert($('#month option').length);
    });

});
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
    var dayall = new Date(yy, mm, 0).getDate();//總天數
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
        var datevalue = document.querySelector("#yy-sp").innerText + "-" + mmtext + "-" + e.target.innerText;

        // document.querySelector("#date-label-1").innerHTML = datevalue;
        $('#date-text').removeClass('expanded');
        document.querySelector("#psgBd").value = datevalue;
        // console.log(document.querySelector("#date").value);//確認送表單的value正確
        $('.date').css('display', 'none');
        let inputBd = $('#psgBd').val();
        $('.who').find("input[name='psgBd']").val(inputBd);
    }
    load();

});