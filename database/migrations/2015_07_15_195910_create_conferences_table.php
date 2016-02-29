<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConferencesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('conferences', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('slug');
			$table->string('conference');
			$table->string('city');
			$table->string('state');
			$table->datetime('start_date');
			$table->timestamp('end_date');
			$table->string('timezone',3)->nullable();
			$table->text('about')->nullable();
//			$table->text('partners')->nullable();
			$table->string('venue_slug')->nullable();
			$table->text('tags')->nullable();
			$table->string('hero')->nullable();
			$table->string('photo')->nullable();
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
		Schema::drop('conferences');
	}

}
