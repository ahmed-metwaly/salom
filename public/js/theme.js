jQuery(document).ready(function() {
    // jQuery('.about-us .col-sm-4').addClass("hidden1").viewportChecker({
    //     classToAdd: 'visible1 animated fadeInUpBig',
    //     offset: 0
    //    });
    //    jQuery('.dot-box').addClass("hidden1").viewportChecker({
    //     classToAdd: 'visible1 animated fadeInUpBig',
    //     offset: 0
    //    });
    //    jQuery('#owl-carousel2').addClass("hidden1").viewportChecker({
    //     classToAdd: 'visible1 animated fadeIn',
    //     offset: 200
    //    });
    //    jQuery('#owl-testimonials').addClass("hidden1").viewportChecker({
    //     classToAdd: 'visible1 animated fadeIn',
    //     offset: 200
    //    });
    //    jQuery('.one').addClass("hidden1").viewportChecker({
    //     classToAdd: 'visible1 animated fadeInRightBig',
    //     offset: 100
    //    });
       // jQuery('.store .container .col-sm-6:last-child .download').addClass("hidden1").viewportChecker({
       //  classToAdd: 'visible1 animated fadeInLeftBig',
       //  offset: 100
       // });

       // jQuery('form').addClass("hidden1").viewportChecker({
       //  classToAdd: 'visible1 animated fadeInLeftBig',
       //  offset: 100
       // });
});

jQuery(document).ready(function($) {
	
$('.header-menu').stickMe({
	topOffset: 300,
	transitionStyle: 'fade'
});	

$(".navbar-default li:not(:first-child) a").click(function() {
	var link = $(this).attr('href');
    $('html, body').animate({
        scrollTop: $(link).offset().top - 80
    }, 600);
});
$('.home-page .navbar-nav > li:nth-child(1) > a').click(function () {
    $("html, body").animate({
        scrollTop: 0
    }, 600);
    return false;
});


/*
$(window).resize(function () {
    var viewportWidth = $(window).width();
    if (viewportWidth < 600) {
            $("header .header-menu").removeClass("header-menu stick-me not-sticking sticking");
    }
});*/






 $(window).scroll(function () {
        if ($(this).scrollTop() > 400) {
            $('.scrollup').fadeIn();
        } else {
            $('.scrollup').fadeOut();
        }
    });

    $('.scrollup').click(function () {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });
    
    
   
 
	
	  
$('#owl-carousel').owlCarousel({
	autoplay: true,
	items: 1,
    loop:true,
    autoplayHoverPause : true,
    nav:false,
    dots: true,
    smartSpeed: 700,
        navText: [
      "<i class='fa fa-chevron-left'></i>",
      "<i class='fa fa-chevron-right'></i>"
      ],
   
});


$('#owl-carousel2').owlCarousel({
	autoplay: true,
	margin:20,
    loop:true,
    nav:false,
    dots: true,
    autoplayHoverPause : true,
    smartSpeed: 700,
     navText: [
      "<i class='fa fa-chevron-left'></i>",
      "<i class='fa fa-chevron-right'></i>"
      ],
    responsive: {
         0: {
             items: 1
         },
         600: {
             items: 2
         },
         1000: {
             items: 4
         }
     }
});


$('.owl-carousel3').owlCarousel({
	autoplay: true,
	margin:20,
	items: 1,
    loop:true,
    nav:true,
    dots: false,
    autoplayHoverPause : true,
    smartSpeed: 700,
     navText: [
      "<i class='fa fa-chevron-left'></i>",
      "<i class='fa fa-chevron-right'></i>"
      ],
});


$('#owl-testimonials').owlCarousel({
	autoplay: true,
	margin:20,
    loop:true,
    autoplayHoverPause : true,
    nav:false,
    dots: true,
    smartSpeed: 700,
        navText: [
      "<i class='fa fa-chevron-left'></i>",
      "<i class='fa fa-chevron-right'></i>"
      ],
      responsive: {
         0: {
             items: 1
         },
         600: {
             items: 1
         },
         1000: {
             items: 1
         }
     }
   
});
/*
$("html").niceScroll({
    cursorcolor: "#20a4ab",
    cursorborder: " 0",
    cursorborderradius: "0",
    cursorwidth: "10px",
    zindex: "999"
});*/

});













