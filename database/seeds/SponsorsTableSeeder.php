<?php

use Illuminate\Database\Seeder;
use App\Models\Sponsor;
use Carbon\Carbon;

class SponsorsTableSeeder extends Seeder {
	
	public function run() {

		DB::table('sponsors')->delete();

		/*

			Schema::create('sponsors', function(Blueprint $table)
			{
				$table->increments('id');
				$table->string('company');
				$table->string('slug');
				$table->string('website');
				$table->string('slogan')->nullable();
				$table->text('bio')->nullable();
				$table->text('tags')->nullable();
				$table->text('options')->nullable();
				$table->text('contacts')->nullable();
				$table->binary('photo')->nullable();
				$table->timestamps();
				$table->timestamp('published')->default('0000-00-00 00:00:00');
				$table->softDeletes();
			});

			protected $fillable = [
				'company',
				'slug',
				'website',
				'slogan',
				'bio',
				'tags',
				'options',
				'contacts',
				'photo',
				'published',
			];

		*/

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
				'website'	=> 'http://www.mcci.com',
				'photo'		=> '/images/sponsors/mcci.jpg',
				'published'	=> Carbon::create(2015, 09, 04, 19, 37, 05),
			]);


	}

}