<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\Carbon;
use App\Models\Registration;

class CreateRegistrationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
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
			$table->timestamp('accepted')->nullable();
			$table->softDeletes();
		});

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

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('registrations');
	}

}
