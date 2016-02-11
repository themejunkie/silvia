<?php
// Check if there's a menu assigned to the 'primary' location.
if ( ! has_nav_menu( 'primary' ) ) {
	return;
}
?>

<nav id="site-navigation" class="main-navigation" <?php hybrid_attr( 'menu' ); ?>>

	<div class="wide-container">

		<?php wp_nav_menu(
			array(
				'theme_location'  => 'primary',
				'container_class' => 'menu-wrapper',
				'menu_id'         => 'menu-primary-items',
				'menu_class'      => 'menu-primary-items',
				'fallback_cb'     => ''
			)
		); ?>

		<?php
		$prefix = 'silvia-';
		$show   = silvia_mod( $prefix . 'search-icon' );
		if ( $show ) :
		?>
			<span class="search-toggle">
				<i class="fa fa-search"></i>
			</span>
		<?php endif; ?>

	</div>

</nav><!-- #site-navigation -->
