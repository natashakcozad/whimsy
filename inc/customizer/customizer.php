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

/**
 * Configuration sample for the Kirki Customizer
 */

function whimsy_customizer_custom_styling( $config ) {
	return wp_parse_args( array(
		'logo_image'   => '//s3-us-west-2.amazonaws.com/whimsy/whimsy-plus-customizer.png',
		'description'  => esc_attr__( 'Whimsy+ by The Fanciful.', 'whimsy' ),
		'color_accent' => '#203266',
		'color_back'   => '#ffffff',
	), $config );
}
add_filter( 'kirki/config', 'whimsy_customizer_custom_styling' );

/**
 * Add the configuration.
 * This way all the fields using the 'kirki_demo' ID
 * will inherit these options
 */
Whimsy_Kirki::add_config( 'whimsy_customizer', array(
    'capability'    => 'edit_theme_options',
    'option_type'   => 'theme_mod',
) );  

/**
 * Add sections
 */

Whimsy_Kirki::add_section( 'logo', array(
    'title'          => __( 'Logo', 'whimsy' ),
    'priority'       => 21,
    'capability'     => 'edit_theme_options',
) );

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

Whimsy_Kirki::add_section( 'nav_colors', array(
    'title'          => __( 'Navigation Colors', 'whimsy' ),
    'priority'       => 41,
    'capability'     => 'edit_theme_options',
) );   

Whimsy_Kirki::add_section( 'typography', array(
    'title'          => __( 'Typography', 'whimsy' ),
    'priority'       => 50,
    'capability'     => 'edit_theme_options',
) );  

Whimsy_Kirki::add_section( 'sidebar', array(
    'title'          => __( 'Sidebar Display', 'whimsy' ),
    'priority'       => 51,
    'capability'     => 'edit_theme_options',
) );     

Whimsy_Kirki::add_section( 'advanced', array(
    'title'          => __( 'Advanced Options', 'whimsy' ),
    'priority'       => 52,
    'capability'     => 'edit_theme_options',
) );  

/**
 * Add fields
 */
/* Site Title and Description */

Whimsy_Kirki::add_field( 'whimsy_customizer', array(
    'type'        => 'color-alpha',
    'settings'    => 'color_site_title',
    'label'       => __( 'Site Title Color', 'whimsy' ),
    'section'     => 'title_tagline',
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

/* Logo */

Whimsy_Kirki::add_field( 'whimsy_customizer', array(
'type'        => 'image',
'settings'     => 'desktop_logo',
'label'       => __( 'Desktop Version', 'whimsy' ),
'help'        => __( 'This is displayed on most screens.', 'whimsy' ),
'section'     => 'logo',
'default'     => '',
'priority'    => 10,
) );

Whimsy_Kirki::add_field( 'whimsy_customizer', array(
'type'        => 'image',
'settings'     => 'mobile_logo',
'label'       => __( 'Mobile Version', 'whimsy' ),
'help'        => __( 'This is displayed on mobile and tablet screens.', 'whimsy' ),
'section'     => 'logo',
'default'     => '',
'priority'    => 11,
) );

Whimsy_Kirki::add_field( 'whimsy_customizer', array(
    'type'        => 'toggle',
    'settings'    => 'centered_desktop_logo',
    'label'       => __( 'Center desktop logo?', 'whimsy' ),
    'section'     => 'logo',
    'default'     => false,
    'priority'    => 12,
) );

Whimsy_Kirki::add_field( 'whimsy_customizer', array(
    'type'        => 'toggle',
    'settings'    => 'centered_mobile_logo',
    'label'       => __( 'Center mobile logo?', 'whimsy' ),
    'section'     => 'logo',
    'default'     => false,
    'priority'    => 13,
) );

Whimsy_Kirki::add_field( 'whimsy_customizer', array(
    'type'        => 'slider',
    'settings'    => 'logo_padding',
    'label'       => __( 'Logo Padding', 'whimsy' ),
    'description' => __( 'This will add space above the logo.', 'whimsy' ),
    'section'     => 'logo',
    'default'     => '0',
    'priority'    => 14,
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

/* Header */

Whimsy_Kirki::add_field( 'whimsy_customizer', array(
    'type'        => 'color-alpha',
    'settings'    => 'full_header_bg',
    'label'       => __( 'Header Background Color', 'whimsy' ),
    'section'     => 'header_layout',
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
    'section'     => 'header_layout',
    'default'     => 0,
    'priority'    => 10,
) );

Whimsy_Kirki::add_field( 'whimsy_customizer', array(
    'type'        => 'number',
    'settings'    => 'header_as_bg_height',
    'label'       => __( 'Header Height', 'whimsy' ),
    'help'        => __( 'Use the height of your header image in pixels.', 'whimsy' ),
    'section'     => 'header_layout',
    'default'     => '450',
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
            'element'  => '.header-image',
            'property' => 'height',
            'units'    => 'px',
        ),
    ),
    'transport'    => 'postMessage',
    'js_vars'      => array(
        array(
            'element'  => '.header-image',
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
    'section'     => 'header_layout',
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
            'element'  => '.header-image',
            'property' => 'background-size'
        ),
    ),
    'transport'    => 'postMessage',
    'js_vars'      => array(
        array(
            'element'  => '.header-image',
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
		'color'          => '#333333',
		'text-transform' => 'none',
		'text-align'     => 'left'
	),
	'priority'    => 10,
	'output'      => array(
		array(
			'element' => '.site-title, h1, h2, h3, h4, h5, h6',
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
		'color'          => '#333333',
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