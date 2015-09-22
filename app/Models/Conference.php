<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use Carbon\Carbon;

class Conference extends ExtendedEloquentModel
{
	//
	protected $fillable = [
		'slug',
		'conference',
		'city',
		'state',
		'start_date',
		'end_date',
		'timezone',
		'coming',
		'about',
		'partners',
		'venue_slug',
		'sponsors',
		'tags',
		'options',
		'hero',
		'photo',
		'publish_on',
		'published',
	];

	protected $dates = [
		'start_date',
		'end_date',
		'published',
		'deleted_at',
	];

	public function scopeYear($query, $year)
	{
		return $query->where(DB::raw('YEAR(start_date)'), '=', $year);
	}

	public function scopeLookup($query, $terms)
	{
		return $query->where(function($query) use($terms)
		{
			if (is_array($terms) || is_object($terms))
			{
				$i	= 0;
				foreach ($terms as $term)
				{
					if ($i === 0)
					{
						$query->where('slug', '=', $term)
							->orWhere('city', 'like', '%' . $term . '%')
							->orWhere('state', 'like', '%' . $term . '%')
							->orWhere('tags', 'like', '%' . $term . '%');
					} else {
						$query->orWhere('slug', '=', $term)
							->orWhere('city', 'like', '%' . $term . '%')
							->orWhere('state', 'like', '%' . $term . '%')
							->orWhere('tags', 'like', '%' . $term . '%');
					}
				}
			} else {
				$query->where('slug', '=', $terms)
					->orWhere('city', 'like', '%' . $term . '%')
					->orWhere('state', 'like', '%' . $term . '%')
					->orWhere('tags', 'like', '%' . $term . '%');
			}
		});
	}

	public function scopeUpcoming($query)
	{
		return $query->where('start_date', '>', Carbon::now());
	}

	public function scopeUpcomingOrCurrent($query)
	{
		return $query->where('end_date', '>', Carbon::now());
	}

	public function scopeCurrent($query)
	{
		return $query->where('start_date', '<', Carbon::now())->where('end_date', '>', Carbon::now());
	}

	public function scopePastOrCurrent($query)
	{
		return $query->where('start_date', '<', Carbon::now());
	}

	public function scopePast($query)
	{
		return $query->where('end_date', '<', Carbon::now());
	}

}
