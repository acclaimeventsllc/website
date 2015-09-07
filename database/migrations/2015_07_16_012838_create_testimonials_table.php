<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestimonialsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('testimonials', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('author');
			$table->string('title')->nullable();
			$table->string('company');
			$table->text('quote');
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
		Schema::drop('testimonials');
	}

}
