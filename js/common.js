

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

    //會員登入跳窗
    var winLogin = document.querySelector(".memLogin");
    window.addEventListener("click", (e) => {
        if (e.target.classList.contains('memIcon')) {

            console.log('有點到');
            //先執行session.php echo回來判斷session存不存在
            $.ajax({
                type: 'post',
                url: 'session.php',
                success: function (data) {
                    if (data == 'login') {
                        // 等著塞會員中心php
                        location.href = 'member.php';
                        // alert('已登入');
                    }
                    else if (data == 'logout') {
                        winLogin.style.display = 'block';
                        // alert('未登入');
                    }
                }
            });

        }
        else if (e.target.classList.contains('logout')) {
            logout();
        }
    }, false);


    //刷新是否吃到session，有的話登出就要展示出來
    $.ajax({
        type: 'post',
        url: 'session.php',
        success: function (data) {
            if (data == 'login') {
                $('#Sign').css('display', 'block');
                $('#Sign-m').css('display', 'block');
            }
        }
    });

});


function logout() {
    $.ajax({
        type: 'post',
        url: 'login.php',
        data: 'logout=1',
        success: function (data) {
            if (data == 'logout') {
                alert('成功登出');
                $('#Sign').css('display', 'none');
                $('#Sign-m').css('display', 'none');
                //看要不要跳回首頁（購物車要,會員要
                let str = location.href;
                if (str.search('cart') || str.search('member')) {
                    location.href = 'index.php';
                }

            }
        }
    });
}

//是否點到win以外
$('.memLogin').bind('click', function (e) {
    if ($(e.target).parents().hasClass('jpWin') === false) {
        $('.jpBase').css('display', 'none');
        if ($('.memLogin .jpTitle').html() != '會員登入') {
            resetLogin();
        }
    }
});
//登入跳窗關閉後，要回到原樣
function resetLogin() {
    $('.memLogin').children().remove();
    let newWin = `<div class="jpWin">
                    <div class="jpTitle">
                        會員登入
                    </div>
                        <div class="jpCont">
                            <div class="jpCont--mail">
                                <label for="memMail">
                                    <i class="material-icons">person</i>
                                    <input type="email" placeholder="請輸入信箱" id="memMail" maxlength="50" >
                                </label>
                            </div>
                            <div class="jpCont--psw">
                                <label for="memPsw">
                                    <i class="material-icons">lock</i>
                                    <input type="password" placeholder="請輸入密碼" id="memPsw" maxlength="20" >
                                </label>
                            </div>
                        </div>
                        <div class="jpBtn"><a class="btn-jump-right" id="login" href="javascript:;">登入</a>
                        </div>
                    <div class="memLogin--bottom" id="">
                        <div class="row">
                            <a href="#" id="memForget">忘記密碼</a>
                            <a href="#" id="memRegister">立即註冊</a>
                        </div>
                    </div>
                    </div>`;
    $('.memLogin').append(newWin);
    $('#login').click(login);
    $('#memForget').click(forgetPsw);
    $('#memRegister').click(regist);
}

// 會員登入
function login(e) {
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
            console.log('memMail=' + memMail + '&memPsw=' + memPsw);
            if (data == 'none') {
                let error = `<span>*請輸入已註冊的信箱</span>`;
                $('.jpCont--mail').append(error);
            }
            else if (data == 'pswError') {
                let error = `<span>*密碼錯誤</span>`;
                $('.jpCont--psw').append(error);
            }
            else if (data == 'stopRight') {
                alert('此帳號被停權');
            }
            else {
                $('.memLogin').css('display', 'none');
                $('#Sign').css('display', 'block');
                $('#Sign-m').css('display', 'block');
            }
        }
    });
}
$('#login').click(login);

//忘記密碼
function forgetPsw(e) {
    e.preventDefault();
    $('.memLogin .jpTitle').text('忘記密碼');
    $('.memLogin .jpCont').html(
        `<p>即將發送新密碼至您註冊過的信箱請前往信箱查看</p>
            <div class="jpCont--mail">
            <label for="memMail">
            <i class="material-icons">person</i>
            <input type="text" placeholder="請輸入信箱" id="memMail" maxlength="50" >
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
        $.ajax({
            type: 'post',
            url: 'login.php',
            data: 'memMail=' + memMail + '&checkId=1',
            success: function (data) {
                if (data == 'none') {
                    let error = `<span>*請輸入已註冊的信箱</span>`;
                    $('.jpCont--mail').append(error);
                }
                else if (data == 'exist') {
                    alert('已寄送新密碼至信箱');
                    resetLogin();
                }
            },
            error: function (X, t, e) {
                alert(e);
            }
        });
    });
}
$('#memForget').click(forgetPsw);


//會員註冊
function regist(e) {
    e.preventDefault();
    $('.jpCont--mail span').remove();
    $('.jpCont--psw span').remove();
    $('.memLogin .jpTitle').text('訪客註冊');
    $('.memLogin .jpCont').append(`
        <div class="jpCont--psw">
            <label for="memPsw--check">
                <i class="material-icons">lock</i>
                <input type="password" placeholder="請再次輸入密碼" id="memPsw--check" maxlength="20" >
            </label>
        </div>`);
    $('.jpBtn .btn-jump-right').remove();
    let newBtn = `<a href="#" class="btn-jump-right" onclick="register()" id="register">註冊</a>`;
    $('.jpBtn').append(newBtn);
    $('.memLogin--bottom').css('display', 'none');
    // $('.btn-jump-right').attr('id', 'register').text('註冊');
}
$('#memRegister').click(regist);

//檢查密碼是否相同 之後再優化是否已被註冊過
function register() {
    let memMail = $('#memMail').val();
    let memPsw = $('#memPsw').val();
    let memPswCheck = $('#memPsw--check').val();
    $('.jpCont--mail span').remove();
    $('.jpCont--psw:last-child span').remove();
    //檢查是否為空 或非mail
    // if (memMail == '' || /^[^\s]+@[^\s]+\.[^\s]+$/.test(memMail) == false) {
    if (memMail == '' || memMail.search('@') == -1) {
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
            url: 'login.php',
            data: 'memMail=' + memMail + 'checkId=1',
            success: function (data) {
                console.log(data);
                if (data == 'exist') {
                    let error = `<span>*此信箱已被註冊</span>`;
                    $('.jpCont--mail').append(error);
                }
                else {
                    $.ajax({
                        type: 'post',
                        url: 'login.php',
                        data: 'memMail=' + memMail + '&memPsw=' + memPsw + '&regist=1',
                        success: function () {
                            alert('成功註冊');
                            $('.memLogin').css('display', 'none');
                            $('#Sign').css('display', 'block');
                            $('#Sign-m').css('display', 'block');
                            resetLogin();
                        }
                    });
                }
            },
        });
    }
}
