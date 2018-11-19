<?php
/*
Plugin Name: Custom Hooks
Plugin URI: https://facetwp.com/
Description: A container for custom hooks
Version: 1.0
Author: FacetWP, LLC
*/

add_filter( 'facetwp_index_row', function( $params, $class ) {
    if ( 'CHANGE_ME' == $params['cat_actu'] ) {
        $excluded_terms = array( 'evenements' );
        if ( in_array( $params['facet_display_value'], $excluded_terms ) ) {
            return false;
        }
    }
    return $params;
}, 10, 2 );

add_filter( 'facetwp_map_marker_args', function( $args, $post_id ) {
    $args['icon'] = 'https://dev.wp-samaritain.io/robotics/wp-content/themes/roboticsplace/images/marker.svg';
    return $args;
}, 10, 2 );