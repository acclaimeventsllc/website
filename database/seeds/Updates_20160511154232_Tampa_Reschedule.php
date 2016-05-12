<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Conference;
use App\Models\Option;
use App\Models\Agenda;
use App\Models\Speaker;

class Updates_20160511154232_Tampa_Reschedule extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // SET UP NEW CARBON DATES
    	$_old		= '2017/tampa';
        $_new		= (object)[
        	'slug'		=> '2017/tampa',
        	'published'	=> Carbon::create(2016, 03, 02, 16, 30, 00),
      		'start'		=> Carbon::create(2017, 03, 02, 07, 00, 00),
        	'end'		=> Carbon::create(2017, 03, 02, 16, 30, 00),
        ];


        // RESCHEDULE CONFERENCE
        $conference = Conference::where('slug', '=', $_old)
        				->update([
        							'slug'			=> $_new->slug,
        							'start_date'	=> $_new->start,
        							'end_date'		=> $_new->end,
        							'published'		=> $_new->published,
        						]);

        // UPDATE OPTIONS
        $options	= Option::insert(['slug' => '2017/tampa', 'option' => 'show_upcoming', 'value' => 0, 'published' => Carbon::now()]);


        // UPDATE AGENDA
        $agendas	= Agenda::where('conference_slug', '=', $_old)->get();

        foreach ($agendas as $agenda)
        {
        	$agenda->conference_slug	= $_new->slug;
        	$agenda->timeslot			= $_new->start->format('Y-m-d') . ' ' . $agenda->timeslot->format('H:i:s');
        	$agenda->save();
        }

        // UPDATE SPEAKERS
        $speakers	= Speaker::where('conference_slug', '=', $_old)
        				->update([
        						'conference_slug'	=> $_new->slug,
        					]);


    }
}
