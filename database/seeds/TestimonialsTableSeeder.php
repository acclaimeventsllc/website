<?php

use Illuminate\Database\Seeder;
use App\Models\Testimonial;
use Carbon\Carbon;

class TestimonialsTableSeeder extends Seeder {
	
	public function run() {

		DB::table('testimonials')->delete();

		/*

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

			protected $fillable = [
				'author',
				'title',
				'company',
				'quote',
				'photo',
				'published',
			];

		*/

		Testimonial::create([
				'author'	=> 'Dan Hughes',
				'title'		=> 'CEO',
				'company'	=> 'PT Northwest LLC',
				'quote'		=> 'Not only good speakers, but excellent scheduling to allow for good opportunities for networking.',
				'published'	=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Testimonial::create([
				'author'	=> 'Jon Turino',
				'company'	=> 'COUNTRY Financial',
				'quote'		=> 'The diverse program for this event has a little something for everyone.',
				'published'	=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Testimonial::create([
				'author'	=> 'Cynthia Wetlesen',
				'title'		=> 'Owner',
				'company'	=> 'Affordable Insurance Strategies',
				'quote'		=> 'The speakers and topics were pertinent and beneficial.',
				'published'	=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Testimonial::create([
				'author'	=> 'Sam Darcy',
				'title'		=> 'CEO',
				'company'	=> 'Astoria Pointe',
				'quote'		=> 'Professional delivery of relevant topics. &nbsp;Looking forward to the next event.',
				'published'	=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

	}

}