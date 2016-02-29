<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class OptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    protected $_table = 'options';

    public function run()
    {

    	// INITAL PUBLISH DATE
    	$published = Carbon::create(2015, 08, 28,15, 05, 29);

    	// DELETING TABLE ENTRIES
        DB::table($this->_table)->delete();


        // GENERAL OPTIONS
        DB::table($this->_table)->insert([
        	['slug' => 'general', 'option' => 'maintenance', 'value' => '0', 'published' => $published],
        	['slug' => 'general', 'option' => 'show_hero_image', 'value' => '0', 'published' => $published],
        	['slug' => 'general', 'option' => 'active_menu', 'value' => 'home', 'published' => $published],
        	['slug' => 'general', 'option' => 'title', 'value' => 'Acclaim Events', 'published' => $published],
        	['slug' => 'general', 'option' => 'jumbotron', 'value' => '/images/networking.jpg', 'published' => $published],
        ]);

       	// HOME PAGE OPTIONS
        DB::table($this->_table)->insert([
        	['slug' => 'home', 'option' => 'active_menu', 'value' => 'home', 'published' => $published],
        	['slug' => 'home', 'option' => 'show_hero_image', 'value' => '1', 'published' => $published],
        	['slug' => 'home', 'option' => 'jumbotron', 'value' => '/images/networking.jpg', 'published' => $published],
        	['slug' => 'home', 'option' => 'show_upcoming', 'value' => '1', 'published' => $published],
        	['slug' => 'home', 'option' => 'show_benefits', 'value' => '1', 'published' => $published],
        	['slug' => 'home', 'option' => 'show_testimonials', 'value' => '1', 'published' => $published],
        ]);

        // ABOUT PAGE OPTIONS
        DB::table($this->_table)->insert([
        	['slug' => 'about', 'option' => 'active_menu', 'value' => 'about', 'published' => $published],
        	['slug' => 'about', 'option' => 'show_hero_image', 'value' => '0', 'published' => $published],
        	['slug' => 'about', 'option' => 'title', 'value' => 'About Acclaim Events', 'published' => $published],
        	['slug' => 'about', 'option' => 'show_about', 'value' => '1', 'published' => $published],
        	['slug' => 'about', 'option' => 'about_text', 'value' => '<p>Established in 2012, Acclaim Events was created to help Business Technology Executives find solutions to many of today’s critical business challenges. We were built on the premise that networking and the sharing of ideas among technology leaders will help broaden and expand IT knowledge within the local community. With over 20 years of combined experience, our Acclaim Events team knows what it takes to facilitate high quality, interactive and educational technology networking conferences.</p><p>IT Professionals are tasked with keeping corporate and private information secure, while embracing new ways of supporting and doing business. With technology advancing at an alarming rate, it can be challenging to keep up with many of the technological advances, trends and best practices that help to keep our organizations competitive and secure.</p><p>Our IT Strategies Conferences foster an exclusive environment for CIOs &amp; Sr. level IT Executives that is conducive to learning, networking and sharing ideas with their peers; giving them valuable insight and knowledge that they can use within their organizations.</p>', 'published' => $published],
        	['slug' => 'about', 'option' => 'show_team', 'value' => '1', 'published' => $published],
        	['slug' => 'about', 'option' => 'show_advisors', 'value' => '1', 'published' => $published],
        ]);

        // CONFERENCES PAGE OPTIONS
        DB::table($this->_table)->insert([
        	['slug' => 'conferences', 'option' => 'active_menu', 'value' => 'conferences', 'published' => $published],
        	['slug' => 'conferences', 'option' => 'show_hero_image', 'value' => '0', 'published' => $published],
        	['slug' => 'conferences', 'option' => 'title', 'value' => 'Conferences', 'published' => $published],
        	['slug' => 'conferences', 'option' => 'show_conferences', 'value' => '1', 'published' => $published],
        ]);

        // INDIVIDUAL CONFERENCE PAGE DEFAULT OPTIONS
        DB::table($this->_table)->insert([
        	['slug' => 'conference', 'option' => 'active_menu', 'value' => 'conferences', 'published' => $published],
        	['slug' => 'conference', 'option' => 'show_hero_image', 'value' => '1', 'published' => $published],
        	['slug' => 'conference', 'option' => 'jumbotron', 'value' => 'event:hero', 'published' => $published],
        	['slug' => 'conference', 'option' => 'title', 'value' => 'event:conference', 'published' => $published],
        	['slug' => 'conference', 'option' => 'show_countdown', 'value' => '1', 'published' => $published],
        	['slug' => 'conference', 'option' => 'show_upcoming', 'value' => '1', 'published' => $published],
        	['slug' => 'conference', 'option' => 'show_about', 'value' => '1', 'published' => $published],
        	['slug' => 'conference', 'option' => 'show_partners', 'value' => '0', 'published' => $published],
        	['slug' => 'conference', 'option' => 'show_topics', 'value' => '1', 'published' => $published],
        	['slug' => 'conference', 'option' => 'topics_by_alpha', 'value' => '0', 'published' => $published],
        	['slug' => 'conference', 'option' => 'show_agenda', 'value' => '1', 'published' => $published],
        	['slug' => 'conference', 'option' => 'show_speakers', 'value' => '0', 'published' => $published],
        	['slug' => 'conference', 'option' => 'show_speakers_agenda', 'value' => '1', 'published' => $published],
        	['slug' => 'conference', 'option' => 'show_sponsors', 'value' => '0', 'published' => $published],
        	['slug' => 'conference', 'option' => 'sponsor_levels', 'value' => '0', 'published' => $published],
        	['slug' => 'conference', 'option' => 'show_map', 'value' => '0', 'published' => $published],
        	['slug' => 'conference', 'option' => 'show_address', 'value' => '0', 'published' => $published],
        	['slug' => 'conference', 'option' => 'show_coordinates', 'value' => '0', 'published' => $published],
        	['slug' => 'conference', 'option' => 'show_venue', 'value' => '0', 'published' => $published],
        ]);

        // CONTACT PAGE OPTIONS
        DB::table($this->_table)->insert([
        	['slug' => 'contact', 'option' => 'active_menu', 'value' => 'contact', 'published' => $published],
        	['slug' => 'contact', 'option' => 'show_hero_image', 'value' => '0', 'published' => $published],
        	['slug' => 'contact', 'option' => 'jumbotron', 'value' => '/images/contact.jpg', 'published' => $published],
        	['slug' => 'contact', 'option' => 'title', 'value' => 'Contact Us', 'published' => $published],
        	['slug' => 'contact', 'option' => 'show_contact', 'value' => '1', 'published' => $published],
        ]);

        // CONFERENCE REGISTRATION PAGE OPTIONS
        DB::table($this->_table)->insert([
        	['slug' => 'register', 'option' => 'active_menu', 'value' => 'register', 'published' => $published],
        	['slug' => 'register', 'option' => 'show_hero_image', 'value' => '0', 'published' => $published],
        	['slug' => 'register', 'option' => 'jumbotron', 'value' => '/images/registration.jpg', 'published' => $published],
        	['slug' => 'register', 'option' => 'title', 'value' => 'Conference Registration', 'published' => $published],
        	['slug' => 'register', 'option' => 'show_register', 'value' => '1', 'published' => $published],
        ]);


		// CONFERENCE-SPECIFIC OPTIONS

		// AUSTIN 2015
		DB::table($this->_table)->insert([
            ['slug' => '2015/austin', 'option' => 'show_upcoming', 'value' => '0', 'published' => $published],
        	['slug' => '2015/austin', 'option' => 'show_topics', 'value' => '0', 'published' => $published],
        	['slug' => '2015/austin', 'option' => 'show_speakers', 'value' => '1', 'published' => $published],
        	['slug' => '2015/austin', 'option' => 'show_sponsors', 'value' => '1', 'published' => $published],
        	['slug' => '2015/austin', 'option' => 'show_map', 'value' => '1', 'published' => $published],
        	['slug' => '2015/austin', 'option' => 'show_address', 'value' => '1', 'published' => $published],
        	['slug' => '2015/austin', 'option' => 'show_venue', 'value' => '1', 'published' => $published],
        ]);

		$published = Carbon::create(2015, 12, 28, 15, 05, 17);

		// SAN ANTONIO 2016
		DB::table($this->_table)->insert([
        	['slug' => '2016/san-antonio', 'option' => 'show_upcoming', 'value' => '0', 'published' => $published],
        	['slug' => '2016/san-antonio', 'option' => 'show_topics', 'value' => '0', 'published' => Carbon::create(2016, 02, 27, 16, 06, 32)],
        	['slug' => '2016/san-antonio', 'option' => 'show_map', 'value' => '1', 'published' => $published],
        	['slug' => '2016/san-antonio', 'option' => 'show_address', 'value' => '1', 'published' => $published],
        	['slug' => '2016/san-antonio', 'option' => 'show_venue', 'value' => '1', 'published' => $published],
        ]);

		// AUSTIN 2016
		DB::table($this->_table)->insert([
        	['slug' => '2016/austin', 'option' => 'show_upcoming', 'value' => '0', 'published' => $published],
        	['slug' => '2016/austin', 'option' => 'show_map', 'value' => '1', 'published' => $published],
        	['slug' => '2016/austin', 'option' => 'show_address', 'value' => '1', 'published' => $published],
        	['slug' => '2016/austin', 'option' => 'show_venue', 'value' => '1', 'published' => $published],
        ]);
    }
}
