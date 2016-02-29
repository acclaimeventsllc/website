<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends ExtendedEloquentModel
{
    //
    protected $fillable = [
    	'slug',
        'about',
    	'published',
    ];

	protected $dates = [
		'published',
		'deleted_at',
	];

}
