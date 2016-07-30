<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Speaker;

class Updates_20160722135312_Austin_Advisors extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // If there are any advisors leftover with the old binary switch,
        // they are national advisors, so mark them for 2016 and 2017 as
        // national advisors before continuing.
    	Speaker::where('advisor', '=', '1')->update(['advisor' => '2016/national,2017/national']);

    	// Since the Austin advisors come from the 2015 conference, pull
    	// their bios from last year.
    	$advisors	= Speaker::where('conference_slug', '=', '2015/austin')
    						 ->where(function($q)
    						 {
    						 	$q->where('slug', '=', 'brandt-scott')
    						 	  ->orWhere('slug', '=', 'fernandes-andrew')
    						 	  ->orWhere('slug', '=', 'moore-larry')
    						 	  ->orWhere('slug', '=', 'parnell-lawanda')
    						 	  ->orWhere('slug', '=', 'smedley-jeff');
    						 })->get();

    	// Create the published timestamp
    	$now		= Carbon::now();

    	// Add advisors for Austin 2016 if they aren't there already.
    	foreach ($advisors as $advisor)
    	{
//    		echo "Attempting to add " . $advisor->slug;
    		if (strpos($advisor->advisor, '2016/austin') === false)
    		{
	    		$advisor = Speaker::insert([
	    				'first_name'	=> $advisor->first_name,
	    				'last_name'		=> $advisor->last_name,
	    				'slug'			=> $advisor->slug,
	    				'title'			=> $advisor->title,
	    				'title_short'	=> $advisor->title_short,
	    				'company'		=> $advisor->company,
	    				'bio'			=> $advisor->bio,
	    				'tags'			=> $advisor->tags,
	    				'photo'			=> $advisor->photo,
	    				'advisor'		=> ((string)$advisor->advisor === '0' ? '2016/austin' : $advisor->advisor . ',2016/austin'),
	    				'published'		=> $now,
	    			]);
//	    		echo "...successful. (" . print_r($advisor, 1) . ")";
    		}
//    		echo "\n";
    	}
    }
}
