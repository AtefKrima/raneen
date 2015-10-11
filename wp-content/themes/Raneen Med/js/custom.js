$(document).ready(function(){
    
//box blur
var $container = $("#inner-container"), $articles = $container.children("article"), timeout;

$articles.on('mouseenter', function(event) {
var $article = $(this);
clearTimeout(timeout);
timeout = setTimeout(function() {
if ($article.hasClass('active')) return false;
$articles.not($article).removeClass('active').addClass('blur');
$article.removeClass('blur').addClass('active');
}, 75);
$container.on('mouseleave', function(event) {
clearTimeout(timeout);
$articles.removeClass('active blur');
});
});

//nav ref hover

   $("#F-nav a:eq(0)").addClass("active");
$(function() {
     $('#F-nav li').click(function() {
         $(this).find('a').addClass('active');
          $(this).siblings('li').find('a').removeClass('active');
     });
});


//slider
    $("#Mslider").owlCarousel({
     
    navigation : true, // Show next and prev buttons
    slideSpeed : 300,
    paginationSpeed : 400,
     autoPlay: true,
     navigationText : ["",""],
    items:1
     

     
    });
    
    
  //==============================
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


