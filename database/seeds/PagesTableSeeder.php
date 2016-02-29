<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    protected $_table = 'pages';

    public function run()
    {

        // DELETING TABLE ENTRIES
        DB::table($this->_table)->delete();

        // ABOUT PAGE TEXT
        DB::table($this->_table)->insert([
                'slug'      => 'about',
				'about'		=> '
					<p>Established in 2013, Acclaim Events was created to help Information Technology Executives find solutions too many of today’s critical business challenges. We were built on the premise that networking and the sharing of ideas among information technology leaders will help expand IT knowledge within the local community. With over 20 years of combined experience facilitating IT conferences, our Acclaim Events team knows what it takes to facilitate high quality, interactive and educational technology networking conferences. The core of our company is based and founded on the following principals:</p>

					<h3>Integrity</h3>
					<p>We believe in “saying what we do and doing what we say.” This creates a working relationship with our attendees and our sponsors so they always know what to expect when attending our conferences.</p>

					<h3>High Standards &amp; Expectations</h3>
					<p>“Our expectations are high and so should yours be.” We strive to have the highest quality topics, discussions and speakers at our conferences so that our attendees and sponsors are able to gain value from participation.</p>

					<h3>Sharing of Knowledge</h3>
					<p>The sharing of knowledge and information is a core principle of our organization, providing high quality educational information keeps our attendees coming back year after year.</p>
				',
                'published' => Carbon::create(2015, 08, 28, 15, 05, 29),
            ]);
    }
}
