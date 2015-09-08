<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends ExtendedEloquentModel
{

	//

	protected $table = 'registrations';

	protected $fillable = [
		'conference',
		'attendance',
		'email',
		'phone',
		'first_name',
		'last_name',
		'title',
		'company',
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
