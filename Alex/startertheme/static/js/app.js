jQuery(document).ready(function($) {

  $('#toggle').click(function() {
    $(this).toggleClass('active');
    $('#overlay').toggleClass('open');
   });

 
    // Closes overlay menu after clicking on the menu link
    $('#site-navigation3 ul li a').on("click", function (e) {
        $('#toggle').click();
    });
  
 
   
  //*** Smooth Scroll ***
    $(function() {
      $('a[href*="#"]:not([href="#"])').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
          var target = $(this.hash);
          target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
          if (target.length) {
            $('html, body').animate({
              scrollTop: target.offset().top - 70
            }, 1000);
            return false;
          }
        }
      });
    });//End Smooth Scroll
  
  
  //*** Scroll to Top *** use with less *** use with html ***
    $(window).scroll(function() {
        if ($(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
            $('#return-to-top').fadeIn(200);    // Fade in the arrow
        } else {
            $('#return-to-top').fadeOut(200);   // Else fade out the arrow
        }
    });
  
    $('#return-to-top').click(function() {      // When arrow is clicked
        $('body,html').animate({
            scrollTop : 0                       // Scroll to top of body
        }, 500);
    });//End Scroll to Top
  

  
  //*** Flexslider ***
  // var $flexslider = $('.home-slide');
  // $flexslider.flexslider({
  //   smoothHeight: false,
  //   slideshow: true,
  //   controlNav: true,
  //   directionNav: true,
  //   slideshowSpeed: 5000,
  //   useCSS: false /* Chrome fix*/
  // });// End Flexslider
  
  $(".fancybox").fancybox({
      openEffect  : 'none',
      closeEffect : 'none',
      'width'   : '95%',
     'height' : '85%',
     'autoScale' : false,
      helpers: { 
        overlay: { 
            locked: false 
        } 
      }
    });

$(".view-more-projects").hide();
$("#view-more").click(function() {
  $(".view-more-projects").slideToggle();
});
  
});
  