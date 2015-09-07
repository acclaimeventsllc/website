<?php

use Illuminate\Database\Seeder;
use App\Models\Page;
use App\Helpers\Helpers;
use Carbon\Carbon;

class PagesTableSeeder extends Seeder {
	
	public function run() {

		DB::table('pages')->delete();

		/*
			Schema::create('pages', function (Blueprint $table) {
				$table->increments('id');
				$table->string('slug');
				$table->string('options')->nullable();
				$table->timestamps();
				$table->timestamp('published')->default('0000-00-00 00:00:00');
				$table->softDeletes();
			});
 
			$fillable = [
				'slug',
				'options',
				'published',
			];
		*/

		Page::create([
				'slug'		=> 'home',
				'options'	=> Helpers::serialize([
						'active'		=> 'home',
						'hero'			=> '1',
						'jumbotron'		=> '/images/networking.jpg',
						'upcoming'		=> '1',
						'benefits'		=> '1',
						'testimonials'	=> '1',
					]),
				'published'	=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Page::create([
				'slug'		=> 'about',
				'about'		=> '<p>Established in 2012, Acclaim Events was created to help Business Technology Executives find solutions to many of today’s critical business challenges. We were built on the premise that networking and the sharing of ideas among technology leaders will help broaden and expand IT knowledge within the local community. With over 20 years of combined experience, our Acclaim Events team knows what it takes to facilitate high quality, interactive and educational technology networking conferences.</p><p>IT Professionals are tasked with keeping corporate and private information secure, while embracing new ways of supporting and doing business. With technology advancing at an alarming rate, it can be challenging to keep up with many of the technological advances, trends and best practices that help to keep our organizations competitive and secure.</p><p>Our IT Strategies Conferences foster an exclusive environment for CIOs &amp; Sr. level IT Executives that is conducive to learning, networking and sharing ideas with their peers; giving them valuable insight and knowledge that they can use within their organizations.</p>',
				'options'	=> Helpers::serialize([
						'active'		=> 'about',
						'hero'			=> '0',
						'title'			=> 'About Acclaim Events',
						'about'			=> '1',
						'team'			=> '1',
						'advisors'		=> '1',
					]),
				'published'	=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Page::create([
				'slug'		=> 'conferences',
				'options'	=> Helpers::serialize([
						'active'		=> 'conferences',
						'title'			=> 'Conferences',
						'conferences'	=> '1',
					]),
				'published'	=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Page::create([
				'slug'		=> 'conference',
				'options'	=> Helpers::serialize([
						'active'		=> 'conferences',
						'title'			=> 'event:conference',
						'hero'			=> '1',
						'jumbotron'		=> 'event:hero',
						'countdown'		=> '0',
						'about'			=> '0',
						'agenda'		=> '0',
						'speakers'		=> '0',
						'sponsors'		=> '0',
						'map'			=> '0',
						'address'		=> '0',
						'coords'		=> '0',
						'venue'			=> '0',
					]),
				'published'	=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Page::create([
				'slug'		=> 'contact',
				'options'	=> Helpers::serialize([
						'active'		=> 'contact',
						'title'			=> 'Contact Us',
						'hero'			=> '0',
						'jumbotron'		=> '/images/contact.jpg',
						'contact'		=> '1',
					]),
				'published'	=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Page::create([
				'slug'		=> 'register',
				'options'	=> Helpers::serialize([
						'active'		=> 'register',
						'title'			=> 'Conference Registration',
						'hero'			=> '0',
						'jumbotron'		=> '/images/registration.jpg',
						'contact'		=> 'register',
					]),
				'published'	=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);


	}

}