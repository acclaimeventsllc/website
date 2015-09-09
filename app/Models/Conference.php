<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conference extends ExtendedEloquentModel
{
	//
	protected $fillable = [
		'slug',
		'conference',
		'city',
		'state',
		'start_date',
		'end_date',
		'timezone',
		'coming',
		'about',
		'partners',
		'venue_id',
		'sponsors',
		'tags',
		'options',
		'hero',
		'photo',
		'publish_on',
		'published',
	];

	protected $dates = [
		'start_date',
		'end_date',
		'published',
		'deleted_at',
	];

}
