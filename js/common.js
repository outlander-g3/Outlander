// 跳窗
function winJump_if(btn, win) {
    var winJump = document.querySelector(win);
    winJump.style.display = 'block';
}

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
winJump('.btn-ex', '.ctPaid');


