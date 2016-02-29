<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agenda extends ExtendedEloquentModel
{

	//

	protected $fillable = [
		'conference_slug',
		'timeslot',
		'priority',
		'session_type',
		'title',
		'title_short',
		'subtitle',
		'desc',
//		'tags',
		'speakers',
//		'options',
		'published',
	];

	protected $dates = [
		'timeslot',
		'published',
		'deleted_at',
	];

}
