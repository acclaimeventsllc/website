/******************************************************
**  JQUERY SMOOTH SCROLLING
******************************************************/
$(document).ready(function() {

	// Account for fixed menu height
	var difference = 106;

	// Active menu links based on manual scrolling
	var sections = [];

	$('.menu-page a').each(function() {
		sections.push(this.hash);
	});

	$(window).bind('scroll', function(e) {
		var windowPos = $(window).scrollTop();
		var windowHeight = $(window).height();
		var docHeight = $(document).height();

		for (var i=0; i < sections.length; i++) {
			var theID = sections[i];
			if ($(theID).length) {
				var divPos = parseInt($(theID).offset().top) - difference;
				var divHeight = $(theID).height();

				if (windowPos >= divPos && windowPos < (divPos + divHeight)) {
					$('.menu-page a').removeClass('menu-active');
					$('.menu-page a[href="' + theID + '"]').addClass('menu-active');
				}
			}
		}

		if (windowPos + windowHeight == docHeight) {
			$('.menu-page li a').removeClass('menu-active');
			$('.menu-page li:last-child a').addClass('menu-active');
		}

	}).scroll();

	// Smooth scrolling and cancel scrolling
	$('a[href*=#]:not([href=#]):not(.no-move)').bind('click', function(e) {
		var target = $(this.hash);
		target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
		if (target.length) {
			e.preventDefault();
			if (!target.hasClass('no-move')) {
				$('html,body').animate({
					scrollTop: target.offset().top - difference
				},1000);
			}
			return false;
		}
	});

	$('label:not(.no-move)').bind('click', function(e) {
		var target = $('#' + $(this).attr('for'));
		if (target.length) {
			if (target.hasClass('no-move')) {
				target.click();
				e.preventDefault();
				return false;
			} else {
				$('html,body').animate({
					scrollTop: target.offset().top - difference
				}, 1000);
			}
		}
	});

});