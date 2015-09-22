<?php namespace App\Helpers;

use DB;
use Carbon\Carbon;
use App\Helpers\Helpers;
use App\Models\Agenda;
use App\Models\Conference;
use App\Models\ConferenceSponsor;
use App\Models\Option;
use App\Models\Page;
use App\Models\Partner;
use App\Models\Registration;
use App\Models\Speaker;
use App\Models\Sponsor;
use App\Models\Venue;

class Lookup {

	public static function lookup($lookup = 'conferences', $params = [], $flags = [])
	{
		$params	= (object)$params;
		$flags	= (object)$flags;

		switch ($lookup) {
			case 'agendas':
				return self::lookup_agendas($params, $flags);
			case 'sponsors':
				return self::lookup_sponsors($params, $flags);
			case 'speakers':
				return self::lookup_speakers($params, $flags);
			case 'venues':
				return self::lookup_venues($params, $flags);
			default: //CONFERENCES
				return self::lookup_conferences($params, $flags);
		}
	}

	public static function lookup_agendas($params, $flags)
	{
		$agendas	= Agenda::where('conference_id', '=', $params->conference)
							->orderBy('timeslot')
							->orderBy('priority');

		if (self::flags($flags, 'published'))
		{
			$agendas->published();
		}
		
		return self::collectionToArray($agendas->get());
	}

	public static function lookup_conferences($params, $flags)
	{

		$search	= [];
		$year	= null;

		foreach ($params as $k => $v)
		{
			if (empty($year) && preg_match("/^[0-9]{4}$/", $v))
			{
				$year = $v;
			} else {
				$search[] = $v;
			}
		}
		if (is_array($flags)) $flags = (object)$flags;


		// Start by getting all conferences
		$conferences = Conference::whereNotNull('start_date')->whereNotNull('end_date');

		// If a year is specified, limit search
		if (!empty($year))
		{
			$conferences->year($year);
		}

		// If other search criteria were specified, limit search
		if (count($search) > 0) {
			$conferences->lookup($search);
		}

		// Flags will limit search
		if (is_object($flags))
		{
			if (self::flags($flags, 'upcoming') && self::flags($flags, 'current'))
			{
				$conferences->upcomingOrCurrent();
			} elseif (self::flags($flags, 'past') && self::flags($flags, 'current')) {
				$conferences->pastOrCurrent();
			} elseif(self::flags($flags, 'upcoming')) {
				$conferences->upcoming();
			} elseif (self::flags($flags, 'current')) {
				$conferences->current();
			} elseif (self::flags($flags, 'past')) {
				$conferences->past();
			}

			if (self::flags($flags, 'published'))
			{
				$conferences->published();
			}

			if (self::flags($flags, 'home'))
			{
				$conferences->take(3);
			} elseif (!empty($flags->take) && is_int($flags->take)) {
				$conferences->take($flags->take);
			}
		}

		if (is_object($flags))
		{

			if (self::flags($flags, 'latest'))
			{
				$conferences->orderBy('start_date', 'desc');
			} elseif (isset($flags->orderby)) {
				foreach ($flags->orderby as $order)
				{
					list ($by, $direction) = explode($order);
					if (!empty($direction))
					{
						$conferences->orderBy($by, $direction);
					} else {
						$conferences->orderBy($by);
					}
				}
			} else {
				$conferences->orderBy('start_date');
			}

			if (self::flags($flags, 'first'))
			{
				$conferences = $conferences->take(1)->get();
			} elseif (self::flags($flags, 'latest')) {
				$conferences = $conferences->take(1)->get();
			} elseif (self::flags($flags, 'take')) {
				$conferences = $conferences->take($flags->take)->get();
			} else {
				$conferences = $conferences->get();
			}
		} else {
			$conferences = $conferences->get();
		}

		$events	= self::collectionToArray($conferences);

		return $events;

	}

	public static function lookup_venues($params, $flags)
	{
		return self::collectionToArray($venues);
	}

	public static function lookup_speakers($params, $flags)
	{
		return;
	}

	public static function lookup_sponsors($params, $flags)
	{
		$groups	= ConferenceSponsor::join('sponsors', 'conference_sponsors.sponsor_id', '=', 'sponsors.id')
									   ->where('conference_id', '=', $params->conference);

		if (self::flags($flags, 'published'))
		{
			$groups->whereNotNull('conference_sponsors.published')->where('conference_sponsors.published', '<', Carbon::now());
		}

		if (self::flags($flags, 'sponsorlevels'))
		{
			$groups->orderBy('sponsorship');
		}

		$groups->orderBy('company');
		$groups = $groups->get();

		if (!$groups->isEmpty())
		{
			$sponsors		= (object)[];
			$sponsorship	= '';
			foreach ($groups as $sponsor)
			{
				$sponsor	= (object)$sponsor->toArray();
				$slug		= $sponsor->slug;

				if (self::flags($flags, 'sponsorlevels'))
				{
					if ($sponsorship !== $sponsor->sponsorship)
					{
						$sponsorship = $sponsor->sponsorship;
						$sponsors->$sponsorship = (object)[];
					}

					$sponsors->$sponsorship->$slug = $sponsor;
				} else {
					$sponsors->$slug = $sponsor;
				}
			}

			return $sponsors;
		}

		return (object)[];
	}

/***********************************************************************
**	FLAGS
**	Check that a flag is set and true
**	Returns BOOL
***********************************************************************/
	public static function flags($flags, $flag)
	{
		return !empty($flags->$flag) && (bool)$flags->$flag === true;
	}

/***********************************************************************
**	COLLECTION TO ARRAY
**	Transforms a database Collection into an array with rows as objects.
**	Returns an array or the original collection.
***********************************************************************/
	public static function collectionToArray($collection)
	{
		if (!$collection->isEmpty())
		{
			$return = [];

			foreach ($collection as $i => $item)
			{
				$return[$i] = (object)$item->toArray();
			}

			return $return;
		}

		return $collection;
	}

}
