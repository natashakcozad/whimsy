<?php
/**
 * The Business sidebar containing an alternate widget area for the Business page template.
 *
 * @package whimsy
 */

if ( ! is_active_sidebar( 'business' ) ) {
	return;
}
?>

<div id="mosaic" class="c12 end" role="complementary">
	<?php dynamic_sidebar( 'business' ); ?>
</div><!-- #secondary -->