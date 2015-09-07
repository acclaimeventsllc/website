<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call('UsersTableSeeder');
		$this->call('ConferencesTableSeeder');
		$this->call('VenuesTableSeeder');
		$this->call('AgendasTableSeeder');
		$this->call('SpeakersTableSeeder');
		$this->call('SponsorsTableSeeder');
		$this->call('TeamMembersTableSeeder');
		$this->call('RegistrationsTableSeeder');
		$this->call('TestimonialsTableSeeder');
		$this->call('OptionsTableSeeder');
		$this->call('NavigationsTableSeeder');
		$this->call('BenefitsTableSeeder');
		$this->call('PagesTableSeeder');
		$this->call('PartnersTableSeeder');
	}

}
