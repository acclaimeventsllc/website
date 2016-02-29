<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ConferenceSponsorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    protected $_table = 'conference_sponsors';

    public function run()
    {

    	// INITAL PUBLISH DATE
    	$published = Carbon::create(2015, 09, 15, 07, 30, 00);

    	// DELETING TABLE ENTRIES
        DB::table($this->_table)->delete();


        // AUSTIN 2015
        DB::table($this->_table)->insert([
			[
				'conference_slug'	=> '2015/austin',
				'sponsor_slug'		=> 'cylance',
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2015/austin',
				'sponsor_slug'		=> 'dynatrace',
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2015/austin',
				'sponsor_slug'		=> 'forsythe',
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2015/austin',
				'sponsor_slug'		=> 'hitachi',
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2015/austin',
				'sponsor_slug'		=> 'workday',
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2015/austin',
				'sponsor_slug'		=> 'mcci',
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2015/austin',
				'sponsor_slug'		=> 'good',
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2015/austin',
				'sponsor_slug'		=> 'nimble-storage',
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2015/austin',
				'sponsor_slug'		=> 'windstream',
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2015/austin',
				'sponsor_slug'		=> '2fa',
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2015/austin',
				'sponsor_slug'		=> 'secure-nation',
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2015/austin',
				'sponsor_slug'		=> 'arbor-networks',
				'published'			=> $published,
			],
        ]);

    }
}
