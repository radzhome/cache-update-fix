<?php
/*
* Plugin Name: Postmedia Cache Update Fix Plugin
* Description: Generate action to prevent caching issues
*  
* Version: 0.1.0
* Author: Postmedia Network Inc.
* Contributor: PMDigital
*/


/**
 * Summary: Fix a race condition in alloptions caching
 *
 * @param	string	$option			The name of the requested option
 *
 * See https://core.trac.wordpress.org/ticket/31245
 */
function _wpcom_vip_maybe_clear_alloptions_cache( $option ) {
	if ( ! wp_installing() ) {
		$alloptions = wp_load_alloptions(); // alloptions should be cached at this point
		if ( isset( $alloptions[ $option ] ) ) { //only if option is among alloptions
			wp_cache_delete( 'alloptions', 'options' );
		}
	}
}
add_action( 'added_option',   '_wpcom_vip_maybe_clear_alloptions_cache' );
add_action( 'updated_option', '_wpcom_vip_maybe_clear_alloptions_cache' );
add_action( 'deleted_option', '_wpcom_vip_maybe_clear_alloptions_cache' );
