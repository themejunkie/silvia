<?php
/**
 * Social Customizer
 */

/**
 * Register the customizer.
 */
function silvia_social_customize_register( $wp_customize ) {

	// Register new section: Social
	$wp_customize->add_section( 'silvia_social' , array(
		'title'       => esc_html__( 'Social', 'silvia' ),
		'description' => __( 'The social button will appear at the bottom of your site. Please add full profile link, for example https://twitter.com/theme_junkie/', 'silvia' ),
		'panel'       => 'silvia_options',
		'priority'    => 7
	) );

	// Register twitter setting
	$wp_customize->add_setting( 'silvia-twitter', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'silvia-twitter', array(
		'label'             => esc_html__( 'Twitter', 'silvia' ),
		'section'           => 'silvia_social',
		'priority'          => 1,
		'type'              => 'url'
	) );

	// Register facebook setting
	$wp_customize->add_setting( 'silvia-facebook', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'silvia-facebook', array(
		'label'             => esc_html__( 'Facebook', 'silvia' ),
		'section'           => 'silvia_social',
		'priority'          => 3,
		'type'              => 'url'
	) );

	// Register gplus setting
	$wp_customize->add_setting( 'silvia-gplus', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'silvia-gplus', array(
		'label'             => esc_html__( 'Google Plus', 'silvia' ),
		'section'           => 'silvia_social',
		'priority'          => 5,
		'type'              => 'url'
	) );

	// Register linkedin setting
	$wp_customize->add_setting( 'silvia-linkedin', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'silvia-linkedin', array(
		'label'             => esc_html__( 'Linkedin', 'silvia' ),
		'section'           => 'silvia_social',
		'priority'          => 7,
		'type'              => 'url'
	) );

	// Register dribbble setting
	$wp_customize->add_setting( 'silvia-dribbble', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'silvia-dribbble', array(
		'label'             => esc_html__( 'Dribbble', 'silvia' ),
		'section'           => 'silvia_social',
		'priority'          => 9,
		'type'              => 'url'
	) );

	// Register instagram setting
	$wp_customize->add_setting( 'silvia-instagram', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'silvia-instagram', array(
		'label'             => esc_html__( 'Instagram', 'silvia' ),
		'section'           => 'silvia_social',
		'priority'          => 11,
		'type'              => 'url'
	) );

	// Register vk setting
	$wp_customize->add_setting( 'silvia-vk', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'silvia-vk', array(
		'label'             => esc_html__( 'VK', 'silvia' ),
		'section'           => 'silvia_social',
		'priority'          => 13,
		'type'              => 'url'
	) );

}
add_action( 'customize_register', 'silvia_social_customize_register' );
