<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class BenefitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    protected $_table = 'benefits';

    public function run()
    {

    	// INITIAL PUBLISH DATE
    	$published = Carbon::create(2015, 08, 28, 15, 05, 29);

    	// DELETING TABLE ENTRIES
        DB::table($this->_table)->delete();

    	// BENEFITS
        DB::table($this->_table)->insert([
        	[
				'title'				=> 'About our Conferences',
				'text'				=> '<p>Our IT Strategies Conferences foster an exclusive environment for CIOs & Sr. level IT Executives that is conducive to learning, networking and sharing of information with their peers and colleagues giving them valuable insight and knowledge that they can use within their IT organizations.  Attendees have the opportunity to hear from Industry experts as they discuss critical business challenges, strategies and solutions that many IT organizations face. We encourage attendee’s to share their expertise and discuss lessons learned as we dive into some of today’s biggest IT challenges.</p>',
				'priority'			=> 0,
				'reason'			=> 0,
				'published'			=> $published,
			],
			[
				'title'				=> 'Networking',
				'text'				=> '<p>Networking and the sharing of valuable information is what really makes our events stand out. Many of our colleagues have faced similar challenges to ones that you may currently be working with. Being able to sit down and talk with them, one on one, about their experiences, what worked and what did not, can provide valuable insight into finding a solution to your current challenges at hand.</p>',
				'priority'			=> 1,
				'reason'			=> 1,
				'published'			=> $published,
			],
			[
				'title'				=> 'Our attendees',
				'text'				=> '<p>Our attendee’s consist of CIOs & Sr. Level IT Executives (director level and above) of fortune 100-5000 companies and organizations of equivalent size and scope. Attendees will represent multiple vertical markets including retail, manufacturing, finance, insurance, healthcare, education and state and local government entities.</p>',
				'priority'			=> 2,
				'reason'			=> 1,
				'published'			=> $published,
			],
			[
				'title'				=> 'Topics &amp; Presentations',
				'text'				=> '<p>We work closely with our advisors to ensure that our topics and discussions are current, on point and address critical challenges that are being faced by IT Professionals within the local community.</p>',
				'priority'			=> 3,
				'reason'			=> 1,
				'published'			=> $published,
			],
			[
				'title'				=> 'Our Partners',
				'text'				=> '<p>We work to align ourselves with local IT support groups and IT professionals who are dedicated to promoting IT within the local community.  These groups are working to promote IT within the local community through the sharing of knowledge and information and educational scholarships; thus building our next generation of IT professionals.</p>',
				'priority'			=> 4,
				'reason'			=> 1,
				'published'			=> $published,
			],
		]);

    }
}
