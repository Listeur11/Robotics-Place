<?php
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
              <?php
	            if(is_user_logged_in())
	            {
		            // compte le nombre de fois où l'utilisateur a répondu un go ou no go. Normalement, doit valoir 0 ou 1
								$nb_response = $wpdb->get_var($wpdb->prepare("SELECT count(*) FROM rob_comments AS c LEFT JOIN rob_commentmeta AS m ON c.comment_ID = m.comment_id WHERE comment_post_ID = %d AND user_id = %d AND meta_key = 'reponse'", $post->ID, get_current_user_id()));

								echo '
								<style>
									'.($nb_response > 0 ? '#respond .acf-field-5b8e5cb2c5300 { display:none; }' : '').'
		            	li.depth-1 #respond .acf-field-5b8e5cb2c5300 { display:none; }
								</style>';


                while ( have_posts() ) :
                  the_post();

                  get_template_part( 'template-parts/content-go', get_post_type() );

                  //the_post_navigation();

                  // If comments are open or we have at least one comment, load up the comment template.
            			if ( comments_open() || get_comments_number() ) :
            				comments_template();
            			endif;

                endwhile; // End of the loop.
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
<?php //acf_enqueue_uploader();
get_footer() ?>
