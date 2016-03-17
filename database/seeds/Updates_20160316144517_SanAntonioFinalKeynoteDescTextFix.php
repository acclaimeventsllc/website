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

        // ALTER TABLE ENTRY FOR 2016 SAN ANTONIO FIRST KEYNOTE
        $update = DB::table($this->_table)
                    ->where('conference_slug', '=', '2016/san-antonio')
                    ->where('timeslot', '=', '2016-05-24 09:00:00')
                    ->update(['desc' => 'Aligning IT with the needs of the business is a necessary component for every organization.  Once aligned, the question then becomes “How can we stay ahead of change when the very nature and the way that we do business is continually changing?” How we adapt to change can have a deep impact on the bottom line of the organization.  Join our panel as they discuss some of the things that they are doing to keep up with the demand for new technologies while aligning with the needs of the business.']);

		// ALTER TABLE ENTRY FOR 2016 SAN ANTONIO FINAL KEYNOTE
		$update	= DB::table($this->_table)
					->where('conference_slug', '=', '2016/san-antonio')
					->where('timeslot', '=', '2016-05-24 15:45:00')
					->update(['desc' => 'When CIOs are looking to achieve their objectives, they often ask “Where am I going to find the person with the right skillset and talent to fill this position?” With technology constantly advancing, new skillsets are often required.  Do we hire from within? Do we hire from outside IT or look to the pool of people coming from one of the universities?  Join our panel as they discuss their insights into how they are finding their up and coming IT Talent.']);

    }
}
