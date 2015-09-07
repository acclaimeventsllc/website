<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venue extends ExtendedEloquentModel
{

	//

	protected $fillable = [
		'venue',
		'place',
		'address',
		'coords',
		'directions',
		'contacts',
		'published',
	];

	protected $dates = [
		'published',
		'deleted_at',
	];

}
