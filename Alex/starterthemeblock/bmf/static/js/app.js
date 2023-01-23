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
  
  $(".wp-block-gallery .blocks-gallery-item a").fancybox({
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

  $(".wp-block-gallery .blocks-gallery-item a").attr('rel', 'gal');


  //About block slider
  $( window ).load(function() {
    $(".about-button1").addClass("active").removeClass("about-button").removeClass("load-about");
    $("#about .about-block").slideUp();
    $("#about .about-block1").addClass("active-block").slideDown();
  });

  $(".about-button").on( "click", function( event ) {

  	// $('html, body').animate({
  	// 	scrollTop: $('#about').offset().top -50
  	// }, 400);

  	event.preventDefault();
  	$(this).siblings(".active").removeClass("active").addClass("about-button");
  	$(this).addClass("active").removeClass("about-button");
  	if ($(this).hasClass("about-button1")) {
  		$("#about .active-block").removeClass("active-block").slideUp();
  		$("#about .about-block1").addClass("active-block").slideDown("slow");
  	} else if ($(this).hasClass("about-button2")) {
  		$("#about .active-block").removeClass("active-block").slideUp();
  		$("#about .about-block2").addClass("active-block").slideDown("slow");
  	} else if ($(this).hasClass("about-button3")) {
  		$("#about .active-block").removeClass("active-block").slideUp();
  		$("#about .about-block3").addClass("active-block").slideDown("slow");
  	} else if ($(this).hasClass("about-button4")) {
  		$("#about .active-block").removeClass("active-block").slideUp();
  		$("#about .about-block4").addClass("active-block").slideDown("slow");
  	} else if ($(this).hasClass("about-button5")) {
  		$("#about .active-block").removeClass("active-block").slideUp();
  		$("#about .about-block5").addClass("active-block").slideDown("slow");
  	}
  });



  //Services block slider
  $( window ).load(function() {
    $(".services-button3").addClass("active").removeClass("services-button").removeClass("load-services");
    $("#services .services-block").slideUp();
    $("#services .services-block3").addClass("active-block").slideDown();
    $("#services .services-intro3").addClass("active-block").slideDown();
    $("#services .services-intro-img3").addClass("active-block").slideDown();
  });

  $(".services-button").on( "click", function( event ) {

  	$('html, body').animate({
  		scrollTop: $('#services #intro').offset().top -50
  	}, 400);

  	event.preventDefault();
  	$(this).siblings(".active").removeClass("active").addClass("services-button");
  	$(this).addClass("active").removeClass("services-button");
  	if ($(this).hasClass("services-button1")) {
  		$("#services .active-block").removeClass("active-block").slideUp();
  		$("#services .services-block1").addClass("active-block").slideDown("slow");
  		$("#services .services-intro1").addClass("active-block").slideDown("slow");
  		$("#services .services-intro-img1").addClass("active-block").slideDown("slow");
  	} else if ($(this).hasClass("services-button2")) {
  		$("#services .active-block").removeClass("active-block").slideUp();
  		$("#services .services-block2").addClass("active-block").slideDown("slow");
      $("#services .services-intro2").addClass("active-block").slideDown("slow");
  		$("#services .services-intro-img2").addClass("active-block").slideDown("slow");
  	} else if ($(this).hasClass("services-button3")) {
  		$("#services .active-block").removeClass("active-block").slideUp();
  		$("#services .services-block3").addClass("active-block").slideDown("slow");
      $("#services .services-intro3").addClass("active-block").slideDown("slow");
  		$("#services .services-intro-img3").addClass("active-block").slideDown("slow");
  	}
  });



  //Slick SLider
  $('.slider').slick({
    dots: false,
    infinite: false,
    arrows: true,
    speed: 300,
    slidesToShow: 1.1,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          infinite: true,
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ]
  });

  
$('input[type="submit"]').after('<span></span>');


$('.more-info p > p').detach().insertAfter('.more-info p');
});
  