/*****************************************************
**
**  JQUERY CONFERENCES
**
*****************************************************/

var year_started 	= 2015;
var year_ended		= 2017;

$(document).ready(function() {
	$('#conferences').prepend('<nav>').children('nav')
					 .append('<ul>').children('ul')
					 .append('<li>');
	$('#conferences nav ul li').append('<label>').children('label').text('By Year');
	$('#conferences nav ul li').append('<select>');
	for (y=year_started; y<=year_ended; y++) {
		$('#conferences nav ul li select').append('<option>').children('option:last-child').attr('value', y).text(y);
	}
	$('#conferences nav ul li').append('<a>').children('a').addClass('btn btn-primary btn-sm').attr('href', '/conferences/fl').text('Go');

	$('#conferences nav ul').append('<li>');
	$('#conferences nav ul li:last-child').append('<label>').children('label').text('By State');
	$('#conferences nav ul li:last-child').append('<select>').children('select')
										  .append('<option>').children('option').attr('value', 'fl').text('Florida').parent()
										  .append('<option>').children('option:last-child').attr('value', 'tx').text('Texas');
	$('#conferences nav ul li:last-child').append('<a>').children('a').attr('href', '/conferences/2015')
														.addClass('btn btn-primary btn-sm').text('Go');


	$('#conferences select').on('change', function(e) {
		var link = $(this).next();
		link.attr('href', link.attr('href').substring(0,-$(this).val().length) + $(this).val());
	});
});
