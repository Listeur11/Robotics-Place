<?php
/**
 * Plugin Name: SecuPress Salt Keys
 * Description: Good Security Keys for each of your blogs of your network (multisite only), auto-reseting each month.
 * Version: 1.0.1
 * License: GPLv2
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 *
 * Copyright 2012-2016 SecuPress
 */

defined( 'ABSPATH' ) or die( 'Cheatin\' uh?' );

define( 'SECUPRESS_SALT_KEYS_ACTIVE', true );
global $blog_id;

$hash_1     = '5h6?h##?7`]nQ&wyNn?-rHTt30@L84|X=Fwb+-3@ouY+>GV<1,9qn-L*c}3`R%)s';
$hash_2     = 'm>j`tdB{XtvX]0{hiXL3?!e.9r#X3[.Hk@NJxM?0-wM5U!!8x3 =6wHiP.j _0hO';
$file_str   = __FILE__ . date( 'Ym' );
$hash_1    .= $hash_2;
$file_str  .= $hash_2;
$main_keys  = array( 'AUTH_KEY', 'SECURE_AUTH_KEY', 'LOGGED_IN_KEY', 'NONCE_KEY', 'AUTH_SALT', 'SECURE_AUTH_SALT', 'LOGGED_IN_SALT', 'NONCE_SALT', );

foreach ( $main_keys as $main_key ) {
	if( ! defined( $main_key ) ) {
		define( $main_key, sha1( 'secupress' . $main_key . md5( $main_key . $file_str ) ) . md5( $main_key . $file_str ) );
	}
}

unset( $file_str, $main_key, $main_keys, $hash_1, $hash_2 );
