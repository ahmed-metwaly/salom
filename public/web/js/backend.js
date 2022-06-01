$(document).ready(function () {
    'use strict';
    
    // Navbar [ Active Class ]
    
    $(".navbar li").click(function () {
       
        $(this).addClass('active').siblings().removeClass('active');
        
    });
    
    // Scroll Top
    
    var btnTop = $("#btn-top")

    $(window).scroll(function () {

        $(this).scrollTop() >= 300 ? btnTop.show(600) : btnTop.hide(700);
        // console.log($(this).scrollTop());

    });

    btnTop.click(function () {
       
        $("html,body").animate({ scrollTop : 0}, 1000);
        
    });

    $(".select").select2({
        dropdownAutoWidth: !0,
        width: "100%",
        dir: "rtl",
        placeholder: function () {
            $(this).data('placeholder');
        }
    });
    
    
    /* var $navbar = $("#navbar"),
        y_pos = $navbar.offset().top,
        height = $navbar.height();

    $(document).scroll(function() {
        var scrollTop = $(this).scrollTop();

        if (scrollTop > y_pos + height) {
            $navbar.addClass("navbar-fixed").animate({
                top: 0
            });
        } else if (scrollTop <= y_pos) {
            $navbar.removeClass("navbar-fixed").clearQueue().animate({
                top: "-48px"
            }, 0);
        }
    }); */
    
});

// Loading

$(window).load(function () {
    
    $(".loading, .loading .spinner").fadeOut(1000, function(){
        $(".loading").css("display", "none");
        $("body").css("overflow","auto");
    });
});
