<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\Carbon;
use App\Helpers\Helpers;
use App\Models\Topic;
use App\Models\Page;
use App\Models\Conference;

class CreateTopicsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
 
		Schema::create('topics', function (Blueprint $table) {
			$table->increments('id');
			$table->string('title');
			$table->timestamps();
			$table->timestamp('published')->nullable();
			$table->softDeletes();
		});

		// 2016 Topics
		$published  = Carbon::create(2015, 12, 01, 12, 07, 29);
		$data		= [
			['title' => 'IT Strategy – Strategic Planning &amp; IT Alignment', 'published' => $published],
			['title' => 'Leadership – Building your Executive Team', 'published' => $published],
			['title' => 'Big Data Analytics', 'published' => $published],
			['title' => 'Enterprise Mobility', 'published' => $published],
			['title' => 'IT Transformation', 'published' => $published],
			['title' => 'Green Technologies', 'published' => $published],
			['title' => 'Business Intelligence', 'published' => $published],
			['title' => 'Cloud Computing', 'published' => $published],
			['title' => 'IoT', 'published' => $published],
			['title' => 'Information Security', 'published' => $published],
			['title' => 'Employee Retention and Recruitment', 'published' => $published],
			['title' => 'BYOD', 'published' => $published],
			['title' => 'Working with a Social Enabled Enterprise', 'published' => $published],
		];
		Topic::insert($data);
/*
		$defaults	= [
			'show_topics'		=> '1',
			'topics_by_alpha'	=> '1',
			'past_conferences'	=> '0',
		];


		// Adding topics to page options with default value of true
		$page						= Page::where('slug', '=', 'conference')->first();
		$options					= Helpers::unserialize($page->options);
		$options['show_topics']		= $defaults['show_topics'];
		$options['topics_by_alpha']	= $defaults['topics_by_alpha'];
		$page->options				= Helpers::serialize($options);
		$page->save();


		// Making individual past conferences use default value of false
		if ($defaults['show_topics'] !== $defaults['past_conferences'])
		{
			$past	= Conference::where('end_date', '<', Carbon::now())->get();

			foreach ($past as $event)
			{
				$options 					= Helpers::unserialize($event->options);
				$options['show_topics']		= $defaults['past_conferences'];
				$event->options 			= Helpers::serialize($options);
				$event->save();
			}
		}
*/
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('topics');
	}
}
