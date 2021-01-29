<?php
/**
 * Sidebar setup for footer full
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );

?>

<?php if ( is_active_sidebar( 'topinfo-left' ) ) : ?>

	<!-- ******************* The Footer Full-width Widget Area ******************* -->

	<div class="wrapper" id="wrapper-topinfo-left">

		<div id="topinfo-left-content" tabindex="-1">

			
				<?php dynamic_sidebar( 'topinfo-left' ); ?>

			

		</div>

	</div><!-- #wrapper-footer-full -->

	<?php
endif;
