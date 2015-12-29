<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Venue;
use App\Models\Conference;
use App\Models\Option;
use Carbon\Carbon;

class AddVenuesFor2016Conferences extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// SAN ANTONIO 2016

		Venue::create([
				'venue'			=> 'Norris Conference Center - San Antonio',
				'slug'			=> 'norris-conference-center-san-antonio',
				'city'			=> 'San Anotnio',
				'state'			=> 'Texas',
				'place'			=> 'ChIJXUnvShVeXIYRw3zHzaw3Rhw',
				'directions'	=> 'https://www.google.com/maps/dir//Norris+Conference+Centers+-+San+Antonio,+Park+North+Shopping+Center,+618+NW+Loop+410+%23207,+San+Antonio,+TX+78216/@29.5183577,-98.5047857,17z/data=!4m13!1m4!3m3!1s0x865c5e154aef495d:0x1c4637accdc77cc3!2sNorris+Conference+Centers+-+San+Antonio!3b1!4m7!1m0!1m5!1m1!1s0x865c5e154aef495d:0x1c4637accdc77cc3!2m2!1d-98.502597!2d29.518353',
				'published'		=> Carbon::create(2015, 12, 28, 15, 05, 17),
			]);

		$conference	= Conference::where('slug', '=', 'san-antonio')->year(2016)->first();
		$conference->venue_slug = 'norris-conference-center-san-antonio';
		$conference->save();

		Option::create([
				'slug'			=> '2016/san-antonio',
				'option'		=> 'show_map',
				'value'			=> '1',
				'published'		=> Carbon::create(2015, 12, 28, 15, 05, 17),
			]);


		Option::create([
				'slug'			=> '2016/san-antonio',
				'option'		=> 'show_address',
				'value'			=> '1',
				'published'		=> Carbon::create(2015, 12, 28, 15, 05, 17),
			]);


		Option::create([
				'slug'			=> '2016/san-antonio',
				'option'		=> 'show_venue',
				'value'			=> '1',
				'published'		=> Carbon::create(2015, 12, 28, 15, 05, 17),
			]);


		// AUSTIN 2016

		Venue::create([
				'venue'			=> 'Norris Conference Center - Austin',
				'slug'			=> 'norris-conference-center-austin',
				'city'			=> 'Austin',
				'state'			=> 'Texas',
				'place'			=> 'ChIJx5kWoq_LRIYRsUK4L-zQQls',
				'directions'	=> 'https://www.google.com/maps/dir//Norris+Conference+Centers+-+Austin,+Northcross+Mall,+2525+W+Anderson+Ln+%23365,+Austin,+TX+78757/@30.3550942,-97.7360862,17z/data=!3m1!5s0x8644cbaf5b32b761:0x881f1844b29bbce0!4m13!1m4!3m3!1s0x8644cbafa21699c7:0x5b42d0ec2fb842b1!2sNorris+Conference+Centers+-+Austin!3b1!4m7!1m0!1m5!1m1!1s0x8644cbafa21699c7:0x5b42d0ec2fb842b1!2m2!1d-97.7338975!2d30.3550896',
				'published'		=> Carbon::create(2015, 12, 28, 15, 05, 17),
			]);

		$conference	= Conference::where('slug', '=', 'austin')->year(2016)->first();
		$conference->venue_slug = 'norris-conference-center-austin';
		$conference->save();

		Option::create([
				'slug'			=> '2016/austin',
				'option'		=> 'show_map',
				'value'			=> '1',
				'published'		=> Carbon::create(2015, 12, 28, 15, 05, 17),
			]);


		Option::create([
				'slug'			=> '2016/austin',
				'option'		=> 'show_address',
				'value'			=> '1',
				'published'		=> Carbon::create(2015, 12, 28, 15, 05, 17),
			]);


		Option::create([
				'slug'			=> '2016/austin',
				'option'		=> 'show_venue',
				'value'			=> '1',
				'published'		=> Carbon::create(2015, 12, 28, 15, 05, 17),
			]);
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Venue::where('slug', '=', 'norris-conference-center-san-antonio')->forceDelete();
		$conference	= Conference::where('slug', '=', 'san-antonio')->year(2016)->first();
		$conference->venue_slug = null;
		$conference->save();
		Option::where('slug', '=', '2016/san-antonio')->where('option', '=', 'show_map')->forceDelete();
		Option::where('slug', '=', '2016/san-antonio')->where('option', '=', 'show_address')->forceDelete();
		Option::where('slug', '=', '2016/san-antonio')->where('option', '=', 'show_venue')->forceDelete();

		Venue::where('slug', '=', 'norris-conference-center-austin')->forceDelete();
		$conference	= Conference::where('slug', '=', 'austin')->year(2016)->first();
		$conference->venue_slug = null;
		$conference->save();
		Option::where('slug', '=', '2016/austin')->where('option', '=', 'show_map')->forceDelete();
		Option::where('slug', '=', '2016/austin')->where('option', '=', 'show_address')->forceDelete();
		Option::where('slug', '=', '2016/austin')->where('option', '=', 'show_venue')->forceDelete();
		
	}
}
