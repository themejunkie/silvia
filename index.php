<?php get_header(); ?>

	<?php silvia_callout(); // Get the callout data. ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main" <?php hybrid_attr( 'content' ); ?>>

			<?php if ( have_posts() ) : ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'home' ); ?>

				<?php endwhile; ?>

				<?php get_template_part( 'loop', 'nav' ); // Loads the loop-nav.php template ?>

			<?php else : ?>

				<?php get_template_part( 'content', 'none' ); ?>

			<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
