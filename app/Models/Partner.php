<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends ExtendedEloquentModel
{

	//

	protected $fillable = [
		'slug',
		'company',
		'website',
		'slogan',
		'bio',
		'tags',
//		'options',
//		'contacts',
		'photo',
		'published',
	];

	protected $dates = [
		'published',
		'deleted_at',
	];

}
