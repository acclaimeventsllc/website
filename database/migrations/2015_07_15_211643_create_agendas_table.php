<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgendasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('agendas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('conference_slug');
			$table->timestamp('timeslot');
			$table->integer('priority')->default(1);
			$table->enum('session_type',['keynote','session','breakout','break']);
			$table->string('title');
			$table->string('title_short')->nullable();
			$table->string('subtitle')->nullable();
			$table->text('desc')->nullable();
			$table->text('speakers')->nullable();
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
		Schema::drop('agendas');
	}

}
