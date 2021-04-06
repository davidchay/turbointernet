<?php
/**
 * Sidebar setup for footer full
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );


 if ( is_active_sidebar( 'topinfo-right' ) ) {
	dynamic_sidebar( 'topinfo-right' );

 }

	
