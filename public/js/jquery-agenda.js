$(document).ready(function() {
	$('input.expand').bind('change', function() {
		$(this).next('label.expand').children('i').toggleClass('fa-plus-circle').toggleClass('fa-minus-circle');
	});
});