jQuery(document).ready(function($) {

	// Switch Click
	$('.switch').click(function() {
		if ($(this).hasClass('on')) {
			$(this).parent().find('input:checkbox').attr('checked', true);
			$(this).removeClass('on').addClass('off');
		} else {
			$(this).parent().find('input:checkbox').attr('checked', false);
			$(this).removeClass('off').addClass('on');
		}
	});

});