<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TopicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    protected $_table = 'topics';

    public function run()
    {

    	// INITAL PUBLISH DATE
		$published  = Carbon::create(2015, 12, 01, 12, 07, 29);

    	// DELETING TABLE ENTRIES
        DB::table($this->_table)->delete();


        // SAN ANTONIO 2016 TOPICS


        DB::table($this->_table)->insert([
			['conference_slug' => '2016/san-antonio', 'priority' => 1, 'title' => 'IT Strategy – Strategic Planning &amp; IT Alignment', 'published' => $published],
			['conference_slug' => '2016/san-antonio', 'priority' => 2, 'title' => 'Leadership – Building your Executive Team', 'published' => $published],
			['conference_slug' => '2016/san-antonio', 'priority' => 3, 'title' => 'Big Data Analytics', 'published' => $published],
			['conference_slug' => '2016/san-antonio', 'priority' => 4, 'title' => 'Enterprise Mobility', 'published' => $published],
			['conference_slug' => '2016/san-antonio', 'priority' => 5, 'title' => 'IT Transformation', 'published' => $published],
			['conference_slug' => '2016/san-antonio', 'priority' => 6, 'title' => 'Green Technologies', 'published' => $published],
			['conference_slug' => '2016/san-antonio', 'priority' => 7, 'title' => 'Business Intelligence', 'published' => $published],
			['conference_slug' => '2016/san-antonio', 'priority' => 8, 'title' => 'Cloud Computing', 'published' => $published],
			['conference_slug' => '2016/san-antonio', 'priority' => 9, 'title' => 'IoT', 'published' => $published],
			['conference_slug' => '2016/san-antonio', 'priority' => 10, 'title' => 'Information Security', 'published' => $published],
			['conference_slug' => '2016/san-antonio', 'priority' => 11, 'title' => 'Employee Retention and Recruitment', 'published' => $published],
			['conference_slug' => '2016/san-antonio', 'priority' => 12, 'title' => 'BYOD', 'published' => $published],
			['conference_slug' => '2016/san-antonio', 'priority' => 13, 'title' => 'Working with a Social Enabled Enterprise', 'published' => $published],
        ]);


        // AUSTIN 2016 TOPICS


        DB::table($this->_table)->insert([
			['conference_slug' => '2016/austin', 'priority' => 1, 'title' => 'IT Strategy – Strategic Planning &amp; IT Alignment', 'published' => $published],
			['conference_slug' => '2016/austin', 'priority' => 2, 'title' => 'Leadership – Building your Executive Team', 'published' => $published],
			['conference_slug' => '2016/austin', 'priority' => 3, 'title' => 'Big Data Analytics', 'published' => $published],
			['conference_slug' => '2016/austin', 'priority' => 4, 'title' => 'Enterprise Mobility', 'published' => $published],
			['conference_slug' => '2016/austin', 'priority' => 5, 'title' => 'IT Transformation', 'published' => $published],
			['conference_slug' => '2016/austin', 'priority' => 6, 'title' => 'Green Technologies', 'published' => $published],
			['conference_slug' => '2016/austin', 'priority' => 7, 'title' => 'Business Intelligence', 'published' => $published],
			['conference_slug' => '2016/austin', 'priority' => 8, 'title' => 'Cloud Computing', 'published' => $published],
			['conference_slug' => '2016/austin', 'priority' => 9, 'title' => 'IoT', 'published' => $published],
			['conference_slug' => '2016/austin', 'priority' => 10, 'title' => 'Information Security', 'published' => $published],
			['conference_slug' => '2016/austin', 'priority' => 11, 'title' => 'Employee Retention and Recruitment', 'published' => $published],
			['conference_slug' => '2016/austin', 'priority' => 12, 'title' => 'BYOD', 'published' => $published],
			['conference_slug' => '2016/austin', 'priority' => 13, 'title' => 'Working with a Social Enabled Enterprise', 'published' => $published],
        ]);

    }
}
