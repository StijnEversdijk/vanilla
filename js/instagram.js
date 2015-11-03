function instagramPopulate(){

  var clientID = '5b15a7a846ba4f3a8eb181ec0a27c8f6';
  var clientSecret = '71e2551962cb4e7eaa44be4be36955f8';
  // var code = '92f9c2fd5f114e959df84907749e25fb';
  var userID = '1256435844';
  var apiGET = 'https://api.instagram.com/v1/users/'+userID+'/media/recent/?client_id='+clientID+'&count=3';

  $.ajax(
    {
      url : apiGET,
      success : instagramData,
      dataType : 'jsonp',
    }
  );

}

function instagramData(instagramdata){

  $.each(instagramdata.data, function(i, IGitem) {
    // console.log(IGitem);
    var imageLink = IGitem.link;
    var bgImage = IGitem.images.low_resolution.url;

    $('.ig-feed .images').append('<div><a href="' + imageLink + '"><img src="' + bgImage + '" /></a></div>');

    // $('.ig-link').each(function(){
    //   $(this).attr('href', imageLink);
    // });


  });

}

$(document).ready(function(){
  instagramPopulate();
});
