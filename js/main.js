$(document).ready(function() {

  if ($('.single-spot .image-gallery').length > 0) {

    $('.image-gallery .image').click(function(e){

      var href = $(this).attr('data-image');

      if (/\.(jpg|png|gif)$/.test(href)) {

          $('body').append('<div id="imageviewer"><div class="image-wrap"><img src="' + href + '" /></div></div>');

        }

        setTimeout(function(){
          $('#imageviewer').addClass('visible');
        }, 1);

        setTimeout(function() {
          $('#imageviewer img, #imageviewer p').addClass('fadeElements');
        }, 2);

         e.preventDefault();

      }

    );

  }

  $(document).on('click', '#imageviewer', function(){

    $('#imageviewer').removeClass('visible');

    setTimeout(function(){
      $('#imageviewer').remove();
    }, 400);

  });

});

$('.main-nav li:last-of-type a').click(function(e){

  e.preventDefault();
  $('.search-container').toggleClass('active');

});


$(document).ready(function() {

  // General
  $('html').removeClass('no-js');

$( function() {
  // init Isotope
  console.log('init');
  var $container = $('.isotope').isotope({
    itemSelector: '.element-item'
  });

  // store filter for each group
  var filters = {};

  $('#filters').on( 'click', '.button', function() {
    var $this = $(this);
    // get group key
    var $buttonGroup = $this.parents('.button-group');
    var filterGroup = $buttonGroup.attr('data-filter-group');
    // set filter for group
    filters[ filterGroup ] = $this.attr('data-filter');
    // combine filters
    var filterValue = '';
    for ( var prop in filters ) {
      filterValue += filters[ prop ];
    }
    // set filter for Isotope
    $container.isotope({ filter: filterValue });
  });

  // change is-checked class on buttons
  $('.button-group').each( function( i, buttonGroup ) {
    var $buttonGroup = $( buttonGroup );
    $buttonGroup.on( 'click', 'button', function() {
      $buttonGroup.find('.is-checked').removeClass('is-checked');
      $( this ).addClass('is-checked');
    });
  });

});

});

$(document).ready(function(){

  $('.agenda-filter li a').click(function(e){

    e.preventDefault();

    selectValue = 'tribe-events-category-' + $(this).attr('id');
    previewSelected(selectValue);

    $('.agenda-filter li').removeClass('active');
    $(this).parent().addClass('active');

  });

});

function previewSelected(selectValue){


  // $('.agenda-item.' + selectValue ).addClass('hidden');
  $('.agenda-item').removeClass('hidden');

    if(selectValue === 'tribe-events-category-all') {
      $('.agenda-item').removeClass('hidden');
    } else {
      $('.agenda-item').each(function(){
        if(!$(this).hasClass(selectValue)){
          $(this).addClass('hidden');
        }
      });
    }
}

$('.hamburger').click(function(){
  $('.navigation').toggleClass('toggle');
});
