// 跳窗
//按下會有跳窗的函數 win(被點擊的按鈕,要跳出的視窗)
//例如我按下 .btn-pay按鈕  .ctPaid要出現
// 就在我那支js寫完按鈕的addEvevntListener的function呼叫winJump('.btn-pay','.ctPaid');
function winJump(btn, win) {
    var Btn = document.querySelectorAll(btn);
    for (let i = 0; i < Btn.length; i++) {
        Btn[i].addEventListener('click', function () {
            var winJump = document.querySelector(win);
            winJump.style.display = 'block';
        }, false);
    }
}
