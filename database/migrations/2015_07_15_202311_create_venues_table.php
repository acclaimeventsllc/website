<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVenuesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('venues', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('venue');
			$table->string('slug')->unique();
			$table->string('city');
			$table->string('state');
			$table->string('place');
			$table->string('address')->nullable();
			$table->string('coords')->nullable();
			$table->string('directions')->nullable();
			$table->string('contacts')->nullable();
			$table->timestamps();
			$table->timestamp('published')->nullable();
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
		Schema::drop('venues');
	}

}
