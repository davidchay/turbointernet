<?php
/**
 * The right sidebar containing the main widget area
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>
</div><!-- #closing the primary container from /global-templates/left-sidebar-check.php -->
<?php

if ( ! is_active_sidebar( 'tienda-sidebar' ) ) {
	return;
}

// when both sidebars turned on reduce col size to 3 from 4.
$sidebar_pos = get_theme_mod( 'understrap_sidebar_position' );
?>


<div class="col-md-4 widget-area" id="tienda-sidebar" role="complementary">

<?php dynamic_sidebar( 'tienda-sidebar' ); ?>

</div><!-- #right-sidebar -->
