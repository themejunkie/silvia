<?php if ( is_singular( 'post' ) ) : // If viewing a single post page. ?>

	<div class="loop-nav">
		<?php previous_post_link( '<div class="prev">' . __( 'Previous: %link', 'silvia' ) . '</div>', '%title' ); ?>
		<?php next_post_link( '<div class="next">' . __( 'Next: %link', 'silvia' ) . '</div>', '%title' ); ?>
	</div><!-- .loop-nav -->

<?php elseif ( is_attachment() && wp_attachment_is_image() ) : // If viewing the attachment page. ?>

	<div class="loop-nav">
		<div class="prev"><?php previous_image_link( false, __( '&laquo; Previous Image', 'silvia' ) ); ?></div>
		<div class="next"><?php next_image_link( false, __( 'Next Image &raquo;', 'silvia' ) ); ?></div>
	</div><!-- .loop-nav -->

<?php elseif ( is_home() || is_archive() || is_search() ) : // If viewing the blog, an archive, or search results. ?>

	<?php
		/**
		 * Hide posts navigation if Jetpack infinite scroll module activated.
		 */
		if ( class_exists( 'Jetpack' ) && Jetpack::is_module_active( 'infinite-scroll' ) ) {
			return;
		}
	?>

	<?php the_posts_pagination(); ?>

<?php endif; // End check for type of page being viewed. ?>
