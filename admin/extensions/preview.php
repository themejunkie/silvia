<?php
/**
 * Customizer Utility Functions
 *
 * @package 	Customizer_Library
 * @author		Devin Price, The Theme Foundry
 */

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function customizer_library_customize_preview_js() {
	$path = str_replace( WP_CONTENT_DIR, WP_CONTENT_URL, dirname( dirname( __FILE__ ) ) );
	wp_enqueue_script( 'customizer-library-customizer', trailingslashit( $path ) . 'js/preview.js', array( 'customize-preview' ), '1.0.0', true );
}
add_action( 'customize_preview_init', 'customizer_library_customize_preview_js' );

/**
 * Enqueue customizer sections script
 */
function silvia_customizer_scripts() {
	// Path
	$path = str_replace( WP_CONTENT_DIR, WP_CONTENT_URL, dirname( dirname( __FILE__ ) ) );

	// Styles
	wp_enqueue_style( 'customizer-library-css', trailingslashit( $path ) . 'css/customizer.css', array(), '1.0.0' );

}
add_action( 'customize_controls_enqueue_scripts', 'silvia_customizer_scripts' );