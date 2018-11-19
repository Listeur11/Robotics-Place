<?php
/*
    Template Name: Page Accueil
    Description: Page template accueil
*/
get_header();
$btn = get_field('btn_page');
$link = get_field('lien');
$btn_encart = get_field('btn_encart');

//WP_Query pour afficher les evenements
$args_event_HP = array(
    'post_type' => 'post',
    'posts_per_page' => 3,
    'category__in' => 39,
);
?>
    <div class="vs-section">
        <div class="container section__topPage" >
            <div class="pure-g gutters">
                <div class="pure-u-1 pure-u-sm-1-2 " id="beforeVideo">
                    <h1 class="title titlePage"><?php the_field('titre') ?> </h1>
                    <div class="flex flex--center">
                        <?php if($btn): ?>
                        <a class="animOne button button__classic button--blue button--margin" href="<?php echo $btn['lien']; ?>"><span></span><?php echo $btn['titre']; ?></a>
                        <?php endif;
                    if($link): ?>
                        <a href="<?php echo $link['lien']; ?>" class="animTwo link link--blue linkArrow">
                            <?php echo $link['titre']; ?><i class="fas fa-long-arrow-alt-right pink"></i></a>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="pure-u-1 pure-u-sm-1-2 relative zTop" id="parentVideo">
                    <img class="shape_video__bg" src="<?php echo get_template_directory_uri(); ?>/images/paterns/transparents/decoRA1.svg" alt="">
                    <?php get_template_part('php/video'); ?>
                </div>
            </div>
        </div>
        <div class="container section__clusterHP">
            <img class="barreVerticaleHome center relative zTop vs-div"src="<?php echo get_template_directory_uri(); ?>/images/icons/barreVerticale.svg" alt="">
            <div class="pure-g gutters" id="unclusterDesengagements">
                <h2 class="left left--pushed marginTop vs-div">
                    <?php the_field('bloc_blanc_titre'); ?>
                </h2>
                <div class="pure-u-1">
                    <div class="pure-g gutters pure-u-1 flex flex--justifyFlexEnd" id="interclusting">
                        <div class="insterclustering_wrapper pure-u-1 pure-u-md-2-3 pure-u-lg-2-3 whiteBg relative vs-div center">
                            <img class="shape_cluster__bgPurpleLeft" src="<?php echo get_template_directory_uri(); ?>/images/paterns/rect_small_purple.svg" alt="RoboticsPlaces">
                            <div class="pure-g  gutters flex flex--justifyCenter">
                                <?php the_field('bloc_blanc_texte'); ?>
                            </div>
                        </div>
                        <img class="shape_cluster__bgPinkRight" src="<?php echo get_template_directory_uri(); ?>/images/paterns/decoLA2.svg" alt="RoboticsPlaces">
                    </div>
                </div>
            </div>
                <img class="shape_cluster__bgFat" src="<?php echo get_template_directory_uri(); ?>/images/paterns/transparents/decoLA1.svg" alt="">
            <div class="container relative ">
                <div class="pure-u-1 relative vs-div" id="schemaAccueil">
                    <?php get_template_part('php/schemaHome'); ?>
                </div>
            </div>
        <img class="shape_schemaHP_LeftBot" src="<?php echo get_template_directory_uri(); ?>/images/paterns/decoLA3.svg" alt="">
        </div>
        <div id="schemaAccueilMobile">
            <img src="<?php echo get_template_directory_uri(); ?>/images/img/schema-home-mobile.svg" alt="">
        </div>
        <div class="container relative container-mobile-no-padding">
            <div class="pure-g grid-actu">
                <div class="pure-u-1 pure-u-md-2-3 actu-head">
                  <h2 class="left  marginTop">
                      <?php pll_e('A la une');?>
                  </h2>
                  <p>
                      <?php pll_e('Actualité du cluster des adhérents et de la robotique');?>
                  </p>
                </div>
                <div class="pure-u-1 pure-u-md-1-3 event-head">
                  <h2 class="left  marginTop">
                      <?php pll_e('Évènements');?>
                  </h2>
                  <p>
                      <?php pll_e('Les dates à ne pas manquer');?>
                  </p>
                </div>
                <div class="pure-u-1 pure-u-md-2-3 " id="actu">

                    <ul class="list-1">
                        <?php echo facetwp_display( 'template', 'actualites' ); ?>
                    </ul>
                </div>

                <div class="pure-u-1 pure-u-md-1-3" id="event">
                    <ul>
                        <?php $event_HP = new WP_Query($args_event_HP); ?>
                        <?php while ($event_HP -> have_posts()) : $event_HP -> the_post(); ?>
                        <li class="pure-g gutters">
                            <!-- <div class="pure-u-1-3 pure-u-md-1-4 flex flex--center">
                                <div>
                                    <div class="mois">
                                        <?php //the_time('F'); ?>
                                    </div>
                                    <div class="jour">
                                        <?php //the_time('j'); ?>
                                    </div>
                                </div>
                            </div> -->
                            <div class="pure-u-2-3 pure-u-md-3-4">
                                <b class="actuCategorie"><?php the_category(', '); ?></b>
                                <a href="<?php the_permalink() ?>">
                                    <h5 class="titre3">
                                        <?php the_title(); ?>
                                    </h5>
                                </a>
                            </div>
                        </li>
                        <?php endwhile;
                    wp_reset_postdata(); ?>
                        <li class="pure-g gutters">
                            <div class="pure-u-1 pure-u-md-1-4 flex flex--column">
                                <a class="button button__classic button--blue" href="<?php bloginfo('url');?>/actualites/"><span></span><?php pll_e('Actualités');?></a>
                            </div>
                        </li>

                    </ul>

                </div>
                <img class="shape_actu_RightBot" src="<?php echo get_template_directory_uri(); ?>/images/paterns/decoRC1.svg" alt="">
                <img class="shape_actu_LeftBot" src="<?php echo get_template_directory_uri(); ?>/images/paterns/transparents/decoLA3.svg" alt="">
            </div>
        </div>
        <div class="container">
            <div class="pure-g fullwithMobile parentEncart parentEncart--violet">
                <div class="pure-u-1">
                    <div class="pure-g flex encartBoutton encartBoutton--violet  flex--center flex--justifyCenter ">
                        <div class="pure-u-1 pure-u-sm-10-12 pure-u-md-2-3 ">
                            <h4>
                                <?php the_field('sur-titre'); ?>
                            </h4>
                            <h5>
                                <?php the_field('titre_encart'); ?>
                            </h5>
                            <?php if ($btn_encart): ?>
                            <div class="flex flex--justifyCenter">
                                <a class="button button__classic button--blue button--margin" href="<?php echo $btn_encart['lien']; ?>"><span></span><?php echo $btn_encart['titre']; ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <div class="pushFooter"></div>
<div id="popin_video" class="popin_unactive">
  <div class="popin_click" data-target='#popin_video'></div>
  <div id="popin_video_player" class="wrapper_popin_video">

  </div>
</div>
    <?php get_footer() ?>
