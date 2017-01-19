(function($){
    "use strict"; // Start of use strict


    /* ---------------------------------------------
     脚本初始化
     --------------------------------------------- */

    $(window).load(function(){

        // 页面加载

        $("body").imagesLoaded(function(){
            $(".page-loader div").fadeOut();
            $(".page-loader").delay(200).fadeOut("slow");
        });


        // 初始导航滚动
        init_scroll_navigate();

        $(window).trigger("scroll");
        $(window).trigger("resize");

        // Hash menu forwarding
        if ((window.location.hash) && ($(window.location.hash).length)){
            var hash_offset = $(window.location.hash).offset().top;
            $("html, body").animate({
                scrollTop: hash_offset
            });
        }

    });

    $(document).ready(function(){

        $(window).trigger("resize");
        init_classic_menu();

    });

    $(window).resize(function(){

        init_classic_menu_resize();
        initWow();
        initToolTip()
    });


    /* --------------------------------------------
     判断设备
     --------------------------------------------- */
    var mobileTest;
    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent)) {
        mobileTest = true;
        $("html").addClass("mobile");
    }
    else {
        mobileTest = false;
        $("html").addClass("no-mobile");
    }

    var mozillaTest;
    if (/mozilla/.test(navigator.userAgent)) {
        mozillaTest = true;
    }
    else {
        mozillaTest = false;
    }
    var safariTest;
    if (/safari/.test(navigator.userAgent)) {
        safariTest = true;
    }
    else {
        safariTest = false;
    }

    // 触屏
    if (!("ontouchstart" in document.documentElement)) {
        document.documentElement.className += " no-touch";
    }



    // 适应导航菜单高度 方法
    function height_line(height_object, height_donor){
        height_object.height(height_donor.height());
        height_object.css({
            "line-height": height_donor.height() + "px"
        });
    }




    /* ---------------------------------------------
     导航菜单
     --------------------------------------------- */

    var mobile_nav = $(".mobile-nav");
    var desktop_nav = $(".desktop-nav");

    function init_classic_menu_resize(){

        // Mobile menu max height
        $(".mobile-on .desktop-nav > ul").css("max-height", $(window).height() - $(".main-nav").height() - 20 + "px");

        // Mobile menu style toggle
        if ($(window).width() <= 1024) {
            $(".main-nav").addClass("mobile-on");
        }
        else
        if ($(window).width() > 1024) {
            $(".main-nav").removeClass("mobile-on");
            desktop_nav.show();
        }
    }

    function init_classic_menu(){


        // Navbar sticky

        $(".js-stick").sticky({
            topSpacing: 0
        });


        height_line($(".inner-nav > ul > li > a"), $(".main-nav"));
        height_line(mobile_nav, $(".main-nav"));

        mobile_nav.css({
            "width": $(".main-nav").height() + "px"
        });

        // Transpaner menu

        if ($(".main-nav").hasClass("transparent")){
            $(".main-nav").addClass("js-transparent");
        }

        $(window).scroll(function(){

            if ($(window).scrollTop() > 10) {
                $(".js-transparent").removeClass("transparent");
                $(".main-nav, .nav-logo-wrap .logo, .mobile-nav").addClass("small-height");
            }
            else {
                $(".js-transparent").addClass("transparent");
                $(".main-nav, .nav-logo-wrap .logo, .mobile-nav").removeClass("small-height");
            }


        });

        // Mobile menu toggle

        mobile_nav.click(function(){

            if (desktop_nav.hasClass("js-opened")) {
                desktop_nav.slideUp("slow", "easeOutExpo").removeClass("js-opened");
                $(this).removeClass("active");
            }
            else {
                desktop_nav.slideDown("slow", "easeOutQuart").addClass("js-opened");
                $(this).addClass("active");
            }

        });

        desktop_nav.find("a:not(.mn-has-sub)").click(function(){
            if (mobile_nav.hasClass("active")) {
                desktop_nav.slideUp("slow", "easeOutExpo").removeClass("js-opened");
                mobile_nav.removeClass("active");
            }
        });


        // 子菜单效果

        var mnHasSub = $(".mn-has-sub");
        var mnThisLi;

        mnThisLi = mnHasSub.parent("li");
        mnThisLi.hover(function(){

            if (!($(".main-nav").hasClass("mobile-on"))) {

                $(this).find(".mn-sub:first").stop(true, true).fadeIn("fast");
            }

        }, function(){

            if (!($(".main-nav").hasClass("mobile-on"))) {

                $(this).find(".mn-sub:first").stop(true, true).delay(100).fadeOut("fast");
            }

        });

    }

    /* ---------------------------------------------
     滚动导航
     --------------------------------------------- */

    function init_scroll_navigate(){

        $(".local-scroll").localScroll({
            target: "body",
            duration: 1500,
            offset: 0,
            easing: "easeInOutExpo"
        });

        var sections = $(".home-section, .split-section, .page-section");
        var menu_links = $(".scroll-nav li a");

        $(window).scroll(function(){

            sections.filter(":in-viewport:first").each(function(){
                var active_section = $(this);
                var active_link = $('.scroll-nav li a[href="#' + active_section.attr("id") + '"]');
                menu_links.removeClass("active");
                active_link.addClass("active");
            });

        });

    }

/*wow动画*/
function initWow()
{
    (function ($) {
        var wow = new WOW({
           boxClass:'wow',
            animateClass:'animated',
            offset:90,
            mobile:false,
            live:true
        });
        if($('body').hasClass('appear-animate'))
        {
            wow.init();
        }
    })(jQuery);

}
//显示 tooltip
function initToolTip()
{
    $('[data-toggle="tooltip"]').tooltip();
}

})(jQuery); // 结束












