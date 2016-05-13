<?php

/**
 * Whimsy+BG Extension
 *
 * @package whimsy
 */
 if ( class_exists( 'Whimsy_Kirki' ) ) { 

	/**
	 * Add the configuration.
	 */
	Whimsy_Kirki::add_config( 'whimsy_bg_customizer', array(
		'capability'    => 'edit_theme_options',
		'option_type'   => 'theme_mod',
	) );  
    
	/**
	 * Add the section.
	 */
     
    Whimsy_Kirki::add_section( 'whimsy_bg', array(
        'title'          => __( '(Optional) Whimsy+BG', 'whimsy' ),
        'priority'       => 90,
        'capability'     => 'edit_theme_options',
    ) );  
    
    Whimsy_Kirki::add_field( 'whimsy_bg_customizer', array(
        'type'        => 'switch',
        'settings'    => 'use_whimsy_bg',
        'label'       => __( 'Use Whimsy+BG?', 'whimsy' ),
        'description' => __( '<em>Please note:</em> To use Whimsy+BG you please make sure no other backgrounds are set above.', 'whimsy' ),
        'section'     => 'whimsy_bg',
        'default'     => false,
        'priority'    => 30,
    ) );
    
    Whimsy_Kirki::add_field( 'whimsy_bg_customizer', array(
    	'type'        => 'select',
    	'settings'    => 'select_tiled_bg',
    	'label'       => __( 'Whimsy+BG', 'whimsy' ),
		'description' => __( 'Choose a tiled background. <a href="http://whimsy.club/library/bg/" target="_blank">View all</a>.', 'whimsy' ),
    	'section'     => 'whimsy_bg',
    	'default'     => 'whimsy-bg-dots',
    	'priority'    => 10,
        'required'  => array(
            array(
            'setting'  => 'use_whimsy_bg',
            'operator' => '==',
            'value'    => true
            ),
        ),
        'choices'     => array(
            'whimsy-bg-arrow-hearts'                => __( 'Arrow+Hearts', 'whimsy' ),
            'whimsy-bg-dots'                        => __( 'Dots', 'whimsy' ),
            'whimsy-bg-feathered'                   => __( 'Feathered', 'whimsy' ),
            'whimsy-bg-floral-mural'                => __( 'Floral Mural', 'whimsy' ),
            'whimsy-bg-honeycomb'                   => __( 'Honeycomb', 'whimsy' ),
            'whimsy-bg-quatrefoil'                  => __( 'Quatrefoil', 'whimsy' ),
            'whimsy-bg-sketchy-clouds'              => __( 'Sketchy Clouds', 'whimsy' ),
            'whimsy-bg-sketchy-doodles'             => __( 'Sketchy Doodles', 'whimsy' ),
            'whimsy-bg-woven-fabric'                => __( 'Sketchy Fabric', 'whimsy' ),
            'whimsy-bg-sketchy-lines'               => __( 'Sketchy Lines', 'whimsy' ),
            'whimsy-bg-sketchy-ribbons'             => __( 'Sketchy Ribbons', 'whimsy' ),
            'whimsy-bg-sketchy-vertical-ribbons'    => __( 'Sketchy Vertical Ribbons', 'whimsy' ),
        ),
    ) );
    
    Whimsy_Kirki::add_field( 'whimsy_bg_customizer', array(
        'type'        => 'color-alpha',
        'settings'    => 'tiled_color_background',
        'label'       => __( 'Background Color', 'whimsy' ),
        'description' => __( 'The background images are semi-transparent, so they will automatically blend into the background color.', 'whimsy' ),
        'section'     => 'whimsy_bg',
        'default'     => '#efefef',
        'priority'    => 11,
        'required'  => array(
            array(
            'setting'  => 'use_whimsy_bg',
            'operator' => '==',
            'value'    => true
            ),
        ),
        'output'      => array(
            array(
                'element'  => 'body',
                'property' => 'background-color',
            ),
        ),
		'transport'   => 'postMessage',
        'js_vars'     => array(
            array(
                'element'  => 'body',
                'function' => 'css',
                'property' => 'background-color',
            ),
        ),
        
    ) );
    
}

/* Include custom CSS for Whimsy+BG extension. */
add_action( 'wp_head', 'whimsy_bg', 55 );

/**
 * HTML output for custom Whimsy+BG backgrounds.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
if ( ! function_exists( 'whimsy_bg' ) ) :
function whimsy_bg() {
    
        
    if( Whimsy_Kirki::get_option( 'select_tiled_bg' ) && Whimsy_Kirki::get_option( 'use_whimsy_bg' ) == true ) : ?>
        
        <!-- Begin Whimsy+BG Styles -->
        <style>
            body,
            body.custom-background {
                background-image: url(<?php echo esc_url( get_template_directory_uri() . '/inc/customizer/images/bg/' . Whimsy_Kirki::get_option( 'select_tiled_bg' ) ); ?>.png);
                background-color: <?php echo esc_url( Whimsy_Kirki::get_option( 'tiled_color_background' ) ); ?>;
                background-repeat: repeat;
            }
        </style>

    <?php endif; // End background image check. 

}
endif; // End function_exists background image check.