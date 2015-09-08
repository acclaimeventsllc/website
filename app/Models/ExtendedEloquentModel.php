<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class ExtendedEloquentModel extends Model
{

	use softDeletes;

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

	public function scopeUpcomingEvents($query)
	{
		return $query->where('start_date', '>', Carbon::now());
	}

	public function scopePastEvents($query)
	{
		return $query->where('end_date', '<', Carbon::now());
	}

}