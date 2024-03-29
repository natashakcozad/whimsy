<!DOCTYPE html>
<html <?php language_attributes( 'html' ); ?>>

<head>
<?php wp_head(); // Hook required for scripts, styles, and other <head> items. ?>
</head>

<body <?php hybrid_attr( 'body' ); ?>>

	<div id="container" class="<?php whimsy_container_classes(); ?>">    

		<div class="skip-link">
			<a href="#content" class="screen-reader-text"><?php esc_html_e( 'Skip to content', 'hybrid-base' ); ?></a>
		</div><!-- .skip-link -->

		<?php hybrid_get_menu( 'primary' ); // Loads the menu/primary.php template. ?>
		
        <?php hybrid_get_menu( 'secondary' ); // Loads the menu/secondary.php template. ?>
        
        <?php whimsy_get_header(); // Loads the header customizations from WordPress. ?>
		
        <div id="main" class="main">
            
            <?php whimsy_breadcrumb_trail(); ?>