<?php
/**
 * Post Customizer
 */

/**
 * Register the customizer.
 */
function silvia_post_customize_register( $wp_customize ) {

	// Register new section: Post
	$wp_customize->add_section( 'silvia_post' , array(
		'title'       => esc_html__( 'Posts', 'silvia' ),
		'description' => esc_html__( 'Posts is a single post page. Please navigate the preview to the single post to see changes.', 'silvia' ),
		'panel'       => 'silvia_options',
		'priority'    => 5
	) );

	// Register post meta group setting
	$wp_customize->add_setting( 'silvia-post-meta', array(
		'default'           => '',
		'sanitize_callback' => 'esc_attr'
	) );
	$wp_customize->add_control( new Silvia_Custom_Text( $wp_customize, 'silvia-post-meta', array(
		'label'             => esc_html__( 'POST META', 'silvia' ),
		'section'           => 'silvia_post',
		'priority'          => 1
	) ) );

		// Register post categories setting
		$wp_customize->add_setting( 'silvia-post-date', array(
			'default'           => 1,
			'sanitize_callback' => 'silvia_sanitize_checkbox',
		) );
		$wp_customize->add_control( 'silvia-post-date', array(
			'label'             => esc_html__( 'Show post date', 'silvia' ),
			'section'           => 'silvia_post',
			'priority'          => 1,
			'type'              => 'checkbox'
		) );

		// Register post author setting
		$wp_customize->add_setting( 'silvia-post-author', array(
			'default'           => 1,
			'sanitize_callback' => 'silvia_sanitize_checkbox',
		) );
		$wp_customize->add_control( 'silvia-post-author', array(
			'label'             => esc_html__( 'Show post author name', 'silvia' ),
			'section'           => 'silvia_post',
			'priority'          => 3,
			'type'              => 'checkbox'
		) );

		// Register post categories setting
		$wp_customize->add_setting( 'silvia-post-cat', array(
			'default'           => 1,
			'sanitize_callback' => 'silvia_sanitize_checkbox',
		) );
		$wp_customize->add_control( 'silvia-post-cat', array(
			'label'             => esc_html__( 'Show post categories', 'silvia' ),
			'section'           => 'silvia_post',
			'priority'          => 5,
			'type'              => 'checkbox'
		) );

		// Register post tags setting
		$wp_customize->add_setting( 'silvia-post-tag', array(
			'default'           => 1,
			'sanitize_callback' => 'silvia_sanitize_checkbox',
		) );
		$wp_customize->add_control( 'silvia-post-tag', array(
			'label'             => esc_html__( 'Show post tags', 'silvia' ),
			'section'           => 'silvia_post',
			'priority'          => 7,
			'type'              => 'checkbox'
		) );

	// Register post date style setting
	$wp_customize->add_setting( 'silvia-post-date-style-section', array(
		'default'           => '',
		'sanitize_callback' => 'esc_attr'
	) );
	$wp_customize->add_control( new Silvia_Custom_Text( $wp_customize, 'silvia-post-date-style-section', array(
		'label'             => esc_html__( 'POST DATE', 'silvia' ),
		'section'           => 'silvia_post',
		'priority'          => 9
	) ) );

		// Register post author setting
		$wp_customize->add_setting( 'silvia-post-date-style', array(
			'default'           => 'absolute',
			'sanitize_callback' => 'silvia_sanitize_post_date_style',
		) );
		$wp_customize->add_control( 'silvia-post-date-style', array(
			'label'             => esc_html__( 'Style', 'silvia' ),
			'section'           => 'silvia_post',
			'priority'          => 11,
			'type'              => 'radio',
			'choices'           => array(
				'absolute' => esc_html__( 'Absolute (June 16, 2015)', 'silvia' ),
				'relative' => esc_html__( 'Relative (1 week ago)', 'silvia' )
			)
		) );

	// Register related posts setting
	$wp_customize->add_setting( 'silvia-related-posts-section', array(
		'default'           => '',
		'sanitize_callback' => 'esc_attr'
	) );
	$wp_customize->add_control( new Silvia_Custom_Text( $wp_customize, 'silvia-related-posts-section', array(
		'label'             => esc_html__( 'RELATED POSTS', 'silvia' ),
		'section'           => 'silvia_post',
		'priority'          => 13
	) ) );

		// Register related posts enable setting
		$wp_customize->add_setting( 'silvia-related-posts', array(
			'default'           => 1,
			'sanitize_callback' => 'silvia_sanitize_checkbox',
		) );
		$wp_customize->add_control( 'silvia-related-posts', array(
			'label'             => esc_html__( 'Show related posts', 'silvia' ),
			'section'           => 'silvia_post',
			'priority'          => 15,
			'type'              => 'checkbox'
		) );

		// Register related posts image setting
		$wp_customize->add_setting( 'silvia-related-posts-img', array(
			'default'           => 1,
			'sanitize_callback' => 'silvia_sanitize_checkbox',
		) );
		$wp_customize->add_control( 'silvia-related-posts-img', array(
			'label'             => esc_html__( 'Show related posts thumbnail', 'silvia' ),
			'section'           => 'silvia_post',
			'priority'          => 17,
			'type'              => 'checkbox'
		) );

}
add_action( 'customize_register', 'silvia_post_customize_register' );
