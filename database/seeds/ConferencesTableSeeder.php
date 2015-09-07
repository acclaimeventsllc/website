<?php

use Illuminate\Database\Seeder;
use App\Models\Conference;
use App\Helpers\Helpers;
use Carbon\Carbon;

class ConferencesTableSeeder extends Seeder {
	
	public function run() {

		DB::table('conferences')->delete();

		/*

			Schema::create('conferences', function(Blueprint $table)
			{
				$table->increments('id');
				$table->string('slug');
				$table->string('conference');
				$table->timestamp('start_date')->default('0000-00-00 00:00:00');
				$table->timestamp('end_date')->default('0000-00-00 00:00:00');
				$table->string('timezone',3)->nullable();
				$table->tinyInteger('coming')->default(0);
				$table->text('about')->nullable();
				$table->integer('venue_id')->nullable();
				$table->text('sponsors')->nullable();
				$table->text('tags')->nullable();
				$table->text('options')->nullable();
				$table->string('hero')->nullable();
				$table->string('photo')->nullable();
				$table->timestamps();
				$table->timestamp('publish_on')->default('0000-00-00 00:00:00');
				$table->timestamp('published')->default('0000-00-00 00:00:00');
				$table->softDeletes();
			});

			protected $fillable = [
				'slug',
				'conference',
				'start_date',
				'end_date',
				'timezone',
				'coming',
				'about',
				'venue_id',
				'sponsors',
				'tags',
				'options',
				'hero',
				'photo',
				'publish_on',
				'published',
			];

		*/

		Conference::create([
				'slug'			=> 'austin',
				'conference'	=> 'Austin IT Strategies Conference',
				'city'			=> 'Austin',
				'state'			=> 'TX',
				'start_date'	=> Carbon::create(2015, 9, 15, 7, 30, 0),
				'end_date'		=> Carbon::create(2015, 9, 31, 16, 30, 0),
				'timezone'		=> 'CDT',
				'coming'		=> 'September 2015',
				'about'			=> '<p>Our Austin IT Strategies Conference will bring together CIOs, CTOs SVPs &#038; VPs of IT, IT Directors and Sr. Level IT Leaders of fortune 100-5000 companies and equivalent healthcare, government and educational entities in the greater Austin Region.  Our attendee’s will have the opportunity to hear from Industry experts, network with their peers and discuss critical challenges and issues that they face within their organizations.  We encourage our attendee’s to share and discuss their lessons learned, knowledge and insight as we dive into some of today’s biggest IT challenges.</p><p>We strive to produce content-rich presentations that will provide answers to many of today’s business challenges and hope that you will be able to gain practical knowledge and insights that you can then use within your own organization.</p>',
				'partners'		=> Helpers::serialize(['partners' => ['tagitm'], 'text' => '<p><strong>We are proud to be able to partner with TAGITM for the 2015 Austin IT Strategies Conference.</strong></p>']),
				'venue_slug'	=> 'texas-austin-crown-plaza-austin',
				'sponsors'		=> Helpers::serialize(['cylance', 'dynatrace', 'forsythe', 'hitachi', 'workday', 'mcci']),
				'tags'			=> 'austin-it-strategies-2015,austin,texas,it-strategies,information-technology,it-solutions',
				'options'		=> Helpers::serialize(['link' => '0', 'hero' => true, 'title' => 'event:conference', 'jumbotron' => 'event:hero', 'countdown' => true, 'about' => true, 'partners' => true, 'agenda' => true, 'speakers' => true, 'sponsors' => true, 'venue' => true]),
				'hero'			=> '/images/conferences/austin.jpg',
				'photo'			=> '/images/conferences/austin-portfolio.jpg',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Conference::create([
				'slug'			=> 'san-antonio',
				'conference'	=> 'San Antonio IT Strategies Conference',
				'city'			=> 'San Antonio',
				'state'			=> 'TX',
				'start_date'	=> Carbon::create(2016, 5, 31, 0, 0, 0),
				'end_date'		=> Carbon::create(2016, 5, 31, 23, 59, 59),
				'timezone'		=> 'CDT',
				'coming'		=> 1,
				'about'			=> '<p>Our San Antonio IT Strategies Conference will bring together CIOs, CTOs SVPs &#038; VPs of IT, IT Directors and Sr. Level IT Leaders of fortune 100-5000 companies and equivalent healthcare, government and educational entities in the greater San Antonio Region.  Our attendee’s will have the opportunity to hear from Industry experts, network with their peers and discuss critical challenges and issues that they face within their organizations.  We encourage our attendee’s to share and discuss their lessons learned, knowledge and insight as we dive into some of today’s biggest IT challenges.</p><p>We strive to produce content-rich presentations that will provide answers to many of today’s business challenges and hope that you will be able to gain practical knowledge and insights that you can then use within your own organization.</p>',
				'venue_slug'	=> 'texas-san-antonio-san-antonio-something-or-other',
				'sponsors'		=> Helpers::serialize(['acclaim-events']),
				'tags'			=> 'san-antonio,texas,it-strategies,information-technology,it-solutions',
				'options'		=> Helpers::serialize(['link' => '0', 'title' => 'event:conference', 'jumbotron' => 'event:hero', 'countdown' => true, 'about' => true, 'partners' => false, 'agenda' => true, 'speakers' => false, 'sponsors' => false, 'venue' => true]),
				'hero'			=> '/images/conferences/san-antonio.jpg',
				'photo'			=> '/images/conferences/san-antonio-portfolio.jpg',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Conference::create([
				'slug'			=> 'tampa',
				'conference'	=> 'Tampa IT Strategies Conference',
				'city'			=> 'Tampa',
				'state'			=> 'FL',
				'start_date'	=> Carbon::create(2017, 2, 28, 0, 0, 0),
				'end_date'		=> Carbon::create(2017, 2, 28, 12, 59, 59),
				'timezone'		=> 'EST',
				'coming'		=> 1,
				'about'			=> '<p>Our Tampa IT Strategies Conference will bring together CIOs, CTOs SVPs &#038; VPs of IT, IT Directors and Sr. Level IT Leaders of fortune 100-5000 companies and equivalent healthcare, government and educational entities in the greater Tampa Region.  Our attendee’s will have the opportunity to hear from Industry experts, network with their peers and discuss critical challenges and issues that they face within their organizations.  We encourage our attendee’s to share and discuss their lessons learned, knowledge and insight as we dive into some of today’s biggest IT challenges.</p><p>We strive to produce content-rich presentations that will provide answers to many of today’s business challenges and hope that you will be able to gain practical knowledge and insights that you can then use within your own organization.</p>',
				'sponsors'		=> Helpers::serialize(['acclaim-events']),
				'tags'			=> 'tampa,florida,it-strategies,information-technology,it-solutions',
				'options'		=> Helpers::serialize(['link' => '0', 'title' => 'event:conference', 'jumbotron' => 'event:hero', 'countdown' => true, 'about' => true, 'partners' => false, 'agenda' => true, 'speakers' => false, 'sponsors' => false, 'venue' => true]),
				'hero'			=> '/images/conferences/tampa.jpg',
				'photo'			=> '/images/conferences/tampa-portfolio.jpg',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

	}

}