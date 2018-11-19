<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Robotics_Place
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<?php roboticsplace_post_thumbnail(); ?>

	<div class="entry-content">
		<div class="txt-article">
				<?php if ( have_rows('gestion_du_contenu') ): ?>
						<?php while ( have_rows('gestion_du_contenu') ) : the_row();
								if(get_row_layout() == 'text_full') : ?>
										<div class="pure-u-1 text_full">
														<?php the_sub_field('editeur');?>
										</div>
								<?php elseif(get_row_layout() == 'introduction'): ?>
										<div class="pure-u-1 intro">
												<?php the_sub_field('editeur');?>
										</div>
								<?php elseif(get_row_layout() == 'encart_text_color'): ?>
										<div class="pure-u-1 encart_color">
														<?php the_sub_field('editeur'); ?>
										</div>
								<?php elseif(get_row_layout() == 'encart_cta') : ?>
										<div class="pure-u-1 encart_cta">
												<?php the_sub_field('editeur');  ?>
												<a class="button button__classic button--pink" href="<?php the_sub_field('url_btn'); ?>"><span></span><?php the_sub_field('title_btn'); ?></a>
										</div>
								<?php elseif(get_row_layout() == 'col_content'): ?>
									<div class="pure-u-1 content_col">
											<?php if ( have_rows('contenu') ): ?>
													<?php while ( have_rows('contenu') ) : the_row(); ?>
														<div class="col <?php the_sub_field('largeur_du_contenu');?> <?php the_sub_field('background_color'); ?><?php if(get_sub_field('texte_ou_image') == 'texte') : ?> col_text <?php endif;?>">
														<?php if(get_sub_field('texte_ou_image') == 'texte') :
																		the_sub_field('texte');
																	else :
																			$image = get_sub_field('image');
																			$size = 'full'; // (thumbnail, medium, large, full or custom size)
																			if( $image ) {
																				echo wp_get_attachment_image( $image, $size );
																			}endif; ?>
														</div>
													<?php endwhile; ?>
											<?php endif; ?>
									</div>
							<?php endif;
						 endwhile;
						 else :
									the_content(); ?>
				<?php endif; ?>
		</div>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'roboticsplace' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
