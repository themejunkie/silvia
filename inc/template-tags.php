<?php
/**
 * Custom template tags for this theme.
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package    Silvia
 * @author     Theme Junkie
 * @copyright  Copyright (c) 2015, Theme Junkie
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */

if ( ! function_exists( 'silvia_site_branding' ) ) :
/**
 * Site branding for the site.
 *
 * Display site title by default, but user can change it with their custom logo.
 * They can upload it on Customizer page.
 *
 * @since  1.0.0
 */
function silvia_site_branding() {

	// Get the customizer value.
	$prefix = 'silvia-';
	$logo   = silvia_mod( $prefix . 'logo' );

	// Check if logo available, then display it.
	if ( $logo ) :
		echo '<div id="logo" itemscope itemtype="http://schema.org/Brand">' . "\n";
			echo '<a href="' . esc_url( get_home_url() ) . '" itemprop="url" rel="home">' . "\n";
				echo '<img itemprop="logo" src="' . esc_url( $logo ) . '" alt="' . esc_attr( get_bloginfo( 'name' ) ) . '" />' . "\n";
			echo '</a>' . "\n";
		echo '</div>' . "\n";

	// If not, then display the Site Title and Site Description.
	else :
		echo '<div id="logo">'. "\n";
			echo '<h1 class="site-title" ' . hybrid_get_attr( 'site-title' ) . '><a href="' . esc_url( get_home_url() ) . '" itemprop="url" rel="home"><span itemprop="headline">' . esc_attr( get_bloginfo( 'name' ) ) . '</span></a></h1>'. "\n";
			echo '<h2 class="site-description" ' . hybrid_get_attr( 'site-description' ) . '>' . esc_attr( get_bloginfo( 'description' ) ) . '</h2>';
		echo '</div>'. "\n";
	endif;

}
endif;

if ( ! function_exists( 'silvia_callout' ) ) :
/**
 * Home page callout
 *
 * @since  1.0.0
 */
function silvia_callout() {

	// Theme prefix
	$prefix = 'silvia-';

	// Get the data set in customizer
	$text = silvia_mod( $prefix . 'home-callout' );

	// If polylang plugin active, display the translation strings
	$callout = '';
	if ( function_exists( 'pll_the_languages' ) ) {
		$callout = pll__( $text );
	} else {
		$callout = $text;
	}

	// Display the data
	echo '<div class="callout page-header">';
		echo '<p>' . strip_tags( $callout ) . '</p>';
	echo '</div>';

}
endif;

if ( ! function_exists( 'silvia_main_container' ) ) :
/**
 * Main container class
 *
 * @since  1.0.0
 */
function silvia_main_container() {

	// Set up empty variable
	$class = '';

	// Display the class
	if ( is_page() ) {
		$class = 'container';
	} else {
		$class = 'wide-container';
	}

	return apply_filters( 'silvia_main_container', $class );

}
endif;

