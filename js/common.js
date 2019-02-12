

window.addEventListener('load', function () {
    // 跳窗 winJump_if
    // 給有條件的情況下使用 例如購物車要先勾選同意
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
    //跳窗點旁邊就關閉
    // jpBase=document.querySelectorAll('.jpBase');

    $('.jpBase').bind('click', function (e) {
        //是否點到win以外
        if ($(e.target).parents().hasClass('jpWin') === false) {
            $('.jpBase').css('display', 'none');
        }
    });




    winJump('.btn-ex', '.ctPaid');
    var winLogin = document.querySelector(".memLogin");
    window.addEventListener("click", (e) => {
        if (e.target.classList.contains('memIcon')) {
            winLogin.style.display = 'block';
        }

    }, false);

    // $('.memLogin').bind('click', function (e) {
    //     if ($(e.target).parents().hasClass('jpWin') === false) {
    //         $('.jpBase').css('display', 'none');
    //     }
    // });
    // var memBtn = document.querySelector("#memIcon i").innerHtml;
    // console.log(memBtn);
    // var winLogin = document.querySelector(".memLogin");
    // window.addEventListener("click", (e) => {
    //     if (e.target.innerHtml == memBtn) {
    //         winLogin.style.display = 'block';
    //     }

    // }, false);

    //檢查是否登入
    // function memLogin() {
    //     if (1) {
    //         $('.memLogin').show();
    //     }
    // }


});


// 會員登入
$('#login').click(function (e) {
    e.preventDefault();
    $('.jpCont--mail span').remove();
    $('.jpCont--psw span').remove();
    //  取得輸入的值是否＝
    let memMail = $('#memMail').val();
    let memPsw = $('#memPsw').val();
    //到時候要先寫php的rowcount!=0 然後帳密要同時符合才跳轉
    $.ajax({
        type: 'post',
        url: 'login.php',
        data: 'memMail=' + memMail + '&memPsw=' + memPsw,
        success: function (data) {
            alert(data);
            console.log('memMail=' + memMail + '&memPsw=' + memPsw);
            if (data == 'none') {
                let error = `<span>*請輸入註冊用的信箱</span>`;
                $('.jpCont--mail').append(error);
            }
            else if (data == 'pswError') {
                let error = `<span>*密碼錯誤</span>`;
                $('.jpCont--psw').append(error);
            }
            else {
                $('.memLogin').css('display', 'none');
            }
        }
    });
});

//忘記密碼
$('#memForget').click(function (e) {
    e.preventDefault();
    $('.memLogin .jpTitle').text('忘記密碼');
    $('.memLogin .jpCont').html(
        `<p>即將發送新密碼至您註冊過的信箱請前往信箱查看</p>
            <div class="jpCont--mail">
            <label for="memMail">
            <i class="material-icons">person</i>
            <input type="text" placeholder="請輸入信箱" id="memMail">
            </label>
            </div>`
    );
    $('.jpBtn .btn-jump-right').remove();
    let newBtn = `<a href="#" class="btn-jump-right" id="sendMail">傳送新密碼</a>`;
    // let newBtn=`<input type="submit" class="btn-jump-right" id="sendMail" value="傳送新密碼">`;
    $('.jpBtn').append(newBtn);
    $('.memLogin--bottom').css('display', 'none');
    //寄送密碼
    $('#sendMail').click(function (e) {
        $('.jpCont--mail span').remove();
        let memMail = $('#memMail').val();
        console.log(memMail);
        // alert('有喔');
        $.ajax({
            type: 'post',
            url: 'checkExist.php',
            data: 'memMail=' + memMail,
            success: function (data) {

                console.log('memMail=' + memMail);
                if (data == 'none') {
                    let error = `<span>*請輸入已註冊的信箱</span>`;
                    $('.jpCont--mail').append(error);
                }
                else if (data == 'exist') {
                    alert('已寄送新密碼至信箱');
                    $('.memLogin').css('display', 'none');
                }
            },
            error: function (X, t, e) {
                alert(e);
            }
        });
    });
});


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




    //檢查是否為空
    if (memMail == '') {
        let error = `<span>*請輸入電子信箱</span>`;
        $('.jpCont--mail').append(error);
    }
    if (memPsw == '' || memPswCheck == '') {
        let error = `<span>*請輸入密碼</span>`;
        $('.jpCont--psw:last-child').append(error);
    }
    else if (memPsw != memPswCheck) {
        let error = `<span>*請輸入相同密碼</span>`;
        $('.jpCont--psw:last-child').append(error);
    }
    else {
        $.ajax({
            type: 'post',
            url: 'checkExist.php',
            data: 'memMail=' + memMail,
            success: function (data) {
                console.log(data);
                if (data == 'exist') {
                    let error = `<span>*此信箱已被註冊</span>`;
                    $('.jpCont--mail').append(error);
                }
                else {
                    $.ajax({
                        type: 'post',
                        url: 'regist.php',
                        data: 'memMail=' + memMail + '&memPsw=' + memPsw,
                        success: function () {
                            alert('成功註冊');

                        }
                    });
                }
            },
        });
    }
}