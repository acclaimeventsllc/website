<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topic extends ExtendedEloquentModel
{

	//

	protected $fillable = [
		'conference_slug',
		'title',
		'published',
	];

	protected $dates = [
		'published',
		'deleted_at',
	];

}
