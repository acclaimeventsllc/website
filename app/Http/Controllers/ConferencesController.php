<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Helpers\Helpers;
use DB;
use Carbon\Carbon;
use App\Models\Conference;
use App\Models\Venue;
use App\Models\Partner;
use App\Models\Agenda;
use App\Models\Speaker;
use App\Models\Sponsor;

class ConferencesController extends Controller
{
	//
	public function index()
	{
		$route = Helpers::routeinfo();
		if (!isset($route->params) || !isset($route->params['conference'])) {
			$events	= DB::table('conferences')
						->where('start_date', '>', Carbon::now())
						->where('published', '>', '0000-00-00 00:00:00')
						->orderBy('start_date')
						->get();
		} else {
			$events		= DB::table('conferences')
							->where(function($query) use($route) {
							$query->where('slug', '=', $route->params['conference'])
								  ->orWhere('city', 'like', '%'.$route->params['conference'].'%')
								  ->orWhere('state', 'like', '%'.$route->params['conference'].'%')
								  ->orWhere('tags', 'like', '%'.$route->params['conference'].'%');
							})
							->where('published', '>', '0000-00-00 00:00:00')
							->orderBy('start_date', 'asc')
							->get();
		}
		
		if (count($events) > 1) {
			return $this->conferences($route, $events);
		} elseif (count($events) === 1) {
			return $this->conference($route, $events[0]);
		} elseif ($route->action === '{conference?}') {
			return redirect('/');
		} else {
			return redirect('/conferences');
		}
	}

	protected function conferences($route, $events)
	{
		$venues		= DB::table('venues')
						->where(function($query) use($events) {
							foreach ($events as $i => $event) {
								if ($i === 0) {
									$query->where('slug', '=', $event->venue_slug);
								} else {
									$query->orWhere('slug', '=', $event->venue_slug);
								}
							}
						})
   						->where('published', '>', '0000-00-00 00:00:00')
						->get();
		$venues		= Helpers::keysByField($venues, 'slug');
		$options	= Helpers::options($route);
		$navs		= Helpers::navigation($route, $options);
		$sub		= Helpers::navigation($route, $options, true);

//		dd($route);
		return view('pages/conferences', compact('events', 'venues', 'options', 'navs', 'sub'));
	}

	protected function conference($route, $event)
	{
		$venue		= Venue::where('slug', '=', $event->venue_slug)->published()->get();
		$venue 		= (!empty($venue[0]) ? (object)$venue[0]->toArray() : null);

		$event->options = (!empty($event->options) ? Helpers::unserialize($event->options) : []);
		$options	= Helpers::options($route, 'conference', $event->options);
		$options	= (array)$options;
		foreach ($options as $key => $option) {
			if (is_string($option) && preg_match("/^([a-z]+):([a-z]+)$/i", $option)) {
				list ($foo, $bar) = explode(':', $option);
				$options[$key] = $$foo->$bar;
			}
		}
		$options 	= (object)$options;

		$navs 		= Helpers::navigation($route, $options);
		$sub		= Helpers::navigation($route, $options, true);

		$partners	= (object)[
			'companies'	=> null,
			'text'		=> null,
		];

		if (!empty($event->partners)) {
			$undo		= Helpers::unserialize($event->partners);
			$companies	= Partner::where(function($query) use($undo)
							{
								foreach ($undo['partners'] as $i => $slug)
								{
									if ($i === 0)
									{
										$query->where('slug', '=', $slug);
									} else {
										$query->orWhere('slug', '=', $slug);
									}
								}
							})
							->published()
							->orderBy('company')
							->get();

			if (!empty($undo['text']))
			{
				$partners->text = $undo['text'];
			}

			if (is_object($companies))
			{
				$partners->companies	= [];
				foreach ($companies as $i => $company)
				{
					$partners->companies[] = (object)$company->toArray();
				}
			}
		}

		$agendas	= DB::table('agendas')
						->where('conference_id', '=', $event->id)
						->where('published', '>', '0000-00-00 00:00:00')
						->orderBy('timeslot')
						->orderBy('priority')
						->get();

		$speakerList = [];
		if (is_array($agendas)) {
			foreach ($agendas as $i => $agenda) {
				list ($date, $time) = explode(' ', $agenda->timeslot);
				if (!empty($agenda->speakers)) {
					$agenda->speakers = Helpers::unserialize($agenda->speakers);
				}
				$agendas[$date][$time][] = $agenda;

				if (!empty($agenda->speakers)) {
					$speakersTypes	= $agenda->speakers;
					if (is_array($speakersTypes)) {
						ksort($speakersTypes);
						foreach ($speakersTypes as $speakers) {
							$speakerList = array_merge($speakerList, $speakers);
						}
					}
				}
				
				unset($agendas[$i]);
			}
		}

		if (count($speakerList) > 0) {
			$speakers		= Speaker::where(function($query) use($speakerList) {
									$query->where('slug', '=', array_pop($speakerList));
									while (count($speakerList) > 0) {
										$query->orWhere('slug', '=', array_pop($speakerList));
									}
								})
								->published()
								->orderBy('last_name')
								->get();
			$speakers		= Helpers::keysByField($speakers, 'slug', function($value, $key, $field, $array, $toObj) {
									$value->sessions = [];
									return $value;
								}, true);
		}

		$sponsorList = [];
		$sponsorFlat = [];
		if (!empty($event->sponsors))
		{
			$sponsorList	= Helpers::unserialize($event->sponsors);
			if (is_array($sponsorList))
			{
				foreach ($sponsorList as $sponsors) {
					if (is_array($sponsorList) && is_array($sponsors))
					{
						$sponsorFlat = array_merge($sponsorFlat, $sponsors);
					}
				}
			}
		}

		if (count($sponsorFlat) > 0)
		{
			$sponsors		= Sponsor::where(function($query) use($sponsorFlat)
								{
									foreach ($sponsorFlat as $i => $sponsor)
									{
										if ($i === 0)
										{
											$query->where('slug', '=', $sponsor);
										} else {
											$query->orWhere('slug', '=', $sponsor);
										}
									}
								})
								->whereNotNull('photo')
								->published()
								->orderBy('company')
								->get();
			$sponsors		= Helpers::keysByField($sponsors, 'slug');

			$sponsorsFinal	= (object)[];
			if ((bool)$options->sponsorlevels === true && count($sponsors) > 0)
			{
				foreach ($sponsorList as $level => $companies)
				{
					if (!isset($sponsorsFinal->$level))
					{
						$sponsorsFinal->$level = (object)[];
					}

					foreach ($companies as $slug)
					{
						$sponsorsFinal->$level->$slug = (object)$sponsors[$slug];
					}
				}

				$sponsors	= $sponsorsFinal;
			} else {
				foreach ($sponsors as $slug => $sponsor)
				{
					$sponsorsFinal->$slug = (object)$sponsor;
				}

				$sponsors	= $sponsorsFinal;
			}
		}

//		dd($sponsors);
		return view('pages/conference', compact('event', 'venue', 'partners', 'agendas', 'speakers', 'sponsors', 'options', 'navs', 'sub'));
	}

}
