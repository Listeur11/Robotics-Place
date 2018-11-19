<?php
/*
    Template Name: Page Actualites
    Description: Page template actus
*/
get_header();?>

    <div class="vs-section">
        <div class="container">
            <div class="pure-g gutters">
                <div class="pure-u-1">
                    <div class="pure-g">
                        <h1 class="title pure-u-1">
                            <?php the_title(); ?>
                        </h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="container container-mobile-no-padding">
            <div class="pure-g gutters">
                <div class="pure-u-1 pure-u-md-2-3">
                   <hr>
                    <h2 class="left  marginTop">
                        <?php pll_e('À la une'); ?>
                    </h2>
                    <?php echo do_shortcode('[facetwp facet="cat_actu"]'); ?>
                    <div class="pure-g gutters pure-u-md-1-2">
                            <?php echo do_shortcode( '[facetwp pager="true"]' ); ?>
                    </div>
                    <div class="pure-g gutters pure-u-md-1-2">
                            <?php echo do_shortcode( '[facetwp counts="true"]' ); ?>
                    </div>
                    <div class="" data-item-width="100%"  id="actu">
                        <ul class="list-1">
                            <?php echo facetwp_display( 'template', 'actualites' ); ?>
                        </ul>
                    </div>
                    <div class="pure-g gutters pure-u-md-1-2">
                            <?php echo do_shortcode( '[facetwp pager="true"]' ); ?>
                    </div>
                    <div class="pure-g gutters pure-u-md-1-2">
                            <?php echo do_shortcode( '[facetwp counts="true"]' ); ?>
                    </div>
                   <hr>

                    <div id="event">
                        <h2 class="left  marginTop">
                            <?php pll_e('Évènements');?>
                        </h2>
                        <p>
                            <?php pll_e('Les dates à ne pas manquer');?>
                        </p>
                        <ul>
                            <?php //WP_Query pour afficher les evenements
                            $args_event = array(
                                'post_type' => 'post',
                                'posts_per_page' => 3,
                                'category_name' => 'evenements',
                            );
                            $event_Actu = new WP_Query($args_event);
                            //print_r($event_Actu)?>
                            <?php while ($event_Actu -> have_posts()) : $event_Actu -> the_post(); ?>
                            <li class="pure-g gutters event-list-item">
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
                        </ul>
                    </div>

                </div>
                <div class="pure-u-1 pure-u-md-1-3" id="social">
                   <hr>

                    <h2 class="left  marginTop">
                        <?php pll_e('Sur les réseaux sociaux');?>
                    </h2>
                    <a class="twitter-timeline" data-lang="fr" data-width="300" data-height="850" data-dnt="true" data-link-color="#474292" href="https://twitter.com/RoboticsPlace?ref_src=twsrc%5Etfw">Tweets de RoboticsPlace</a>
                    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                </div>
            </div>
            <!-- END CONTAINER -->
            <div class="pushFooter"></div>
        </div>
    </div>
    <?php get_footer();
