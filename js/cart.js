

// 初始寬度
var winWidth = document.body.clientWidth;
var currentWin = winWidth;
//改變寬度
window.addEventListener('resize', ctResize, false);
if (winWidth < 768) {
    $('.ctProfile').css('display', 'none');
    $('.ctPay').css('display', 'none');
}
function ctResize() {
    // console.log(winWidth);
    winWidth = document.body.clientWidth;
    //看有沒有被按全螢幕
    if (winWidth == window.screen.width) {
        $('.ctProduct').css('display', 'block');
        $('.ctProfile').css('display', 'block');
        $('.ctPay').css('display', 'block');
        $('.ctDetail').css('display', 'block');

    }
    //本來就>768 拉往小768 要藏
    //本來<768 拉往小768 不動
    //本來就>768 拉往大768 不動
    //本來<768 拉往大768 全開
    if (winWidth < 768 && currentWin > 768) {
        $('.ctProfile').css('display', 'none');
        $('.ctPay').css('display', 'none');
        $('.ctSticky').css('display', 'none');
    }
    else if ((winWidth > 768 && currentWin > 768)) {
        $('.ctProduct').css('display', 'block');
        $('.ctProfile').css('display', 'block');
        $('.ctPay').css('display', 'block');
        $('.ctSticky').css('display', 'block');
    }
    currentWin = winWidth;
}
//如果從原本的小size但拉不到768的時候會全部吃不到
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
    ctScrollTop();
}
$("#ctProductNextBtn").click(nextToFile);
function nextToFile() {
    $('.ctProfile').css('display', 'block');
    $('.ctProduct').css('display', 'none');
    ctNextStep(0);
}

$("#ctProfileNextBtn").click(nextToPay);
function nextToPay() {
    $('.ctProfile').css('display', 'none');
    $('.ctPay').css('display', 'block');
    $('.ctSticky').css('display', 'block');
    ctNextStep(1);
}


$("#ctProfilePreBtn").click(preToProduct);
function preToProduct() {
    $('.ctProduct').css('display', 'block');
    $('.ctProfile').css('display', 'none');
    ctPreStep(1);
}

$("#ctPayPreBtn").click(preToFile);
function preToFile() {
    $('.ctProfile').css('display', 'block');
    $('.ctPay').css('display', 'none');
    $('.ctSticky').css('display', 'none');
    ctPreStep(2);
}

window.addEventListener('fullscreen', ctResize, false);


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
    input1.setAttribute('name', 'psgName');
    let input2 = document.createElement('input');
    input2.setAttribute('type', 'hidden');
    input2.setAttribute('name', 'psgBd');
    let input3 = document.createElement('input');
    input3.setAttribute('type', 'hidden');
    input3.setAttribute('name', 'psgId');
    let input4 = document.createElement('input');
    input4.setAttribute('type', 'hidden');
    input4.setAttribute('name', 'psgTel');
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
        let nowName = $('.who').find("input[name='psgName']").val();
        let nowBd = $('.who').find("input[name='psgBd']").val();
        let nowId = $('.who').find("input[name='psgId']").val();
        let nowTel = $('.who').find("input[name='psgTel']").val();
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
    sum.innerHTML = 10500 * count.innerHTML;
    total.innerHTML = parseInt(sum.innerHTML) + parseInt(dis.innerHTML);
}

//紅利點數是否折抵
var memPoint = document.querySelector('#memPoint');
memPoint.addEventListener('click', function () {
    if (memPoint.checked) {
        dis.innerHTML = '-300';
    }
    else {
        dis.innerHTML = 0;
    }
    //呼叫改變金額函數
    newTotal();
}, false);


//檢查訂購條款是否被勾選
var ctRule = document.querySelector('#ctRule');
var btnPay = document.querySelectorAll('.btn-pay');
for (let i = 0; i < btnPay.length; i++) {
    btnPay[i].addEventListener('click', function (e) {
        e.preventDefault();
        if (!ctRule.checked) {
            alert('請詳閱並同意訂購條款');
        }
        else {
            winJump_if(btnPay[i], '.ctPaid');
        }
    }, false);
}



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
        $("input[name='psgName']").val($('#psgName').val());
        $("input[name='psgBd']").val($('#psgBd').val());
        $("input[name='psgId']").val($('#psgId').val());
        $("input[name='psgTel']").val($('#psgTel').val());
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
        $('.who').find("input[name='psgName']").val(inputName);
        // return inputNow;
        let inputBd = $('#psgBd').val();
        $('.who').find("input[name='psgBd']").val(inputBd);
        let inputId = $('#psgId').val();
        $('.who').find("input[name='psgId']").val(inputId);
        let inputTel = $('#psgTel').val();
        $('.who').find("input[name='psgTel']").val(inputTel);

    }
}



var psgName = document.querySelector('#psgName');
function showFile(e) {
    // 該人目前資料
    $('.who').attr('class', '');
    $(this).attr('class', 'who');
    let nowName = $(this).closest('a').find("input[name='psgName']").val();
    let nowBd = $(this).closest('a').find("input[name='psgBd']").val();
    let nowId = $(this).closest('a').find("input[name='psgId']").val();
    let nowTel = $(this).closest('a').find("input[name='psgTel']").val();
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

