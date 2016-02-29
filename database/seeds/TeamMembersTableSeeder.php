<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TeamMembersTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
 
	protected $_table = 'team_members';

	public function run()
	{

    	// DELETING TABLE ENTRIES
        DB::table($this->_table)->delete();


        // TEAM MEMBERS
        DB::table($this->_table)->insert([
			[
				'first_name'	=> 'Alex',
				'last_name'		=> 'Kaneen',
				'slug'			=> 'kaneen-alex',
				'title'			=> 'President &amp CEO',
				'email'			=> 'alex@acclaimeventsllc.com',
				'linkedin'		=> 'pub/alex-kaneen/1/474/b3a',
				'priority'		=> 1,
				'photo'			=> '/images/team/kaneen-alex.jpg',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			],
			[
				'first_name'	=> 'Bob',
				'last_name'		=> 'Fritz',
				'slug'			=> 'fritz-bob',
				'title'			=> 'Senior Vice President',
				'email'			=> 'bob@acclaimeventsllc.com',
				'linkedin'		=> 'in/bobf2003',
				'priority'		=> 2,
				'photo'			=> '/images/team/fritz-bob.jpg',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			],
			[
				'first_name'	=> 'Jeff',
				'last_name'		=> 'Martin',
				'slug'			=> 'martin-jeff',
				'title'			=> 'VP Business Development',
				'email'			=> 'jeffm@acclaimeventsllc.com',
				'linkedin'		=> 'in/spartanmartin',
				'priority'		=> 3,
				'photo'			=> '/images/team/martin-jeff.jpg',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			],
        ]);
	}
}
