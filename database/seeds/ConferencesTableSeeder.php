<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ConferencesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    protected $_table = 'conferences';

    public function run()
    {

    	// DELETING TABLE ENTRIES
        DB::table($this->_table)->delete();

        
        // INDIVIDUAL CONFERENCES

        // AUSTIN 2015
        DB::table($this->_table)->insert([
				'slug'			=> '2015/austin',
				'conference'	=> 'Austin IT Strategies Conference',
				'city'			=> 'Austin',
				'state'			=> 'TX',
				'start_date'	=> Carbon::create(2015, 9, 15, 7, 30, 0),
				'end_date'		=> Carbon::create(2015, 9, 15, 16, 30, 0),
				'timezone'		=> 'EST',
				'about'			=> '<p>Our Austin IT Strategies Conference will bring together CIOs, CTOs SVPs &#038; VPs of IT, IT Directors and Sr. Level IT Leaders of fortune 100-5000 companies and equivalent healthcare, government and educational entities in the greater Austin Region.  Our attendee’s will have the opportunity to hear from Industry experts, network with their peers and discuss critical challenges and issues that they face within their organizations.  We encourage our attendee’s to share and discuss their lessons learned, knowledge and insight as we dive into some of today’s biggest IT challenges.</p><p>We strive to produce content-rich presentations that will provide answers to many of today’s business challenges and hope that you will be able to gain practical knowledge and insights that you can then use within your own organization.</p>',
//				'partners'		=> Helpers::serialize(['partners' => ['tagitm'], 'text' => '<p><strong>We are proud to be able to partner with TAGITM for the 2015 Austin IT Strategies Conference.</strong></p>']),
				'venue_slug'	=> 'texas-austin-crown-plaza-austin',
//				'sponsors'		=> Helpers::serialize(['emerald' => ['cylance', 'dynatrace', 'forsythe', 'hitachi', 'workday', 'mcci', 'good', '2fa', 'nimble-storage', 'secure-nation', 'windstream', 'arbor-networks']]),
				'tags'			=> 'austin-it-strategies-2015,austin,texas,it-strategies,information-technology,it-solutions',
//				'options'		=> Helpers::serialize(['link' => '0', 'hero' => true, 'title' => 'event:conference', 'jumbotron' => 'event:hero', 'countdown' => true, 'about' => true, 'partners' => true, 'agenda' => true, 'speakers' => true, 'sponsors' => true, 'sponsorlevels' => false, 'venue' => true]),
				'hero'			=> '/images/conferences/austin.jpg',
				'photo'			=> '/images/conferences/austin-portfolio.jpg',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		// SAN ANTONIO 2016
        DB::table($this->_table)->insert([
				'slug'			=> '2016/san-antonio',
				'conference'	=> 'San Antonio IT Strategies Conference',
				'city'			=> 'San Antonio',
				'state'			=> 'TX',
				'start_date'	=> Carbon::create(2016, 5, 24, 7, 30, 0),
				'end_date'		=> Carbon::create(2016, 5, 24, 16, 30, 00),
				'timezone'		=> 'CDT',
				'about'			=> '<p>Our San Antonio IT Strategies Conference fosters an exclusive environment for CIOs & Sr. level IT Executives of fortune 100-5000 companies and equivalent healthcare, education and local/state government entities that is conducive to learning, networking and sharing of information with their peers and colleagues giving them valuable insight and knowledge that they can use within their IT organizations.</p><p>Attendees have the opportunity to hear from Industry experts as they discuss critical business challenges, strategies and solutions that many IT organizations face. We encourage attendee’s to share their expertise and discuss lessons learned as we dive into some of today’s biggest IT challenges.</p>',
				'venue_slug'	=> 'norris-conference-center-san-antonio',
//				'sponsors'		=> Helpers::serialize([]),
				'tags'			=> 'san-antonio,texas,it-strategies,information-technology,it-solutions',
//				'options'		=> Helpers::serialize(['link' => '0', 'title' => 'event:conference', 'jumbotron' => 'event:hero', 'countdown' => true, 'about' => true, 'partners' => false, 'agenda' => true, 'speakers' => false, 'sponsors' => false, 'sponsorlevels' => false, 'venue' => true]),
				'hero'			=> '/images/conferences/san-antonio.jpg',
				'photo'			=> '/images/conferences/san-antonio-portfolio.jpg',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		// AUSTIN 2016
        DB::table($this->_table)->insert([
				'slug'			=> '2016/austin',
				'conference'	=> 'Austin IT Strategies Conference',
				'city'			=> 'Austin',
				'state'			=> 'TX',
				'start_date'	=> Carbon::create(2016, 9, 21, 7, 30, 0),
				'end_date'		=> Carbon::create(2016, 9, 21, 16, 30, 0),
				'timezone'		=> 'CDT',
				'about'			=> '<p>Our Austin IT Strategies Conference fosters an exclusive environment for CIOs & Sr. level IT Executives of fortune 100-5000 companies and equivalent healthcare, education and local/state government entities that is conducive to learning, networking and sharing of information with their peers and colleagues giving them valuable insight and knowledge that they can use within their IT organizations.</p><p>Attendees have the opportunity to hear from Industry experts as they discuss critical business challenges, strategies and solutions that many IT organizations face. We encourage attendee’s to share their expertise and discuss lessons learned as we dive into some of today’s biggest IT challenges.</p>',
				'venue_slug'	=> 'norris-conference-center-austin',
//				'sponsors'		=> Helpers::serialize([]),
				'tags'			=> 'austin,texas,it-strategies,information-technology,it-solutions',
//				'options'		=> Helpers::serialize(['link' => '0', 'hero' => true, 'title' => 'event:conference', 'jumbotron' => 'event:hero', 'countdown' => true, 'about' => true, 'partners' => true, 'agenda' => true, 'speakers' => true, 'sponsors' => true, 'sponsorlevels' => false, 'venue' => true]),
				'hero'			=> '/images/conferences/austin.jpg',
				'photo'			=> '/images/conferences/austin-portfolio.jpg',
				'published'		=> Carbon::create(2015, 09, 15, 14, 30, 00),
			]);

		// TAMPA 2017
        DB::table($this->_table)->insert([
				'slug'			=> '2017/tampa',
				'conference'	=> 'Tampa IT Strategies Conference',
				'city'			=> 'Tampa',
				'state'			=> 'FL',
				'start_date'	=> Carbon::create(2017, 2, 28, 0, 0, 0),
				'end_date'		=> Carbon::create(2017, 2, 28, 12, 59, 59),
				'timezone'		=> 'EST',
//				'coming'		=> 1,
				'about'			=> '<p><p>Our Tampa IT Strategies Conference fosters an exclusive environment for CIOs & Sr. level IT Executives of fortune 100-5000 companies and equivalent healthcare, education and local/state government entities that is conducive to learning, networking and sharing of information with their peers and colleagues giving them valuable insight and knowledge that they can use within their IT organizations.</p><p>Attendees have the opportunity to hear from Industry experts as they discuss critical business challenges, strategies and solutions that many IT organizations face. We encourage attendee’s to share their expertise and discuss lessons learned as we dive into some of today’s biggest IT challenges.</p>',
//				'sponsors'		=> Helpers::serialize([]),
				'tags'			=> 'tampa,florida,it-strategies,information-technology,it-solutions',
//				'options'		=> Helpers::serialize(['link' => '0', 'title' => 'event:conference', 'jumbotron' => 'event:hero', 'countdown' => true, 'about' => true, 'partners' => false, 'agenda' => true, 'speakers' => false, 'sponsors' => false, 'sponsorlevels' => false, 'venue' => true]),
				'hero'			=> '/images/conferences/tampa.jpg',
				'photo'			=> '/images/conferences/tampa-portfolio.jpg',
				'published'		=> Carbon::create(2015, 09, 15, 14, 30, 00),
			]);

		// SAN ANTONIO 2017
        DB::table($this->_table)->insert([
				'slug'			=> '2017/san-antonio',
				'conference'	=> 'San Antonio IT Strategies Conference',
				'city'			=> 'San Antonio',
				'state'			=> 'TX',
				'start_date'	=> Carbon::create(2017, 5, 31, 0, 0, 0),
				'end_date'		=> Carbon::create(2017, 5, 31, 23, 59, 59),
				'timezone'		=> 'CDT',
//				'coming'		=> 1,
				'about'			=> '<p>Our San Antonio IT Strategies Conference fosters an exclusive environment for CIOs & Sr. level IT Executives of fortune 100-5000 companies and equivalent healthcare, education and local/state government entities that is conducive to learning, networking and sharing of information with their peers and colleagues giving them valuable insight and knowledge that they can use within their IT organizations.</p><p>Attendees have the opportunity to hear from Industry experts as they discuss critical business challenges, strategies and solutions that many IT organizations face. We encourage attendee’s to share their expertise and discuss lessons learned as we dive into some of today’s biggest IT challenges.</p>',
//				'sponsors'		=> Helpers::serialize([]),
				'tags'			=> 'san-antonio,texas,it-strategies,information-technology,it-solutions',
//				'options'		=> Helpers::serialize(['link' => '0', 'title' => 'event:conference', 'jumbotron' => 'event:hero', 'countdown' => true, 'about' => true, 'partners' => false, 'agenda' => true, 'speakers' => false, 'sponsors' => false, 'sponsorlevels' => false, 'venue' => true]),
				'hero'			=> '/images/conferences/san-antonio.jpg',
				'photo'			=> '/images/conferences/san-antonio-portfolio.jpg',
				'published'		=> Carbon::create(2016, 5, 24, 16, 30, 00),
			]);

		// AUSTIN 2017
        DB::table($this->_table)->insert([
				'slug'			=> '2017/austin',
				'conference'	=> 'Austin IT Strategies Conference',
				'city'			=> 'Austin',
				'state'			=> 'TX',
				'start_date'	=> Carbon::create(2017, 9, 21, 7, 30, 0),
				'end_date'		=> Carbon::create(2017, 9, 21, 16, 30, 0),
				'timezone'		=> 'CDT',
//				'coming'		=> 1,
				'about'			=> '<p>Our Austin IT Strategies Conference fosters an exclusive environment for CIOs & Sr. level IT Executives of fortune 100-5000 companies and equivalent healthcare, education and local/state government entities that is conducive to learning, networking and sharing of information with their peers and colleagues giving them valuable insight and knowledge that they can use within their IT organizations.</p><p>Attendees have the opportunity to hear from Industry experts as they discuss critical business challenges, strategies and solutions that many IT organizations face. We encourage attendee’s to share their expertise and discuss lessons learned as we dive into some of today’s biggest IT challenges.</p>',
//				'sponsors'		=> Helpers::serialize([]),
				'tags'			=> 'austin,texas,it-strategies,information-technology,it-solutions',
//				'options'		=> Helpers::serialize(['link' => '0', 'hero' => true, 'title' => 'event:conference', 'jumbotron' => 'event:hero', 'countdown' => true, 'about' => true, 'partners' => true, 'agenda' => true, 'speakers' => true, 'sponsors' => true, 'sponsorlevels' => false, 'venue' => true]),
				'hero'			=> '/images/conferences/austin.jpg',
				'photo'			=> '/images/conferences/austin-portfolio.jpg',
				'published'		=> Carbon::create(2016, 9, 21, 16, 30, 0),
			]);

		// TAMPA 2018
        DB::table($this->_table)->insert([
				'slug'			=> '2018/tampa',
				'conference'	=> 'Tampa IT Strategies Conference',
				'city'			=> 'Tampa',
				'state'			=> 'FL',
				'start_date'	=> Carbon::create(2018, 2, 28, 0, 0, 0),
				'end_date'		=> Carbon::create(2018, 2, 28, 12, 59, 59),
				'timezone'		=> 'EST',
//				'coming'		=> 1,
				'about'			=> '<p><p>Our Tampa IT Strategies Conference fosters an exclusive environment for CIOs & Sr. level IT Executives of fortune 100-5000 companies and equivalent healthcare, education and local/state government entities that is conducive to learning, networking and sharing of information with their peers and colleagues giving them valuable insight and knowledge that they can use within their IT organizations.</p><p>Attendees have the opportunity to hear from Industry experts as they discuss critical business challenges, strategies and solutions that many IT organizations face. We encourage attendee’s to share their expertise and discuss lessons learned as we dive into some of today’s biggest IT challenges.</p>',
//				'sponsors'		=> Helpers::serialize([]),
				'tags'			=> 'tampa,florida,it-strategies,information-technology,it-solutions',
//				'options'		=> Helpers::serialize(['link' => '0', 'title' => 'event:conference', 'jumbotron' => 'event:hero', 'countdown' => true, 'about' => true, 'partners' => false, 'agenda' => true, 'speakers' => false, 'sponsors' => false, 'sponsorlevels' => false, 'venue' => true]),
				'hero'			=> '/images/conferences/tampa.jpg',
				'photo'			=> '/images/conferences/tampa-portfolio.jpg',
				'published'		=> Carbon::create(2017, 2, 28, 12, 59, 59),
			]);


    }
}
