// Function for image sliding is modified from "Create A Simple Infinite Carousel with jQuery" by Kevin Liew at http://www.queness.com/post/923/create-a-simple-infinite-carousel-with-jquery
$(document).ready(function() {

	// Get variable of how far to slide when user click on the control buttons
	var slide_height = $('.slides').outerHeight();
	var bottom_value = slide_height * (-1);

	// Functions for sliding the image when the arrows are clicked
	$('.prev').click(function() {
		var bottom_indent = parseInt( $('.slides ul').css('bottom') ) + slide_height;
		// Variable that directs to the currently clicked gallery
		var thisSlide = $(this).parent().siblings('.slides').children('ul');
		thisSlide.animate({'bottom': bottom_indent}, 200, function () {
			$(thisSlide).children('li:last').before( $(thisSlide).children('li:first') );
			$(thisSlide).css({'buttom': bottom_value});
			var currentDisplay = $(thisSlide).children('li:first').find('img').attr('alt');
			$(thisSlide).attr('aria-labelledby', currentDisplay);
		});
		return false;
	});
	$('.next').click(function() {
		var bottom_indent = parseInt( $('.slides ul').css('bottom') ) - slide_height;
		// Variable that directs to the currently clicked gallery
		var thisSlide = $(this).parent().siblings('.slides').children('ul');
		thisSlide.animate({'bottom': bottom_indent}, 200, function () {
			$(thisSlide).children('li:last').after( $(thisSlide).children('li:first') );
			$(thisSlide).css({'buttom': bottom_value});
			var currentDisplay = $(thisSlide).children('li:first').find('img').attr('alt');
			$(thisSlide).attr('aria-labelledby', currentDisplay);
			$('#lightcontainer img').focus();
		});
		return false;
	});

	// Function for activating a lightbox when image is clicked
	$('.slides li a').click(function(e) {
		e.preventDefault();
		var link = $(this).attr('href');
		var project = $(this).children('img').attr('alt');
		var lightbox = "<div id='lightbox'>" +
			"<div id='lightcontainer'>" +
				"<img src='" + link + "' alt='" + project + "' tabindex='1'>" +
				"<button type='button' id='close' aria-label='close' tabindex='1'>X</button>" +
			"</div>" +
		"</div>";
		$('body').append(lightbox);
	});

	// Functions to remove lightbox when X or Esc is clicked
	$('body').on('click', '#close', function() {
		$('#lightbox').remove();
	});
	// Function to detect tab and Esc key entry, then focus on close button or slide image for former and close lightbox for later.
	$('body').on('keyup', function(e) {
		if ( $('#lightbox').is(':visible') ) {
			if (e.key == "Tab" || e.keyCode == 9) {
				if ( document.activeElement.tagName == 'BUTTON' ) {
					console.log('close to img');
					$('#lightcontainer #close').blur(function() {
						$('#lightcontainer img').focus();
					});
				} else {
					console.log('img to close');
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
		}, 2500);
	});

})