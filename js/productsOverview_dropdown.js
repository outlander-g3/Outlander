 $('.joForm__input').click(function (e) {
        e.preventDefault();
        e.stopPropagation();
        $(this).toggleClass('expanded');
        $("." + $('#' + $(e.target).attr('for')).attr('class')).attr('checked', false);
        // level-choose
        // #level-choose
        // aa
        // .aa
        // $(".aa").attr("checked",false);

        $('#' + $(e.target).attr('for')).attr('checked', true);

        // $("#level-choose").attr("checked",true);

        // getMember();
        // console.log(e.target);
    });
    $(document).click(function () {
        $('.joForm__input').removeClass('expanded');
    });
        clickCont = document.querySelector('input[name="contType"]:checked');
        // clickLevel = document.querySelector('input[name="levelType"]:checked');
        // clickBudget = document.querySelector('input[name="budgetType"]:checked');