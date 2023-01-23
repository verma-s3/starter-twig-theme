//*** Map scroll off *** use with less ***
jQuery(document).ready(function($) {

  // Enable the pointer events only on click;

  $('#map-container(iframe)').addClass('scrolloff'); // set the pointer events to none on doc ready
  $('#home-page-map(iframe parent)').on('click', function () {
      $('#map-container').removeClass('scrolloff'); // set the pointer events true on click
  });

  //Disable pointer events when the mouse leave the canvas area;
  $("#map-container").mouseleave(function () {
    $('#map-container').addClass('scrolloff'); // set the pointer events to none when mouse leaves the map area
  });

});


//*** Accordian toggle ***
  $(".room-info-row").hide();
  $(".room-row-left a").on( "click", function(event) {
    event.preventDefault();
    $(this).parent().parent().parent().children(".room-info-row").slideToggle(100);
  });


//*** Start Parallax *** use with less ***
  var $parallaxFrame = $('.parallax-frame');

  move($parallaxFrame);

  $(window).bind('scroll', function(){
    move($parallaxFrame);
  });

  $( window ).resize(function() {
    move($parallaxFrame);
  });

  function move($parallaxFrame){
    // parallax
    var pos = $(window).scrollTop();
    var windowHeight = $(window).height();
    var windowWidth = $(window).width();
    var inertia = 0.3;
    var opacity;

    $parallaxFrame.each(function() {
      $(this).css({'backgroundPosition': newPos(pos, $(this).offset().top, inertia)});
    });

  }

  function newPos(pos, imgPos, inertia) {
    return 50 + "% " + (pos * inertia - imgPos * inertia)  + "px";
  }//End Parallax


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


//*** Smooth Scroll ***
  $(function() {
    $('a[href*="#"]:not([href="#"])').click(function() {
      if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
        if (target.length) {
          $('html, body').animate({
            scrollTop: target.offset().top
          }, 1000);
          return false;
        }
      }
    });
  });//End Smooth Scroll


//*** Equal Height Columns ***
var screenWidth
$(window).load(function() {
	screenWidth = $(window).width();
});

var currentTallest = 0;
var currentRowStart = 0;
var rowDivs = new Array();

function setConformingHeight(el, newHeight) {
 // set the height to something new, but remember the original height in case things change
 el.data("originalHeight", (el.data("originalHeight") == undefined) ? (el.height()) : (el.data("originalHeight")));
 el.height(newHeight);
}

function getOriginalHeight(el) {
 // if the height has changed, send the originalHeight
 return (el.data("originalHeight") == undefined) ? (el.height()) : (el.data("originalHeight"));
}

function columnConform() {

 // find the tallest DIV in the row, and set the heights of all of the DIVs to match it.
 $('div.equal-height').each(function(index) {

  if((currentRowStart != $(this).position().top) && screenWidth >= (992)) {

   // we just came to a new row.  Set all the heights on the completed row
   for(currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) setConformingHeight(rowDivs[currentDiv], currentTallest);

   // set the variables for the new row
   rowDivs.length = 0; // empty the array
   currentRowStart = $(this).position().top;
   currentTallest = getOriginalHeight($(this));
   rowDivs.push($(this));

  } else {

   // another div on the current row.  Add it to the list and check if it's taller
   rowDivs.push($(this));
   currentTallest = (currentTallest < getOriginalHeight($(this))) ? (getOriginalHeight($(this))) : (currentTallest);

  }
  // do the last row
  for(currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) setConformingHeight(rowDivs[currentDiv], currentTallest);

 });

}
if (matchMedia('only screen and (min-width: 768px)').matches) {
	columnConform();

	$(window).resize(columnConform);
};//end Equal Height Columns


//*** MixItUp function ***
  $(function(){
    $('#portfolio-listings').mixItUp()
  });//end MixItUp fuction


//*** MixItUp with auto-filter function (uses url hash for filter) ***
var filterOnLoad = window.location.hash ? '.'+(window.location.hash).replace('#','') : 'all';

  $(function(){
    $('#portfolio-listings').mixItUp({
        load: {
            filter: filterOnLoad,
        },
	});
  });//end MixItUp with auto-filter fuction


  //*** countUp ***
  //*** requires countUp.js ***
  // use an id on the element you want to count

    var options1 = {
    useEasing : true,
    useGrouping : false,
    separator : '',
    decimal : '',
    prefix : '',
    suffix : '+'
  };

  var options2 = {
    useEasing : true,
    useGrouping : false,
    separator : '',
    decimal : '',
    prefix : '',
    suffix : '%'
  };

  var wells = new CountUp("wells", 0, 200, 0, 1.5, options1);
  var water = new CountUp("water", 0, 25, 0, 1.5, options2);

  $(".stats-block").appear();
  $(".stats-block").on('appear', function() {
      console.log("element appeared");
      $(this).off('appear');
      wells.start();
      water.start();
  });

  //countUp

  //*** appear ***
  //*** requires jquery.appear.js ***

  $(".stats-block").appear();
  $(".stats-block").on('appear', function() {
      console.log("element appeared");
      $(this).off('appear');
      wells.start();
      water.start();
  });

  //appear
