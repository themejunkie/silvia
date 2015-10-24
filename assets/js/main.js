// Global jQuery variable
$ = jQuery;

/**
 * Responsive Video
 */
var responsiveVideo = function() {
	var $selector = $( ".hentry, .widget" );
	$selector.fitVids();
};

/**
 * Mobile Menu
 */
var mobileMenu = function() {
	var $selector = $( "#menu-primary-items" );
	$selector.slicknav( {
		prependTo: "#site-navigation",
		allowParentLinks: true
	} );
};

/**
 * Search Toggle
 */
var searchToggle = function() {

	var $container = $( ".search-area" );
	var $selector = $( ".search-toggle" );
	var $doc = $( document );

	$selector.on( "click", function( event ) {
		event.stopPropagation();
		$container.slideToggle( "slow" );
	} );

	$doc.on( "click", function( event ) {
		event.stopPropagation();
		if ( $container.is( ":visible" ) && ! $container.is( event.target ) && $container.has( event.target ).length === 0 ) {
			$container.slideToggle( "slow" );
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