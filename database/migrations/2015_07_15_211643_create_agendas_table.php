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
			$table->integer('conference_id');
			$table->timestamp('timeslot');
			$table->integer('priority')->default(1);
			$table->enum('type',['keynote','session','breakout','break']);
			$table->string('title');
			$table->string('title_short')->nullable();
			$table->string('subtitle')->nullable();
			$table->text('desc')->nullable();
			$table->text('tags')->nullable();
			$table->text('speakers')->nullable();
			$table->text('options')->nullable();
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
		Schema::drop('agendas');
	}

}
