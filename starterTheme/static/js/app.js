jQuery(document).ready(function($) {
  fixedHeaderOnScroll();
  $('#toggle').click(function() {
    $(this).toggleClass('active');
    $('#overlay').toggleClass('open');
    $('html').toggleClass('hidden');
   });

 
    // Closes overlay menu after clicking on the menu link
    $('#site-navigation3 ul li a').on("click", function (e) {
        $('#toggle').click();
    });
         
    AOS.init({
        duration: 1200,
        easing:'ease-in-quad',
        disable: 'mobile',
        once: true
    });
   
  // //*** Smooth Scroll ***
  //   $(function() {
  //     $('a[href*="#"]:not([href="#"])').click(function() {
  //       if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
  //         var target = $(this.hash);
  //         target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
  //         if (target.length) {
  //           $('html, body').animate({
  //             scrollTop: target.offset().top - 70
  //           }, 1000);
  //           return false;
  //         }
  //       }
  //     });
  //   });//End Smooth Scroll
  
  //*** Fixed header ***
  function fixedHeaderOnScroll(){
    if ($(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
        $('header').addClass('fixed-header');    // Fade in the arrow
    } else {
        $('header').removeClass('fixed-header');   // Else fade out the arrow
    }
  }
  $(window).scroll(function () {
    fixedHeaderOnScroll();
  });

  //*** Scroll to Top *** use with less *** use with html ***
    // $(window).scroll(function() {
    //     if ($(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
    //         $('#return-to-top').fadeIn(200);    // Fade in the arrow
    //     } else {
    //         $('#return-to-top').fadeOut(200);   // Else fade out the arrow
    //     }
    // });
  
    // $('#return-to-top').click(function() {      // When arrow is clicked
    //     $('body,html').animate({
    //         scrollTop : 0                       // Scroll to top of body
    //     }, 500);
    // });//End Scroll to Top
  

  
  //*** Flexslider ***
  // var $flexslider = $('.flex-slider');
  // $flexslider.flexslider({
  //   smoothHeight: false,
  //   slideshow: true,
  //   arrows: false,
  //   dots: true,
  //   controlNav: true,
  //   directionNav: true,
  //   slideshowSpeed: 5000,
  //   useCSS: false /* Chrome fix*/
  // });// End Flexslider



  //Slick SLider
  // $('.slider').slick({
  //   dots: false,
  //   centerMode: true,
  //   infinite: true,
  //   arrows: true,
  //   slidesToShow: 4.67,
  //   responsive: [
  //     {
  //       breakpoint: 1500,
  //       settings: {
  //         slidesToShow: 3,
  //         slidesToScroll: 3,
  //         infinite: true,
  //       }
  //     },
  //     {
  //       breakpoint: 1024,
  //       settings: {
  //         slidesToShow: 2,
  //         slidesToScroll: 2,
  //         infinite: true,
  //       }
  //     },
  //     {
  //       breakpoint: 600,
  //       settings: {
  //         slidesToShow: 2,
  //         slidesToScroll: 2
  //       }
  //     },
  //     {
  //       breakpoint: 480,
  //       settings: {
  //         slidesToShow: 1,
  //         slidesToScroll: 1
  //       }
  //     }
  //     // You can unslick at a given breakpoint now by adding:
  //     // settings: "unslick"
  //     // instead of a settings object
  //   ]
  // });

  
});
  