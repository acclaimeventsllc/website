<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Navigation extends ExtendedEloquentModel
{

	//

	protected $fillable = [
		'menu',
		'class',
		'href',
		'content',
		'title',
		'option',
		'priority',
		'published',
	];

	protected $dates = [
		'published',
		'deleted_at',
	];

}
