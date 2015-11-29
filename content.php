<?php
// Theme prefix
$prefix = 'silvia-';

// Set up empty variable
$size = '';

// Get the data set in customizer
$layout = silvia_mod( $prefix . 'grid-layout' );

// Display the correct size
if ( $layout == '3-col' || $layout == '4-col' ) {
	$size = 'silvia-featured';
} else {
	$size = 'large';
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php hybrid_attr( 'post' ); ?>>

	<?php if ( has_post_thumbnail() ) : ?>
		<a class="thumbnail-link" href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail( $size, array( 'class' => 'entry-thumbnail', 'alt' => esc_attr( get_the_title() ) ) ); ?>
		</a>
	<?php endif; ?>

	<div class="thumbnail-detail">

		<?php the_title( sprintf( '<h2 class="entry-title" ' . hybrid_get_attr( 'entry-title' ) . '><a href="%s" rel="bookmark" itemprop="url">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'silvia' ) );
				if ( $categories_list && silvia_categorized_blog() ) :
			?>
			<span class="cat-links" <?php hybrid_attr( 'entry-terms', 'category' ); ?>>
				<?php echo $categories_list; ?>
			</span>
			<?php endif; // End if categories ?>
		<?php endif; ?>

	</div>

	<meta itemprop="datePublished" content="<?php echo get_the_date(); ?>">

</article><!-- #post-## -->
