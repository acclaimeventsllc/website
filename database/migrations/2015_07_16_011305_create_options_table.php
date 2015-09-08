<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\Carbon;
use App\Models\Option;

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
			$table->timestamp('published')->nullable();
			$table->softDeletes();
		});

        Option::create([
                'option'    => 'maintenance',
                'value'     => '0',
                'published' => Carbon::create(2015, 08, 28, 15, 05, 29),
            ]);

        Option::create([
                'option'    => 'hero',
                'value'     => '0',
                'published' => Carbon::create(2015, 08, 28, 15, 05, 29),
            ]);

        Option::create([
                'option'    => 'active',
                'value'     => 'home',
                'published' => Carbon::create(2015, 08, 28, 15, 05, 29),
            ]);

        Option::create([
                'option'    => 'title',
                'value'     => 'Acclaim Events',
                'published' => Carbon::create(2015, 08, 28, 15, 05, 29),
            ]);

        Option::create([
                'option'    => 'jumbotron',
                'value'     => '/images/networking.jpg',
                'published' => Carbon::create(2015, 08, 28, 15, 05, 29),
            ]);

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
