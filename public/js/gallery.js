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
		});
		return false;
	});

	// Function for activating a lightbox when image is clicked
	$('.slides li a').click(function(e) {
		e.preventDefault();
		var link = $(this).attr('href');
		var lightbox = "<div id='lightbox'>" +
			"<div id='lightcontainer'><img src='" + link + "'></div>"+
		"</div>";
		$('body').append(lightbox);

	});
	// Function to remove lightbox
	$('body').on('click', '#lightbox', function() {
		$('#lightbox').remove();
	})

	// Function to delay link redirection for the github icon spin animation
	$('a.github').click(function(e) {
		e.preventDefault();
		$redirect = this.href;
		setTimeout( function(){ 
			window.location = $redirect;
		}, 2500);
	});

})