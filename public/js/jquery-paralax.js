/******************************************************
**  JQUERY PARALAX
**
******************************************************/

/******************************************************
**  GLOBAL VARIABLES
**	Change these values to whatever you need.
******************************************************/
var testing = false;
var margin = 50;

/******************************************************
**  DO NOT CHANGE ANYTHING BELOW
******************************************************/
var sections = [];

$(document).ready(function() {

	var winWidth	= 0;
	var minWidth	= 992;
	var enable		= true;

	$('.paralax').resize(function() {
		winWidth = $(window).width();
		if (winWidth < minWidth) {
			enable = false;
		} else {
			enable = true;
		}
	}).resize();

	// make an array of all the paralax sections
	$('.paralax').each(function() {
		if (enable === true) {
			var obj = $(this);
			sections.push({
				id: obj.attr('id'),
				top: obj.offset().top,
				bot: obj.offset().top + obj.height(),
				range: obj.height() + (margin * 2)
			});
			obj.css({'backgroundPosition' : '50% -' + margin + 'px'});
		}
	});
/*
	$.each(sections, function(i) {
		debug(JSON.stringify(sections[i]), true);
	});
*/
	// on scrolling...
	$(window).bind('scroll', function() {
		winWidth = $(window).width();
		if (winWidth >= minWidth) {
			var win = $(window);
			var ypos = win.scrollTop();
			var wtop = ypos;
			var wbot = ypos + win.height();
			debug('wtop: ' + ypos);
			debug('wbot: ' + wbot, true);

			// for each paralax section...
			$.each(sections, function(i) {
				var obj = sections[i];
				var units = obj.range / win.height() / 1.5;
				var curPos = $('#' + obj.id).css('backgroundPosition');
				var newPos = curPos;

				// check to see if the section is in-bounds
				if (wbot >= obj.top && wtop <= obj.bot) {

					// paralax magic
					newPos = units * (wtop - obj.top);
					$('#' + obj.id).css({ 'backgroundPosition' : '50% ' + Math.floor(newPos) + 'px' });
				}

				debug('id: ' + obj.id, true);
				debug(' &nbsp &nbsp; top: ' + obj.top, true);
				debug(' &nbsp &nbsp; bot: ' + obj.bot, true);
				debug(' &nbsp &nbsp; units: ' + units, true);
				debug(' &nbsp &nbsp; curPos: ' + curPos, true);
				debug(' &nbsp &nbsp; newPos: ' + '50% ' + Math.floor(newPos) + 'px', true);

			});
		}
	}).scroll();
});

var debug = function(msg, append, obj) {
	if (testing === true) {
		if (typeof msg == 'undefined') { msg = ''; }
		if (typeof obj == 'undefined' || obj == null) { obj = '.debug'; }
		if (typeof append == 'undefined' || append != true) { append = false; }

		if (msg.length > 0) {
			console.log(msg);
			return;
		}

		if ($(obj).length) {
			if (msg.length > 0) {
				if (append == true) {
					$(obj).append(msg + '<br>');
				} else {
					$(obj).html(msg + '<br>');
				}
			}
		}
	}
}
