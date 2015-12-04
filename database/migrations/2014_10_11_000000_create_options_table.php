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
			$table->string('slug');
			$table->string('option');
			$table->text('value');
			$table->timestamps();
			$table->timestamp('published')->nullable();
			$table->softDeletes();
		});


		// GENERAL OPTIONS


		Option::create([
				'slug'			=> 'general',
				'option'		=> 'maintenance',
				'value'			=> '0',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Option::create([
				'slug'			=> 'general',
				'option'		=> 'show_hero_image',
				'value'			=> '0',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Option::create([
				'slug'			=> 'general',
				'option'		=> 'active_menu',
				'value'			=> 'home',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Option::create([
				'slug'			=> 'general',
				'option'		=> 'title',
				'value'			=> 'Acclaim Events',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Option::create([
				'slug'			=> 'general',
				'option'		=> 'jumbotron',
				'value'			=> '/images/networking.jpg',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);


		// HOME PAGE OPTIONS


		Option::create([
				'slug'			=> 'home',
				'option'		=> 'active_menu',
				'value'			=> 'home',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Option::create([
				'slug'			=> 'home',
				'option'		=> 'show_hero_image',
				'value'			=> '1',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Option::create([
				'slug'			=> 'home',
				'option'		=> 'jumbotron',
				'value'			=> '/images/networking.jpg',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Option::create([
				'slug'			=> 'home',
				'option'		=> 'show_upcoming',
				'value'			=> '1',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Option::create([
				'slug'			=> 'home',
				'option'		=> 'show_benefits',
				'value'			=> '1',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Option::create([
				'slug'			=> 'home',
				'option'		=> 'show_testimonials',
				'value'			=> '1',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);


		// ABOUT PAGE OPTIONS

		
		Option::create([
				'slug'			=> 'about',
				'option'		=> 'active_menu',
				'value'			=> 'about',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);
		
		Option::create([
				'slug'			=> 'about',
				'option'		=> 'show_hero_image',
				'value'			=> '0',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);
		
		Option::create([
				'slug'			=> 'about',
				'option'		=> 'title',
				'value'			=> 'About Acclaim Events',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);
		
		Option::create([
				'slug'			=> 'about',
				'option'		=> 'show_about',
				'value'			=> '1',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);
		
		Option::create([
				'slug'			=> 'about',
				'option'		=> 'about_text',
				'value'			=> '<p>Established in 2012, Acclaim Events was created to help Business Technology Executives find solutions to many of today’s critical business challenges. We were built on the premise that networking and the sharing of ideas among technology leaders will help broaden and expand IT knowledge within the local community. With over 20 years of combined experience, our Acclaim Events team knows what it takes to facilitate high quality, interactive and educational technology networking conferences.</p><p>IT Professionals are tasked with keeping corporate and private information secure, while embracing new ways of supporting and doing business. With technology advancing at an alarming rate, it can be challenging to keep up with many of the technological advances, trends and best practices that help to keep our organizations competitive and secure.</p><p>Our IT Strategies Conferences foster an exclusive environment for CIOs &amp; Sr. level IT Executives that is conducive to learning, networking and sharing ideas with their peers; giving them valuable insight and knowledge that they can use within their organizations.</p>',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);
		
		Option::create([
				'slug'			=> 'about',
				'option'		=> 'show_team',
				'value'			=> '1',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);
		
		Option::create([
				'slug'			=> 'about',
				'option'		=> 'show_advisors',
				'value'			=> '1',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);


		// CONFERENCES OPTIONS


		Option::create([
				'slug'			=> 'conferences',
				'option'		=> 'active_menu',
				'value'			=> 'conferences',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);
		
		Option::create([
				'slug'			=> 'conferences',
				'option'		=> 'show_hero_image',
				'value'			=> '0',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Option::create([
				'slug'			=> 'conferences',
				'option'		=> 'title',
				'value'			=> 'Conferences',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Option::create([
				'slug'			=> 'conferences',
				'option'		=> 'show_conferences',
				'value'			=> '1',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);


		// CONFERENCE PAGE OPTIONS


		Option::create([
				'slug'			=> 'conference',
				'option'		=> 'active_menu',
				'value'			=> 'conferences',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Option::create([
				'slug'			=> 'conference',
				'option'		=> 'show_hero_image',
				'value'			=> '1',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Option::create([
				'slug'			=> 'conference',
				'option'		=> 'jumbotron',
				'value'			=> 'event:hero',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Option::create([
				'slug'			=> 'conference',
				'option'		=> 'title',
				'value'			=> 'event:conference',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Option::create([
				'slug'			=> 'conference',
				'option'		=> 'show_countdown',
				'value'			=> '1',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Option::create([
				'slug'			=> 'conference',
				'option'		=> 'show_about',
				'value'			=> '1',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Option::create([
				'slug'			=> 'conference',
				'option'		=> 'show_partners',
				'value'			=> '0',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Option::create([
				'slug'			=> 'conference',
				'option'		=> 'show_topics',
				'value'			=> '1',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Option::create([
				'slug'			=> 'conference',
				'option'		=> 'topics_by_alpha',
				'value'			=> '0',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Option::create([
				'slug'			=> 'conference',
				'option'		=> 'show_agenda',
				'value'			=> '1',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Option::create([
				'slug'			=> 'conference',
				'option'		=> 'show_speakers',
				'value'			=> '0',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Option::create([
				'slug'			=> 'conference',
				'option'		=> 'show_speakers_agenda',
				'value'			=> '1',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Option::create([
				'slug'			=> 'conference',
				'option'		=> 'show_sponsors',
				'value'			=> '0',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Option::create([
				'slug'			=> 'conference',
				'option'		=> 'sponsor_levels',
				'value'			=> '0',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Option::create([
				'slug'			=> 'conference',
				'option'		=> 'show_map',
				'value'			=> '0',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Option::create([
				'slug'			=> 'conference',
				'option'		=> 'show_address',
				'value'			=> '0',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Option::create([
				'slug'			=> 'conference',
				'option'		=> 'show_coordinates',
				'value'			=> '0',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Option::create([
				'slug'			=> 'conference',
				'option'		=> 'show_venue',
				'value'			=> '1',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);


		// CONTACT PAGE OPTIONS


		Option::create([
				'slug'			=> 'contact',
				'option'		=> 'active_menu',
				'value'			=> 'contact',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Option::create([
				'slug'			=> 'contact',
				'option'		=> 'show_hero_image',
				'value'			=> '0',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Option::create([
				'slug'			=> 'contact',
				'option'		=> 'jumbotron',
				'value'			=> '/images/contact.jpg',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Option::create([
				'slug'			=> 'contact',
				'option'		=> 'title',
				'value'			=> 'Contact Us',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Option::create([
				'slug'			=> 'contact',
				'option'		=> 'show_contact',
				'value'			=> '1',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);


		// REGISTER PAGE OPTIONS


		Option::create([
				'slug'			=> 'register',
				'option'		=> 'active_menu',
				'value'			=> 'register',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Option::create([
				'slug'			=> 'register',
				'option'		=> 'show_hero_image',
				'value'			=> '0',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Option::create([
				'slug'			=> 'register',
				'option'		=> 'jumbotron',
				'value'			=> '/images/registration.jpg',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Option::create([
				'slug'			=> 'register',
				'option'		=> 'title',
				'value'			=> 'Conference Registration',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Option::create([
				'slug'			=> 'register',
				'option'		=> 'show_register',
				'value'			=> '1',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);


		// AUSTIN 2015


		Option::create([
				'slug'			=> 'austin',
				'option'		=> 'show_topics',
				'value'			=> '0',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Option::create([
				'slug'			=> 'austin',
				'option'		=> 'show_speakers',
				'value'			=> '1',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);


		Option::create([
				'slug'			=> 'austin',
				'option'		=> 'show_sponsors',
				'value'			=> '1',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);


		Option::create([
				'slug'			=> 'austin',
				'option'		=> 'show_map',
				'value'			=> '1',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);


		Option::create([
				'slug'			=> 'austin',
				'option'		=> 'show_address',
				'value'			=> '1',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
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
