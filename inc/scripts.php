<?php
/**
 * Enqueue scripts and styles.
 *
 * @package    Silvia
 * @author     Theme Junkie
 * @copyright  Copyright (c) 2015, Theme Junkie
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */

/**
 * Loads the theme styles & scripts.
 *
 * @since 1.0.0
 * @link  http://codex.wordpress.org/Function_Reference/wp_enqueue_script
 * @link  http://codex.wordpress.org/Function_Reference/wp_enqueue_style
 */
function silvia_enqueue() {

	// Load plugins stylesheet
	wp_enqueue_style( 'silvia-plugins-style', trailingslashit( get_template_directory_uri() ) . 'assets/css/plugins.min.css' );

	// if is not a child theme and WP_DEBUG and/or SCRIPT_DEBUG turned on, load the unminified styles & script.
	if ( ! is_child_theme() && WP_DEBUG || SCRIPT_DEBUG ) {

		// Load main stylesheet
		wp_enqueue_style( 'silvia-style', get_stylesheet_uri() );

		// Load custom js plugins.
		wp_enqueue_script( 'silvia-plugins', trailingslashit( get_template_directory_uri() ) . 'assets/js/plugins.min.js', array( 'jquery' ), null, true );

		// Load custom js methods.
		wp_enqueue_script( 'silvia-main', trailingslashit( get_template_directory_uri() ) . 'assets/js/main.js', array( 'jquery' ), null, true );

	} else {

		// Load main stylesheet
		wp_enqueue_style( 'silvia-style', trailingslashit( get_template_directory_uri() ) . 'style.min.css' );

		// Load custom js plugins.
		wp_enqueue_script( 'silvia-scripts', trailingslashit( get_template_directory_uri() ) . 'assets/js/silvia.min.js', array( 'jquery' ), null, true );

	}

	// If child theme is active, load the stylesheet.
	if ( is_child_theme() ) {
		wp_enqueue_style( 'silvia-child-style', get_stylesheet_uri() );
	}

	// Load comment-reply script.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'silvia_enqueue' );

/**
 * Loads HTML5 Shiv file.
 *
 * @since  1.0.0
 */
function silvia_html5_shiv() {
?>
<!--[if lte IE 9]>
<script src="<?php echo trailingslashit( get_template_directory_uri() ) . 'assets/js/html5shiv.min.js'; ?>"></script>
<![endif]-->
<?php
}
add_action( 'wp_head', 'silvia_html5_shiv', 15 );

/**
 * Enable popup gallery if Jetpack Carousel module
 * is not activated
 *
 * @since  1.0.2
 */
function silvia_popup_gallery() {

	// Check if Jetpack carousel module activated.
	if ( class_exists( 'Jetpack' ) && Jetpack::is_module_active( 'carousel' ) ) {
		return;
	}

	?>
	<script>
		jQuery( document ).ready( function( $ ){
			$( ".gallery-icon a[href$='.jpg'], .gallery-icon a[href$='.jpeg'], .gallery-icon a[href$='.png'], .gallery-icon a[href$='.gif']" ).magnificPopup({
				type: 'image',
				gallery: {
					enabled: true
				}
			});
		});
	</script>
	<?php
}
add_action( 'wp_footer', 'silvia_popup_gallery', 10 );
