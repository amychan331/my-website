$(document).ready(function() {
	$('.more-link').click(function(e) {
		e.preventDefault();
		var link = $(this).attr('href');
		var excerpt = $(this).parent().parent();
		// Grab the tag that uses display:none to hide info regarding number of comments and share buttons.
		var hidden = $(this).parent().parent().next('.postmetadata');

		$.get(
			link,
			function(data) {
				var content = $('.entry-content', data);
				excerpt.html(content);
				hidden.removeAttr('style');
			},
			'html'
		);
	});
})