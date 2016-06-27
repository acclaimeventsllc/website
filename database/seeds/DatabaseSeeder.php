<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class DatabaseSeeder extends Seeder {

	protected $clean = false;

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
//			'Updates_20160316144517_SanAntonioFinalKeynoteDescTextFix',
//			'Updates_20160327223113_SanAntonio_1145_Session_Title_Text_Fix',
//			'Updates_20160421140517_SanAntonio_DB_Structure_Data_Fix',
//			'Updates_20160421140517_SanAntonio_Speaker_Update',
//			'Updates_20160421140517_SanAntonio_Agenda_Update',
//			'Updates_20160511154232_SanAntonio_Reschedule',
//			'Updates_20160511154232_Tampa_Reschedule',
//			'Updates_20160512143040_Austin_Vendor',
//			'Updates_20160512143040_Austin_Options',
			'Updates_20160626221027_Austin_Topic_Updates',
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