if ( ! function_exists( 'silvia_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 *
 * @since 1.0.0
 */
function silvia_posted_on() {

	// Theme prefix
	$prefix = 'silvia-';

	// Get the data set in customizer
	$date       = silvia_mod( $prefix . 'post-date' );
	$author     = silvia_mod( $prefix . 'post-author' );
	$cat        = silvia_mod( $prefix . 'post-cat' );
	$tag        = silvia_mod( $prefix . 'post-tag' );
	$date_style = silvia_mod( $prefix . 'post-date-style' );

	// Set up empty variable
	$style = '';
	if ( $date_style == 'absolute' ) {
		$style = esc_html( get_the_date() );
	} else {
		$style = sprintf( __( '%s ago', 'silvia' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) );
	}
	?>

	<?php if ( $date ) : ?>
		<time class="entry-date published entry-side" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>" <?php hybrid_attr( 'entry-published' ); ?>><?php printf( __( 'Published: %s', 'silvia' ), '<span>' . $style . '</span>' ); ?></time>
	<?php endif; ?>

	<?php if ( $author ) : ?>
		<span class="entry-author author vcard entry-side" <?php hybrid_attr( 'entry-author' ) ?>>
			<?php printf( __( 'Author: %s', 'silvia' ), '<a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" itemprop="url"><span itemprop="name">' . esc_html( get_the_author() ) . '</span></a>' ); ?>
		</span>
	<?php endif; ?>

	<?php if ( 'post' == get_post_type() ) : ?>
		<?php
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( __( ', ', 'silvia' ) );
			if ( $categories_list && silvia_categorized_blog() && $cat ) :
		?>
		<span class="cat-links entry-side" <?php hybrid_attr( 'entry-terms', 'category' ); ?>>
			<?php printf( __( 'Category: %s', 'silvia' ), $categories_list ); ?>
		</span>
		<?php endif; // End if categories ?>
		<?php
			$tag_list = get_the_tag_list( '', ', ' );
			if ( $tag_list && $tag ) :
		?>
			<span class="tag-links entry-side" <?php hybrid_attr( 'entry-terms', 'post_tag' ); ?>><?php printf( __( 'Tags: %s', 'silvia' ), $tag_list ); ?></span>
		<?php endif; ?>
	<?php endif; ?>

	<?php if ( is_attachment() && wp_attachment_is_image() ) : ?>

		<?php
		$metadata = wp_get_attachment_metadata(); // Retrieve attachment metadata.
		$camera   = $metadata['image_meta']['camera'];
		$aperture = $metadata['image_meta']['aperture'];
		$focal    = $metadata['image_meta']['focal_length'];
		$iso      = $metadata['image_meta']['iso'];
		$shutter  = $metadata['image_meta']['shutter_speed'];
		?>

		<span class="full-size-link entry-side">
			<?php printf( __( 'Size: %s', 'silvia' ), '<a href="' . esc_url( wp_get_attachment_url() ) . '">' . $metadata['width'] . ' &times; ' . $metadata['height'] . '</a>' ); ?>
		</span>

		<?php if ( $camera ) : ?>
			<span class="camera entry-side">
				<?php printf( __( 'Camera: %s', 'silvia' ), '<span>' . $camera . '</span>' ); ?>
			</span>
		<?php endif; ?>

		<?php if ( $aperture ) : ?>
			<span class="apparture entry-side">
				<?php printf( __( 'Aperture: %s', 'silvia' ), '<span>' . $aperture . '</span>' ); ?>
			</span>
		<?php endif; ?>

		<?php if ( $focal ) : ?>
			<span class="focal-length entry-side">
				<?php printf( __( 'Focal Length: %s', 'silvia' ), '<span>' . $focal . '</span>' ); ?>
			</span>
		<?php endif; ?>

		<?php if ( $iso ) : ?>
			<span class="iso entry-side">
				<?php printf( __( 'ISO: %s', 'silvia' ), '<span>' . $iso . '</span>' ); ?>
			</span>
		<?php endif; ?>

		<?php if ( $shutter ) : ?>
			<span class="shutter-speed entry-side">
				<?php printf( __( 'Shutter Speed: %s', 'silvia' ), '<span>' . $shutter . '</span>' ); ?>
			</span>
		<?php endif; ?>

	<?php endif; ?>

	<?php
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @since  1.0.0
 * @return bool
 */
function silvia_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'silvia_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'silvia_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so silvia_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so silvia_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in silvia_categorized_blog.
 *
 * @since 1.0.0
 */
function silvia_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'silvia_categories' );
}
add_action( 'edit_category', 'silvia_category_transient_flusher' );
add_action( 'save_post',     'silvia_category_transient_flusher' );

if ( ! function_exists( 'silvia_related_posts' ) ) :
/**
 * Related posts.
 *
 * @since  1.0.0
 */
function silvia_related_posts() {
	global $post;

	// Theme prefix
	$prefix = 'silvia-';

	// Get the data set in customizer
	$enable  = silvia_mod( $prefix . 'related-posts' );
	$img     = silvia_mod( $prefix . 'related-posts-img' );

	// Disable if user choose it.
	if ( $enable == 0 ) {
		return;
	}

	// Get the taxonomy terms of the current page for the specified taxonomy.
	$terms = wp_get_post_terms( $post->ID, 'category', array( 'fields' => 'ids' ) );

	// Bail if the term empty.
	if ( empty( $terms ) ) {
		return;
	}

	// Posts query arguments.
	$query = array(
		'post__not_in' => array( $post->ID ),
		'tax_query'    => array(
			array(
				'taxonomy' => 'category',
				'field'    => 'id',
				'terms'    => $terms,
				'operator' => 'IN'
			)
		),
		'posts_per_page' => 3,
		'post_type'      => 'post',
	);

	// Allow dev to filter the query.
	$args = apply_filters( 'silvia_related_posts_args', $query );

	// The post query
	$related = new WP_Query( $args );

	if ( $related->have_posts() ) : ?>

		<div class="related-posts">
			<h3><?php _e( 'You might also like &hellip;', 'silvia' ); ?></h3>
			<ul>
				<?php while ( $related->have_posts() ) : $related->the_post(); ?>
					<li>
						<?php if ( has_post_thumbnail() && $img ) : ?>
							<a class="thumbnail-link" href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'silvia-featured', array( 'class' => 'related-thumbnail', 'alt' => esc_attr( get_the_title() ) ) ); ?></a>
						<?php endif; ?>
						<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
					</li>
				<?php endwhile; ?>
			</ul>
		</div>

	<?php endif;

	// Restore original Post Data.
	wp_reset_postdata();

}
endif;

