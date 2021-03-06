<?php

class UPT_Init
{

    function __construct() {
        add_action( 'init', array( $this, 'register_post_type' ), 8 );
        add_action( 'init', array( $this, 'init' ) );
    }


    function init() {

        // core
        include( UPT_DIR . '/includes/class-helper.php' );
        include( UPT_DIR . '/includes/class-sync.php' );
        include( UPT_DIR . '/includes/class-ajax.php' );
        include( UPT_DIR . '/includes/class-facetwp.php' );
        include( UPT_DIR . '/includes/class-acf.php' );

        UPT()->helper = new UPT_Helper();
        UPT()->sync = new UPT_Sync();
        UPT()->ajax = new UPT_Ajax();
        UPT()->facetwp = new UPT_FacetWP();
        UPT()->acf = new UPT_ACF();

        // hooks
        add_action( 'admin_menu', array( $this, 'admin_menu' ) );
    }


    /**
     * Register the settings page
     */
    function admin_menu() {
        add_options_page( 'User Post Type', 'User Post Type', 'manage_options', 'upt', array( $this, 'settings_page' ) );
    }


    /**
     * Route to the correct edit screen
     */
    function settings_page() {
        include( UPT_DIR . '/templates/page-settings.php' );
    }


    /**
     * Register the post type
     */
    function register_post_type() {
        $labels = array(
            'name'              => __( 'UPT Users', 'upt' ),
            'singular_name'     => __( 'UPT User', 'upt' ),
        );

        $args = array(
            'labels'            => $labels,
            'description'       => 'User Post Type',
            'public'            => true,
            'show_ui'           => true,
            'show_in_menu'      => false,
            'query_var'         => true,
            'capability_type'   => 'post',
            'supports'          => array( 'title' )
        );

        $args = apply_filters( 'upt_post_type_args', $args );

        register_post_type( 'upt_user', $args );
    }
}

$this->init = new UPT_Init();
