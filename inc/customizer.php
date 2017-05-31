<?php
/**
 * Silvia Theme Customizer
 */

// Loads custom control
require trailingslashit( get_template_directory() ) . 'inc/customizer/controls/custom-text.php';

// Loads the customizer settings
require trailingslashit( get_template_directory() ) . 'inc/customizer/posts.php';
require trailingslashit( get_template_directory() ) . 'inc/customizer/social.php';
require trailingslashit( get_template_directory() ) . 'inc/customizer/misc.php';
require trailingslashit( get_template_directory() ) . 'inc/customizer/layouts.php';
require trailingslashit( get_template_directory() ) . 'inc/customizer/colors.php';

/**
 * Custom customizer functions.
 */
function silvia_customize_functions( $wp_customize ) {

	// Register new panel: Design
	$wp_customize->add_panel( 'silvia_design', array(
		'title'       => esc_html__( 'Design', 'silvia' ),
		'description' => esc_html__( 'This panel is used for customizing the design of your site.', 'silvia' ),
		'priority'    => 125,
	) );

	// Register new panel: Theme Options
	$wp_customize->add_panel( 'silvia_options', array(
		'title'       => esc_html__( 'Theme Options', 'silvia' ),
		'description' => esc_html__( 'This panel is used for customizing the Silvia theme.', 'silvia' ),
		'priority'    => 130,
	) );

	// Live preview of Site Title
	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';

	// Enable selective refresh to the Site Title
	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'            => '.site-title a',
			'settings'         => array( 'blogname' ),
			'render_callback'  => function() {
				return get_bloginfo( 'name', 'display' );
			}
		) );
	}

	// Move the Colors section.
	$wp_customize->get_section( 'colors' )->panel    = 'silvia_design';
	$wp_customize->get_section( 'colors' )->priority = 1;

	// Move the Background Image section.
	$wp_customize->get_section( 'background_image' )->panel    = 'silvia_design';
	$wp_customize->get_section( 'background_image' )->priority = 7;

	// Move the Static Front Page section.
	$wp_customize->get_section( 'static_front_page' )->panel    = 'silvia_design';
	$wp_customize->get_section( 'static_front_page' )->priority = 9;

	// Move the Additional CSS section.
	$wp_customize->get_section( 'custom_css' )->panel    = 'silvia_design';
	$wp_customize->get_section( 'custom_css' )->priority = 11;

	// Move background color to background image section.
	$wp_customize->get_section( 'background_image' )->title = esc_html__( 'Background', 'silvia' );
	$wp_customize->get_control( 'background_color' )->section = 'background_image';

}
add_action( 'customize_register', 'silvia_customize_functions', 99 );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function silvia_customize_preview_js() {
	wp_enqueue_script( 'silvia-customizer', get_template_directory_uri() . '/assets/js/customizer/customizer.js', array( 'customize-preview', 'jquery' ) );
}
add_action( 'customize_preview_init', 'silvia_customize_preview_js' );

/**
 * Custom styles.
 */
