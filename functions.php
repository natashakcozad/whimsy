<?php

/* Get the template directory and make sure it has a trailing slash. */
$whimsy_dir = trailingslashit( get_template_directory() );

/* Load the Hybrid Core framework and theme files. */
require_once( $whimsy_dir . 'library/hybrid.php'        );
require_once( $whimsy_dir . 'inc/custom-background.php' );
require_once( $whimsy_dir . 'inc/custom-header.php'     );
require_once( $whimsy_dir . 'inc/theme.php'             );
require_once( $whimsy_dir . 'inc/customizer/class-whimsy-kirki.php' );

/* Launch the Hybrid Core framework. */
new Hybrid();

/* Do theme setup on the 'after_setup_theme' hook. */
add_action( 'after_setup_theme', 'whimsy_theme_setup', 5 );

/**
 * Theme setup function.  This function adds support for theme features and defines the default theme actions and filters.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function whimsy_theme_setup() {

	/* Theme layouts. */
	add_theme_support( 
		'theme-layouts', 
		array(
			'1c'        => __( '1 Column',                     'whimsy' ),
			'2c-l'      => __( '2 Columns: Content / Sidebar', 'whimsy' ),
			'2c-r'      => __( '2 Columns: Sidebar / Content', 'whimsy' )
		),
		array( 'default' => is_rtl() ? '2c-r' :'2c-l' ) 
	);
	
	/**
	 * Enable core template hierarchy.
     * @link http://themehybrid.com/docs/template-hierarchy
	 */
    add_theme_support( 'hybrid-core-template-hierarchy' );

	/**
	 * Enable breadcrumb trails.
     * @link http://themehybrid.com/docs/tutorials/breadcrumb-trail
	 */
    add_theme_support( 'breadcrumb-trail' );

	/**
	 * Enable Post Series
     * Allows users to create a series of post, which is saved as post metadata by adding a custom meta box to the edit post screen.
	 */
    add_theme_support( 'custom-field-series' );
    
	/**
	 * Enable featured header
     * A script that allows users to set a per-post header image based off the WordPress featured image.
     * @link http://themehybrid.com/docs/tutorials/featured-header
	 */
    add_theme_support( 'featured-header' );
    
	/**
	 * Enable featured header
     * Keeps track of the number of times a post has been viewed.
	 */
    add_theme_support( 'entry-views' );

	/**
	 * Enable Get the Image
     * A highly-advanced post image/thumbnail script that supports custom fields, WordPress feature images, attachments, and much more.
     * @link http://themehybrid.com/docs/tutorials/get-the-image
	 */
    add_theme_support( 'get-the-image' );

	/**
	 * Enable Loop Pagination
     * Provides a template tag for adding pagination to multi-post pages (e.g., archives, blog, search).
     * @link http://themehybrid.com/docs/tutorials/loop-pagination
	 */
    add_theme_support( 'loop-pagination' );

	/**
	 * Enable Post Format Tools 
     * Provides a set of tools for theme developers to use when creating themes that support the WordPress post formats feature.
     * @link http://themehybrid.com/docs/tutorials/post-format-tools
	 */
    add_theme_support( 'post-formats' );

	/**
	 * Enable Post Stylesheets 
     * Allows users to create post-specific stylesheets by adding a custom meta box to the edit post screen.
     * @link http://themehybrid.com/docs/tutorials/post-stylesheets
	 */
    add_theme_support( 'post-stylesheets' );

	/**
	 * Enable Random Custom Backgrounds 
     * On each page view a random background will be selected and used.
     * @link http://themehybrid.com/docs/tutorials/random-custom-background
	 */
    add_theme_support( 'random-custom-background' );

	/* Nicer [gallery] shortcode implementation. */
	add_theme_support( 'cleaner-gallery' );

	/* Better captions for themes to style. */
	add_theme_support( 'cleaner-caption' );

	/* Automatically add feed links to <head>. */
	add_theme_support( 'automatic-feed-links' );

	/* Add support for WP post formats. */
	add_theme_support( 
		'post-formats', 
		array( 'aside', 'audio', 'chat', 'image', 'gallery', 'link', 'quote', 'status', 'video' ) 
	);
    
	/* Setup the WordPress core custom background feature. */
	add_theme_support( 'custom-background', apply_filters(    
        'whimsy_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
    
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );
    
	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
    
	/* Post Thumbnails
     * Enable support for Post Thumbnails on posts and pages. 
     */
	add_theme_support( 'post-thumbnails' );
    
	/* Widgets
     * Register all Whimsy widgets. 
     */
	add_theme_support( 'whimsy-widgets' );
    
	/* Customizer
     * Include additional options in the Customizer. 
     */
	add_theme_support( 'whimsy-customizer' );
    
	/* Customizer: Skins
     * Include skin options in the Customizer. 
     
	add_theme_support( 'whimsy-skins' );*/
    
	/* Customizer: Whimsy+BG
     * Import some stylish backgrounds into the Customizer. 
     */
	add_theme_support( 'whimsy-bg' );
    
	/* Customizer: Whimsy Box Layout
     * Utilize the box-style layout instead of the default full-screen. 
     */
	add_theme_support( 'whimsy-box' );
    
	/* Integrations
     * Recommend integrated plugins in the admin. 
     */
	add_theme_support( 'whimsy-plugins' );
    
	/* WooCommerce Support */
	add_theme_support( 'woocommerce' ); 

	/* WordPress Content Width
     * Handle content width for embeds and images. 
    */
	hybrid_set_content_width( 1280 );

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on whimsy, use a find and replace
	 * to change 'whimsy' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'whimsy', get_template_directory() . '/languages' );

}