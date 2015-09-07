<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends ExtendedEloquentModel
{

	//

	protected $fillable = [
		'first_name',
		'last_name',
		'title',
		'company',
		'email',
		'phone',
		'street',
		'city',
		'state',
		'postal',
		'referrals',
		'stage',
		'accepted',
	];

	protected $dates = [
		'accepted',
		'deleted_at',
	];

}
