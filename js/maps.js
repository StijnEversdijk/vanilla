(function($) {

/*
*  render_map
*
*  This function will render a Google Map onto the selected jQuery element
*
*  @type  function
*  @date  8/11/2013
*  @since 4.3.0
*
*  @param $el (jQuery element)
*  @return  n/a
*/

function render_map( $el ) {

  var styles = [{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"}]},{"featureType":"administrative.country","elementType":"geometry.fill","stylers":[{"color":"#e7d5ba"}]},{"featureType":"administrative.locality","elementType":"labels.text.fill","stylers":[{"color":"#615439"}]},{"featureType":"administrative.land_parcel","elementType":"geometry.fill","stylers":[{"color":"#e7d5ba"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"visibility":"on"}]},{"featureType":"landscape","elementType":"geometry.fill","stylers":[{"color":"#e7d5ba"}]},{"featureType":"landscape.man_made","elementType":"geometry.fill","stylers":[{"color":"#eee4d4"},{"visibility":"on"}]},{"featureType":"landscape.man_made","elementType":"geometry.stroke","stylers":[{"color":"#eee4d4"}]},{"featureType":"landscape.man_made","elementType":"labels.text.fill","stylers":[{"color":"#eee4d4"}]},{"featureType":"landscape.natural","elementType":"geometry.fill","stylers":[{"visibility":"on"}]},{"featureType":"landscape.natural.terrain","elementType":"geometry.fill","stylers":[{"saturation":"0"}]},{"featureType":"landscape.natural.terrain","elementType":"labels.text.fill","stylers":[{"color":"#eee4d4"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45}]},{"featureType":"road","elementType":"geometry.fill","stylers":[{"color":"#fcefd2"}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#fcefd2"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#fcefd2"}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"hue":"#ffb000"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"road.local","elementType":"geometry.stroke","stylers":[{"color":"#fcefd2"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#7dacbc"},{"visibility":"on"}]}];

  // var
  var $markers = $el.find('.marker');

  // vars
  var args = {
    zoom    : 16,
    center    : new google.maps.LatLng(0, 0),
    styles: [{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"}]},{"featureType":"administrative.country","elementType":"geometry.fill","stylers":[{"color":"#e7d5ba"}]},{"featureType":"administrative.locality","elementType":"labels.text.fill","stylers":[{"color":"#615439"}]},{"featureType":"administrative.land_parcel","elementType":"geometry.fill","stylers":[{"color":"#e7d5ba"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"visibility":"on"}]},{"featureType":"landscape","elementType":"geometry.fill","stylers":[{"color":"#e7d5ba"}]},{"featureType":"landscape.man_made","elementType":"geometry.fill","stylers":[{"color":"#eee4d4"},{"visibility":"on"}]},{"featureType":"landscape.man_made","elementType":"geometry.stroke","stylers":[{"color":"#eee4d4"}]},{"featureType":"landscape.man_made","elementType":"labels.text.fill","stylers":[{"color":"#eee4d4"}]},{"featureType":"landscape.natural","elementType":"geometry.fill","stylers":[{"visibility":"on"}]},{"featureType":"landscape.natural.terrain","elementType":"geometry.fill","stylers":[{"saturation":"0"}]},{"featureType":"landscape.natural.terrain","elementType":"labels.text.fill","stylers":[{"color":"#eee4d4"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45}]},{"featureType":"road","elementType":"geometry.fill","stylers":[{"color":"#fcefd2"}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#fcefd2"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#fcefd2"}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"hue":"#ffb000"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"road.local","elementType":"geometry.stroke","stylers":[{"color":"#fcefd2"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#7dacbc"},{"visibility":"on"}]}],
    scrollwheel: false,
    mapTypeId : google.maps.MapTypeId.ROADMAP
  };

  // create map
  var map = new google.maps.Map( $el[0], args);

  // add a markers reference
  map.markers = [];

  // add markers
  $markers.each(function(){

      add_marker( $(this), map );

  });

  // center map
  center_map( map );

}

/*
*  add_marker
*
*  This function will add a marker to the selected Google Map
*
*  @type  function
*  @date  8/11/2013
*  @since 4.3.0
*
*  @param $marker (jQuery element)
*  @param map (Google Map object)
*  @return  n/a
*/

function add_marker( $marker, map ) {

  // var
  var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

  // create marker
  var marker = new google.maps.Marker({
    position  : latlng,
    map     : map
  });

  // add to array
  map.markers.push( marker );

  // if marker contains HTML, add it to an infoWindow
  if( $marker.html() )
  {
    // create info window
    var infowindow = new google.maps.InfoWindow({
      content   : $marker.html()
    });

    // show info window when marker is clicked
    google.maps.event.addListener(marker, 'click', function() {

      infowindow.open( map, marker );

    });
  }

}

/*
*  center_map
*
*  This function will center the map, showing all markers attached to this map
*
*  @type  function
*  @date  8/11/2013
*  @since 4.3.0
*
*  @param map (Google Map object)
*  @return  n/a
*/

function center_map( map ) {

  // vars
  var bounds = new google.maps.LatLngBounds();

  // loop through all markers and create bounds
  $.each( map.markers, function( i, marker ){

    var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

    bounds.extend( latlng );

  });

  // only 1 marker?
  if( map.markers.length == 1 )
  {
    // set center of map
      map.setCenter( bounds.getCenter() );
      map.setZoom( 16 );
  }
  else
  {
    // fit to bounds
    map.fitBounds( bounds );
  }

}

/*
*  document ready
*
*  This function will render each map when the document is ready (page has loaded)
*
*  @type  function
*  @date  8/11/2013
*  @since 5.0.0
*
*  @param n/a
*  @return  n/a
*/

$(document).ready(function(){

  $('.acf-map').each(function(){

    render_map( $(this) );

  });

});

})(jQuery);