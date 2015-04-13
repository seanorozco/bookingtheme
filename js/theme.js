// JavaScript Document

jQuery(document).ready(function($) {
  
  // Remove current-menu-item class and add active class for bootstrap
  console.log('removeClass \'current-menu-item\' from navs and addClass \'active\' from bootstrap.');
  $( 'li.current-menu-item' ).removeClass( 'current-menu-item' ).addClass( 'active' );
  
  
  /* Scroll to Top - http://jsfiddle.net/neeklamy/RpPEe/
  ================================== */
  
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
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


});