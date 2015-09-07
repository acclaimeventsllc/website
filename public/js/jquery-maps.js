/*****************************************************
**
**  GOOGLE MAPS using the Javascript Maps v3 API
**  and jQuery.
**
**  The map canvas uses the following attributes:
**		data-place (required)	// google place id
**		data-venue (optional)	// for the info window
**		data-address (optional)	// for the info window 
**		data-coords (optional)	// general coordinates
**
*****************************************************/

/*****************************************************
**  GLOBAL VARIABLES
*****************************************************/
// User-specified map info
var place;			// required
var coords			// optional for general starting point, will be replaced with coordinates from Google Places
var venue;			// optional, will pull from Google Places if necessary
var address;		// optional, will pull from Google Places if necessary

// Map components
var canvas;
var map;
var options;
var marker;
var content;
var infowindow;
var service;


$(document).ready(function() {
	google.maps.event.addDomListener(window, 'load', function() {

		// Does the map canvas exist?
		canvas = $('#location .map-canvas');
		if (canvas.length) {

			// Did the user give us the required Google Places ID?
			place = canvas.attr('data-place');
			if (place.length) {

				// Check for optional user input
				coords = canvas.attr('data-coords');
				if (typeof coords === 'undefined' || !coords.length) {
					coords = new google.maps.LatLng( 1,1 );
				} else if (debug.length) {
					coords = coords.split(',');
					coords = new google.maps.LatLng( parseInt(coords[0]), parseInt(coords[1]) );
					debug.append('Coordinates were provided' + "\n");
				}

				venue = canvas.attr('data-venue');
				if (typeof venue === 'undefined' || !venue.length) {
					venue = null;
				}

				address = canvas.attr('data-address');
				if (typeof address === 'undefined' || !address.length) {
					address = null;
				}
				
				// Specify map options
				options = {
					zoom: 15,
					center: coords,
					mapTypeControl: false,
					scrollwheel: false,
					draggable: true,
					mapTypeControlOptions: { style: google.maps.MapTypeControlStyle.DROPDOWN_MENU },
					navigationControl: false,
					navigationControlOptions: { style: google.maps.NavigationControlStyle.SMALL },
					mapTypeId: google.maps.MapTypeId.ROADMAP
				};

				// Create map
				map = new google.maps.Map(canvas[0], options);

				// Retrieve details using the Google Places ID
		  		service = new google.maps.places.PlacesService(map);
				service.getDetails({ placeId: place }, function(results, status) {
					if (status == google.maps.places.PlacesServiceStatus.OK) {

						// Set venue and address if required
						if (venue === null) {
							venue = results.name;
						}

						if (address === null) {
							address = {};
							for (i=0; i<results.address_components.length; i++) {
								address[results.address_components[i].types[0]] = results.address_components[i].short_name;
							}
						}

						// Set content and create infowindow
						content = '<div id="map-content">' +
								  '<div id="map-site-notice">' +
								  '</div>' +
								  '<h2 id="map-heading">' + venue + '</h2>' +
								  '<div id="map-content-body">';

						if (typeof address === 'string') {
							content += '<p>' + address + '</p>';
						} else {
							content += '<p>' + address.street_number + ' ' + address.route + '</p>' +
									   '<p>' + address.locality + ', ' + address.administrative_area_level_1 + ' ' + address.postal_code + '</p>';
						}
						content += '</div>';
		 				infowindow = new google.maps.InfoWindow( { content: content } );

		 				// Create marker
						marker = new google.maps.Marker({
							map: map,
							location: results.geometry.location,
							title: venue
						});
						marker.setPosition(results.geometry.location);

						// Reset center of map to new coordinates
						map.setCenter(results.geometry.location);

						// Add listener for user click
						google.maps.event.addListener(marker, 'click', function() {
							infowindow.open(map, marker);
						});

						// BELOW IS SPECIFIC TO ACCLAIM EVENTS CONFERENCE PAGES
						var addr		= address.street_number + ' ' + address.route + ' ' + address.locality + ', ' + address.administrative_area_level_1 + ' ' + address.postal_code;
						var icon		= '<i class="fa fa-map-marker normal-icon acclaim-text"></i>';
						var toggle		= $('.map-overlay .address label');
						var countdown	= $('#countdown .address');
						var link		= '<a href="#location" class="move" title="' + addr + '">' + addr + '</a>';

						if (countdown.length && (!countdown.html().length || countdown.html().length === 0)) {
							countdown.html(link);
						}

						if (toggle.length && (!toggle.html().length || toggle.html().length === 0)) {
							toggle.html(icon + addr);
						}

					}
				});
			}
		}

	});

});

/*
	Just a bit of css magic to make the map toggle blend in with the section before
*/

$(document).ready(function() {
	var bgColor = $('label.map-toggle').parent().parent().prev().css('background-color');
	$('label.map-toggle').css('background-color', bgColor);
});

