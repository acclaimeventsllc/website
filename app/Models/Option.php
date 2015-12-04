<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends ExtendedEloquentModel
{

	//

	protected $fillable = [
		'slug',
		'option',
		'value',
		'serialized',
		'published',
	];

	protected $dates = [
		'published',
		'deleted_at',
	];

}
