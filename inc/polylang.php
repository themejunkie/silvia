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

// Theme prefix
$prefix = 'silvia-';

/**
 * Register callout strings
 */
$callout = silvia_mod( $prefix . 'home-callout' ); // Get the data set in customizer
pll_register_string( $prefix . 'home-callout', $callout, 'silvia' );

/**
 * Register footer text strings
 */
$footer_text = silvia_mod( $prefix . 'footer-text' ); // Get the data set in customizer
pll_register_string( $prefix . 'footer-text', $footer_text, 'silvia' );