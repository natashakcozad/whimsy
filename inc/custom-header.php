<?php

/* Call late so child themes can override. */
add_action( 'after_setup_theme', 'whimsy_custom_header_setup', 15 );

/**
 * Adds support for the WordPress 'custom-header' theme feature and registers custom headers.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function whimsy_custom_header_setup() {

	/* Adds support for WordPress' "custom-header" feature. */
	add_theme_support( 
		'custom-header', 
		array(
			'default-image'          => '',
			'random-default'         => false,
			'width'                  => 1280,
			'height'                 => 400,
			'flex-width'             => true,
			'flex-height'            => true,
			'default-text-color'     => '000000',
			'header-text'            => true,
			'uploads'                => true,
			'wp-head-callback'       => 'whimsy_custom_header_wp_head',
			'admin-head-callback'    => 'whimsy_custom_header_admin_head',
			'admin-preview-callback' => 'whimsy_custom_header_admin_preview',
		)
	);

	/* Registers default headers for the theme. */
	//register_default_headers();
}

/**
 * Callback function for outputting the custom header CSS to `wp_head`.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function whimsy_custom_header_wp_head() {

	if ( !display_header_text() )
		return;

	$hex = get_header_textcolor();

	if ( empty( $hex ) )
		return;

	$style = "body.custom-header #site-title a { color: #{$hex}; }";

	echo "\n" . '<style type="text/css" id="custom-header-css">' . trim( $style ) . '</style>' . "\n";
}

/**
 * Callback for the admin preview output on the "Appearance > Custom Header" screen.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function whimsy_custom_header_admin_preview() { ?>

		<div <?php hybrid_attr( 'body' ); // Fake <body> class. ?>>

			<header <?php hybrid_attr( 'header' ); ?>>

				<?php if ( display_header_text() ) : // If user chooses to display header text. ?>

					<div id="branding">
						<?php hybrid_site_title(); ?>
						<?php hybrid_site_description(); ?>
					</div><!-- #branding -->

				<?php endif; // End check for header text. ?>

			</header><!-- #header -->

			<?php if ( get_header_image() && !display_header_text() ) : // If there's a header image but no header text. ?>

				<a href="<?php echo home_url(); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" rel="home"><img class="header-image" src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" /></a>

			<?php elseif ( get_header_image() ) : // If there's a header image. ?>

				<img class="header-image" src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" />

			<?php endif; // End check for header image. ?>

		</div><!-- Fake </body> close. -->

<?php }

/**
 * Callback function for outputting the custom header CSS to `admin_head` on "Appearance > Custom Header".  See 
 * the `css/admin-custom-header.css` file for all the style rules specific to this screen.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function whimsy_custom_header_admin_head() {

	$hex = get_header_textcolor();

	if ( empty( $hex ) )
		return;

	$style = "#site-title a { color: #{$hex}; }";

	echo "\n" . '<style type="text/css" id="custom-header-css">' . trim( $style ) . '</style>' . "\n";
}

/**
 * Dynamically build out the header so it can be extended by the Customizer.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
if ( ! function_exists( 'whimsy_get_header' ) ) :
function whimsy_get_header() {
    
    if ( get_header_image() && display_header_text() ) : // If there's a header image and header text. ?>

        <header <?php hybrid_attr( 'header' ); ?>>
            
            <div <?php hybrid_attr( 'branding' ); ?>>
                <?php hybrid_site_title(); ?>
                <?php hybrid_site_description(); ?>
            </div><!-- #branding -->
            
            <?php whimsy_mobile_branding(); // Include mobile branding/logo for screens under 960px. ?>
            <?php whimsy_desktop_branding(); // Include desktop branding/logo. ?>
            
            <a href="<?php echo home_url(); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" rel="home"><img class="header-image" src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" /></a>

		</header><!-- #header -->

    <?php elseif ( get_header_image() && !display_header_text() ) : // If there's a header image but no header text. ?>

        <header <?php hybrid_attr( 'header' ); ?>>
            
            <?php whimsy_mobile_branding(); 
                  whimsy_desktop_branding(); ?>
            
            <a href="<?php echo home_url(); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" rel="home"><img class="header-image" src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" /></a>

		</header><!-- #header -->

    <?php elseif ( get_header_image() && Whimsy_Kirki::get_option( 'header_as_bg' ) == true ) : // If there's a header image and Header as a Background is ENABLED then the header image should be displayed as a background style. ?>
        
        <?php whimsy_mobile_branding(); ?>

        <header class="header-bg-image" style="background-image: url(<?php header_image(); ?>)" <?php hybrid_attr( 'header' ); ?>>
            
            <?php whimsy_desktop_branding(); ?>
            
		</header><!-- #header -->

    <?php elseif ( get_header_image() && Whimsy_Kirki::get_option( 'header_as_bg' ) == false ) : // If there's a header image and the Header as a Background option is DISABLED, it should be displayed as an image block under the site title. ?>
        
        <header <?php hybrid_attr( 'header' ); ?>>

            <?php whimsy_mobile_branding(); ?>
            
            <?php whimsy_desktop_branding(); ?>
            
            <img class="header-image" src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" />
        
		</header><!-- #header -->

    <?php endif; // End check for header image. 
}
endif;

/**
 * HTML output for mobile site branding.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
if ( ! function_exists( 'whimsy_mobile_branding' ) ) :
function whimsy_mobile_branding() {
    
    if ( Whimsy_Kirki::get_option( 'mobile_logo' ) ) : ?>
            
        <div class="mobile-site-branding"><!-- Does not display on screens larger than 980px -->

            <div class="site-logo">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo esc_url( Whimsy_Kirki::get_option( 'mobile_logo' ) ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" class="mobile-logo-image <?php whimsy_centered_logo(); ?>"></a>
            </div>

        </div><!-- /.mobile-site-branding -->

    <?php else : // If no logo is set, display title as text. ?>
            
        <div class="mobile-site-branding"><!-- Does not display on screens larger than 980px -->

            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
    
        </div><!-- /.mobile-site-branding -->

    <?php endif; // End mobile logo check. 

}
endif; // End function_exists mobile logo check.

/**
 * HTML output for desktop site branding.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
if ( ! function_exists( 'whimsy_desktop_branding' ) ) :
function whimsy_desktop_branding() { 
    
    if ( Whimsy_Kirki::get_option( 'desktop_logo' ) ) : ?>

            <div class="site-branding"><!-- Does not display on screens smaller than 980px -->
                        
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                    
                    <img src="<?php echo esc_url( Whimsy_Kirki::get_option( 'desktop_logo' ) ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" class="desktop-logo-image <?php whimsy_centered_logo(); ?>">
                
                </a>
                        				
			</div><!-- /.site-branding -->

				<?php else : // If no logo is set, display title and description text. ?>

            <div class="site-branding"><!-- Does not display on screens smaller than 980px -->
                
            <hgroup>
                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
            </hgroup>

			</div><!-- /.site-branding -->
                
            <?php endif; // End desktop logo check.                      }
}
endif; // End function_exists desktop logo check. 