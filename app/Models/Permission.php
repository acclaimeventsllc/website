<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends ExtendedEloquentModel
{
	
	//

	protected $fillable = [
		'published',
	];

	protected $dates = [
		'published',
		'deleted_at',
	];

}
