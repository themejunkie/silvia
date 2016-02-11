<?php get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main" <?php hybrid_attr( 'content' ); ?>>

			<?php if ( have_posts() ) : ?>

				<header class="page-header" <?php hybrid_attr( 'entry-author' ) ?>>
					<?php echo get_avatar( is_email( get_the_author_meta( 'user_email' ) ), apply_filters( 'silvia_author_bio_avatar_size', 90 ), '', esc_attr( get_the_author() ) ); ?>
					<h1 class="page-title">
						<span class="vcard" itemprop="name"><?php echo esc_attr( get_the_author() ); ?></span>
					</h1>
					<div class="description">
						<p class="bio" itemprop="description"><?php echo stripslashes( get_the_author_meta( 'description' ) ); ?></p>
					</div>
				</header><!-- .page-header -->

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', get_post_format() ); ?>

				<?php endwhile; ?>

				<?php get_template_part( 'loop', 'nav' ); // Loads the loop-nav.php template ?>

			<?php else : ?>

				<?php get_template_part( 'content', 'none' ); ?>

			<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_footer(); ?>
