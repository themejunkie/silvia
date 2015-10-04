<?php
/**
 * Menu color
 *
 * @package    Silvia
 * @author     Theme Junkie
 * @copyright  Copyright (c) 2015, Theme Junkie
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */

if ( ! function_exists( 'silvia_customizer_menu_styles' ) && class_exists( 'Customizer_Library_Styles' ) ) :
/**
 * Process user options to generate CSS needed to implement the choices.
 *
 * @since  1.0.0
 */
function silvia_customizer_menu_styles() {

	// Theme prefix
	$prefix = 'silvia-';

	// Menu link color
	$menu_link = silvia_mod( $prefix . 'menu-link-color' );

	if ( $menu_link !== customizer_library_get_default( $prefix . 'menu-link-color' ) ) {

		$color = sanitize_hex_color( $menu_link );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'#site-navigation ul li a'
			),
			'declarations' => array(
				'color' => $color
			)
		) );
	}

	// Menu current & hover link color
	$current_hover = silvia_mod( $prefix . 'menu-current-hover-color' );

	if ( $current_hover !== customizer_library_get_default( $prefix . 'menu-current-hover-color' ) ) {

		$color = sanitize_hex_color( $current_hover );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.menu-primary-items li a:hover',
				'.menu-primary-items li.current-menu-item > a',
				'.menu-primary-items li .sub-menu a:hover'
			),
			'declarations' => array(
				'color' => $color
			)
		) );
	}

	// Menu current & hover border color
	$current_hover_border = silvia_mod( $prefix . 'menu-current-hover-border-color' );

	if ( $current_hover_border !== customizer_library_get_default( $prefix . 'menu-current-hover-border-color' ) ) {

		$color = sanitize_hex_color( $current_hover_border );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.menu-primary-items li a:hover',
				'.menu-primary-items li.current-menu-item > a',
			),
			'declarations' => array(
				'border-color' => $color
			)
		) );
	}

}
endif;
add_action( 'silvia_customizer_library_styles', 'silvia_customizer_menu_styles' );