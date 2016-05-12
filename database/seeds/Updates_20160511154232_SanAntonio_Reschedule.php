<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Conference;
use App\Models\Option;
use App\Models\Agenda;
use App\Models\Speaker;

class Updates_20160511154232_SanAntonio_Reschedule extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {

        // SET UP NEW CARBON DATES
    	$_old		= '2016/san-antonio';
        $_new		= (object)[
        	'slug'		=> '2017/san-antonio',
        	'published'	=> Carbon::create(2016, 01, 18, 16, 30, 00),
      		'start'		=> Carbon::create(2017, 01, 18, 07, 00, 00),
        	'end'		=> Carbon::create(2017, 01, 18, 16, 30, 00),
        ];


        // DELETE DUPLICATES
        $conference = Conference::where('slug', '=', $_new->slug)->delete();
        $forceDel 	= Conference::onlyTrashed()->forceDelete();

        $agenda		= Agenda::where('conference_slug', '=', $_new->slug)->delete();
        $forceDel 	= Agenda::onlyTrashed()->forceDelete();

        $option		= Option::where('slug', '=', $_new->slug)->delete();
        $forceDel	= Option::onlyTrashed()->forceDelete();


        unset($conference, $agenda, $option, $forceDel);


        // RESCHEDULE CONFERENCE
        $conference = Conference::where('slug', '=', $_old)
        				->update([
        							'slug'			=> $_new->slug,
        							'start_date'	=> $_new->start,
        							'end_date'		=> $_new->end,
        							'published'		=> $_new->published,
        						]);

        // UPDATE OPTIONS
        $option		= Option::where('slug', '=', $_old)
        				->update([
        							'slug'			=> $_new->slug,
        						]);


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
