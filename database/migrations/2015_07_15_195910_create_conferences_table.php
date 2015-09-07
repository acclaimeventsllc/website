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
			$table->string('slug')->unique();
			$table->string('conference');
			$table->string('city');
			$table->string('state');
			$table->timestamp('start_date')->default('0000-00-00 00:00:00');
			$table->timestamp('end_date')->default('0000-00-00 00:00:00');
			$table->string('timezone',3)->nullable();
			$table->tinyInteger('coming')->default(0);
			$table->text('about')->nullable();
			$table->text('partners')->nullable();
			$table->string('venue_slug')->nullable();
			$table->text('sponsors')->nullable();
			$table->text('tags')->nullable();
			$table->text('options')->nullable();
			$table->string('hero')->nullable();
			$table->string('photo')->nullable();
			$table->timestamps();
			$table->timestamp('publish_on')->default('0000-00-00 00:00:00');
			$table->timestamp('published')->default('0000-00-00 00:00:00');
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
