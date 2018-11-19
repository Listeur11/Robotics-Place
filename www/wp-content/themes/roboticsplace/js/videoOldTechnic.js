//
//$(function() {
//    
//    var $allVideos = $("iframe[src*='//player.vimeo.com'], iframe[src*='//www.youtube.com'], object, embed"),
//    $fluidEl = $(".youtube-player");
//	    	
//	$allVideos.each(function() {
//	
//	  $(this)
//	    // jQuery .data does not work on object/embed elements
//	    .attr('data-aspectRatio', this.height / this.width)
//	    .removeAttr('height')
//	    .removeAttr('width');
//	
//	});
//	
//	$(window).resize(function() {
//	   
//	  $allVideos.each(function() {
//	  
//	    var $el = $(this);
//        var newWidth = $el.parents('figure').width();
//	    $el
//	        .width(newWidth)
//	        .height(newWidth * $el.attr('data-aspectRatio'));
//	  
//	  });
//	
//	}).resize();
//
//});
//function getHeightVideo(){
//    
//}

(function($) {
    
function labnolThumb(id) {
    var thumb = '<img style="opacity:0" src="./images/paterns/purple-rectangle.svg">';
    var play = '<div class="play"></div>';
    return thumb.replace("ID", id) + play;
    console.log(thumb.replace("ID", id) + play);
}

function labnolIframe() {
    var iframe = document.createElement("iframe");
    var embed = "https://www.youtube.com/embed/ID?autoplay=1&rel=0&showinfo=0";
    iframe.setAttribute("src", embed.replace("ID", this.dataset.id));
    iframe.setAttribute("frameborder", "0");
    iframe.setAttribute("allowfullscreen", "1");
    this.parentNode.replaceChild(iframe, this);
    //FULL SCREEN REQUEST .
        var requestFullScreen = iframe.requestFullScreen || iframe.mozRequestFullScreen || iframe.webkitRequestFullScreen;
    requestFullScreen.bind(iframe)();
    
   
}

function LoadVideo() {
    var div, n,
        v = document.getElementsByClassName("youtube-player");
    for (n = 0; n < v.length; n++) {
        div = document.createElement("div");
        div.setAttribute("data-id", v[n].dataset.id);
        div.innerHTML = labnolThumb(v[n].dataset.id);
        div.onclick = labnolIframe;
        
        v[n].appendChild(div);
       
    }
}
    

   
function Video() {
//    $("#video").hover(function (event) {
//        $("svg#PlayBtn").addClass("hover");
//    }, function () {
//        $("svg#PlayBtn").removeClass("hover");
//    });
    $("#video").click(function (event) {
        
//        TweenMax.to($(".backgroundImageVideo"), 0.2, {scale : 1, ease:Power2.easeOut});
        TweenMax.to($("#ParentPlayBtn"), 0.2, {scale: 1.8, opacity : 0, ease:Power2.easeOut});
        TweenMax.to($(".linesOverVideo"), 0.3, {opacity:0, height : 0, ease:Power2.easeOut});
        $('.hoverNoise').css('z-index', '21');
        //$(".youtube-player").css("padding-bottom", "56.23%");
//        $(".youtube-player").removeClass("phone");
    });
}

$(document).ready(function () {
  Video();
    LoadVideo();
});

    })( jQuery );