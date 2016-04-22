<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class Updates_20160421140517_SanAntonio_Agenda_Update extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    protected $_table = 'agendas';
    protected $_slug = '2016/san-antonio';

    public function run()
    {
        //  UNPUBLISH THE ENTIRE AGENDA
        $unpublish = DB::table($this->_table)
        			  ->where('conference_slug', '=', $this->_slug)
        			  ->update(['published' => null]);


        //  SET THE PUBLISH DATE
        $published  = Carbon::create(2016, 04, 21, 14, 05, 17);


        //  PUBLISH BREAKS
        $breaks   = DB::table($this->_table)
        			  ->where('conference_slug', '=', $this->_slug)
        			  ->where('session_type', '=', 'break')
        			  ->update(['published' => $published]);

        //  PUBLISH THE NEW AGENDA
        $keynote1 = DB::table($this->_table)
        			  ->where('conference_slug', '=', $this->_slug)
        			  ->where('timeslot', '=', '2016-05-24 09:00:00')
        			  ->update(['published' => $published]);
 
        $keynote2 = DB::table($this->_table)
        			  ->where('conference_slug', '=', $this->_slug)
        			  ->where('timeslot', '=', '2016-05-24 10:30:00')
        			  ->where('priority', '=', 4)
        			  ->update(['session_type' => 'keynote', 'published' => $published]);
 
        $breakout1 = DB::table($this->_table)
        			  ->where('conference_slug', '=', $this->_slug)
        			  ->where('timeslot', '=', '2016-05-24 10:30:00')
        			  ->where('priority', '=', 5)
        			  ->update(['session_type' => 'session', 'timeslot' => '2016-05-24 11:45:00', 'published' => $published]);

        $breakout2 = DB::table($this->_table)
        			  ->where('conference_slug', '=', $this->_slug)
        			  ->where('timeslot', '=', '2016-05-24 14:30:00')
        			  ->where('priority', '=', 11)
        			  ->update(['session_type' => 'breakout', 'timeslot' => '2016-05-24 11:45:00', 'priority' => 2, 'published' => $published]);

        $keynote3 = DB::table($this->_table)
        			  ->where('conference_slug', '=', $this->_slug)
        			  ->where('timeslot', '=', '2016-05-24 12:45:00')
        			  ->update(['published' => $published]);

        $keynote4 = DB::table($this->_table)
        			  ->where('conference_slug', '=', $this->_slug)
        			  ->where('timeslot', '=', '2016-05-24 11:45:00')
        			  ->where('priority', '=', 7)
        			  ->update(['session_type' => 'keynote', 'timeslot' => '2016-05-24 14:30:00', 'published' => $published]);

        $keynote5 = DB::table($this->_table)
        			  ->where('conference_slug', '=', $this->_slug)
        			  ->where('timeslot', '=', '2016-05-24 15:45:00')
        			  ->update(['published' => $published]);


        //  CHANGE PRIORITIES FOR EVERYTHING EXCEPT 2ND BREAKOUT
        $priorities = DB::table($this->_table)
        			  ->where('conference_slug', '=', $this->_slug)
        			  ->where('session_type', '!=', 'breakout')
        			  ->update(['priority' => 1]);

    }
}
