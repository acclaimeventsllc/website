<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class VenuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    protected $_table = 'venues';

    public function run()
    {

    	// DELETING TABLE ENTRIES
        DB::table($this->_table)->delete();

        // CONFERENCE VENUES
        DB::table($this->_table)->insert([

        	// AUSTIN 2015
        	[
				'venue'			=> 'Crown Plaza Austin',
				'slug'			=> 'texas-austin-crown-plaza-austin',
				'city'			=> 'Austin',
				'state'			=> 'Texas',
				'place'			=> 'ChIJVzSZghjKRIYREyXBujdzq6w',
				'directions'	=> 'http://www.ihg.com/crowneplaza/hotels/us/en/austin/ausgz/hoteldetail?cm_mmc=GoogleMaps-_-cp-_-USEN-_-ausgz#map-directions',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			],

			// SAN ANTONIO 2016
			[
				'venue'			=> 'Norris Conference Center - San Antonio',
				'slug'			=> 'norris-conference-center-san-antonio',
				'city'			=> 'San Anotnio',
				'state'			=> 'Texas',
				'place'			=> 'ChIJXUnvShVeXIYRw3zHzaw3Rhw',
				'directions'	=> 'https://www.google.com/maps/dir//Norris+Conference+Centers+-+San+Antonio,+Park+North+Shopping+Center,+618+NW+Loop+410+%23207,+San+Antonio,+TX+78216/@29.5183577,-98.5047857,17z/data=!4m13!1m4!3m3!1s0x865c5e154aef495d:0x1c4637accdc77cc3!2sNorris+Conference+Centers+-+San+Antonio!3b1!4m7!1m0!1m5!1m1!1s0x865c5e154aef495d:0x1c4637accdc77cc3!2m2!1d-98.502597!2d29.518353',
				'published'		=> Carbon::create(2015, 12, 28, 15, 05, 17),
			],

			// AUSTIN 2016
			[
				'venue'			=> 'Norris Conference Center - Austin',
				'slug'			=> 'norris-conference-center-austin',
				'city'			=> 'Austin',
				'state'			=> 'Texas',
				'place'			=> 'ChIJx5kWoq_LRIYRsUK4L-zQQls',
				'directions'	=> 'https://www.google.com/maps/dir//Norris+Conference+Centers+-+Austin,+Northcross+Mall,+2525+W+Anderson+Ln+%23365,+Austin,+TX+78757/@30.3550942,-97.7360862,17z/data=!3m1!5s0x8644cbaf5b32b761:0x881f1844b29bbce0!4m13!1m4!3m3!1s0x8644cbafa21699c7:0x5b42d0ec2fb842b1!2sNorris+Conference+Centers+-+Austin!3b1!4m7!1m0!1m5!1m1!1s0x8644cbafa21699c7:0x5b42d0ec2fb842b1!2m2!1d-97.7338975!2d30.3550896',
				'published'		=> Carbon::create(2015, 12, 28, 15, 05, 17),
			],

		]);

    }
}
