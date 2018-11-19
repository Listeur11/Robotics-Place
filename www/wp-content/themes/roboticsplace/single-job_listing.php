<?php
get_header();
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
if ( ! get_the_company_name() ) {
	return;
}
global $post;

?>
        <div class="vs-section">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <div class="container">
                <div class="pure-g gutters textCenter ">
                    <div class="pure-u-1 textLeft">
                         <a href="<?php bloginfo('url');?>/emploi" class="link link--blue link__retour"><i class="fas fa-long-arrow-alt-left pink"></i><?php pll_e('Retour offre d\'emplois');?></a>
                    </div>
                    <h4 class="titre2 pure-u-1">EMPLOI</h4>
                </div>
            </div>
            <div class="container">
                <div class="pure-g gutters wrapper-fiche">
                    <div class="pure-u-1 pure-u-md-1-3 fiche-company-infos">
			<div class="pure-u-12 marginRight whiteBg">
			<?php if ( get_option( 'job_manager_hide_expired_content', 1 ) && 'expired' === $post->post_status ) : ?>
				<div class="job-manager-info"><?php _e( 'This listing has expired.', 'wp-job-manager' ); ?></div>
			<?php else : ?>
			<b><?php pll_e('A propos de la société');?></b> <?php
                        the_post_thumbnail();
			the_company_name( '<h2>', '</h2>' );
			the_company_tagline( '<p class="tagline">', '</p>' );
                        the_company_twitter();
			if ( $website = get_the_company_website() ) : ?>
			      <a class="button button__voirFiche button--violet" href="<?php echo esc_url( $website ); ?>" target="_blank" rel="nofollow"><?php esc_html_e( 'Website', 'wp-job-manager' ); ?></a>
			<?php endif;
			endif; ?>
			</div>

                    </div>
                    <div class="pure-u-1 pure-u-md-2-3 fiche-container">
                        <div class="txt-fiche">
                                <h1 class=" fiche-title title pure-u-1">
                                    <?php the_title(); ?>
                                </h1>
                                <?php if ( get_option( 'job_manager_hide_expired_content', 1 ) && 'expired' === $post->post_status ) : ?>
                                        <div class="job-manager-info"><?php _e( 'This listing has expired.', 'wp-job-manager' ); ?></div>
                                <?php else : do_action( 'single_job_listing_meta_before' ); ?>
                                        <ul class="job-listing-meta meta">
                                        	<?php do_action( 'single_job_listing_meta_start' ); ?>

                                        	<?php if ( get_option( 'job_manager_enable_types' ) ) { ?>
                                        		<?php $types = wpjm_get_the_job_types(); ?>
                                        		<?php if ( ! empty( $types ) ) : foreach ( $types as $type ) : ?>

                                        			<li class="job-type <?php echo esc_attr( sanitize_title( $type->slug ) ); ?>"><?php echo esc_html( $type->name ); ?></li>

                                        		<?php endforeach; endif; ?>
                                        	<?php } ?>

                                        	<li class="location"><i class="fas fa-map-marker-alt"></i><?php the_job_location(); ?></li>

                                        	<li class="date-posted"><?php the_job_publish_date(); ?></li>

                                        	<?php if ( is_position_filled() ) : ?>
                                        		<li class="position-filled"><?php _e( 'This position has been filled', 'wp-job-manager' ); ?></li>
                                        	<?php elseif ( ! candidates_can_apply() && 'preview' !== $post->post_status ) : ?>
                                        		<li class="listing-expired"><?php _e( 'Applications have closed', 'wp-job-manager' ); ?></li>
                                        	<?php endif; ?>

                                        	<?php do_action( 'single_job_listing_meta_end' ); ?>
                                        </ul>

                                        <?php do_action( 'single_job_listing_meta_after' ); ?>
                                        <div class="job_description">
                                                <?php wpjm_the_job_description(); ?>
                                        </div>

                                        <?php if ( candidates_can_apply() ) : ?>
                                                <?php get_job_manager_template( 'job-application.php' ); ?>
                                        <?php endif; ?>

                                        <?php
                                        /**
                                         * single_job_listing_end hook
                                         */
                                        do_action( 'single_job_listing_end' );
                                        ?>
                                <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endwhile; endif; ?>
            </div>
            <!-- END CONTAINER -->
            <div class="pushFooter"></div>
        </div>
        <?php get_footer() ?>
