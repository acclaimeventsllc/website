/******************************************************
**  JQUERY MODAL WINDOWS
******************************************************/
$(document).ready(function() {

	// Quality-of-life improvement for no-javascript modal windows:
	// Close modal windows by clicking outside modal content
	// Caveat: $('.modal-overlay .vertical .row') must have an id
	$('.modal-overlay').bind('click', function(e) {
		if (e.target.className == 'modal-overlay') {
			$(this).parent().find('input.modal-toggle:checkbox').click();
		} else if (e.target.className == 'row' && e.target.id.length) {
			var obj = $('#' + e.target.id);
			if (obj.length && obj.parent().parent().hasClass('modal-overlay')) {
				$(this).parent().find('input.modal-toggle:checkbox').click();
			}
		}
	});

	// Quality-of-life improvement for no-javascript modal windows:
	// Clicking a label that points to a $('input.modal-toggle:checkbox')
	// or $('.no-move') will not go to that location on the page, but will
	// still open the modal window.  This preserves the user experience.
	$('label').bind('click', function(e) {
		var obj = $('#' + $(this).attr('for'));
		if (obj.length) {
			if (obj.hasClass('no-move') || obj.hasClass('modal-toggle')) {
				if (obj.is(':checkbox')) {
					obj.click();
				}
				e.preventDefault();
				return false;
			}
		}
	});

});