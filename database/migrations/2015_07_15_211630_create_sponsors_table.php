<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\Carbon;
use App\Models\Sponsor;

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
			$table->timestamp('published')->nullable();
			$table->softDeletes();
		});

		Sponsor::create([
				'company'	=> 'Cylance',
				'slug'		=> 'cylance',
				'website'	=> 'http://www.cylance.com',
				'photo'		=> '/images/sponsors/cylance.png',
				'published'	=> Carbon::create(2015, 09, 04, 19, 37, 05),
			]);

		Sponsor::create([
				'company'	=> 'Dynatrace',
				'slug'		=> 'dynatrace',
				'website'	=> 'http://www.dynatrace.com',
				'photo'		=> '/images/sponsors/dynatrace.png',
				'published'	=> Carbon::create(2015, 09, 04, 19, 37, 05),
			]);

		Sponsor::create([
				'company'	=> 'Forsythe Technology',
				'slug'		=> 'forsythe',
				'website'	=> 'http://www.forsythe.com',
				'photo'		=> '/images/sponsors/forsythe.png',
				'published'	=> Carbon::create(2015, 09, 04, 19, 37, 05),
			]);

		Sponsor::create([
				'company'	=> 'Hitachi Data Systems',
				'slug'		=> 'hitachi',
				'website'	=> 'http://www.hitachi.com',
				'photo'		=> '/images/sponsors/hitachi.png',
				'published'	=> Carbon::create(2015, 09, 04, 19, 37, 05),
			]);

		Sponsor::create([
				'company'	=> 'Workday',
				'slug'		=> 'workday',
				'website'	=> 'http://www.workday.com',
				'photo'		=> '/images/sponsors/workday.png',
				'published'	=> Carbon::create(2015, 09, 04, 19, 37, 05),
			]);

		Sponsor::create([
				'company'	=> 'MCCI',
				'slug'		=> 'mcci',
				'website'	=> 'http://www.mccinnovations.com/',
				'photo'		=> '/images/sponsors/mcci.jpg',
				'published'	=> Carbon::create(2015, 09, 04, 19, 37, 05),
			]);

		Sponsor::create([
				'company'	=> 'Good Technologies',
				'slug'		=> 'good',
				'website'	=> 'http://www.good.com',
				'photo'		=> '/images/sponsors/good.jpg',
				'published'	=> Carbon::create(2015, 09, 04, 19, 37, 05),
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
		Schema::drop('sponsors');
	}

}
