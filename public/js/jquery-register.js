/************************************************************
**  JQUERY REGISTRATION
************************************************************/

var enable = false;

$.fn.ucwords = function() {
	var words = $(this).val().split(' ');
	for (i = 0; i < words.length; i++) {
		words[i] = words[i].substring(0,1).toUpperCase + words[i].substring(1).toLowerCase + ' ';
	}
	return words.join('');
}

$.fn.validate = function(option, obj, value) {
	var fieldset	= $(this).parent().parent().parent().parent();
	var inputs		= fieldset.find('.inputs').children('div').children('input');
	var valid		= false;
	switch (option) {
		case 'all-filled':
			inputs.each(function() {
				if ($(this).val().length === 0) {
					valid = 'Please provide all information for Direct Reports';
				}
			});
			break;
		case 'phone':
			var phone = obj.val();
			if (!phone.match(/\((\d{3})\) ?(\d{3})\-(\d{3})( x\d+)?/g) &&
				!phone.match(/(\d{3})(\.|\-)(\d{3})(\.|\-)(\d{4})( x\d+)?/g)) {
				valid = 'Please enter a valid phone number';
			}
			break;
		case 'num-words':
			var name = obj.attr('id').replace(/referrals\-(.+)/g, '$1');
			name = name.substring(0,1).toUpperCase() + name.substring(1).toLowerCase();
			var words = obj.val().split(' ');
			if (words.length !== value) {
				valid = name + ' must have ' + value + ' words';
			}
		case 'min-words':
			var name = obj.attr('id').replace(/referrals\-(.+)/g, '$1');
			name = name.substring(0,1).toUpperCase() + name.substring(1).toLowerCase();
			var words = obj.val().split(' ');
			if (words.length >= value) {
				valid = name + ' must have at least ' + value + ' words.';
			}
		default:
			valid = $(this).validate('phone', $('#referrals-phone'));
			valid = $(this).validate('num words', $('#referrals-name'), 2);
			break;
	}
	return valid;
}

$.fn.addReferral = function() {
	$(this).parent()
		.append('<div class="report unfinished"><span>' + $('#referrals-name').ucwords() + ' <label>x</label><span>' +
					'<input name="referrals[name][]" type="hidden" value="' + $('#referrals-name').ucwords() + '">' +
					'<input name="referrals[email][]" type="hidden" value="' + $('#referrals-email').val().toLowerCase() + '">' +
					'<input name="referrals[phone][]" type="hidden" value="' + $('#referrals-phone').val() + '">' +
					'<input name="referrals[title][]" type="hidden" value="' + $('#referrals-title').val() + '">' +
				'</div>')
		.find('.unfinished').removeClass('unfinished')
		.find('label')
		.on('click', function(e) {
			$(this).off('click').parent().parent().remove();
		});
	$(this).attr('disabled', 'disabled');
	$('#referrals-name').parent().parent().find('input').val('')[0].focus();
	return this;
}

$(document).ready(function() {

	if (enable === true) {

		// GLOBAL VARIABLES

		// ENHANCED REFERRALS
		$('[name*=referrals').on('focus', function(e) {
			var fieldset = $('[name*=referrals').parent().parent();
			fieldset.find('input').each(function() {
				var name = $(this).attr('name').replace(/referrals\[(.+)\]/, 'referrals-$1');
				$(this).removeAttr('name').attr('id', name);
			});

			$('#referrals-phone').on('keydown', function(e) {
				if (e.which !== 8 &&
					e.which !== 46 &&
					e.which !== 37 &&
					e.which !== 39) {
						var val = $(this).val().replace(/\D/g, '').replace();
						val = val.substring(0,1) === 1 ? val.substring(1) : val;
						var area = val.length >= 3 ? val.substr(0,3) : '';
						val = val.length >= 3 ? val.substring(3) : val;
						var prefix = val.length >= 3 ? val.substring(0,3) : '';
						val = val.length >= 3 ? val.substring(3) : val;
						var suffix = val.length >= 4 ? val.substring(0,4) : '';
						val = val.length >= 4 ? val.substring(4) : val;
						var ext = val.length > 0 ? val : '';

						var phone = area.length ? '(' + area + ') ' : '';
						phone += prefix.length ? prefix + '-' : '';
						phone += suffix.length ? suffix : '';
						phone += phone.length === 14 ? ' x' + ext : ext;
						$(this).val(phone);
						return this;
					}
			});

			fieldset.addClass('row');
			fieldset.children('div').wrapAll('<div class="inputs col-sm-8">');
			fieldset.children('div').wrap('<div class="referrals">');
			fieldset.children('div').append('<div class="col-sm-4">');
			fieldset.children('div').children('div:last-child').css('padding-left', '0px').append('<div class="reports">');

			$('.reports')
				.append('<label class="btn btn-lg btn-primary">Add</label>')
				.children('label')
				.attr('disabled', 'disabled')
				.css('width', '100%')
				.on('click', function(e) {
					if (typeof $(this).validate() !== 'string') {
						$(this).addReferral();
					}
				});

			fieldset.find('[id*=referrals-]').off('focus');
		}).on('keyup', function(e) {
			valid = $(this).validate('all-filled');
			if (typeof valid !== 'string') {
				$('.reports label').removeAttr('disabled');
			} else {
				$('.reports label').attr('disabled', 'disabled');
				if (!$('.inputs').children('p.error').length) {
					$('.inputs').prepend('<p class="error">' + valid + '</p>');
				} else {
					$('.inputs p.error').text(valid);
				}
			}
		});

		// 
	}

});
