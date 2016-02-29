<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RegistrationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    protected $_table = 'registrations';

    public function run()
    {

    	// DELETING TABLE ENTRIES
        DB::table($this->_table)->delete();

        // CONFERENCE REGISTRATIONS
        DB::table($this->_table)->insert([
			[
				'conference'	=> '2015/austin',
				'attendance'	=> 'attendee',
				'email'			=> 'jeff@spartanmartin.com',
				'phone'			=> '9715061908',
				'first_name'	=> 'Jeff',
				'last_name'		=> 'Martin',
				'title'			=> 'Grand Poo-bah',
				'company'		=> 'SpartanMartin.com',
				'street'		=> '18415 SW Ewen Drive APT H',
				'city'			=> 'Beaverton',
				'state'			=> 'OR',
				'postal'		=> '97003',
				'referrals'		=> null,
			],
        ]);

    }
}
