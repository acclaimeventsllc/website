<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\ContactFormRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use DB;
use Carbon\Carbon;
use App\Helpers\Helpers;
use App\Models\TeamMember;
use App\Models\Conference;

class ContactController extends Controller
{
	//
	public function index()
	{
		$route		= Helpers::routeinfo();
		$route->url	= '/contact';
		$options	= Helpers::options($route);
		$navs		= Helpers::navigation($route, $options);
		$sub		= Helpers::navigation($route, $options, true);

		$contact 	= (object)[
			'venue'			=> 'Acclaim Events',
			'phone'			=> '(503) 206-5700',
			'phone_short'	=> '5032065700',
			'address'		=> '9860 SW Hall Blvd, Suite D<br>Tigard, OR 97223',
			'address_short'	=> '9860 SW Hall Blvd, Suite D, Tigard, OR 97223',
			'facebook'		=> 'http://www.facebook.com/acclaimeventsllc',
			'linkedin'		=> 'company/acclaim-events-llc',
			'place'			=> 'ChIJE5F6JvIMlVQR05xT-zTHqwk',
		];
		$event		= (object)[];

		if (count($route->params) === 1 || $route->uri === 'contact/sponsorship/{year?}/{conference?}') {
			if (!empty($route->params['contact']))
			{
				$team	= DB::table('team_members')
							->where('first_name', '=', ucwords($route->params['contact']))
							->take(1)
							->get();
				if (is_array($team) && count($team) === 1)
				{
					$team = $team[0];
					$options->title			= 'Contact ' . $team->first_name;
					$contact->first_name	= $team->first_name;
					$contact->last_name		= $team->last_name;
					$contact->photo			= $team->photo;
					$contact->linkedin		= $team->linkedin;
					$contact->facebook		= null;
					$contact->phone			= null;
					$contact->address		= null;
					$route->url				= '/contact/' . $route->params['contact'];
				} else {
					redirect('/contact');
				}
			} elseif ($route->uri === 'contact/sponsorship/{year?}/{conference?}') {
				$options->title			= 'Request Sponsorship Information';

				if (!empty($route->params['conference']))
				{
					$conference	= $route->params['year'] . '/' . $route->params['conference'];
				} else {
					$conference = $route->params['year'];
				}

				if (!empty($conference))
				{
					$events	= Conference::lookup($conference)->current()->first();
//					dd($events);
					if (is_object($events))
					{
						$event	= (object)$events->toArray();
					}
				}
			} else {
				redirect('/contact');
			}
		}

//		dd($route);
		return view('pages/contact', compact('contact', 'event', 'route', 'options', 'navs', 'sub'));
	}

	public function store(ContactFormRequest $request)
	{
		$route	= Helpers::routeinfo();
		$from	= [$request->get('email'), ucwords($request->get('name'))];
		$to		= ['contact@acclaimeventsllc.com', 'Acclaim Events'];
		$subj	= 'Contact Form Submission';

		if (count($route->params) === 1) {
			$member	= TeamMember::where('first_name', '=', ucwords($route->params['contact']))
								->take(1)
								->get();
			if (isset($member[0])) {
				$member	= (object)$member[0]->toArray();
				$to		= [$member->email, $member->first_name . ' ' . $member->last_name];
				$subj	= 'Personal Contact request for ' . $member->first_name . ' ' . $member->last_name;
			}
		}

		$contact	= [
			'from'	=> $from,
			'to'	=> $to,
			'subj'	=> $subj,
		];

		\Mail::send('emails/contact', [
				'name'	=> $request->get('name'),
				'email'	=> $request->get('email'),
				'phone'	=> $request->get('phone'),
				'msg'	=> $request->get('message'),
			], function($message) use($contact)
			{
				$fromEmail	= $contact['from'][0];
				$fromName	= $contact['from'][1];
				$toEmail	= $contact['to'][0];
				$toName		= $contact['to'][1];
				$subject	= $contact['subj'];

				$message->from($fromEmail, $fromName);
				$message->to($toEmail, $toName)->subject($subject);
			});

		return back()->with('message', 'Thanks for contacting us!');
	}

}
