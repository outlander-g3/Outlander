//日誌篩選bar的js-------------------------
$('.joForm__input').click(function (e) {
    e.preventDefault();
    e.stopPropagation();
    $(this).toggleClass('expanded');
    $('#' + $(e.target).attr('for')).prop('checked', true);
});
$(document).click(function () {
    $('.joForm__input').removeClass('expanded');
});
// --------------------------------------

//日誌收藏按鈕的js-------------------------
$('.material-icons').click(function (e) {
    e.preventDefault();
    e.stopPropagation();
    $(this).toggleClass('setFavorite');
});
$(document).click(function () {
    $('.material-icons').removeClass('setFavorite');
});
// --------------------------------------

//點擊山的圖片跳轉到下面日誌的js--------------
$('.imgMount').click(function () {
    $('html,body').animate({ scrollTop: $('.jo__filter__and__write').offset().top }, 400);
});
// --------------------------------------



