<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Option;

class Updates_20160512143040_Austin_Options extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {

    	// SET PUBLISHED DATE
    	$published	= Carbon::now();

        // ADDING OPTIONS FOR 2016 AUSTIN CONFERENCE
    	Option::insert([
    						'slug'			=> '2016/austin',
    						'option'		=> 'show_topics',
    						'value'			=> 0,
    						'published'		=> $published,
    					]);

    	Option::insert([
    						'slug'			=> '2016/austin',
    						'option'		=> 'show_sponsors',
    						'value'			=> 1,
    						'published'		=> $published,
    					]);

    }

}
