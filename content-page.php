<?php
// Theme prefix
$prefix = 'silvia-';

// Get the customizer value.
$title = silvia_mod( $prefix . 'page-title' );
?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php hybrid_attr( 'post' ); ?>>

	<?php if ( $title ) : ?>
		<header class="entry-header">
			<?php the_title( '<h1 class="page-title" ' . hybrid_get_attr( 'entry-title' ) . '>', '</h1>' ); ?>
		</header><!-- .entry-header -->
	<?php endif; ?>

	<div class="entry-content" <?php hybrid_attr( 'entry-content' ); ?>>
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'silvia' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php edit_post_link( __( 'Edit', 'silvia' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer>' ); ?>

</article><!-- #post-## -->
