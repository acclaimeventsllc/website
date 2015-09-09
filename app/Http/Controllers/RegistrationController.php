<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationRequest;
use App\Helpers\Helpers;
use App\Models\Registration;
use App\Models\Conference;

class RegistrationController extends Controller
{
	//

	protected $debug	= false;
	protected $steps	= 5;
	protected $fields	= [
		'Basic Information'	=> [
				'conference'		=> ['type' => 'select', 'label' => 'Choose a conference', 'value' => '', 'attr' => ['class' => 'form-control', 'required' => 'required'], 'list' => []],
				'attendance'		=> ['type' => 'select', 'label' => 'Attendee type', 'value' => '', 'attr' => ['class' => 'form-control', 'required' => 'required'], 'list' => []],
				'email'				=> ['type' => 'email', 'label' => 'Email', 'value' => '', 'attr' => ['class' => 'form-control', 'required' => 'required']],
				'phone'				=> ['type' => 'text', 'label' => 'Phone', 'value' => '', 'attr' => ['class' => 'form-control']],
			],
		'Badge Details'		=> [
				'first_name'		=> ['type' => 'text', 'label' => 'First Name', 'value' => '', 'attr' => ['class' => 'form-control', 'required' => 'required']],
				'last_name'			=> ['type' => 'text', 'label' => 'Last Name', 'value' => '', 'attr' => ['class' => 'form-control', 'required' => 'required']],
				'title'				=> ['type' => 'text', 'label' => 'Title', 'value' => '', 'attr' => ['class' => 'form-control', 'required' => 'required']],
				'company'			=> ['type' => 'text', 'label' => 'Company', 'value' => '', 'attr' => ['class' => 'form-control', 'required' => 'required']],
				'affiliation'		=> ['type' => 'select', 'label' => 'Affiliation', 'value' => '', 'attr' => ['class' => 'form-control'], 'list' => []],
			],
		'Address'			=> [
				'street'			=> ['type' => 'text', 'label' => 'Street', 'value' => '', 'attr' => ['class' => 'form-control', 'required' => 'required']],
				'city'				=> ['type' => 'text', 'label' => 'City', 'value' => '', 'attr' => ['class' => 'form-control', 'required' => 'required']],
				'state'				=> ['type' => 'select', 'label' => 'State', 'value' => '', 'attr' => ['class' => 'form-control', 'required' => 'required'], 'list' => []],
				'postal'			=> ['type' => 'text', 'label' => 'Postal Code', 'value' => '', 'attr' => ['class' => 'form-control', 'required' => 'required']],
			],
		'Direct Reports'	=> [
				'referrals[name]'	=> ['type' => 'text', 'label' => 'Name', 'value' => '', 'attr' => ['class' => 'form-control']],
				'referrals[email]'	=> ['type' => 'text', 'label' => 'Email', 'value' => '', 'attr' => ['class' => 'form-control']],
				'referrals[phone]'	=> ['type' => 'text', 'label' => 'Phone', 'value' => '', 'attr' => ['class' => 'form-control']],
				'referrals[title]'	=> ['type' => 'text', 'label' => 'Title', 'value' => '', 'attr' => ['class' => 'form-control']],
			],
	];

	public function index()
	{
		$route		= Helpers::routeinfo();
		$options	= Helpers::options($route);
		$navs		= Helpers::navigation($route, $options);
		$sub		= Helpers::navigation($route, $options, true);
		$fields 	= $this->getFields();

		$step 		= (object)[
			'debug'			=> $this->debug,
			'fields'		=> $this->fields,
		];

		$step->fields["Basic Information"]->conference->list	= $this->getEvents();
		$step->fields["Basic Information"]->attendance->list	= $this->getAttendance();
		$step->fields["Badge Details"]->affiliation->list		= $this->getAffiliations();
		$step->fields["Address"]->state->list					= $this->getStates();

		$step->fields["Basic Information"]->conference->value	= $this->getConference($route, $step->fields["Basic Information"]->conference->list);

		return view('pages/register', compact('step', 'route', 'options', 'navs', 'sub'));
	}

	public function store(RegistrationRequest $request)
	{
		$contact = (object)[
			'to'		=> ['alex@acclaimeventsllc.com', 'Alex Kaneen'],
//			'to'		=> ['bob@acclaimeventsllc.com', 'Bob Fritz'],
//			'to'		=> ['jeffm@acclaimeventsllc.com', 'Jeff Martin'],
			'from'		=> [strtolower($request->get('email')), ucwords($request->get('first_name') . ' ' . $request->get('last_name'))],
			'subj'		=> 'Registration for '.ucwords(preg_replace("/\_\-/", " ", $request->get('conference'))),
		];

		$referrals = (object)$request->get('referrals');
		$referrals->name	= ucwords($referrals->name);
		$referrals->title	= strtoupper($referrals->title);
		$referrals->email	= strtolower($referrals->email);

		$compact = [
			'name'			=> ucwords($request->get('first_name') . ' ' . $request->get('last_name')),
			'title'			=> ucwords($request->get('title')),
			'email'			=> strtolower($request->get('email')),
			'phone'			=> $request->get('phone'),
			'company'		=> ucwords($request->get('company')),
			'address'		=> strtoupper($request->get('street') . ', ' . $request->get('city') . ', ' . $request->get('state') . '  ' . $request->get('postal')),
			'conference'	=> strtoupper(preg_replace("/\-\_/", " ", $request->get('conference'))),
			'attendance'	=> strtoupper($request->get('attendance')),
			'affiliation'	=> strtoupper($request->get('affiliation')),
			'referrals'		=> $referrals,
		];

		$mail = \Mail::send('emails/registration', $compact, function($message) use($contact)
			{
				$fromEmail	= $contact->from[0];
				$fromName	= $contact->from[1];
				$toEmail	= $contact->to[0];
				$toName		= $contact->to[1];
				$subject	= $contact->subj;

				$message->from($fromEmail, $fromName);
				$message->to($toEmail, $toName)->subject($subject);
			});

		return back()->with('message', 'Registration complete!  We will be contact you within 2 business days.');
	}

