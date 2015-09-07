<?php

use Illuminate\Database\Seeder;
use App\Models\Venue;
use Carbon\Carbon;

class VenuesTableSeeder extends Seeder {
	
	public function run() {

		DB::table('venues')->delete();

		/*

			Schema::create('venues', function(Blueprint $table)
			{
				$table->increments('id');
				$table->string('name');
				$table->string('slug');
				$table->string('place');
				$table->string('address')->nullable();
				$table->string('coords')->nullable();
				$table->string('directions')->nullable();
				$table->string('contacts')->nullable();
				$table->timestamps();
				$table->timestamp('published')->default('0000-00-00 00:00:00');
				$table->softDeletes();
			});

			protected $fillable = [
				'name',
				'place',
				'address',
				'coords',
				'directions',
				'contacts',
				'published',
			];

		*/

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
}