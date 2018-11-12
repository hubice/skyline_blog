$.vv = {

    'banner_init_tag': false,

    'banner_init_clock': true,

    'header_img_width': null,

};



// 启动web-init

$(function () {

    $.vv.header_img_width = $('.header .logo a').css('fontSize');

    banner_init();

    $(window).resize(function () {

        banner_init();

    })

    if (document.body.clientWidth < 900) {
        $('.header').css('position','absolute');
        $('.banner').css('position','absolute');
    } else  {
        $(window).scroll(function () {
            banner_scroll();
        });
    }
})



// banner初始化

function banner_init() {

    //var header = $('.header').height();

    var header = $('.header').height();

    var banner = $('.banner').height();

    var top = parseInt(header) + parseInt(banner);

    $('.banner').css('margin-top', header);

    $('.content').css('margin-top', top);

}



// banner滚轮动画

function banner_scroll() {

    var banner = $('.banner');

    var scrollTop = parseFloat($(window).scrollTop());

	banner.css('top', -scrollTop / 2);

    if (scrollTop <= banner.height()) {

        var opacity = 1 - (scrollTop / banner.height());

        $.vv.banner_init_clock = false;

    } else {

        $.vv.banner_init_clock = true;

        opacity = 0;

    }

    banner.css('opacity', opacity);



    // 节点跟新

    if ($.vv.banner_init_clock != $.vv.banner_init_tag) {

        $.vv.banner_init_tag = $.vv.banner_init_clock;

        banner_scroll_end();

    }

}



function banner_scroll_end() {

    if ($.vv.banner_init_clock) {

        $('.header .logo a').css('fontSize',0);

        if ($('.title').length) {

            $('.header .nav-list ul').hide();

            $('.header .nav-list .blog-bar p').text($('.title').text())

            $('.header .nav-list .blog-bar').show();

        } 

    } else {

        $('.header .logo a').css('fontSize',$.vv.header_img_width);

        if ($('.title').length) {

            $('.header .nav-list ul').show();

            $('.header .nav-list .blog-bar').hide();

        }

    }

}

