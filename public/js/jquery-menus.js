/******************************************************
**  JQUERY MENUS
******************************************************/
$(document).ready(function() {

	var difference	= 106;
	var sections	= [];
	var winWidth	= $(window).width();
	var maxXS		= 768;
	var maxSM		= 992;

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

	// Smooth scrolling to on-page links
	$('a[href*=#]:not([href=#])').bind('click', function(e) {
		var target = $(this.hash);
		target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
		if (target.length) {
			e.preventDefault();
			$('html,body').animate({
				scrollTop: target.offset().top - difference
			},1000);
			return false;
		}
	});

	// Mobile-friendly menus
	$('.nav-main').resize(function(e) {
		$('a.pull').bind('click', function(evt) {
			$('div.modal-menu').slideToggle();
			evt.preventDefault();
			return false;
		});

		$('section').bind('click', function(evt) {
			winWidth = $(window).width();
			if (winWidth < maxXS) {
				if ($('div.modal-menu').not(':hidden')) {
					$('div.modal-menu').slideUp();
				}
			}
		});
	}).resize();
});
