<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends ExtendedEloquentModel
{
    //
    protected $fillable = [
    	'slug',
        'about',
    	'options',
    	'published',
    ];

	protected $dates = [
		'published',
		'deleted_at',
	];

}
