<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
			$table->string('conference');
			$table->string('attendance');
			$table->string('email');
			$table->string('phone')->nullable();
			$table->string('first_name')->nullable();
			$table->string('last_name')->nullable();
			$table->string('title')->nullable();
			$table->string('company')->nullable();
			$table->string('street')->nullable();
			$table->string('city')->nullable();
			$table->string('state')->nullable();
			$table->string('postal')->nullable();
			$table->string('referrals')->nullable();
			$table->timestamps();
			$table->timestamp('accepted')->nullable();
			$table->softDeletes();
		});
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
