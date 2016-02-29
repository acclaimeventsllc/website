<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConferenceSponsor extends ExtendedEloquentModel
{

	//

	protected $table = 'conference_sponsors';

	protected $fillable = [
		'conference_slug',
		'sponsor_slug',
		'sponsorship',
		'published',
	];

	protected $dates = [
		'published',
		'deleted_at',
	];

}
