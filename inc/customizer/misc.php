<?php
/**
 * Misc Customizer
 */

/**
 * Register the customizer.
 */
function silvia_misc_customize_register( $wp_customize ) {

	// Register new section: Misc
	$wp_customize->add_section( 'silvia_misc' , array(
		'title'       => esc_html__( 'Misc', 'silvia' ),
		'description' => esc_html__( 'These options is used for customizing general elements.', 'silvia' ),
		'panel'       => 'silvia_options',
		'priority'    => 9
	) );

	// Register Custom RSS setting
	$wp_customize->add_setting( 'silvia-custom-rss', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'silvia-custom-rss', array(
		'label'             => esc_html__( 'Custom RSS', 'silvia' ),
		'description'       => esc_html__( 'Custom RSS URL such as Feedburner.', 'silvia' ),
		'section'           => 'silvia_misc',
		'priority'          => 1,
		'type'              => 'url'
	) );

	// Register blog content setting
	$wp_customize->add_setting( 'silvia-home-callout', array(
		'default'           => '',
		'sanitize_callback' => 'silvia_sanitize_textarea',
	) );
	$wp_customize->add_control( 'silvia-home-callout', array(
		'label'             => esc_html__( 'Callout', 'silvia' ),
		'description'       => esc_html__( 'The text that appear on home page below the site title and site description.', 'silvia' ),
		'section'           => 'silvia_misc',
		'priority'          => 3,
		'type'              => 'textarea'
	) );

	// Register search setting
	$wp_customize->add_setting( 'silvia-search-icon', array(
		'default'           => 1,
		'sanitize_callback' => 'silvia_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'silvia-search-icon', array(
		'label'             => esc_html__( 'Show search icon', 'silvia' ),
		'section'           => 'silvia_misc',
		'priority'          => 5,
		'type'              => 'checkbox'
	) );

	// Register page title setting
	$wp_customize->add_setting( 'silvia-page-title', array(
		'default'           => 1,
		'sanitize_callback' => 'silvia_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'silvia-page-title', array(
		'label'             => esc_html__( 'Show page title', 'silvia' ),
		'section'           => 'silvia_misc',
		'priority'          => 7,
		'type'              => 'checkbox'
	) );

	// Register Footer Credits setting
	$wp_customize->add_setting( 'silvia-footer-text', array(
		'sanitize_callback' => 'silvia_sanitize_textarea',
		'default'           => '&copy; Copyright ' . date( 'Y' ) . ' <a href="' . esc_url( home_url() ) . '">' . esc_attr( get_bloginfo( 'name' ) ) . '</a> &middot; Designed by <a href="http://www.theme-junkie.com/">Theme Junkie</a>'
	) );
	$wp_customize->add_control( 'silvia-footer-text', array(
		'label'             => esc_html__( 'Footer Text', 'silvia' ),
		'section'           => 'silvia_misc',
		'priority'          => 11,
		'type'              => 'textarea'
	) );

}
add_action( 'customize_register', 'silvia_misc_customize_register' );
