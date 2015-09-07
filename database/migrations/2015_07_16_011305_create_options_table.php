<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOptionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('options', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('option');
			$table->text('value');
			$table->tinyInteger('serialized')->default(0);
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
		Schema::drop('options');
	}

}
