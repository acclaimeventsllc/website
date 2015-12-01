<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topic extends ExtendedEloquentModel
{

	//

	protected $fillable = [
		'title',
		'published',
	];

	protected $dates = [
		'published',
		'deleted_at',
	];

}
