<?php
/**
 * Footer color
 *
 * @package    Silvia
 * @author     Theme Junkie
 * @copyright  Copyright (c) 2015, Theme Junkie
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */

if ( ! function_exists( 'silvia_customizer_footer_styles' ) && class_exists( 'Customizer_Library_Styles' ) ) :
/**
 * Process user options to generate CSS needed to implement the choices.
 *
 * @since  1.0.0
 */
function silvia_customizer_footer_styles() {

	// Theme prefix
	$prefix = 'silvia-';

	// Background color
	$bg = silvia_mod( $prefix . 'footer-bg-color' );

	if ( $bg !== customizer_library_get_default( $prefix . 'footer-bg-color' ) ) {

		$color = sanitize_hex_color( $bg );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-footer'
			),
			'declarations' => array(
				'background-color' => $color
			)
		) );
	}

	// Text color
	$text = silvia_mod( $prefix . 'footer-text-color' );

	if ( $text !== customizer_library_get_default( $prefix . 'footer-text-color' ) ) {

		$color = sanitize_hex_color( $text );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-footer'
			),
			'declarations' => array(
				'color' => $color
			)
		) );
	}

	// Link color
	$link = silvia_mod( $prefix . 'footer-link-color' );

	if ( $link !== customizer_library_get_default( $prefix . 'footer-link-color' ) ) {

		$color = sanitize_hex_color( $link );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-footer p a'
			),
			'declarations' => array(
				'color' => $color
			)
		) );
	}

	// Social bg color
	$social_bg = silvia_mod( $prefix . 'footer-social-bg-color' );

	if ( $social_bg !== customizer_library_get_default( $prefix . 'footer-social-bg-color' ) ) {

		$color = sanitize_hex_color( $social_bg );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.social-links a'
			),
			'declarations' => array(
				'background-color' => $color
			)
		) );
	}

	// Social bg hover color
	$social_bg_hover = silvia_mod( $prefix . 'footer-social-bg-hover-color' );

	if ( $social_bg_hover !== customizer_library_get_default( $prefix . 'footer-social-bg-hover-color' ) ) {

		$color = sanitize_hex_color( $social_bg_hover );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.social-links a:hover'
			),
			'declarations' => array(
				'background-color' => $color
			)
		) );
	}

	// Social icon color
	$social_icon = silvia_mod( $prefix . 'footer-social-icon-color' );

	if ( $social_icon !== customizer_library_get_default( $prefix . 'footer-social-icon-color' ) ) {

		$color = sanitize_hex_color( $social_icon );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.social-links a'
			),
			'declarations' => array(
				'color' => $color
			)
		) );
	}

}
endif;
add_action( 'silvia_customizer_library_styles', 'silvia_customizer_footer_styles' );