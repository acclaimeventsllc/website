<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use DB;
use Carbon;
use App\Helpers\Helpers;
use App\Helpers\Lookup;

class PagesController extends Controller {

	public function index() {

		$route		= Helpers::routeinfo();
		$options	= Helpers::options($route);
		$navs		= Helpers::navigation($route, $options);
		$sub		= Helpers::navigation($route, $options, true);

//		dd($options);

		$events			= DB::table('conferences')
							->where('end_date', '>', Carbon\Carbon::now())
							->orderBy('start_date')
							->take(3)
							->get();

		$events			= Lookup::lookup('conferences', [], ['upcoming' => true, 'current' => true, 'home' => true, 'published' => true]);
//		dd($events);

		$venues 		= DB::table('venues')
							-> where(function($query) use($events) {
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
		$venues			= Helpers::keysByField($venues, 'slug');

		$benefits		= DB::table('benefits')
							->where('published', '>', '0000-00-00 00:00:00')
							->orderBy('priority')
							->get();
		$intro			= array_shift($benefits);

		$testimonials	= DB::table('testimonials')
							->where('published', '>', '0000-00-00 00:00:00')
							->take(10)
							->get();

		return view('pages/index', compact('events', 'venues', 'intro', 'benefits', 'testimonials', 'route', 'options', 'navs', 'sub'));
	}

	public function about() {

		$route		= Helpers::routeinfo();
		$options	= Helpers::options($route);
		$navs		= Helpers::navigation($route, $options);
		$sub		= Helpers::navigation($route, $options, true);

		$about		= $options->about_text;

		$team		= DB::table('team_members')
						->where('published', '>', '0000-00-00 00:00:00')
						->orderBy('priority')
						->get();

		$speakers	= DB::table('speakers')
						->where('advisor', '>', '0')
						->where('published', '>', '0000-00-00 00:00:00')
						->orderBy('last_name')
						->get();

		$advisors	= (object)[];

		foreach ($speakers as $advisor)
		{

			$slugs	= $advisor->advisor;

			if (preg_match("/\,/", $slugs))
			{
				$slugs	= explode(',', $slugs);
			} else {
				$slugs 	= [$slugs];
			}

			foreach ($slugs as $slug)
			{
				list ($year, $conference) = explode('/', $slug);
				$advisors->{$year}->{$slug}[] = $advisor;
			}
		}

		$the_events	= DB::table('conferences')
						->select('slug', 'city')
						->get();

		$events		= [];
		$events['2016/national']	= 'National';
		$events['2017/national']	= 'National';

		foreach ($the_events as $event)
		{
			$events[$event->slug] = $event->city;
		}

		$advisors	= $advisors->{date('Y')};
		$national	= $advisors->{date('Y') . '/national'};
		unset($advisors->{date('Y') . '/national'});

//		die('<pre>' . print_r($advisors,1) . '</pre>');
		return view('pages/about', compact('about', 'team', 'national', 'advisors', 'events', 'route', 'options', 'navs', 'sub'));
	}

	function register() {
/*
		$show = [
			'hero'			=> false,
			'active'		=> false,
			'title'			=> 'Register',
		];
		$show = $this->get_show_preferences($show);

		$event = [
			'slug'			=> 'austin',
			'title'			=> 'Austin IT Strategies Conference',
			'start'			=> '2015-09-15 07:30:00 CDT',
			'end'			=> '2015-09-15 17:00:00 CDT',
			'venue'			=> 'Crown Plaza Austin',
			'location'		=> '6121 North Ih 35, Austin, TX 78752',
			'place'			=> 'ChIJVzSZghjKRIYREyXBujdzq6w',
			'directions'	=> 'http://www.ihg.com/crowneplaza/hotels/us/en/austin/ausgz/hoteldetail?cm_mmc=GoogleMaps-_-cp-_-USEN-_-ausgz#map-directions',
		];
		$event['date'] = date('F j, Y', strtotime($event['start']));

		$events = [
			[
				'slug'			=> 'austin',
				'title'			=> 'Austin IT Strategies Conference',
				'city'			=> 'Austin, TX',
				'start'			=> '2015-09-15 07:30:00 CDT',''
			],
			[
				'slug'			=> 'san-antonio',
				'title'			=> 'San Antonio IT Strategies Conference',
				'city'			=> 'San Antonio, TX',
				'start'			=> '2016-04-21 07:30:00 CST',
			],
		];

		foreach ($events as $i => $event) {
			$events[$i]['date'] = date('F j, Y', strtotime($event['start']));
		}

		$data = [
			'show'		=> $show,
			'event'		=> $event,
			'events'	=> $events,
			'nav-sub'	=> [],
		];

		return view('pages/register')->withData($data);
*/
		$route		= Helpers::routeinfo();
		$options	= Helpers::options($route);
		$navs		= Helpers::navigation($route, $options);
		$sub		= Helpers::navigation($route, $options, true);

		$events		= DB::table('conferences')
						->where('start_date', '>', Carbon\Carbon::now())
						->where('published', '>', '0000-00-00 00:00:00')
						->orderBy('start_date')
						->get();
	}

}
