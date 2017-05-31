<?php
/**
 * Polylang compatibility file
 *
 * @package    Silvia
 * @author     Theme Junkie
 * @copyright  Copyright (c) 2015, Theme Junkie
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */

/**
 * Register callout strings
 */
$callout = get_theme_mod( 'silvia-home-callout' ); // Get the data set in customizer
pll_register_string( 'silvia-home-callout', $callout, 'silvia' );

/**
 * Register footer text strings
 */
$footer_text = get_theme_mod( 'silvia-footer-text' ); // Get the data set in customizer
pll_register_string( 'silvia-footer-text', $footer_text, 'silvia' );
