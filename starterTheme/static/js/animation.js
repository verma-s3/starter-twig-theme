jQuery(function ($) {
  var lazypoint = 100
  window.addEventListener('scroll', lazy)
  lazy()
  function lazy() {
    // alert("scrolling");
    var lazy = document.querySelectorAll('.reveal')
    for (var i = 0; i < lazy.length; i++) {
      var windowheight = window.innerHeight
      var lazytop = lazy[i].getBoundingClientRect().top
      var lazybottom = lazy[i].getBoundingClientRect().bottom
      if (lazytop < windowheight - lazypoint) {
        lazy[i].classList.add('revealed')
      }
    }
  }
})
