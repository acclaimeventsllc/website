/*****************************************************
**
**  JQUERY COUNTDOWN
**
*****************************************************/

/*****************************************************
**  GLOBAL VARIABLES
*****************************************************/
var countdown;

var now;
var then;
var left;

var days;
var hours;
var mins;
var secs;
var ms;

var sec = 1000;
var min = sec * 60;
var hour = min * 60;
var day = hour * 24;

function do_countdown() {
	if ($('.countdown').length) {
		countdown = $('.countdown');
		data = countdown.attr('data-date').split(' ');
		date = data[0].split('-');
		time = data[1].split(':');

		for (i=0; i<date.length; i++) {
			date[i] = parseInt(date[i]);
			time[i] = parseInt(time[i]);
		}

		date[1] = date[1] - 1;

		now = new Date();
		then = new Date(date[0], date[1], date[2], time[0], time[1], time[2]);

		left = Math.floor(then.getTime() - now.getTime());

		if (left < 0) {
			countdown.html('');
		} else {
			days = Math.floor(left / day);
			left -= days * day;

			hours = Math.floor(left / hour);
			left -= hours * hour;

			mins = Math.floor(left / min);
			left -= mins * min;

			secs = Math.floor(left / sec);

			if ($('.countdown-days').length && $('countdown-days .coundown-digit').text() != days) {
				$('.countdown-days .countdown-digit').text(days);
			}

			if ($('.countdown-hours').length && $('countdown-hours .coundown-digit').text() != hours) {
				$('.countdown-hours .countdown-digit').text(hours);
			}

			if ($('.countdown-mins').length && $('countdown-mins .coundown-digit').text() != mins) {
				$('.countdown-mins .countdown-digit').text(mins);
			}

			if ($('.countdown-secs').length && $('countdown-secs .coundown-digit').text() != secs) {
				$('.countdown-secs .countdown-digit').text(secs);
			}
			setTimeout('do_countdown()',1000);

		}
	}
}

$(document).ready(function() {
	if (!navigator.userAgent.match('/Mac|iPad/i')) {
		setTimeout('do_countdown()',1000);
	}
});

