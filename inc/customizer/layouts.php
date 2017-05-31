<?php
/**
 * Layouts Customizer
 */

/**
 * Register the customizer.
 */
function silvia_layouts_customize_register( $wp_customize ) {

	// Register new section: Layouts
	$wp_customize->add_section( 'silvia_layouts' , array(
		'title'       => esc_html__( 'Layouts', 'silvia' ),
		'panel'       => 'silvia_design',
		'priority'    => 5
	) );

	// Register grid layout setting
	$wp_customize->add_setting( 'silvia-grid-layout', array(
		'default'           => '3-col',
		'sanitize_callback' => 'silvia_sanitize_grid_layout',
	) );
	$wp_customize->add_control( 'silvia-grid-layout', array(
		'label'             => esc_html__( 'Posts Grid', 'silvia' ),
		'section'           => 'silvia_layouts',
		'priority'          => 3,
		'type'              => 'radio',
		'choices'           => array(
			'2-col' => esc_html__( '2 columns', 'silvia' ),
			'3-col' => esc_html__( '3 columns', 'silvia' ),
			'4-col' => esc_html__( '4 columns', 'silvia' )
		)
	) );

}
add_action( 'customize_register', 'silvia_layouts_customize_register' );
