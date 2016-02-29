<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class DatabaseSeeder extends Seeder {

	protected $clean = true;

	protected $tables = [
		'options',
		'pages',
		'users',
		'password_resets',
		'permissions',
		'conferences',
		'venues',
		'speakers',
		'sponsors',
		'agendas',
		'team_members',
		'benefits',
		'testimonials',
		'registrations',
		'navigations',
		'partners',
		'conference_sponsors',
		'topics',
	];

	protected $seeders = [
		"core" => [
			'OptionsTableSeeder',
			'PagesTableSeeder',
			'UsersTableSeeder',
			'ConferencesTableSeeder',
			'VenuesTableSeeder',
			'SpeakersTableSeeder',
			'SponsorsTableSeeder',
			'AgendasTableSeeder',
			'TeamMembersTableSeeder',
			'BenefitsTableSeeder',
			'TestimonialsTableSeeder',
			'RegistrationsTableSeeder',
			'NavigationsTableSeeder',
			'ConferenceSponsorsTableSeeder',
			'PartnersTableSeeder',
			'TopicsTableSeeder',
		],
		"extra"	=> [
		],
	];

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		if ($this->clean === true)
		{
			$this->cleanDatabase();

			foreach ($this->seeders["core"] as $seeder)
			{
				$this->call($seeder);
			}
		}

		foreach ($this->seeders["extra"] as $extra)
		{
			$this->call($extra);
		}

		Model::reguard();

	}

	private function cleanDatabase()
	{
		DB::statement('SET FOREIGN_KEY_CHECKS=0');

		foreach ($this->tables as $table)
		{
			DB::table($table)->truncate();
		}

		DB::statement('SET FOREIGN_KEY_CHECKS=1');
	}

}
