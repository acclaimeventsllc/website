<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class NavigationsTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */

	protected $_table = 'navigations';

	public function run()
	{

		// INITAL PUBLISH DATE
		$published = Carbon::create(2015, 08, 28,15, 05, 29);

		// DELETING TABLE ENTRIES
		DB::table($this->_table)->delete();


		// MAIN MENU


		DB::table($this->_table)->insert([
			[
				'menu'		=> 'main',
				'styles'	=> null,
				'href'		=> '/',
				'content'	=> 'Home',
				'title'		=> 'Acclaim Events Home',
				'option'	=> '',
				'priority'	=> '1',
				'published' => $published,
			],
			[
				'menu'		=> 'main',
				'styles'	=> null,
				'href'		=> '/about',
				'content'	=> 'About Us',
				'title'		=> null,
				'option'	=> '',
				'priority'	=> '2',
				'published' => $published,
			],
			[
				'menu'		=> 'main',
				'styles'	=> null,
				'href'		=> '/conferences',
				'content'	=> 'Conferences',
				'title'		=> null,
				'option'	=> '',
				'priority'	=> '3',
				'published' => $published,
			],
			[
				'menu'		=> 'main',
				'styles'	=> null,
				'href'		=> '/contact',
				'content'	=> 'Contact Us',
				'title'		=> null,
				'option'	=> '',
				'priority'	=> '4',
				'published' => $published,
			],
			[
				'menu'		=> 'main',
				'styles'	=> 'register-now',
				'href'		=> '/register',
				'content'	=> 'Register',
				'title'		=> null,
				'option'	=> '',
				'priority'	=> '5',
				'published' => $published,
			],
		]);


		// HOME SUBMENU


		DB::table($this->_table)->insert([
			[
				'menu'		=> 'home',
				'href'		=> '#home',
				'content'	=> 'Top',
				'option'	=> '',
				'priority'	=> '1',
				'published' => $published,
			],
			[
				'menu'		=> 'home',
				'href'		=> '#upcoming-events',
				'content'	=> 'Upcoming Events',
				'option'	=> '',
				'priority'	=> '2',
				'published' => $published,
			],
			[
				'menu'		=> 'home',
				'href'		=> '#benefits',
				'content'	=> 'Who Should Attend',
				'option'	=> '',
				'priority'	=> '3',
				'published' => $published,
			],
			[
				'menu'		=> 'home',
				'href'		=> '#testimonials',
				'content'	=> 'Testimonials',
				'option'	=> '',
				'priority'	=> '4',
				'published' => $published,
			],
		]);


		// ABOUT SUBMENU


		DB::table($this->_table)->insert([
			[
				'menu'		=> 'about',
				'href'		=> '#about',
				'content'	=> 'About Acclaim',
				'option'	=> '',
				'priority'	=> '1',
				'published' => $published,
			],
			[
				'menu'		=> 'about',
				'href'		=> '#team',
				'content'	=> 'Meet Our Team',
				'option'	=> '',
				'priority'	=> '2',
				'published' => $published,
			],
			[
				'menu'		=> 'about',
				'href'		=> '#advisors',
				'content'	=> 'Advisory Board',
				'option'	=> '',
				'priority'	=> '3',
				'published' => $published,
			],
		]);


		// CONFERENCE SUBMENU


		DB::table($this->_table)->insert([
			[
				'menu'		=> 'conference',
				'href'		=> '#home',
				'content'	=> 'Top',
				'option'	=> '',
				'priority'	=> '1',
				'published' => $published,
			],
			[
				'menu'		=> 'conference',
				'href'		=> '#countdown',
				'content'	=> 'Countdown',
				'option'	=> 'options:show_countdown=0',
				'priority'	=> '2',
				'published' => $published,
			],
			[
				'menu'		=> 'conference',
				'href'		=> '#about',
				'content'	=> 'About',
				'option'	=> 'options:show_about=1',
				'priority'	=> '2',
				'published' => $published,
			],
			[
				'menu'		=> 'conference',
				'href'		=> '#agenda',
				'content'	=> 'Agenda',
				'option'	=> 'options:show_agenda=1',
				'priority'	=> '3',
				'published' => $published,
			],
			[
				'menu'		=> 'conference',
				'href'		=> '#speakers',
				'content'	=> 'Speakers',
				'option'	=> 'options:show_speakers=1',
				'priority'	=> '4',
				'published' => $published,
			],
			[
				'menu'		=> 'conference',
				'href'		=> '#sponsors',
				'content'	=> 'Sponsors',
				'option'	=> '',
				'priority'	=> '5',
				'published' => $published,
			],
			[
				'menu'		=> 'conference',
				'href'		=> '#location',
				'content'	=> 'Venue',
				'option'	=> 'options:show_map=1',
				'priority'	=> '5',
				'published' => $published,
			],
		]);

	}
}