function silvia_custom_css() {

	// Set up empty variable.
	$css = '';

	$search_icon = get_theme_mod( 'silvia-search-icon-color', '#454545' );
	if ( $search_icon != '#454545' ) {
		$css .= '.search-toggle { color: ' . sanitize_hex_color( $search_icon ) . '; } ';
	}

	$search_bg = get_theme_mod( 'silvia-search-bg-color', '#333333' );
	if ( $search_bg != '#333333' ) {
		$css .= '.search-area { background-color: ' . sanitize_hex_color( $search_bg ) . '; } ';
	}

	$site_title = get_theme_mod( 'silvia-site-title-color', '#454545' );
	if ( $site_title != '#454545' ) {
		$css .= '#masthead .site-title a { color: ' . sanitize_hex_color( $site_title ) . '; } ';
	}

	$site_desc = get_theme_mod( 'silvia-site-desc-color', '#777777' );
	if ( $site_desc != '#777777' ) {
		$css .= '#masthead .site-description { color: ' . sanitize_hex_color( $site_desc ) . '; } ';
	}

	$footer_bg = get_theme_mod( 'silvia-footer-bg-color', '#f5f5f5' );
	if ( $footer_bg != '#f5f5f5' ) {
		$css .= '.site-footer { background-color: ' . sanitize_hex_color( $footer_bg ) . '; } ';
	}

	$footer_text = get_theme_mod( 'silvia-footer-text-color', '#454545' );
	if ( $footer_text != '#454545' ) {
		$css .= '.site-footer { color: ' . sanitize_hex_color( $footer_text ) . '; } ';
	}

	$footer_link = get_theme_mod( 'silvia-footer-link-color', '#454545' );
	if ( $footer_link != '#454545' ) {
		$css .= '.site-footer p a { color: ' . sanitize_hex_color( $footer_link ) . '; } ';
	}

	$social_bg = get_theme_mod( 'silvia-footer-social-bg-color', '#333333' );
	if ( $social_bg != '#333333' ) {
		$css .= '.social-links a { background-color: ' . sanitize_hex_color( $social_bg ) . '; } ';
	}

	$social_bg_hover = get_theme_mod( 'silvia-footer-social-bg-hover-color', '#2196f3' );
	if ( $social_bg_hover != '#2196f3' ) {
		$css .= '.social-links a:hover { background-color: ' . sanitize_hex_color( $social_bg_hover ) . '; } ';
	}

	$social_icon = get_theme_mod( 'silvia-footer-social-icon-color', '#ffffff' );
	if ( $social_icon != '#ffffff' ) {
		$css .= '.social-links a { color: ' . sanitize_hex_color( $social_icon ) . '; } ';
	}

	$menu_link = get_theme_mod( 'silvia-menu-link-color', '#454545' );
	if ( $menu_link != '#454545' ) {
		$css .= '#site-navigation ul li a { color: ' . sanitize_hex_color( $menu_link ) . '; } ';
	}

	$menu_hover = get_theme_mod( 'silvia-menu-current-hover-color', '#2196f3' );
	if ( $menu_hover != '#2196f3' ) {
		$css .= '.menu-primary-items li a:hover, .menu-primary-items li.current-menu-item > a, .menu-primary-items li .sub-menu a:hover, .menu-primary-items li.menu-item-has-children:hover::after { color: ' . sanitize_hex_color( $menu_hover ) . '; } ';
	}

	$menu_hover_border = get_theme_mod( 'silvia-menu-current-hover-border-color', '#2196f3' );
	if ( $menu_hover_border != '#2196f3' ) {
		$css .= '.menu-primary-items li a:hover, .menu-primary-items li.current-menu-item > a { border-color: ' . sanitize_hex_color( $menu_hover_border ) . '; } ';
	}

	$post_text = get_theme_mod( 'silvia-post-text-color', '#454545' );
	if ( $post_text != '#454545' ) {
		$css .= '.single .entry-content { color: ' . sanitize_hex_color( $post_text ) . '; } ';
	}

	$post_heading = get_theme_mod( 'silvia-post-heading-color', '#454545' );
	if ( $post_heading != '#454545' ) {
		$css .= '.single .entry-title, .single .entry-content h1, .single .entry-content h2, .single .entry-content h3,.single .entry-content h4, .single .entry-content h5, .single .entry-content h6 { color: ' . sanitize_hex_color( $post_heading ) . '; } ';
	}

	$post_link = get_theme_mod( 'silvia-post-link-color', '#2196f3' );
	if ( $post_link != '#2196f3' ) {
		$css .= '.single .entry-content a{ color: ' . sanitize_hex_color( $post_link ) . '; } ';
	}

	$post_link_hover = get_theme_mod( 'silvia-post-link-hover-color', '#51adf6' );
	if ( $post_link_hover != '#51adf6' ) {
		$css .= '.single .entry-content a:hover { color: ' . sanitize_hex_color( $post_link_hover ) . '; } ';
	}

	$page_text = get_theme_mod( 'silvia-page-text-color', '#454545' );
	if ( $page_text != '#454545' ) {
		$css .= '.page .entry-content { color: ' . sanitize_hex_color( $page_text ) . '; } ';
	}

	$page_heading = get_theme_mod( 'silvia-page-heading-color', '#454545' );
	if ( $page_heading != '#454545' ) {
		$css .= '.page .entry-title, .page .entry-content h1, .page .entry-content h2, .page .entry-content h3,.page .entry-content h4, .page .entry-content h5, .page .entry-content h6 { color: ' . sanitize_hex_color( $page_heading ) . '; } ';
	}

	$page_link = get_theme_mod( 'silvia-page-link-color', '#2196f3' );
	if ( $page_link != '#2196f3' ) {
		$css .= '.page .entry-content a, .cat-links a { color: ' . sanitize_hex_color( $page_link ) . '; } ';
	}

	$page_link_hover = get_theme_mod( 'silvia-page-link-hover-color', '#51adf6' );
	if ( $page_link_hover != '#51adf6' ) {
		$css .= '.page .entry-content a:hover, .cat-links a:hover { color: ' . sanitize_hex_color( $page_link_hover ) . '; } ';
	}

	// Print the custom style
	wp_add_inline_style( 'silvia-style', $css );

}
add_action( 'wp_enqueue_scripts', 'silvia_custom_css' );

