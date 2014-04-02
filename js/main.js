$(document).ready(function() {

  // General
  $('html').removeClass('no-js');

});

function smoothScroll() {
  $('nav a[href^="#"]').on('click',function (e) {
      e.preventDefault();

      var target = this.hash,
      $target = $(target);

      $('html, body').stop().animate({
          'scrollTop': $target.offset().top
      }, 900, 'swing', function () {
          window.location.hash = target;
      });
  });
}

$(document).ready(function(){
  smoothScroll();
});