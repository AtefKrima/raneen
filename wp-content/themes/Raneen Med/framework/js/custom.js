jQuery(document).ready(function () {
	jQuery('.shb_sup').hover(function (event) {
        jQuery(this).stop().animate({
            marginTop: "11px"
        }, {
            duration: 'slow',
            easing: 'easeOutElastic'
		});
    }, function () {
        jQuery(this).stop().animate({
            marginTop: "8px"
        }, {
            duration: 'slow',
            easing: 'easeOutElastic'
        });	
	});	
	
	
	jQuery('.tt-menu li a').hover(function (event) {
        jQuery(this).stop().animate({
            lineHeight: "30px"
        }, {
            duration: 'slow',
            easing: 'easeOutElastic'
        });	
    }, function () {
        jQuery(this).stop().animate({
            lineHeight: "33px"
        }, {
            duration: 'slow',
            easing: 'easeOutElastic'
        });	
	});
	

	//    ==============================
//     ****** Sticky Scroll ******
//    ==============================
    var menu = $('.mainMenuContainer').filter(':first');
    var origOffsetY = menu.offset().top ;

    function scroll() {
        if ($(window).scrollTop() >= origOffsetY) {
            if (!$('.mainMenuContainer').hasClass('sticky')) {
                $('.mainMenuContainer').addClass('sticky');
                $('.logo2').show();
                $('.container.all').addClass('menu-padding');
            }
        } else {
            if ($('.mainMenuContainer').hasClass('sticky')) {
                $('.mainMenuContainer').removeClass('sticky');
                $('.logo2').hide();
                $('.container.all').removeClass('menu-padding');
            }
        }
    }
    document.onscroll = scroll;
	

	
});

