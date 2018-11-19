<?php
/**
 * RoboticsPlace functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package RoboticsPlace
 */

if ( ! function_exists( 'robotics_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function robotics_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on RoboticsPlace, use a find and replace
	 * to change 'robotics' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'robotics', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'robotics' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'robotics_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'robotics_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function robotics_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'robotics_content_width', 640 );
}
add_action( 'after_setup_theme', 'robotics_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function robotics_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'robotics' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'robotics' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'robotics_widgets_init' );
/**
 * Enqueue scripts and styles.
 */
function robotics_scripts() {
	wp_enqueue_style( 'robotics-style', get_stylesheet_uri() );
	wp_enqueue_script( 'robotics-jquery', get_template_directory_uri() . '/js/jquery.js', array(), '20151215', true );
	wp_enqueue_script( 'robotics-gsap', get_template_directory_uri() . '/js/TweenMax.min.js', array(), '20151215', true );
	wp_enqueue_script( 'robotics-rellax', get_template_directory_uri() . '/js/rellax.min.js', array(), '20151215', true );
	wp_enqueue_script( 'robotics-scrollT', get_template_directory_uri() . '/js/ScrollTrigger.min.js', array(), '20151215', true );
	wp_enqueue_script( 'robotics-full', get_template_directory_uri() . '/js/jquery.fullPage.min.js', array(), '20151215', true );
	wp_enqueue_script( 'robotics-slick', get_template_directory_uri() . '/js/slick.min.js', array(), '20151215', true );
	wp_enqueue_script( 'robotics-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'robotics-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
		wp_enqueue_script( 'robotics-site', get_template_directory_uri() . '/js/site.js', array(), '20151215', true );
	if(is_mobile()){
		wp_enqueue_script('jquery-ui-accordion');
		wp_enqueue_script( 'robotics-hamburger', get_template_directory_uri() . '/js/hamburgers.js', array(), '20151215', true );
		wp_enqueue_script( 'robotics-mobile', get_template_directory_uri() . '/js/mobile.js', array(), '20151215', true );
	}
	if(is_tablet()){
		wp_enqueue_script('jquery-ui-accordion');
		wp_enqueue_script( 'robotics-hamburger', get_template_directory_uri() . '/js/hamburgers.js', array(), '20151215', true );
		wp_enqueue_script( 'robotics-mobile', get_template_directory_uri() . '/js/mobile.js', array(), '20151215', true );
	}
	if(!is_mobile()){
		wp_enqueue_script( 'robotics-desktop', get_template_directory_uri() . '/js/desktop.js', array(), '20151215', true );
	}

}
add_action( 'wp_enqueue_scripts', 'robotics_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
