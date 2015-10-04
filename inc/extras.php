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
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * @since  1.0.0
 * @param  array $args Configuration arguments.
 * @return array
 */
function silvia_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'silvia_page_menu_args' );

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

if ( version_compare( $GLOBALS['wp_version'], '4.1', '<' ) ) :
	/**
	 * Filters wp_title to print a neat <title> tag based on what is being viewed.
	 *
	 * @param string $title Default title text for current view.
	 * @param string $sep Optional separator.
	 * @return string The filtered title.
	 */
	function silvia_wp_title( $title, $sep ) {
		if ( is_feed() ) {
			return $title;
		}

		global $page, $paged;

		// Add the blog name
		$title .= get_bloginfo( 'name', 'display' );

		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) ) {
			$title .= " $sep $site_description";
		}

		// Add a page number if necessary:
		if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
			$title .= " $sep " . sprintf( __( 'Page %s', 'silvia' ), max( $paged, $page ) );
		}

		return $title;
	}
	add_filter( 'wp_title', 'silvia_wp_title', 10, 2 );

	/**
	 * Title shim for sites older than WordPress 4.1.
	 *
	 * @link https://make.wordpress.org/core/2014/10/29/title-tags-in-4-1/
	 * @todo Remove this function when WordPress 4.3 is released.
	 */
	function silvia_render_title() {
		?>
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<?php
	}
	add_action( 'wp_head', 'silvia_render_title' );
endif;

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