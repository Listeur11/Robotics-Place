(function ($) {
    // HIDE ALL SIDE TEXT
    function hideAll() {
        $('#lecluster').css({
            "display": "none",
            "opacity": "0"
        });
        $('#RobotiqueServ').css({
            "display": "none",
            "opacity": "0"
        });
        $('#RobotiqueIndus').css({
            "display": "none",
            "opacity": "0"
        });
        $('#Drones').css({
            "display": "none",
            "opacity": "0"
        });
        $('#poleRecherche').css({
            "display": "none",
            "opacity": "0"
        });
        $('#poleFournisseurs').css({
            "display": "none",
            "opacity": "0"
        });
        $('#poleBesoin').css({
            "display": "none",
            "opacity": "0"
        });
        $('#poleFormation').css({
            "display": "none",
            "opacity": "0"
        });

        $('#dasGlobal').css({
            "display": "none",
            "opacity": "0"
        });
        $('#polesGlobal').css({
            "display": "none",
            "opacity": "0"
        });


    }
    //MAKE BTN ACTIVE

    function makeBtnActive(a) {
        $('.button__cluster').removeClass('button__cluster--active');
        a.addClass('button__cluster--active');
    }
    //MAKE TEXT ACTIVE
    function makeTextActive(b) {
        hideAll();

        b.css({
            "display": "block",
            "opacity": "1"
        });
    }
    //MAKE ELEMENT SMALL
    function smaller(c) {

        $('.smallCircle').removeClass('deploy');
        $('.bigCircle').removeClass('normal deploy');
        $('#bgCircleCluster').removeClass('normal deploy');
        c.addClass('small');
    }

    //MAKE ELEMENT DEPLOY
    function deploy(c) {
        $('.smallCircle').removeClass('deploy');
        $('.bigCircle').removeClass('deploy');
        $('#bgCircleCluster').removeClass('deploy');
        c.addClass('deploy');
    }
    // TOP LEFT BIG CIRCLE ACTIV
    function formationActiv() {
        $('.big--topLeft').bind("hover", (function (event) {
            hideHoverBigCircle();
            $('.big--topLeft').addClass('hovered');
        }));
        $('.big--topLeft').bind("click", (function (event) {
            hideAll();
            $('#poleFormation').css({
                "display": "block",
                "opacity": "1"
            });
        }));
    }
    // TOP RIGHT BIG CIRCLE ACTIV
    function rechercheActiv() {
        $('.big--topRight').bind("hover", (function (event) {
            hideHoverBigCircle();
            $('.big--topRight').addClass('hovered');
        }));
        $('.big--topRight').bind("click", (function (event) {
            hideAll();
            $('#poleRecherche').css({
                "display": "block",
                "opacity": "1"
            });
        }));
    }
    // BOTTOM RIGHT BIG CIRCLE ACTIV
    function fournisseurActiv() {
        $('.big--bottomRight').bind("hover", (function (event) {
            hideHoverBigCircle();
            $('.big--bottomRight').addClass('hovered');
        }));
        $('.big--bottomRight').bind("click", (function (event) {
            hideAll();
            $('#poleFournisseurs').css({
                "display": "block",
                "opacity": "1"
            });
        }));
    }
    // BOTTOM LEFT BIG CIRCLE ACTIV
    function besoinActiv() {
        $('.big--bottomLeft').bind("hover", (function (event) {
            hideHoverBigCircle();
            $('.big--bottomLeft').addClass('hovered');
        }));
        $('.big--bottomLeft').bind("click", (function (event) {
            hideAll();
            $('#poleBesoin').css({
                "display": "block",
                "opacity": "1"
            });
        }));
    }


    //UNBIND DAS
    function unbindDas() {
        $('.middleTop').unbind();
        $('.middleLeft').unbind();
        $('.middleRight').unbind();
    }
    //UNBIND POLES
    function unbindPole() {
        $('.big--topLeft').unbind();
        $('.big--topRight').unbind();
        $('.big--bottomLeft').unbind();
        $('.big--bottomRight').unbind();
    }

    //MIDDLE LEFT BLOC ACTIV
    function droneActiv() {

        $('.middleLeft').bind("hover", (function (event) {
            hideHoverMiddleBloc();
            $('#dronesPart').addClass('hovered');
        }));
        $('.middleLeft').bind("click", (function (event) {
            hideAll();
            $('#Drones').css({
                "display": "block",
                "opacity": "1"
            });
        }));
    }
    //MIDDLE RIGHT BLOC ACTIV
    function ronIndusActiv() {
        $('.middleRight').bind("hover", (function (event) {
            hideHoverMiddleBloc();
            $('#robIndus').addClass('hovered');
        }));
        $('.middleRight').bind("click", (function (event) {
            hideAll();
            $('#RobotiqueIndus').css({
                "display": "block",
                "opacity": "1"
            });
        }));
    }
    //MIDDLE BLOC ACTIV
    function robServActiv() {
        $('.middleTop').bind("hover", (function (event) {
            hideHoverMiddleBloc();
            $('#robServ').addClass('hovered');
        }));
        $('.middleTop').bind("click", (function (event) {
            hideAll();
            $('#RobotiqueServ').css({
                "display": "block",
                "opacity": "1"
            });
        }));
    }
    //BEFORE HOVER OTHER - SMALL CIRCLE
    function hideHoverMiddleBloc() {
        $('#robIndus').removeClass('hovered');
        $('#dronesPart').removeClass('hovered');
        $('#robServ').removeClass('hovered');
    }
    //BEFORE HOVER OTHER - BIG CIRCLE 
    function hideHoverBigCircle() {
        $('.big--topLeft').removeClass('hovered');
        $('.big--topRight').removeClass('hovered');
        $('.big--bottomLeft').removeClass('hovered');
        $('.big--bottomRight').removeClass('hovered');
    }

    //
    //LES DAS HOVERED
    //
    function smallCercleNotHovered() {
        $('.smallCircle').removeClass('over');
    }

    function smallCercleHovered() {

        $('.smallCircle').addClass('over');
    }

    function dasHovered() {
        // BTN HOVERED
        $('#btnDas').hover(function () {
            smallCercleHovered();
        }, function () {
            smallCercleNotHovered();
        });
        // SMALL CIRCLE HOVERED
        if (!$('.smallCircle').hasClass('.deploy')) {
            $('.smallCircle').hover(function () {
                smallCercleHovered();
            }, function () {
                smallCercleNotHovered();
            });

            $('#btn2').click(function () {
                dasClick();
            });
        }
    }

    //
    // LES DAS CLICKED
    //
    function dasClick() {

        unbindPole();
        makeBtnActive($('#btnDas'));
        $('.smallCircle').removeClass('small');

        $('#dasSelect').removeClass('hideSelect');
        $('#polesSelect').addClass('hideSelect');

        makeTextActive($('#dasGlobal'));
        deploy($('.smallCircle'));
        robServActiv();
        ronIndusActiv();
        droneActiv();

        hideHoverBigCircle();
    }

    function dasBindClick() {
        $('#btnDas').click(function () {
            dasClick();
        })
    }
    //
    // LES POLES CLICKED
    //
    function polesClick() {
        unbindDas();
        makeBtnActive($('#btnPoles'));
        makeTextActive($('#polesGlobal'));
        smaller($('.smallCircle'));
        deploy($('.bigCircle'));

        $('#dasSelect').addClass('hideSelect');
        $('#polesSelect').removeClass('hideSelect');

        formationActiv();
        rechercheActiv();
        fournisseurActiv();
        besoinActiv();

        hideHoverMiddleBloc();
    }

    function polesBindClick() {
        $('#btnPoles').click(function () {
            polesClick();
        })
    }

    //
    //LES POLES HOVERED
    //
    function bigCercleNotHovered() {
        $('.bigCircle').removeClass('over');
    }

    function bigCercleHovered() {
        $('.bigCircle').addClass('over');
    }

    function polesHovered() {
        // BIG CIRCLE BTN HOVERED
        $('#btnPoles').hover(function () {
            bigCercleHovered();
        }, function () {
            bigCercleNotHovered();
        });

        // BIG CIRCLE HOVERED
        if (!$('.bigCircle').hasClass('.deploy')) {

            $('.bigCircle').hover(function () {
                bigCercleHovered();
            }, function () {
                bigCercleNotHovered();
            });

            $('#Layer_1').click(function () {
                polesClick();
            });
        }

    }
    //INIT CLUSTER
    function initCluster() {
        unbindDas();
        unbindPole();
        makeBtnActive($('#btnCluster'));
        makeTextActive($('#lecluster'));
        deploy($('#bgCircleCluster'));
        $('.smallCircle').removeClass('small');

        $('#dasSelect').addClass('hideSelect');
        $('#polesSelect').addClass('hideSelect');
        hideHoverMiddleBloc();
        hideHoverBigCircle();
    }

    // CLUSTER CLICKED
    function clusterClick() {
        $('#btnCluster').click(function () {
            initCluster();
        });
    }


    // CLUSTER HOVERED

    function clusterCercleHovered() {
        $('#bgCircleCluster').addClass('bgClusterHovered');
    }

    function clusterCercleNotHovered() {
        $('#bgCircleCluster').removeClass('bgClusterHovered');
    }

    function clusterHovered() {
        $('#btnCluster').hover(function () {
            clusterCercleHovered();
        }, function () {
            clusterCercleNotHovered();
        });

        // CLUSTER CIRCLE HOVERED
        if (!$('.bigCircleCluster').hasClass('.deploy')) {

            $('.clusterCircle').hover(function () {
                clusterCercleHovered();
            }, function () {
                clusterCercleNotHovered();
            });

            $('.clusterCircle').click(function () {
                initCluster();
            });
        }

    }
    // FONCTION MEMBRES
    function membresBureau() {
        //METTRE PREMIER MEMBRE ACTIF
        $('#membres li.event-list-item').first().addClass('active');
        
        
        //MEMBRE AU HOVER
        $('#membres li.event-list-item').hover(function () {
            $('#membres li.event-list-item').removeClass('active');
            $(this).addClass('active');
        })
    }


    //DETECT IF SMALL VIEWPORT
    var Width = window.innerWidth;
    var mobile = true;

    function detectViewport(Width) {

        if (Width < 768) {
            mobile = true;
        } else {
            mobile = false;

        }
    }

    $(window).resize(function Viewport() {
        Width = window.innerWidth;
        detectViewport(Width);
        console.log(mobile);

    });

    //SELECT CONTENT ON MOBILE
    function mobileSelect() {
        //        $("#options1").change(function () {
        //            hideAll();
        //            console.log($(this).val());
        //            $('#' + $(this).val()).css({
        //                "display": "block",
        //                "opacity": "1"
        //            });
        //        });
        $('#dasSelect .select-items > div').eq(0).click(function () {
            hideAll();
            $('#RobotiqueServ').css({
                "display": "block",
                "opacity": "1"
            });
        });
        $('#dasSelect .select-items > div').eq(1).click(function () {
            hideAll();
            $('#RobotiqueIndus').css({
                "display": "block",
                "opacity": "1"
            });
        });
        $('#dasSelect .select-items > div').eq(2).click(function () {
            hideAll();
            $('#Drones').css({
                "display": "block",
                "opacity": "1"
            });
        });
        
        
        $('#polesSelect .select-items > div').eq(0).click(function () {
            hideAll();
            $('#poleRecherche').css({
                "display": "block",
                "opacity": "1"
            });
        });
        $('#polesSelect .select-items > div').eq(1).click(function () {
            hideAll();
            $('#poleFournisseurs').css({
                "display": "block",
                "opacity": "1"
            });
        });
        $('#polesSelect .select-items > div').eq(2).click(function () {
            hideAll();
            $('#poleBesoin').css({
                "display": "block",
                "opacity": "1"
            });
        });
        $('#polesSelect .select-items > div').eq(3).click(function () {
            hideAll();
            $('#poleFormation').css({
                "display": "block",
                "opacity": "1"
            });
        });


    }
    // DOCUMENT READY
    $(document).ready(function () {
        mobileSelect();
        detectViewport(Width);
        clusterHovered();
        clusterClick();
        polesBindClick();
        dasBindClick();
        dasHovered();
        polesHovered();
        membresBureau();
        initCluster();

        mobileSelect();

    });






})(jQuery);
