/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	// Theme prefix.
	var prefix = "silvia-";

	/**
	 * Live preview site title & site description
	 */
	wp.customize( "blogname", function( value ) {
		value.bind( function( to ) {
			$( ".site-title a" ).text( to );
		} );
	} );
	wp.customize( "blogdescription", function( value ) {
		value.bind( function( to ) {
			$( ".site-description" ).text( to );
		} );
	} );

	/**
	 * Search color
	 */
	wp.customize( prefix + "search-icon-color", function( value ) {
		value.bind( function( to ) {
			to = to ? to : '#454545';
			$( '.search-toggle' ).css('color', to);
		} );
	} );
	wp.customize( prefix + "search-bg-color", function( value ) {
		value.bind( function( to ) {
			to = to ? to : '#333333';
			$( '.search-area' ).css('background-color', to);
		} );
	} );

	/**
	 * Header color
	 */
	wp.customize( prefix + "site-title-color", function( value ) {
		value.bind( function( to ) {
			to = to ? to : '#454545';
			$( '#masthead .site-title a' ).css('color', to);
		} );
	} );
	wp.customize( prefix + "site-desc-color", function( value ) {
		value.bind( function( to ) {
			to = to ? to : '#777777';
			$( '#masthead .site-description' ).css('color', to);
		} );
	} );

	/**
	 * Menu color
	 */
	wp.customize( prefix + "menu-link-color", function( value ) {
		value.bind( function( to ) {
			to = to ? to : '#454545';
			$( '#site-navigation ul li a' ).css('color', to);
		} );
	} );

	/**
	 * Page header color
	 */
	wp.customize( prefix + "page-header-title-color", function( value ) {
		value.bind( function( to ) {
			to = to ? to : '#454545';
			$( '.page-header .page-title' ).css('color', to);
		} );
	} );
	wp.customize( prefix + "page-header-excerpt-color", function( value ) {
		value.bind( function( to ) {
			to = to ? to : '#777777';
			$( '.page-header p' ).css('color', to);
		} );
	} );

	/**
	 * Posts grid color
	 */
	wp.customize( prefix + "grid-title-color", function( value ) {
		value.bind( function( to ) {
			to = to ? to : '#454545';
			$( '.thumbnail-detail .entry-title a' ).css('color', to);
		} );
	} );
	wp.customize( prefix + "grid-cat-color", function( value ) {
		value.bind( function( to ) {
			to = to ? to : '#777777';
			$( '.thumbnail-detail .cat-links a' ).css('color', to);
		} );
	} );

	/**
	 * Posts colors
	 */
	wp.customize( prefix + "post-text-color", function( value ) {
		value.bind( function( to ) {
			to = to ? to : '#454545';
			$( '.single .entry-content' ).css('color', to);
		} );
	} );
	wp.customize( prefix + "post-heading-color", function( value ) {
		value.bind( function( to ) {
			to = to ? to : '#454545';
			$( '.single .entry-title, .single .entry-content h1, .single .entry-content h2, .single .entry-content h3, .single .entry-content h4, .single .entry-content h5, .single .entry-content h6' ).css('color', to);
		} );
	} );
	wp.customize( prefix + "post-link-color", function( value ) {
		value.bind( function( to ) {
			to = to ? to : '#2196F3';
			$( '.single .entry-content a' ).css('color', to);
		} );
	} );

	/**
	 * Page colors
	 */
	wp.customize( prefix + "page-text-color", function( value ) {
		value.bind( function( to ) {
			to = to ? to : '#454545';
			$( '.page .entry-content' ).css('color', to);
		} );
	} );
	wp.customize( prefix + "page-heading-color", function( value ) {
		value.bind( function( to ) {
			to = to ? to : '#454545';
			$( '.page .page-title, .page .entry-content h1, .page .entry-content h2, .page .entry-content h3, .page .entry-content h4, .page .entry-content h5, .page .entry-content h6' ).css('color', to);
		} );
	} );
	wp.customize( prefix + "page-link-color", function( value ) {
		value.bind( function( to ) {
			to = to ? to : '#2196F3';
			$( '.page .entry-content a' ).css('color', to);
		} );
	} );

	/**
	 * Footer color
	 */
	wp.customize( prefix + "footer-bg-color", function( value ) {
		value.bind( function( to ) {
			to = to ? to : '#f5f5f5';
			$( '.site-footer' ).css('background-color', to);
		} );
	} );
	wp.customize( prefix + "footer-text-color", function( value ) {
		value.bind( function( to ) {
			to = to ? to : '#454545';
			$( '.site-footer' ).css('color', to);
		} );
	} );
	wp.customize( prefix + "footer-link-color", function( value ) {
		value.bind( function( to ) {
			to = to ? to : '#454545';
			$( '.site-footer p a' ).css('color', to);
		} );
	} );
	wp.customize( prefix + "footer-social-bg-color", function( value ) {
		value.bind( function( to ) {
			to = to ? to : '#333333';
			$( '.social-links a' ).css('background-color', to);
		} );
	} );
	wp.customize( prefix + "footer-social-icon-color", function( value ) {
		value.bind( function( to ) {
			to = to ? to : '#ffffff';
			$( '.social-links a' ).css('color', to);
		} );
	} );

} )( jQuery );
