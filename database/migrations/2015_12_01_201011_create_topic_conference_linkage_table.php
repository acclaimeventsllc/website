<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\Carbon;
use App\Models\TopicLinkage;

class CreateTopicConferenceLinkageTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('topics_conference_linkage', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('conference_id');
			$table->integer('topic_id');
			$table->timestamps();
			$table->timestamp('published')->nullable();
			$table->softDeletes();
		});

		$published	= Carbon::create(2015, 12, 01, 12, 07, 29);

		// San Antonio 2016
		$data		= [
			['conference_id' => 2, 'topic_id' => 1, 'published' => $published],
			['conference_id' => 2, 'topic_id' => 2, 'published' => $published],
			['conference_id' => 2, 'topic_id' => 3, 'published' => $published],
			['conference_id' => 2, 'topic_id' => 4, 'published' => $published],
			['conference_id' => 2, 'topic_id' => 5, 'published' => $published],
			['conference_id' => 2, 'topic_id' => 6, 'published' => $published],
			['conference_id' => 2, 'topic_id' => 7, 'published' => $published],
			['conference_id' => 2, 'topic_id' => 8, 'published' => $published],
			['conference_id' => 2, 'topic_id' => 9, 'published' => $published],
			['conference_id' => 2, 'topic_id' => 10, 'published' => $published],
			['conference_id' => 2, 'topic_id' => 11, 'published' => $published],
			['conference_id' => 2, 'topic_id' => 12, 'published' => $published],
			['conference_id' => 2, 'topic_id' => 13, 'published' => $published],
		];
		TopicLinkage::insert($data);

		// Austin 2016
		$data 		= [
			['conference_id' => 3, 'topic_id' => 1, 'published' => $published],
			['conference_id' => 3, 'topic_id' => 2, 'published' => $published],
			['conference_id' => 3, 'topic_id' => 3, 'published' => $published],
			['conference_id' => 3, 'topic_id' => 4, 'published' => $published],
			['conference_id' => 3, 'topic_id' => 5, 'published' => $published],
			['conference_id' => 3, 'topic_id' => 6, 'published' => $published],
			['conference_id' => 3, 'topic_id' => 7, 'published' => $published],
			['conference_id' => 3, 'topic_id' => 8, 'published' => $published],
			['conference_id' => 3, 'topic_id' => 9, 'published' => $published],
			['conference_id' => 3, 'topic_id' => 10, 'published' => $published],
			['conference_id' => 3, 'topic_id' => 11, 'published' => $published],
			['conference_id' => 3, 'topic_id' => 12, 'published' => $published],
			['conference_id' => 3, 'topic_id' => 13, 'published' => $published],
		];
		TopicLinkage::insert($data);
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('topics_conference_linkage');
	}
}
