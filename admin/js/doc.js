/**
 * Documentation notice for theme
 */
 
( function( $ ) {
 
	// Add Upgrade Message
	if ('undefined' !== typeof prefixL10n) {
		doc = $('<a class="theme-doc-link"></a>')
			.attr('href', prefixL10n.prefixURL)
			.attr('target', '_blank')
			.text(prefixL10n.prefixLabel)
			.css({
				'display' : 'inline-block',
				'background-color' : '#2EA2CC',
				'color' : '#fff',
				'text-transform' : 'uppercase',
				'margin-top' : '6px',
				'padding' : '3px 6px',
				'font-size': '9px',
				'letter-spacing': '1px',
				'line-height': '1.5',
				'clear' : 'both'
			})
		;
 
		setTimeout(function () {
			$('#accordion-section-themes h3').append(doc);
		}, 200);
 
		// Remove accordion click event
		$('.theme-doc-link').on('click', function(e) {
			e.stopPropagation();
		});
	}
 
} )( jQuery );