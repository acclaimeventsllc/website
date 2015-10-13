

$(document).ready(function() {

	var enabled = true;

	if (enabled) {

		$('.speaker .modal-toggle').on('click', function(e) {
			var data	= '#' + $(this).attr('data-target');
			var script	= $(data).next().find('.noscript');
			var target	= $(data).next().find('.speaker');
			var parent	= $(this).parent();

			var image 	= parent.children('.speaker-image').css('background-image');
			var name	= parent.children('.speaker-name').text();
			var title	= parent.children('.speaker-title').text();
			var company	= parent.children('.speaker-company').text();

			if (parent.children('.speaker-bio').length) {
				var bio	= $.trim($(parent).children('.speaker-bio').html());
			} else {
				var bio	= '<p>Speaker bio coming soon...</p>';
			}

			if (script.length) {
				script.remove();
			}

			if (target.length) {
				target.show();
				target.find('.speaker-image').css('background-image', image);
				target.children('.speaker-name').text(name);
				target.children('.speaker-title').text(title);
				target.children('.speaker-company').text(company);

				if (bio.length) {
					target.children('.speaker-bio').html(bio);
				}
			}
		});

		$('.sponsor .modal-toggle').on('click', function(e) {
			var data	= '#' + $(this).attr('data-target');
			var script	= $(data).next().find('.noscript');
			var target	= $(data).next().find('.sponsor');
			var parent	= $(this).parent();

			var image	= parent.children('.sponsor-photo').children('img').attr('src');
			var company	= parent.children('.sponsor-photo').children('img').attr('alt');

			if (parent.children('.sponsor-bio').length) {
				bio	= $.trim(parent.children('.sponsor-bio').html());
			} else {
				bio = '<p>Sponsor bio coming soon...</p>';
			}

			console.log(image);
			console.log(company);
			console.log(bio);

			if (script.length) {
				script.remove();
			}

			if (target.length) {
				target.show();
				target.children('.sponsor-photo').children('img').attr('src', image);

				if (bio.length) {
					target.children('.sponsor-bio').html(bio).show();
				} else {
					alert('oops');
				}
			}
		});

	}

});
