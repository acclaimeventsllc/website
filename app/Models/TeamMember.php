<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamMember extends ExtendedEloquentModel
{

	//

	protected $fillable = [
		'first_name',
		'last_name',
		'slug',
		'title',
		'email',
		'bio',
		'priority',
		'photo',
		'published',
	];

	protected $dates = [
		'published',
		'deleted_at',
	];

}
