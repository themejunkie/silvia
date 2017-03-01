<?php
/**
 * Theme functions file
 *
 * Contains all of the Theme's setup functions, custom functions,
 * custom hooks and Theme settings.
 *
 * @package    Silvia
 * @author     Theme Junkie
 * @copyright  Copyright (c) 2015, Theme Junkie
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */

/**
 * Sets the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function silvia_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'silvia_content_width', 869 );
}
add_action( 'after_setup_theme', 'silvia_content_width', 0 );

if ( ! function_exists( 'silvia_content_width' ) ) :
/**
 * Set new content width if user uses 1 column layout.
 *
 * @since  1.0.0
 */
function silvia_content_width() {
	global $content_width;

	if ( in_array( get_theme_mod( 'theme_layout' ), array( '1c' ) ) && ! is_single() ) {
		$content_width = 940;
	}
}
endif;
add_action( 'template_redirect', 'silvia_content_width' );

if ( ! function_exists( 'silvia_theme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * @since  1.0.0
 */
function silvia_theme_setup() {

	// Make the theme available for translation.
	load_theme_textdomain( 'silvia', trailingslashit( get_template_directory() ) . 'languages' );

	// Add custom stylesheet file to the TinyMCE visual editor.
	add_editor_style( array( 'assets/css/editor-style.css', silvia_crimnson_text_font(), silvia_oswald_font() ) );

	// Add RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	// Enable support for Post Thumbnails.
	add_theme_support( 'post-thumbnails' );

	// Set custom image sizes
	add_image_size( 'silvia-featured', 1024, 650, true );

	// Register custom navigation menu.
	register_nav_menus(
		array(
			'primary' => __( 'Primary Location', 'silvia' )
		)
	);

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-list', 'search-form', 'comment-form', 'gallery', 'caption'
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'silvia_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Enable theme-layouts extensions.
	add_theme_support( 'theme-layouts',
		array(
			'1c'   => __( '1 Column Wide (Full Width)', 'silvia' ),
			'2c-l' => __( '2 Columns: Content / Sidebar', 'silvia' ),
			'2c-r' => __( '2 Columns: Sidebar / Content', 'silvia' )
		),
		array( 'customize' => false, 'default' => '1c' )
	);

	// This theme uses its own gallery styles.
	add_filter( 'use_default_gallery_style', '__return_false' );

	// Indicate widget sidebars can use selective refresh in the Customizer.
	add_theme_support( 'customize-selective-refresh-widgets' );

}
endif; // silvia_theme_setup
add_action( 'after_setup_theme', 'silvia_theme_setup' );

/**
 * Registers widget areas and custom widgets.
 *
 * @since 1.0.0
 * @link  http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function silvia_sidebars_init() {

	register_sidebar(
		array(
			'name'          => __( 'Primary Sidebar', 'silvia' ),
			'id'            => 'primary',
			'description'   => __( 'Main sidebar that appears on the right.', 'silvia' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

}
add_action( 'widgets_init', 'silvia_sidebars_init' );

/**
 * Register Crimson Text Google font.
 *
 * @since  1.0.0
 * @return string
 */
function silvia_crimnson_text_font() {

	$font_url = '';
	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Crimson Text, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Crimson Text font: on or off', 'silvia' ) ) {
		$font_url = add_query_arg( 'family', urlencode( 'Crimson Text:400,700,400italic' ), "//fonts.googleapis.com/css" );
	}

	return $font_url;
}

/**
 * Register Oswald Google font.
 *
 * @since  1.0.0
 * @return string
 */
function silvia_oswald_font() {

	$font_url = '';
	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Oswald, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Oswald font: on or off', 'silvia' ) ) {
		$font_url = add_query_arg( 'family', urlencode( 'Oswald:400,700,300' ), "//fonts.googleapis.com/css" );
	}

	return $font_url;
}

/**
 * Custom template tags for this theme.
 */
require trailingslashit( get_template_directory() ) . 'inc/template-tags.php';

/**
 * Enqueue scripts and styles.
 */
require trailingslashit( get_template_directory() ) . 'inc/scripts.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require trailingslashit( get_template_directory() ) . 'inc/extras.php';

/**
 * Load Jetpack compatibility file.
 */
require trailingslashit( get_template_directory() ) . 'inc/jetpack.php';

/**
 * Customizer.
 */
require trailingslashit( get_template_directory() ) . 'admin/customizer-library.php';
require trailingslashit( get_template_directory() ) . 'admin/functions.php';

/**
 * Customizer functions.
 */
require trailingslashit( get_template_directory() ) . 'inc/customizer.php';
require trailingslashit( get_template_directory() ) . 'inc/mods.php';

/**
 * We use some part of Hybrid Core to extends our themes.
 *
 * @link  http://themehybrid.com/hybrid-core Hybrid Core site.
 */
require trailingslashit( get_template_directory() ) . 'inc/hybrid/attr.php';
require trailingslashit( get_template_directory() ) . 'inc/hybrid/theme-layouts.php';

/**
 * Polylang custom function
 */
if ( function_exists( 'pll_the_languages' ) ) {
	require trailingslashit( get_template_directory() ) . 'inc/polylang.php';
}

/**
 * Require and recommended plugins list.
 */
require trailingslashit( get_template_directory() ) . 'inc/plugins.php';

/**
 * Demo importer
 */
require trailingslashit( get_template_directory() ) . 'inc/demo/demo-importer.php';
