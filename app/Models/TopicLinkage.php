<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TopicLinkage extends ExtendedEloquentModel
{

	//

	protected $table = 'topics_conference_linkage';

	protected $fillable = [
		'conference_id',
		'topic_id',
		'published',
	];

	protected $dates = [
		'published',
		'deleted_at',
	];

}
