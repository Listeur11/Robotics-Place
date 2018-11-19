<?php
/*
    Template Name: Page Annuaire
    Description: Page template accueil
*/
get_header(); ?>

    <div class="vs-section">

        <div class="container">
            <div class="pure-g gutters">
                <h1 class="title pure-u-1 pure-u-sm-2-3"><?php the_title();?></h1>
            </div>
            <div class="pure-u-1 relative whiteBg whiteBgRecherche" id="barreRecherche">
                <div class="pure-g gutters title-recherche">
                    <div class="pure-u-1 pure-u-sm-1 pure-u-md-1 pure-u-lg-1-6 pure-u-xl-1-5 flex--column margin-top-annuaire ">
                        <h2 class="label text-align-left">Recherche par société</h2>
                        <?php echo facetwp_display( 'facet', 'entreprise_nom' ); ?>
                    </div>
                    <div class="pure-u-1 pure-u-sm-1 pure-u-md-1 pure-u-lg-1-5 pure-u-xl-1-5  flex--column margin-top-annuaire ">
                        <h2 class="label text-align-left">DAS</h2>
                        <?php echo facetwp_display( 'facet', 'das' ); ?>
                    </div>
                    <div class="pure-u-1 pure-u-sm-1 pure-u-md-1 pure-u-lg-1-5 pure-u-xl-1-5  flex--column margin-top-annuaire ">
                        <h2 class="label text-align-left">Pôles</h2>
                        <?php echo facetwp_display( 'facet', 'poles' ); ?>
                    </div>
                    <div class="pure-u-1 pure-u-sm-1 pure-u-md-1 pure-u-lg-1-5 pure-u-xl-1-5 ` flex--column margin-top-annuaire ">
                        <h2 class="label text-align-left">Villes</h2>
                        <?php echo facetwp_display( 'facet', 'entreprise_ville' ); ?>
                    </div>
                    <div class="pure-u-1 pure-u-sm-1 pure-u-md-1 pure-u-lg-1-5 pure-u-xl-1-5 flex flex--column margin-bot-annuaire ">
                        <button class="button button__classic button--pink reset-btn" onclick="FWP.reset()">Réinitialiser</button>
                    </div>

                </div>
            </div>
        </div> <!-- end container -->
        <?php echo facetwp_display( 'facet', 'annuaire_map' ); ?>
        <div class="container">
            <?php echo facetwp_display( 'template', 'annuaire_entreprise' ); ?>
        </div>
        <div class="pushFooter"></div>
    </div>
    <?php get_footer() ?>
