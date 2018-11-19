<?php
/**
 * The template for displaying the footer
 * Contains the closing of the #content div and all content after.
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package RoboticsPlace
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info container">
			<a class="logo-footer" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">Robotique industrielle <span class="rser">Robotique de service</span><span class="drones">Drones</span> </a>
			<?php if(!is_mobile()) { ?>
				<a class="top_page" href="#cluster" title="<?php pll_e('Haut de page');?>"></a>
			<?php } ?>
			<ul class="nav_footer">
				<li>
					@2017 Robotics Place
				</li>
				<li class="mentions">
					<?php pll_e('Mentions légales');?>
				</li>
				<li>
					<a target="_blank" href="http://www.darmandesign.fr">Studio Darman</a>
				</li>
			</ul>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->
<div id="popin" class="popin_unactive">
	<div class="popin_click" data-target="#popin"></div>
	<div id="popin__member" class="popin popin_unactive">
		<button class="close" data-target="#popin" type="button" name="button"><?php pll_e('Fermer');?></button>
		<div class="entete">
			<h4><?php the_field('surtitre-popin-membre') ?></h4>
			<h3><?php the_field('description-popin-membre') ?></h3>
		</div>
		<div class="contenu_popin">
			<?php
				 $rows = get_field('list_membres');
				 if($rows) {
					 echo '<ul class="list_members">';
					 foreach($rows as $row) 	{
						 if( $row['link_web'] ):
								 echo '<li class="item_member"><a target="_blank" href="' . $row['link_web'] . '">' . $row['company'] .'</a></li>';
						 else :
								 echo '<li class="item_member">' . $row['company'] .'</li>';
						 endif;
					 }
					 echo '</ul>';
				 }
				?>
		</div>
	</div> <!-- fin popin member -->
	<div id="popin__interclustering" class="popin popin_unactive">
		<button class="close" data-target="#popin" type="button" name="button"><?php pll_e('Fermer');?></button>
		<div class="entete">
			<h4><?php the_field('surtitre-popin-carte') ?></h4>
			<?php if(!is_mobile()) { ?>
			<h3><?php the_field('description-carte') ?></h3>
			<?php }?>
		</div>
		<div class="contenu_popin">
			<?php
				$image = get_field('image-carte');
				if( !empty($image) ): ?>
					<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
				<?php endif; ?>
		</div>
	</div> <!-- fin popin interclustering -->
	<div id="popin__orga" class="popin popin_unactive">
		<button class="close" data-target="#popin" type="button" name="button"><?php pll_e('Fermer');?></button>
		 <div class="entete">
			 <h4><?php the_field('surtitre-organisation') ?></h4>
			 <?php if(!is_mobile()) { ?>
			 <h3><?php the_field('description-organisation') ?></h3>
			 <?php } ?>
		 </div>
		 <div class="contenu_popin">
			 <?php
				 $image = get_field('image-organisation');
				 if( !empty($image) ): ?>
					 <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
				 <?php endif; ?>
		 </div>
	</div> <!-- fin popin orga -->
	<div id="popin__soumettre" class="popin popin_unactive">
		<button class="close" data-target="#popin" type="button" name="button"><?php pll_e('Fermer');?></button>
		<div class="entete">
			 <h4><?php the_field('surtitre-popin-soumettre') ?></h4>
			 <?php if(!is_mobile()) { ?>
				 <h3><?php the_field('description-popin-soumettre') ?></h3>
			 <?php } ?>
		</div>
		<div class="contenu_popin">
			<?php echo do_shortcode('[cf7-form cf7key="formulaire-de-contact-1"]') ?>
		</div>
	</div> <!-- fin popin soumettre -->
	<div id="popin__rejoindre" class="popin popin_unactive">
		<button class="close" data-target="#popin" type="button" name="button"><?php pll_e('Fermer');?></button>
		<div class="entete">
			 <h4><?php the_field('surtitre-popin-rejoindre') ?></h4>
			 <?php if(!is_mobile()) { ?>
			 <h3><?php the_field('description-popin-rejoindre') ?></h3>
			 <?php } ?>
		</div>
		<div class="contenu_popin">
			<?php echo do_shortcode('[cf7-form cf7key="formulaire-rejoindre-le-cluster"]') ?>
		</div>
	</div> <!-- fin popin rejoindre -->
	<div id="popin__contact" class="popin popin_unactive">
		<button class="close" data-target="#popin" type="button" name="button"><?php pll_e('Fermer');?></button>
		<div class="entete">
			 <h4><?php the_field('surtitre-popin-contact') ?></h4>
			 <?php if(!is_mobile()) { ?>
			 <h3><?php the_field('description-popin-contact') ?></h3>
			 <?php } ?>
		</div>
		<div class="contenu_popin">
			<?php echo do_shortcode('[cf7-form cf7key="formulaire-de-contact-job"] '); ?>
		</div>
	</div> <!-- fin popin contact -->
</div>
<?php wp_footer(); ?>

</body>
</html>
