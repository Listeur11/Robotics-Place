<?php
/*
    Template Name: Sous-Page Mission
    Description: template de page pour les sous pages de la partie mission
*/
get_header(); ?>

    <div class="vs-section">
        <div class="decort"><span><?php the_title(); ?></span></div>
        <div class="container" id="timeline">
            <div class="pure-g gutters textCenter ">
                <div class="pure-u-1 textLeft">
                    <a href="<?php bloginfo('url');?>/missions" class="link link--blue link__retour"><i class="fas fa-long-arrow-alt-left pink"></i><?php pll_e('Retour Missions'); ?></a>
                </div>
                <h4 class="titre2 pure-u-1">
                    <?php the_title(); ?>
                </h4>
                <h1 class="title pure-u-1 ">
                    <?php the_field('titre'); ?>
                </h1>
                <div class="center  pure-u-1 intro limitWidthText2">
                    <?php the_field('texte_introduction') ?>
                </div>
            </div>
            <?php if ( have_rows('repeteur_timeline') ): ?>
            <div >
                <?php while ( have_rows('repeteur_timeline') ) : the_row();
                        $cat = get_sub_field('categorie');
                        $title = get_sub_field('titre');
                        $content = get_sub_field('texte');
                ?>
                <section class="item_timeline pure-g gutters flex flex--center vs-div" data-scroll>
                    <div class="pure-u-1 pure-u-sm-1-2 cote1">
                        <b class="titleSection "><?php echo $cat; ?></b>
                    </div>
                    <div class="relative  pure-u-1 pure-u-sm-1-2 pure-u-lg-5-12  cote2">
                        <div class="whiteBg">
                            <h3 class="headerSection">
                                <?php echo $title; ?>
                            </h3>
                            <?php echo $content; ?>
                        </div>
                    </div>
                </section>
                <?php endwhile; ?>
            </div>
            <?php endif; ?>
        </div>
        <!-- END CONTAINER -->
        <div class="container">
            <div class="pure-g flex flex--justifyFlexEnd">
                <div class="pure-u-1 whiteBg whiteBg--fullWidthXS centerBloc marginTop">
                    <div class="pure-g  flex flex--baseline">
                        <img class="barreVerticale" src="<?php bloginfo('template_url');?>/images/icons/barreVerticale.svg" alt="section formulaire">
                        <h3 class="fadeBlue textCenter pure-u-1">
                            <?php the_field('formulaire_sous_titre'); ?>
                        </h3>
                        <div class="pure-u-1 ">
                            <h2 class="title1 title1--form center textCenter">
                                <?php the_field('formulaire_titre'); ?>
                            </h2>
                        </div>
                        <img class="barreVerticale" src="./images/icons/barreVerticale.svg" alt="">
                        <div class="pure-u-1 pure-u-sm-2-3 pure-u-md-2-5 center">
                            <?php echo do_shortcode( '[gravityform id="1" title="false" description="false" ]' ); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="pushFooter"></div>
    <?php get_footer() ?>
