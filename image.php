<?php get_header(); ?>

	<?php if ( has_excerpt() ) : ?>
		<header class="page-header">
			<?php the_excerpt(); ?>
		</header><!-- .entry-caption -->
	<?php endif; ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main" <?php hybrid_attr( 'content' ); ?>>

			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php hybrid_attr( 'post' ); ?>>

					<div class="entry-post">

						<div class="entry-content" <?php hybrid_attr( 'entry-content' ); ?>>

							<div class="entry-attachment">
								<?php
									/**
									 * Filter the default Silvia image attachment size.
									 */
									$image_size = apply_filters( 'silvia_attachment_size', 'large' );

									echo wp_get_attachment_image( get_the_ID(), $image_size );
								?>

							</div><!-- .entry-attachment -->

							<?php the_content(); ?>
							<?php
								wp_link_pages( array(
									'before' => '<div class="page-links">' . __( 'Pages:', 'silvia' ),
									'after'  => '</div>',
								) );
							?>

						</div>

					</div>

					<div class="entry-meta">
						<?php the_title( '<h1 class="entry-title" ' . hybrid_get_attr( 'entry-title' ) . '>', '</h1>' ); ?>
						<?php silvia_posted_on(); ?>
						<?php get_template_part( 'loop', 'nav' ); ?>
					</div>

				</article><!-- #post-## -->


			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
