<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class ExtendedEloquentModel extends Model
{

	public function scopePublished($query)
	{
		return $query
				->whereNotNull('published')
				->where('published', '<=', Carbon::now());
	}

	public function scopeUnpublished($query)
	{
		return $query
				->whereNull('published')
				->orWhere('published', '>', Carbon::now());
	}

	public function scopeActivated($query)
	{
		return $query->whereNotNull('activated');
	}

	public function scopeUnactivated($query)
	{
		return $query->whereNull('activated');
	}

}