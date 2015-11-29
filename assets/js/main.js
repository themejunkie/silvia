( function( $, window, document ) {

	/**
	 * Responsive Video
	 */
	var responsiveVideo = function() {
		$( '.hentry, .widget' ).fitVids();
	};

	/**
	 * Mobile Menu
	 */
	var mobileMenu = function() {
		$( '#menu-primary-items' ).slicknav( {
			prependTo: '#site-navigation',
			allowParentLinks: true
		} );
	};

	/**
	 * Search Toggle
	 */
	var searchToggle = function() {

		var $container = $( '.search-area' );

		$( '.search-toggle' ).on( 'click', function( event ) {
			event.stopPropagation();
			$container.slideToggle( 'slow' );
		} );

		$( document ).on( 'click', function( event ) {
			event.stopPropagation();
			if ( $container.is( ':visible' ) && ! $container.is( event.target ) && $container.has( event.target ).length === 0 ) {
				$container.slideToggle( 'slow' );
			}
		} );

	};

	/**
	 * Execute functions when the DOM is fully loaded.
	 */
	$( function() {
		responsiveVideo();
		mobileMenu();
		searchToggle();
	} );

}( window.jQuery, window, document ) );