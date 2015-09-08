<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\Carbon;
use App\Models\Venue;

class CreateVenuesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('venues', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('venue');
			$table->string('slug')->unique();
			$table->string('city');
			$table->string('state');
			$table->string('place');
			$table->string('address')->nullable();
			$table->string('coords')->nullable();
			$table->string('directions')->nullable();
			$table->string('contacts')->nullable();
			$table->timestamps();
			$table->timestamp('published')->nullable();
			$table->softDeletes();
		});

		Venue::create([
				'venue'				=> 'Crown Plaza Austin',
				'slug'				=> 'texas-austin-crown-plaza-austin',
				'city'				=> 'Austin',
				'state'				=> 'Texas',
				'place'				=> 'ChIJVzSZghjKRIYREyXBujdzq6w',
				'directions'		=> 'http://www.ihg.com/crowneplaza/hotels/us/en/austin/ausgz/hoteldetail?cm_mmc=GoogleMaps-_-cp-_-USEN-_-ausgz#map-directions',
				'published'			=> Carbon::create(2015, 08, 28, 15, 05, 29),
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
		Schema::drop('venues');
	}

}
