<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    protected $_table = 'users';

    public function run()
    {

    	// DELETING TABLE ENTRIES
        DB::table($this->_table)->delete();

        // ADD USERS
        DB::table($this->_table)->insert([
        	['username' => 'AlexKaneen', 'password' => Hash::make('Nikitta007'), 'email' => 'alex@acclaimeventsllc.com'],
        	['username' => 'JeffMartin', 'password' => Hash::make('Michelle001'), 'email' => 'jeffm@acclaimeventsllc.com'],
        	['username' => 'BobFritz', 'password' => Hash::make('badpassword'), 'email' => 'bob@acclaimeventsllc.com'],
        ]);

    }
}
