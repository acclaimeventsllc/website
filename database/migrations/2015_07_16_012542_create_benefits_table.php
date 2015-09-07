<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBenefitsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('benefits', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title');
			$table->text('text');
			$table->integer('priority');
			$table->tinyInteger('reason')->default(1);
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
		Schema::drop('benefits');
	}

}
