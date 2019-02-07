// 跳窗 winJump_if
//給有條件的情況下使用 例如購物車要先勾選同意 
function winJump_if(btn, win) {
    var winJump = document.querySelector(win);
    winJump.style.display = 'block';
}

//無條件的狀況使用winJump
function winJump(btn, win) {
    var btns = document.querySelectorAll(btn);
    var winJump = document.querySelector(win);
    winJump.style.height = document.body.offsetHeight;
    for (let i = 0; i < btns.length; i++) {
        btns[i].addEventListener('click', function (e) {
            e.preventDefault();
            winJump.style.display = 'block';
        }, false);
    }
}
//跳窗使用：我要按下 .btn-ex ， .ctPaid要跳出來
// 就直接在我的js寫：
// winJump('.btn-ex', '.ctPaid');
$('.jpBase').click(function (e) {
    //是否點到win以外
    if (!$(e.target).parents().hasClass('jpBase')) {
        $('.jpBase').css('display', 'none');
    }

});

//會員登入
$('#login').click(function (e) {
    e.preventDefault();
    $('.jpCont--mail span').remove();
    $('.jpCont--psw span').remove();
    //  取得輸入的值是否＝
    var enterMail = $('#memMail').val();
    var enterPsw = $('#memPsw').val();
    //到時候要先寫php的rowcount!=0 然後帳密要同時符合才跳轉
    if (enterMail != 'A') {
        let error = `<span>*請輸入註冊用的信箱</span>`;
        $('.jpCont--mail').append(error);
    }
    else if (enterPsw != 123) {
        let error = `<span>*密碼錯誤</span>`;
        $('.jpCont--psw').append(error);
    }
    else {
        $('.memLogin').css('display', 'none');
        //到時候還要執行php寫session
    }
});

//忘記密碼
$('#memForget').click(function (e) {
    e.preventDefault();
    $('.memLogin .jpTitle').text('忘記密碼');
    $('.memLogin .jpCont').html(`<p>即將發送新密碼至您註冊過的信箱
    請前往信箱查看</p>
<div class="jpCont--mail">
    <label for="memMail">
        <i class="material-icons">person</i>
        <input type="text" placeholder="請輸入信箱" id="memMail">
    </label>
</div>`);
    $('.jpBtn .btn-jump-right').remove();
    let newBtn = `<a href="#" class="btn-jump-right" onclick="sendMail()" id="sendMail">傳送新密碼</a>`;
    $('.jpBtn').append(newBtn);
    $('.memLogin--bottom').css('display', 'none');
});
// $('#sendMail').click(function (e) {

// });
function sendMail() {
    // e.preventDefault();
    $('.memLogin').css('display', 'none');
    // alert('A');
}


//會員註冊
$('#memRegister').click(function (e) {
    e.preventDefault();
    $('.jpCont--mail span').remove();
    $('.jpCont--psw span').remove();
    $('.memLogin .jpTitle').text('訪客註冊');
    $('.memLogin .jpCont').append(`
    <div class="jpCont--psw">
        <label for="memPsw--check">
            <i class="material-icons">lock</i>
            <input type="password" placeholder="請再次輸入密碼" id="memPsw--check">
        </label>
    </div>`);
    $('.jpBtn .btn-jump-right').remove();
    let newBtn = `<a href="#" class="btn-jump-right" onclick="register()" id="register">註冊</a>`;
    $('.jpBtn').append(newBtn);
    $('.memLogin--bottom').css('display', 'none');
    // $('.btn-jump-right').attr('id', 'register').text('註冊');
});

//檢查密碼是否相同 之後再優化是否已被註冊過
function register() {
    let memMail = $('#memMail').val();
    let memPsw = $('#memPsw').val();
    let memPswCheck = $('#memPsw--check').val();
    $('.jpCont--psw:last-child span').remove();
    if (memPsw != memPswCheck) {
        let error = `<span>*請輸入相同密碼</span>`;
        $('.jpCont--psw:last-child').append(error);
    }
    else {

    }
}