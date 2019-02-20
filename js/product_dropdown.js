 $('.joForm__input').click(function (e) {
        e.preventDefault();
        e.stopPropagation();
        $(this).toggleClass('expanded');
        $("." + $('#' + $(e.target).attr('for')).attr('class')).attr('checked', false);
        $('#' + $(e.target).attr('for')).attr('checked', true);
        // getMember();
        // console.log(e.target);
    });
    $(document).click(function () {
        $('.joForm__input').removeClass('expanded');
    });
        clickCont = document.querySelector('input[name="contType"]:checked');
