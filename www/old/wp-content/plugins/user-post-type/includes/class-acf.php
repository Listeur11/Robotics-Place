<?php

class UPT_ACF
{

    function __construct() {
        add_filter( 'facetwp_acf_object_id', array( $this, 'maybe_utp' ) );
    }


    /**
     * If a "UPT" post item, return the user ID prefixed with "user_"
     */
    function maybe_utp( $object_id ) {
        if ( 'upt_user' == get_post_type( $object_id ) ) {
            $user_id = UPT()->get_user_id( $object_id );
            $object_id = 'user_' . $user_id;
        }

        return $object_id;
    }
}
