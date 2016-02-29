<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Speaker extends ExtendedEloquentModel
{

	//

	protected $fillable = [
		'first_name',
		'last_name',
		'slug',
		'title',
		'title_short',
		'company',
		'bio',
		'tags',
//		'options',
		'contacts',
		'photo',
		'advisor',
		'published',
	];

	protected $dates = [
		'published',
		'deleted_at',
	];

}
