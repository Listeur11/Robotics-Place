<?php
/**
 * My Account Dashboard
 *
 * Shows the first intro screen on the account dashboard.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/dashboard.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>

<p><?php
	/* translators: 1: user display name 2: logout url */
	printf(
		__( 'Hello %1$s (not %1$s? <a href="%2$s">Log out</a>)', 'woocommerce' ),
		'<strong>' . esc_html( $current_user->display_name ) . '</strong>',
		esc_url( wc_logout_url( wc_get_page_permalink( 'myaccount' ) ) )
	);
?></p>
	<div class="dashboard-members">
	<?php if (current_user_can('membre') or (current_user_can('administrator')) or (current_user_can('editeur-big'))) { ?>
		<?php if(get_field('sondage','options')): ?>
			<div class="sondage dashboard-item">
				<h3>Sondage</h3>
					<?php the_field('sondage','options');?>
			</div>
		<?php endif; ?>
			<div class="GoNoGo dashboard-item">
				<h3>GoNoGo</h3>
				<?php
					$args = array(
						'post_type' => 'go_nogo',
					);
					$gonogo = new WP_Query($args);
					if($gonogo->have_posts()) : while ($gonogo->have_posts() ) : $gonogo->the_post(); ?>
				    <a href="<?php the_permalink();?>" class="item_gonogo">
				    	<b><?php  the_title(); ?></b>
				    </a>

				<?php endwhile;
				endif;
wp_reset_postdata();
				 ?>
			</div>
		<?php //endif; ?>
	<?php }  // fin de la condition d'affichage du contenu des membres?>
	<?php if(!current_user_can('candidate')) { ?>
		<div class="reunions">
			<div class="dashboard-item">
				<h3>Réunions & Compte-rendu</h3>
				<div class="calendrier ">
						<h4>Calendrier des réunions</h4>
						<?php if ( have_rows('calendrier_reunion','options') ): ?>
							<div class="list-calendrier">
								<?php while ( have_rows('calendrier_reunion','options') ) : the_row(); ?>
										<p class="item-calendrier">
											<b><?php the_sub_field('sujet'); ?></b>
											<span><b><i class="fas fa-clock"></i> </b><?php the_sub_field('date_heure'); ?></span>
											<span><b><i class="fas fa-map-marker-alt"></i> </b><?php the_sub_field('lieu');?></span>
										</p>
										<div><b>Descriptif : </b><?php the_sub_field('descriptif'); ?></div>
								<?php endwhile; ?>
							</div>
						<?php else :
							echo '<div id="message" class="infos">
								<p>Pas de réunion de programmée pour le moment</p>
							</div>';
						endif; ?>
				</div>
				<?php if(current_user_can( 'administrator' ) || current_user_can('membre')){ ?>
					<div class="compte-rendu">
							<h4>Compte-rendu</h4>
							<?php if ( have_rows('cr_reunion','options') ): ?>
								<div class="list-cr">
									<?php while ( have_rows('cr_reunion','options') ) : the_row(); ?>
											<p class="item-cr"><b><?php the_sub_field('sujet_reunion'); ?></b>
												<span><b><i class="fas fa-clock"></i> </b><?php the_sub_field('date_&_heure'); ?></span>
												<span><b><i class="fas fa-map-marker-alt"></i> </b><?php the_sub_field('lieu');?></span></p>
											<div>
												<b>Descriptif : </b><?php the_sub_field('descriptif'); ?>
												<?php $file = get_sub_field('cr_file');
													if( $file ): ?>
														<a href="<?php echo $file['url']; ?>"><?php echo $file['filename']; ?></a>
													<?php endif; ?>
											</div>
									<?php endwhile; ?>
								</div>
							<?php else :
								echo '<div id="message" class="infos">
									<p>Pas de compte-rendu disponible pour le moment</p>
								</div>';
							endif; ?>
					</div>
				<?php } ?>
			</div>
	</div>
	<?php } ?>

	</div>
<?php
	/**
	 * My Account dashboard.
	 *
	 * @since 2.6.0
	 */
	do_action( 'woocommerce_account_dashboard' );

	/**
	 * Deprecated woocommerce_before_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_before_my_account' );

	/**
	 * Deprecated woocommerce_after_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_after_my_account' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
