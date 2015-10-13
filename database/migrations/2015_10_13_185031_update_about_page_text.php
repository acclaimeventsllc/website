<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Page;

class UpdateAboutPageText extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Page::where('slug', '=', 'about')->update([
				'about'		=> '
					<p>Established in 2013, Acclaim Events was created to help Information Technology Executives find solutions too many of today’s critical business challenges. We were built on the premise that networking and the sharing of ideas among information technology leaders will help expand IT knowledge within the local community. With over 20 years of combined experience facilitating IT conferences, our Acclaim Events team knows what it takes to facilitate high quality, interactive and educational technology networking conferences. The core of our company is based and founded on the following principals:</p>

					<h3>Integrity</h3>
					<p>We believe in “saying what we do and doing what we say.” This creates a working relationship with our attendees and our sponsors so they always know what to expect when attending our conferences.</p>

					<h3>High Standards &amp; Expectations</h3>
					<p>“Our expectations are high and so should yours be.” We strive to have the highest quality topics, discussions and speakers at our conferences so that our attendees and sponsors are able to gain value from participation.</p>

					<h3>Sharing of Knowledge</h3>
					<p>The sharing of knowledge and information is a core principle of our organization, providing high quality educational information keeps our attendees coming back year after year.</p>
				',
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
		Page::where('slug', '=', 'about')->update([
				'about'		=> '
					<p>Established in 2012, Acclaim Events was created to help Business Technology Executives find solutions to many of today’s critical business challenges. We were built on the premise that networking and the sharing of ideas among technology leaders will help broaden and expand IT knowledge within the local community. With over 20 years of combined experience, our Acclaim Events team knows what it takes to facilitate high quality, interactive and educational technology networking conferences.</p>

					<p>IT Professionals are tasked with keeping corporate and private information secure, while embracing new ways of supporting and doing business. With technology advancing at an alarming rate, it can be challenging to keep up with many of the technological advances, trends and best practices that help to keep our organizations competitive and secure.</p>

					<p>Our IT Strategies Conferences foster an exclusive environment for CIOs &amp; Sr. level IT Executives that is conducive to learning, networking and sharing ideas with their peers; giving them valuable insight and knowledge that they can use within their organizations.</p>',
			]);
	}
}