	protected function getFields()
	{
		foreach ($this->fields as $group => $fields)
		{
			$this->fields[$group]	= (object)$fields;
			foreach ($fields as $field => $info)
			{
				$this->fields[$group]->$field = (object)$info;
			}
		}
		return $this->fields;
	}

	protected function getConference($route, $list)
	{
		if (count($route->params) > 0 && !empty($route->params['conference']))
		{
			if (isset($list[$route->params['conference']]))
			{
				return $route->params['conference'];
			}
		}
		return '';
	}

	protected function getEvents()
	{
		$events = ['' => 'Select one...'];
		$conferences	= Conference::where('start_date', '>', Carbon::now())->get();
		$conferences 	= Helpers::keysByField($conferences, 'slug');

		foreach ($conferences as $slug => $event)
		{
			$events[$slug]	= $event->city . ', ' . $event->state . ' | ';
			$time			= $event->start_date . (!empty($event->timezone) ? $event->timezone : '');
			if (!empty($event->coming))
			{
				$events[$slug] .= date('F Y', strtotime($time));
			} else {
				$events[$slug] .= date('F j, Y', strtotime($time));
			}
		}
		return $events;
	}

	protected function getAttendance()
	{
		return [
				''			=> 'Select one...',
				'advisor'	=> 'National Advisory Board',
				'sponsor'	=> 'Conference Sponsor',
				'attendee'	=> 'Conference Attendee',
			];
	}

	protected function getAffiliations()
	{
		return [
				'' => 'Select one (optional)',
				'tagitm'	=> 'TAGITM',
			];
	}

	protected function getStates()
	{
		return [
            '' => 'Select one...',
            'AL' => 'Alabama',
            'AK' => 'Alaska',
            'AZ' => 'Arizona',
            'AR' => 'Arkansas',
            'CA' => 'California',
            'CO' => 'Colorado',
            'CT' => 'Connecticut',
            'DE' => 'Delaware',
            'DC' => 'District of Columbia',
            'FL' => 'Florida',
            'GA' => 'Georgia',
            'HI' => 'Hawaii',
            'ID' => 'Idaho',
            'IL' => 'Illinois',
            'IN' => 'Indiana',
            'IA' => 'Iowa',
            'KS' => 'Kansas',
            'KY' => 'Kentucky',
            'LA' => 'Louisiana',
            'ME' => 'Maine',
            'MD' => 'Maryland',
            'MA' => 'Massachusetts',
            'MI' => 'Michigan',
            'MN' => 'Minnesota',
            'MS' => 'Mississippi',
            'MO' => 'Missouri',
            'MT' => 'Montana',
            'NE' => 'Nebraska',
            'NV' => 'Nevada',
            'NH' => 'New Hampshire',
            'NJ' => 'New Jersey',
            'NM' => 'New Mexico',
            'NY' => 'New York',
            'NC' => 'North Carolina',
            'ND' => 'North Dakota',
            'OH' => 'Ohio',
            'OK' => 'Oklahoma',
            'OR' => 'Oregon',
            'PA' => 'Pennsylvania',
            'RI' => 'Rhode Island',
            'SC' => 'South Carolina',
            'SD' => 'South Dakota',
            'TN' => 'Tennessee',
            'TX' => 'Texas',
            'UT' => 'Utah',
            'VT' => 'Vermont',
            'VA' => 'Virginia',
            'WA' => 'Washington',
            'WV' => 'West Virginia',
            'WI' => 'Wisconsin',
            'WY' => 'Wyoming'
        ];
	}

/*
	protected function postValues()
	{
		foreach ($_POST as $k => $v)
		{
			if ($k !== '_token')
			{
				\Session::put('registration.' . $k, $v);
			}
		}
		return $_POST;
	}

	protected function getValues()
	{
		$input		= $this->getInput();
		$session	= $this->getSession();
		$values		= [];

		if (is_array($input))
		{
			foreach ($input as $k => $v)
			{
				$values[$k] = $v;
			}
		}

		if (is_array($session))
		{
			foreach ($session as $k => $v)
			{
				$values[$k] = $v;
			}
		}

		return (object)$values;
	}

	protected function getSession()
	{
		return \Session::get('registration');
	}

	protected function getInput()
	{
		return \Input::all();
	}

	protected function getDB($email = 'EMAIL', $conference = 'CONFERENCE')
	{
		$db	= Registrations::where('email', '=', strtolower($email))
							->where('conference', '=', strtolower($conference))
							->first();
		return $db;
	}
*/

}
