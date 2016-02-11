<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package    Silvia
 * @author     Theme Junkie
 * @copyright  Copyright (c) 2015, Theme Junkie
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @since  1.0.0
 * @param  array $classes Classes for the body element.
 * @return array
 */
function silvia_body_classes( $classes ) {

	// Adds a class of multi-author to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'multi-author';
	}

	return $classes;
}
add_filter( 'body_class', 'silvia_body_classes' );

/**
 * Adds custom classes to the array of post classes.
 *
 * @since  1.0.0
 * @param  array $classes Classes for the post element.
 * @return array
 */
function silvia_post_classes( $classes ) {

	// Theme prefix
	$prefix = 'silvia-';

	// Adds a class if a post hasn't a thumbnail.
	if ( ! has_post_thumbnail() ) {
		$classes[] = 'no-post-thumbnail';
	}

	// Posts grid layout
	$layout = silvia_mod( $prefix . 'grid-layout' );
	if ( ! is_single() && ! is_page() ) {
		if ( $layout == '2-col' ) {
			$classes[] = 'post-grid-2-col';
		} elseif ( $layout == '3-col' ) {
			$classes[] = 'post-grid-3-col';
		} else {
			$classes[] = 'post-grid-4-col';
		}
	}

	return $classes;
}
add_filter( 'post_class', 'silvia_post_classes' );

/**
 * Change the excerpt more string.
 *
 * @since  1.0.0
 * @param  string  $more
 * @return string
 */
function silvia_excerpt_more( $more ) {
	return '&hellip;';
}
add_filter( 'excerpt_more', 'silvia_excerpt_more' );

/**
 * Remove theme-layouts meta box on attachment and bbPress post type.
 *
 * @since 1.0.0
 */
function silvia_remove_theme_layout_metabox() {
	remove_post_type_support( 'post', 'theme-layouts' );
	remove_post_type_support( 'attachment', 'theme-layouts' );

	// bbPress
	remove_post_type_support( 'forum', 'theme-layouts' );
	remove_post_type_support( 'topic', 'theme-layouts' );
	remove_post_type_support( 'reply', 'theme-layouts' );
}
add_action( 'init', 'silvia_remove_theme_layout_metabox', 11 );

/**
 * Extend archive title
 *
 * @since  1.0.0
 */
function silvia_extend_archive_title( $title ) {
	if ( is_category() ) {
		$title = single_cat_title( '', false );
	} elseif ( is_tag() ) {
		$title = single_tag_title( '', false );
	}
	return $title;
}
add_filter( 'get_the_archive_title', 'silvia_extend_archive_title' );

/**
 * Exclude pages on search
 *
 * @since  1.0.0
 */
function silvia_exclude_page_on_search( $query ) {
	if ( ! is_admin() ) {
		if ( $query->is_main_query() && $query->is_search ) {
			$query->set( 'post_type', 'post' );
		}
	}
}
add_action( 'pre_get_posts', 'silvia_exclude_page_on_search' );

/**
 * Customize tag cloud widget
 *
 * @since  1.0.0
 */
function silvia_customize_tag_cloud( $args ) {
	$args['largest']  = 12;
	$args['smallest'] = 12;
	$args['unit']     = 'px';
	$args['number']   = 20;
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'silvia_customize_tag_cloud' );
