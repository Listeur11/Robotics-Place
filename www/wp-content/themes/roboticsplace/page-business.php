<?php
/*
* Template Name: Page Business
*/

get_header();?>
<div class="vs-section">
    <div class="container">
        <div class="pure-g gutters">
            <div class="pure-u-1">
                <div class="pure-g">
                    <h1 class="title pure-u-1 pure-u-md-1-2"><?php the_title(); ?></h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <?php if (current_user_can('adherent') || current_user_can('membre') || current_user_can('administrator') || current_user_can('editor-big')) :?>
        <div class="pure-g gutters">
            <div class="pure-u-1 pure-u-md-1-3 mon-compte-menu">
                <?php do_action( 'woocommerce_account_navigation' );  ?>
            </div>
            <div class="pure-u-1 pure-u-md-2-3 mon-compte-poste-form">
              <?php if ( have_rows('appel_a_projets') ): ?>
                  <h3><?php pll_e('Appel à projets') ?></h3>
                  <div class="liste_projets">
                      <?php while ( have_rows('appel_a_projets') ) : the_row(); ?>
                        <p class="item_projet"><?php the_sub_field('nom_du_projet'); ?></p>
                        <div>
                          <?php the_sub_field('descriptif_du_projet') ?>
                        </div>
                      <?php endwhile; ?>
                  </div>
              <?php endif;
              if ( have_rows('appel_offre') ): ?>
                  <h3><?php pll_e('Appel d\'offres') ?></h3>
                  <div class="liste_offres">
                      <?php while ( have_rows('appel_offre') ) : the_row(); ?>
                        <p class="item_projet"><?php the_sub_field('nom_du_projet'); ?></p>
                        <div>
                          <?php the_sub_field('descriptif_du_projet') ?>
                        </div>
                      <?php endwhile; ?>
                   </div>
              <?php endif;
              if ( have_rows('appel_competence') ): ?>
                  <h3><?php pll_e('Appel à compétences') ?></h3>
                  <div class="liste_competence">
                      <?php while ( have_rows('appel_competence') ) : the_row(); ?>
                        <p class="item_projet"><?php the_sub_field('nom_du_projet'); ?></p>
                        <div>
                          <?php the_sub_field('descriptif_du_projet') ?>
                        </div>
                      <?php endwhile; ?>
                   </div>
              <?php endif; ?>
              <?php echo do_shortcode('[gravityform id="5"]');?>
            </div>
        </div>
      <?php else :
        echo '<div id="message" class="error">';
        echo 'Veuillez vous connecter pour acceder à cette page';
        echo '</div>';
      endif;?>
    </div>
    <!-- END CONTAINER -->
    <div class="pushFooter"></div>
</div>
<?php
get_footer() ?>