if ( ! function_exists( 'silvia_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since  1.0.0
 */
function silvia_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>" <?php hybrid_attr( 'comment' ); ?>>
		<article id="comment-<?php comment_ID(); ?>" class="comment-container">
			<p <?php hybrid_attr( 'comment-content' ); ?>><?php _e( 'Pingback:', 'silvia' ); ?> <span <?php hybrid_attr( 'comment-author' ); ?>><span itemprop="name"><?php comment_author_link(); ?></span></span> <?php edit_comment_link( __( '(Edit)', 'silvia' ), '<span class="edit-link">', '</span>' ); ?></p>
		</article>
	<?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>" <?php hybrid_attr( 'comment' ); ?>>
		<article id="comment-<?php comment_ID(); ?>" class="comment-container">

			<div class="comment-avatar">
				<?php echo get_avatar( $comment, apply_filters( 'silvia_comment_avatar_size', 125 ) ); ?>
				<span class="name" <?php hybrid_attr( 'comment-author' ); ?>><span itemprop="name"><?php echo get_comment_author_link(); ?></span></span>
				<?php echo silvia_comment_author_badge(); ?>
			</div>

			<div class="comment-body">
				<div class="comment-wrapper">

					<div class="comment-head">
						<?php
							printf( '<span class="date"><a href="%1$s" ' . hybrid_get_attr( 'comment-permalink' ) . '><time datetime="%2$s" ' . hybrid_get_attr( 'comment-published' ) . '>%3$s</time></a> %4$s</span>',
								esc_url( get_comment_link( $comment->comment_ID ) ),
								get_comment_time( 'c' ),
								/* translators: 1: date, 2: time */
								sprintf( __( '%1$s at %2$s', 'silvia' ), get_comment_date(), get_comment_time() ),
								sprintf( __( '%1$s&middot; Edit%2$s', 'silvia' ), '<a href="' . get_edit_comment_link() . '" title="' . esc_attr__( 'Edit Comment', 'silvia' ) . '">', '</a>' )
							);
						?>
					</div><!-- comment-head -->

					<div class="comment-content comment-entry" <?php hybrid_attr( 'comment-content' ); ?>>
						<?php if ( '0' == $comment->comment_approved ) : ?>
							<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'silvia' ); ?></p>
						<?php endif; ?>
						<?php comment_text(); ?>
						<span class="reply">
							<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( '<i class="fa fa-reply"></i> Reply', 'silvia' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
						</span><!-- .reply -->
					</div><!-- .comment-content -->

				</div>
			</div>

		</article><!-- #comment-## -->
	<?php
		break;
	endswitch; // end comment_type check
}
endif;

if ( ! function_exists( 'silvia_comment_author_badge' ) ) :
/**
 * Custom badge for post author comment
 *
 * @since  1.0.0
 */
function silvia_comment_author_badge() {

	// Set up empty variable
	$output = '';

	// Get comment classes
	$classes = get_comment_class();

	if ( in_array( 'bypostauthor', $classes ) ) {
		$output = '<span class="author-badge">' . __( 'Author', 'silvia' ) . '</span>';
	}

	// Display the badge
	return apply_filters( 'silvia_comment_author_badge', $output );
}
endif;

if ( ! function_exists( 'silvia_social_links' ) ) :
/**
 * Social profile links
 *
 * @since  1.0.0
 */
function silvia_social_links() {

	// Theme prefix
	$prefix = 'silvia-';

	// Get the data set in customizer
	$twitter   = silvia_mod( $prefix . 'twitter' );
	$facebook  = silvia_mod( $prefix . 'facebook' );
	$gplus     = silvia_mod( $prefix . 'gplus' );
	$linkedin  = silvia_mod( $prefix . 'linkedin' );
	$dribbble  = silvia_mod( $prefix . 'dribbble' );
	$instagram = silvia_mod( $prefix . 'instagram' );
	$vk        = silvia_mod( $prefix . 'vk' );

	// Display the data
	echo '<div class="social-links">';
		if ( $twitter ) {
			echo '<a href="' . esc_url( $twitter ) . '"><i class="fa fa-twitter"></i></a>';
		}
		if ( $facebook ) {
			echo '<a href="' . esc_url( $facebook ) . '"><i class="fa fa-facebook"></i></a>';
		}
		if ( $gplus ) {
			echo '<a href="' . esc_url( $gplus ) . '"><i class="fa fa-google-plus"></i></a>';
		}
		if ( $linkedin ) {
			echo '<a href="' . esc_url( $linkedin ) . '"><i class="fa fa-linkedin"></i></a>';
		}
		if ( $dribbble ) {
			echo '<a href="' . esc_url( $dribbble ) . '"><i class="fa fa-dribbble"></i></a>';
		}
		if ( $instagram ) {
			echo '<a href="' . esc_url( $instagram ) . '"><i class="fa fa-instagram"></i></a>';
		}
		if ( $vk ) {
			echo '<a href="' . esc_url( $vk ) . '"><i class="fa fa-vk"></i></a>';
		}
	echo '</div>';

}
endif;

if ( ! function_exists( 'silvia_footer_text' ) ) :
/**
 * Footer Text
 */
function silvia_footer_text() {

	// Theme prefix
	$prefix = 'silvia-';

	// Get the customizer data
	$footer_text = silvia_mod( $prefix . 'footer-text' );

	// If polylang plugin active, display the translation strings
	$text = '';
	if ( function_exists( 'pll_the_languages' ) ) {
		$text = pll__( $footer_text );
	} else {
		$text = $footer_text;
	}

	// Display the data
	echo '<p class="copyright">' . stripslashes( $text ) . '</p>';

}
endif;

if ( ! function_exists( 'silvia_posts_query_404' ) ) :
/**
 * Custom query to display latest posts on 404 page.
 *
 * @since  1.0.0
 */
function silvia_posts_query_404() {

	// Posts arguments
	$args = array(
		'post_type'      => 'post',
		'posts_per_page' => 6
	);

	// Allow dev to filter the arguments
	$posts = apply_filters( 'silvia_posts_query_404_args', $args );

	// Our hero!
	$posts = new WP_Query( $args );

	// Display the posts
	if ( $posts->have_posts() ) :
		while ( $posts->have_posts() ) : $posts->the_post();
			get_template_part( 'content', '404' );
		endwhile;
	endif;

	// Reset the query.
	wp_reset_postdata();

}
endif;
