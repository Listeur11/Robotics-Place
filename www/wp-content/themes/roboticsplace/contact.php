<?php
/*
    Template Name: Page Contact
    Description: Page template Partenariats
*/
get_header(); ?>

    <div class="vs-section">
        <div class="decort"><span>contact</span></div>

        <div class="container" id="tti">

            <div class="left--pushed marginTop limitWidthText" id="renseignements">
                <h1 class="left title">Besoin de renseignements? <br> Contactez-nous et précisez-nous votre projet</h1>
                <div class="link"><i class="fas fa-phone"></i><a href="#">06 8802 0350</a></div>
                <div class="link"><i class="fas fa-envelope"></i><a href="">contact@robotics-place.com </a></div>
            </div>

            <div class="pure-g gutters flex flex--justifyFlexEnd" >
                <div class="pure-u-1 pure-u-md-2-3 whiteBg hiteBg--fullWidthXS whiteBg--paddingSides rightBloc">
                    <div class="pure-g gutters flex flex--baseline">
                        <img class="barreVerticale" src="<?php echo get_template_directory_uri(); ?>/images/icons/barreVerticale.svg" alt="">

                        <div class="pure-u-1 pure-u-sm-2-3 pure-u-md-4-5 center">
                            <?php echo do_shortcode( '[gravityform id="2" title="false" description="false" ]' ); ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- END CONTAINER -->
        <div class="pushFooter"></div>

    </div>
    <script src="<?php echo get_template_directory_uri(); ?>/js/customSelectForm.js"></script>
    <?php get_footer() ?>
