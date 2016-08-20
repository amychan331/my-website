// Responsive and accessible carousel with lightbox features
$(document).ready(function() {

	// Get variable of how far to slide when user click on the control buttons
	var slide_height = $('.slides').outerHeight();
	var bottom_value = slide_height * (-1);

	// Functions for 'sliding' the image when the arrows are clicked
	// <li> other than the first one will have visibility:hidden and display:none, thus hiding it from view.
	$('.prev').click(function(e) {
		e.preventDefault();
		// Variable that directs to the currently clicked gallery
		var thisSlide = $(this).parent().siblings('.slides').children('ul');
		$(thisSlide).children('li:last').before( $(thisSlide).children('li:first') );

	});
	$('.next').click(function(e) {
		e.preventDefault();
		// Variable that directs to the currently clicked gallery
		var thisSlide = $(this).parent().siblings('.slides').children('ul');
		$(thisSlide).children('li:last').after( $(thisSlide).children('li:first') );

	});

	// Function for activating a lightbox when image is clicked
	$('.slides li a').click(function(e) {
		e.preventDefault();
		var link = $(this).attr('href');
		var project = $(this).children('img').attr('alt');
		var lightbox = "<div id='lightbox' role='dialog'>" +
			"<div id='lightcontainer'>" +
				"<img src='" + link + "' alt='" + project + "' tabindex='1'>" +
				"<button type='button' id='close' aria-label='close' tabindex='1'>X</button>" +
			"</div>" +
		"</div>";
		$('body').append(lightbox);
		$('#lightcontainer img').focus();
	});

	// Functions to remove lightbox when X is clicked
	$('body').on('click', '#close', function() {
		$('#lightbox').remove();
	});

	// Function to detect tab and Esc key entry, then focus on close button or slide image for former and close lightbox for later.
	$('body').on('keyup', function(e) {
		if ( $('#lightbox').is(':visible') ) {
			if (e.key == "Tab" || e.keyCode == 9) {
				if ( document.activeElement.tagName == 'BUTTON' ) {
					//Clean out previous focus via blur, or the next focus may not work.
					$('#lightcontainer #close').blur(function() {
						$('#lightcontainer img').focus();
					});
				} else {
					$('#lightcontainer img').blur(function() {
						$('#lightcontainer #close').focus();
					});
				}
			}
			if ( e.key == "Escape" || e.keyCode == 27) { // 1st operand exist because keyCode is being deprecated. The 2nd is to provide fallback
				$('#lightbox').remove();
			}
		}
	});

	// Function to delay link redirection for the icon spin animation
	$('a.icon').click(function(e) {
		e.preventDefault();
		$redirect = this.href;
		setTimeout( function(){ 
			window.location = $redirect;
		}, 1000);
	});

})