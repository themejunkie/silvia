<?php get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">

				<header class="page-header">
					<h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'silvia' ); ?></h1>
					<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search or browse our latest posts below.', 'silvia' ); ?></p>
				</header><!-- .page-header -->

				<?php silvia_posts_query_404(); // Custom query to display latest posts. ?>

			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
