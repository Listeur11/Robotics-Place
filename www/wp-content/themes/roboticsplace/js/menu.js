(function ($) {

    function OpenClose() {
        if ($("#menu").is(".open")) {
            $("#menu").removeClass("open");
            $("#toggle").removeClass("x");
            $(".container").removeClass("bodyBlur");
            $('html').removeClass('notScrollable');
            // FERMETURE DU MENU
            //Logo
            //        TweenMax.to($('.Logo--A'), 0.2, {
            //            css: {
            //                y: "0px",
            //                opacity: 0
            //            }
            //        });
            // Effacement Liens de Menu
            //        TweenMax.staggerTo(liens, 0.2, {
            //            opacity: 0,
            //            y: -20,
            //            skewX: "-30deg",
            //            ease: Power2.easeOut,
            //            ease: Quad.easeInOut
            //        }, 0.05, resetOpacityLinks);
            //
            //        function resetOpacityLinks() {
            //            TweenMax.set(liens, {
            //                clearProps: "all"
            //            });
            //        }
            //        //Rectangle bleu
            //
            //        TweenMax.to($(".bleuRect"), 0.6, {
            //            height: '0%',
            //            ease: Power4.easeInOut
            //        }).delay(0.3);

            //On enlève la classe .open
            //        setTimeout(function () {
            //            $("#menu").removeClass("open");
            //            $("#toggle").removeClass("x");
            //
            //        }, 800);


        } else {

            $("#menu").addClass("open");
            $("body").addClass(".blurContent");
            $("#toggle").addClass("x");
            $(".container").addClass("bodyBlur");
            $('html').addClass('notScrollable');
            // OUVERTURE DU MENU
            //        TweenMax.to($(".bleuRect"), animDuration, {
            //            height: '100%',
            //            ease: Power4.easeInOut
            //        }).delay(0.1);
            //        setTimeout(function () {
            //            TweenMax.staggerTo(liens, 0.4, {
            //                opacity: 1,
            //                skewX: "0deg",
            //                y: "0px",
            //                ease: Power2.easeOut,
            //                ease: Quad.easeInOut
            //            }, 0.05);
            //        }, 400);
            //
            //        TweenMax.to($('.Logo--A'), 0.8, {
            //            css: {
            //                y: "5px",
            //                opacity: 1
            //            },
            //            ease: Quad.easeInOut
            //        }).delay(0.9);

        }
    }


    function OpenCloseSeconnecter() {
        if ($("#menu").is(".seconnecter")) {
            $("#menu").removeClass("seconnecter");
            $('.menu-main-menu-container').show();

            // FERMETURE DU MENU

        } else {

            $("#menu").addClass("seconnecter");
            $('.menu-main-menu-container').hide();
        }
    }

    function MenuCollapseSeconnecter() {
        $("#seconnecter").on("click", function () {
            OpenCloseSeconnecter();
        })
    }

    function MenuCollapse() {

        $("#toggle").on("click", function () {
            OpenClose();
        })


    }

    // STICKY HEADER
    function onScroll() {
        // When the user scrolls the page, execute myFunction 
        window.onscroll = function () {
            myFunction()
        };

        // Get the header
        var header = document.getElementById("menu");

        // Get the offset position of the navbar
        var sticky = header.offsetTop;

        function myFunction() {
            if (window.pageYOffset > sticky) {
                header.classList.add("sticky");
            } else {
                header.classList.remove("sticky");
            }
        }
    }


    // Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position


    function iconeSeConnecter() {
        $('.login-username label').append('<i class="fas fa-user"></i>');
        $('.login-password label').append('<i class="fas fa-lock"></i>');

        $('#user_login').attr('placeholder', 'e-mail');
        $('#user_pass').attr('placeholder', 'mot de passe');
    }

    
    $(document).ready(function () {
        MenuCollapse();
        MenuCollapseSeconnecter();
        iconeSeConnecter();
        onScroll();
        //console.log(mobile);
    });



})(jQuery);
