<?php

use Illuminate\Database\Seeder;

class Updates_20160316144517_SanAntonioFinalKeynoteDescTextFix extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

	protected $_table = 'agendas';

    public function run()
    {

		// ALTER TABLE ENTRY FOR 2016 SAN ANTONIO FINAL KEYNOTE
		$update	= DB::table($this->_table)
					->where('conference_slug', '=', '2016/san-antonio')
					->where('timeslot', '=', '2016-05-24 15:45:00')
					->update(['desc' => 'When CIOs are looking to achieve their objectives, they often ask “Where am I going to find the person with the right skillset and talent to fill this position?” With technology constantly advancing, new skillsets are often required.  Do we hire from within? Do we hire from outside IT or look to the pool of people coming from one of the universities?  Join our panelists as they discuss their insights into how they are finding their up and coming IT Talent.']);

    }
}
