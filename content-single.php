<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php hybrid_attr( 'post' ); ?>>

	<div class="entry-post">

		<div class="entry-content" <?php hybrid_attr( 'entry-content' ); ?>>

			<?php if ( has_post_thumbnail() ) : ?>
				<span class="thumbnail-link">
					<?php the_post_thumbnail( 'silvia-featured', array( 'class' => 'entry-thumbnail', 'alt' => esc_attr( get_the_title() ) ) ); ?>
				</span>
			<?php endif; ?>

			<?php the_content(); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'silvia' ),
					'after'  => '</div>',
				) );
			?>

		</div>

		<?php silvia_related_posts(); // Display the related posts. ?>

		<?php
			// If comments are open or we have at least one comment, load up the comment template
			if ( comments_open() || '0' != get_comments_number() ) :
				comments_template();
			endif;
		?>

	</div>

	<div class="entry-meta">
		<?php the_title( '<h1 class="entry-title" ' . hybrid_get_attr( 'entry-title' ) . '>', '</h1>' ); ?>
		<?php silvia_posted_on(); ?>
		<?php get_template_part( 'loop', 'nav' ); // Loads the loop-nav.php template  ?>
	</div>

</article><!-- #post-## -->
