<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Benefit;

class UpdateBenefitsContent extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Benefit::find(1)->update([
				'title'			=> 'About our Conferences',
				'text'			=> '
					<p>Our IT Strategies Conferences foster an exclusive environment for CIOs & Sr. level IT Executives that is conducive to learning, networking and sharing of information with their peers and colleagues giving them valuable insight and knowledge that they can use within their IT organizations.  Attendees have the opportunity to hear from Industry experts as they discuss critical business challenges, strategies and solutions that many IT organizations face. We encourage attendee’s to share their expertise and discuss lessons learned as we dive into some of today’s biggest IT challenges.</p>',
			]);

		Benefit::find(2)->update([
				'title'			=> 'Networking',
				'text'			=> '<p>Networking and the sharing of valuable information is what really makes our events stand out. Many of our colleagues have faced similar challenges to ones that you may currently be working with. Being able to sit down and talk with them, one on one, about their experiences, what worked and what did not, can provide valuable insight into finding a solution to your current challenges at hand.</p>',
			]);

		Benefit::find(3)->update([
				'title'			=> 'Our attendees',
				'text'			=> '<p>Our attendee’s consist of CIOs & Sr. Level IT Executives (director level and above) of fortune 100-5000 companies and organizations of equivalent size and scope. Attendees will represent multiple vertical markets including retail, manufacturing, finance, insurance, healthcare, education and state and local government entities.</p>',
			]);

		Benefit::find(4)->update([
				'title'			=> 'Event Topics &amp; Presentations',
				'text'			=> '<p>We work closely with our advisors to ensure that our topics and discussions are current, on point and address critical challenges that are being faced by IT Professionals within the local community.</p>',
			]);

		Benefit::find(5)->update([
				'title'			=> 'Our Partners',
				'text'			=> '<p>We work to align ourselves with local IT support groups and IT professionals who are dedicated to promoting IT within the local community.  These groups are working to promote IT within the local community through the sharing of knowledge and information and educational scholarships; thus building our next generation of IT professionals.</p>',
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

		Benefit::find(1)->update([
				'title'				=> 'Intro',
				'text'				=> 'Our attendee’s consist of CIOs, CTOs SVPs &amp; VPs of IT, IT Directors and Sr. Level IT Executives of fortune 100-5000 companies and equivalent healthcare, government, Financial and educational organizations. We will have multiple vertical markets represented at the event, including retail, manufacturing, financial, insurance, healthcare, education, and local and state government entities.',
			]);

		Benefit::find(2)->update([
				'title'				=> 'Networking',
				'text'				=> 'Networking is what makes our events work. Many of your peers have faced similar challenges to ones that you may currently be working with. Being able to draw from their experiences, expertise and hearing what worked and what did not, can provide valuable insight as to the next steps or solution that you use.',
			]);

		Benefit::find(3)->update([
				'title'				=> 'Event Topics',
				'text'				=> 'We work to ensure that our topics are current and address critical challenges and issues being faced by local IT Professionals in the community. The topics are then reviewed throughout the year to ensure that they are current, on point and appropriately address the needs of our Executive level IT audience.',
			]);

		Benefit::find(4)->update([
				'title'				=> 'Panels &amp; Presenters',
				'text'				=> 'Our Panelists &amp; Presenters will consist of IT Leaders from the local community and Industry Experts who are knowledgeable, passionate and can bring value to the topics being discussed.',
			]);

		Benefit::find(5)->update([
				'title'				=> 'Our Partners',
				'text'				=> 'In each region, we align ourselves with local IT Support Groups, User Groups and IT Professionals who are working to promote IT to the local Community. We encourage you to network with these groups at the event and get involved as they have a big impact on promoting IT throughout the local community.',
			]);
	}
}
