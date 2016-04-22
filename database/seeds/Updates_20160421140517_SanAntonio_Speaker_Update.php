<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class Updates_20160421140517_SanAntonio_Speaker_Update extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    protected $_table = 'speakers';
    protected $_slug = '2016/san-antonio';
    protected $_speakers = [
    	['it-alignment', 'moderator', 'Fernado', 'Duran', 'CIO, IT VP, Sr IT Executive', 'CIO, IT VP, Sr IT Exec', 'Multiple Industry Experience, US-Europe-Mexico-LATAM'],
    	['it-alignment', 'panelist', 'William', 'Phillips', 'SVP &amp; CIO', 'SVP &amp; CIO', 'University Health System'],
    	['controlling-it-spending', 'panelist', 'Anthony', 'Espinoza', 'Deputy CIO', 'Deputy CIO', 'The University of Texas at San Antonio'],
    	['finding-your-next-it-talent', 'panelist', 'Lawanda', 'Parnell', 'Chief Information Officer', 'CIO', 'Pedernales Electric Cooperative'],
    	['finding-your-next-it-talent', 'panelist', 'Cindy', 'Cornelius', 'SVP &amp; CIO', 'SVP &amp; CIO', 'WellMed Medical Management, Inc'],

    ];

    public function run()
    {
    	//  SET PUBLISHED DATE
        $published  = Carbon::create(2016, 04, 21, 14, 05, 17);


        //  ADD 2016 SAN ANTONIO SPEAKERS TO DB
    	foreach ($this->_speakers as $speaker)
    	{
    		list($agenda, $type, $first, $last, $title, $short, $company) = $speaker;

    		$slug	= preg_replace("/[^a-z\-]/i", '',strtolower($first) . '-' . strtolower($last));

    		$record = [
    			'first_name' => $first,
    			'last_name'	=> $last,
    			'slug' => $slug,
    			'conference_slug' => $this->_slug,
    			'agenda_slug' => $agenda,
    			'speaker_type' => $type,
    			'title' => $title,
    			'title_short' => $short,
    			'company' => $company,
    			'published' => $published,
    		];

    		$newSpeaker = DB::table($this->_table)->insert($record);
    		$agendas	= DB::table('agendas')
    						->where('conference_slug', '=', $this->_slug)
    						->where('slug', '=', $agenda)
    						->first();

    		if (!$agendas || !$agendas->speakers || empty($agendas->speakers))
    		{
    			$speakers = $type . '|' . $slug;
    		} else {
    			$speakers = $agendas->speakers . ',' . $type . '|' . $slug;
    		}

    		$update		= DB::table('agendas')
    						->where('conference_slug', '=', $this->_slug)
    						->where('slug', '=', $agenda)
    						->update(['speakers' => $speakers]);



    	}

    	//  USING PREVIOUS PHOTO/BIO FOR LAWANDA PARNELL
    	$lawanda    = DB::table($this->_table)
    				->where('slug', '=', 'parnell-lawanda')
    				->first();

    	$parnell    = DB::table($this->_table)
    				->where('slug', '=', 'parnell-lawanda')
    				->where('conference_slug', '=', '2016/san-antonio')
    				->update(['bio' => $lawanda->bio, 'photo' => $lawanda->photo]);


    }

}
