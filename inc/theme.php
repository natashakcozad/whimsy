<?php

/* Register custom image sizes. */
add_action( 'init', 'whimsy_register_image_sizes', 5 );

/* Register custom menus. */
add_action( 'init', 'whimsy_register_menus', 5 );

/* Register sidebars. */
add_action( 'widgets_init', 'whimsy_register_sidebars', 5 );

/* Add custom scripts. */
add_action( 'wp_enqueue_scripts', 'whimsy_enqueue_scripts', 5 );

/* Add custom styles. */
add_action( 'wp_enqueue_scripts', 'whimsy_enqueue_styles', 5 );

/* Include custom Whimsy extensions. */
add_action( 'after_setup_theme', 'whimsy_load_extensions', 15 );

/* Include additional Whimsy layouts. */
add_action( 'hybrid_register_layouts', 'whimsy_register_layouts' );

/**
 * Registers custom image sizes for the theme. 
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function whimsy_register_image_sizes() {

	/* Sets the 'post-thumbnail' size. */
	//set_post_thumbnail_size( 150, 150, true );
}

/**
 * Registers nav menu locations.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function whimsy_register_menus() {
	register_nav_menu( 'primary',    _x( 'Primary',    'nav menu location', 'whimsy' ) );
	register_nav_menu( 'secondary',  _x( 'Secondary',  'nav menu location', 'whimsy' ) );
	register_nav_menu( 'subsidiary', _x( 'Subsidiary', 'nav menu location', 'whimsy' ) );
}

/**
 * Registers sidebars.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function whimsy_register_sidebars() {

	hybrid_register_sidebar(
		array(
			'id'          => 'primary',
			'name'        => _x( 'Primary', 'sidebar', 'whimsy' ),
			'description' => __( 'Add sidebar description.', 'whimsy' )
		)
	);

	hybrid_register_sidebar(
		array(
			'id'          => 'subsidiary',
			'name'        => _x( 'Subsidiary', 'sidebar', 'whimsy' ),
			'description' => __( 'Add sidebar description.', 'whimsy' )
		)
	);
}

/**
 * Load scripts for the front end.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function whimsy_enqueue_scripts() {
    
	/* Gets ".min" suffix. */
	$suffix = hybrid_get_min_suffix();
    
	/* Load jQuery UI effects for easing. */
    wp_enqueue_script( 'jquery-effects-core', array( 'jquery' ) );
    
	/* Load responsive nav script. */
    wp_enqueue_script( 'whimsy-menu-script', trailingslashit( HYBRID_PARENT_URI ) . "js/menu{$suffix}.js", array( 'jquery' ), true );
    
}

/**
 * Load stylesheets for the front end.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function whimsy_enqueue_styles() {

	/* Gets ".min" suffix. */
	$suffix = hybrid_get_min_suffix();

	/* Load one-five base style. */
	wp_enqueue_style( 'one-five', trailingslashit( HYBRID_CSS ) . "one-five{$suffix}.css" );

	/* Load gallery style if 'cleaner-gallery' is active. */
	if ( current_theme_supports( 'cleaner-gallery' ) ) {
		wp_enqueue_style( 'gallery', trailingslashit( HYBRID_CSS ) . "gallery{$suffix}.css" );
	}

	/* Load parent theme stylesheet if child theme is active. */
	if ( is_child_theme() ) {
		wp_enqueue_style( 'parent', trailingslashit( get_template_directory_uri() ) . "style{$suffix}.css" );
	}

	/* Load active theme stylesheet. */
	wp_enqueue_style( 'style', get_stylesheet_uri() );
    
	/* Load Font Awesome stylesheet. */
    wp_enqueue_style( 'whimsy-font-awesome', trailingslashit( HYBRID_PARENT_URI ) . "css/font-awesome{$suffix}.css" );
    
	/* Load responsive grid stylesheet. */
    wp_enqueue_style( 'whimsy-grid', trailingslashit( HYBRID_PARENT_URI ) . "css/grid{$suffix}.css" );
	
    /* Load masonry.js but only on the Mosaic page template. */
	if ( is_page_template( 'pages/template-mosaic.php' ) ) {
		wp_enqueue_script( 'whimsy-mosaic', get_template_directory_uri() . '/js/mosaic.js', array('jquery-masonry'), '1.0', true );
	}
}

/**
 * Load theme-specific extensions.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function whimsy_load_extensions() {

    require_if_theme_supports( 'whimsy-widgets', trailingslashit( HYBRID_PARENT ) . 'inc/widgets.php' );
    
    require_if_theme_supports( 'whimsy-plugins', trailingslashit( HYBRID_PARENT ) . 'inc/plugins.php' );
    
    require_if_theme_supports( 'whimsy-skins', trailingslashit( HYBRID_PARENT ) . 'inc/customizer/skins.php' );
    
    require_if_theme_supports( 'whimsy-customizer', trailingslashit( HYBRID_PARENT ) . 'inc/customizer/customizer.php' );
    
    require_if_theme_supports( 'whimsy-bg', trailingslashit( HYBRID_PARENT ) . 'inc/customizer/bg.php' );
    
    require_if_theme_supports( 'whimsy-box', trailingslashit( HYBRID_PARENT ) . 'inc/customizer/box-layout.php' );

}

/**
 * Load stylesheets for additional layout options.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function whimsy_register_layouts() {

    hybrid_register_layout( '1c', array( 'label' => esc_html__( 'Full-Width', 'whimsy' ), 'image' => '%s/inc/customizer/images/layout-1c.png' ) );
    
    hybrid_register_layout( '2c-l', array( 'label' => esc_html__( 'Content / Sidebar', 'whimsy' ), 'image' => '%s/inc/customizer/images/layout-2c-l.png' ) );

    hybrid_register_layout( '2c-r', array( 'label' => esc_html__( 'Sidebar / Content', 'whimsy' ), 'image' => '%s/inc/customizer/images/layout-2c-r.png' ) );
}

/**
 * Output a CSS class for the #container div based on options in Customizer.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
if ( ! function_exists( 'whimsy_container_size' ) ) :

function whimsy_container_size() {

	if( Whimsy_Kirki::get_option( 'box_layout' ) == true ) { echo "box-layout"; } 
    
    else { echo "full-width"; }
    
}

endif;

/**
 * Output the .centered-logo CSS class for centering logos based on options in Customizer.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
if ( ! function_exists( 'whimsy_centered_logo' ) ) :
function whimsy_centered_logo() {

	if( Whimsy_Kirki::get_option( 'centered_desktop_logo' ) || Whimsy_Kirki::get_option( 'centered_mobile_logo' ) == true ) { echo "centered-logo"; } 
        
}
endif;

/**
 * Output the .centered-logo CSS class for centering logos based on options in Customizer.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
if ( ! function_exists( 'whimsy_container_classes' ) ) :
function whimsy_container_classes() {
   
	if( Whimsy_Kirki::get_option( 'box_layout' ) == true ) { echo "box-layout "; } 
    
    else { echo "full-width"; }
}
endif;

/**
 * Enable breadcrumb trails based on Customizer choice.
 * @link http://themehybrid.com/docs/tutorials/breadcrumb-trail
 *
 * @since  1.0.0
 * @access public
 * @return void
 */

if ( ! function_exists( 'whimsy_breadcrumb_trail' ) ) :
function whimsy_breadcrumb_trail() {

    if( Whimsy_Kirki::get_option( 'enable_breadcrumbs' ) == true ) { 
        
        hybrid_get_menu( 'breadcrumbs' ); // Loads the menu/breadcrumbs.php template. 
        
    } 
}
endif;