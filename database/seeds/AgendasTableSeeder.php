<?php

use Illuminate\Database\Seeder;
use App\Models\Agenda;
use App\Helpers\Helpers;
use Carbon\Carbon;

class AgendasTableSeeder extends Seeder {
	
	public function run() {

		DB::table('agendas')->delete();

		/*

			Schema::create('agendas', function(Blueprint $table)
			{
				$table->increments('id');
				$table->integer('conference_id');
				$table->timestamp('timeslot');
				$table->integer('priority');
				$table->enum('type',['keynote','session','breakout','break'])->default('breakout');
				$table->string('title');
				$table->string('subtitle')->nullable();
				$table->text('desc')->nullable();
				$table->text('tags')->nullable();
				$table->text('speakers')->nullable();
				$table->text('options')->nullable();
				$table->timestamps();
				$table->timestamp('published')->default('0000-00-00 00:00:00');
				$table->softDeletes();
			});

			protected $fillable = [
				'conference_id',
				'timeslot',
				'priority',
				'type',
				'title',
				'title_short',
				'subtitle',
				'desc',
				'tags',
				'speakers',
				'options',
				'published',
			];

		*/


		/*****  AUSTIN IT STRATEGIES CONFERENCE 2015-09-15 *****/
		Agenda::create([
				'conference_id'	=> 1,
				'timeslot'		=> '2015-09-15 07:30:00',
				'priority'		=> 1,
				'type'			=> 'break',
				'title'			=> 'Networking Breakfast',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Agenda::create([
				'conference_id'	=> 1,
				'timeslot'		=> '2015-09-15 09:00:00',
				'priority'		=> 2,
				'type'			=> 'keynote',
				'title'			=> 'Analyzing Big Data – Using the Massive Volume of Information Collected',
				'title_short'	=> 'Analyzing Big Data',
				'desc'			=> '<p>Many organizations now have the ability to collect a massive amounts of structured and unstructured data every day. If companies are able to analyze and extract value from the information it can provide great insights and information about business trends. Join our experts as they discuss Big Data, some of its uses and some of the challenges around analysis, capture, curation, storage and privacy/security of the information collected.</p>',
				'speakers'		=> Helpers::serialize(['moderator' => ['sturm-mike'], 'panelist' => ['bhattacharjee-dave']]),
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Agenda::create([
				'conference_id'	=> 1,
				'timeslot'		=> '2015-09-15 10:00:00',
				'priority'		=> 3,
				'type'			=> 'break',
				'title'			=> 'Networking Break',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Agenda::create([
				'conference_id'	=> 1,
				'timeslot'		=> '2015-09-15 10:30:00',
				'priority'		=> 4,
				'type'			=> 'session',
				'title'			=> 'Enterprise Mobility – Embracing BYOD While Keeping your Information Secure',
				'title_short'	=> 'Enterprise Mobility',
				'desc'			=> '<p>Today’s workforce has an expectation that they will be able to access to information through a multitude of various devices, applications and infrastructures. We as IT Leaders need to be able to have policies in place that will accommodate the mobile workforce while maintaining information security. Join our experts as they discuss various strategies, policies and best practices that they have implemented to deal with the ever increasing number of mobile users within their organization.</p>',
				'speakers'		=> Helpers::serialize(['speaker' => ['brewer-bob']]),
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Agenda::create([
				'conference_id'	=> 1,
				'timeslot'		=> '2015-09-15 10:30:00',
				'priority'		=> 5,
				'type'			=> 'breakout',
				'title'			=> 'Application Modernization',
				'title_short'	=> 'Application Modernization',
				'speakers'		=> Helpers::serialize(['panelist' => ['cook-dana', 'waldo-jay', 'rios-george']]),
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Agenda::create([
				'conference_id'	=> 1,
				'timeslot'		=> '2015-09-15 11:30:00',
				'priority'		=> 6,
				'type'			=> 'break',
				'title'			=> 'Networking Break',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Agenda::create([
				'conference_id'	=> 1,
				'timeslot'		=> '2015-09-15 14:30:00',
				'priority'		=> 7,
				'type'			=> 'session',
				'title'			=> 'Business Continuity Disaster Recovery',
				'title_short'	=> 'Business Continuity Disaster Recovery',
				'speakers'		=> Helpers::serialize(['panelist' => ['fernandes-andrew']]),
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Agenda::create([
				'conference_id'	=> 1,
				'timeslot'		=> '2015-09-15 11:45:00',
				'priority'		=> 11,
				'type'			=> 'breakout',
				'title'			=> 'U.S. Secret Service vs. Cyber Criminals',
				'title_short'	=> 'U.S. Secret Service',
				'desc'			=> '<p>The U.S. Secret Service was established in 1865 to protect our nation\'s currency from counterfeiters. Today, the agency\'s investigative mission has evolved to combat cyber crime targeting U.S. banking infrastructure - specifically financial institutions and payment systems.  This briefing will provide an overview of the capabilities and efforts of the public/private/academic partnerships forged at the U.S. Secret Service Electronic Crimes Task Forces throughout the world.   As well as, current trends in cyber crime, related intelligence sharing, and examples of previous cyber case work by the agency.</p>',
				'speakers'		=> Helpers::serialize(['speaker' => ['edwards-tom']]),
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Agenda::create([
				'conference_id'	=> 1,
				'timeslot'		=> '2015-09-15 12:45:00',
				'priority'		=> 9,
				'type'			=> 'keynote',
				'title'			=> 'Innovative Strategic Planning – Aligning IT Strategy to the Needs of the Business',
				'title_short'	=> 'Innovative Strategic Planning',
				'desc'			=> '<p>Integrating IT initiatives with the business strategy can often be challenging and complex. The speed of business and access to countless software applications and more connected networks make keeping company information secure a major challenge. IT continues to be under pressure to drive productivity and enable innovation, in many cases with fewer dollars.</p><p>Join our experts in discussion as they talk about some innovative ways to help integrate your IT strategy to meet the needs of the business while maintaining a high level of security.</p>',
				'speakers'		=> Helpers::serialize(['moderator' => ['martin-jeff'], 'panelist' => ['smedley-jeff','flay-gregory','johnson-rani','parnell-lawanda']]),
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Agenda::create([
				'conference_id'	=> 1,
				'timeslot'		=> '2015-09-15 14:15:00',
				'priority'		=> 10,
				'type'			=> 'break',
				'title'			=> 'Networking Break',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Agenda::create([
				'conference_id'	=> 1,
				'timeslot'		=> '2015-09-15 11:45:00',
				'priority'		=> 8,
				'type'			=> 'breakout',
				'title'			=> 'Clouds the Limit – Efficiency, Functionality, Security',
				'title_short'	=> 'Clouds the Limit',
				'desc'			=> '<p>Taking your organizations information to the Cloud can have a huge impact on the way that it functions and does business. Information security, shared data policies and privacy can all play a big part when taking your information to the cloud. Join our experts as they discuss some of the challenges, benefits and best practices they use when working with Public and Private Clouds.</p>',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Agenda::create([
				'conference_id'	=> 1,
				'timeslot'		=> '2015-09-15 14:30:00',
				'priority'		=> 12,
				'type'			=> 'breakout',
				'title'			=> 'Information Security – Is your Business Under Attack?',
				'title_short'	=> 'Information Security',
				'desc'			=> '<p>Information Security is one of the biggest things that can keep a CIO up at night. We are always looking for ways to better protect company information and assets while trying to prevent data breaches, hacks and insider threats. Our experts will address risk assessment, governance, and other best practice strategies that can be used to minimize putting your organizations information at risk.</p>',
				'speakers'		=> Helpers::serialize(['moderator' => ['moore-larry'], 'panelist' => ['botts-michael','nather-wendy','yoder-marc']]),
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Agenda::create([
				'conference_id'	=> 1,
				'timeslot'		=> '2015-09-15 15:30:00',
				'priority'		=> 13,
				'type'			=> 'break',
				'title'			=> 'Networking Break',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Agenda::create([
				'conference_id'	=> 1,
				'timeslot'		=> '2015-09-15 15:45:00',
				'priority'		=> 14,
				'type'			=> 'keynote',
				'title'			=> 'The CIO Perspective – A High Level Discussion with Local CIOs',
				'title_short'	=> 'The CIO Perspective',
				'desc'			=> '<p>Join our closing keynote panel of local CIOs as they discuss challenges that they have faced within their organizations and some of the solutions, policies and strategies that have been put in place to help embrace organizational growth and efficiency.</p>',
				'speakers'		=> Helpers::serialize(['moderator' => ['dominguez-jake'], 'panelist' => ['brandt-scott','neill-robert','bowers-evan','bynum-andy']]),
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);


		/*****  SAN ANTONIO IT STRATEGIES CONFERENCE (DATE TBD) *****/
		Agenda::create([
				'conference_id'	=> 2,
				'timeslot'		=> '2015-09-15 07:30:00',
				'priority'		=> 1,
				'type'			=> 'break',
				'title'			=> 'Networking Breakfast',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Agenda::create([
				'conference_id'	=> 2,
				'timeslot'		=> '2015-09-15 09:00:00',
				'priority'		=> 2,
				'type'			=> 'keynote',
				'title'			=> 'Keynote',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Agenda::create([
				'conference_id'	=> 2,
				'timeslot'		=> '2015-09-15 10:00:00',
				'priority'		=> 3,
				'type'			=> 'break',
				'title'			=> 'Networking Break',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Agenda::create([
				'conference_id'	=> 2,
				'timeslot'		=> '2015-09-15 10:30:00',
				'priority'		=> 4,
				'type'			=> 'session',
				'title'			=> 'Breakout',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Agenda::create([
				'conference_id'	=> 2,
				'timeslot'		=> '2015-09-15 10:30:00',
				'priority'		=> 5,
				'type'			=> 'breakout',
				'title'			=> 'Breakout',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Agenda::create([
				'conference_id'	=> 2,
				'timeslot'		=> '2015-09-15 11:30:00',
				'priority'		=> 6,
				'type'			=> 'break',
				'title'			=> 'Networking Break',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Agenda::create([
				'conference_id'	=> 2,
				'timeslot'		=> '2015-09-15 11:45:00',
				'priority'		=> 7,
				'type'			=> 'session',
				'title'			=> 'Breakout',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Agenda::create([
				'conference_id'	=> 2,
				'timeslot'		=> '2015-09-15 11:45:00',
				'priority'		=> 8,
				'type'			=> 'breakout',
				'title'			=> 'Breakout',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Agenda::create([
				'conference_id'	=> 2,
				'timeslot'		=> '2015-09-15 12:45:00',
				'priority'		=> 9,
				'type'			=> 'keynote',
				'title'			=> 'Keynote',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Agenda::create([
				'conference_id'	=> 2,
				'timeslot'		=> '2015-09-15 14:15:00',
				'priority'		=> 10,
				'type'			=> 'break',
				'title'			=> 'Networking Break',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Agenda::create([
				'conference_id'	=> 2,
				'timeslot'		=> '2015-09-15 14:30:00',
				'priority'		=> 11,
				'type'			=> 'session',
				'title'			=> 'Breakout',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Agenda::create([
				'conference_id'	=> 2,
				'timeslot'		=> '2015-09-15 14:30:00',
				'priority'		=> 12,
				'type'			=> 'breakout',
				'title'			=> 'Breakout',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Agenda::create([
				'conference_id'	=> 2,
				'timeslot'		=> '2015-09-15 15:30:00',
				'priority'		=> 13,
				'type'			=> 'break',
				'title'			=> 'Networking Break',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Agenda::create([
				'conference_id'	=> 2,
				'timeslot'		=> '2015-09-15 15:45:00',
				'priority'		=> 14,
				'type'			=> 'keynote',
				'title'			=> 'Keynote',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);


		/*****  TAMPA IT STRATEGIES CONFERENCE (DATE TBD) *****/
		Agenda::create([
				'conference_id'	=> 3,
				'timeslot'		=> '2015-09-15 07:30:00',
				'priority'		=> 1,
				'type'			=> 'break',
				'title'			=> 'Networking Breakfast',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Agenda::create([
				'conference_id'	=> 3,
				'timeslot'		=> '2015-09-15 09:00:00',
				'priority'		=> 2,
				'type'			=> 'keynote',
				'title'			=> 'Keynote',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Agenda::create([
				'conference_id'	=> 3,
				'timeslot'		=> '2015-09-15 10:00:00',
				'priority'		=> 3,
				'type'			=> 'break',
				'title'			=> 'Networking Break',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Agenda::create([
				'conference_id'	=> 3,
				'timeslot'		=> '2015-09-15 10:30:00',
				'priority'		=> 4,
				'type'			=> 'session',
				'title'			=> 'Breakout',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Agenda::create([
				'conference_id'	=> 3,
				'timeslot'		=> '2015-09-15 10:30:00',
				'priority'		=> 5,
				'type'			=> 'breakout',
				'title'			=> 'Breakout',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Agenda::create([
				'conference_id'	=> 3,
				'timeslot'		=> '2015-09-15 11:30:00',
				'priority'		=> 6,
				'type'			=> 'break',
				'title'			=> 'Networking Break',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Agenda::create([
				'conference_id'	=> 3,
				'timeslot'		=> '2015-09-15 11:45:00',
				'priority'		=> 7,
				'type'			=> 'session',
				'title'			=> 'Breakout',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Agenda::create([
				'conference_id'	=> 3,
				'timeslot'		=> '2015-09-15 11:45:00',
				'priority'		=> 8,
				'type'			=> 'breakout',
				'title'			=> 'Breakout',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Agenda::create([
				'conference_id'	=> 3,
				'timeslot'		=> '2015-09-15 12:45:00',
				'priority'		=> 9,
				'type'			=> 'keynote',
				'title'			=> 'Keynote',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Agenda::create([
				'conference_id'	=> 3,
				'timeslot'		=> '2015-09-15 14:15:00',
				'priority'		=> 10,
				'type'			=> 'break',
				'title'			=> 'Networking Break',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Agenda::create([
				'conference_id'	=> 3,
				'timeslot'		=> '2015-09-15 14:30:00',
				'priority'		=> 11,
				'type'			=> 'session',
				'title'			=> 'Breakout',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Agenda::create([
				'conference_id'	=> 3,
				'timeslot'		=> '2015-09-15 14:30:00',
				'priority'		=> 12,
				'type'			=> 'breakout',
				'title'			=> 'Breakout',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Agenda::create([
				'conference_id'	=> 3,
				'timeslot'		=> '2015-09-15 15:30:00',
				'priority'		=> 13,
				'type'			=> 'break',
				'title'			=> 'Networking Break',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Agenda::create([
				'conference_id'	=> 3,
				'timeslot'		=> '2015-09-15 15:45:00',
				'priority'		=> 14,
				'type'			=> 'keynote',
				'title'			=> 'Keynote',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);


	}

}