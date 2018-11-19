<?php
/**
 * Robotics Place functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Robotics_Place
 */

if ( ! function_exists( 'roboticsplace_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function roboticsplace_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Robotics Place, use a find and replace
		 * to change 'roboticsplace' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'roboticsplace', get_template_directory() . '/languages' );

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
			'primary' => esc_html__( 'Principal', 'roboticsplace' ),
			'footer1' => esc_html__( 'Footer 1', 'roboticsplace' ),
			'footer2' => esc_html__( 'Footer 2', 'roboticsplace' ),
			'footer3' => esc_html__( 'Footer 3', 'roboticsplace' ),
			'langue' => esc_html__( 'Langue', 'roboticsplace' ),
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
		add_theme_support( 'custom-background', apply_filters( 'roboticsplace_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
	}
endif;
add_action( 'after_setup_theme', 'roboticsplace_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function roboticsplace_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'roboticsplace_content_width', 640 );
}
add_action( 'after_setup_theme', 'roboticsplace_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function roboticsplace_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'roboticsplace' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'roboticsplace' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', 'roboticsplace' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Footer de gauche', 'roboticsplace' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 2', 'roboticsplace' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Footer du milieu', 'roboticsplace' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 3', 'roboticsplace' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Footer de droite', 'roboticsplace' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'roboticsplace_widgets_init' );
// Register Custom Post Type
function gonogo() {

	$labels = array(
		'name'                  => _x( 'Go NoGo', 'Post Type General Name', 'roboticsplace' ),
		'singular_name'         => _x( 'Go NoGo', 'Post Type Singular Name', 'roboticsplace' ),
		'menu_name'             => __( 'Go NoGo', 'roboticsplace' ),
		'name_admin_bar'        => __( 'Go NoGo', 'roboticsplace' ),
		'archives'              => __( 'Item Archives', 'roboticsplace' ),
		'attributes'            => __( 'Item Attributes', 'roboticsplace' ),
		'parent_item_colon'     => __( 'Parent Item:', 'roboticsplace' ),
		'all_items'             => __( 'Tous', 'roboticsplace' ),
		'add_new_item'          => __( 'Ajouter nouveau', 'roboticsplace' ),
		'add_new'               => __( 'Ajouter', 'roboticsplace' ),
		'new_item'              => __( 'Nouveau', 'roboticsplace' ),
		'edit_item'             => __( 'Editer', 'roboticsplace' ),
		'update_item'           => __( 'Mettre à jour', 'roboticsplace' ),
		'view_item'             => __( 'Voir', 'roboticsplace' ),
		'view_items'            => __( 'Voir tous', 'roboticsplace' ),
		'search_items'          => __( 'Search Item', 'roboticsplace' ),
		'not_found'             => __( 'Not found', 'roboticsplace' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'roboticsplace' ),
		'featured_image'        => __( 'Featured Image', 'roboticsplace' ),
		'set_featured_image'    => __( 'Set featured image', 'roboticsplace' ),
		'remove_featured_image' => __( 'Remove featured image', 'roboticsplace' ),
		'use_featured_image'    => __( 'Use as featured image', 'roboticsplace' ),
		'insert_into_item'      => __( 'Insert into item', 'roboticsplace' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'roboticsplace' ),
		'items_list'            => __( 'Items list', 'roboticsplace' ),
		'items_list_navigation' => __( 'Items list navigation', 'roboticsplace' ),
		'filter_items_list'     => __( 'Filter items list', 'roboticsplace' ),
	);
	$rewrite = array(
		'slug'                  => 'go-nogo',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Go NoGo', 'roboticsplace' ),
		'description'           => __( 'CPT pour la gestion du Go NoGo', 'roboticsplace' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'comments' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
	);
	register_post_type( 'go_nogo', $args );

}
add_action( 'init', 'gonogo', 0 );
// ajout du CPT CVThèque
function cvtheque_cpt() {

	$labels = array(
		'name'                  => _x( 'CVthèque', 'Post Type General Name', 'roboticsplace' ),
		'singular_name'         => _x( 'CVthèque', 'Post Type Singular Name', 'roboticsplace' ),
		'menu_name'             => __( 'CVthèque', 'roboticsplace' ),
		'name_admin_bar'        => __( 'CVthèque', 'roboticsplace' ),
		'archives'              => __( '', 'roboticsplace' ),
		'attributes'            => __( 'Item Attributes', 'roboticsplace' ),
		'parent_item_colon'     => __( 'Parent Item:', 'roboticsplace' ),
		'all_items'             => __( 'Tous les CV', 'roboticsplace' ),
		'add_new_item'          => __( 'Ajouter un nouveau CV', 'roboticsplace' ),
		'add_new'               => __( 'Nouveau', 'roboticsplace' ),
		'new_item'              => __( 'Nouveau', 'roboticsplace' ),
		'edit_item'             => __( 'editer', 'roboticsplace' ),
		'update_item'           => __( 'mettre à jour', 'roboticsplace' ),
		'view_item'             => __( 'Voir', 'roboticsplace' ),
		'view_items'            => __( 'View Items', 'roboticsplace' ),
		'search_items'          => __( 'Search Item', 'roboticsplace' ),
		'not_found'             => __( 'Not found', 'roboticsplace' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'roboticsplace' ),
		'featured_image'        => __( 'Featured Image', 'roboticsplace' ),
		'set_featured_image'    => __( 'Set featured image', 'roboticsplace' ),
		'remove_featured_image' => __( 'Remove featured image', 'roboticsplace' ),
		'use_featured_image'    => __( 'Use as featured image', 'roboticsplace' ),
		'insert_into_item'      => __( 'Insert into item', 'roboticsplace' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'roboticsplace' ),
		'items_list'            => __( 'Items list', 'roboticsplace' ),
		'items_list_navigation' => __( 'Items list navigation', 'roboticsplace' ),
		'filter_items_list'     => __( 'Filter items list', 'roboticsplace' ),
	);
	$rewrite = array(
		'slug'                  => 'cvtheque',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'CVthèque', 'roboticsplace' ),
		'description'           => __( 'Gestion des CV déposé sur le site', 'roboticsplace' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
	);
	register_post_type( 'cvtheque', $args );

}
add_action( 'init', 'cvtheque_cpt', 0 );


/** modif comment form pour le goNogo */
function DAR_comment_form_gonogo ($comment, $args, $depth) { ?>
		123<div class="comment">
				<?php the_field('reponse', $comment); ?>
				<?php the_field('commentaires', $comment); ?>
		</div>
<?php }
/**
  * Edit my account menu order
  */
 function DAR_account_menu_order() {
	 if(current_user_can('adherent')){
		 $menuOrder = array(
	  	'dashboard'          => __( 'Dashboard', 'woocommerce' ),
	 		'orders'             => __( 'Orders', 'woocommerce' ),
	  	'edit-address'       => __( 'Addresses', 'woocommerce' ),
	  	'edit-account'    	 => __( 'Infos de compte', 'woocommerce' ),
			'editer-ma-fiche-adherent' => __('Gérer ma fiche adhérent', 'woocommerce'),
	 		'mes-offres' 				 => __('Mes offres d\'emploi', 'woocommerce'),
			'business'  				 =>__('Business','woocommerce'),
			'ressources' 				 =>__('Ressources','woocommerce'),
	 		'customer-logout'    => __( 'Logout', 'woocommerce' )
	  	);
	 } elseif(current_user_can('candidate')) {
		 $menuOrder = array(
			 'dashboard'          => __( 'Dashboard', 'woocommerce' ),
			 'edit-account'    	 => __( 'Infos de compte', 'woocommerce' ),
			 'mes-cv'	 					 => __('Voir mes CV', 'woocommerce'),
			 'customer-logout'    => __( 'Logout', 'woocommerce' )
	 		);
	 } elseif(current_user_can('membre')){
		 $menuOrder = array(
	  	'dashboard'          => __( 'Dashboard', 'woocommerce' ),
	  	'edit-address'       => __( 'Addresses', 'woocommerce' ),
	  	'edit-account'    	 => __( 'Infos de compte', 'woocommerce' ),
			'editer-ma-fiche-adherent' => __('Gérer ma fiche adhérent', 'woocommerce'),
	 		'mes-offres' 				 => __('Mes offres d\'emploi', 'woocommerce'),
			'business'  		=>__('Business','woocommerce'),
			'ressources' 				 =>__('Ressources','woocommerce'),
	 		'customer-logout'    => __( 'Logout', 'woocommerce' )
	  	);
	 } elseif(current_user_can('editeur-big')) {
		 $menuOrder = array(
	  	'dashboard'          => __( 'Dashboard', 'woocommerce' ),
	 		'orders'             => __( 'Orders', 'woocommerce' ),
	  	'edit-address'       => __( 'Addresses', 'woocommerce' ),
	  	'edit-account'    	 => __( 'Infos de compte', 'woocommerce' ),
			'editer-ma-fiche-adherent' => __('Gérer ma fiche adhérent', 'woocommerce'),
	 		'mes-offres' 				 => __('Mes offres d\'emploi', 'woocommerce'),
	 		'mes-cv'	 					 => __('Voir mes CV', 'woocommerce'),
			'business'  		=>__('Business','woocommerce'),
			'ressources' 				 =>__('Ressources','woocommerce'),
	 		'customer-logout'    => __( 'Logout', 'woocommerce' )
	  	);
	 }elseif(current_user_can('administrator')) {
		 $menuOrder = array(
	  	'dashboard'          => __( 'Dashboard', 'woocommerce' ),
	 		'orders'             => __( 'Orders', 'woocommerce' ),
	  	//'edit-address'       => __( 'Addresses', 'woocommerce' ),
	  	//'edit-account'    	 => __( 'Infos de compte', 'woocommerce' ),
			'Mes informations' => __('Gérer ma fiche adhérent', 'woocommerce'),
	 		'mes-offres' 				 => __('Mes offres d\'emploi', 'woocommerce'),
	 		'mes-cv'	 					 => __('Voir mes CV', 'woocommerce'),
			'business'  		=>__('Business','woocommerce'),
			'ressources' 				 =>__('Ressources','woocommerce'),
	 		'customer-logout'    => __( 'Logout', 'woocommerce' )
	  	);
	 }

 	return $menuOrder;
 }
 add_filter ( 'woocommerce_account_menu_items', 'DAR_account_menu_order' );
 // google map API Key  AIzaSyDNwC5-LNa_7qbek6JqnYQWILa7soc2Utw
 function dar_map() {
	acf_update_setting('google_api_key', 'AIzaSyDNwC5-LNa_7qbek6JqnYQWILa7soc2Utw');
}
add_action('acf/init', 'dar_map');
 // on desactive les tags dans les articles
 function DAR_disable_tag() {
     unregister_taxonomy_for_object_type('post_tag', 'post');
 }
 add_action('init', 'DAR_disable_tag');
 if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Infos membres du bureau',
		'menu_title'	=> 'Options globales',
		'menu_slug' 	=> 'general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Pied de Page',
		'menu_title'	=> 'Pied de page',
		'parent_slug'	=> 'general-settings',
	));
}

// ajout et suppression des colonnes dans la liste des formations
add_filter( 'manage_entreprise_posts_columns', 'set_custom_edit_entreprise_columns' );
add_action( 'manage_entreprise_posts_custom_column' , 'custom_entreprise_column', 10, 2 );

function set_custom_edit_entreprise_columns($columns) {
    unset( $columns['author'] );
		unset($columns['date']);
    $columns['entreprise_das'] = __( 'DAS', 'roboticsplace' );
    $columns['entreprise_pole'] = __( 'Pôles', 'roboticsplace' );

    return $columns;
}
function custom_entreprise_column( $column, $post_id ) {
    switch ( $column ) {
        case 'entreprise_das' :
            echo get_post_meta( $post_id , 'entreprise_das' , true );
            break;
        case 'entreprise_pole' :
            echo get_post_meta( $post_id , 'entreprise_pole' , true );
            break;
    }
}

/**
 * Enqueue scripts and styles.
 */
function roboticsplace_scripts() {
	wp_enqueue_style('roboticsplace-pureGrid',  get_template_directory_uri() . '/css/pure-grids-min.css', array(),  true );
    //wp_enqueue_style('roboticsplace-darman-css',  get_template_directory_uri() . '/css/darman.css', array(),  true );
	wp_enqueue_style('roboticsplace-pureGridRes',  get_template_directory_uri() . '/css/pure-grids-responsive-min.css', array(), true );
	wp_enqueue_style('roboticsplace-fa-solid', '//use.fontawesome.com/releases/v5.0.13/css/solid.css',array(),true);
	wp_enqueue_style('roboticsplace-fa-regular', '//use.fontawesome.com/releases/v5.0.13/css/regular.css',array(),true);
	wp_enqueue_style('roboticsplace-fa', '//use.fontawesome.com/releases/v5.0.13/css/fontawesome.css',array(),true);
	wp_enqueue_style( 'roboticsplace-style', get_stylesheet_uri());

  wp_enqueue_script('jquery');
  wp_enqueue_script( 'roboticsplace-gsap', get_template_directory_uri() . '/js/TweenMax.min.js', array(), true );
	wp_enqueue_script( 'roboticsplace-menu', get_template_directory_uri() . '/js/menu.js', array(), true );
  wp_enqueue_script( 'roboticsplace-navigation', get_template_directory_uri() . '/js/navigation.js', array(),  true );
	wp_enqueue_script( 'roboticsplace-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(),true );
  wp_enqueue_script( 'Slider-mobile', get_template_directory_uri() . '/js/mobile-slider.js', array(), true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
  if (is_page('29'))  {
    wp_enqueue_script( 'roboticsplace-video', get_template_directory_uri() . '/js/video.js', array(), true );
    wp_enqueue_script( 'animHome', get_template_directory_uri() . '/js/accueil.js', array(), true );
  }

	if (is_page('42')) {
    wp_enqueue_script( 'Cluster', get_template_directory_uri() . '/js/cluster.js', array(), true );
		wp_enqueue_script( 'roboticsplace-video', get_template_directory_uri() . '/js/video.js', array(), true );

  }
    if (is_page('99')) {
    wp_enqueue_script( 'slect', get_template_directory_uri() . '/js/customSelectForm.js', array(), true );

  }
    if (is_singular('entreprise')) {
    wp_enqueue_script( 'slider-library', get_template_directory_uri() . '/js/slick.min.js', array(), true );
    wp_enqueue_script( 'slider-call', get_template_directory_uri() . '/js/slider.js', array(), true );

  }
	if (is_page(array('11','143','13'))) {
		wp_enqueue_script('jquery-ui-accordion','jquery');
		wp_enqueue_script( 'roboticsplace-compte', get_template_directory_uri() . '/js/mon-compte.js', array(), true );
	}
	if(is_page('15')){
		wp_enqueue_script('jquery-ui-accordion','jquery');
		wp_enqueue_script( 'roboticsplace-emploi', get_template_directory_uri() . '/js/popinEmploi.js', array(), true );
	}
	if ( is_page_template(array('missionA.php','partenariats.php')) ) {
		wp_enqueue_script( 'roboticsplace-Magic', get_template_directory_uri() . '/js/ScrollTrigger.min.js', array(), true );
		wp_enqueue_script( 'roboticsplace-Mission', get_template_directory_uri() . '/js/mission.js', array(), true );
	}
}


add_action( 'wp_enqueue_scripts', 'roboticsplace_scripts' );
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

require get_template_directory() . '/functions-phc.php';


function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');
