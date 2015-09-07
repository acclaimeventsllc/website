<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Benefit extends ExtendedEloquentModel
{

	//

	protected $fillable = [
		'title',
		'text',
		'priority',
		'reason',
		'published',
	];

	protected $dates = [
		'published',
		'deleted_at',
	];

}
