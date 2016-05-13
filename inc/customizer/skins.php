<?php

/* Add settings to Customizer. */
add_action( 'customize_register', 'whimsy_extension_skins_customize_register', 15 );

/* Load skin-specific styles. */
add_action( 'wp_enqueue_scripts', 'whimsy_extension_skins_scripts_styles', 15 );

/**
 * Registers skin controls to the Customizer.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function whimsy_extension_skins_customize_register ( $wp_customize ) {

    /* Add Skin Settings. */
    $wp_customize->add_setting(
        'whimsy_extension_skins',
        array(
            'default' => 'one',
        )
    );
    
    /* Add Skin Controls. */
    $wp_customize->add_control(
        'whimsy_extension_skins',
        array(
            'type' => 'select',
            'label' => 'Skin',
            'section' => 'layout',
            'choices' => array(
                'one' => 'Nora',
                'two' => 'Azurea',
                'three' => 'Karolina',
                'four' => 'Marliacea',
            ),
        )
    );
   
}

/**
 * Registers skin-specific styles.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function whimsy_extension_skins_scripts_styles() {
    
     /* Enqueue the appropriate CSS based on which skin is selected via Theme Customizer */
    $whimsy_extension_skins = get_theme_mod( 'whimsy_extension_skins' );
    
    if ( $whimsy_extension_skins == 'one' ) {
        wp_enqueue_style( 'whimsy-extension-skin-one', trailingslashit( THEME_URI ) . '/skins/one.css' );
    }
    
    if ( $whimsy_extension_skins  == 'two' ) {
        wp_enqueue_style( 'whimsy-extension-skin-two', trailingslashit( THEME_URI ) . '/skins/two.css' );
    }
    
    if ( $whimsy_extension_skins  == 'three' ) {
        wp_enqueue_style( 'whimsy-extension-skin-three', trailingslashit( THEME_URI ) . '/skins/three.css' );
    }
    
    if ( $whimsy_extension_skins  == 'four' ) {
        wp_enqueue_style( 'whimsy-extension-skin-four', trailingslashit( THEME_URI ) . '/skins/four.css' );
    }
}