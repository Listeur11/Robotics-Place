<?php
/*
    Template Name: Page Mission
    Description: Page template mission
*/

$encartC = get_field('encart_mission_clients');
$encartA = get_field('encart_mission_adherents');
$btnEncart = get_field('btn_encart');
get_header(); ?>

    <div class="vs-section">
        <div class="decort"><span><?php the_title(); ?></span></div>
        <div class="container">
            <div class="pure-g gutters">

                <h1 class="title pure-u-1  pure-u-md-4-5 pure-u-lg-2-3">
                    <?php the_field('titre'); ?>
                </h1>

                <div class="whiteBloc flex flex--center flex--justifyCenter marginTop" id="ctaMissions">
                    <a href="<?php echo $encartC['link_encart']; ?>" class="leftBtn flex flex--center flex--justifyCenter">
                        <p class="relative">
                            <?php echo $encartC['texte_mission_client']; ?>
                        </p><img class="relative" src="<?php echo get_template_directory_uri(); ?>/images/icons/fleche.svg" alt="">
                        <div class="paternMission">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/paterns/mission-client.svg" alt="">
                        </div>
                    </a>
                    <a href="<?php echo $encartA['link_page']; ?>" class="leftBtn flex flex--center flex--justifyCenter">
                        <p class="relative">
                            <?php echo $encartA['texte_mission_adherents']; ?>
                        </p><img class="relative" src="<?php echo get_template_directory_uri(); ?>/images/icons/fleche.svg" alt="">
                        <div class="paternMission">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/paterns/mission-adherent.svg" alt="">
                        </div>
                    </a>
                    <img class="barreVerticale" src="<?php echo get_template_directory_uri(); ?>/images/icons/barreVerticale.svg" alt="">
                </div>
                <h2 class="pure-u-1 " id="catalyseurTitle">
                    <?php the_field('titre_catalyseur_des_energies'); ?>
                </h2>
                <?php if ( have_rows('repeteur_texte_image') ): ?>
                <div class="pure-u-1 ">
                    <?php while ( have_rows('repeteur_texte_image') ) : the_row();
                            $img = get_sub_field('image');
                            $title = get_sub_field('titre');
                            $content = get_sub_field('texte');
                        ?>
                    <div class="pure-g gutters invertOneOverTwo marginTop flex flex--center">
                        <div class="pure-u-1 pure-u-sm-1-2">
                            <img class="center" src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt'] ?>" />
                        </div>
                        <div class="pure-u-1 pure-u-sm-1-2 flex flex--justifyCenter">
                            <div>
                                <h3 class="barreAvant">
                                    <?php echo $title; ?>
                                </h3>
                                <?php echo $content; ?>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
                <?php endif; ?>


            </div>

        </div>
        <div class="container Shape_container">
            <img class="shape_actu_RightBot" src="<?php echo get_template_directory_uri(); ?>/images/paterns/decoRC1.svg" alt="">
            <img class="shape_actu_LeftBot" src="<?php echo get_template_directory_uri(); ?>/images/paterns/transparents/decoLA3.svg" alt="">
                <div class="pure-g fullwithMobile parentEncart">
                    <div class="pure-u-1 flex flex--center">
                      <?php
                        $EncartLeft = get_field('encart_de_gauche');
                        $EncartRight = get_field('encart_de_droite');
                        if( $EncartLeft ): ?>
                        <div class="pure-g pure-u-1-2 flex encartBoutton flex--center flex--justifyCenter vs-div" data-speed="0.02">
                            <div class="pure-u-1 pure-u-sm-10-12 pure-u-md-2-3 ">
                                <h4>
                                    <?php echo $EncartLeft['sur-titre'] ?>
                                </h4>
                                <h5>
                                    <?php  echo $EncartLeft['titre_encart'] ?>
                                </h5>
                                <?php if ($btnEncart): ?>
                                <div class="flex flex--justifyCenter">
                                    <a class="button button__classic button--blue button--margin" href="<?php echo $btnEncart['lien_vers_page']; ?>"><span></span><?php echo $btnEncart['titre']; ?></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php endif;
                        if( $EncartRight ): ?>
                        <div class="pure-g pure-u-1-2 flex encartBoutton flex--center flex--justifyCenter vs-div" data-speed="0.02">
                            <div class="pure-u-1 pure-u-sm-10-12 pure-u-md-2-3 ">
                                <h4>
                                    <?php echo $EncartRight['sur-titre'] ?>
                                </h4>
                                <h5>
                                    <?php  echo $EncartRight['titre_encart'] ?>
                                </h5>
                                <?php $btnEncartRight = $EncartRight['btn_encart'];
                                if ($btnEncartRight): ?>
                                <div class="flex flex--justifyCenter">
                                    <a target="_blank" class="button button__classic button--blue button--margin" href="<?php echo $btnEncartRight['lien_vers_page']; ?>"><span></span><?php echo $btnEncartRight['titre']; ?></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <!-- END CONTAINER -->
        <div class="pushFooter"></div>
    </div>
    <?php get_footer() ?>
