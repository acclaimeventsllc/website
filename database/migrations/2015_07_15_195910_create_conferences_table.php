<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\Carbon;
use App\Helpers\Helpers;
use App\Models\Conference;

class CreateConferencesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('conferences', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('slug');
			$table->string('conference');
			$table->string('city');
			$table->string('state');
			$table->datetime('start_date');
			$table->timestamp('end_date');
			$table->string('timezone',3)->nullable();
			$table->tinyInteger('coming')->default(0);
			$table->text('about')->nullable();
			$table->text('partners')->nullable();
			$table->string('venue_slug')->nullable();
			$table->text('sponsors')->nullable();
			$table->text('tags')->nullable();
			$table->text('options')->nullable();
			$table->string('hero')->nullable();
			$table->string('photo')->nullable();
			$table->timestamps();
			$table->timestamp('published')->nullable();
			$table->softDeletes();
		});

		Conference::create([
				'slug'			=> 'austin',
				'conference'	=> 'Austin IT Strategies Conference',
				'city'			=> 'Austin',
				'state'			=> 'TX',
				'start_date'	=> Carbon::create(2015, 9, 15, 7, 30, 0),
				'end_date'		=> Carbon::create(2015, 9, 15, 16, 30, 0),
				'timezone'		=> 'CDT',
				'coming'		=> 'September 2015',
				'about'			=> '<p>Our Austin IT Strategies Conference will bring together CIOs, CTOs SVPs &#038; VPs of IT, IT Directors and Sr. Level IT Leaders of fortune 100-5000 companies and equivalent healthcare, government and educational entities in the greater Austin Region.  Our attendee’s will have the opportunity to hear from Industry experts, network with their peers and discuss critical challenges and issues that they face within their organizations.  We encourage our attendee’s to share and discuss their lessons learned, knowledge and insight as we dive into some of today’s biggest IT challenges.</p><p>We strive to produce content-rich presentations that will provide answers to many of today’s business challenges and hope that you will be able to gain practical knowledge and insights that you can then use within your own organization.</p>',
				'partners'		=> Helpers::serialize(['partners' => ['tagitm'], 'text' => '<p><strong>We are proud to be able to partner with TAGITM for the 2015 Austin IT Strategies Conference.</strong></p>']),
				'venue_slug'	=> 'texas-austin-crown-plaza-austin',
				'sponsors'		=> Helpers::serialize(['emerald' => ['cylance', 'dynatrace', 'forsythe', 'hitachi', 'workday', 'mcci', 'good', '2fa', 'nimble-storage', 'secure-nation', 'windstream', 'arbor-networks']]),
				'tags'			=> 'austin-it-strategies-2015,austin,texas,it-strategies,information-technology,it-solutions',
				'options'		=> Helpers::serialize(['link' => '0', 'hero' => true, 'title' => 'event:conference', 'jumbotron' => 'event:hero', 'countdown' => true, 'about' => true, 'partners' => true, 'agenda' => true, 'speakers' => true, 'sponsors' => true, 'sponsorlevels' => false, 'venue' => true]),
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
				'sponsors'		=> Helpers::serialize(['acclaim-events']),
				'tags'			=> 'san-antonio,texas,it-strategies,information-technology,it-solutions',
				'options'		=> Helpers::serialize(['link' => '0', 'title' => 'event:conference', 'jumbotron' => 'event:hero', 'countdown' => true, 'about' => true, 'partners' => false, 'agenda' => true, 'speakers' => false, 'sponsors' => false, 'sponsorlevels' => false, 'venue' => true]),
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
				'options'		=> Helpers::serialize(['link' => '0', 'title' => 'event:conference', 'jumbotron' => 'event:hero', 'countdown' => true, 'about' => true, 'partners' => false, 'agenda' => true, 'speakers' => false, 'sponsors' => false, 'sponsorlevels' => false, 'venue' => true]),
				'hero'			=> '/images/conferences/tampa.jpg',
				'photo'			=> '/images/conferences/tampa-portfolio.jpg',
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
		Schema::drop('conferences');
	}

}
