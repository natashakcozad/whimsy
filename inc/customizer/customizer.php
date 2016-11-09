<?php
/**
 * Whimsy+ Theme Customizer
 *
 * @package whimsy
 */


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function whimsy_customize_preview_js() {
	wp_enqueue_script( 'whimsy_customizer', get_template_directory_uri() . '/inc/customizer/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'whimsy_customize_preview_js' );

/**
 * Add the theme configuration
 */
Whimsy_Kirki::add_config( 'whimsy_customizer', array(
	'option_type' => 'theme_mod',
	'capability'  => 'edit_theme_options',
) );

function whimsy_customizer_custom_styling( $config ) {
	return wp_parse_args( array(
		'logo_image'      => '//s3-us-west-2.amazonaws.com/whimsy/whimsy-plus-customizer.png',
		'description'     => esc_attr__( 'Whimsy+ by The Fanciful.', 'whimsy' ),
		'color_accent'    => '#203266',
		'color_back'      => '#ffffff',
        'disable_loader'  => true,
	), $config );
}
add_filter( 'kirki/config', 'whimsy_customizer_custom_styling' );

/**
 * Add sections
 */

Whimsy_Kirki::add_section( 'layout', array(
    'title'          => esc_html__( 'Global Layout', 'whimsy' ),
    'priority'       => 22,
    'capability'     => 'edit_theme_options',
) );    

Whimsy_Kirki::add_section( 'header_layout', array(
    'title'          => __( 'Header Layout', 'whimsy' ),
    'priority'       => 61,
    'capability'     => 'edit_theme_options',
) );   

Whimsy_Kirki::add_section( 'nav_color', array(
    'title'          => __( 'Navigation Colors', 'whimsy' ),
    'priority'       => 41,
    'capability'     => 'edit_theme_options',
) );   

Whimsy_Kirki::add_section( 'typography', array(
    'title'          => __( 'Typography', 'whimsy' ),
    'priority'       => 50,
    'capability'     => 'edit_theme_options',
) );  

Whimsy_Kirki::add_section( 'content', array(
    'title'          => __( 'Content Display', 'whimsy' ),
    'priority'       => 51,
    'capability'     => 'edit_theme_options',
) );     

Whimsy_Kirki::add_section( 'sidebar', array(
    'title'          => __( 'Sidebar Display', 'whimsy' ),
    'priority'       => 52,
    'capability'     => 'edit_theme_options',
) );     

Whimsy_Kirki::add_section( 'advanced', array(
    'title'          => __( 'Advanced Options', 'whimsy' ),
    'priority'       => 90,
    'capability'     => 'edit_theme_options',
) );  

/* Colors */

Whimsy_Kirki::add_field( 'whimsy_customizer', array(
    'type'        => 'color-alpha',
    'settings'    => 'color_site_title',
    'label'       => __( 'Site Title Color', 'whimsy' ),
    'section'     => 'colors',
    'default'     => '#ffffff',
    'priority'    => 11,
    'output'      => array(
        array(
            'element'  => '.site-title',
            'property' => 'color',
        ),
    ),
    'transport'   => 'postMessage',
    'js_vars'     => array(
        array(
            'element'  => '.site-title',
            'function' => 'css',
            'property' => 'color',
        ),
    ),

) );

Whimsy_Kirki::add_field( 'whimsy_customizer', array(
    'type'        => 'color-alpha',
    'settings'    => 'color_link',
    'label'       => __( 'Link Color', 'whimsy' ),
    'section'     => 'colors',
    'default'     => '#1fb4ca',
    'priority'    => 12,
    'output'      => array(
        array(
            'element'  => 'a',
            'property' => 'color',
        ),
    ),
    'transport'   => 'postMessage',
    'js_vars'     => array(
        array(
            'element'  => 'a',
            'function' => 'css',
            'property' => 'color',
        ),
    ),

) );

Whimsy_Kirki::add_field( 'whimsy_customizer', array(
    'type'        => 'color-alpha',
    'settings'    => 'color_h1',
    'label'       => __( 'H1 Color', 'whimsy' ),
    'section'     => 'colors',
    'default'     => '#333333',
    'priority'    => 13,
    'output'      => array(
        array(
            'element'  => 'h1',
            'property' => 'color',
        ),
    ),
    'transport'   => 'postMessage',
    'js_vars'     => array(
        array(
            'element'  => 'h1',
            'function' => 'css',
            'property' => 'color',
        ),
    ),

) );

Whimsy_Kirki::add_field( 'whimsy_customizer', array(
    'type'        => 'color-alpha',
    'settings'    => 'color_h2',
    'label'       => __( 'H2 Color', 'whimsy' ),
    'section'     => 'colors',
    'default'     => '#333333',
    'priority'    => 14,
    'output'      => array(
        array(
            'element'  => 'h2',
            'property' => 'color',
        ),
    ),
    'transport'   => 'postMessage',
    'js_vars'     => array(
        array(
            'element'  => 'h2',
            'function' => 'css',
            'property' => 'color',
        ),
    ),

) );

Whimsy_Kirki::add_field( 'whimsy_customizer', array(
    'type'        => 'color-alpha',
    'settings'    => 'color_h3',
    'label'       => __( 'H3 Color', 'whimsy' ),
    'section'     => 'colors',
    'default'     => '#333333',
    'priority'    => 15,
    'output'      => array(
        array(
            'element'  => 'h3',
            'property' => 'color',
        ),
    ),
    'transport'   => 'postMessage',
    'js_vars'     => array(
        array(
            'element'  => 'h1',
            'function' => 'css',
            'property' => 'color',
        ),
    ),

) );

Whimsy_Kirki::add_field( 'whimsy_customizer', array(
    'type'        => 'color-alpha',
    'settings'    => 'color_h1',
    'label'       => __( 'H4 Color', 'whimsy' ),
    'section'     => 'colors',
    'default'     => '#333333',
    'priority'    => 16,
    'output'      => array(
        array(
            'element'  => 'h4',
            'property' => 'color',
        ),
    ),
    'transport'   => 'postMessage',
    'js_vars'     => array(
        array(
            'element'  => 'h4',
            'function' => 'css',
            'property' => 'color',
        ),
    ),

) );

Whimsy_Kirki::add_field( 'whimsy_customizer', array(
    'type'        => 'color-alpha',
    'settings'    => 'color_h5',
    'label'       => __( 'H5 Color', 'whimsy' ),
    'section'     => 'colors',
    'default'     => '#333333',
    'priority'    => 17,
    'output'      => array(
        array(
            'element'  => 'h5',
            'property' => 'color',
        ),
    ),
    'transport'   => 'postMessage',
    'js_vars'     => array(
        array(
            'element'  => 'h5',
            'function' => 'css',
            'property' => 'color',
        ),
    ),

) );

Whimsy_Kirki::add_field( 'whimsy_customizer', array(
    'type'        => 'color-alpha',
    'settings'    => 'color_h6',
    'label'       => __( 'H6 Color', 'whimsy' ),
    'section'     => 'colors',
    'default'     => '#333333',
    'priority'    => 18,
    'output'      => array(
        array(
            'element'  => 'h6',
            'property' => 'color',
        ),
    ),
    'transport'   => 'postMessage',
    'js_vars'     => array(
        array(
            'element'  => 'h6',
            'function' => 'css',
            'property' => 'color',
        ),
    ),

) );

/* Logo */

Whimsy_Kirki::add_field( 'whimsy_customizer', array(
    'type'        => 'image',
    'settings'     => 'desktop_logo',
    'label'       => __( 'Desktop Logo', 'whimsy' ),
    'help'        => __( 'This is displayed on most screens.', 'whimsy' ),
    'section'     => 'title_tagline',
    'default'     => '',
    'priority'    => 50,
) );

Whimsy_Kirki::add_field( 'whimsy_customizer', array(
    'type'        => 'image',
    'settings'     => 'mobile_logo',
    'label'       => __( 'Mobile Logo', 'whimsy' ),
    'help'        => __( 'This is displayed on mobile and tablet screens.', 'whimsy' ),
    'section'     => 'title_tagline',
    'default'     => '',
    'priority'    => 51,
) );

Whimsy_Kirki::add_field( 'whimsy_customizer', array(
    'type'        => 'toggle',
    'settings'    => 'centered_desktop_logo',
    'label'       => __( 'Center desktop logo?', 'whimsy' ),
    'section'     => 'title_tagline',
    'default'     => false,
    'priority'    => 52,
) );

Whimsy_Kirki::add_field( 'whimsy_customizer', array(
    'type'        => 'toggle',
    'settings'    => 'centered_mobile_logo',
    'label'       => __( 'Center mobile logo?', 'whimsy' ),
    'section'     => 'title_tagline',
    'default'     => false,
    'priority'    => 53,
) );

Whimsy_Kirki::add_field( 'whimsy_customizer', array(
    'type'        => 'slider',
    'settings'    => 'logo_padding',
    'label'       => __( 'Logo Padding', 'whimsy' ),
    'description' => __( 'This will add space above the logo.', 'whimsy' ),
    'section'     => 'title_tagline',
    'default'     => '0',
    'priority'    => 54,
    'output'      => array(
        array(
            'element'  => '.desktop-logo-image',
            'property' => 'padding-top',
            'units'    => 'em',
        ),
    ),
    'transport'    => 'postMessage',
    'js_vars'      => array(
        array(
            'element'  => '.desktop-logo-image',
            'property' => 'padding-top',
            'units'    => 'em',
            'function' => 'css',
        ),
    ),
    'choices'      => array(
        'min'  => 0,
        'max'  => 10,
        'step' => .1,
    )
) );

/* Layout */

Whimsy_Kirki::add_field( 'whimsy_customizer', array(
    'type'        => 'dimension',
    'settings'    => 'layout_size',
    'label'       => __( 'Site Width', 'whimsy' ),
    'description' => __( 'Set the width of the whole body of the site in pixels or %.', 'whimsy' ),
    'section'     => 'layout',
    'default'     => '1420px',
    'priority'    => 1,
    'output'      => array(
        array(
            'element'  => 'body',
            'property' => 'width',
        ),
    ),
    'transport'   => 'postMessage',
    'js_vars'     => array(
        array(
            'element'  => 'body',
            'property' => 'width',
            'function' => 'css',
        ),
    ),
) );

/* Nav */

Whimsy_Kirki::add_field( 'whimsy_customizer', array(
    'type'        => 'color-alpha',
    'settings'    => 'nav_bar_bg',
    'label'       => __( 'Navigation Bar Background Color', 'whimsy' ),
    'section'     => 'nav',
    'default'     => 'rgba(255,255,255,0.9)',
    'priority'    => 18,
    'output'      => array(
        array(
            'element'  => '#menu-primary',
            'property' => 'background-color',
        ),
    ),
    'transport'   => 'postMessage',
    'js_vars'     => array(
        array(
            'element'  => 'h6',
            'function' => 'css',
            'property' => 'color',
        ),
    ),

) );

/* Header */

Whimsy_Kirki::add_field( 'whimsy_customizer', array(
    'type'        => 'color-alpha',
    'settings'    => 'full_header_bg',
    'label'       => __( 'Header Background Color', 'whimsy' ),
    'section'     => 'header_image',
    'default'     => '#ffffff',
    'priority'    => 11,
    'output'      => array(
        array(
            'element'  => '#header',
            'property' => 'background-color',
        ),
    ),
    'transport'   => 'postMessage',
    'js_vars'     => array(
        array(
            'element'  => '#header',
            'function' => 'css',
            'property' => 'background-color',
        ),
    ),
) );

Whimsy_Kirki::add_field( 'whimsy_customizer', array(
    'type'        => 'switch',
    'settings'    => 'header_as_bg',
    'label'       => __( 'Use Header Image as a background?', 'whimsy' ),
    'help'        => __( 'The Header Image will be used as a full-screen background, placed behind the menus and titles.', 'whimsy' ),
    'section'     => 'header_image',
    'default'     => 0,
    'priority'    => 10,
) );

Whimsy_Kirki::add_field( 'whimsy_customizer', array(
    'type'        => 'dimension',
    'settings'    => 'header_as_bg_height',
    'label'       => __( 'Header Height', 'whimsy' ),
    'help'        => __( 'Use the height of your header image in pixels.', 'whimsy' ),
    'section'     => 'header_image',
    'default'     => '250px',
    'priority'    => 10,
    'required'    => array(
        array(
            'setting'  => 'header_as_bg',
            'operator' => '==',
            'value'    => 1,
        ),
    ),
    'output'      => array(
        array(
            'element'  => '.header-bg-image',
            'property' => 'height',
            'units'    => 'px',
        ),
    ),
    'transport'    => 'postMessage',
    'js_vars'      => array(
        array(
            'element'  => '.header-bg-image',
            'property' => 'height',
            'units'    => 'px',
            'function' => 'css',
        ),
    )
) );

Whimsy_Kirki::add_field( 'whimsy_customizer', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'header_as_bg_size',
    'label'       => __( 'Background-Size', 'whimsy' ),
    'description' => __( 'This controls how the background is sized.', 'whimsy' ),
    'section'     => 'header_image',
    'default'     => 'cover',
    'priority'    => 15,
    'choices'     => array(
        'normal'    => __( 'Normal', 'whimsy' ),
        'contain'   => __( 'Contain', 'whimsy' ),
        'cover'     => __( 'Cover', 'whimsy' ),
        '100%'    => __( '100%', 'whimsy' )
    ),
    'required'    => array(
        array(
            'setting'  => 'header_as_bg',
            'operator' => '==',
            'value'    => 1,
        ),
    ),
    'output'      => array(
        array(
            'element'  => '.header-bg-image',
            'property' => 'background-size'
        ),
    ),
    'transport'    => 'postMessage',
    'js_vars'      => array(
        array(
            'element'  => '.header-bg-image',
            'property' => 'background-size',
            'function' => 'css',
        ),
    )
) );

/* Typography */

Whimsy_Kirki::add_field( 'whimsy_customizer', array(
	'type'        => 'typography',
	'settings'    => 'headline_font',
	'label'       => __( 'Headline Font', 'whimsy' ),
	'description' => __( 'The font properties for headlines and titles.', 'whimsy' ),
	'section'     => 'typography',
	'default'     => array(
		'font-family'    => 'Ubuntu',
		'variant'        => 'regular',
		'font-size'      => '32px',
		'line-height'    => '1.5',
		'letter-spacing' => '0',
		'text-transform' => 'none',
		'text-align'     => 'left'
	),
	'priority'    => 10,
	'output'      => array(
		array(
			'element' => 'h1, h2, h3, h4, h5, h6',
		),
	),
) );

Whimsy_Kirki::add_field( 'whimsy_customizer', array(
	'type'        => 'typography',
	'settings'    => 'body_font',
	'label'       => __( 'Body Font', 'whimsy' ),
	'description' => __( 'The font properties for the body text.', 'whimsy' ),
	'section'     => 'typography',
	'default'     => array(
		'font-family'    => 'Ubuntu',
		'variant'        => 'regular',
		'font-size'      => '18px',
		'line-height'    => '1.5',
		'letter-spacing' => '0',
		'text-transform' => 'none',
		'text-align'     => 'left'
	),
	'priority'    => 10,
	'output'      => array(
		array(
			'element' => 'body',
		),
	),
) );

/* Advanced */

Whimsy_Kirki::add_field( 'whimsy_customizer', array(
    'type'        => 'toggle',
    'settings'    => 'enable_breadcrumbs',
    'label'       => __( 'Enable breadcrumbs?', 'whimsy' ),
    'section'     => 'advanced',
    'default'     => false,
    'priority'    => 10,
) );

//
//Whimsy_Kirki::add_field( 'whimsy_customizer', array(
//	'type'        => 'code',
//	'settings'    => 'css_hacks',
//	'label'       => __( 'CSS Hacks', 'my_textdomain' ),
//	'section'     => 'advanced',
//	'priority'    => 10,
//	'choices'     => array(
//		'language' => 'css',
//		'theme'    => 'yeti',
//		'height'   => 250,
//	),
//) );