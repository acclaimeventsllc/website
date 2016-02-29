<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConferenceSponsorsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('conference_sponsors', function (Blueprint $table) {
			$table->increments('id');
			$table->string('conference_slug');
			$table->string('sponsor_slug');
			$table->enum('sponsorship',['Diamond','Ruby','Emerald'])->default('Emerald');
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
		Schema::drop('conference_sponsors');
	}
}
