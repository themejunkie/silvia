<?php
/**
 * Fonts
 *
 * @package    Silvia
 * @author     Theme Junkie
 * @copyright  Copyright (c) 2015, Theme Junkie
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */

if ( ! function_exists( 'silvia_customizer_fonts' ) && class_exists( 'Customizer_Library_Styles' ) ) :
/**
 * Process user options to generate CSS needed to implement the choices.
 *
 * @since  1.0.0
 */
function silvia_customizer_fonts() {

	// Theme prefix
	$prefix = 'silvia-';
	
	// Text font
	$text  = silvia_mod( $prefix . 'text-font' );
	$stack = customizer_library_get_font_stack( $text );

	if ( $text !== customizer_library_get_default( $prefix . 'text-font' ) ) {

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'body'
			),
			'declarations' => array(
				'font-family' => $stack
			)
		) );
	}

	// Heading font
	$heading = silvia_mod( $prefix . 'heading-font' );
	$stack   = customizer_library_get_font_stack( $heading );

	if ( $heading !== customizer_library_get_default( $prefix . 'heading-font' ) ) {

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'h1',
				'h2',
				'h3',
				'h4',
				'h5',
				'h6',
			),
			'declarations' => array(
				'font-family' => $stack
			)
		) );
	}

}
endif;
add_action( 'silvia_customizer_library_styles', 'silvia_customizer_fonts' );

if ( ! function_exists( 'silvia_enqueue_fonts' ) ) :
/**
 * Enqueue Google Fonts
 *
 * @since  1.0.0
 */
function silvia_enqueue_fonts() {

	// Theme prefix
	$prefix = 'silvia-';

	// Font options
	$fonts = array(
		silvia_mod( $prefix . 'text-font' ),
		silvia_mod( $prefix . 'heading-font' )
	);

	$font_uri = customizer_library_get_google_font_uri( $fonts );

	// Load Google Fonts
	wp_enqueue_style( 'silvia-custom-fonts', $font_uri, array(), null );

}
endif;
add_action( 'wp_enqueue_scripts', 'silvia_enqueue_fonts' );