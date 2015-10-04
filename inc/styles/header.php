<?php
/**
 * Header color
 *
 * @package    Silvia
 * @author     Theme Junkie
 * @copyright  Copyright (c) 2015, Theme Junkie
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */

if ( ! function_exists( 'silvia_customizer_header_styles' ) && class_exists( 'Customizer_Library_Styles' ) ) :
/**
 * Process user options to generate CSS needed to implement the choices.
 *
 * @since  1.0.0
 */
function silvia_customizer_header_styles() {

	// Theme prefix
	$prefix = 'silvia-';

	// Site title color
	$title = silvia_mod( $prefix . 'site-title-color' );

	if ( $title !== customizer_library_get_default( $prefix . 'site-title-color' ) ) {

		$color = sanitize_hex_color( $title );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'#masthead .site-title a'
			),
			'declarations' => array(
				'color' => $color
			)
		) );
	}

	// Site description color
	$desc = silvia_mod( $prefix . 'site-desc-color' );

	if ( $desc !== customizer_library_get_default( $prefix . 'site-desc-color' ) ) {

		$color = sanitize_hex_color( $desc );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'#masthead .site-description'
			),
			'declarations' => array(
				'color' => $color
			)
		) );
	}

}
endif;
add_action( 'silvia_customizer_library_styles', 'silvia_customizer_header_styles' );