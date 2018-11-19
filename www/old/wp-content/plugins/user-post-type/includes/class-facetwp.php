<?php

class UPT_FacetWP
{

    function __construct() {
        add_filter( 'facetwp_facet_sources', array( $this, 'facet_sources' ) );
        add_filter( 'facetwp_indexer_post_facet', array( $this, 'index_values' ), 1, 2 );
    }


    /**
     * Register FacetWP data sources
     */
    function facet_sources( $sources ) {
        $prefixed = array();
        $choices = UPT()->helper->get_user_choices();

        foreach ( $choices as $key => $val ) {
            $prefixed[ "upt/$key" ] = $val;
        }

        $sources['upt'] = array(
            'label' => 'User Fields',
            'choices' => $prefixed,
            'weight' => 10
        );

        return $sources;
    }


    /**
     * Index FacetWP data
     */
    function index_values( $return, $params ) {
        $defaults = $params['defaults'];
        $facet = $params['facet'];
        $post_id = (int) $defaults['post_id'];

        if ( 0 === strpos( $defaults['facet_source'], 'upt/' ) ) {

            // Exit stage left
            if ( 'upt_user' != get_post_type( $post_id ) ) {
                return $return;
            }

            $user_id = UPT()->get_user_id( $post_id );
            $choice = str_replace( 'upt/', '', $defaults['facet_source'] );

            // Usermeta
            if ( 0 === strpos( $choice, 'meta-' ) ) {
                $meta_key = str_replace( 'meta-', '', $choice );
                $meta_value = get_user_meta( $user_id, $meta_key, true );

                if ( ! empty( $meta_value ) ) {
                    $defaults['facet_value'] = $meta_value;
                    $defaults['facet_display_value'] = $meta_value;
                    FWP()->indexer->index_row( $defaults );
                }
            }
            // User Role
            elseif ( 'roles' == $choice ) {
                $user_data = get_userdata( $user_id );

                if ( ! empty( $user_data->roles ) ) {
                    foreach ( $user_data->roles as $role ) {
                        $defaults['facet_value'] = $role;
                        $defaults['facet_display_value'] = $GLOBALS['wp_roles']->roles[ $role ]['name'];
                        FWP()->indexer->index_row( $defaults );
                    }
                }
            }
            // User Table
            else {
                $user_data = get_userdata( $user_id );

                if ( ! empty( $user_data->$choice ) ) {
                    $defaults['facet_value'] = $user_data->$choice;
                    $defaults['facet_display_value'] = $user_data->$choice;
                    FWP()->indexer->index_row( $defaults );
                }
            }

            return true; // skip
        }

        return $return;
    }
}
