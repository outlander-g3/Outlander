// 跳窗
function winJump_if(btn, win) {
    var winJump = document.querySelector(win);
    winJump.style.display = 'block';
}

function winJump(btn, win) {
    var btns = document.querySelectorAll(btn);
    for (let i = 0; i < btns.length; i++) {
        btns[i].addEventListener('click', function (e) {
            e.preventDefault();
            var winJump = document.querySelector(win);
            winJump.style.display = 'block';
        }, false);
    }
}
//跳窗使用：我要按下 .btn-main-s ， .winJump要跳出來
// 就直接在js寫：winJump('.btn-ex', '.winJump');


