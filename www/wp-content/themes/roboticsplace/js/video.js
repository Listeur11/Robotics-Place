
(function($) {
  // var tag = document.createElement('script');
  // tag.src = "//www.youtube.com/player_api";
  // var firstScriptTag = document.getElementsByTagName('script')[0];
  // firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
  //
  // var player;
  // function onYouTubePlayerAPIReady() {
  //   // create the global player from the specific iframe (#video)
  //   player = new YT.Player('video', {
  //     events: {
  //       // call this function when player is ready to use
  //       'onReady': onPlayerReady
  //     }
  //   });
  // }
  // function onPlayerReady(event) {
  //
  // // bind events
  // var playButton = document.getElementById("ParentPlayBtn");
  // playButton.addEventListener("click", function() {
  //   player.playVideo();
  // });
  // }
  $('.link_video').on('click', function(ev) {

    $("#player")[0].src += "&autoplay=1";
    ev.preventDefault();
 
  });
function Video() {
    $("#video").click(function (event) {

//        TweenMax.to($(".backgroundImageVideo"), 0.2, {scale : 1, ease:Power2.easeOut});
        TweenMax.to($("#ParentPlayBtn"), 0.2, {scale: 1.8, opacity : 0, ease:Power2.easeOut});
        TweenMax.to($(".linesOverVideo"), 0.3, {opacity:0, height : 0, ease:Power2.easeOut});
        $('.hoverNoise').css('z-index', '21');
        $('.youtube-player').css('border-radius', '0');

        //$(".youtube-player").css("padding-bottom", "56.23%");
//        $(".youtube-player").removeClass("phone");
    });
}

$(document).ready(function () {
    jQuery('.popin_click').click(function(){
    var target = jQuery(this).data('target');
    jQuery(target).addClass('popin_unactive').removeClass('popin-active');
    if(target == '#popin_video'){
        jQuery('#popin_video_player').html('');
    }
    jQuery('.home').removeClass('noscroll');
  });



  ////////////////////////////////////
  // POPIN video
  ////////////////////////////////////
  jQuery('.link_video').click(function(e){
    e.preventDefault();
    var t64 = jQuery(this).data('urlvideo');
    var iframe = b64_to_utf8 ( t64 );
    jQuery('#popin_video_player').html(iframe);
    jQuery('#popin_video').addClass('popin_active').removeClass('popin_unactive');
    jQuery('.home').addClass('noscroll');
  });
  //Arret videos sur changement de tabs
  // jQuery(".temoignages-mobile").on( "tabsactivate", function()
  // {
	//   var videos = jQuery("#portraits iframe");
	//   for(var i=0; i<videos.length; i++)
	//   {
	//   	jQuery("#portraits iframe")[i].src = jQuery("#portraits iframe")[i].src
	//   }
  // });


  ////////////////////////////////////
  // Decode
  ////////////////////////////////////
  function b64_to_utf8( str ) {
     return decodeURIComponent(escape(window.atob( str )));
    }
   // Video();
   // LoadVideo();
});

    })( jQuery );
