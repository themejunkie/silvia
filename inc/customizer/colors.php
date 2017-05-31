<?php
/**
 * Colors Customizer
 */

/**
 * Register the customizer.
 */
function silvia_colors_customize_register( $wp_customize ) {

	// Register search colors setting
	$wp_customize->add_setting( 'silvia-search-colors', array(
		'default'           => '',
		'sanitize_callback' => 'esc_attr'
	) );
	$wp_customize->add_control( new Silvia_Custom_Text( $wp_customize, 'silvia-search-colors', array(
		'label'             => esc_html__( 'SEARCH', 'silvia' ),
		'section'           => 'colors',
		'priority'          => 1
	) ) );

		// Register search icon color setting
		$wp_customize->add_setting( 'silvia-search-icon-color', array(
			'default'           => '#454545',
			'sanitize_callback' => 'sanitize_hex_color',
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'silvia-search-icon-color', array(
			'label'             => esc_html__( 'Icon', 'silvia' ),
			'section'           => 'colors',
			'priority'          => 3
		) ) );

		// Register search background color setting
		$wp_customize->add_setting( 'silvia-search-bg-color', array(
			'default'           => '#333333',
			'sanitize_callback' => 'sanitize_hex_color',
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'silvia-search-bg-color', array(
			'label'             => esc_html__( 'Background', 'silvia' ),
			'section'           => 'colors',
			'priority'          => 5
		) ) );

	// Register header colors setting
	$wp_customize->add_setting( 'silvia-header-colors', array(
		'default'           => '',
		'sanitize_callback' => 'esc_attr'
	) );
	$wp_customize->add_control( new Silvia_Custom_Text( $wp_customize, 'silvia-header-colors', array(
		'label'             => esc_html__( 'HEADER', 'silvia' ),
		'section'           => 'colors',
		'priority'          => 9
	) ) );

		// Register site title color setting
		$wp_customize->add_setting( 'silvia-site-title-color', array(
			'default'           => '#454545',
			'sanitize_callback' => 'sanitize_hex_color'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'silvia-site-title-color', array(
			'label'             => esc_html__( 'Site title', 'silvia' ),
			'section'           => 'colors',
			'priority'          => 13
		) ) );

		// Register site desc color setting
		$wp_customize->add_setting( 'silvia-site-desc-color', array(
			'default'           => '#777777',
			'sanitize_callback' => 'sanitize_hex_color'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'silvia-site-desc-color', array(
			'label'             => esc_html__( 'Site description', 'silvia' ),
			'section'           => 'colors',
			'priority'          => 15
		) ) );

	// Register menu colors setting
	$wp_customize->add_setting( 'silvia-menu-colors', array(
		'default'           => '',
		'sanitize_callback' => 'esc_attr'
	) );
	$wp_customize->add_control( new Silvia_Custom_Text( $wp_customize, 'silvia-menu-colors', array(
		'label'             => esc_html__( 'MENU', 'silvia' ),
		'section'           => 'colors',
		'priority'          => 17
	) ) );

		// Register link color setting
		$wp_customize->add_setting( 'silvia-menu-link-color', array(
			'default'           => '#454545',
			'sanitize_callback' => 'sanitize_hex_color'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'silvia-menu-link-color', array(
			'label'             => esc_html__( 'Link', 'silvia' ),
			'section'           => 'colors',
			'priority'          => 23
		) ) );

		// Register menu hover color setting
		$wp_customize->add_setting( 'silvia-menu-current-hover-color', array(
			'default'           => '#2196f3',
			'sanitize_callback' => 'sanitize_hex_color'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'silvia-menu-current-hover-color', array(
			'label'             => esc_html__( 'Hover & current', 'silvia' ),
			'section'           => 'colors',
			'priority'          => 25
		) ) );

		// Register menu hover border color setting
		$wp_customize->add_setting( 'silvia-menu-current-hover-border-color', array(
			'default'           => '#2196f3',
			'sanitize_callback' => 'sanitize_hex_color'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'silvia-menu-current-hover-border-color', array(
			'label'             => esc_html__( 'Hover & current menu border', 'silvia' ),
			'section'           => 'colors',
			'priority'          => 26
		) ) );

	// Register posts colors setting
	$wp_customize->add_setting( 'silvia-posts-colors', array(
		'default'           => '',
		'sanitize_callback' => 'esc_attr'
	) );
	$wp_customize->add_control( new Silvia_Custom_Text( $wp_customize, 'silvia-posts-colors', array(
		'label'             => esc_html__( 'POST', 'silvia' ),
		'section'           => 'colors',
		'priority'          => 27
	) ) );

		// Register post text color setting
		$wp_customize->add_setting( 'silvia-post-text-color', array(
			'default'           => '#454545',
			'sanitize_callback' => 'sanitize_hex_color'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'silvia-post-text-color', array(
			'label'             => esc_html__( 'Text', 'silvia' ),
			'section'           => 'colors',
			'priority'          => 29
		) ) );

		// Register post heading color setting
		$wp_customize->add_setting( 'silvia-post-heading-color', array(
			'default'           => '#454545',
			'sanitize_callback' => 'sanitize_hex_color'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'silvia-post-heading-color', array(
			'label'             => esc_html__( 'Heading', 'silvia' ),
			'section'           => 'colors',
			'priority'          => 31
		) ) );

		// Register post link color setting
		$wp_customize->add_setting( 'silvia-post-link-color', array(
			'default'           => '#2196f3',
			'sanitize_callback' => 'sanitize_hex_color'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'silvia-post-link-color', array(
			'label'             => esc_html__( 'Link', 'silvia' ),
			'section'           => 'colors',
			'priority'          => 33
		) ) );

		// Register post link hover color setting
		$wp_customize->add_setting( 'silvia-post-link-hover-color', array(
			'default'           => '#51adf6',
			'sanitize_callback' => 'sanitize_hex_color'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'silvia-post-link-hover-color', array(
			'label'             => esc_html__( 'Link hover', 'silvia' ),
			'section'           => 'colors',
			'priority'          => 35
		) ) );

	// Register page colors setting
	$wp_customize->add_setting( 'silvia-page-colors', array(
		'default'           => '',
		'sanitize_callback' => 'esc_attr'
	) );
	$wp_customize->add_control( new Silvia_Custom_Text( $wp_customize, 'silvia-page-colors', array(
		'label'             => esc_html__( 'PAGE', 'silvia' ),
		'section'           => 'colors',
		'priority'          => 37
	) ) );

		// Register page text color setting
		$wp_customize->add_setting( 'silvia-page-text-color', array(
			'default'           => '#454545',
			'sanitize_callback' => 'sanitize_hex_color'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'silvia-page-text-color', array(
			'label'             => esc_html__( 'Text', 'silvia' ),
			'section'           => 'colors',
			'priority'          => 39
		) ) );

		// Register page heading color setting
		$wp_customize->add_setting( 'silvia-page-heading-color', array(
			'default'           => '#454545',
			'sanitize_callback' => 'sanitize_hex_color'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'silvia-page-heading-color', array(
			'label'             => esc_html__( 'Heading', 'silvia' ),
			'section'           => 'colors',
			'priority'          => 41
		) ) );

		// Register page link color setting
		$wp_customize->add_setting( 'silvia-page-link-color', array(
			'default'           => '#2196f3',
			'sanitize_callback' => 'sanitize_hex_color'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'silvia-page-link-color', array(
			'label'             => esc_html__( 'Link', 'silvia' ),
			'section'           => 'colors',
			'priority'          => 43
		) ) );

		// Register page link hover color setting
		$wp_customize->add_setting( 'silvia-page-link-hover-color', array(
			'default'           => '#51adf6',
			'sanitize_callback' => 'sanitize_hex_color'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'silvia-page-link-hover-color', array(
			'label'             => esc_html__( 'Link hover', 'silvia' ),
			'section'           => 'colors',
			'priority'          => 45
		) ) );

	// Register footer colors setting
	$wp_customize->add_setting( 'silvia-footer-colors', array(
		'default'           => '',
		'sanitize_callback' => 'esc_attr'
	) );
	$wp_customize->add_control( new Silvia_Custom_Text( $wp_customize, 'silvia-footer-colors', array(
		'label'             => esc_html__( 'FOOTER', 'silvia' ),
		'section'           => 'colors',
		'priority'          => 69
	) ) );

		// Register footer background color setting
		$wp_customize->add_setting( 'silvia-footer-bg-color', array(
			'default'           => '#f5f5f5',
			'sanitize_callback' => 'sanitize_hex_color'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'silvia-footer-bg-color', array(
			'label'             => esc_html__( 'Background', 'silvia' ),
			'section'           => 'colors',
			'priority'          => 71
		) ) );

		// Register footer color setting
		$wp_customize->add_setting( 'silvia-footer-text-color', array(
			'default'           => '#454545',
			'sanitize_callback' => 'sanitize_hex_color'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'silvia-footer-text-color', array(
			'label'             => esc_html__( 'Text color', 'silvia' ),
			'section'           => 'colors',
			'priority'          => 73
		) ) );

		// Register footer link color setting
		$wp_customize->add_setting( 'silvia-footer-link-color', array(
			'default'           => '#454545',
			'sanitize_callback' => 'sanitize_hex_color'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'silvia-footer-link-color', array(
			'label'             => esc_html__( 'Link color', 'silvia' ),
			'section'           => 'colors',
			'priority'          => 75
		) ) );

	// Register social colors setting
	$wp_customize->add_setting( 'silvia-social-colors', array(
		'default'           => '',
		'sanitize_callback' => 'esc_attr'
	) );
	$wp_customize->add_control( new Silvia_Custom_Text( $wp_customize, 'silvia-social-colors', array(
		'label'             => esc_html__( 'SOCIAL', 'silvia' ),
		'section'           => 'colors',
		'priority'          => 77
	) ) );

		// Register social background color setting
		$wp_customize->add_setting( 'silvia-footer-social-bg-color', array(
			'default'           => '#333333',
			'sanitize_callback' => 'sanitize_hex_color'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'silvia-footer-social-bg-color', array(
			'label'             => esc_html__( 'Background', 'silvia' ),
			'section'           => 'colors',
			'priority'          => 79
		) ) );

		// Register social background hover color setting
		$wp_customize->add_setting( 'silvia-footer-social-bg-hover-color', array(
			'default'           => '#2196f3',
			'sanitize_callback' => 'sanitize_hex_color'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'silvia-footer-social-bg-hover-color', array(
			'label'             => esc_html__( 'Background hover', 'silvia' ),
			'section'           => 'colors',
			'priority'          => 81
		) ) );

		// Register social icon color setting
		$wp_customize->add_setting( 'silvia-footer-social-icon-color', array(
			'default'           => '#ffffff',
			'sanitize_callback' => 'sanitize_hex_color'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'silvia-footer-social-icon-color', array(
			'label'             => esc_html__( 'Icon', 'silvia' ),
			'section'           => 'colors',
			'priority'          => 83
		) ) );

}
add_action( 'customize_register', 'silvia_colors_customize_register' );
