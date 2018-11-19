<?php
/*
* Template Name: Ressources
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
              <?php if(is_user_logged_in()){ ?>
                 <?php the_field('contenu','options'); ?>
                <?php if ( have_rows('liste_ressources', 'options') ): ?>
                    <h2>Liste de ressources</h2>
                  <ul class="liste_ressources">
                    <?php while ( have_rows('liste_ressources', 'options') ) : the_row(); ?>
                      <li class="pure-g gutters">
                            <div class="pure-u-2-3">
                                <?php the_sub_field('nom_ressources'); ?>
                            </div>
                            <div class="pure-u-1-3 center">
                                <a class="button button__voirFiche button--violet center" target="_blank" href="<?php the_sub_field('fichier');?>">Voir ressource</a>
                            </div>
                            </li>
                    <?php endwhile; ?>
                  </ul>
                <?php endif; ?>
                <?php if ( have_rows('archives_newsletter', 'options') ): ?>
                    <h2>Archive newsletter</h2>
                  <ul class="liste_ressources">
                    <?php while ( have_rows('archives_newsletter', 'options') ) : the_row(); ?>
                      <li class="pure-g gutters">
                          <div class="pure-u-2-3">
                              <?php the_sub_field('nom_newsletter'); ?>
                          </div>
                          <div class="pure-u-1-3 center">
                              <a class="button button__voirFiche button--violet center" target="_blank" href="<?php the_sub_field('fichier');?>">Voir newsletter</a>
                          </div>
                        </li>
                    <?php endwhile; ?>
                  </ul>
                <?php endif; ?>
              <?php } ?>
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
<?php get_footer() ?>
