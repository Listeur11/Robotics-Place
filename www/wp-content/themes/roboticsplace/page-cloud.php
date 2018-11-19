<?php
/*
* Template Name: Cloud
*/

$options = array(
  'id' => 'form-cloud',
  'post_id' => false,
  'new_post' => false,
  'field_groups' => false,
  'fields' => array(
    'field_5ba21d13f80fc',
  ),
  'updated_message' => __("Lancer le chargement", 'acf'),
  'html_submit_button'	=> '<input type="submit" class="button button__classic button--blue" value="Fiche mise à jour" />',
  'uploader' => 'basic',
  'honeypot' => true,
  'kses'	=> true
);
acf_form_head();
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
        <?php if (current_user_can('membre') || current_user_can('administrator') || current_user_can('editor-big')) :?>
        <div class="pure-g gutters">
            <div class="pure-u-1 pure-u-md-1-3 mon-compte-menu">
                <?php do_action( 'woocommerce_account_navigation' );  ?>
            </div>
            <div class="pure-u-1 pure-u-md-2-3 mon-compte-poste-form">
              <?php if(is_user_logged_in()){
                   if ( have_rows('liste_element') ): ?>
                    <ul>
                      <?php while ( have_rows('liste_element') ) : the_row();
                        $file = get_sub_field('fichier');?>
                        <li><a href="<?php echo $file['url']; ?>"><?php echo $file['filename']; ?></a></li>
                      <?php endwhile; ?>
                    </ul>
                  <?php endif;
                  echo '<h2>';
                  pll_e('Ajouter un fichier');
                  echo '</h2>';
                  acf_form($options);
              } ?>
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
<?php acf_enqueue_uploader();
get_footer() ?>
