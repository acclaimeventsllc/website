<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends ExtendedEloquentModel
{

	//

	protected $fillable = [
		'author',
		'title',
		'company',
		'quote',
		'photo',
		'published',
	];

	protected $dates = [
		'published',
		'deleted_at',
	];

}
