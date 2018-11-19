var compteur = 1;
var running = 0;
$('#arrow').addClass('hide');
function showArrow(){
    $('#arrow').removeClass().addClass('arrow--show');
    $(document).on('mousemove', function(e){
        $('#arrow').css({
           left:  e.pageX,
           top:   e.pageY
        });
    });
    $('#arrow').css('opacity', '1');
    
}
function hideArrow(){
    $('#arrow').css('opacity', '0');
}


function orderSlides() {
    TweenMax.to($('#img1'), 0.8, {
        x: '-20px',
        y: '-20px',
        ease: Power4.easeInOut
    });
    TweenMax.to($('#img2'), 0.8, {
        x: '0px',
        y: '0',
        ease: Power4.easeInOut
    });
    TweenMax.to($('#img3'), 0.8, {
        x: '20px',
        y: '20px',
        ease: Power4.easeInOut
    });
}

function slider(compteurSlider) {
   
    if (running == 0) {
        running = 1;
        compteur++;
        var img1, img2, img3, pos1, pos2, pos3;
        console.log(compteurSlider);
        if (compteurSlider > 3) {
            compteur = 1;
        } else if (compteurSlider == 1) {
            img1 = "#img1";
            img2 = "#img2";
            img3 = "#img3";
        } else if (compteurSlider == 2) {
            img1 = "#img2";
            img2 = "#img3";
            img3 = "#img1";
        } else if (compteurSlider == 3) {
            img1 = "#img3";
            img2 = "#img1";
            img3 = "#img2";
            compteur = 1;
        }
        console.log(img1, img2, img3);
        
        TweenMax.to(img1, 0.5, {
            x: '800px',
            y: '20px',
            ease: Power4.easeInOut,
            onComplete: function () {
                TweenMax.to(img1, 0.5, {
                    x: '20px',
                    ease: Power4.easeInOut,
                    onComplete : function(){
                        running = 0;
                    }
                });
            }
        });
        TweenMax.to(img2, 0.6, {
            x: '-20px',
            y: '-20px',
            ease: Power4.easeInOut,
        }).delay(0.3);
        TweenMax.to(img3, 0.8, {
            x: '0px',
            y: '0px',
            ease: Power4.easeInOut,
        }).delay(0.3);

        setTimeout(function () {
            $(img1).removeClass().addClass('pos3');
            $(img2).removeClass().addClass('pos1');
            $(img3).removeClass().addClass('pos2');
            
        }, 500);
        
    }


}



$(document).ready(function () {
    // When the DOM is loaded
    orderSlides();
    $('#slider').on("click", function () {
        slider(compteur);
    });
    $('#slider').mouseenter(function () {
        showArrow();
        console.log("show");
        
    }).mouseleave(function () {
        hideArrow();
        console.log("hide");
    });
    
});
