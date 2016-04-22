<?php

use Illuminate\Database\Seeder;

class Updates_20160421140517_SanAntonio_DB_Structure_Data_Fix extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	//  FIXING AUSTIN 2015 DUE TO NEW STRUCTURE CHANGES
        $austin2015 = DB::table('speakers')
                    ->where('tags', '=', '2015/austin')
                    ->update(['tags' => null, 'conference_slug' => '2015/austin']);


        //  FIXING ALL AGENDAS DUE TO NEW STRUCTURE CHANGES
        $futures	= DB::table('agendas')
        				->where('session_type', '!=', 'break')
        				->get();

        $conferences	= [];
        foreach ($futures as $future)
        {
        	$conferences[$future->conference_slug][] = $future;
        }

        foreach ($conferences as $conference => $agendas)
        {
        	$i = 1;

        	foreach ($agendas as $agenda)
        	{

        		if (is_null($agenda->title_short) || empty($agenda->title_short))
        		{
        			$agenda->title_short = 'Session ' . $i;
        			DB::table('agendas')
        			  ->where('conference_slug', '=', $conference)
        			  ->where('timeslot', '=', $agenda->timeslot)
        			  ->where('priority', '=', $agenda->priority)
        			  ->update(['title_short' => $agenda->title_short]);
        		}

        		$slug = preg_replace("/[^a-z0-9\ ]/i", '', $agenda->title_short);
        		$slug = strtolower(preg_replace("/[\ ]/i", '-', $slug));

        		DB::table('agendas')
        		  ->where('conference_slug', '=', $conference)
        		  ->where('title_short', '=', $agenda->title_short)
        		  ->update(['slug' => $slug]);

        		$i++;

		        switch (true)
		        {
		        	case preg_match("/\,/", $agenda->speakers):
		        		$speakers = explode(",", $agenda->speakers);
		        		break;
		        	case !empty($agenda->speakers):
		        		$speakers = [$agenda->speakers];
		        		break;
		        	default:
		        		$speakers = [];
		        		break;
		        }

		        foreach ($speakers as $speaker)
		        {
		        	if (preg_match("/\:/", $speaker))
		        	{
		        		list ($type, $person) = explode(':', $speaker);
		        		$speakerFix = DB::table('agendas')
		        						->where('slug', '=', $slug)
		        						->update(['speakers' => preg_replace("/\:/",'|', $agenda->speakers)]);

		        	} elseif (preg_match("/\|/", $speaker)) {
		        		list ($type, $person) = explode('|', $speaker);
		        	}

		        	if (!empty($person))
		        	{
		        		$update = DB::table('speakers')
		        					->where('conference_slug', '=', $conference)
		        					->where('slug', '=', $person)
		        					->update(['agenda_slug' => $slug, 'speaker_type' => $type]);
		        	}
		        }
        	}
        }
    }
}
