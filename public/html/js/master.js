window.onload = function () {
    if (window.innerWidth > 767) {
        process();
    }

};
$(document).ready(function () {
    $('#nut-hidden-more').hover(function () {
        $(this).toggleClass('open');
    });
    $('#nut-hidden-more').hover(function () {
        locationMenuChild();
    });
    $('.wrap-profile>img').click(function () {
        $('.wrapper-profile').toggleClass('open');
    });
    $('button.navbar-toggle').click(function () {
        $('ul#navbar-large').toggleClass('show');
    });

    $('#navbar-large li').removeClass('open');
    $("#navbar-large li .icon-more").on('touchstart', function () {
        var obj = $(this).parents('.itemp-menu');
        var objClass = obj.attr('class');
        $('#navbar-large li').removeClass('open');
        obj.removeClass().addClass(objClass);
        obj.toggleClass("open");
    });
    if (window.innerWidth >= 768) {
        $('#navbar-large li').hover(function () {
            $(this).toggleClass('open');
        });
        process();
    }
});
function process() {
    var total = 0
    var wUl = $('ul#navbar-large').width();
    var numberli = $("ul#navbar-large>li").length;
    /*cắt li nếu dài quá kích thước ul*/
    $('ul#navbar-large>li').each(function (index) {
        var wA = $(this).width() + 3;
        total = total + wA;
        var resultTotal = total + 200;
        if (resultTotal >= wUl) {
            $('.icon-hidden').css('display', 'block');
            var htmlContentLi = $('ul#navbar-large').find('li.itemp-menu').last().html();
            $('ul#navbar-large').find('li.itemp-menu').last().remove();
            $('ul#nut-hidden-more ul.dropdown-menu.list-hide-icon>li').first().before('<li>' + htmlContentLi + '</li>');
        }
    });
    if (total < wUl) {
        var result = total + 200;
        $('ul#nut-hidden-more').addClass('OpenOpacity');
        $('.list-hide-icon>li').each(function (index) {
            if ($(this).attr('class') !== 'hidden') {
                var wLiMore = $(this).find('a').width() + 3;
                result += wLiMore;
                if (result < wUl) {
                    var getLiDel = $(this).html();
                    $(this).remove();
                    $('ul#navbar-large').append('<li class="itemp-menu">' + getLiDel + '</li>');
                    total += wLiMore;
                }
            }
        });
        $('ul#nut-hidden-more').removeClass('OpenOpacity');
    }

    /*Gán pading cho li*/
    wUl -= $('#nut-hidden-more').width();
    total = 0;
    numberli = $("ul#navbar-large>li.itemp-menu").length;
    $('ul#navbar-large>li.itemp-menu').each(function (index) {
        var wA = $(this).width();
        total = total + wA;

        var distancePadding = ((wUl - total) / numberli) / 2;
        $('ul#navbar-large>li').css('padding-left', distancePadding);
        $('ul#navbar-large>li').css('padding-right', distancePadding);
    });

}
function locationMenuChild() {
    $('#nut-hidden-more>li ul>li').each(function (index) {
        var objPosition = $(this).find('a.dropdown-toggle').position();
        if (typeof objPosition !== 'undefined') {
            var positionTop = objPosition.top;
            $(this).find('ul.dropdown-menu').css('top', positionTop);
        }
    });

}
$(window).resize(function () {
    if (window.innerWidth > 767) {
        process();
    } else {
        $('ul#navbar-large>li').removeAttr('style');
        $('.list-hide-icon>li').each(function (index) {
            if ($(this).attr('class') !== 'hidden') {
                var getLiDel = $(this).html();
                $(this).remove();
                $('ul#navbar-large').append('<li class="itemp-menu">' + getLiDel + '</li>');
            }
        });
    }
});