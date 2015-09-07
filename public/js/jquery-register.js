/************************************************************
**  JQUERY REGISTRATION
************************************************************/

var enable = true;

$(document).ready(function() {

	if (enable === true) {

		// GLOBAL VARIABLES
		var width = $('.register-window').width();
		var steps = $('fieldset').length;
		var step = 1;
		var left = 0;
		var next, istep;


		// CSS - ONLY IF JAVASCRIPT IS ENABLED
		$('.register-slide').css({'position':'absolute', 'left':'0', 'top':'0', 'min-width':'calc(' + (steps * 100 + 100) + '%)'});
		$('.register-nav.next, .progressbar').css('display','block');


		// HANDLE WINDOW RESIZING
		$(window).bind('resize', function(e) {
			width = $('.register-window').width();
			left = $('fieldset.step-' + step).position().left;
			left = (left > 0 ? '-' : '') + left + 'px';
			$('.register-slide').css({'left': left});
			$('fieldset').css({'display':'inline-block','vertical-align':'top','width':width});
		}).resize();

		$('.form-control').bind('keydown', function(e) {
			if (e.which === 9) {
				last = $(this).parent().parent().children('.form-group:last-child').children('.form-control');
				if (this.id === last.attr('id')) {
					next = $(this).parent().parent().next();
					if (next.length) {
						$('.register-nav.next').click();
						e.preventDefault();
						return false;
					}
				}
			}
		});


		// BUILD THE PROGRESS BAR FROM FIELDSET LEGENDS
		$('fieldset legend').each(function() { $('.progressbar').append('<li><span>' + $(this).text() + '</span></li>'); });
		$('.progressbar li').each(function(i) { $(this).addClass('step-'+(i+1)); });
		$('.progressbar li:first-child').addClass('active');


		// REBUILD THE DIRECT REPORTS SECTION
		$('.direct').html('');
		$('.reports').html('<p><strong>Add Direct Reports</strong> (optional)');

		var inputs = ['referral-name','referral-title','referral-email','referral-phone'];
		var labels = ['Name','Title','Email','Phone'];
		$.each(inputs, function(i) {
			$('.direct')
				.append('<div class="form-group"></div>')
				.find('div:last-child')
				.append('<label for="' + inputs[i] + '">' + labels[i] + '</label>')
				.append('<input id="' + inputs[i] + '" name="' + inputs[i] + '" class="form-control" type="text">');
			if (inputs[i] === 'referral-email') {
				$('.direct .form-control:last-child').attr('type', 'email');
			}
		});


		// PROGRESS BAR CLICKS
		// Return to the previous step with the form and progress bar
		// Enable the NEXT button
		// Disable the PREV button when on the first step
		// Disable the SUBMIT button when not on the last step
		$('.progressbar li').bind('click', function(e) {
			var button = '';
			var oldstep = $(this).parent().children('.active').length;
			step = $(this).prevAll().length + 1;

			if (oldstep > step) {
				button = 'prev';
			} else if (oldstep < step) {
				button = 'next';
			}

			if (button.length) {
				$(this).parent().children('.active').removeClass('active');
				$(this).prevAll().addClass('active');
				if (button === 'prev') {
					$(this).addClass('active').next().addClass('active');
				}
				$('.register-nav.' + button).click();
			}
		});


		// NAVIGATION CLICKS
		$('.register-nav').bind('click', function(e) {
			
			// Which button was clicked?
			next = $(this).hasClass('next');

			// Determine step by which step is currently active
			// Add or subtract based on which button was clicked
			step = $('.progressbar li.active').length;
			step += (next ? 1 : -1);
			
			// Toggle visual aspects of navigation
			var thisli, prevli;
			$('.progressbar li').removeClass('active');
			$('.progressbar li:nth-child(' + step + ')').addClass('active').prevAll().addClass('active');
			if (next) {
				$('.register-nav.prev').fadeIn();
			} else {
				$('.register-nav.next').fadeIn();
			}
			if (step === steps) {
				$('.register-nav.next').fadeOut();
			} else if (step === 1) {
				$('.register-nav.prev').fadeOut();
			}

			// Do the animation to the correct step in form
			left = $('fieldset:nth-child(' + step + ')').position().left;
			left = (left > 0 ? '-' : '') + left + 'px';
			$('.register-slide').animate({'left': left});
			var obj = $('fieldset:nth-child(' + step + ')').find('.form-control')[0];
			if (obj.length) {
				console.log(obj.attr('class'));
			}

			// Toggle submit buttons based on current step
			if ($('fieldset:nth-child(' + step + ')').hasClass('confirmation')) {
				$('.register-button').fadeOut('fast', function() {
					$('.register-submit').fadeIn();
				});
			} else if ($('fieldset:nth-child(' + step + ')').hasClass('direct-reports')) {
				$('.register-button').fadeOut('fast', function() {
					$('.register-reports').fadeIn();
				});
			} else if ($('register-nav:not(:hidden)')) {
				$('.register-button').fadeOut('fast');
			}

			// Prevent the links from actually going anywhere
			e.preventDefault();
			return false;
		});


		// ADD REPORT BUTTON
		// Add a direct report to the list
		// Clear fields to allow for next direct report
		// Recalculte form height
		$('.add-report').bind('click', function(e) {
			var referral = {
				name: $('#referral-name').val(),
				title: $('#referral-title').val(),
				email: $('#referral-email').val(),
				phone: $('#referral-phone').val()
			};
			var html;
			$('.direct').find('input').val('')[0].focus();
			$('.reports p').hide();
			$('.reports')
				.append('<span title="' +
						referral.name +
						(referral.title.length ? ', ' + referral.title : '') +
						(referral.email.length ? ' <' + referral.email + '>' : '') +
						(referral.phone.length ? referral.phone : '') +
						'"></span>')
				.find('span:last-child')
				.html('<span>' + referral.name + '</span>')
				.append('<input name="direct-report[][name]" type="hidden" value="' + referral.name + '">')
				.append('<input name="direct-report[][title]" type="hidden" value="' + referral.title + '">')
				.append('<input name="direct-report[][email]" type="hidden" value="' + referral.email + '">')
				.append('<input name="direct-report[][phone]" type="hidden" value="' + referral.phone + '">')
				.append('<i class="fa fa-times"></i>')
				.find('i')
				.bind('click', function() {
					$(this).parent().remove();
					$('.confirm-reports').html($('.reports').html());
					$('.confirm-reports').find('input').remove();
					$('.confirm-reports').find('i').remove();
					if (!$('.confirm-reports').children('span').length) {
						$('.confirm-reports').hide();
					}
					if (!$('.reports').children('span').length) {
						$('.reports p').fadeIn();
					}
				});
			$('.register-window').height($('.register-slide').height() + 'px');
			$('.confirm-reports').html($('.reports').html());
			$('.confirm-reports').find('input').remove();
			$('.confirm-reports').find('i').remove();
			if ($('.confirm-reports').is(':hidden')) {
				$('.confirm-reports').show();
			}
			e.preventDefault();
			return false;
		});

		
		// UPDATE CONFIRMATION PAGE
		$('.form-control').bind('change', function() {
			var name = $(this).attr('name');
			var obj, slug, text;
			if (name.length) {
				obj = $('.confirmation .' + name);
				if (obj.length) {
					if ($(this).is('input') || $(this).is('textarea')) {
						text = $(this).val();
						if (!text.length) {
							text = '&nbsp;';
						}
						obj.html(text);
						return;
					} else if ($(this).is('select')) {
						slug = $(this).val();
						$(this).children('option').each(function() {
							if ($(this).attr('value') === slug) {
								text = $(this).text();
								if (!text.length || !slug.length || text == 'Select...') {
									text = '&nbsp;';
								}
								obj.html(text);
								return;
							}
						})
					}
				}
			}
		});

	}

});
