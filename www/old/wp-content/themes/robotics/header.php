<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package RoboticsPlace
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'robotics' ); ?></a>
	<header id="masthead" class="site-header" role="banner">
		<div class="container">
			<div class="site-branding">
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<p class="site-description"><?php echo $description; ?></p>
			</div><!-- .site-branding -->
			<?php if(is_mobile()) { ?>
					<button class="hamburger hamburger--elastic" aria-controls="primary-menu" >
						<div class="hamburger-box">
						  <div class="hamburger-inner"></div>
						</div>
					</button>
					<a class="twitter" target="_blank" href="https://twitter.com/roboticsplace">twitter</a>
					<ul class="lang-nav">
						<?php pll_the_languages(); ?>
					</ul>
			<?php } ?>
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<?php if(is_mobile()) { ?>
					<button class="close-nav" data-target="#site-navigation" type="button" name="button"><?php pll_e('Fermer');?></button>
				<?php }?>
				<?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu' ) ); ?>
			</nav><!-- #site-navigation -->
		</div>
	</header><!-- #masthead -->
	<?php if(!is_mobile()) { ?>
	<a class="twitter" target="_blank" href="https://twitter.com/roboticsplace">twitter</a>
	<ul class="lang-nav">
			<?php pll_the_languages(); ?>
	</ul>
	<?php } ?>
	<div id="content" class="site-content">