/**
 * Display theme documentation on customizer page.
 */
function silvia_documentation_link() {

	// Enqueue the script
	wp_enqueue_script( 'silvia-doc', get_template_directory_uri() . '/assets/js/customizer/doc.js', array(), '1.0.0', true );

	// Localize the script
	wp_localize_script( 'silvia-doc', 'prefixL10n',
		array(
			'prefixURL'   => esc_url( 'http://docs.theme-junkie.com/silvia/' ),
			'prefixLabel' => esc_html__( 'Documentation', 'silvia' ),
		)
	);

}
add_action( 'customize_controls_enqueue_scripts', 'silvia_documentation_link' );

/**
 * Display 'More premium themes' message.
 *
 * @since  1.0.0
 */
function silvia_premium_message() {

	// Enqueue the script
	wp_enqueue_script(
		'silvia-customizer-premium',
		get_template_directory_uri() . '/assets/js/customizer/premium.js',
		array(), '1.0.0',
		true
	);

}
add_action( 'customize_controls_enqueue_scripts', 'silvia_premium_message' );


/**
 * Custom RSS feed url.
 */
function silvia_custom_rss_url( $output, $feed ) {

	// Get the custom rss feed url
	$url = get_theme_mod( 'silvia-custom-rss' );

	// Do not redirect comments feed
	if ( strpos( $output, 'comments' ) ) {
		return $output;
	}

	// Check the settings.
	if ( ! empty( $url ) ) {
		$output = esc_url( $url );
	}

	return $output;
}
add_filter( 'feed_link', 'silvia_custom_rss_url', 10, 2 );

/**
 * Retrieve tags list.
 */
function silvia_tags_list() {

	// Set up empty array.
	$tags = array();

	// Retrieve available tags.
	$tags_obj = get_tags();

	// Set default/empty tag.
	$tags[''] = esc_html__( 'Select a tag &hellip;', 'silvia' );

	// Display the tags.
	foreach ( $tags_obj as $tag ) {
		$tags[$tag->term_id] = esc_attr( $tag->name );
	}

	return $tags;

}

/**
 * Sanitize the checkbox.
 *
 * @param boolean $input.
 * @return boolean (true|false).
 */
function silvia_sanitize_checkbox( $input ) {
	if ( 1 == $input ) {
		return true;
	} else {
		return false;
	}
}

/**
 * Sanitize the Footer Credits
 */
function silvia_sanitize_textarea( $text ) {
	if ( current_user_can( 'unfiltered_html' ) ) {
		$text = $text;
	} else {
		$text = wp_kses_post( $text );
	}
	return $text;
}

/**
 * Sanitize the post date style value.
 */
function silvia_sanitize_post_date_style( $style ) {
	if ( ! in_array( $style, array( 'absolute', 'relative' ) ) ) {
		$style = 'absolute';
	}
	return $style;
}

/**
 * Sanitize home page layout value.
 */
function silvia_sanitize_grid_layout( $layout ) {
	if ( ! in_array( $layout, array( '2-col', '3-col', '4-col' ) ) ) {
		$layout = '3-col';
	}
	return $layout;
}
