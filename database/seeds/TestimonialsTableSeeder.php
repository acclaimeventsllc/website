<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TestimonialsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    protected $_table = 'testimonials';

    public function run()
    {

    	// INITAL PUBLISH DATE
    	$published = Carbon::create(2015, 08, 28, 15, 05, 29);

    	// DELETING TABLE ENTRIES
        DB::table($this->_table)->delete();

        // TESTIMONIALS
        DB::table($this->_table)->insert([
        	[
				'author'	=> 'Dan Hughes',
				'title'		=> 'CEO',
				'company'	=> 'PT Northwest LLC',
				'quote'		=> 'Not only good speakers, but excellent scheduling to allow for good opportunities for networking.',
				'published'	=> $published,
			],
			[
				'author'	=> 'Jon Turino',
				'title'		=> null,
				'company'	=> 'COUNTRY Financial',
				'quote'		=> 'The diverse program for this event has a little something for everyone.',
				'published'	=> $published,
			],
			[
				'author'	=> 'Cynthia Wetlesen',
				'title'		=> 'Owner',
				'company'	=> 'Affordable Insurance Strategies',
				'quote'		=> 'The speakers and topics were pertinent and beneficial.',
				'published'	=> $published,
			],
			[
				'author'	=> 'Sam Darcy',
				'title'		=> 'CEO',
				'company'	=> 'Astoria Pointe',
				'quote'		=> 'Professional delivery of relevant topics. &nbsp;Looking forward to the next event.',
				'published'	=> $published,
			],
		]);

    }
}
