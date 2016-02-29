<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Helpers\Helpers;
use App\Helpers\Lookup;
use DB;
use Carbon\Carbon;
use App\Models\Conference;
use App\Models\ConferenceSponsor;
use App\Models\Venue;
use App\Models\Partner;
use App\Models\Agenda;
use App\Models\Speaker;
use App\Models\Sponsor;
use App\Models\Topic;

class ConferencesController extends Controller
{
	//
	public function index()
	{
		$route	= Helpers::routeinfo();

		if (!isset($route->params) || !isset($route->params['conference']))
		{
			$events	= Conference::where('start_date', '>', Carbon::now())
								->published()
								->orderBy('start_date')
								->get();
		} else {
			$events	= Conference::where(function($query) use($route)
								{
									$query->where('slug', '=', $route->params['conference'])
										  ->orWhere('city', 'like', '%'.$route->params['conference'].'%')
										  ->orWhere('state', 'like', '%'.$route->params['conference'].'%')
										  ->orWhere('tags', 'like', '%'.$route->params['conference'].'%');
								})
								->published()
								->orderBy('start_date', 'asc')
								->get();
		}
		$events = $this->collectionToArray($events);

		$allEvents = Lookup::lookup('conferences', $route->params, ['published' => true]);
		$events	= Lookup::lookup('conferences', $route->params, ['upcoming' => true, 'current' => true, 'published' => true]);

		if (count($events) > 1)
		{
			return $this->conferences($route, $events);
		} elseif (count($events) === 1) {
			return $this->conference($route, $events[0]);
		} elseif (count($allEvents) > 1) {
			return $this->conferences($route, $events);
		} elseif (count($allEvents) === 1) {
			return $this->conference($route, $allEvents[0]);
		} elseif ($route->action === '{conference?}') {
			return redirect('/');
		} else {
			return redirect('/conferences');
		}
	}

	protected function create()
	{
		$route	= Helpers::routeinfo();
/*
		$event 			= Conference::where('slug', '=', $route->params['conference'])
									->published()
									->latest();
*/
		$events		= Lookup::lookup('conferences', [$route->params['conference']], ['latest' => true, 'published' => true]);
		$event		= $events[0];

		$options	= Helpers::unserialize($event->options);
		$options['speakers'] = false;
		$options['sponsors'] = false;
		$options['partners'] = false;

		$options	= Helpers::options($route, $route->params['conference']);

		$newEvent		= Conference::create([
				'slug'			=> $route->params['conference'],
				'conference'	=> $event->conference,
				'city'			=> $event->city,
				'state'			=> $event->state,
				'start_date'	=> Carbon::createFromFormat('Y-m-d H:i:s', $event->start_date)->addYear(),
				'end_date'		=> Carbon::createFromFormat('Y-m-d H:i:s', $event->end_date)->addYear(),
				'timezone'		=> $event->timezone,
				'coming'		=> 1,
				'about'			=> $event->about,
				'tags'			=> $event->tags,
				'options'		=> Helpers::serialize($options),
				'hero'			=> $event->hero,
				'photo'			=> $event->photo,
				'published'		=> Carbon::now(),
			]);

		$newEvent	= (object)$newEvent->toArray();
		$newAgendas	= [];
		$agendas	= Lookup::lookup('agendas', ['conference' => $event->id], ['published' => true]);

		if (is_array($agendas))
		{
			foreach ($agendas as $agenda) {
				$agenda->conference_id	= $newEvent->id;
				$agenda->timeslot		= Carbon::createFromFormat('Y-m-d H:i:s', $agenda->timeslot)->addYear();
				$agenda->title			= ($agenda->type === 'breakout' || $agenda->type === 'session' ? 'Breakout Session' : ($agenda->type === 'break' ? $agenda->title : 'Keynote'));
				$agenda->title_short	= ($agenda->type === 'breakout' || $agenda->type === 'session' ? 'Breakout Session' : ($agenda->type === 'break' ? $agenda->title : 'Keynote'));
				$agenda->subtitle		= null;
				$agenda->desc 			= null;
				$agenda->speakers		= null;
				$agenda->published		= Carbon::now();
				$newAgendas[] 			= Agenda::create((array)$agenda);
			}
		}

		$container = (object)[
			'event'		=> (object)$newEvent,
			'agendas'	=> (object)$newAgendas,
		];

		dd($newEvent);
	}

