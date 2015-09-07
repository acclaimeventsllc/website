<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSponsorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('sponsors', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('slug');
			$table->string('company');
			$table->string('website');
			$table->string('slogan')->nullable();
			$table->text('bio')->nullable();
			$table->text('tags')->nullable();
			$table->text('options')->nullable();
			$table->text('contacts')->nullable();
			$table->string('photo')->nullable();
			$table->timestamps();
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
		Schema::drop('sponsors');
	}

}
