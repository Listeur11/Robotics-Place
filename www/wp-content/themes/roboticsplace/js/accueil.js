(function ($) {
    //    var isAndroid = /android/i.test(navigator.userAgent.toLowerCase());
    //    var isWindows = /windows phone/i.test(navigator.userAgent.toLowerCase());
    //    var isBlackberry = /blackberry/i.test(navigator.userAgent.toLowerCase());
    //    var isiDevice = /ipad|iphone|ipod/i.test(navigator.userAgent.toLowerCase());
    //
    //    if (isAndroid || isWindows || isBlackberry || isiDevice) {
    //        $('#element').on('click', function () {
    //            //your code here
    //        });
    //    } else {
    //        $('#element').on('hover', function () {
    //            //your code here
    //        });
    //    }
    var scrollTimeout;
    var throttle = 600;
    var bcl = 0;
    // var $page = $('html')
    // var $titlePage = $('.titlePage')
    // var $link = $('#beforeVideo').find('a')
    // var $videoHP = $('#parentVideo')
    //
    // new TimelineMax()
    // .from($page, 2, {opacity: 0, ease:Power0.easeNone},2)
    // .from($titlePage, 1, {Left: -150, opacity: 0, ease:Power0.easeNone}, 0.7)
    // .from($videoHP, 1, {opacity: 0, scale:0.7, ease: Back.easeOut }, 0.7)
    //.staggerFrom($link, 1, {marginTop: 20, opacity: 0, ease:Power0.easeNone},0.2);

    $(window).on('scroll', function () {
        if (!scrollTimeout) {
            scrollTimeout = setTimeout(function () {

                animateSchema();

                scrollTimeout = null;
            }, throttle);
        }
    });

    function animateSchema() {
        if (bcl == 0) {
            if ($('#schemaAccueil').hasClass('vs-show')) {
                bcl = 1;
                console.log('lancer anim');

                TweenMax.staggerTo([$('#blocAgiter'), $('#gaucheTrait'), $('#blocFed'), $('#droitTrait'), $('#blocDev'), $('#blocRobotics')], 1, {
                    opacity: 1,
                    ease: Power4.easeInOut,
                }, 0.6, showBtn);

            }
        }
    }

    function showBtn() {
        TweenMax.to([$('#btnLeft'), $('#btnRight')], 1, {
            opacity: 1,
            ease: Power4.easeInOut,
        })
    }

    function hoverHomeBtn() {
        $('#Ellipse_2_copie_4-2').hover(function () {
            TweenMax.to($('#coo'), 0.6, {
                y: "0",
                opacity: 1,
                ease: Power4.easeInOut
            });
        });
        $('#Ellipse_2_copie_4-2-3').hover(function () {
            TweenMax.to($('#acc'), 0.6, {
                y: "0",
                opacity: 1,
                ease: Power4.easeInOut
            });
        })
    }





    $(document).ready(function () {
        //initHome()
        hoverHomeBtn()
    });


})(jQuery);
