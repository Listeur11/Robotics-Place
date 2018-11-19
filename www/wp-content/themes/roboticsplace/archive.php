<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Robotics_Place
 */

get_header();
?>

        <div class="vs-section">
            <div class="container">
                <div class="pure-g gutters">
                    <div class="pure-u-1">
                        <div class="pure-g">
                            <h1 class="title pure-u-1"><?php wp_title(''); ?></h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="pure-g">
                    <div class="pure-u-1 pure-u-md-2-3" id="actu">
                        <h2 class="left  marginTop">À la une</h2>
                        <div class="mobile-slider show-arrows" data-item-width="100%">
                            <ul class="list-1">
                                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                                <li class="pure-g gutters actu-list-item">
                                    <div class="pure-u-1 pure-u-md-1-4 flex flex--column">
                                        <span class="date"><i class="fas fa-location-arrow"></i><?php the_time('j F Y'); ?></span>
                                        <?php if(get_the_post_thumbnail() ) : ?>
                                        <div class="img-post-thumbnail">
                                            <?php the_post_thumbnail('large'); ?>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="pure-u-1 pure-u-md-3-4">
                                        <b class="actuCategorie">
                                           <?php the_category(', '); ?>
                                       </b>
                                       <a href="<?php the_permalink() ?>">
                                            <h5 class="titre3">
                                                <?php the_title(); ?>
                                            </h5>
                                        </a>
                                        <h5 class="titre3">
                                            <?php the_title(); ?>
                                        </h5>
                                    </div>
                                </li>
                                <?php endwhile; endif; ?>


                                <li class="pure-g gutters event-list-item">
                                    <div class="pure-u-1  flex flex--column">
                                        <a class="button button__classic button--blue " href="#">
                                            <div></div><span></span>Plus d'actualités</a>
                                    </div>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <div class="pure-u-1 pure-u-md-1-3" id="social">
                        <h2 class="left  marginTop">Sur les réseaux sociaux</h2>
                        <a class="twitter-timeline" data-lang="fr" data-width="320" data-height="850" data-dnt="true" data-link-color="#474292" href="https://twitter.com/RoboticsPlace?ref_src=twsrc%5Etfw">Tweets de RoboticsPlace</a>
                        <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                    </div>
                </div>
            </div>
            <!-- END CONTAINER -->
            <div class="pushFooter"></div>
        </div>
        <?php get_footer() ?>