	protected function conferences($route, $events)
	{
		$past		= Lookup::lookup('conferences', $route->params, ['past' => true, 'published' => true]);
		$venues		= Venue::where(function($query) use($events) {
							foreach ($events as $i => $event) {
								if ($i === 0) {
									$query->where('slug', '=', $event->venue_slug);
								} else {
									$query->orWhere('slug', '=', $event->venue_slug);
								}
							}
						})
   						->published()
						->get();
		$venues		= Helpers::keysByField($venues, 'slug');
		$options	= Helpers::options($route);
		$navs		= Helpers::navigation($route, $options);
		$sub		= Helpers::navigation($route, $options, true);

//		dd($route);
		return view('pages/conferences', compact('events', 'past', 'venues', 'options', 'navs', 'sub'));
	}

	protected function conference($route, $event)
	{
		$venue		= Venue::where('slug', '=', $event->venue_slug)->published()->get();
		$venue 		= (!empty($venue[0]) ? (object)$venue[0]->toArray() : null);

		$options	= Helpers::options($route, $event->slug, $event);
//		dd($options);

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

		$unfilteredTopics	= Topic::where('conference_slug', '=', $event->slug)->get();
		$topics				= [];

		foreach ($unfilteredTopics as $topic)
		{
			$topics[] = $topic->title;
		}

		if ((bool)$options->topics_by_alpha === true)
		{
			sort($topics);
		}

		$agendasRaw	= Agenda::where('conference_slug', '=', $event->slug)
						->published()
						->orderBy('timeslot')
						->orderBy('priority')
						->get();

		$speakerList	= [];
		$agendas		= [];
		if (is_object($agendasRaw)) {
			foreach ($agendasRaw as $i => $agenda) {
				$agenda = (object)$agenda->toArray();
				list ($date, $time) = explode(' ', $agenda->timeslot);
				if (!empty($agenda->speakers)) {
//					$agenda->speakers = Helpers::unserialize($agenda->speakers);
//					dd($agenda->speakers);
					$agendaSpeakers = explode(',', $agenda->speakers);
					$agenda->speakers = [];
					if (is_array($agendaSpeakers))
					{
						foreach ($agendaSpeakers as $s)
						{
							@list($speakerType, $speakerSlug) = @explode('|', $s);
							$agenda->speakers[$speakerType][] = $speakerSlug;
						}
//							dd($agenda->speakers);
					}
				}

				$agendas[$date][$time][] = $agenda;

				if (!empty($agenda->speakers)) {
					$speakersTypes	= $agenda->speakers;
					if (is_array($speakersTypes)) {
						ksort($speakersTypes);
//						dd($speakersTypes);
						foreach ($speakersTypes as $speakers) {
							$speakerList = array_merge($speakerList, $speakers);

						}
					}
				}
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

		if ((bool)$options->sponsor_levels === true)
		{
			$sponsors = Lookup::lookup('sponsors', ['conference_slug' => $event->slug], ['published' => true, 'sponsorlevels' => true]);
		} else {
			$sponsors = Lookup::lookup('sponsors', ['conference_slug' => $event->slug], ['published' => true]);
		}

//		dd($options);
		return view('pages/conference', compact('event', 'venue', 'partners', 'topics', 'agendas', 'speakers', 'sponsors', 'options', 'navs', 'sub'));
	}

	protected function collectionToArray($collection)
	{
		$array	= [];
		foreach ($collection as $i => $object)
		{
			$array[$i] = (object)$object->toArray();
		}

		return $array;
	}

}
