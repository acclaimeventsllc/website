/******************************************************
**  JQUERY INFINITE CAROUSEL WITH AUTO-SCROLL
******************************************************/

$(document).ready(function() {

	// How many miliseconds between carousel items?
	var speed = 10000;
	var pause = false;
	var run = setInterval('rotate()', speed);

	// Height and top values of carousel items
	var height = $('.carousel li').outerHeight();
	var top = height * (-1);

	// Move the last item before the first in case user hits PREV button
	$('.carousel li:first').before($('.carousel li:last'));

	// Set the default item to correct position
	$('.carousel ul').css({'top' : top});

	// When the user clicks the PREV button
	$('.carousel-prev').click(function() {

		// Get the bottom value
		var indent = parseInt($('.carousel ul').css('left')) + height;

		// Slide the item
		$('.carousel ul').animate({'top' : indent}, 200, function() {

			// Move the last item before the first
			$('.carousel li:first').before($('.carousel li:last'));

			// Set the default item to correct position
			$('.carousel ul').css({'top' : top});
		});

		// Cancel link behavior
		return false;

	});

	// When the user clicks the NEXT button
	$('.carousel-next').click(function() {

		// Get the bottom value
		var indent = parseInt($('.carousel ul').css('left')) - height;

		// Slide the item
		$('.carousel ul').animate({'top' : indent}, 200, function() {

			// Move the first item after the last
			$('.carousel li:last').after($('.carousel li:first'));

			// Set the default item to correct position
			$('.carousel ul').css({'top' : top});
		});

		// Cancel link behavior
		return false;

	});

	// If mouse hovers over carousel, pause the auto-rotation
	$('.carousel').hover(
		function() {
			if (pause == true) {
				clearInterval(run);
			}
		},
		function() {
			if (pause == true) {
				run = setInterval('rotate()', speed);
			}
		}
	);
});


// Used for the auto-rotate feature
// A timer will call this
function rotate() {
	$('.carousel-next').click();
}
