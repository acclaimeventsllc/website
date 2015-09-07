<?php

use Illuminate\Database\Seeder;
use App\Models\Registration;

class RegistrationsTableSeeder extends Seeder {
	
	public function run() {

		DB::table('registrations')->delete();

		/*

			Schema::create('registrations', function(Blueprint $table)
			{
				$table->increments('id');
				$table->string('first_name');
				$table->string('last_name');
				$table->string('title');
				$table->string('company');
				$table->string('email');
				$table->string('phone');
				$table->string('street')->nullable();
				$table->string('city')->nullable();
				$table->string('state')->nullable();
				$table->string('postal')->nullable();
				$table->string('referrals')->nullable();
				$table->tinyInteger('stage')->default(0);
				$table->timestamps();
				$table->timestamp('accepted')->default('0000-00-00 00:00:00');
				$table->softDeletes();
			});

			protected $fillable = [
				'first_name',
				'last_name',
				'title',
				'company',
				'email',
				'phone',
				'street',
				'city',
				'state',
				'postal',
				'referrals',
				'stage',
				'accepted',
			];

		*/

		Registration::create([
				'first_name'	=> 'Jeff',
				'last_name'		=> 'Martin',
				'email'			=> 'jeff@spartanmartin.com',
				'phone'			=> '9715061908',
				'title'			=> 'Grand Poo-bah',
				'company'		=> 'SpartanMartin.com',
				'street'		=> '18415 SW Ewen Drive APT H',
				'city'			=> 'Beaverton',
				'state'			=> 'OR',
				'postal'		=> '97003',
			]);

	}

}