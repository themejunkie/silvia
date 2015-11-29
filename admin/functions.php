<?php
/**
 * Custom and output functions for the theme customizer
 *
 * @package    Silvia
 * @author     Theme Junkie
 * @copyright  Copyright (c) 2015, Theme Junkie
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */

if ( ! function_exists( 'silvia_mod' ) ) :
/**
 * Wrap get_theme_mod function
 */
function silvia_mod( $name ) {
	return get_theme_mod( $name, customizer_library_get_default( $name ) );
}
endif;

/**
 * Custom customizer function.
 *
 * @since  1.0.0
 */
function silvia_move_default_customizer( $wp_customize ) {

	// Move the customize to new panel
	$wp_customize->get_section( 'title_tagline' )->panel       = 'header';
	$wp_customize->get_section( 'static_front_page' )->panel   = 'general';
	$wp_customize->get_section( 'colors' )->panel              = 'color';
	$wp_customize->get_section( 'background_image' )->panel    = 'bg_image';

	// Change the title/description
	$wp_customize->get_section( 'title_tagline' )->title       = __( 'Site Title', 'silvia' );
	$wp_customize->get_section( 'title_tagline' )->description = __( 'Site title will automatically disapear if you upload a logo.', 'silvia' );
	$wp_customize->get_section( 'colors' )->title              = __( 'Background', 'silvia' );
	$wp_customize->get_section( 'colors' )->priority           = 1;

	// Live preview
	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

}
add_action( 'customize_register', 'silvia_move_default_customizer' );

/**
 * Retrieve tags list.
 *
 * @since  1.0.0
 * @return array $tags
 */
function silvia_tags_list() {

	// Set up empty array.
	$tags = array();

	// Retrieve available tags.
	$tags_obj = get_tags();

	// Set default/empty tag.
	$tags[''] = __( 'Select a tag &hellip;', 'silvia' );

	// Display the tags.
	foreach ( $tags_obj as $tag ) {
		$tags[$tag->term_id] = esc_attr( $tag->name );
	}

	return $tags;

}

/**
 * Retrieve categories list.
 *
 * @since  1.0.0
 * @return array $tags
 */
function silvia_cats_list() {

	// Set up empty array.
	$cats = array();

	// Retrieve available categories.
	$cats_obj = get_categories();

	// Set default/empty tag.
	$cats[''] = __( 'Select a category &hellip;', 'silvia' );

	// Display the tags.
	foreach ( $cats_obj as $cat ) {
		$cats[$cat->term_id] = esc_attr( $cat->name );
	}

	return $cats;

}

/**
 * Display theme documentation on customizer page.
 *
 * @since  1.0.0
 */
function silvia_documentation_link() {

	// Enqueue the script
	wp_enqueue_script(
		'silvia-customizer-doc',
		get_template_directory_uri() . '/admin/js/doc.js',
		array(), '1.0.0',
		true
	);

	// Localize the script
	wp_localize_script(
		'silvia-customizer-doc',
		'prefixL10n',
		array(
			'prefixURL'   => esc_url( 'http://docs.theme-junkie.com/silvia/' ),
			'prefixLabel' => __( 'Documentation', 'silvia' ),
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
		get_template_directory_uri() . '/admin/js/premium.js',
		array(), '1.0.0',
		true
	);

}
add_action( 'customize_controls_enqueue_scripts', 'silvia_premium_message' );