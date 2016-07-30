$(document).ready(function() {
	$('.more-link').click(function(e) {
		e.preventDefault();

		// Make sure content link's domain match the site url domain to prevent CORS error
		var link = $(this).attr('href');
		link = link.replace('http://www.craftplustech.com', '');

		var excerpt = $(this).parent().parent();
		// Grab the tag that uses display:none to hide info regarding number of comments and share buttons.
		var hidden = $(this).parent().parent().next('.postmetadata');

		$.get(
			link,
			function(data) {
				var content = $('.entry-content', data);

				//remove unwanted contents
				content.find('.sharedaddy').remove();
				content.find('#jp-relatedposts').remove();

				//replace excerpt with new, full content and display it
				excerpt.html(content);
				hidden.removeAttr('style');
			},
			'html'
		);
	});
})