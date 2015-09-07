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
