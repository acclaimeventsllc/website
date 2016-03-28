<?php

use Illuminate\Database\Seeder;

class Updates_20160327223113_SanAntonio_1145_Session_Title_Text_Fix extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

	protected $_table = 'agendas';

    public function run()
    {
        // FIX 11:45 AM SESSION TITLE
        $update = DB::table($this->_table)
                    ->where('conference_slug', '=', '2016/san-antonio')
                    ->where('timeslot', '=', '2016-05-24 11:45:00')
                    ->limit(1)
                    ->update(['title' => 'Accelerating IT Deployments While Maintaining Information Security']);

    }
}
