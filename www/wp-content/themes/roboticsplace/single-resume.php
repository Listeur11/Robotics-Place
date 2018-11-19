<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php
/**
 * The template for displaying all single posts
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 * @package Robotics_Place
 */

get_header(); ?>

        <div class="vs-section">
            <?php
		while ( have_posts() ) :
			the_post(); ?>
      <div class="container">
          <div class="pure-g gutters">
              <div class="pure-u-1">
                  <a href="<?php bloginfo('url');?>/cvtheques/" class="link link--blue"><i class="fas fa-long-arrow-alt-left pink"></i><?php pll_e('Retour à tous les CV'); ?></a>
              </div>
              <div class="pure-u-1">
                  <div class="pure-g">
                      <h1 class="resume-title title pure-u-1">
                          <?php the_title(); ?>
                      </h1>
                  </div>
              </div>
          </div>
      </div>
      <div class="container">
          <div class="pure-g gutters">
              <div class="pure-u-1 article-container">
                  <div class="txt-article">
                      <?php the_content(); ?>
                  </div>
              </div>
          </div>
          <div class="previous-post">
              <?php previous_post_link( '%link','< CV précédent' ) ?>
          </div>
          <div class="next-post">
              <?php next_post_link( '%link','CV suivant >' ) ?>
          </div>
      </div>
			<?php
      //the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
//			if ( comments_open() || get_comments_number() ) :
//				comments_template();
//			endif;

		endwhile; // End of the loop.
		?>
                <!-- END CONTAINER -->
                <div class="pushFooter"></div>
        </div>
        <?php get_footer(); ?>
