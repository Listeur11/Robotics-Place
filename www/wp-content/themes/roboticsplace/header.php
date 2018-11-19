<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Robotics_Place
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="profile" href="http://gmpg.org/xfn/11">
    <meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/app/images/favicon/ms-icon-144x144.png">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php get_template_part('php/menu'); ?>
